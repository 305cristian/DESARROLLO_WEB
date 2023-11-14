<?php

include '../data_base/conection2.php';

class Comentarios{

     private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
    }

    public function get_comentarios(){
        $conn = $this->conexion->obtenerConexion();

        $query="SELECT * FROM ube_comentarios";

        $consulta = $conn->query($query);

    if ($consulta->num_rows > 0) {
        $comen=[];
        while ($row = $consulta->fetch_assoc()) {
         $comen[] = $row;
    }
        return $comen ;


    } else {
         return json_encode('No se han encontrado comentarios registrados');
  
    }
        

    }

    public function registrarComentario(){
        $conn = $this->conexion->obtenerConexion();
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario=$_POST['username'];
            $comentario=$_POST['comentario'];
            $fecha=date('Y-m-d');

            if(empty($usuario) || empty($comentario) || empty($fecha)) {
                echo json_encode('Verifique que el campo usuario y comentario no esten vacios');
                die();
            }

            $sql = "INSERT INTO ube_comentarios (user ,comentario, fecha_publicacion) VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss",  $usuario, $comentario, $fecha);

            
            if ($stmt->execute()) {
                return "ok";
            } else {
                return "fail";
            }
        }
    }
}

?>