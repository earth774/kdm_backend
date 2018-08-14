<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of ModernTraderStoreInfo
 *
 * @author Nat
 */
class ModernTraderStoreInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'modern_trader_store_info';
    protected $fillable = [ 'user_id', 'user_type_id', 'store_name', 'store_address', 'contact_name',
        'contact_position', 'contact_phone', 'contact_email'];

    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
