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
}