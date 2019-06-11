<?php

require_once 'controllers/errores.php';
//sera la centralizacion de todo el proyecto 1.0
class App{

    function __construct(){
        echo "<p> NUEVA APP </P>";
    
        //EXTRAER LOS PARAMETRO DE URL DE ARCHIVO .HTACCES
        $url= $_GET['url'];
        
        //QUITAR LO DIAGONALE EXTRAS QUE ESTA UNIDOS POR SI HAY
        $url=rtrim($url, '/');

        //EXPLODE PARA PARTIR O DIVIDIR POR PARAMETROS
        $url=explode('/', $url);

        //IMPRIMIR ARREGLE 
        //var_dump($url);
    
        $archivoController = 'controllers/'.$url[0].'.php';

        //Verificamos si el controlador existe si que no mande algun controladro qeu se llame
        if(file_exists($archivoController)){
            //cargo controlador si existe
            require_once $archivoController;
            $controller=new $url[0];

            //verificamos si viene algo ademas del controlador 
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }

        }else{
            
            //si el controlador no existe no mandara a la Clase error
            $controller=new Errores();
        }





    }


}




?>