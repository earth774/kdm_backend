<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of District
 *
 * @author Nat
 */
class District  extends Model{
    //put your code here
    protected $table = 'district';
    public $timestamps = false;

    protected $fillable = [
        'dist_name', 'province_id'
    ];
}
