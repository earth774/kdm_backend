<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of PlantDiseasesFeederInfo
 *
 * @author Nat
 */
class PlantDiseasesFeederInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'plant_diseases_data_feeder_info';

    protected $fillable = [ 'name', 'description', 'carriers_diseases', 'datetime_diseases',
        'effect_area', 'effect_resource', 'protection_instruction', 'still_scourge'];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
