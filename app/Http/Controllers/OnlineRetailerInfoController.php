<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\OnlineRetailerInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of OnlineRetailerInfoController
 *
 * @author Nat
 */
class OnlineRetailerInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new OnlineRetailerInfo());
    }

    public function index(){
        $data = $this->model::join('user', 'online_retailer_info.user_id', 'user.id')
                            ->select('online_retailer_info.*', 'user.username as username', "user.email as user_email", "user.fullname as user_fullname")
                            ->where('online_retailer_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getDataByUser($user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

     public function addData(Request $request){
         $onlineRetailerInfo = new OnlineRetailerInfo();
         $onlineRetailerInfo->user_id = $request->user_id;
         $onlineRetailerInfo->province_id = $request->province_id;
         $onlineRetailerInfo->district_id = $request->district_id;
         $onlineRetailerInfo->sub_district_id = $request->sub_district_id;
         $onlineRetailerInfo->phone = $request->phone;
         $onlineRetailerInfo->address = $request->address;
         $onlineRetailerInfo->shop_name = $request->shop_name;
         $onlineRetailerInfo->shop_website = $request->shop_website;
         $onlineRetailerInfo->shop_email = $request->shop_email;
         $onlineRetailerInfo->shop_line = $request->shop_line;
         $onlineRetailerInfo->shop_facebook = $request->shop_facebook;
         $onlineRetailerInfo->shop_ig = $request->shop_ig;
         $onlineRetailerInfo->shop_phone = $request->shop_phone;

        if($onlineRetailerInfo->save()){
            return $this->responseRequestSuccess($onlineRetailerInfo);
        }else{
            return $this->responseRequestError("Cannot create Wholesaler");
        }
     }

     public function updateData(Request $request, $user_id){
        $getOnlineRetailerInfo = OnlineRetailerInfo::where('user_id',$user_id)
                                                    ->where('status_id', Status::$ACTIVE)->first();
        if(!empty($getOnlineRetailerInfo)){
            $getOnlineRetailerInfo->user_id = $user_id;
            $getOnlineRetailerInfo->province_id = $request->province_id;
            $getOnlineRetailerInfo->district_id = $request->district_id;
            $getOnlineRetailerInfo->sub_district_id = $request->sub_district_id;
            $getOnlineRetailerInfo->phone = $request->phone;
            $getOnlineRetailerInfo->address = $request->address;
            $getOnlineRetailerInfo->shop_name = $request->shop_name;
            $getOnlineRetailerInfo->shop_website = $request->shop_website;
            $getOnlineRetailerInfo->shop_email = $request->shop_email;
            $getOnlineRetailerInfo->shop_line = $request->shop_line;
            $getOnlineRetailerInfo->shop_facebook = $request->shop_facebook;
            $getOnlineRetailerInfo->shop_ig = $request->shop_ig;
            $getOnlineRetailerInfo->shop_phone = $request->shop_phone;


            if($getOnlineRetailerInfo->save()){
                return $this->responseRequestSuccess($getOnlineRetailerInfo);
            }else{
                return $this->responseRequestError("Cannot update online retailer");
            }

        }else{
            return $this->responseRequestError("Cannot find this online retailer");
        }
     }
}
