<?php
require_once("animals.php");
require_once("frog.php");
require_once("ape.php");

$sheep  = new animals("Shaun");

echo "Name: " . $sheep ->name . "<br>";
echo "Legs: " . $sheep ->legs . "<br>";
echo "cold blooded: " . $sheep ->cold_blooded . "<br>";

echo "<br>";

$frog = new frog("Buduk");

echo "Name: " . $frog->name . "<br>";
echo "Legs: " . $frog->legs . "<br>";
echo "cold blooded: " . $frog->cold_blooded . "<br>";
echo "Jump: " . $frog->jump();

echo "<br>";
echo "<br>";

$ape = new ape("Kera Sakti");

echo "Name: " . $ape->name . "<br>";
echo "Legs: " . $ape->legs . "<br>";
echo "cold blooded: " . $ape->cold_blooded . "<br>";
echo "Yell: " . $ape->yell();

?>