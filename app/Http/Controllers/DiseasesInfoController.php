<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use App\DiseasesInfo;
use App\Status;


/**
 * Description of IrrigationInfoController
 *
 * @author Nat
 */
class DiseasesInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new DiseasesInfo());
    }
    
    public function index(){
        $data = $this->model::select('diseases_info.id', 'resource_info.name as resource_info',
                                     'diseases_info.name','diseases_info.remark')
                            ->join('resource_info', 'resource_info.id', '=', 'diseases_info.resource_info_id')
                            ->where('diseases_info.status_id', Status::$ACTIVE)
                            ->orderBy('diseases_info.name', 'asc')
                            ->get();
        return $this->responseRequestSuccess($data);
    }
}

