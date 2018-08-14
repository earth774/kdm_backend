<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerUserAgricultureInfo;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Description of FarmerUserAgricultureInfoController
 *
 * @author Tae
 */
class FarmerUserAgricultureInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new FarmerUserAgricultureInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
        $data = $this->model::join('resource_info', 'farmer_user_agriculture_info.resource_info_id', 'resource_info.id')
                            ->join('farmer_user_cultivated_area_info', 'farmer_user_agriculture_info.farmer_user_cultivated_area_info_id', 'farmer_user_cultivated_area_info.id')
                            ->select('farmer_user_agriculture_info.*', 'resource_info.name as resource_name', 'farmer_user_cultivated_area_info.deed_no as deed_no')
                            ->where('farmer_user_agriculture_info.user_id', $user_id)
                            ->where('farmer_user_agriculture_info.user_type_id', $request->user_type_id)
                            ->where('farmer_user_agriculture_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getData($id){
        $data = $this->model::join('resource_info', 'farmer_user_agriculture_info.resource_info_id', 'resource_info.id')
                            ->join('farmer_user_cultivated_area_info', 'farmer_user_agriculture_info.farmer_user_cultivated_area_info_id', 'farmer_user_cultivated_area_info.id')
                            ->select('farmer_user_agriculture_info.*', 'resource_info.name as resource_name', 'farmer_user_cultivated_area_info.deed_no as deed_no')
                            ->where('farmer_user_agriculture_info.id', $id)
                            ->where('farmer_user_agriculture_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $farmerUserAgricultureInfo = new FarmerUserAgricultureInfo();
        $farmerUserAgricultureInfo->user_id = $request->user_id;
        $farmerUserAgricultureInfo->user_type_id = $request->user_type_id;
        $farmerUserAgricultureInfo->resource_info_id = $request->resource_info_id;
        $farmerUserAgricultureInfo->farmer_user_cultivated_area_info_id = $request->farmer_user_cultivated_area_info_id;
        $farmerUserAgricultureInfo->qty = $request->qty;
        $farmerUserAgricultureInfo->start_datetime = $request->start_datetime;
        $farmerUserAgricultureInfo->end_datetime = $request->end_datetime;
        $farmerUserAgricultureInfo->cost = $request->cost;

        if($farmerUserAgricultureInfo->save()){
            return $this->responseRequestSuccess($farmerUserAgricultureInfo);
        }else{
            return $this->responseRequestError("Cannot create farmer user agriculture info");
        }
    }

    public function updateData(Request $request, $user_id){


        $farmerUserAgricultureInfo = FarmerUserAgricultureInfo::where('user_id',$user_id)
                                                              ->where('user_type_id',$request->user_type_id)
                                                              ->where('status_id', Status::$ACTIVE)->first();
        if( !empty($farmerUserAgricultureInfo) ){
          $farmerUserAgricultureInfo->resource_info_id = $request->resource_info_id;
          $farmerUserAgricultureInfo->farmer_user_cultivated_area_info_id = $request->farmer_user_cultivated_area_info_id;
          $farmerUserAgricultureInfo->qty = $request->qty;
          $farmerUserAgricultureInfo->start_datetime = $request->start_datetime;
          $farmerUserAgricultureInfo->end_datetime = $request->end_datetime;
          $farmerUserAgricultureInfo->cost = $request->cost;

            if($farmerUserAgricultureInfo->save()){
                return $this->responseRequestSuccess($farmerUserAgricultureInfo);
            }else{
                return $this->responseRequestError("Cannot update farmer user agriculture info");
            }
        }else{
            return $this->responseRequestError("Cannot find this farmer user agriculture info");
        }
    }

}
