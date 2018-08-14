<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of WeatherDataFeederInfo
 *
 * @author Nat
 */
class WeatherDataFeederInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'weather_data_feeder_info';

    protected $fillable = [
        'data_datetime', 'gps_lat', 'gps_long', 'city', 'country', 'weather_type',
        'is_disaster', 'damage_degree', 'temp_celsius_max', 'temp_celsius_min',
        'temp_celsius_current', 'wind_speed', 'wind_direction_degree', 'humidity_precent',
        'pressure_hPa', 'density_score', 'rain_qty_mm', 'snow_qty_mm'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
