<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace thedeveloperdad;

/**
 * Description of Pair
 *
 * @author elliotrodriguez
 */
class Pair {
    public $from;
    public $to;
    
    public function __construct($from, $to) {
        $this->from = $from;
        $this->to = $to;
    }
    
    public function equals($compareObject) {
        return (($this->from == $compareObject->from)
                && ($this->to == $compareObject->to));
    }
    
    public function hashCode() {
        return 0;
    }
}
