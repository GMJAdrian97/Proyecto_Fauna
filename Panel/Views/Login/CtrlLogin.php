<?php
    require_once('../../sistema.php');
    require_once('../Usuario/mdlUsuario.php');
    $accion = NULL;
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }

    switch($accion){

        case 'login';
                $datos = $_POST;
                if($usuario->login($datos['username'], $datos['password'])){
                    $usuario -> credentials($datos['username']);
                    print_r($_SESSION['roles']);
                    switch($_SESSION['roles'][0]){
                        case 'Administrador':
                            header('Location: ../InicioAdmin/CtrlInicioAdmin.php');
                        break;

                        case 'Empleado':
                           
                        break;
                        

                        default: //cliente
                        header('Location: ../Cliente/CtrlIndex.php');
                    }
                }
                else{
                    $sistema -> message(0,"Usuario o contraseña invalidas, porfavor ingresa campos validos");
                    $sistema -> logOut();
                    require_once('index.php');
                    }
        break;

        case 'logOut';
                $sistema -> message(1,"La sesion se ha cerrado");
                $sistema -> logOut();
                header('Location: CtrlLogin.php');
                break;
        default:
        require_once('index.php');
    }
?>