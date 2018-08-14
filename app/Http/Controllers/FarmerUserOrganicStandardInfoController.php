<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerUserOrganicStandardInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of FarmerUserOrganicStandardInfoController
 *
 * @author Tae
 */
class FarmerUserOrganicStandardInfoController extends KdmBaseController {

    //put your code here
    public function __construct() {
        parent::__construct(new FarmerUserOrganicStandardInfo());
    }

    public function getDataByUser(Request $request, $user_id) {
        $data = $this->model::join('farmer_user_crop', 'farmer_user_organic_standard_info.farmer_user_crop_id', 'farmer_user_crop.id')
                        ->select('farmer_user_organic_standard_info.*', 'farmer_user_crop.name as crop_name')
                        ->where('farmer_user_organic_standard_info.user_id', $user_id)
                        ->where('farmer_user_organic_standard_info.user_type_id', $request->user_type_id)
                        ->where('farmer_user_organic_standard_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }
}
