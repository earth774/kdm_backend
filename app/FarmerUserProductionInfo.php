<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// TODO : Continue here
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of FarmerUserProductionInfo
 *
 * @author Tae
 */
class FarmerUserProductionInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'farmer_user_production_info';

    protected $fillable = [
        'user_id', 'user_type_id', 'product_info_id', 'product_info_explanation','exact_qty', 'expect_qty',
        'expect_outcome', 'exact_outcome', 'datetime_bestBefore', 'exact_datetime', 'expect_datetime',
        'expect_revenue', 'exact_revenue', 'farmer_user_crop_id', 'cooperative_gen_id'
    ];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
