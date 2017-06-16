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
    public function reduce($source, $to) {  
       return $source->reduce($this, $to);
    }
    
    public function addRate($from, $to, $rate) {
        $pair = new Pair($from, $to);    
        $id = spl_object_hash($pair);    
        $this->ratesTable[$id] = $rate;    
    }
    
    public function rate($from, $to) {
        if ($from == $to) {
            return 1;
        }
        
        $pair = new Pair($from, $to);
        $id = spl_object_hash($pair);
        
        return intval($this->ratesTable[$id]);
        
    }
}
