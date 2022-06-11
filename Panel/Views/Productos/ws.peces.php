<?php
    Header('Content-Type: application/json; charset=utf-8');
    require_once('mdlProductos.php');
    require_once('../Tipopro/mdlTipopro.php');
    require_once('../Proveedor/mdlProveedor.php');

    $id_producto = NULL;
    $accion = NULL;
    $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();

    switch($accion) {
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input, true);
            $i=0;
            $cont=0;
            if (is_numeric($id_producto)) {
                foreach($data_input['productos'] as $key => $datos){
                    $resultado = $produto->update($datos, $id_producto);
                    if ($resultado) {
                        $data[$i]['mensaje'] = 'Producto actuaalizado';
                        $data[$i]['datos'] = $datos;
                        $cont++;
                    }else{
                        $data[$i]['mensaje'] = 'Error, update no ejecutado';
                    }
                    $i++;
                }
                $data['mensaje'] = "El metodo Actualizar se mando a llamar(".$cont.")";
            }else{
                foreach ($data_input['productos'] as $key => $datos) {
                    $resultado = $produto->create($datos);
                    if ($resultado) {
                        $data[$i]['mensaje'] = 'Producto insertado';
                        $data[$i]['datos'] = $datos;
                        $cont++;
                    }else{
                        $data[$i]['mensaje'] = 'Error, insert no ejecutado';
                    }
                    $i++;
                }
                $data['mensaje'] = "El metodo insercion se mando a llamar(".$cont.")";
            }
        break;

        case 'DELETE':
            if (is_numeric($id_producto)) {
                $n=$produto->delete($id_producto);
                if ($n>0) {
                    $data['cantidad']=$n;
                   $data['mensaje'] = 'Se elimino el producto: '.$id_producto;
                }else{
                    $data['mensaje'] = 'No existe el producto';
                }
            }
        break;

        case 'GET':
            default:
            if (is_numeric($id_producto)) {
                $data=$produto->readOne($id_producto);
            }else{
                $data=$produto->read();
            }
           
    }

    $data=json_encode($data);
    echo $data;
    
?>