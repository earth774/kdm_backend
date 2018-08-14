<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of InternationalResourcePriceDataFeederInfo
 *
 * @author Nat
 */
class InternationalResourcePriceDataFeederInfo extends KdmBaseModel {
    //put your code here
    protected $table = 'international_resource_price_data_feeder_info';

    protected $fillable = [ 'resource', 'country', 'unit_price', 'price_datetime' ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
