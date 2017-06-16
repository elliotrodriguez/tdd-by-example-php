<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace thedeveloperdad;
/**
 * Description of Money
 *
 * @author elliotrodriguez
 */
class Money implements Expression {
    public $amount;
    public $currency;
    
    public function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }
    
    public function currency(){
        return $this->currency;
    }
    
    public function equals($compareObject) {
       
        return $this->amount == $compareObject->amount
         && $this->currency() == $compareObject->currency();
    }
    
    // static factory method that returns Dollar 
    // (reduces dependence on subclasses)
    static function dollar($amount) {
        return new Dollar($amount, "USD");
    }
    
    static function franc($amount) {
        return new Franc($amount, "CHF");
    }
    
    public function times($multiplier) {
        return new Money($this->amount * $multiplier, $this->currency);
    }
    
   
     // impl of Expression interface
    public function plus($addend) {
        if ($addend instanceof Expression) {
            return new Sum($this, $addend);
        }
        
    }
    
    public function reduce($bank, $to) {
            
        return new Money($this->amount / $bank->rate($this->currency, $to), $to);
    }
}
