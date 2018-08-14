<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of GovRegulationDataFeederInfo
 *
 * @author Nat
 */
class GovRegulationDataFeederInfo extends KdmBaseModel {
    //put your code here
    protected $table = 'gov_regulation_data_feeder_info';

    protected $fillable = ['resource', 'price_factor', 'factor_effect_score', 'is_intervention',
        'intervention_price', 'start_regulation_datetime', 'end_regulation_datetime', 'reference'];
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
