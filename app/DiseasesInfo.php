<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App;

/**
 * Description of IrrigationInfo
 *
 * @author Nat
 */
class DiseasesInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'diseases_info';

    protected $fillable = [
        'resource_info_id','resource_info_explanation', 'name', 'remark','breed_info_id','breed_info_explanation', 'status'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
