<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/alta.css">
    <title>Alta Minijuego</title>
</head>
<body>
    <?php
        echo '<form action="#" method="POST">';
            echo '<input type="text" name="nombre" placeholder="Nombre del Minijuego">';
            echo '<input type="text" name="icono" placeholder="Icono">';
            echo '<input type="text" name="ruta" placeholder="Ruta del archivo">';
            echo '<input type="submit" name="Enviar">';
        echo '</form>';    
    ?>
</body>
</html>