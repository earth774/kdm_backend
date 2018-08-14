<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\BreedInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of BreedInfoController
 *
 * @author Nat
 */
class BreedInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new BreedInfo());
    }

    public function getBreedList($resource_info_id){
        $new_data = array();
        if($resource_info_id != "undefined" && $resource_info_id != "null"){
            array_push($new_data, array("id" => 0, "resource_info_id" => 0, "name" => "อื่นๆ"));
            // if($resource_info_id != 0){
                $data = $this->model::where('resource_info_id', $resource_info_id)->where('status_id', Status::$ACTIVE)->get();
                foreach($data as $item){
                    array_push($new_data, $item);
                }
            // }
        }
        return $this->responseRequestSuccess($new_data);
    }

}
