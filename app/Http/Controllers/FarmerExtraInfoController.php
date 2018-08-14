<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerExtraInfo;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Description of FarmerExtraInfoController
 *
 * @author Nat
 */
class FarmerExtraInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new FarmerExtraInfo());
    }
    
    public function getSumCostFromName($resourceName){
        return FarmerExtraInfo::select(DB::raw("SUM(cost) as sum_cost"))
                                ->groupBy('resource_name')
                                ->where('resource_name', $resourceName)
                                ->where('status_id', Status::$ACTIVE)
                                ->get();
    }
    
    private function getResourceWhereIn($resourceNameList){
        // `resource_name` in (ยาง, ข้าว, สับปะรด, กาแฟ) 
        $resource_string = "`farmer_extra_info`.`resource_name` in (";
        
        foreach($resourceNameList as $resourceNameItem){
            $resource_string = $resource_string." '$resourceNameItem',";
        }
        $resource_string = rtrim($resource_string,",");        
        return $resource_string. " )";
    }
    
    
    public function getDataFromNameList($mysql_stm, $resourceNameList, $year, $is_custom_sql = false){
        
        if($is_custom_sql){
            $sql_exe = $mysql_stm[0]." ". $mysql_stm[1]. " and ".$this->getResourceWhereIn($resourceNameList)." ".$mysql_stm[2] ;
            return DB::select( $sql_exe );
        }else{
            return FarmerExtraInfo::select(DB::raw( $mysql_stm[0] ))
                                    ->groupBy('farmer_extra_info.resource_name')
                                    ->whereIn('farmer_extra_info.resource_name', $resourceNameList) 
                                    ->where('farmer_extra_info.status_id', Status::$ACTIVE) 
                                    ->whereYear('farmer_extra_info.created_at', $year)
                                    ->get();            
        }
    }    
    
    public function getLineDataFromNameList($mysql_stm, $resourceNameList, $is_custom_sql = false){
        if($is_custom_sql){
            $sql_exe = $mysql_stm[0]." ". $mysql_stm[1]. " and ".$this->getResourceWhereIn($resourceNameList)." ".$mysql_stm[2] ;
            return DB::select( $sql_exe );
        }else{
            return FarmerExtraInfo::select(DB::raw( $mysql_stm[0] ))
                                    ->groupBy('resource_name', 'year')
                                    ->whereIn('resource_name', $resourceNameList)
                                    ->where('status_id', Status::$ACTIVE)
                                    ->get();
        }
    }       
    
    public function getMapDataFromName($mysql_stm, $resourceName, $year, $is_custom_sql = false){
        if($is_custom_sql){
            $sql_exe = $mysql_stm[0]." ". $mysql_stm[1]. " and farmer_extra_info.resource_name=".$resourceName." ".$mysql_stm[2] ;
            return DB::select( $sql_exe );
        }else{
            return FarmerExtraInfo::join('farmer_info', 'farmer_extra_info.user_id', 'farmer_info.user_id')
                                    ->join('province', 'farmer_info.province_id', 'province.id')        
                                    ->select(DB::raw( $mysql_stm[0] ))                                
                                    ->groupBy('farmer_info.province_id')
                                    ->where('farmer_extra_info.resource_name', $resourceName)
                                    ->where('farmer_extra_info.status_id', Status::$ACTIVE)
                                    ->whereYear('farmer_extra_info.created_at', $year)
                                    ->get();
        }
    }   
    

    public function getMapDataAreaFromName($mysql_stm, $resourceName, $year, $is_custom_sql = false){
        if($is_custom_sql){
            $sql_exe = $mysql_stm[0]." ". $mysql_stm[1]. " and farmer_extra_info.resource_name=".$resourceName." ".$mysql_stm[2];
            return DB::select( $sql_exe );
        }else{
            return FarmerExtraInfo::join('farmer_info', 'farmer_extra_info.user_id', 'farmer_info.user_id')
                                    ->join('province', 'farmer_info.province_id', 'province.id')        
                                    ->select(DB::raw($mysql_stm[0] ))                                
                                    ->groupBy('farmer_info.province_id')
                                    ->where('farmer_extra_info.area', 'like', '%ไร่')
                                    ->where('farmer_extra_info.resource_name', $resourceName)
                                    ->where('farmer_extra_info.status_id', Status::$ACTIVE)
                                    ->whereYear('farmer_extra_info.created_at', $year)
                                    ->get();            
        }
    }    

    public function getDataByUser($user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function updateData(Request $request, $user_id){
        $getData = FarmerExtraInfo::where('user_id',$user_id)->where('status_id', Status::$ACTIVE)->first();
        return $this->updateDataInternal($request, $getData);
    }
}
