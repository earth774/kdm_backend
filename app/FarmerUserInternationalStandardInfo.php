<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of FarmerUserInternationalStandardInfo
 *
 * @author Tae
 */
class FarmerUserInternationalStandardInfo extends KdmBaseModel {
    //put your code here
    protected $table = 'farmer_user_international_standard_info';
    protected $fillable = ['user_id', 'user_type_id', 'cerificate_no', 'cerificate_type_id', 'upload_path', 'upload_filename', 'farmer_user_crop_id'];
    public function __construct() {
        parent::__construct($this->table, $this->fillable);
    }
}
