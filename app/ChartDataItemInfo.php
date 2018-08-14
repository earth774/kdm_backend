<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of ChartDataItemInfo
 *
 * @author nat
 */
class ChartDataItemInfo extends KdmBaseModel{        
    //put your code here
    protected $table = 'chart_data_item_info';
    protected $fillable = [
        'order', 'color', 'chart_info_id', 'resource_info_id', 'product_info_id'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }    
}
