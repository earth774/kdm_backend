<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\SubDistrict;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of SubDistrictController
 *
 * @author Nat
 */
class SubDistrictController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new SubDistrict());
    }

    public function getSubDestrictList($district_id){
        $data = $this->model::where('district_id', $district_id)->where('status_id', Status::$ACTIVE)->orderBy('sub_district_name', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){
        $data = new SubDistrict();
        $data->district_id = $request->district_id;
        $data->sub_district_name = $request->sub_district_name;
        if($data->save()){
            return $this->responseRequestSuccess($data);
        }else{
            return $this->responseRequestError("Cannot create sub district");
        }
    }
}
