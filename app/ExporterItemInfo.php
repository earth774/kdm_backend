<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of ExporterItemInfo
 *
 * @author Tae
 */
class ExporterItemInfo extends KdmBaseModel {

    //put your code here
    protected $table = 'exporter_item_info';
    protected $fillable = ['user_id', 'user_type_id',
        'qty', 'price', 'export_datetime', 'transport_day', 'transport_cost', 'is_product', 'product_info_id', 'manufacturer_product_info_id',
        'tax', 'operation_cost', 'source_address', 'source_phone',
        'country_id', 'dest_name', 'dest_address', 'dest_phone', 'loss_qty', 'loss_cause', 'transport_delay_day', 'hs_code',
        'warehouse_cost', 'product_info_explanation', 'manufacturer_product_info_explanation'
    ];

    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }

}
