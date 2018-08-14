<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of ChartInfo
 *
 * @author nat
 */
class ChartInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'chart_info';
    protected $fillable = [
        'name', 'chart_type_id', 'user_type_chart_data_id', 'user_id', 'is_custom_sql',
        'custom_mysql_statement_select', 'custom_mysql_statement_where', 'custom_mysql_statement_groupby',
        'custom_mysql_x_axis_field'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }    
}
