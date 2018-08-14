<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ImportCostType;

/**
 * Description of ImportCostTypeController
 *
 * @author Nat
 */
class ImportCostTypeController extends KdmBaseController{
    //put your code here
    public function __construct() {
        parent::__construct(new ImportCostType());
    }
}
