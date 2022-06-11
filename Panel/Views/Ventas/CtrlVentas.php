<?php
 require_once('mdlVentas.php');
 $sistema -> validarRol('Administrador');
    $accion = NULL;
    require_once('../../../Componentes/headerAdmin.php');
    switch($accion){
        default:
            $MisVenta = $ventas->read();
            require_once('index.php');
        break;
            require_once('index.php');
    }
    require_once('../../../Componentes/footer.php');
?>