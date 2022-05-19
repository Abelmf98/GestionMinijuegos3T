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
        include_once 'conexionbd.php';

        if(!isset($_POST["Aceptar"])){
            
                echo '<form action="#" method="POST" enctype="multipart/form-data">';
                    echo '<label for="borrar">¿Estás seguro que quieres borrar este minijuego?</label><br>';
                    /*Enviamos la id del minijuego por url para identificarla */
                    echo '<input type="hidden" name="idMinijuego" value="'.$_GET['i'].'"><br>';
                    echo '<input type="submit" name="Aceptar" value="Aceptar">';
                echo '</form>';

                echo '<a href="index.php">*Volver a listado</a>';
        }else{

            $icono = $_FILES['icono'];
            /*Hago la conexion */
            $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BD);

            /*Realizamos la consulta a la base de datos */
            $consultasql = "DELETE
                            FROM miniJuego
                            WHERE idMinijuego=".$_POST['idMinijuego'].";";
            /*Le pasamos la consulta para ejecutarla */
            $resultado = $conexion->query($consultasql);

            unlink('./iconos/'.$icono);


            /*
                *Creo un header en el cual, cuando terminemos de realizar nuestra peticion en el borrado, nos redirija directamente al
                *index.php (listado), en este caso.
            */
            header('Location: index.php');
        }

        
    ?>
</body>
</html>
