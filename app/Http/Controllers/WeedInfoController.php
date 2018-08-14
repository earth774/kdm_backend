<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use App\WeedInfo;
use App\Status;

/**
 * Description of IrrigationInfoController
 *
 * @author Nat
 */
class WeedInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new WeedInfo());
    }
    
    public function index(){
        $data = $this->model::select('weed_info.id', 'resource_info.name as resource_info','weed_info.name','weed_info.remark')->join('resource_info', 'resource_info.id', '=', 'weed_info.resource_info_id')->where('weed_info.status_id', Status::$ACTIVE)->orderBy('weed_info.name', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }
    
}
