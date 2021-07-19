<?php 
// Variable Scope / lingkup variable
$x = 10;

function tampilX() {
    global $x;
    echo $x;
}

tampilX();
?>