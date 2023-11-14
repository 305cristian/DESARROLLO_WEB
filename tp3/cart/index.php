<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" >

</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a class="navbar-brand" href="#"><b class="text-white">PAGINA WEB DE COMPRAS</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Porductos</a>
                    <a class="nav-item nav-link" href="#">Servicios</a>
                    <a class="nav-item nav-link " href="#">Contactos</a>
                </div>
            </div>
        </nav>

    <?php
    include ("../data_base/conection.php");
    $consulta = "SELECT * FROM ube_productos";
    $resultados = $conn->query($consulta);

    if ($resultados->num_rows > 0) {
        $productos=[];
        while ($row = $resultados->fetch_assoc()) {
         $productos[] = $row;
        }
  
    } else {
        echo '<p>No hay productos disponibles.</p>';
    }

    $conn->close();
    ?>

<div class="container-fluid">
      

    <div class="col-md-12 d-flex ">
        
        <div class="col-md-6 boder_left mt-3">
              <h2>Lista de Productos</h2>
            <div class="row  p-2">
           
            <?php foreach($productos as $val){?>
            <div class=" card tarjeta p-2  m-3  text-center col-md-3">
                <h4><?=$val['nombre']?></h4>
                <h3><?=$val['descripcion']?></h3>
                <h4>$<?=$val['precio']?></h4>
                <a href="product.php?id= <?= $val['id']?> ">Ver Detalles</a>
                <form action="cart.php" method="post">
                   <input type="hidden" name="producto_id" value="<?=$val['id']?>">
                   <input class="btn btn-primary" type="submit" value="Agregar al Carrito">
                </form>
            </div>
            
            <?php }?>
          </div> 
        </div>
        <div class="col-md-6">
            <?php
             include 'cart.php';
            ?>
        </div>
    </div>
</div>

 
</body>
</html>
