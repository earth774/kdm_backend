<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of SubDistrict
 *
 * @author Nat
 */
class SubDistrict  extends Model{
    //put your code here
    protected $table = 'sub_district';
    public $timestamps = false;

    protected $fillable = [
        'sub_district_name', 'district_id'
    ];
}
