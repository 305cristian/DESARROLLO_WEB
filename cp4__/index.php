<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Productos</title>
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"  />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><b>PAGINA WEB</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Features</a>
                    <a class="nav-item nav-link" href="#">Pricing</a>
                    <a class="nav-item nav-link " href="#">Contactos</a>
                </div>
            </div>
        </nav>
        <br>
        <div class="container-fluid col-md-12">
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><i class="fas fa-image"></i></th>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th><i class="fas fa-shopping-cart"></i></th>
                        </tr>
                    </thead> 
                    <tbody>

                        <?php foreach (json_decode($productos) as $val) { ?>
                            <tr>
                                <td><img src="img/<?php echo $val->imagen?>" alt="<?php echo $val->imagen;?>" style="width: 100px; height: 100px;"></td>
                                <td><?= $val->nombre ?></td>
                                <td><?= $val->descripcion ?></td>
                                <td><?= $val->precio ?></td>
                                <td><button class="btb btn-primary"><i class="fas fa-shopping-cart"></i></button></td>
                            </tr>
                        <?php } ?>
                    </tbody>   
            </div>
        </div>



    </table>

</body>
</html>
