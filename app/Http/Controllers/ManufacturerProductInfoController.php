<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ManufacturerProductInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of ManufacturerProductInfoController
 *
 * @author Tae
 */
class ManufacturerProductInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new ManufacturerProductInfo());
    }

    public function index(){
        $ManufacturerProductInfo = $this->model::where('status_id', Status::$ACTIVE)->get();

        $new_ManufacturerProductInfo = array();
        array_push($new_ManufacturerProductInfo, array("id" => 0, "product_name" => "อื่นๆ"));
        foreach($ManufacturerProductInfo as $item){
            array_push($new_ManufacturerProductInfo, $item);
        }
        
        return $this->responseRequestSuccess($new_ManufacturerProductInfo);
    }

    public function getDataByUser(Request $request, $user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('user_type_id', $request->user_type_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }
}
