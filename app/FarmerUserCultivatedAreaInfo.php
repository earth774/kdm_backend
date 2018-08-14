<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of FarmerUserCultivatedAreaInfo
 *
 * @author Tae
 */
class FarmerUserCultivatedAreaInfo extends KdmBaseModel {

    //put your code here
    protected $table = 'farmer_user_cultivated_area_info';
    protected $fillable = [
        'user_id', 'user_type_id', 'name',
        'deed_no', 'gps_lat', 'gps_long', 'area', 'upload_path', 'upload_filename',
        'irrigation_info_id'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
