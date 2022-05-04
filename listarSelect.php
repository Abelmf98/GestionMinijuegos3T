<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Listado Select</title>
</head>
<body>
    <?php
        require_once 'metodos.php';
        $objMetodo = new metodos();

        if(isset($fila)){
        echo '<form action="#" method="POST">';
            echo '<select name="minijuego">';
            foreach($fila as $valor){
                echo "<option value=".$valor['idMinijuego'].">".$valor['nombre']."</option>";
            }    
            echo '</select>';
            echo '<br><br>';
        }else{
            echo '<h3>No existen valores</h3>';
        }
            echo '<input type="submit" name="Listar" value="listar">';    
        echo '</form>';
    ?>
</body>
</html>