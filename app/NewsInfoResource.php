<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App;

/**
 * Description of IrrigationInfo
 *
 * @author Nat
 */
class NewsInfoResource extends KdmBaseModel{
    //put your code here
    protected $table = 'news_info_resource';

    protected $fillable = [
        'news_info_id', 'src_path', 'src_filename','original_filename', 'status_id'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
