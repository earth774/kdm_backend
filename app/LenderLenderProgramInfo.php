<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of LenderLenderProgramInfo
 *
 * @author Tae
 */
class LenderLenderProgramInfo extends Model{
    //put your code here
    protected $table = 'lender_lender_program_info';

    protected $fillable = [
      'name', 'condition', 'minimum', 'maximum', 'interest', 'installment_mo', 'start_date', 'end_date'
    ];
}
