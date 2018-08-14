<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

/**
 * Description of Status
 *
 * @author Nat
 */
class Status {
    // all status defined in the database
    public static $UNKNOWN      = 0;
    public static $ACTIVE       = 1;
    public static $INACTIVE     = 2;
    public static $DELETED      = 3;
    public static $WAITING      = 4;
    public static $QUEUED       = 5;
    public static $PENDING      = 6;
    public static $PROCESSING   = 7;
    public static $DRAFT        = 8 ;
}
