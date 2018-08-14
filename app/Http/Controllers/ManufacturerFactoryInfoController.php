<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ManufacturerFactoryInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of ManufacturerFactoryInfoController
 *
 * @author Tae
 */
class ManufacturerFactoryInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new ManufacturerFactoryInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('user_type_id', $request->user_type_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $manufacturerFactoryInfo = new ManufacturerFactoryInfo();
        $manufacturerFactoryInfo->user_id = $request->user_id;
        $manufacturerFactoryInfo->user_type_id = $request->user_type_id;
        $manufacturerFactoryInfo->name = $request->name;
        $manufacturerFactoryInfo->address = $request->address;


        if($manufacturerFactoryInfo->save()){
            return $this->responseRequestSuccess($manufacturerFactoryInfo);
        }else{
            return $this->responseRequestError("Cannot create manufacturer factory info");
        }
    }

    public function updateData(Request $request, $user_id){
        $manufacturerFactoryInfo = ManufacturerFactoryInfo::where('user_id',$user_id)->where('user_type_id',$request->user_type_id)
                                           ->where('status_id', Status::$ACTIVE)->first();
        //return $getImportItemInfo;
        if( !empty($manufacturerFactoryInfo) ){
          $manufacturerFactoryInfo->name = $request->name;
          $manufacturerFactoryInfo->address = $request->address;

            if($manufacturerFactoryInfo->save()){
                return $this->responseRequestSuccess($manufacturerFactoryInfo);
            }else{
                return $this->responseRequestError("Cannot update manufacturer factory info");
            }
        }else{
            return $this->responseRequestError("Cannot find this manufacturer factory info");
        }
    }
}
