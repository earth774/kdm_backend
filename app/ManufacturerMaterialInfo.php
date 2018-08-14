<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of ManufacturerMaterialInfo
 *
 * @author Tae
 */
class ManufacturerMaterialInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'manufacturer_material_info';

    protected $fillable = ['user_id', 'user_type_id',
      'manufacturer_product_info_id', 'is_product' ,'product_info_id', 'select_manufacturer_product_info_id',
      'qty', 'price', 'product_info_explanation', 'select_manufacturer_product_info_explanation'
    ];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
