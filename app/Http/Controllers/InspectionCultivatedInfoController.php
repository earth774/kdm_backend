<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\InspectionCultivatedInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of InspectionCultivatedInfoController
 *
 * @author Tae
 */
class InspectionCultivatedInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new InspectionCultivatedInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
      $data = $this->model::join('farmer_user_cultivated_area_info', 'inspection_cultivated_info.farmer_user_cultivated_area_info_id', 'farmer_user_cultivated_area_info.id')
                          ->select('inspection_cultivated_info.*', 'farmer_user_cultivated_area_info.deed_no as deed_no')
                          ->where('inspection_cultivated_info.user_id', $user_id)
                          ->where('inspection_cultivated_info.user_type_id', $request->user_type_id)
                          ->where('inspection_cultivated_info.status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function getData($id){
        $data = $this->model::join('farmer_user_cultivated_area_info', 'inspection_cultivated_info.farmer_user_cultivated_area_info_id', 'farmer_user_cultivated_area_info.id')
                     ->select('inspection_cultivated_info.*', 'farmer_user_cultivated_area_info.deed_no as deed_no')
                     ->where('inspection_cultivated_info.id', $id)
                     ->where('inspection_cultivated_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $inspectionCultivatedInfo = new InspectionCultivatedInfo();
        $inspectionCultivatedInfo->user_id = $request->user_id;
        $inspectionCultivatedInfo->user_type_id = $request->user_type_id;
        $inspectionCultivatedInfo->farmer_user_cultivated_area_info_id = $request->farmer_user_cultivated_area_info_id;
        $inspectionCultivatedInfo->datetime = $request->datetime;
        $inspectionCultivatedInfo->inspection_result = $request->inspection_result;


        if($inspectionCultivatedInfo->save()){
            return $this->responseRequestSuccess($inspectionCultivatedInfo);
        }else{
            return $this->responseRequestError("Cannot create inspection cultivated info");
        }
    }

    public function updateData(Request $request, $user_id){
        $inspectionCultivatedInfo = InspectionCultivatedInfo::where('user_id',$user_id)->where('user_type_id',$request->user_type_id)
                                           ->where('status_id', Status::$ACTIVE)->first();
  
        if( !empty($inspectionCultivatedInfo) ){
          $inspectionCultivatedInfo->farmer_user_cultivated_area_info_id = $request->farmer_user_cultivated_area_info_id;
          $inspectionCultivatedInfo->datetime = $request->datetime;
          $inspectionCultivatedInfo->inspection_result = $request->inspection_result;

            if($inspectionCultivatedInfo->save()){
                return $this->responseRequestSuccess($inspectionCultivatedInfo);
            }else{
                return $this->responseRequestError("Cannot update inspection cultivated info");
            }
        }else{
            return $this->responseRequestError("Cannot find this inspection cultivated info");
        }
    }
}
