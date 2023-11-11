<?php
$productos = [
    ["id" => 1, "nombre" => "Arroz 5kg", "imagen" => "images/arroz.jpeg", "descripcion" => "Fundas de 5KG", "precio" => 4.5],
    ["id" => 2, "nombre" => "Lenteja 5kg", "imagen" => "images/lenteja.jpeg", "descripcion" => "Fundas de 5KG", "precio" => 5.2],
    ["id" => 3, "nombre" => "Frejol 5kg", "imagen" => "images/frejol.jpeg", "descripcion" => "Fundas de 5KG", "precio" => 6.3],
    ["id" => 4, "nombre" => "Azucar 5kg", "imagen" => "images/azucar.jpeg", "descripcion" => "Fundas de 5KG", "precio" => 4.8],

];
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <title>CART OF BUY</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
</head>
<body>
    
    <div class="container-fluid col-md-12 d-flex p-5">
        <div class="col-md-6 border">
            <div id="listaProductos">
            
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="5"><h2>Productos</h2></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($productos as $val) { ?>
                        <tr>
                            <td><img src="<?php echo $val["imagen"];?>" alt="<?php echo $val["descripcion"];?>" style="width: 100px; height: 100px;"></td>
                            <td><?php echo $val["nombre"];?></td>
                            <td><?php echo $val["descripcion"];?></td>
                            <td>$<?php echo $val["precio"];?></td>
                            <td><button class="btn btn-primary" onclick="add_to_cart(<?php echo $val['id']; ?>)"><i class="fas fa-plus-circle"></i> ADD</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
    
            <h3>Carrito de Compras</h3>
            <div id="carritoItems"></div>
        </div>
    </div>

   

<script type="text/javascript">
    let productos = <?php echo json_encode($productos, JSON_PRETTY_PRINT); ?>;
    
</script>
<script src="script.js"></script>
</body>
</html>