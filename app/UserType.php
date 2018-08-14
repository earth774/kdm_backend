<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of UserType
 *
 * @author Nat
 */
class UserType extends Model{

    public static $FarmerSME      = 1;
    public static $FarmerLarge    = 2;
    public static $Cooperative    = 3;
    public static $Wholesaeler    = 4;
    public static $OnlineRetailer = 5;
    public static $MarketRetailer = 6;
    public static $Consumer       = 7;
    public static $Investor       = 8;
    public static $ModernTrader   = 9;
    public static $Importer       = 10;
    public static $Exporter       = 11;
    public static $Manufacturer   = 12;
    public static $ThaiCustoms    = 13;
    public static $InspectionBody = 14;
    public static $Lender         = 15;

    //put your code here
    protected $table = 'user_type';

    protected $fillable = [
        'name', 'nameEn'
    ];
}
