<?php
include 'controller.php';

$obj =new Controller();

    $response = $obj->registrar();
    if($response =="ok") {
        echo"success";
    } else {
        echo "fail";
    }


?>