<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Description of ResourceInfo
 *
 * @author Nat
 */
class ResourceInfo extends Model{
    //put your code here
    protected $table = "resource_info";

    protected $fillable = [
        'name', 'unit'
    ];
}
