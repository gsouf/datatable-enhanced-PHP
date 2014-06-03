<?php

namespace DtEnhanced;

/**
 * Request
 *
 * @author sghzal
 */
class Request {
    
    protected $data;
    
    /**
     *
     * @var RequestColumn[]
     */
    protected $columns = array();
    
    /**
     *
     * @var Config
     */
    protected $config;
    
    function __construct($data, Config $config) {
        $this->data = $data;
        $this->config = $config;
        
        foreach ($data["columns"] as $c){
            $this->columns[] = new RequestColumn($c);
        }
        
    }
    
    public function getColumns() {
        return $this->columns;
    }

    public function getSqlOrder(){
        $sqlOrderStr = "";
        
        foreach($this->data["order"] as $v){
            $colDef = $this->config->getColumnByName($this->columns[$v["column"]]->getName());
            $sqlOrderStr .= ", " . $colDef->getSqlName() . " " . ($v["dir"] == "asc" ? "ASC":"DESC" );
        }
        
        if($sqlOrderStr)
            return trim($sqlOrderStr,",");
        else
            return null;
    }
    
    public function getOffset(){
        return $this->data["start"];
    }
    
    public function getLimit(){
        return $this->data["length"];
    }
    
    public function getSearch(){
         return $this->data["search"]["value"];
    }
    
    public function getSearchRegexp(){
         return $this->data["search"]["regexp"];
    }
    
}