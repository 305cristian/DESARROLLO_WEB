<?php
include("../../../../database/conection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos enviados desde el formulario
  $task_id = $_POST['task_id'];

  try {
    //$dsn = "mysql:host=localhost;dbname=pwa;charset=utf8";
    //$usuario = "root";
    //$contrasena = "";

    //$pdo = new PDO($dsn, $usuario, $contrasena);
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Actualizar la tarea en la base de datos
    $query = "UPDATE tasks SET completed = 1 WHERE id = :task_id";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
      echo json_encode(["message" => "Tarea completada correctamente"]);
    } else {
      echo json_encode(["error" => "Error al completar la tarea"]);
    }
  } catch (PDOException $e) {
    echo json_encode(["error" => "Error en la conexión a la base de datos: " . $e->getMessage()]);
  }
}
