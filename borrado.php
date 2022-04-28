<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Borrado</title>
</head>
<body>
    <?php
        require_once 'metodos.php';
        /*Llamamos al objeto metodos */
        $objMetodo = new metodos();

        if(!isset($_POST["Enviar"])){
            
                echo '<form action="#" method="POST">';
                    echo '<label for="borrar">¿Estás seguro que quieres borrar este minijuego?</label>';
                    echo '<input type="">';
                    echo '<input type="radio" name="borrar" value="1">Si';
                    echo '<input type="radio" name="borrar" value="0">No';
                    echo '<input type="submit" name="Enviar">';
                echo '</form>';
        }else{

        }

        header('Location: listado.php')
    ?>
</body>
</html>