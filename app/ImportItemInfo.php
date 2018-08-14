<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of ImportItemInfo
 *
 * @author Tae
 */
class ImportItemInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'import_item_info';

    protected $fillable = [
        'user_id', 'user_type_id', 'is_product', 'product_info_id', 'manufacturer_product_info_id', 'qty',
        'price', 'import_datetime', 'transport_day', 'transport_cost', 'tax', 'operation_cost', 'soruce_name',
        'source_address', 'source_country_id', 'dest_name', 'dest_address', 'dest_phone',
        'loss_qty', 'loss_cause', 'transport_delay_day', 'exchange_rate', 'currency_unit', 'hs_code',
        'warehouse_cost', 'import_cost_type_id', 'product_info_explanation', 'manufacturer_product_info_explanation'
    ];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
