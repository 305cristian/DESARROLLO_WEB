<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Ejercicios</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
      
       h1{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

       }

    </style>
</head>
<body>
    
    <div class="container">
        <section>
            <h2>Contador de visitas en PHP</h2>  
            <?php
            
            session_start();

            if (!isset($_SESSION['visitas'])) {
                $_SESSION['visitas'] = 1;
            } else {
                $_SESSION['visitas']++;
            }
            ?>  
        <h1>✅Número de visitas:  <span style="color:red; font-size:50px"><?=$_SESSION['visitas'] ?></span></h1>
        </section>
       
    </div>
    
   
    <footer>
        <p>Copyright © 2023 CCorp. All rights reserved. Teléfono: 0992094788 | Correo electrónico: pcris.994@cc.com</p>
    </footer>
    
</body>