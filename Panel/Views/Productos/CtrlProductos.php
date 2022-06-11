<?php
    require_once('mdlProductos.php');
    require_once('../Tipopro/mdlTipopro.php');
    require_once('../Proveedor/mdlProveedor.php');

    $sistema -> validarRol('Administrador');

    $id_producto = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/headerAdmin.php');

    switch($accion){

        case 'new':
            //$sistema -> validarRol('Administrador');
            $datostipopro = $tipopro->read();
            $datosproveedor = $proveedor->read();
            require_once('form.php');
        break;

        case 'add': 
            //$sistema -> validarRol('Administrador');  
            $datos = $_POST;
            $resultado = $produto->create($datos);
            $produto->message($resultado, ($resultado)?"El producto se agrego correctamente": "Ocurrio un error al agregar el producto");
            $datos = $produto->read();
            require_once('index.php');
        break;

        case 'modify':
            //$sistema -> validarRol('Administrador');
            $datos = $produto->readOne($id_producto);
            $datostipopro = $tipopro->read();
            $datosproveedor = $proveedor->read();
            if(is_array($datos)){
                require_once('form.php');
            } else{
                $produto->message(0,"Ocurrio un error, el ponente no exixte");
                $datostipopro = $tipopro->read();
                $datosproveedor = $proveedor->read();
                require_once('form.php');
                }
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$produto->update($datos,$id_producto);
            $produto->message($resultado, ($resultado)?"El producto se modifco correctamente": "Ocurrio un error al modificar el producto");
            $datos = $produto->read();
            require_once('index.php');
        break;

        case 'delete':
            //$sistema -> validarRol('Administrador');
            $resultado = $produto->delete($id_producto);
            $produto->message($resultado, ($resultado)?"El producto se elimino correctamente": "Ocurrio un error al elimar el producto");

        
        default:
        $datos = $produto->read();
        require_once('index.php');
    }


    require_once('../../../Componentes/footer.php');


?>