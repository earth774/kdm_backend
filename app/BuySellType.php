<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of BuySellType
 *
 * @author Nat
 */
class BuySellType extends KdmBaseModel{
    //put your code here
    protected $table = 'buy_sell_type';
    protected $fillable = [
        'name'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
