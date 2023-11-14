<!DOCTYPE html>
<html>
<head>

	    <meta charset="utf-8">
    <title>Validación de Formulario</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
   
    <style>

    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin: 20px;
    }

    .image-container {
        margin: 10px;
        overflow: hidden;
    }

    img {
        max-width: 100%;
        height: auto;
        transition: transform 0.3s;
        cursor: pointer;
    }



    img:hover {
        transform: scale(1.1);
    }

    

    </style>
</head>

<body>
    
                  
<div class="container">


        <section>
            

                    <h2>Galería de imágenes</h2>
            <div class="gallery">
           <?php


                            $directorio = 'img/';
                            $archivos = scandir($directorio);


                            $extensiones_validas = ['jpg', 'jpeg', 'png'];

                            foreach ($archivos as $archivo) {
                                $extension = pathinfo($archivo, PATHINFO_EXTENSION);
                                if (in_array(strtolower($extension), $extensiones_validas)) {
                                    echo '<div class="image-container">
                            <img src="' . $directorio . $archivo . '" alt="' . $archivo . '">
                          </div>';
                                }
                            }
                            
                            ?>
                        </div>
                
                    </section>
                
                </div>
                
                <footer>
                    <p>Copyright © 2023 CCorp. All rights reserved. Teléfono: 0992094788 | Correo electrónico: pcris.994@cc.com</p>
                </footer>
                
                </body>