<?php
    require_once('mdlEmpleados.php');
    require_once('../Area/mdlArea.php');

    $sistema -> validarRol('Administrador');;

    $id_empleado = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_empleado = isset($_GET['id_empleado']) ? $_GET['id_empleado'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/headerAdmin.php');

    switch($accion){

        case 'readOne':
            $datos = $empleado->readOne($id_empleado);
            if(is_array($datos)){
                require_once('index.php');
            } else{
                $empleado->message(0,"Ocurrio un error, el empleado no exixte");
                $datostipo = $tipo->read();
                require_once('form.php');
            }

        case 'new':
            //$sistema -> validarRol('Administrador');
            $datosarea = $area->read();
            $datosempleado = $empleado->read();
            require_once('form.php');
        break;

        case 'add': 
            //$sistema -> validarRol('Administrador');  
            $datos = $_POST;
            $resultado = $empleado->create($datos);
            $empleado->message($resultado, ($resultado)?"El empleado se agrego correctamente": "Ocurrio un error al agregar el empleado");
            $datos = $empleado->read();
            require_once('index.php');
        break;

        case 'modify':
            //$sistema -> validarRol('Administrador');
            $datos = $empleado->readOne($id_empleado);
            $datosarea = $area->read();
            if(is_array($datos)){
                require_once('form.php');
            } else{
                $empleado->message(0,"Ocurrio un error, el ponente no exixte");
                $datosarea = $area->read();
                $datosempleado = $empleado->read();
                require_once('form.php');
                }
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$empleado->update($datos,$id_empleado);
            $empleado->message($resultado, ($resultado)?"El empleado se modifco correctamente": "Ocurrio un error al modificar el empleado");
            $datos = $empleado->read();
            require_once('index.php');
        break;

        case 'delete':
            //$sistema -> validarRol('Administrador');
            $resultado = $empleado->delete($id_empleado);
            $empleado->message($resultado, ($resultado)?"El empleado se elimino correctamente": "Ocurrio un error al elimar el empleado");

        
        default:
        $datos = $empleado->read();
        require_once('index.php');
    }


    require_once('../../../Componentes/footer.php');


?>