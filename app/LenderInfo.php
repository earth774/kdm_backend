<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of LenderInfo
 *
 * @author Tae
 */
class LenderInfo extends Model{
    //put your code here
    protected $table = 'lender_info';

    protected $fillable = [
      'lender_name', 'contact_name', 'contact_phone', 'contact_email', 'province_id', 'district_id', 'sub_district_id', 'address'
    ];
}
