<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of GapStandardTitleInfo
 *
 * @author Nat
 */
class GapStandardTitleInfo extends Model{
    //put your code here
    protected $table = 'gap_standard_title_info';
    //put your code here
    protected $fillable = ['order', 'item_no_str', 'title'];
}
