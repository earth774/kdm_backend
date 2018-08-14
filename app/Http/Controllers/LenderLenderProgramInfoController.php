<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\LenderLenderProgramInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of LenderLenderProgramInfoController
 *
 * @author Tae
 */
class LenderLenderProgramInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new LenderLenderProgramInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('user_type_id', $request->user_type_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $lenderLenderProgramInfo = new LenderLenderProgramInfo();
        $lenderLenderProgramInfo->user_id = $request->user_id;
        $lenderLenderProgramInfo->user_type_id = $request->user_type_id;
        $lenderLenderProgramInfo->name = $request->name;
        $lenderLenderProgramInfo->condition = $request->condition;
        $lenderLenderProgramInfo->minimum = $request->minimum;
        $lenderLenderProgramInfo->maximum = $request->maximum;
        $lenderLenderProgramInfo->interest = $request->interest;
        $lenderLenderProgramInfo->installment_mo = $request->installment_mo;
        $lenderLenderProgramInfo->start_date = $request->start_date;
        $lenderLenderProgramInfo->end_date = $request->end_date;


        if($lenderLenderProgramInfo->save()){
            return $this->responseRequestSuccess($lenderLenderProgramInfo);
        }else{
            return $this->responseRequestError("Cannot create lender lender program info");
        }
    }

    public function updateData(Request $request, $user_id){
        $lenderLenderProgramInfo = LenderLenderProgramInfo::where('user_id',$user_id)->where('user_type_id',$request->user_type_id)
                                           ->where('status_id', Status::$ACTIVE)->first();

        if( !empty($lenderLenderProgramInfo) ){
          $lenderLenderProgramInfo->name = $request->name;
          $lenderLenderProgramInfo->condition = $request->condition;
          $lenderLenderProgramInfo->minimum = $request->minimum;
          $lenderLenderProgramInfo->maximum = $request->maximum;
          $lenderLenderProgramInfo->interest = $request->interest;
          $lenderLenderProgramInfo->installment_mo = $request->installment_mo;
          $lenderLenderProgramInfo->start_date = $request->start_date;
          $lenderLenderProgramInfo->end_date = $request->end_date;

            if($lenderLenderProgramInfo->save()){
                return $this->responseRequestSuccess($lenderLenderProgramInfo);
            }else{
                return $this->responseRequestError("Cannot update lender lender program info");
            }
        }else{
            return $this->responseRequestError("Cannot find this lender lender program info");
        }
    }
}
