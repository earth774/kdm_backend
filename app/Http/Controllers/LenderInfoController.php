<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\LenderInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of LenderInfoController
 *
 * @author Tae
 */
class LenderInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new LenderInfo());
    }

    public function index(){
        $data = $this->model::join('user', 'lender_info.user_id', 'user.id')
                            ->select('lender_info.*', 'user.username as username', "user.email as user_email", "user.fullname as user_fullname")
                            ->where('lender_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getDataByUser($user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $lenderInfo = new LenderInfo();
        $lenderInfo->user_id = $request->user_id;
        $lenderInfo->lender_name = $request->lender_name;
        $lenderInfo->contact_name = $request->contact_name;
        $lenderInfo->contact_phone = $request->contact_phone;
        $lenderInfo->contact_email = $request->contact_email;
        $lenderInfo->province_id = $request->province_id;
        $lenderInfo->district_id = $request->district_id;
        $lenderInfo->sub_district_id = $request->sub_district_id;
        $lenderInfo->address = $request->address;

        if($lenderInfo->save()){
            return $this->responseRequestSuccess($lenderInfo);
        }else{
            return $this->responseRequestError("Cannot create lender info");
        }
    }

    public function updateData(Request $request, $user_id){
        $lenderInfo = LenderInfo::where('user_id',$user_id)->where('status_id', Status::$ACTIVE)->first();
        if( !empty($lenderInfo) ){
          $lenderInfo->lender_name = $request->lender_name;
          $lenderInfo->contact_name = $request->contact_name;
          $lenderInfo->contact_phone = $request->contact_phone;
          $lenderInfo->contact_email = $request->contact_email;
          $lenderInfo->province_id = $request->province_id;
          $lenderInfo->district_id = $request->district_id;
          $lenderInfo->sub_district_id = $request->sub_district_id;
          $lenderInfo->address = $request->address;

            if($lenderInfo->save()){
                return $this->responseRequestSuccess($lenderInfo);
            }else{
                return $this->responseRequestError("Cannot update lender info");
            }
        }else{
            return $this->responseRequestError("Cannot find this lender info");
        }
    }
}
