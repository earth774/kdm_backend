<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of BuyingItemInfo
 *
 * @author Nat
 */
class BuyingItemInfo extends KdmBaseModel {

    //put your code here
    protected $table = 'buying_item_info';
    protected $fillable = [
        'product_info_id', 'product_info_explanation', 'qty', 'price', 'address', 'user_id', 'user_type_id',
        'sub_id', 'loss_qty', 'transport_duration_start_datetime', 'transport_duration_end_datetime',
        'buying_start_date_time', 'buying_end_date_time'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
