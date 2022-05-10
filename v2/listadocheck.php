<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Listado Check</title>
</head>
<body>
    <?php
        require_once 'metodos.php';

        /*Llamamos a la clase metodos*/
        $objMetodo = new metodos();

            echo '<form action="#" method="POST">';
                echo '<label for="">Reciclaje</label>';
                echo '<input type="checkbox" name="" value="0">';
                echo '<label for="">Multiplos</label>';
                echo '<input type="checkbox" name="" value="1">';
                echo '<label for="">Tabla</label>';
                echo '<input type="checkbox" name="" value="6">';

                echo '<input type="submit" name="Enviar">';
            echo '</form>';
        

        echo '<br><h3><a href="index.php">*Volver a listado</a></h3>';
    ?>
</body>
</html>