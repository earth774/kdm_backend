<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ChartDataItemInfo;
use Illuminate\Http\Request;
use App\Status;

/**
 * Description of ChartDataItemInfoController
 *
 * @author nat
 */
class ChartDataItemInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new ChartDataItemInfo());
    }
    
    public function getDataByChartInfoId($chart_info_id){
        $data = $this->model::where('chart_info_id', $chart_info_id)
                            ->where('status_id', Status::$ACTIVE)
                            ->get();
        return response()->json($data);        
    }
    
    public function setDataItem(Request $Request){
        $chart_info_id = $Request->chart_info_id;
        $chart_data_item_list = $Request->chart_data_item_list;
        
        $this->model::where('chart_info_id', $chart_info_id)->delete();
        // Insert bulk
        $ret = $this->model::insert($chart_data_item_list);
        if($ret){
            return $this->responseRequestSuccess($chart_data_item_list);
        }else{
            return $this->responseRequestError("Cannot add chart data item");
        }        
    }
}
