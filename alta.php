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
        if(!empty($_POST["nombre"] && $_POST["icono"] && $_POST["ruta"])){ /*Me falta comprobar el campo que se muestre a NULL en la BBDD */
        /*Hacemos la consulta */
        $consultasql = "INSERT INTO miniJuego (nombre, icono, ruta) 
        VALUES ('".$_POST["nombre"]."','".$_POST["icono"]."','".$_POST["ruta"]."');";
        $objMetodo->hacerconsulta($consultasql);
            /*Comprobamos las filas afectadas para añadir los minijuegos */
            if($objMetodo->comprobarafectada()>0){
                echo '<p>Se ha añadido satisfactioriamente el minijuego: </p>'.'<p id="nombre">'.$_POST["nombre"].'</p></br>';
            }else{
                echo '<p>Se ha producido un error</p>';
            }
        }else{
            echo '<p>Los campos nombre y ruta son obligatorios</p>';
        }
    }        
    ?>
</body>
</html>