<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;
use App\ChartInfo;
use App\ChartDataItemInfo;
use App\UserTypeChartData;

/**
 * Description of ReportController
 *
 * @author nat
 */
class ReportController extends KdmBaseController {

    public function getDataList(Request $request){
        $chart_info_id = $request->chart_info_id;
        $year = $request->year;

        $data = ChartInfo::join('chart_type', 'chart_info.chart_type_id', 'chart_type.id')
                        ->join('user_type_chart_data', 'chart_info.user_type_chart_data_id', 'user_type_chart_data.id')
                        ->select('chart_info.*',
                                'chart_type.name as chart_type_name', 
                                'user_type_chart_data.name as user_type_chart_data_name', 
                                'user_type_chart_data.nameEn as user_type_chart_data_nameEn',
                                'user_type_chart_data.mysql_statement as user_type_chart_data_mysql_statement',
                                'user_type_chart_data.mysql_statement_map as user_type_chart_data_mysql_statement_map')
                        ->where('chart_info.id', $chart_info_id)
                        ->where('chart_info.status_id', Status::$ACTIVE)
                        ->first();
        
        $parent_list = array();
        $main_list = array();
        
        $this->getDataChart($data, $year, $main_list);
        array_push($parent_list, array("chart" => $main_list));
        
        return $this->responseRequestSuccess($parent_list);        
    }
    
    public function getDataListByUserId($user_id) {

        // 1. Query all chart info if by user
        $chart_data = ChartInfo::join('chart_type', 'chart_info.chart_type_id', 'chart_type.id')
                ->join('user_type_chart_data', 'chart_info.user_type_chart_data_id', 'user_type_chart_data.id')
                ->select('chart_info.*', 
                        'chart_type.name as chart_type_name', 
                        'user_type_chart_data.name as user_type_chart_data_name', 
                        'user_type_chart_data.nameEn as user_type_chart_data_nameEn',
                        'user_type_chart_data.mysql_statement as user_type_chart_data_mysql_statement',
                        'user_type_chart_data.mysql_statement_map as user_type_chart_data_mysql_statement_map')
                ->where('chart_info.user_id', $user_id)
                ->where('chart_info.status_id', Status::$ACTIVE)
                ->get();

        $main_list = array(); // For user type chart data
        $parent_list = array(); // For all chart displaying

        // 2. Get user_type_chart_data_id to query data specific by type
        foreach ($chart_data as $row) {
            $this->getDataChart($row, 2017, $main_list);// TODO : Change later
        }

        array_push($parent_list, array("chart" => $main_list));
        return $this->responseRequestSuccess($parent_list);
    }    
    
    private function getFarmerExtraInfo($chart_type_id, 
                                        $chart_item_data, 
                                        $user_type_chart_data_nameEn,
                                        $user_type_chart_data_mysql_stm,
                                        $year,
                                        $is_custom_sql = false) {
        // Get array of resoure data
        $data_info_id_list = array();
        $id_name_dict = array();
        foreach ($chart_item_data as $data) {
            array_push($data_info_id_list, $data["data_info_id"]);
        }

        // Get name list from resource
        $rsCtrl = new ResourceInfoController();
        $rs_data = $rsCtrl->getNameList($data_info_id_list);

        // Get array of resource name
        $resourceNameList = array();
        foreach ($rs_data as $data) {
            array_push($resourceNameList, $data["name"]);
            $id_name_dict[$data["id"]] = $data["name"];
        }

        // Arrange by id and return list
        $item_list = array();
        
        $fxCtrl = new FarmerExtraInfoController();
        
        // For chart type line, column and pie are same
        if ($chart_type_id >= 1 && $chart_type_id <= 3) {
            if($chart_type_id == 1){
                $fx_data = $fxCtrl->getLineDataFromNameList($user_type_chart_data_mysql_stm, $resourceNameList, $is_custom_sql);
            }else{
                $fx_data = $fxCtrl->getDataFromNameList($user_type_chart_data_mysql_stm, $resourceNameList, $year, $is_custom_sql);
            }   
            
            foreach ($chart_item_data as $data) {

                foreach ($fx_data as $fx_data_item) {
                    if ($id_name_dict[$data["data_info_id"]] == $fx_data_item->resource_name) {

                        $item_data = $fx_data_item->result;
                        $temp_item_data = $item_data;
                        
                        if($is_custom_sql == 1){
                            $item_x_axis = $fx_data_item->x_axis;
                            $temp_item_x_axis = $item_x_axis;                            
                        }else{
                            $item_x_axis = 0;
                            $temp_item_x_axis = 0;
                        }
                        
                        if ($chart_type_id != 3) {
                            $item_data = array($item_data);
                            if($is_custom_sql == 1){
                                $item_x_axis = array($item_x_axis);
                            }else{
                                $item_x_axis = array();
                            }
                        }
                        
                        $item_exist =false;
                        foreach($item_list as $key =>$item_check){
                            if($item_check["item_name"] == $fx_data_item->resource_name){
                                $item_exist = true;
                                break;
                            }
                        }
                        
                        if(!$item_exist){
                            array_push($item_list, array("item_name"  => $fx_data_item->resource_name,
                                                         "item_color" => $data["color"],
                                                         "item_data"  => $item_data,
                                                         "item_x_axis"  => $item_x_axis));  
                        }else{
                            array_push($item_list[$key]["item_data"], $temp_item_data);
                            array_push($item_list[$key]["item_x_axis"], $temp_item_x_axis);
                        }
                    }
                }
            }
        } else { // map data follow province
                if ($user_type_chart_data_nameEn == UserTypeChartData::$FARMER_EXTRA_INFO_AREA) {
                    $fx_data = $fxCtrl->getMapDataAreaFromName($user_type_chart_data_mysql_stm, $resourceNameList[0], $year, $is_custom_sql);
                } else{
                    $fx_data = $fxCtrl->getMapDataFromName($user_type_chart_data_mysql_stm, $resourceNameList[0], $year, $is_custom_sql);
                }
                        
                // Construct output for map data
                foreach($fx_data as $fx_data_item){
                
                $item_data = $fx_data_item->result;            
                if($item_data == 0){
                    continue;
                }
                array_push($item_list, array($fx_data_item->chart_code, $item_data));
            }
        }
        
        return $item_list;
    }

    private function getDataChart($row, $year, &$main_list) {

        $year_list = array(2017, 2018);    
        $item_list = array(); // For chart data item
        $user_type_chart_data_nameEn = $row["user_type_chart_data_nameEn"];
        
        $chart_item_data = ChartDataItemInfo::select('chart_data_item_info.*')
                ->where('chart_data_item_info.chart_info_id', $row["id"])
                ->where('chart_data_item_info.status_id', Status::$ACTIVE)
                ->orderBy('chart_data_item_info.order', 'asc')
                ->get();        
        
        $user_type_chart_data_mysql_stm = array();
        
        // check custom sql enable ?
        if( $row["is_custom_sql"] == 1){
            array_push($user_type_chart_data_mysql_stm, $row["custom_mysql_statement_select"]);
            array_push($user_type_chart_data_mysql_stm, $row["custom_mysql_statement_where"]);
            array_push($user_type_chart_data_mysql_stm, $row["custom_mysql_statement_groupby"]); 
        }else{
            if($row["chart_type_id"] == 4){
                array_push($user_type_chart_data_mysql_stm, $row["user_type_chart_data_mysql_statement_map"]);
            }else{ 
                array_push($user_type_chart_data_mysql_stm, $row["user_type_chart_data_mysql_statement"]);
            }            
        }

        // add sql statement to array 
        if($user_type_chart_data_nameEn == UserTypeChartData::$FARMER_EXTRA_INFO_COST ||
           $user_type_chart_data_nameEn == UserTypeChartData::$FARMER_EXTRA_INFO_MERCHANT_NUMNBER ||
           $user_type_chart_data_nameEn == UserTypeChartData::$FARMER_EXTRA_INFO_PROFIT ||
           $user_type_chart_data_nameEn == UserTypeChartData::$FARMER_EXTRA_INFO_REVENUE ||
           $user_type_chart_data_nameEn == UserTypeChartData::$FARMER_EXTRA_INFO_AREA ){
            
           $item_list = $this->getFarmerExtraInfo($row["chart_type_id"], 
                                                  $chart_item_data, 
                                                  $user_type_chart_data_nameEn,
                                                  $user_type_chart_data_mysql_stm,
                                                  $year,
                                                  $row["is_custom_sql"]);
        }
        
        // Add item_list to main_list
        if ($row["chart_type_id"] == 1 || $row["chart_type_id"] == 2) {

            if($row["is_custom_sql"] ==  1 ){
                
                //print_r($item_list);
                
                $cate = $item_list[0]["item_x_axis"];
            }else{
                if($row["chart_type_id"] == 1){
                    $cate = $year_list;
                }else{
                    $cate = array($year);
                }                
            }
            
            array_push($main_list, array("chart_info_id" => $row["id"],
                "chart_type" => $row["chart_type_id"] == 1 ? "line" : "column",
                "chart_name" => $row["name"],
                "year_list" =>  $row["is_custom_sql"] == 1 ? array() : $year_list,
                "year" =>  $row["is_custom_sql"] == 1 ? "" : $year,
                "title_y" => $row["user_type_chart_data_name"],
                "title_x" =>  $row["is_custom_sql"] ==  1 ?  $row["custom_mysql_x_axis_field"] : "year",
                "items" => $item_list,
                "category" => $cate));
        } else if ($row["chart_type_id"] == 3) {
            array_push($main_list, array("chart_info_id" => $row["id"],
                "chart_type" => "pie",
                "chart_name" => $row["name"],
                "year_list" => $row["is_custom_sql"] == 1 ? array() : $year_list,
                "year" => $row["is_custom_sql"] == 1 ? "" : $year,
                "title" => $row["user_type_chart_data_name"],
                "items" => $item_list));
        } else if ($row["chart_type_id"] == 4) {
            array_push($main_list, array("chart_info_id" => $row["id"],
                "chart_type" => "map",
                "chart_name" => $row["name"],
                "year_list" => $row["is_custom_sql"] == 1 ? array() : $year_list,
                "year" => $row["is_custom_sql"] == 1 ? "" : $year,
                "title" => $row["user_type_chart_data_name"],
                "item_color" => $chart_item_data[0]->color,
                "items" => $item_list));
        }
    } 
}
