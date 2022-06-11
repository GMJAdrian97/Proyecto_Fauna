<?php
    require_once('mdltipoPago.php');
    $sistema -> validarRol('Administrador');

    //$sistema -> validarRol('Usuario');

    $id_tipoP = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_tipoP = isset($_GET['id_tipoP']) ? $_GET['id_tipoP'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/headerAdmin.php');

    switch($accion){

        case 'new':
            require_once('formTipoPago.php');
        break;

        case 'add': 
            $datos = $_POST;
            $resultado = $tipoPago->create($datos);
            $tipoPago->message($resultado, ($resultado)?"El medio de pago se agrego correctamente": "Ocurrio un error al agregar el medio de pago");
            $datos = $tipoPago->read();
            require_once('index.php');
        break;

        case 'modify':
            $datos = $tipoPago->readOne($id_tipoP);
            if(is_array($datos)){
                require_once('formTipoPago.php');
            } else{
                $tipoPago->message(0,"Ocurrio un error, el ponente no exixte");
                $datostipoPago = $tipoPago->read();
                require_once('formTipoPago.php');
                }
        break;

        case 'update':
            //$sistema -> validarRol('Administrador');
            $datos=$_POST;
            $resultado=$tipoPago->update($datos,$id_tipoP);
            $tipoPago->message($resultado, ($resultado)?"El producto se modifco correctamente": "Ocurrio un error al modificar el producto");
            $datos = $tipoPago->read();
            require_once('index.php');
        break;

        case 'delete':
            //$sistema -> validarRol('Administrador');
            $resultado = $tipoPago->delete($id_tipoP);
            $tipoPago->message($resultado, ($resultado)?"El producto se elimino correctamente": "Ocurrio un error al elimar el producto");

        
        default:
        $datos = $tipoPago->read();
        require_once('index.php');
    }


    require_once('../../../Componentes/footer.php');


?>