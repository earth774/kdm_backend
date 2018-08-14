<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerUserCrop;
use Illuminate\Http\Request;
use App\Status;

/**
 * Description of FarmerUserCropController
 *
 * @author Nat
 */
class FarmerUserCropController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new FarmerUserCrop());
    }

    /*public function getDataByUser(Request $request, $user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('user_type_id', $request->user_type_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }*/

    public function getData($id){
        $data = $this->model::join('resource_info','farmer_user_crop.resource_info_id','resource_info.id')
                        ->join('breed_info','farmer_user_crop.breed_info_id','breed_info.id')
                        ->join('farmer_invest_type','farmer_user_crop.farmer_invest_type_id','farmer_invest_type.id')
                        ->select('farmer_user_crop.*','resource_info.name as resource_info_name','breed_info.name as breed_info_name','farmer_invest_type.name as farmer_invest_type_name')
                        ->where('farmer_user_crop.id', $id)
                        ->where('farmer_user_crop.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getDataByUser(Request $request, $user_id) {
        $data = $this->model::join('resource_info', 'farmer_user_crop.resource_info_id', 'resource_info.id')
                        ->select('farmer_user_crop.*', 'resource_info.name as resource_info_name')
                        ->where('farmer_user_crop.user_id', $user_id)
                        ->where('farmer_user_crop.user_type_id', $request->user_type_id)
                        ->where('farmer_user_crop.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }
}
