<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of NewsInfo
 *
 * @author Nat
 */
class NewsInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'news_info';

    protected $fillable = [
      "creator_user_id", "title", "content", "reference"
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
