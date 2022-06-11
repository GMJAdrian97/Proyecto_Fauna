<?php
    Header('Content-Type: application/json; charset=utf-8');
    require_once('mdlProveedor.php');

    $id_proveedor = NULL;
    $accion = NULL;
    $id_proveedor = isset($_GET['id_proveedor']) ? $_GET['id_proveedor'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();

    switch($accion) {
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input, true);
            $i=0;
            $cont=0;
            if (is_numeric($id_proveedor)) {
                foreach($data_input['proveedores'] as $key => $datos){
                    $resultado = $proveedor->update($datos, $id_proveedor);
                    if ($resultado) {
                        $data[$i]['mensaje'] = 'Proveedor actuaalizado';
                        $data[$i]['datos'] = $datos;
                        $cont++;
                    }else{
                        $data[$i]['mensaje'] = 'Error, update no ejecutado';
                    }
                    $i++;
                }
                $data['mensaje'] = "El metodo Actualizar se mando a llamar(".$cont.")";
            }else{
                foreach ($data_input['proveedores'] as $key => $datos) {
                    $resultado = $proveedor->create($datos);
                    if ($resultado) {
                        $data[$i]['mensaje'] = 'Proveedor insertado';
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
            if (is_numeric($id_proveedor)) {
                $n=$proveedor->delete($id_proveedor);
                if ($n>0) {
                    $data['cantidad']=$n;
                   $data['mensaje'] = 'Se elimino el producto: '.$id_proveedor;
                }else{
                    $data['mensaje'] = 'No existe el producto';
                }
            }
        break;

        case 'GET':
            default:
            if (is_numeric($id_proveedor)) {
                $data=$proveedor->readOne($id_proveedor);
            }else{
                $data=$proveedor->read();
            }
           
    }

    $data=json_encode($data);
    echo $data;
    
?>