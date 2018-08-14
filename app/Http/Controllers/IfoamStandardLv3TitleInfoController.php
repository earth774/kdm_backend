<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\IfoamStandardLv3TitleInfo;
use App\Status;
use Illuminate\Http\Request;

/**
 * Description of IfoamStandardLv2TitleInfoController
 *
 * @author Nat
 */
class IfoamStandardLv3TitleInfoController extends KdmBaseController{
    //put your code here
    public function __construct(){
        parent::__construct(new IfoamStandardLv3TitleInfo());
    }

    public function getItemByTitle($title_id){
      $data = $this->model::where('ifoam_standard_lv2_title_info_id', $title_id)
                          ->where('status_id', Status::$ACTIVE)->get();
      return $this->responseRequestSuccess($data);
    }
}
