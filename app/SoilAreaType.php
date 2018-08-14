<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of SoilAreaType
 *
 * @author Nat
 */
class SoilAreaType extends Model{
    //put your code here
    protected $table = 'soil_area_type';

    protected $fillable = ['name'];
}
