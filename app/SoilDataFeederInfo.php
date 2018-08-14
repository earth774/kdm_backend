<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of SoilDataFeederInfo
 *
 * @author Nat
 */
class SoilDataFeederInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'soil_data_feeder_info';

    protected $fillable = ['data_datetime', 'gps_lat', 'gps_long', 'city', 'country',
        'soil_area_type_id', 'soil_type_id', 'mineral_score', 'crumbly_score', 'ph_value',
        'rain_qty_mmpm', 'temp_celsius_max', 'temp_celsius_avg', 'temp_celsius_min', 'sunlight_percent',
        'wind_speed', 'wind_direction_degree'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
