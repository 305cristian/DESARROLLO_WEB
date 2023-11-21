<?php 
$dsn = "mysql:host=localhost;dbname=sistema_ventas;charset=utf8";
$usuario = "root";
$contrasena = "root";
$pdo='';
try{
    $pdo = new PDO($dsn, $usuario, $contrasena);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
     die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>