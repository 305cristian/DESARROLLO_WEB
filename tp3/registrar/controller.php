<?php
header('Content-Type: text/html; charset=UTF-8');

include '../data_base/conection2.php';

$nombre_error = $apellido_error = $usuario_error = $email_error = $password_error = $confirm_password_error = "";

class Controller {

    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function  registrar() {

        $conn = $this->conexion->obtenerConexion();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombres = $_POST['nombre'];
            $apellidos = $_POST['apellido'];
            $email = $_POST['email'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if (empty($nombres)) {
                $nombre_error = "Por favor, ingresa tu nombre.";
                echo json_encode($nombre_error);
                die();
            }

            if (empty($apellidos)) {
                $apellido_error = "Por favor, ingresa tu apellido.";
              echo json_encode($apellido_error);
              die();
            }


            if (empty($email)) {
                $email_error = "Por favor, ingresa tu correo electrónico.";
                echo json_encode( $email_error);
                die();
            } else {
                $email = $this->test_input($email);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_error = "Formato de correo electrónico no válido.";
                   echo json_encode($email_error);
                   die();
                }
            }

            if (empty($usuario)) {
                $usuario_error = "Por favor, ingresa tu usuario.";
               echo json_encode( $usuario_error );
               die();
            }

            if (empty($password)) {
                $password_error = "Por favor, ingresa tu contraseña.";
                echo json_encode(  $password_error );
                die();
            }

            if (empty($confirm_password)) {
                $confirm_password_error = "Por favor, confirma tu contraseña.";
                 echo json_encode( $confirm_password_error );
                 die();
            } else {
                $confirm_password = $this->test_input($confirm_password);
                if ($password != $confirm_password) {
                    $confirm_password_error = "Las contraseñas no coinciden.";
                   echo json_encode( $confirm_password_error );
                   die();
                }
            }

            $p= password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO ube_usuarios (nombres ,apellidos, email, usuario, clave) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss",  $nombres, $apellidos, $email, $usuario, $p);

            
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "fail";
            }

                       

        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

?>