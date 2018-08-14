<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of WholeSaler
 *
 * @author Nat
 */
class WholeSalerInfo extends KdmBaseModel{
    //put your code here
   protected $table = 'wholesaler_info';

    protected $fillable = [
        'user_id', 'province_id', 'district_id', 'sub_district_id', 'name', 'surname', 'address', 'gps_lat', 'gps_long', 'tax_id', 'phone',
        'email',  'gender_id' , 'zipcode', 'is_corporate', 'corp_type', 'corp_certificate', 'corp_name', 'corp_president_name', 'corp_number_member', 'corp_number',
        'registered_capital', 'corporate_type_id', 'shop_name', 'shop_website', 'shop_email', 'shop_ig', 'shop_line', 'shop_facebook', 'shop_phone','age','house_number','village','village_number','alley'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
