<?php

namespace DtEnhanced;

/**
 * ColumnDefinition
 *
 * @author sghzal
 */
class ColumnDefinition {
    
    protected $name;
    protected $sqlName;
    
    protected $jsData = array();
    
    public function renderColumn(){
        $data = $this->jsData;
        $data["name"] = $this->name;

        return $data;
    }


    public function addTo(Config $config){
        $config->addColumn($this);
    }
    
    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    public function getRender() {
        return $this->render;
    }

    public function setRender($render) {
        $this->render = $render;
        return $this;
    }

    public function getHeader() {
        return $this->header;
    }

    public function setHeader($header) {
        $this->header = $header;
        return $this;
    }

    public function getClass() {
        return $this->class;
    }

    public function setClass($class) {
        $this->class = $class;
        return $this;
    }

    public function getSearchable() {
        return $this->searchable;
    }

    public function setSearchable($searchable) {
        $this->searchable = $searchable;
        return $this;
    }

    public function getOrderable() {
        return $this->orderable;
    }

    public function setOrderable($orderable) {
        $this->orderable = $orderable;
        return $this;
    }

    public function getVisible() {
        return $this->visible;
    }

    public function setVisible($visible) {
        $this->visible = $visible;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

        
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getSqlName() {
        return $this->sqlName;
    }

    public function setSqlName($sqlName) {
        $this->sqlName = $sqlName;
        return $this;
    }

    
    public function __get($name) {
        return $this->jsData[$name];
    }

    public function __set($name, $value) {
        $this->jsData[$name] = $value;
    }

    
    
    
}