<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ThaiCustomsInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of ThaiCustomsInfoController
 *
 * @author Tae
 */
class ThaiCustomsInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new ThaiCustomsInfo());
    }

    public function index(){
        $data = $this->model::join('user', 'thai_customs_info.user_id', 'user.id')
                            ->select('thai_customs_info.*', 'user.username as username', "user.email as user_email", "user.fullname as user_fullname")
                            ->where('thai_customs_info.status_id', Status::$ACTIVE)->get();
        return $this->responseRequestSuccess($data);
    }

    public function getDataByUser($user_id)
    {
      $data = $this->model::where('user_id', $user_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }

    public function updateData(Request $request, $user_id) {
        $getData = ThaiCustomsInfo::where('user_id', $user_id)->where('status_id', Status::$ACTIVE)->first();
        return $this->updateDataInternal($request, $getData);
    }

}
