<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of UserTypeChartData
 *
 * @author nat
 */
class UserTypeChartData extends KdmBaseModel{
    
    public static $FARMER_EXTRA_INFO_COST = "farmer_extra_info_cost";
    public static $FARMER_EXTRA_INFO_REVENUE = "farmer_extra_info_revenue";
    public static $FARMER_EXTRA_INFO_PROFIT = "farmer_extra_info_profit";
    public static $FARMER_EXTRA_INFO_MERCHANT_NUMNBER = "farmer_extra_info_merchant_number";
    public static $FARMER_EXTRA_INFO_AREA = "farmer_extra_info_area"; 
    
    //put your code here
    protected $table = 'user_type_chart_data';
    protected $fillable = [
        'name',
        'user_type_id', 'chart_data_info_id_type_id'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }    
}
