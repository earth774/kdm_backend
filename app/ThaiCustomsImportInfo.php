<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of ThaiCustomsImportInto
 *
 * @author Tae
 */
class ThaiCustomsImportInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'thai_customs_import_info';

    protected $fillable = [ 'user_id', 'user_type_id',
      'product_info_id', 'product_info_explanation', 'qty', 'start_valid_datetime', 'end_valid_datetime', 'is_product', 'product_info_id', 'manufacturer_product_info_id', 'manufacturer_product_info_explanation', 
    ];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
