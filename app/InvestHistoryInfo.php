<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of InvestHistoryInfo
 *
 * @author Nat
 */
class InvestHistoryInfo extends KdmBaseModel {
    //put your code here
    protected $table = 'investor_history_info';
    protected $fillable = ['user_id', 'user_type_id', 'start_datetime', 'end_datetime', 'invest_money', 'profit', 'farmer_user_crop_id', 'is_payback'];

    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
