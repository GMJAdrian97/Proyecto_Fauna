<?php 
    require_once('../../sistema.php');
    $sistema -> validarRol('Cliente');

    require_once('../TipodePago/mdlTipoPago.php');
    require_once('../Productos/mdlProductos.php');
    require_once('mdlCliente.php');
    require_once('mdlMisCompras.php');
    
        $id_producto = NULL;
        $accion = NULL;
        if(isset($_POST['comprar'])){
            $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
            $accion = $_POST['comprar'];
        }
        require_once '../../../Componentes/headerCliente.php'; 
    
        switch($accion){
            case 'Comprar':
                $pago=$tipoPago->read();
                //Se toma el correo 
                $correoUS = $_SESSION['correo'];
                //Se manda el ccoreo de parametro para traer el id del cliente asociado
                $Arreglo_idCliente=$mcompras->readID_C($correoUS);
                //le asignamos a la varianle $id_cliente lo que tenga $Arreglo_idCliente
                $id_cliente = $Arreglo_idCliente[0]['id_cliente'];
                $stockP=$_POST['StockP'];
                $mediopago=$_POST['id_tipoP'];
                $compra = $mcompras->create($id_cliente,$id_producto,$mediopago,$stockP);
                $RestarStock=$produto->updateS($id_producto, $stockP);
                $cliente->message(1,"Garcias por tu compra!!!");
                require_once ('IndexCliente.php');
            break;

            case 'agregarCart':
                $correoUS = $_SESSION['correo'];
                //Se manda el ccoreo de parametro para traer el id del cliente asociado
                $Arreglo_idCliente=$mcompras->readID_C($correoUS);
                //le asignamos a la varianle $id_cliente lo que tenga $Arreglo_idCliente
                $id_cliente = $Arreglo_idCliente[0]['id_cliente'];
                $productos=$produto->readOne($id_producto);
                $stockP=$_POST['StockP'];
                $subtotal=$productos['precio'] * $stockP;
                $addCart=$mcompras->addCart($id_cliente,$id_producto,$stockP,$subtotal);
                require_once ('IndexCliente.php');

            break;

        
            default:
            //$datos = $tipopro->read();
            require_once 'IndexCliente.php';
        }
    
    
        require_once('../../../Componentes/footer.php');
    
    

?>