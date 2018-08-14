<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerCooperativeInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of FarmerCooperativeInfoController
 *
 * @author Tae
 */
class FarmerCooperativeInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new FarmerCooperativeInfo());
    }

    public function index(){
        $data = $this->model::join('user', 'farmer_cooperative_info.user_id', 'user.id')
                            ->select('farmer_cooperative_info.*', 'user.username as username', "user.email as user_email", "user.fullname as user_fullname")
                            ->where('farmer_cooperative_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getDataByUser($user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $farmerCooperativeInfo = new FarmerCooperativeInfo();
        $farmerCooperativeInfo->user_id = $request->user_id;
        $farmerCooperativeInfo->name= $request->name;
        $farmerCooperativeInfo->province_id= $request->province_id;
        $farmerCooperativeInfo->district_id= $request->district_id;
        $farmerCooperativeInfo->sub_district_id= $request->sub_district_id;
        $farmerCooperativeInfo->address= $request->address;
        $farmerCooperativeInfo->phone= $request->phone;
        $farmerCooperativeInfo->email= $request->email;
        $farmerCooperativeInfo->president_name= $request->president_name;
        $farmerCooperativeInfo->number_member= $request->number_member;

        if($farmerCooperativeInfo->save()){
            return $this->responseRequestSuccess($farmerCooperativeInfo);
        }else{
            return $this->responseRequestError("Cannot create farmer cooperative info");
        }
    }

    public function updateData(Request $request, $user_id){
        $farmerCooperativeInfo = FarmerCooperativeInfo::where('user_id',$user_id)->where('status_id', Status::$ACTIVE)->first();
        if( !empty($farmerCooperativeInfo) ){
          $farmerCooperativeInfo->name= $request->name;
          $farmerCooperativeInfo->province_id= $request->province_id;
          $farmerCooperativeInfo->district_id= $request->district_id;
          $farmerCooperativeInfo->sub_district_id= $request->sub_district_id;
          $farmerCooperativeInfo->address= $request->address;
          $farmerCooperativeInfo->phone= $request->phone;
          $farmerCooperativeInfo->email= $request->email;
          $farmerCooperativeInfo->president_name= $request->president_name;
          $farmerCooperativeInfo->number_member= $request->number_member;


            if($farmerCooperativeInfo->save()){
                return $this->responseRequestSuccess($farmerCooperativeInfo);
            }else{
                return $this->responseRequestError("Cannot update farmer cooperative info");
            }
        }else{
            return $this->responseRequestError("Cannot find this farmer cooperative info");
        }
    }
}
