<?php
include 'validate.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Lista de Tareas Interactiva</title>
	<link rel="stylesheet" type="text/css" href="../estilos.css">
    <style>
       form{
	width:300px;
	padding:16px;
	border-radius:10px;
	margin:auto;
	background-color:#ccc;
    }

    form {
    max-width: 400px;
    margin: 50px auto;
    padding: 5%;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        
    }

    input
     {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
    }
    button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    }
    .container{
        display:flex;
        justify-content:center;
    }

    </style>
</head>

<body>
        <section>
            <h2>Sistema de login</h2>
            <p>User: admin</p>
            <p>User: 305.cc</p>
            <form  method="post" action="login.php">
            <label>Usuario: <input type="text" id="usuario" name="usuario" required></label>
            
            <label>Clave: <input type="password" id="clave" name="clave" required></label>

            <button class="boton" type="submit">LOGIN</button>

            <?php if (isset($mensaje_error)): ?>
            <p style="color:red"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>
        </form>

       

        </section>

   
    <footer>
        <p>Copyright © 2023 CCorp. All rights reserved. Teléfono: 0992094788 | Correo electrónico: pcris.994@cc.com</p>
    </footer>
    
</body>
