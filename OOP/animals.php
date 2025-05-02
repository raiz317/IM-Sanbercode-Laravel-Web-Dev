<?php
class animals{
    public $name;
    public $legs = 4;
    public $cold_blooded = "no";

    public function __construct($type){
        $this->name=$type;
    }
}

?>