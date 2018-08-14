<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Region
 *
 * @author Nat
 */
class Region extends Model{
    //put your code here
    protected $table = 'region';

    protected $fillable = [
        'reg_name'
    ];
}
