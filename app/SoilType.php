<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of SoilType
 *
 * @author Nat
 */
class SoilType extends Model{
    //put your code here
    protected $table = 'soil_type';

    protected $fillable = ['name'];
}
