<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ChartInfo;
use App\Status;
use App\ChartDataItemInfo;

/**
 * Description of ChartInfoController
 *
 * @author nat
 */
class ChartInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new ChartInfo());
    }

    public function getDataByUser($user_id){
        $data = $this->model::where('user_id', $user_id)
                            ->where('status_id', Status::$ACTIVE)
                            ->get();
        return response()->json($data);        
    }
    
    public function getData($id){
        $data = ChartInfo::join('user_type_chart_data', 'chart_info.user_type_chart_data_id', 'user_type_chart_data.id')
                         ->join('chart_data_info_id_type', 'user_type_chart_data.chart_data_info_id_type_id', 'chart_data_info_id_type.id')
                          ->select('chart_info.*', 'chart_data_info_id_type.id as chart_data_info_id_type_id', 'chart_data_info_id_type.name as data_info_name' )                             
                          ->where('chart_info.id', $id)
                          ->where('chart_info.status_id', Status::$ACTIVE)
                          ->first();
        return $this->responseRequestSuccess($data); 
    }
    
    public function deleteData($id){
        $data = $this->model::findOrFail($id);
        $data->status_id = Status::$DELETED;
        $data->save();
        
        ChartDataItemInfo::where('chart_info_id', $id)->delete();
        
        return $this->responseRequestSuccess($data);        
    }
}
