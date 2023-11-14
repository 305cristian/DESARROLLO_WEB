<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Promedios</title>
    
    <link rel="stylesheet" href="estilos.css">

</head>
<body>
    <h2>Calculadora de Promedios de Alumnos</h2>

     <form method="post" action="index.php">
<?php for($i=0; $i<2; $i++){?>
    
        <h2>ALUMNO <?=$i +1?></h2>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido[]" required>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre[]" required>

        <label for="nota1">Nota 1:</label>
        <input type="number" name="nota1[]" required>

        <label for="nota2">Nota 2:</label>
        <input type="number" name="nota2[]" required>

        <label for="nota3">Nota 3:</label>
        <input type="number" name="nota3[]" required>

        <hr>
        
   
<?php }?>
        <input type="submit" value="Calcular Promedio">

 </form>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
        $apellidos = $_POST['apellido'];
        $nombres = $_POST['nombre'];
        $notas1 = $_POST['nota1'];
        $notas2 = $_POST['nota2'];
        $notas3 = $_POST['nota3'];

       
        $numAlumnos = count($apellidos);
        $promediosIndividuales = [];

        for ($i = 0; $i < $numAlumnos; $i++) {
            $promedio = ($notas1[$i] + $notas2[$i] + $notas3[$i]) / 3;
            $promediosIndividuales[] = $promedio;

            echo "<p>El promedio de {$nombres[$i]} {$apellidos[$i]} es: ".round($promedio,2)."</p>";
        }

      
        $promedioTotal = array_sum($promediosIndividuales) / $numAlumnos;
        echo "<p>El promedio total de todos los alumnos es: ".round($promedioTotal,2)."</p>";
    }
    ?>


</body>
</html>
