<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of ProductInfo
 *
 * @author Nat
 */
class ProductInfo extends Model{
    //put your code here
    protected $table = 'product_info';

    protected $fillable = [
        'name', 'unit', 'resource_info_id','resource_info_explanation' ,'breed_info_id','breed_info_explanation'
    ];
}
