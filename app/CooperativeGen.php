<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of CooperativeGen
 *
 * @author Nat
 */
class CooperativeGen extends KdmBaseModel{
    //put your code here
    protected $table = 'cooperative_gen';

    protected $fillable = [
        'user_id', 'user_type_id', 'president_name', 'manager_name', 'start_date_time', 'end_date_time'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
