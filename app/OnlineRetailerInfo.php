<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of OnlineRetailerInfo
 *
 * @author Nat
 */
class OnlineRetailerInfo extends Model{
    //put your code here
    protected $table = 'online_retailer_info';

    protected $fillable = [
        'province_id', 'district_id', 'sub_district_id', 'phone', 'address',
        'shop_name', 'shop_website', 'shop_email', 'shop_line', 'shop_facebook',
        'shop_ig', 'shop_phone'
    ];
}
