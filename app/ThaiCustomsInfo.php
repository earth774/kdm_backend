<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of ThaiCustomsInfo
 *
 * @author Tae
 */
class ThaiCustomsInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'thai_customs_info';

    protected $fillable = [ 'user_id',
        'customs_name', 'customs_address', 'province_id', 'district_id', 'sub_district_id', 'gps_lat', 'gps_long', 
        'contact_name', 'contact_address', 'contact_position', 'contact_phone','contact_email'
    ];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
