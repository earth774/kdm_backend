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
class BreedInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'breed_info';
    protected $fillable = [
        'resource_info_id','name'
    ];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}