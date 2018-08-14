<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of FarmerCommitteeInfo
 *
 * @author Tae
 */
class FarmerUserCommitteeInfo extends Model{
    //put your code here
    protected $table = 'farmer_user_committee_info';

    protected $fillable = [
        'name', 'province_id', 'district_id', 'sub_district_id', 'address', 'phone', 'tax_id'
    ];
}
