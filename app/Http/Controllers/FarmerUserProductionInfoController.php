<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerUserProductionInfo;
use App\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/**
 * Description of FarmerUserProductionInfoController
 *
 * @author Tae
 */
class FarmerUserProductionInfoController extends KdmBaseController {

    //put your code here
    public function __construct() {
        parent::__construct(new FarmerUserProductionInfo());
    }

    public function getDataByUser(Request $request, $user_id) {
        $data = $this->model::join('product_info', 'farmer_user_production_info.product_info_id', 'product_info.id')
                        ->join('farmer_user_crop','farmer_user_crop.id','farmer_user_production_info.farmer_user_crop_id')
                        ->select('farmer_user_production_info.*', 'product_info.name as product_name')
                        ->where('farmer_user_production_info.user_id', $user_id)
                        ->where('farmer_user_production_info.user_type_id', $request->user_type_id)
                        ->where('farmer_user_crop.status_id', Status::$ACTIVE)
                        // ->where('product_info.status_id', Status::$ACTIVE)
                        ->where('farmer_user_production_info.status_id', Status::$ACTIVE)
                        ->get();
        return $this->responseRequestSuccess($data);
    }
}
