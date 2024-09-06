<?php 
function orderCodeGen($len, $set = ""){
                    
    $gen = "";
    for($i = 0; $i < $len; $i++) 
        {
            $set = str_shuffle($set);
            $gen.= $set[0]; 
        }
    return $gen;
}
?>