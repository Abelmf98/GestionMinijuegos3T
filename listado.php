<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Listado Minijuegos</title>
</head>
<body>
    <?php
        /*Requerimos de nuevo el fichero metodos */
        require_once 'metodos.php';
        /*LLamamos al objeto metodos */
        $objMetodo = new metodos();

        /*Realizamos la consulta para consultar las filas y columnas que tenemos en la tabla */
        $consultasql = "SELECT * FROM miniJuego";
        $objMetodo->hacerconsulta($consultasql);

        /*Comprobamos si las filas son mayores a 0 */
        if($objMetodo ->revisarnumrow()>0){
            /*Realizamos una tabla para mostrar*/
            echo '<table>';
                echo '<tr>';
                    echo '<th>Nombre</th>';
                    echo '<th>Icono</th>';
                    echo '<th>Ruta</th>';
                    echo '<th>Modificar</th>';
                    echo '<th>Eliminar</th>';
                echo '</tr>';

                /*Recorremos las filas de la tabla con un for y vamos extrayendo las filas correspondientes */
                for($i=0;$i<$objMetodo->revisarnumrow();$i++){
                    $fila = $objMetodo ->sacarfila();
                    /*Le decimos a la posicion del campo icono que de estar vacio escriba un NULL en la interfaz */
                    if(empty($fila["icono"])){
                        $fila["icono"] = "NULL";
                    }
                
                echo '<tr>';
                    echo '<td>'.$fila["nombre"].'</td>';
                    echo '<td>'.$fila["icono"].'</td>';
                    echo '<td>'.$fila["ruta"].'</td>';
                    echo '<td><a href="#">Modificar</a></td>';
                    echo '<td><a href="borrado.php">Eliminar</a></td>';
                echo '</tr>';
                }     
            echo '</table>';
        }else{
            /*Le decimos que si no hay filas se produce un error */
            if($objMetodo->revisarnumrow()<0){
                echo '<h3>Se ha producido un error inesperado</h3>';
            }else{
                echo '<h3>No existen datos</h3>';
            }
        }

        echo '<br><a href="alta.php">*Realizar alta de minujuegos</a>';
    ?>
</body>
</html>