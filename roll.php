<?php


function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}



$text = "D0987";
$exploded = multiexplode(array("A","B","C","D","E","F","G","H"),$text);

$roll=(int)$exploded[1];
echo $roll;
