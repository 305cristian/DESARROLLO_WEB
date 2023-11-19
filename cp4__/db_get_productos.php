<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sistema_ventas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a fallado: " . $conn->connect_error);
}

$sql = "SELECT * FROM ube_productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $prods = [];
    
    while ($row = $result->fetch_assoc()) {
        $prods[] = $row;
    }
   
    $productos= json_encode($prods);

    include 'index.php';
} else {
    echo "No se encontraron productos.";
}

$conn->close();
?>
