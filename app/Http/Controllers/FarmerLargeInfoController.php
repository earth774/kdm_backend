<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerLargeInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of FarmerLargeInfoController
 *
 * @author Tae
 */
class FarmerLargeInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new FarmerLargeInfo());
    }

    public function index(){
        $data = $this->model::join('user', 'farmer_large_info.user_id', 'user.id')
                            ->select('farmer_large_info.*', 'user.username as username', "user.email as user_email", "user.fullname as user_fullname")
                            ->where('farmer_large_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getDataByUser($user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $farmerLargeInfo = new FarmerLargeInfo();
        $farmerLargeInfo->user_id = $request->user_id;
        $farmerLargeInfo->is_company= $request->is_company;
        $farmerLargeInfo->company_name= $request->company_name;
        $farmerLargeInfo->province_id= $request->province_id;
        $farmerLargeInfo->district_id= $request->district_id;
        $farmerLargeInfo->sub_district_id= $request->sub_district_id;
        $farmerLargeInfo->address= $request->address;
        $farmerLargeInfo->tax_id= $request->tax_id;
        $farmerLargeInfo->phone= $request->phone;
        $farmerLargeInfo->email= $request->email;
        $farmerLargeInfo->company_type = $request->company_type;
        $farmerLargeInfo->company_cerificate= $request->company_cerificate;
        $farmerLargeInfo->registered_capital= $request->registered_capital;

        if($farmerLargeInfo->save()){
            return $this->responseRequestSuccess($farmerLargeInfo);
        }else{
            return $this->responseRequestError("Cannot create farmer large info");
        }
    }

    public function updateData(Request $request, $user_id){
        $farmerLargeInfo = FarmerLargeInfo::where('user_id',$user_id)->where('status_id', Status::$ACTIVE)->first();
        if( !empty($farmerLargeInfo) ){
          $farmerLargeInfo->is_company= $request->is_company;
          $farmerLargeInfo->company_name= $request->company_name;
          $farmerLargeInfo->province_id= $request->province_id;
          $farmerLargeInfo->district_id= $request->district_id;
          $farmerLargeInfo->sub_district_id= $request->sub_district_id;
          $farmerLargeInfo->address= $request->address;
          $farmerLargeInfo->tax_id= $request->tax_id;
          $farmerLargeInfo->phone= $request->phone;
          $farmerLargeInfo->email= $request->email;
          $farmerLargeInfo->company_type = $request->company_type;
          $farmerLargeInfo->company_cerificate= $request->company_cerificate;
          $farmerLargeInfo->registered_capital= $request->registered_capital;

            if($farmerLargeInfo->save()){
                return $this->responseRequestSuccess($farmerLargeInfo);
            }else{
                return $this->responseRequestError("Cannot update farmer large info");
            }
        }else{
            return $this->responseRequestError("Cannot find this farmer large info");
        }
    }
}
