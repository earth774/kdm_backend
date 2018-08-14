<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Http\Controllers;

use App\PlantDiseasesCountryDataFeederInfo;
use App\Status;

/**
 * Description of IrrigationInfoController
 *
 * @author Nat
 */
class PlantDiseasesCountryDataFeederInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new PlantDiseasesCountryDataFeederInfo());
    }
    
    public function index(){
        $data = $this->model::select("*", 'diseases_info.name as diseases_info')->join('diseases_info', 'diseases_info.id', '=', 'plant_diseases_country_data_feeder_info.diseases_info_id')->where('plant_diseases_country_data_feeder_info.status_id', Status::$ACTIVE)->orderBy('plant_diseases_country_data_feeder_info.country', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }
}

