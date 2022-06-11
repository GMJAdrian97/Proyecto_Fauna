<?php 
    require_once('mdlRegistro.php');
    $accion = NULL;
    if (isset($_GET['accion'])) {
        $accion = $_GET['accion'];
    }
    require_once '../../../Componentes/header.php';
    switch ($accion) {
        case 'register':
            $datos = $_POST;
            if ($registro->register($datos)) {
                $sistema->message(1, "Felidades ahora eres un usuario de Fauna, Por favor Ingrese sus credenciales");
                require_once('../Login/CtrlLogin.php');
            }
            else{
                $sistema->message(0, "Ocurrio un error");
            }
        break;

        default:
            require_once('index.php');
    }

?>