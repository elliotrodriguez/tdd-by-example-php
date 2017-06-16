<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace thedeveloperdad;

/**
 * Description of Sum
 *
 * @author elliotrodriguez
 */
class Sum implements Expression {
    public $augend;
    public $addend;
    
    
    public function __construct($augend, $addend)
    {
        
        $this->augend = $augend;
        $this->addend = $addend;
        
    }
    
     // impl of Expression interface, but this smells to me, dupe implementation
    // also in Money
    public function plus($addend) {
        return new Sum($this, $addend);
    }
    
    public function reduce($bank, $to) {         
        $amount = $this->augend->amount + $this->addend->amount;
        
        return new Money($amount, $to);
    }
}
