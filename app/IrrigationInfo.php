<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of IrrigationInfo
 *
 * @author Nat
 */
class IrrigationInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'irrigation_info';

    protected $fillable = [
        'name','gps_lat', 'gps_long', 'capacity', 'surface_area',
        'irrigation_type_id', 'remark'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
