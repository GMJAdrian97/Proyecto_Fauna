<?php
    require_once('mdlArea.php');

    $sistema -> validarRol('Administrador');

    $id_area = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_area = isset($_GET['id_area']) ? $_GET['id_area'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/headerAdmin.php');

    switch($accion){

        case 'new':
            //$sistema -> validarRol('Administrador');
            require_once('form.php');
        break;

        case 'add': 
            //$sistema -> validarRol('Administrador');  
            $datos = $_POST;
            $resultado = $area->create($datos);
            $area->message($resultado, ($resultado)?"El area se agrego correctamente": "Ocurrio un error al agregar el area");
            $datos = $area->read();
            require_once('index.php');
        break;

        case 'modify':
            //$sistema -> validarRol('Administrador');
            $datos = $area->readOne($id_area);
            if(is_array($datos)){
                require_once('form.php');
            } else{
                $area->message(0,"Ocurrio un error, el area no exixte");
                $datostipopro = $area->read();
                $datosproveedor = $area->read();
                require_once('form.php');
                }
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$area->update($datos,$id_area);
            $area->message($resultado, ($resultado)?"El area se modifco correctamente": "Ocurrio un error al modificar el area");
            $datos = $area->read();
            require_once('index.php');
        break;

        case 'delete':
            //$sistema -> validarRol('Administrador');
            $resultado = $area->delete($id_area);
            $area->message($resultado, ($resultado)?"El area se elimino correctamente": "Ocurrio un error al elimar el area");

        
        default:
        $datos = $area->read();
        require_once('index.php');
    }


    require_once('../../../Componentes/footer.php');


?>