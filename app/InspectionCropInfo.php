<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of InspectionCropInfo
 *
 * @author Nat
 */
class InspectionCropInfo  extends KdmBaseModel{
    //put your code here
    protected $table = 'inspection_crop_info';
     protected $fillable = ['user_id', 'user_type_id', 'farmer_user_crop_id', 'record_datetime',
         'inspection_result', 'inspection_standard_info_id'];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
