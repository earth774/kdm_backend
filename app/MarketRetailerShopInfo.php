<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of MarketRetailerShopInfo
 *
 * @author Nat
 */
class MarketRetailerShopInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'market_retailer_shop_info';
    protected $fillable = ['user_id', 'user_type_id', 'shop_name', 'zone', 'lot_number', 'market_name',
        'market_address', 'total_shop', 'upload_path', 'upload_filename', 'buy_sell_type_id'];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
