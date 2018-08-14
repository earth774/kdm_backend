<?php

namespace App\Http\Controllers;

use App\IrrigationDataFeederInfo;
use Illuminate\Http\Request;
use App\Status;

/**
 * Description of IrrigationDataFeederInfoController
 *
 * @author Nat
 */
class IrrigationDataFeederInfoController extends KdmBaseController{
        //put your code here
    public function __construct() {
        parent::__construct(new IrrigationDataFeederInfo());
    }
    

    public function index(){
        $data = $this->model::select('irrigation_data_feeder_info.id',"irrigation_data_feeder_info.data_datetime","irrigation_data_feeder_info.water_percent", 'irrigation_info.name')->join('irrigation_info', 'irrigation_info.id', '=', 'irrigation_data_feeder_info.irrigation_info_id')->where('irrigation_data_feeder_info.status_id', Status::$ACTIVE)->orderBy('irrigation_data_feeder_info.id', 'asc')->get();
        return $this->responseRequestSuccess($data);
    }
     
}
