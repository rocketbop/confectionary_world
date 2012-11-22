<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$items = array();
for($i=0; $i < 15; $i++) {
    
    $items[$i]="This is message $i";
    
}

header("Content-Type: application/json");

$output = json_encode($items);
echo $output;

//print_r($items);

?>
