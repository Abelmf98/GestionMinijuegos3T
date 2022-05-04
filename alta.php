<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Alta Minijuego</title>
</head>
<body>
    <?php
    /*Necesitaremos el archivo de metodos*/
    require_once 'metodos.php';
    /*Creamos el objeto de la clase metodos */
    $objMetodo = new metodos(); 
    if(!isset($_POST["Enviar"])){

        echo '<h1>Formulario de alta Minijuegos:</h1>';
        echo '<form action="#" method="POST">';
            echo '<input type="text" name="nombre" placeholder="Nombre del Minijuego">';
            echo '<input type="text" name="icono" placeholder="Icono">';
            echo '<input type="text" name="ruta" placeholder="Ruta del archivo">';
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

        /*Realizamos la consulta para añadir datos en la base de datos */
        if(!empty($_POST['nombre'] && $_POST['ruta'])){
            
            $consultasql = "UPDATE miniJuego (nombre, icono, ruta)
                        VALUES($nombre,$icono,$ruta); ";
        
            $objMetodo->hacerconsulta($consultasql);

            /*Comprobamos las filas afectadas para añadir los minijuegos */
            if($objMetodo->comprobarafectada()>0){
                echo '<h3>Se ha añadido satisfactioriamente el minijuego: </h3>'.'<h3 id="nombre">'.$nombre.'</h3></br>';
            }else{
                echo '<h3>Se ha producido un error</h3>';
            }

        }
    }
    echo '<br><a href="index.php">*Listado de Minijuegos</a>';
    /* echo '<br>'.phpversion(); */       
    ?>
</body>
</html>