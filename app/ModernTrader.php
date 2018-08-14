<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of ModernTrader
 *
 * @author Nat
 */
class ModernTrader extends KdmBaseModel{
    //put your code here
    protected $table = 'modern_trader_info';
    protected $fillable = [
        'user_id', 'province_id', 'district_id', 'sub_district_id', 'name', 'surname', 'address', 'gps_lat', 'gps_long', 'tax_id', 'phone',
        'email',  'gender_id' , 'zipcode','age','house_number','village','village_number','alley'];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
