<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of ReportProblemInfo
 *
 * @author Nat
 */
class ReportProblemInfo extends KdmBaseModel{
    //put your code here
    protected $table = 'report_problem_info';

    protected $fillable = [
        'user_id', 'title', 'content', 'upload_path', 'upload_filename','user_agent'
    ];

    public function __construct(){
        parent::__construct($this->table, $this->fillable);
    }
}
