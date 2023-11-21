<?php
include("../../../../database/conection.php");

//$dsn = "mysql:host=localhost;dbname=pwa;charset=utf8";
//$usuario = "root";
//$contrasena = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
       // $pdo = new PDO($dsn, $usuario, $contrasena);
        //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user_id = $_POST['user_id'];
        $descripcion = $_POST['description'];

        // Obtener el nombre de la categoría
        $queryUser = "SELECT name FROM users WHERE id = ?";
        $stmtUser = $pdo->prepare($queryUser);
        $stmtUser->execute([$user_id]);
        $user = $stmtUser->fetchColumn();


        // Consulta SQL para insertar en la base de datos (sin el ID del producto)
        $query = "INSERT INTO tasks (user_id, description) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user_id, $descripcion]);


        // Resto del código para redirigir o realizar otras operaciones necesarias
        header("Location: ../admin/modules/tasks/views/tasks_admin.php");
    } catch (PDOException $e) {
        echo "Error al agregar producto: " . $e->getMessage();
    }
}