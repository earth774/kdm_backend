<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of InvestorInterestInfo
 *
 * @author Tae
 */
class InvestorInterestInfo extends KdmBaseModel {

    //put your code here
    protected $table = 'investor_interest_info';
    protected $fillable = [
        'user_id', 'user_type_id', 'resource_info_id', 'resource_info_explanation',
        'invest_money', 'expect_profit_percent', 'risk_accept_percent',
        'return_time_year','province_id'
    ];

    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }

}
