<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Status;
use App\Province;
use Illuminate\Http\Request;

/**
 * Description of ProvinceController
 *
 * @author Nat
 */
class ProvinceController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new Province());
    }

    public function index(){
        $data = $this->model::where('status_id', Status::$ACTIVE)->orderBy('prov_name', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){
        $data = new Province();
        $data->region_id = $request->region_id;
        $data->prov_name = $request->prov_name;
        if($data->save()){
            return $this->responseRequestSuccess($data);
        }else{
            return $this->responseRequestError("Cannot create province");
        }
    }
}
