<?php

/*Para ello necesitaremos el archivo configuración*/
require_once 'conexionbd.php';

/*Creamos la clase metodos*/
Class metodos{
    /*Creamos el atributo mysqli que lo necesitaremos mas adelante */
    private $mysqli;
    /*Creamos el atributo resultado que lo necesitaremos para devolver consultas y comprobar filas de la tabla */
    private $resultado;

    /*Hacemos el constructor donde llamaremos a la clase mysqli, a la cual le pasamos como parametros los datos del archivo configuracion*/
    function __construct(){
        $this->mysqli = new mysqli(servidor, usuario, password, basededatos);
    }

    /*Necesitaremos un metodo para realizar consultas a la base de datos*/
    function hacerconsulta($sql){
        /*Hacemos referencia al metodo query, que sera imprescindible para realizar las consultas*/
        $this->resultado=$this->mysqli->query($sql);
    }

    /*Haremos un metodo para comprobar las filas afectadas al realizar un alta */
    function comprobarafectada(){
        /*Como vamos a utilizar insert necesitaremos affected_rows que devolvemos el resultado desde el alta */
        return $this->mysqli->affected_rows;
    }

    /*Haremos un metodo para comprobar el numero de filas que tiene una tabla */
    function revisarnumrow(){
        /*Le devolvemos lo que haya dentro */
        return $this->resultado->num_rows;
    }

    /*Necesitaremos un metodo para extraer las filas */
    function sacarfila(){
        /*Utilizaremos fetch_array, que obtiene devuelve el array de una fila */
        return $this->resultado->fetch_array();
    }
}