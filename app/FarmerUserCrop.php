<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of FarmeruserCrop
 *
 * @author Nat
 */
class FarmerUserCrop extends KdmBaseModel {

    //put your code here
    protected $table = 'farmer_user_crop';
    protected $fillable = ['user_id', 'user_type_id', 'farmer_user_cultivated_area_info_id', 'name',
        'remark', 'img_path', 'img_filename', 'gps_lat', 'gps_long', 'start_datetime', 'end_datetime',
        'area', 'farmer_invest_type_id', 'resource_info_id','breed_info_id','breed_info_explanation',
        'resource_info_explanation'];

    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }

}
