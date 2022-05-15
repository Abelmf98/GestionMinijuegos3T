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

        if(!isset($_POST["Enviar"])){
            
                echo '<form action="#" method="POST">';
                    echo '<label for="borrar">¿Estás seguro que quieres borrar este minijuego?</label><br>';
                    /*Enviamos la id del minijuego por url para identificarla */
                    echo '<input type="hidden" name="idMinijuego" value="'.$_GET['i'].'"><br>';
                    /*Creamos un input checkbox para preguntarle al usuario si está seguro de querer borrar el campo */
                    echo 'Si<input type="checkbox" name="borrar" value="1">';
                    echo 'No<input type="checkbox" name="borrar" value="0"><br>';
                    echo '<input type="submit" name="Enviar">';
                echo '</form>';
        }else{
            /*
                *Le decimos que si marca Si, el cual tiene value 1, entonces se realizará la consulta DELETE, en este
                *caso el dato proviene de la tabla miniJuego donde borrará el id que corresponda al minijuego seleccionado
                *previamente en el listado de los mismos.
            */
            if($_POST["borrar"]==1){
                /*Hago la conexion */
                $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BD);

                /*Realizamos la consulta a la base de datos */
                $consultasql = "DELETE
                                FROM miniJuego
                                WHERE idMinijuego=".$_POST['idMinijuego'].";";
                /*Le pasamos la consulta para ejecutarla */
                $resultado = $conexion->query($consultasql);
            }
            /*
                *Creo un header en el cual, cuando terminemos de realizar nuestra peticion en el borrado, nos redirija directamente al
                *index.php (listado), en este caso.
            */
            header('Location: index.php');
        }

        
    ?>
</body>
</html>
