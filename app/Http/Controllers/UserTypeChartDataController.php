<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\UserTypeChartData;
use App\Status;

/**
 * Description of UserTypeChartDataController
 *
 * @author nat
 */
class UserTypeChartDataController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new UserTypeChartData());
    }
    
    public function getByUserType($user_type_id){
        $data = $this->model::join('chart_data_info_id_type', 'user_type_chart_data.chart_data_info_id_type_id', 'chart_data_info_id_type.id')
                            ->select('user_type_chart_data.*', 'chart_data_info_id_type.name as data_info_name')
                            ->where('user_type_chart_data.user_type_id', $user_type_id)
                            ->where('user_type_chart_data.status_id', Status::$ACTIVE)
                            ->get();
        return response()->json($data);        
    }
}
