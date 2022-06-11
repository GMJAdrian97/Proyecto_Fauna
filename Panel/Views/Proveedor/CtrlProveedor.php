<?php
    require_once('mdlProveedor.php');

    $sistema -> validarRol('Administrador');

    $id_proveedor = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_proveedor = isset($_GET['id_proveedor']) ? $_GET['id_proveedor'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/headerAdmin.php');

    switch($accion){

        case 'new':
            //$sistema -> validarRol('Administrador');
            $datosproveedor = $proveedor->read();
            require_once('form.php');
        break;

        case 'add': 
            //$sistema -> validarRol('Administrador');  
            $datos = $_POST;
            $resultado = $proveedor->create($datos);
            $proveedor->message($resultado, ($resultado)?"El producto se agrego correctamente": "Ocurrio un error al agregar el producto");
            $datos = $proveedor->read();
            require_once('index.php');
        break;

        case 'modify':
            //$sistema -> validarRol('Administrador');
            $datos = $proveedor->readOne($id_proveedor);
            if(is_array($datos)){
                require_once('form.php');
            } else{
                $proveedor->message(0,"Ocurrio un error, el ponente no exixte");
                $datosproveedor = $proveedor->read();
                require_once('form.php');
                }
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$proveedor->update($datos,$id_proveedor);
            $proveedor->message($resultado, ($resultado)?"El producto se modifco correctamente": "Ocurrio un error al modificar el producto");
            $datos = $proveedor->read();
            require_once('index.php');
        break;

        case 'delete':
            //$sistema -> validarRol('Administrador');
            $resultado = $proveedor->delete($id_proveedor);
            $proveedor->message($resultado, ($resultado)?"El producto se elimino correctamente": "Ocurrio un error al elimar el producto");

        
        default:
        $datos = $proveedor->read();
        require_once('index.php');
    }


    require_once('../../../Componentes/footer.php');


?>