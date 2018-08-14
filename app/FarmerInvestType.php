<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of FarmerInvestType
 *
 * @author Nat
 */
class FarmerInvestType extends KdmBaseModel{
    //put your code here
    protected $table = 'farmer_invest_type';

    protected $fillable = [ 'name' ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
