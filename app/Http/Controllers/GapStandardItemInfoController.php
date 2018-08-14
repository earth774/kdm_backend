<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\GapStandardItemInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of GapStandardItemInfoController
 *
 * @author Nat
 */
class GapStandardItemInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new GapStandardItemInfo());
    }

    public function getItemByTitle($title_id){
      $data = $this->model::where('gap_standard_title_info_id', $title_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }
}
