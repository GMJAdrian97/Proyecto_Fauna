<?php
    require_once('mdlMisCompras.php');

    $sistema -> validarRol('Cliente');

    $id_compra = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_compra = isset($_GET['id_compra']) ? $_GET['id_compra'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/headerCliente.php');

    switch($accion){

        case 'MisCompras':
            default:
            //$sistema -> validarRol('Administrador');
            $correoUS = $_SESSION['correo'];
            $miscompras = $mcompras->read($correoUS);
            require_once('IndexMisCompras.php');
        break;
      
    }


    require_once('../../../Componentes/footer.php');


?>