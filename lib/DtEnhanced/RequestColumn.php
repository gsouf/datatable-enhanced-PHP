<?php

namespace DtEnhanced;

/**
 * RequestColumn
 *
 * @author sghzal
 */
class RequestColumn {
    
    protected $columnData;
    
    function __construct($columnData) {
        $this->columnData = $columnData;
    }

    public function getName(){
        return $this->columnData["name"];
    }
    
}