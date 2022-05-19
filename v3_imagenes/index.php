<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Listado</title>
  </head>
  <body>
    <?php
    include_once 'conexionbd.php';

    /*Llamo a la conexion*/
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BD);  

    /*Hago la consulta a la base de datos */
    $consultasql = "SELECT * FROM miniJuego";

    /*Guardo el resultado de la consulta en una variable */
    $resultado = $conexion->query($consultasql);

    /*Compruebo las filas que devuelve la consulta */
    if($resultado->num_rows>0){

      echo
          '
            <table>
              <tr>
                <th>Nombre</th>
                <th>Icono</th>
                <th>Ruta</th>
                <th>Modificar</th>
                <th>Eliminar</th>
              </tr>
              ';
              /*Compruebo las filas que devuelve la consulta */
              for($i=0;$i<$resultado->num_rows;$i++){
                /*Extraigo el resultado de la consulta*/
                $fila=$resultado->fetch_array();
                if(empty($fila["icono"])){
                  $fila["icono"] = "NULL";
                }
              echo '<tr>';
                echo '<td>'.$fila["nombre"].'</td>';
                echo "<td><img src='".'./iconos/'.$fila["icono"]."'></td>";
                echo '<td>'.$fila["ruta"].'</td>';
                echo '<td><a href="modificar.php?i='.$fila["idMinijuego"].'"><img src="https://cdn-icons-png.flaticon.com/512/1159/1159876.png"></a></td>';
                echo '<td><a href="borrado.php?i='.$fila["idMinijuego"].'"><img src="https://cdn-icons-png.flaticon.com/512/6794/6794645.png"></a></td>';
              echo '</tr>';
              }
          echo    '
            </table>
          ';
        }else {
          /*Compruebo las filas que devuelve la consulta */
          if($resultado= $conexion->num_rows<0){
            echo 'Se ha producido un error', $conexion->errno;
            echo '<br>'.$conexion->error;
          }else {
            echo 'No hay datos';
          }
        }


        echo '<br><h3><a href="alta.php">*Realizar alta de minijuegos</a></h3>';
        echo '<br><h3><a href="listarSelect.php">*Listado Select</a></h3>';
        echo '<br><h3><a href="listadocheck.php">*Listado Check</a></h3>';
     ?>
  </body>
</html>
