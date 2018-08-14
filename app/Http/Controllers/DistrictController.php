<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\District;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of DistrictController
 *
 * @author Nat
 */
class DistrictController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new District());
    }

    public function getDestrictList($province_id){
        $data = $this->model::where('province_id', $province_id)->where('status_id', Status::$ACTIVE)->orderBy('dist_name', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){
        $data = new District();
        $data->province_id = $request->province_id;
        $data->dist_name = $request->dist_name;
        if($data->save()){
            return $this->responseRequestSuccess($data);
        }else{
            return $this->responseRequestError("Cannot create sub district");
        }
    }
}
