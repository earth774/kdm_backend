<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;


use App\InspectionCropInfo;
use Illuminate\Http\Request;
use App\Status;

/**
 * Description of InspectionCropInfoController
 *
 * @author Nat
 */
class InspectionCropInfoController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new InspectionCropInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('user_type_id', $request->user_type_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }
}
