<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="container-fluid">
<h2>Registro de Usuario</h2>

<form accept-charset="UTF-8" id="formu" method="post" action="index.php">

    <label for="nombre">Nombres:</label>
    <input type="text" id="nombre" name="nombre" >

    <label for="nombre">Apellidos:</label>
    <input type="text" id="apellido" name="apellido">

    <label for="email">Correo Electrónico:</label>
    <input type="text" id="email" name="email">

    <label for="password">Usuario:</label>
    <input type="text" id="usuario" name="usuario">

     <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password">

    <label for="confirm_password">Confirmar Contraseña:</label>
    <input type="password" id="confirm_password" name="confirm_password">
    <!---<span class="error"><?php // echo $confirm_password_error; ?></span>-->

    <br>
    <br>
        <button  class="btn" type="submit">Registrar</button>

</form>

</div>
</body>
</html>

<script>
   
document.getElementById("formu").addEventListener('submit', function(e) {
       
    e.preventDefault(); 
        var formData = new FormData(this);
        
        fetch(this.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if(data== 'success'){
            document.getElementById('nombre').value='';
            document.getElementById('apellido').value='';
            document.getElementById('email').value='';
            document.getElementById('usuario').value='';
            document.getElementById('password').value='';
            document.getElementById('confirm_password').value='';
            alert('USUARIO REGISTRADO EXITOSAMENTE');
            }else{
               alert(data); 
            }
            
        })
        .catch(error => {
            console.error('Error al enviar formulario:', error);
        });
    });
</script>






