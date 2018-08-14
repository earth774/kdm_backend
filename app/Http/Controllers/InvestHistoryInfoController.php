<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\InvestHistoryInfo;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


/**
 * Description of InvestHistoryInfoController
 *
 * @author Nat
 */
class InvestHistoryInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new InvestHistoryInfo());
    }

    public function getDataByUser(Request $request, $user_id)
    {
        $data = $this->model::join('farmer_user_crop', 'investor_history_info.farmer_user_crop_id', 'farmer_user_crop.id')
                            ->select('investor_history_info.*', 'farmer_user_crop.name as crop_name')
                            ->where('investor_history_info.user_id', $user_id)
                            ->where('investor_history_info.user_type_id', $request->user_type_id)
                            ->where('investor_history_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getData($id){
        $data = $this->model::join('farmer_user_crop', 'investor_history_info.farmer_user_crop_id', 'farmer_user_crop.id')
                            ->select('investor_history_info.*', 'farmer_user_crop.name as crop_name')
                            ->where('investor_history_info.id', $id)
                            ->where('investor_history_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }
    
}
