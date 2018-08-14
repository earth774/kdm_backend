<?php

namespace App;
/**
 * Description of IrrigationDataFeederInfo
 *
 * @author Nat
 */
class IrrigationDataFeederInfo  extends KdmBaseModel{
    //put your code here
    protected $table = 'irrigation_data_feeder_info';

    protected $fillable = [
        'irrigation_info_id','data_datetime','water_percent'
    ];
    
    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
