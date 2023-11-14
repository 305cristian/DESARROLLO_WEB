<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Ejercicios</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
    <style>
        input {
            padding: 5px;
            margin: 10px;
        }
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 5%;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        p{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
     
    </style>
</head>
<body>
    
    <div class="container">
        <section>
            <h2>Juego de adivinanzas</h2>

            <?php
            session_start();

            if (!isset($_SESSION['intentos'])) {
                $_SESSION['intentos'] = 1;
            } else {
                $_SESSION['intentos']++;
            }

            if (!isset($_SESSION['numero_a_adivinar'])) {
                $_SESSION['numero_a_adivinar'] = rand(1, 10);
            }

            if (isset($_POST['intentar'])) {
                $numero_usuario = (int)$_POST['numero_usuario'];

                if ($numero_usuario === $_SESSION['numero_a_adivinar']) {
                    echo "<p>¡Felicidades! Has adivinado el número correcto: {$_SESSION['numero_a_adivinar']}</p>";
                    echo "<script>alert('¡Felicidades has adivinado! Aceptar para volver a jugar')</script> ";
                    
                    // Reiniciar el número a adivinar
                    unset($_SESSION['numero_a_adivinar']);
                    unset($_SESSION['intentos']);
                } else {
                    echo "<p>Intenta de nuevo. ¡No es el número correcto!</p>";
                    echo "<p>Intento # ".$_SESSION['intentos']." !</p> ";
                }
            }
            ?>
            <form method="post" action="ejercicio4.php">
                <label for="numero_usuario">Adivina el número (entre 1 y 10):</label>
                <input type="number" name="numero_usuario" required>
                <input class="btn" type="submit" name="intentar" value="Intentar">
            </form>
        </section>
    </div>
    
   
    <footer>
        <p>Copyright © 2023 CCorp. All rights reserved. Teléfono: 0992094788 | Correo electrónico: pcris.994@cc.com</p>
    </footer>
    
</body>
