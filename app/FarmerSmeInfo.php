<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of FarmerSmeInfo
 *
 * @author Tae
 */
class FarmerSmeInfo extends Model{
    //put your code here
    protected $table = 'farmer_sme_info';

    protected $fillable = [
      'is_company', 'company_name', 'province_id', 'district_id', 'sub_district_id',
      'address', 'tax_id', 'phone', 'email', 'company_type', 'company_cerificate', 'registered_capital'
    ];
}
