<?php

 include ("../data_base/conection.php");

if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];


    $consulta = "SELECT * FROM ube_productos WHERE id = $producto_id";
    $resultado = $conn->query($consulta);

    if ($resultado->num_rows == 1) {
        $producto = $resultado->fetch_assoc();
    } else {
        header("Location: index.php");
        exit();
    }

    $conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="estilos.css">

</head>
<body>
    <h2>Detalles del Producto</h2>

    <div class="producto-detalle">
        <h3><?php echo $producto['nombre']; ?></h3>
        <p><?php echo $producto['descripcion']; ?></p>
        <p>Precio: $<?php echo $producto['precio']; ?></p>
        <img src="img/<?=$producto['imagen']?> ">
        <a href="index.php">Volver a la Lista de Productos</a>
    </div>

</body>
</html>
