<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Status;
use App\User;

class UserBaseController extends KdmBaseController
{
    public function __construct()
    {
        parent::__construct(new User());
    }

    protected function isUserManagemenSupport()
    {
        return env('USER_MANAGEMENT_SUPPORT') == 1;
    }
    
    protected function registerUserManagement(Request $request)
    {
        $request->request->add([
            'app_key' => env('KDM_USER_APP_KEY')
        ]);
        $param = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($request->all())
        ];
        $res = $this->sendRequest('POST', '/user', $param);
        
        if ($res['status'] === 'success') {
            $res['data']['password'] = $request->password;
            $res_clone_user = $this->cloneUserData($res['data']);
            
            if ($res_clone_user['status'] === 'success') {
                return $this->responseRequestSuccess($res_clone_user['data']);
            } else {
                return $this->responseRequestError($res_clone_user['error']);
            }
        } else {
            return $this->responseRequestError($res['error']);
        }
    } 
    
    protected function authenticateUserManagement(Request $request)
    {
        $request->request->add([
            'app_key' => env('KDM_USER_APP_KEY')
        ]);
        $param = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($request->all())
        ];
        $res = $this->sendRequest('POST', '/user/authen', $param);
        
        if ($res['status'] === 'success') {
            $user = User::where('user_management_id', $res['data']['id'])
                ->where('status_id', Status::$ACTIVE)
                ->first();

            if (empty($user)) {
                $res['data']['password'] = $request->password;
                $res_clone_user = $this->cloneUserData($res['data']);

                if ($res_clone_user['status'] === 'success') {
                    $user = $res_clone_user['data'];
                    $user->profile_image = null;

                    if (!empty($res['data']['profile_image'])) {
                        $res_clone_profile_image = $this->cloneProfileImage($res['data']);

                        if ($res_clone_profile_image['status'] === 'success') {
                            $user->profile_image = $res_clone_profile_image['data']['profile_image'];
                        }
                    }

                    return $this->responseRequestSuccess($user);
                } else {
                    return $this->responseRequestError($res_clone_user['error']);
                }
            } else {
                $user['user_management_id'] = $res['data']['id'];
                $user['user_user_type'] = $res['data']['user_user_type'];
                $token = $this->jwt($user);
                $user['api_token'] = $token;
                $user['refresh_token'] = $this->genReToken($user);

                if (!empty($res['data']['profile_image'])) {
                    $res_clone_profile_image = $this->cloneProfileImage($res['data']);

                    if ($res_clone_profile_image['status'] === 'success') {
                        $user['profile_image'] = $res_clone_profile_image['data']['profile_image'];
                    }
                }

                return $this->responseRequestSuccess($user);
            }
        } else {
            return $this->responseRequestError($res['error']);
        }
    }  
    
    protected function facebookAuthenUserManagement(Request $request)
    {
        $request->request->add([
            'app_key' => env('KDM_USER_APP_KEY')
        ]);
        $param = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($request->all())
        ];
        $res = $this->sendRequest('POST', '/user/authen/facebook', $param);
        
        if ($res['status'] === 'success') {
            return $this->localFacebookAuthen($res['data']);
        } else {
            return $this->responseRequestError($res['error']);
        }
    }
    
    protected function googleAuthenUserManagement(Request $request)
    {
        $request->request->add([
            'app_key' => env('KDM_USER_APP_KEY')
        ]);
        $param = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($request->all())
        ];
        $res = $this->sendRequest('POST', '/user/authen/google', $param);
        
        if ($res['status'] === 'success') {
            return $this->localGoogleAuthen($res['data']);
        } else {
            return $this->responseRequestError($res['error']);
        }
    }   

    protected function updateDataUserManagement(Request $request, $id)
    {
        $user = User::where('status_id', Status::$ACTIVE)
            ->find($id);

        if (!empty($user)) {
            $request->request->add([
                'app_key' => env('KDM_USER_APP_KEY')
            ]);
            $param = [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $request->header('Authorization'),
                    'refresh-token' => $request->header('refresh-token')
                ],
                'body' => json_encode($request->all())
            ];
            $res = $this->sendRequest('PUT', '/user/'.$user->user_management_id, $param);
            
            if ($res['status'] === 'success') {
                $res['data']['password'] = $request->password;
    
                return $this->localUpdateData($res['data'], $id);
            } else {
                return $this->responseRequestError($res['error']);
            }
        } else {
            return $this->responseRequestError('User not found');   
        }
    }       

    protected function uploadProfileImageUserManagement(Request $request, $id)
    {
        $user = User::where('status_id', Status::$ACTIVE)
            ->find($id);
        
        if (!empty($user)) {
            $fileupload = $request->file('profile_image');
            $param = [
                'headers' => [
                    'Authorization' => $request->header('Authorization'),
                    'refresh-token' => $request->header('refresh-token')
                ],
                'multipart' => [
                    [
                        'name'     => 'profile_image',
                        'contents' => fopen($fileupload->getPathName(), 'r'),
                        'Mime-Type' => $fileupload->extension(),
                        'filename' => $fileupload->getClientOriginalName(),
                        'headers' => [
                            'Content-Type' => 'multipart/form-data',
                        ]
                    ],
                    [
                        'name' => 'app_key',
                        'contents' => env('KDM_USER_APP_KEY')
                    ]
                ]
            ];
            $res = $this->sendRequest('POST', '/user/profile_image/'.$user->user_management_id, $param);
            
            if ($res['status'] === 'success') {
                return $this->responseRequestSuccess($res['data']);
            } else {
                return $this->responseRequestError($res['error']);
            }   
        } else {
            return $this->responseRequestError('User not found');
        }
    }

    public function updateProfileImage(Request $request, $id)
    {
        $response = null;
        $user = User::where('status_id', Status::$ACTIVE)
            ->where('user_management_id', $id)
            ->first();
        
        if (!empty($user)) {
            if ($request->hasFile('profile_image')) {
                $original_filename = $request->file('profile_image')->getClientOriginalName();
                $original_filename_arr = explode('.', $original_filename);
                $file_ext = end($original_filename_arr);
                $destination_path = './upload/user/';
                $profile_image =  'U-'.time().'-'.$id.'.'.$file_ext;
                $this->removeOldUploadImage($destination_path, $user->profile_image);

                if ($request->file('profile_image')->move($destination_path, $profile_image)) {
                    $user->profile_image = '/upload/user/'.$profile_image;

                    if ($user->save()) {
                        return $this->responseRequestSuccess($user);
                    } else {
                        return $this->responseRequestError('Cannot update '.$user->getTable());
                    }
                } else {
                    return $this->responseRequestError('Cannot upload file');    
                }
            } else {
                return $this->responseRequestError('File not found');
            }
        } else {
            return $this->responseRequestError('User not found');
        }
    }

    protected function forgotPasswordUserManagement(Request $request)
    {
        $request->request->add([
            'app_key' => env('KDM_USER_APP_KEY')
        ]);
        $param = [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($request->all())
        ];
        $res = $this->sendRequest('POST', '/user/forgot_password', $param);
        
        if ($res['status'] === 'success') {
            return $this->responseRequestSuccess($res['data']);
        } else {
            return $this->responseRequestError($res['error']);
        }
    }

    private function sendRequest($http_method, $api_url, $param)
    {
        try {
            $client = new Client();
            $res = $client->request($http_method, env('KDM_USER_API_URL').$api_url, $param);
            
            return json_decode($res->getBody(), true);
        } catch (GuzzleException $e) {
            return [
                'status' => 'error',
                'error' => [
                    'message' => 'Connect user management fail',
                    'description' => $e->getResponse()->getBody(true)
                ]
            ];
        }
    }  
    
    private function cloneProfileImage($user_management)
    {
        $param = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $user_management['api_token'],
                'refresh-token' => $user_management['refresh_token']
            ],
            'body' => json_encode([
                'app_key' => env('KDM_USER_APP_KEY')
            ])
        ];
        
        return $this->sendRequest('POST', '/user/profile_image/clone/'.$user_management['id'], $param);
    }

    private function cloneUserData($user_management)
    {
        $user_management['user_management_id'] = $user_management['id'];
        unset($user_management['id']);
        $user = new User();
        $user->setData($user_management);
        $user->password = Hash::make($user_management['password']);

        if ($user->save()) {
            $token = $this->jwt($user);
            $user['api_token'] = $token;
            $user['refresh_token'] = $this->genReToken($user);
            $user["user_user_type"] = (!empty($user_management['user_user_type'])) ? [$user_management['user_user_type']] : $user_management['user_user_type'];
            $user['status_id'] = Status::$ACTIVE;
            
            if (isset($user['user_type_id'])) {
                $user["user_type_id"] = $user_management['user_type_id'];
            }

            return [
                'status' => 'success',
                'data' => $user
            ];
        } else{
            return [
                'status' => 'error',
                'error' => 'Cannot create '.$user->getTable()
            ];
        }
    }

    private function localFacebookAuthen($user_management)
    {
        $user = User::where('facebook_id', $user_management['facebook_id'])
            ->where('status_id', Status::$ACTIVE)
            ->first();
        
        if (!empty($user)) {
            $token = $this->jwt($user);
            $user['api_token'] = $token;
            $user['refresh_token'] = $this->genReToken($user);
            $user['user_user_type'] = $user_management['user_user_type'];

            if (!empty($user_management['profile_image'])) {
                $res_clone_profile_image = $this->cloneProfileImage($user_management);

                if ($res_clone_profile_image['status'] === 'success') {
                    $user['profile_image'] = $res_clone_profile_image['data']['profile_image'];
                }
            }

            return $this->responseRequestSuccess($user);
        } else {
            $user = User::where('email', $user_management['email'])
                ->where('status_id', Status::$ACTIVE)
                ->first();
            
            if (!empty($user)) {
                $user->facebook_id = $user_management['facebook_id'];

                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $user['refresh_token'] = $this->genReToken($user);
                    $user['user_user_type'] = $user_management['user_user_type'];
                    
                    if (!empty($user_management['profile_image'])) {
                        $res_clone_profile_image = $this->cloneProfileImage($user_management);

                        if ($res_clone_profile_image['status'] === 'success') {
                            $user['profile_image'] = $res_clone_profile_image['data']['profile_image'];
                        }
                    }

                    return $this->responseRequestSuccess($user);
                } else{
                    return $this->responseRequestError('Cannot update '.$user->getTable());
                }
            } else {
                $user_management['user_management_id'] = $user_management['id'];
                $user = $this->model;
                $user->setData($user_management);
                $user->password = $user_management['password_rand'];

                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $user['refresh_token'] = $this->genReToken($user);
                    $user['user_user_type'] = $user_management['user_user_type'];
                    $user['profile_image'] = null;

                    if (!empty($user_management['profile_image'])) {
                        $res_clone_profile_image = $this->cloneProfileImage($user_management);

                        if ($res_clone_profile_image['status'] === 'success') {
                            $user['profile_image'] = $res_clone_profile_image['data']['profile_image'];
                        }
                    }
                    
                    return $this->responseRequestSuccess($user);
                } else{
                    return $this->responseRequestError('Cannot create '.$user->getTable());
                }
            }
        }
    }    
    
    private function localGoogleAuthen($user_management)
    {
        $user = User::where('google_id', $user_management['google_id'])
            ->where('status_id', Status::$ACTIVE)
            ->first();
        
        if (!empty($user)) {
            $token = $this->jwt($user);
            $user['api_token'] = $token;
            $user['refresh_token'] = $this->genReToken($user);
            $user['user_user_type'] = $user_management['user_user_type'];

            if (!empty($user_management['profile_image'])) {
                $res_clone_profile_image = $this->cloneProfileImage($user_management);

                if ($res_clone_profile_image['status'] === 'success') {
                    $user['profile_image'] = $res_clone_profile_image['data']['profile_image'];
                }
            }

            return $this->responseRequestSuccess($user);
        } else {
            $user = User::where('email', $user_management['email'])
                ->where('status_id', Status::$ACTIVE)
                ->first();
            
            if (!empty($user)) {
                $user->google_id = $user_management['google_id'];

                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $user['refresh_token'] = $this->genReToken($user);
                    $user['user_user_type'] = $user_management['user_user_type'];
                    
                    if (!empty($user_management['profile_image'])) {
                        $res_clone_profile_image = $this->cloneProfileImage($user_management);

                        if ($res_clone_profile_image['status'] === 'success') {
                            $user['profile_image'] = $res_clone_profile_image['data']['profile_image'];
                        }
                    }

                    return $this->responseRequestSuccess($user);
                } else{
                    return $this->responseRequestError('Cannot update '.$user->getTable());
                }
            } else {
                $user_management['user_management_id'] = $user_management['id'];
                $user = $this->model;
                $user->setData($user_management);
                $user->password = $user_management['password_rand'];

                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $user['refresh_token'] = $this->genReToken($user);
                    $user['user_user_type'] = $user_management['user_user_type'];
                    $user['profile_image'] = null;

                    if (!empty($user_management['profile_image'])) {
                        $res_clone_profile_image = $this->cloneProfileImage($user_management);

                        if ($res_clone_profile_image['status'] === 'success') {
                            $user['profile_image'] = $res_clone_profile_image['data']['profile_image'];
                        }
                    }
                    
                    return $this->responseRequestSuccess($user);
                } else{
                    return $this->responseRequestError('Cannot create '.$user->getTable());
                }
            }
        }
    }

    private function localUpdateData($user_management, $id)
    {
        $user = User::where('status_id', Status::$ACTIVE)
            ->find($id);

        if (!empty($user)) {
            $user->fullname = $user_management['fullname'];
            $user->email = $user_management['email'];
            $user->username = $user_management['username'];
    
            if (!empty($user_management['password']) && $user_management['password'] != null) {
                $user->password = Hash::make($user_management['password']);
            }
    
            if ($user->save()) {
                $user['user_user_type'] = $user_management['user_user_type'];
                
                return $this->responseRequestSuccess($user);
            } else{
                return $this->responseRequestError('Cannot update '.$user->getTable());
            }
        } else {
            return $this->responseRequestError('User not found');
        }
    } 
}