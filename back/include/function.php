<?php
function securePages(){
    if(empty($_SESSION['id'])) {
    echo "<script> location.href='".BASE_LINK."/logout.php';</script>";
    }
} 
?>