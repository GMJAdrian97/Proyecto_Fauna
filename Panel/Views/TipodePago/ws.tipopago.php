<?php
    Header('Content-Type: application/json; charset=utf-8');
    require_once('mdltipoPago.php');

    $id_tipoP = NULL;
    $accion = NULL;
    $id_tipoP = isset($_GET['id_tipoP']) ? $_GET['id_tipoP'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();

    switch($accion) {
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input, true);
            $i=0;
            $cont=0;
            if (is_numeric($id_tipoP)) {
                foreach($data_input['tipospagos'] as $key => $datos){
                    $resultado = $tipoPago->update($datos, $id_tipoP);
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
                foreach ($data_input['tipospagos'] as $key => $datos) {
                    $resultado = $tipoPago->create($datos);
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
            if (is_numeric($id_tipoP)) {
                $n=$tipoPago->delete($id_tipoP);
                if ($n>0) {
                    $data['cantidad']=$n;
                   $data['mensaje'] = 'Se elimino el producto: '.$id_tipoP;
                }else{
                    $data['mensaje'] = 'No existe el producto';
                }
            }
        break;

        case 'GET':
            default:
            if (is_numeric($id_tipoP)) {
                $data=$tipoPago->readOne($id_tipoP);
            }else{
                $data=$tipoPago->read();
            }
           
    }

    $data=json_encode($data);
    echo $data;
    
?>