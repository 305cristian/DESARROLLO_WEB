<?php
  session_start();
include '../data_base/conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM ube_usuarios WHERE usuario = '".$usuario."' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = [];
            
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

      
       
        if(password_verify($clave, $users[0]['clave'])){
            $_SESSION['usuario'] = $users[0]['nombres'];
            header('Location: home.php'); 
        }else{
            $mensaje_error = 'Contraseña Incorrecta.'; 
        }


    } else {
        $mensaje_error = 'Usuario no registrado.';
  
    }

    

   

}

?>