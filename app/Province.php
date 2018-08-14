<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Province
 *
 * @author Nat
 */
class Province extends Model{
    //put your code here
    protected $table = 'province';
    public $timestamps = false;

    protected $fillable = [
        'prov_name', 'region_id'
    ];
}
