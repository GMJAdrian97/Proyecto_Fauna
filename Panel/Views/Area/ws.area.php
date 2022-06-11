<?php
    Header('Content-Type: application/json; charset=utf-8');
    require_once('mdlarea.php');

    $id_area = NULL;
    $accion = NULL;
    $id_area = isset($_GET['id_area']) ? $_GET['id_area'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();

    switch($accion) {
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input, true);
            $i=0;
            $cont=0;
            if (is_numeric($id_area)) {
                foreach($data_input['areas'] as $key => $datos){
                    $resultado = $area->update($datos, $id_area);
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
                foreach ($data_input['areas'] as $key => $datos) {
                    $resultado = $area->create($datos);
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
            if (is_numeric($id_area)) {
                $n=$area->delete($id_area);
                if ($n>0) {
                    $data['cantidad']=$n;
                   $data['mensaje'] = 'Se elimino el producto: '.$id_area;
                }else{
                    $data['mensaje'] = 'No existe el producto';
                }
            }
        break;

        case 'GET':
            default:
            if (is_numeric($id_area)) {
                $data=$area->readOne($id_area);
            }else{
                $data=$area->read();
            }
           
    }

    $data=json_encode($data);
    echo $data;
    
?>