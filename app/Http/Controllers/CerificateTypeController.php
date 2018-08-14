<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\Status;
use App\CerificateType;
use Illuminate\Http\Request;

/**
 * Description of CerificateTypeController
 *
 * @author Nat
 */
class CerificateTypeController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new CerificateType());
    }

    public function addData(Request $request){
        $cerificateType = new CerificateType();
        $cerificateType->name = $request->name;

        if($cerificateType->save()){
            return $this->responseRequestSuccess($cerificateType);
        }else{
            return $this->responseRequestError("Cannot create cerificate type");
        }
    }

    public function updateData(Request $request, $id){
        $cerificateType = CerificateType::where('id',$id)->where('status_id', Status::$ACTIVE)->first();
        if( !empty($cerificateType) ){
            $cerificateType->name = $request->name;
            if($cerificateType->save()){
                return $this->responseRequestSuccess($cerificateType);
            }else{
                return $this->responseRequestError("Cannot update cerificate type");
            }
        }else{
            return $this->responseRequestError("Cannot find this cerificate type");
        }
    }
}
