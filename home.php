<?php
    if(!isset($_COOKIE["Login"])){ 
        header("Location: index");
        return;
    }
    $mail = $_COOKIE["Login"];

    include_once("base.php");
    
?>