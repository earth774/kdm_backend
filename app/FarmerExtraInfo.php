<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of FarmerExtraInfo
 *
 * @author Nat
 */
class FarmerExtraInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'farmer_extra_info';

    protected $fillable = [
        'user_id', 'farmer_extra_type_id', 'resource_name', 'area', 'production_qty', 'cost',
        'profit', 'revenue', 'merchant_number', 'source_market', 'source_material', 'standard', 'remark'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
