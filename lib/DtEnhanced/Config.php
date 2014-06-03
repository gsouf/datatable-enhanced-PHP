<?php

namespace DtEnhanced;

/**
 * Config
 *
 * @author sghzal
 */
class Config {
   
    /**
     *
     * @var ColumnDefinition[]
     */
    protected $columns = array();
    
    protected $config = array();
    
    


    public function addColumn(ColumnDefinition $column) {
        $this->columns[] = $column;
        return $this;
    }

    /**
     * get one column by it's name
     * @param string $name name of the column to get
     * @return ColumnDefinition
     */
    public function getColumnByName($name){
        foreach($this->columns as $c){
            if($c->getName() == $name){
                return $c;
            }
        }
        return null;
    }
    
    public function setUrl($url){
        $this->setAjaxParam("url", $url);
        return $this;
    }
    
    public function setAjaxParam($name,$value){
        if(!isset($this->config["ajax"])){
            $this->ajax = array();
        }
        $this->config["ajax"][$name] = $value;
        return $this;
    }
    
    public function setSelectable($s){
        $this->selectable = $s;
        return $this;
    }


    public function renderColumns($json = true){
        $data = array();

        foreach($this->columns as $c){
            $data[] = $c->renderColumn();
        }
        
        if($json)
            return json_encode($data);
        else
            return $data;
    }
    
    public function renderConfig($json = true){
        if($json)
            return json_encode($this->config);
        else
            return $this->config;
    }
    
    
    public function __get($name) {
        return $this->config[$name];
    }

    public function __set($name, $value) {
        $this->config[$name] = $value;
    }

    

    
}