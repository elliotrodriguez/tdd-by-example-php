<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace thedeveloperdad;


/**
 * Description of Dollar
 *
 * @author elliotrodriguez
 */
class Dollar extends Money {
    
    // commented out and re-ran tests to demonstrate object equality is still working w/o constructor
    //public function __construct($amount, $currency) {
    //    return parent::__construct($amount, $currency); // enforce calling the parent constructor
    //}
   
    static public function createMoney($amount) {
        return parent::__construct($amount, "USD");
    }
}
