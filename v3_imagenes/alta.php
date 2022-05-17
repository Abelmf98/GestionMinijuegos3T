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
    include_once 'conexionbd.php';
    
    if(!isset($_POST["Enviar"])){

        echo '<h1>Formulario de alta Minijuegos:</h1>';
        echo '<form action="#" method="POST" enctype="multipart/form-data">';
            echo '<input type="text" name="nombre" placeholder="Nombre del Minijuego">';
            echo '<input type="file" name="icono" placeholder="Icono">';
            echo '<input type="text" name="ruta" placeholder="Ruta del archivo">';
            echo '<input type="submit" name="Enviar">';
        echo '</form>';
    }else{
        $guardar = 1;
        /*Comprobamos si hay campos vacios */
        if(empty($_POST['nombre'])){
            echo '<h3>El campo nombre es obligatorio</h3>';
            $guardar = 0;
        }else{
            $nombre = "'".$_POST['nombre']."'";
        }

        
        if(isset($_FILES['icono'])) {
                
            if (isset($_FILES['icono']['name']) && $_FILES['icono']['name'] != "") {

                 //Datos necesarios del archivo
                 $icono="'".basename($_FILES['icono']['name'])."'";
                 $tipo = $_FILES['icono']['type'];
                 $tamanio = $_FILES['icono']['size'];
                 $temp = $_FILES['icono']['tmp_name'];

                 //Comprobar tamaño y extensión del archivo
                if (!((strpos($tipo, "png") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "gif")) && ($tamanio < 20000000))) {

                    //Si las características no son correctas mostrará este mensaje
                    echo    '<div>
                                <p>Tamaño maximo: 2mb</p>
                                <p>Extensiones: png - jpeg - jpg - gif</p>
                            </div>';
                } else {
                    
                    //Si las características son correctas se sube al servidor
                    if (move_uploaded_file($temp, './iconos/' . basename($_FILES['icono']['name']))) {
                        
                        //Enseño un mensaje para mostrar que se ha subido.
                        echo '<h3>La imagen se ha subido correctamente</h3>';
                    }
                }
            }
            /*De esta forma guardamos NULL en la base de datos */
        }else {

            $icono='NULL';
        }

        if(empty($_POST['ruta'])){
            echo '<h3>El campo ruta es obligatorio de rellenar</h3>';
            $guardar = 0;
        }else{
            $ruta = "'".$_POST['ruta']."'";
        }

        /*Comprobamos que todos los datos son correctos y se añaden las filas*/
        if($guardar){
            
            /*Llamamos a la conexion*/
            $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BD);

            /*Hacemos la consulta a la bd */
            $consultasql = "INSERT INTO miniJuego (nombre, icono, ruta)
                        VALUES($nombre,$icono,$ruta);";

            /*Guardamos la consulta */
            $conexion->query($consultasql);
        
            /*Comprobamos las filas afectadas para añadir los minijuegos */
            if($conexion->affected_rows>0){
                echo '<h3>Se ha añadido satisfactioriamente el minijuego: </h3>'.'<h3 id="nombre">'.$nombre.'</h3></br>';
            }else{
                /*Mostramos el codigo de error */
                echo 'Se ha producido un error:', $conexion->errno;
                echo '<br>'.$conexion->error;
            }
        }
    }
    echo '<br><a href="index.php">*Listado de Minijuegos</a>';     
    ?>
</body>
</html>