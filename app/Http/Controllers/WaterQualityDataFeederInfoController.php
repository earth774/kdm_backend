<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\WaterQualityDataFeederInfo;
use Illuminate\Http\Request;
use App\Status;

/**
 * Description of WaterQualityDataFeederInfoController
 *
 * @author Nat
 */
class WaterQualityDataFeederInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new WaterQualityDataFeederInfo());
    }

    public function index(){
        $data = $this->model::join('water_quality', 'water_quality_data_feeder_info.water_quality_id', 'water_quality.id')
                             ->select('water_quality_data_feeder_info.*', 'water_quality.name as water_quality_name')
                             ->where('water_quality_data_feeder_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getData($id){
        $data = $this->model::join('water_quality', 'water_quality_data_feeder_info.water_quality_id', 'water_quality.id')
                             ->join('irrigation_type', 'water_quality_data_feeder_info.irrigation_type_id', 'irrigation_type.id')
                             ->select('water_quality_data_feeder_info.*', 'water_quality.name as water_quality_name', 'irrigation_type.name as irrigation_type_name')
                             ->where('water_quality_data_feeder_info.id', $id)
                             ->where('water_quality_data_feeder_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }
}
