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
        if ($augend instanceof Expression && $addend instanceof Expression) {
            $this->augend = $augend;
            $this->addend = $addend;
        }
        
    }
    
    // also in Money
    public function plus($addend) {
        return new Sum($this, $addend);
       
    }
    
    public function reduce($bank, $to) {         
        $augendReduce = $this->augend->reduce($bank, $to);
        $addendReduce = $this->addend->reduce($bank, $to);
        
        $amount = $augendReduce->amount + $addendReduce->amount;
        
        return new Money($amount, $to);
    }
    
    public function times($multiplier) {
        return new Sum($this->augend->times($multiplier), $this->addend->times($multiplier));
    }
}
