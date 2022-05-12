<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Modificar</title>
</head>
<body>
    <?php
    require_once 'metodos.php';
    /*Llamamos al objeto */
    $objMetodo = new Metodos();

    /*Recuperamos las filas y columnas haciendo una consulta a la base de datos antes de modificar  */
    if(!isset($_POST["Enviar"])){
        $consultasql = "SELECT *
                        FROM miniJuego
                        WHERE idMinijuego=".$_GET["i"].";";
        $objMetodo->hacerconsulta($consultasql);
        $fila=$objMetodo->sacarfila();
        /*Obtenemos los id por URL */
        echo '<form action="#" method="POST">';
        /*Mantenemos la informacion anteriormente añadida para ser modificada despues */
            echo '<input type="hidden" name="i" value="'.$_GET["i"].'">';
            echo '<input type="text" name="nombre" value="'.$fila["nombre"].'">';
            echo '<input type="text" name="icono" value="'.$fila["icono"].'">';
            echo '<input type="text" name="ruta" value="'.$fila["ruta"].'">';
            echo '<input type="submit" name="Enviar">';
        echo '</form>';                    
    }else{
        /*Comprobamos si hay campos vacios */
        if(empty($_POST['nombre'])){
            echo '<h3>El campo nombre es obligatorio</h3>';
        }else{
            $nombre = "'".$_POST['nombre']."'";
        }

        /*De esta forma guardamos NULL en la base de datos */
        if(empty($_POST['icono'])){
            $icono = 'NULL';
        }else{
            $icono = "'".$_POST['icono']."'";
        }

        if(empty($_POST['ruta'])){
            echo '<h3>El campo ruta es obligatorio de rellenar</h3>';
        }else{
            $ruta = "'".$_POST['ruta']."'";
        }

        if(!empty($_POST['nombre'] && $_POST['ruta'])){
            
            /*Hacemos la consulta de update*/
            $consultasql = "UPDATE miniJuego
            SET nombre=$nombre, icono=$icono, ruta=$ruta
            WHERE idMinijuego=".$_POST['i'].";";

            /*Realizamos la consulta a la base de datos */
            $objMetodo->hacerconsulta($consultasql);

            echo '<h3>Los datos se han modificado correctamente</h3>';
            echo '<br><h3><a href="index.php">*Volver a listado</a></h3>';
        }
    }
    
    ?>
</body>
</html>