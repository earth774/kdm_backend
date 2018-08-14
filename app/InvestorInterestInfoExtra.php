<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of BreedInfo
 *
 * @author Nat
 */
class InvestorInterestInfoExtra extends KdmBaseModel{
    //put your code here
    protected $table = 'investor_interest_info_extra';
    protected $fillable = [
        'user_id','investor_interest_type_str_id','investor_income_type_id','investor_invest_remark'
        ,'investor_comment','is_interest','status_id'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}