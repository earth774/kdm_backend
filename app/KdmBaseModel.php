<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of KdmBaseModel
 *
 * @author Nat
 */
class KdmBaseModel extends Model{
    //put your code here
    private $_table;
    private $_fillable;

    public function __construct($table, $fillable){
        $this->_table = $table;
        $this->_fillable = $fillable;
    }

    public function getFillable(){
        return $this->_fillable;
    }

    public  function getTable(){
        return $this->_table;
    }

    public function setData($setArray){
        foreach ($setArray as $key => $value) {
            foreach($this->_fillable as $valueF){
                if($key == $valueF){
                    $this->$key = $value ;
                }
            }
        }
    }
}
