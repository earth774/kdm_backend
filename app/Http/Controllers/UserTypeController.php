<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\UserType;

/**
 * Description of UserTypeController
 *
 * @author Nat
 */
class UserTypeController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new UserType());
    }
}
