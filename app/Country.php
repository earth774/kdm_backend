<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Country
 *
 * @author Nat
 */
class Country extends Model{
    //put your code here
    protected $table = 'country';

    protected $fillable = [
        'name'
    ];
}
