<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use App\Status;
use App\User;
use \App\UserType;
use App\UserRole;
use App\UserUserType;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

/**
 * Description of UserController
 *
 * @author Nat
 */
class UserController extends UserBaseController{

    //put your code here
    public function __construct(){
        parent::__construct(new User());
    }

    protected function jwt(User $user) {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 8*60*60 // Expiration time
        ];

        // As you can see we are passing `JWT_SECRET` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, "JhbGciOiJIUzI1N0eXAiOiJKV1QiLC");
    }

    protected function saveUserType($user_type_list, $id){

        $uCtrl = new UserUserTypeController();

        // Clear data and bulk insert
        $_request = new \stdClass();

        $user_type_list_input = array();
        foreach( $user_type_list as $user_type_id ){
            array_push($user_type_list_input, array("user_id" => $id, "user_type_id" => $user_type_id["user_type_id"]));
        }

        $_request->user_type_list = $user_type_list_input;
        $_request->user_id = $id;

        return $uCtrl->setUserType_int($_request);
    }

    public function getData($id){
        $data = $this->model::where('id', $id)->where('status_id', Status::$ACTIVE)->get();

        // Get user type
        $uCtrl = new UserUserTypeController();
        $ret = $uCtrl->indexByUserId($id);
        $data["user_type_list"] = $ret->original;

        return $this->responseRequestSuccess($data);
    }

    public function authenticate(Request $request){
        
        $user = User::where('username', $request->username)
                    ->where('status_id', Status::$ACTIVE)
                    ->first();

        if( !empty($user) && Hash::check($request->password, $user->password)){

            $token = $this->jwt($user);
            $user["api_token"] = $token;

            return $this->responseRequestSuccess($user);

        }else{
            return $this->responseRequestError("Username or password is incorrect");
        }
    }

    public function genUserTrial(){

        set_time_limit(5000);

        // Contruct user 01 - 77
        for($i = 1; $i <= 77; $i++) {

            $user_code = sprintf('%02d', $i);

            // Construct province code 01 - 40
            for($j = 1; $j <= 40; $j++) {
                $prov_code = sprintf('%02d', $j);

                $user_str = $user_code.$prov_code;

                $user = new User();
                $user->username = $user_str;
                $user->fullname = $user_str;
                $user->email  = $user_str."@mail.com";
                $user->password = Hash::make($user_str);
                $user->user_role_id = UserRole::$UserTrial;
                $user->save();

                $usertype = new UserUserType();
                $usertype->user_id = $user->id;
                $usertype->user_type_id = UserType::$FarmerSME ; // Farmer
                $usertype->save();
            }
        }
    }

    public function addData(Request $request)
    {
        // add user from user management
        if ($request->header('requester') === 'user_management') {
            $user = new User();
            $user->username = $request->username;
            $user->fullname = $request->fullname;
            $user->email  = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_role_id = $request->user_role_id;
            $user->user_management_id = $request->user_management_id;

            if ($user->save()) {
                return $this->responseRequestSuccess($user);
            } else {
                return $this->responseRequestError('Cannot create user');
            }
        }

        $check_user = User::where('username', $request->username)->first();
        if( !empty($check_user) ){
            return $this->responseRequestError("User name is exist");
        }

        $check_user = User::where('email', $request->email)->first();
        if( !empty($check_user) ){
            return $this->responseRequestError("Email is exist");
        }

        $user = new User();
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->email  = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_role_id = $request->user_role_id;

        if($user->save()){

            if($user->user_role_id >= UserRole::$User){

                $ret = $this->saveUserType( $request->user_type_list, $user->id );
                if($ret){
                    
                    $content = 'ลงทะเบียนเรียบร้อยชื่อผู้ใช้งานของคุณคือ '.$user->username.' รหัสผ่านคือ '.$request->password;
                    Mail::raw($content, function($msg) use ($user){ 
                        $msg->subject('ยินดีต้อนรับสู่ระบบตลาดเกษตรดิจิตอลแบบมีส่วนร่วม');
                        $msg->to([$user->email]); 
                        $msg->from(['agriconnect.mulberrysoft@gmail.com']); 

                    });                    
                    
                    return $this->responseRequestSuccess($user);
                }else{
                    return $this->responseRequestError("Cannot create user type");
                }
            }

            return $this->responseRequestSuccess($user);
        }else{
            return $this->responseRequestError("Cannot create user");
        }
    }

    public function updateData(Request $request, $id){

        $user = User::find($id);
        if( !empty($user) ){

            if($user->username != $request->username){
                $check_user = User::where('username', $request->username)->first();
                if( !empty($check_user) ){
                    return $this->responseRequestError("User name is exist");
                }
            }

            if($user->email != $request->email){
                $check_user = User::where('email', $request->email)->first();
                if( !empty($check_user) ){
                    return $this->responseRequestError("Email is exist");
                }
            }

            $user->username = $request->username;
            $user->fullname = $request->fullname;
            $user->email  = $request->email;
              
            if( $request->has("password") ){
                 $user->password = Hash::make($request->password);  
            }

            $user->user_role_id = $request->user_role_id;


            if($user->save()){

                if($user->user_role_id >= UserRole::$User){

                    if( $request->has("user_type_list")){
                        $ret = $this->saveUserType( $request->user_type_list, $user->id );
                        if($ret){
                            return $this->responseRequestSuccess($user);
                        }else{
                            return $this->responseRequestError("Cannot create user type");
                        }                        
                    }

                }else{
                    $uCtrl = new UserUserTypeController();
                    $uCtrl->deleteUserTypeByUserId($user->id);
                }

                return $this->responseRequestSuccess($user);
            }else{
                return $this->responseRequestError("Cannot update user");
            }
        }else{
            return $this->responseRequestError("Cannot find this user");
        }
    }

    public function deleteData($id){
        $data = $this->model::findOrFail($id);
        $data->status_id = Status::$DELETED;
        $data->save();

        $uCtrl = new UserUserTypeController();
        $uCtrl->deleteUserTypeByUserId($id);

        return $this->responseRequestSuccess($data);
    }

    protected function genReToken(User $user)
    {
        return Crypt::encryptString($user->id);
    }

    public function getDataByUserManagementId($user_management_id)
    {
        $user = User::where('user_management_id', $user_management_id)
            ->where('status_id', Status::$ACTIVE)
            ->first();

        if (!empty($user)) {
            $user['api_token'] = $this->jwt($user);
            $user['refresh_token'] = $this->genReToken($user);

            return $this->responseRequestSuccess($user);
        } else {
            return $this->responseRequestError('User not found');
        }
    }

    protected function strRandom($length = 6)
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
    }

    public function facebookAuthen(Request $request)
    {
        if ($this->isUserManagemenSupport() && $request->header('requester') !== 'user_management') {
            return $this->facebookAuthenUserManagement($request);
        }

        $response = null;
        $user = User::where('facebook_id', $request->facebook_id)
            ->where('status_id', Status::$ACTIVE)
            ->first();
        
        if (!empty($user)) {
            $token = $this->jwt($user);
            $user['api_token'] = $token;           
            $response = $this->responseRequestSuccess($user);
        } else {
            $user = User::where('email', $request->email)
                ->where('status_id', Status::$ACTIVE)
                ->first();
            
            if (!empty($user)) {
                $user->facebook_id = $request->facebook_id;

                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $response = $this->responseRequestSuccess($user);
                } else{
                    $response = $this->responseRequestError('Cannot update '.$user->getTable());
                }
            } else {
                $user = new User();
                $user->username = $this->strRandom().'-'.date('YmdHis');
                $user->fullname = $request->fullname;
                $user->email = $request->email;
                $user->facebook_id = $request->facebook_id;
                $user->password = Hash::make($this->strRandom());
                $user->profile_image = $request->profile_image;
                $user->user_management_id = ($request->has('user_management_id')) ? $request->user_management_id : 0;
                
                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $response = $this->responseRequestSuccess($user);
                } else{
                    $response = $this->responseRequestError('Cannot create '.$user->getTable());
                }
            }
        }
        
        return $response;
    }

    public function googleAuthen(Request $request)
    {
        if ($this->isUserManagemenSupport() && $requset->header('requester') !== 'user_management') {
            return $this->googleAuthenUserManagement($request);
        }

        $response = null;
        $user = User::where('google_id', $request->google_id)
            ->where('status_id', Status::$ACTIVE)
            ->first();
        
        if (!empty($user)) {
            $token = $this->jwt($user);
            $user['api_token'] = $token;           
            $response = $this->responseRequestSuccess($user);
        } else {
            $user = User::where('email', $request->email)
                ->where('status_id', Status::$ACTIVE)
                ->first();
            
            if (!empty($user)) {
                $user->google_id = $request->google_id;

                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $response = $this->responseRequestSuccess($user);
                } else{
                    $response = $this->responseRequestError('Cannot update '.$user->getTable());
                }
            } else {
                $user = new User();
                $user->username = $this->strRandom().'-'.date('YmdHis');
                $user->fullname = $request->fullname;
                $user->email = $request->email;
                $user->google_id = $request->google_id;
                $user->password = Hash::make($this->strRandom());
                $user->profile_image = $request->profile_image;
                $user->user_management_id = ($request->has('user_management_id')) ? $request->user_management_id : 0;
                
                if ($user->save()) {
                    $token = $this->jwt($user);
                    $user['api_token'] = $token;
                    $response = $this->responseRequestSuccess($user);
                } else{
                    $response = $this->responseRequestError('Cannot create '.$user->getTable());
                }
            }
        }
        
        return $response;
    }
}
