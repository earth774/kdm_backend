<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\PlantDiseasesFeederInfo;
use Illuminate\Http\Request;

/**
 * Description of PlantDiseasesFeederInfoController
 *
 * @author Nat
 */
class PlantDiseasesFeederInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new PlantDiseasesFeederInfo());
    }
}
