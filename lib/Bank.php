<?php
namespace thedeveloperdad;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bank
 *
 * @author elliotrodriguez
 */
class Bank {
    public $ratesTable = array();
    
    // the book defines the $source param as type Expression, which is legal 
    // in Java but not in PHP
    // Pair isnt technically needed, but I made it to stay close to the book
    // and also before discovering that in PHP you cannot make objects 
    // keys in hashtables
    // considered a multidimentional array but getting the rate wasnt reliable 
    // if the rates matched different currencies
    // also tried spl_object_hash as the ID to match it to a Pair and Rate 
    // but the ID always grabbed the last item in the array 
    public function reduce($source, $to) {  
       return $source->reduce($this, $to);
    }
    
    public function addRate($from, $to, $rate) {
        $pair = new Pair($from, $to);    
        $fromTo = $pair->from . ',' . $pair->to;
        
        $this->ratesTable[$fromTo] = $rate;    
    }
    
    public function rate($from, $to) {
        if ($from == $to) {
            return 1;
        }
        
        
        $pair = new Pair($from, $to);
        $fromTo = $pair->from . ',' . $pair->to;
        
        return intval($this->ratesTable[$fromTo]);
        
    }
}
