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
class CompetitiveCountryDataFeederInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'competitive_country_data_feeder_info';

    protected $fillable = [
        'resource_info_id','country','datetime_start','datetime_end'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
