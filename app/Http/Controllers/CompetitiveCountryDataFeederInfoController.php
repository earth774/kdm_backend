<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use App\CompetitiveCountryDataFeederInfo;
use App\Status;

/**
 * Description of IrrigationInfoController
 *
 * @author Nat
 */
class CompetitiveCountryDataFeederInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new CompetitiveCountryDataFeederInfo());
    }
    
    public function index(){
        $data = $this->model::select('*', 'resource_info.name as resource_info')->join('resource_info', 'resource_info.id', '=', 'competitive_country_data_feeder_info.resource_info_id')->where('competitive_country_data_feeder_info.status_id', Status::$ACTIVE)->orderBy('competitive_country_data_feeder_info.country', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }
    
}
