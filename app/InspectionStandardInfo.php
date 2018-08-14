<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * Description of InspectionStandardInfo
 *
 * @author Tae
 */
class InspectionStandardInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'inspection_standard_info';

    protected $fillable = ['user_id', 'user_type_id',
      'standard_name', 'cerificate_name', 'cerificate_number', 'inspection_number', 'inspection_price'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
