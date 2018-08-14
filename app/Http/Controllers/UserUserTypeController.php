<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\UserUserType;
use Illuminate\Http\Request;
use App\Status;
/**
 * Description of UserUserTypeController
 *
 * @author Nat
 */
class UserUserTypeController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new UserUserType());
    }

    public function indexByUserId($user_id){
        $data = $this->model::where('user_id', $user_id)
                            ->where('status_id', Status::$ACTIVE)
                            ->get();
        return response()->json($data);
    }

    public function deleteUserTypeByUserId($user_id){
        $this->model::where('user_id', $user_id)->delete();
    }

    public function setUserType_int($Request){
        $user_id = $Request->user_id;
        $user_type_list = $Request->user_type_list;

        $this->model::where('user_id', $user_id)->delete();

        // Insert bulk
        $ret = $this->model::insert($user_type_list);
        return $ret;
    }

    public function setUserType(Request $Request){
        $user_id = $Request->user_id;
        $user_type_list = $Request->user_type_list;

        $this->model::where('user_id', $user_id)->delete();

        // Insert bulk
        $ret = $this->model::insert($user_type_list);
        if($ret){
            return $this->responseRequestSuccess($user_type_list);
        }else{
            return $this->responseRequestError("Cannot add user type");
        }
    }
}
