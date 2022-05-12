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

    $consultasql = "SELECT * FROM miniJuego";
    if($objMetodo->revisarnumrow()>0){

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
              for($i=0;$i<$objMetodo->revisarnumrow();$i++){
                $fila=$objMetodo->sacarfila();
                if(empty($fila["icono"])){
                  $fila["icono"] = "NULL";
                }
              echo '<tr>';
                echo '<td>'.$fila["nombre"].'</td>';
                echo '<td>'.$fila["ruta"].'</td>';
                echo '<td>'.$fila["icono"].'</td>';
                echo '<td><a href="modificar.php?i='.$fila["idMinijuego"].'">Modificar</a></td>';
                echo '<td><a href="borrado.php?i='.$fila["idMinijuego"].'">Eliminar</a></td>';
              echo '</tr>';
              }
          echo    '
            </table>
          ';
        }else {
          if($objMetodo->revisarnumrow()<0){
            echo 'Se ha producido un error';
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
