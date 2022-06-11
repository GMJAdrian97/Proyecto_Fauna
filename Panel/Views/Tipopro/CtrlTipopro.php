<?php
    require_once('mdlTipopro.php');

    $sistema -> validarRol('Administrador');

    $id_tipopro = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_tipopro = isset($_GET['id_tipopro']) ? $_GET['id_tipopro'] : NULL;
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
            $resultado = $tipopro->create($datos);
            $tipopro->message($resultado, ($resultado)?"El producto se agrego correctamente": "Ocurrio un error al agregar el producto");
            $datos = $tipopro->read();
            require_once('index.php');
        break;

        case 'modify':
            //$sistema -> validarRol('Administrador');
            $datos = $tipopro->readOne($id_tipopro);
            if(is_array($datos)){
                require_once('form.php');
            } else{
                $tipopro->message(0,"Ocurrio un error, el ponente no exixte");
                $datostipopro = $tipopro->read();
                $datosproveedor = $tipopro->read();
                require_once('form.php');
                }
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$tipopro->update($datos,$id_tipopro);
            $tipopro->message($resultado, ($resultado)?"El producto se modifco correctamente": "Ocurrio un error al modificar el producto");
            $datos = $tipopro->read();
            require_once('index.php');
        break;

        case 'delete':
            //$sistema -> validarRol('Administrador');
            $resultado = $tipopro->delete($id_tipopro);
            $tipopro->message($resultado, ($resultado)?"El producto se elimino correctamente": "Ocurrio un error al elimar el producto");

        
        default:
        $datos = $tipopro->read();
        require_once('index.php');
    }


    require_once('../../../Componentes/footer.php');


?>