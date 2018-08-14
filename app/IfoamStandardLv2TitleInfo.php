<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of IfoamStandardLv2TitleInfo
 *
 * @author Nat
 */
class IfoamStandardLv2TitleInfo extends Model{
    //put your code here
    protected $table = 'ifoam_standard_lv2_title_info';
    //put your code here
    protected $fillable = ['ifoam_standard_title_info_id', 'order', 'item_no_str', 'title'];
}

