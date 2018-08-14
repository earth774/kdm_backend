<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of IrrigationDataFeederInfo
 *
 * @author Nat
 */
class WaterQualityDataFeederInfo extends KdmBaseModel {
    //put your code here
    protected $table = 'water_quality_data_feeder_info';

    protected $fillable = [
        'data_datetime', 'gps_lat', 'gps_long', 'city', 'country',
        'irrigation_type_id', 'water_quality_id', 'o2_percent', 'co2_percent',
        'poision_ppm', 'organism_alive', 'water_capacity_metres', 'max_water_capacity_metres',
        'min_water_capacity_metres', 'cubic_water_capacity_metres', 'ph_value',
        'water_speed', 'rain_qty_mm', 'max_temp_celsius', 'min_temp_celsius', 'avg_temp_celsius',
        'sunlight_percent', 'water_volatile_cubic_metres', 'wind_speed', 'wind_direction'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}