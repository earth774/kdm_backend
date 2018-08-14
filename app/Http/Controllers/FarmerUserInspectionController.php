<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\FarmerUserInspection;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of FarmerUserInspectionController
 *
 * @author Tae
 */
class FarmerUserInspectionController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new FarmerUserInspection());
    }

    public function getDataByUser(Request $request, $user_id)
    {
        $data = $this->model::join('inspection_body_info', 'farmer_user_inspection.inspection_body_info_id', 'inspection_body_info.id')
                     ->join('user', 'inspection_body_info.user_id', 'user.id')
                     ->select('farmer_user_inspection.*', 'user.fullname as fullname')
                     ->where('farmer_user_inspection.user_id', $user_id)
                     ->where('farmer_user_inspection.user_type_id', $request->user_type_id)
                     ->where('farmer_user_inspection.status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function getData($id){
        $data = $this->model::join('inspection_body_info', 'farmer_user_inspection.inspection_body_info_id', 'inspection_body_info.id')
                     ->join('user', 'inspection_body_info.user_id', 'user.id')
                     ->select('farmer_user_inspection.*', 'user.fullname as fullname')
                     ->where('farmer_user_inspection.id', $id)
                     ->where('farmer_user_inspection.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function addData(Request $request){

        $farmerUserInspection = new FarmerUserInspection();
        $farmerUserInspection->user_id = $request->user_id;
        $farmerUserInspection->user_type_id = $request->user_type_id;
        $farmerUserInspection->inspection_body_info_id = $request->inspection_body_info_id;


        if($farmerUserInspection->save()){
            return $this->responseRequestSuccess($farmerUserInspection);
        }else{
            return $this->responseRequestError("Cannot create farmer user inspection");
        }
    }

    public function updateData(Request $request, $user_id){
        $farmerUserInspection = FarmerUserInspection::where('user_id',$user_id)->where('user_type_id',$request->user_type_id)
                                                    ->where('status_id', Status::$ACTIVE)->first();
        if( !empty($farmerUserInspection) ){
            $farmerUserInspection->inspection_body_info_id = $request->inspection_body_info_id;

            if($farmerUserInspection->save()){
                return $this->responseRequestSuccess($farmerUserInspection);
            }else{
                return $this->responseRequestError("Cannot update farmer user inspection");
            }
        }else{
            return $this->responseRequestError("Cannot find this farmer user inspection");
        }
    }
}
