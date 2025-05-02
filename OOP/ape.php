<?php
require_once("frog.php");

class ape extends animals {
    public $legs = 2;

    public function yell() {
        return "Auooo";
    }
}

?>