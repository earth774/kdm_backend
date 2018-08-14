<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerUserCommitteeInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of FarmerUserCommitteeInfoController
 *
 * @author Tae
 */
class FarmerUserCommitteeInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new FarmerUserCommitteeInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('user_type_id', $request->user_type_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $farmerUserCommitteeInfo = new FarmerUserCommitteeInfo();
        $farmerUserCommitteeInfo->user_id = $request->user_id;
        $farmerUserCommitteeInfo->user_type_id = $request->user_type_id;
        $farmerUserCommitteeInfo->name= $request->name;
        $farmerUserCommitteeInfo->province_id= $request->province_id;
        $farmerUserCommitteeInfo->district_id= $request->district_id;
        $farmerUserCommitteeInfo->sub_district_id= $request->sub_district_id;
        $farmerUserCommitteeInfo->address= $request->address;
        $farmerUserCommitteeInfo->phone= $request->phone;
        $farmerUserCommitteeInfo->tax_id= $request->tax_id;

        if($farmerUserCommitteeInfo->save()){
            return $this->responseRequestSuccess($farmerUserCommitteeInfo);
        }else{
            return $this->responseRequestError("Cannot create farmer user committtee info");
        }
    }

    public function updateData(Request $request, $user_id){
        $farmerUserCommitteeInfo = FarmerUserCommitteeInfo::where('user_id',$user_id)->where('user_type_id',$request->user_type_id)
                                                          ->where('status_id', Status::$ACTIVE)->first();
        if( !empty($farmerUserCommitteeInfo) ){
          $farmerUserCommitteeInfo->name= $request->name;
          $farmerUserCommitteeInfo->province_id= $request->province_id;
          $farmerUserCommitteeInfo->district_id= $request->district_id;
          $farmerUserCommitteeInfo->sub_district_id= $request->sub_district_id;
          $farmerUserCommitteeInfo->address= $request->address;
          $farmerUserCommitteeInfo->phone= $request->phone;
          $farmerUserCommitteeInfo->tax_id= $request->tax_id;

            if($farmerUserCommitteeInfo->save()){
                return $this->responseRequestSuccess($farmerUserCommitteeInfo);
            }else{
                return $this->responseRequestError("Cannot update farmer committtee info");
            }
        }else{
            return $this->responseRequestError("Cannot find this farmer committtee info");
        }
    }
}
