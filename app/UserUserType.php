<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of UserUserType
 *
 * @author Nat
 */
class UserUserType extends Model{
    //put your code here
    protected $table = 'user_user_type';

    protected $fillable = [
        'user_id', 'user_type_id'
    ];
}
