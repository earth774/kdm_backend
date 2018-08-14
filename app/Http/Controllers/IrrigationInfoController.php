<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\IrrigationInfo;
use App\Status;

/**
 * Description of IrrigationInfoController
 *
 * @author Nat
 */
class IrrigationInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new IrrigationInfo());
    }
    
    public function index(){
        $data = $this->model::select('irrigation_info.id', 'irrigation_type.name as irrigation_type','irrigation_info.name')->join('irrigation_type', 'irrigation_type.id', '=', 'irrigation_info.irrigation_type_id')->where('irrigation_info.status_id', Status::$ACTIVE)->orderBy('irrigation_info.name', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }
}
