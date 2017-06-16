<?php
namespace thedeveloperdad;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author elliotrodriguez
 */
interface Expression {
    public function plus($addend);
    
    public function reduce($bank, $to);
    
}
