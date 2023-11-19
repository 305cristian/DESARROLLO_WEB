<?php
 session_start();
 include ("../data_base/conection.php");



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['producto_id'])) {
    $producto_id = $_POST['producto_id'];

    $_SESSION['carrito'][] = $producto_id;
}

if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $eliminar_id = $_GET['eliminar'];

    if (($key = array_search($eliminar_id, $_SESSION['carrito'])) !== false) {
        unset($_SESSION['carrito'][$key]);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="estilos.css">

</head>
<body>
    <h2>Carrito de Compras</h2>
  
          <a href="index.php">Volver a la Lista de Productos</a>
<hr>
    <?php
    if (!empty($_SESSION['carrito'])) {

        $productos_en_carrito = implode(",", $_SESSION['carrito']);
       
        $consulta = "SELECT * FROM ube_productos WHERE id IN ($productos_en_carrito)";

        $resultados = $conn->query($consulta);

        if ($resultados->num_rows > 0) {
            while ($fila = $resultados->fetch_assoc()) {
                echo '<div class="producto-carrito bg_gradiante1">';
                echo '<h3>' . $fila['nombre'] . '</h3><br>';
                echo '<p>Precio: $' . $fila['precio'] . '</p>';
                echo '<a class="btn btn-danger" href="cart.php?eliminar=' . $fila['id'] . '">Delete</a>';
                echo '</div>';
            }
        } else {
            echo '<p>El carrito está vacío.</p>';
        }

        $conn->close();

       
    }
    ?>
    <button onclick="procesar()" class="boton btn btn-primary">Procesar Compra</button>

    <script>

 function procesar() {
         
            var confirmacion = window.confirm("¿Estás seguro de que deseas procesar la compra?");

        
            if (confirmacion) {
                alert("Compra realizada exitosamente");
            } else {
                alert("Compra cancelada");
            }
        }
    </script>