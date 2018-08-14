<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of ManufacturerProductInfo
 *
 * @author Tae
 */
class ManufacturerProductInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'manufacturer_product_info';

    protected $fillable = ['user_id', 'user_type_id',
       'product_name', 'product_unit', 'price', 'cost', 'qty', 'cpacity', 'standard_name', 'cerificate_name', 'cefrificate_number', 'bestbefore_date_time'
    ];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
