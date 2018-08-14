<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\UserRole;
use App\Status;

/**
 * Description of UserRoleController
 *
 * @author Nat
 */
class UserRoleController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new UserRole());
    }

    public function index(){
        $data = $this->model::where('status_id', Status::$ACTIVE)
                            ->where('id', '!=', UserRole::$SuperAdmin)
                            ->get();
        return $this->responseRequestSuccess($data);
    }
}
