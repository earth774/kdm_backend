<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerSmeInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of FarmerSmeInfoController
 *
 * @author Tae
 */
class FarmerSmeInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new FarmerSmeInfo());
    }

    public function index(){
        $data = $this->model::join('user', 'farmer_sme_info.user_id', 'user.id')
                            ->select('farmer_sme_info.*', 'user.username as username', "user.email as user_email", "user.fullname as user_fullname")
                            ->where('farmer_sme_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getDataByUser($user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $farmerSmeInfo = new FarmerSmeInfo();
        $farmerSmeInfo->user_id = $request->user_id;
        $farmerSmeInfo->is_company= $request->is_company;
        $farmerSmeInfo->company_name= $request->company_name;
        $farmerSmeInfo->province_id= $request->province_id;
        $farmerSmeInfo->district_id= $request->district_id;
        $farmerSmeInfo->sub_district_id= $request->sub_district_id;
        $farmerSmeInfo->address= $request->address;
        $farmerSmeInfo->tax_id= $request->tax_id;
        $farmerSmeInfo->phone= $request->phone;
        $farmerSmeInfo->email= $request->email;
        $farmerSmeInfo->company_type = $request->company_type;
        $farmerSmeInfo->company_cerificate= $request->company_cerificate;
        $farmerSmeInfo->registered_capital= $request->registered_capital;

        if($farmerSmeInfo->save()){
            return $this->responseRequestSuccess($farmerSmeInfo);
        }else{
            return $this->responseRequestError("Cannot create farmer sme info");
        }
    }

    public function updateData(Request $request, $user_id){
        $farmerSmeInfo = FarmerSmeInfo::where('user_id',$user_id)->where('status_id', Status::$ACTIVE)->first();
        if( !empty($farmerSmeInfo) ){
          $farmerSmeInfo->is_company= $request->is_company;
          $farmerSmeInfo->company_name= $request->company_name;
          $farmerSmeInfo->province_id= $request->province_id;
          $farmerSmeInfo->district_id= $request->district_id;
          $farmerSmeInfo->sub_district_id= $request->sub_district_id;
          $farmerSmeInfo->address= $request->address;
          $farmerSmeInfo->tax_id= $request->tax_id;
          $farmerSmeInfo->phone= $request->phone;
          $farmerSmeInfo->email= $request->email;
          $farmerSmeInfo->company_type = $request->company_type;
          $farmerSmeInfo->company_cerificate= $request->company_cerificate;
          $farmerSmeInfo->registered_capital= $request->registered_capital;

            if($farmerSmeInfo->save()){
                return $this->responseRequestSuccess($farmerSmeInfo);
            }else{
                return $this->responseRequestError("Cannot update farmer sme info");
            }
        }else{
            return $this->responseRequestError("Cannot find this farmer sme info");
        }
    }
}
