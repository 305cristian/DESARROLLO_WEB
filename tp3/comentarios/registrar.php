<?php
include 'controller.php';

$obj =new Comentarios();

    $response = $obj->registrarComentario();

    if($response =="ok") {
        echo "success";
    } else {
        echo "fail";
    }


?>