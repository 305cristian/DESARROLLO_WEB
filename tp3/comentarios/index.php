<?php
include 'controller.php';

$obj =new Comentarios();

    $comentarios = $obj->get_comentarios();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="estilos.css">

</head>
<body>

<div class="container">

     <div class="topic">
        <div class="topic-title">Lo último en Inteligencia Artificial</div>
        <div class="topic-content">
            <p>¡Bienvenidos al foro de discusión sobre lo último en inteligencia artificial! Compartan sus conocimientos, descubrimientos y preguntas sobre este fascinante campo.</p>
            <p>Recientemente, se han producido avances emocionantes en el desarrollo de algoritmos de aprendizaje profundo. ¿Alguien tiene experiencias para compartir?</p>
        </div>
    </div>
    <?php foreach($comentarios as $val){?>
    <div class="comment">
        <p><strong><?=$val['user']?></strong> <?= $val['comentario']?></p>
        <div class="comment-footer">
            <span>Publicado el <?= $val['fecha_publicacion']?></span>
            <div class="comment-actions">
                <a href="#">Responder</a>
                <a href="#">Me gusta</a>
            </div>
        </div>
    </div>
    <?php }?>

     <div class="comment-form">
        <br>
        <h2>Deja un Comentario</h2>
        <form id="form" action="registrar.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="4" required></textarea>

            <button type="submit">Enviar Comentario</button>
        </form>
    </div>
</div>

</body>
</html>
<script>

    document.getElementById("form").addEventListener('submit', function(e) {
       
    e.preventDefault(); 
        var formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if(data== 'success'){      
                 window.location.href='index.php';
            }else{
               alert(data); 
            }
            
        })
        .catch(error => {
            console.error('Error al enviar formulario:', error);
        });
    });

</script>
