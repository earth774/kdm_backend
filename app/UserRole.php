<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of UserRole
 *
 * @author Nat
 */
class UserRole extends Model{

    public static $SuperAdmin = 1;
    public static $Admin      = 2;
    public static $Officer    = 3;
    public static $User       = 4;
    public static $UserTrial  = 5;

    //put your code here
    protected $table = 'user_role';

    protected $fillable = [
        'name'
    ];
}
