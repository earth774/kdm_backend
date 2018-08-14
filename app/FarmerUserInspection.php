<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of FarmerUserInspection
 *
 * @author Tae
 */
class FarmerUserInspection extends Model{
    //put your code here
    protected $table = 'farmer_user_inspection';

    protected $fillable = [
      'inspection_body_info_id'
    ];
}
