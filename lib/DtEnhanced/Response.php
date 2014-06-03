<?php

/**
 * @copyright (c) Rock A Gogo VPC
 */

namespace DtEnhanced;

/**
 * Response
 *
 * @author sghzal
 */
class Response {
    
    protected $items=array();
    protected $total=0;
    protected $filterd=null;
    
    
    public function getItems() {
        return $this->items;
    }
    
    public function addItems($items) {
        foreach($items as $i)
            $this->items[] = $i;
    }

    public function addItem($item) {
        $this->items[] = $item;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function getFiltered() {
        return $this->filterd;
    }

    public function setFiltered($filterd) {
        $this->filterd = $filterd;
        return $this;
    }

        
    public function render(){
        
        return json_encode(array(
            "recordsTotal" => $this->getTotal(),
            "recordsFiltered" => $this->getFiltered() !== null ? $this->getFiltered() : $this->getTotal() ,
            "data" => $this->items
        ));
        
    }
    
    public function __toString() {
        return $this->render();
    }

    
}