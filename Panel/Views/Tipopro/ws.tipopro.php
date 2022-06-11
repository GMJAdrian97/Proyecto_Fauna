<?php
    Header('Content-Type: application/json; charset=utf-8');
    require_once('mdlTipopro.php');

    $id_tipopro = NULL;
    $accion = NULL;
    $id_tipopro = isset($_GET['id_tipopro']) ? $_GET['id_tipopro'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();

    switch($accion) {
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input, true);
            $i=0;
            $cont=0;
            if (is_numeric($id_tipopro)) {
                foreach($data_input['tipopros'] as $key => $datos){
                    $resultado = $tipopro->update($datos, $id_tipopro);
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
                foreach ($data_input['tipopros'] as $key => $datos) {
                    $resultado = $tipopro->create($datos);
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
            if (is_numeric($id_tipopro)) {
                $n=$tipopro->delete($id_tipopro);
                if ($n>0) {
                    $data['cantidad']=$n;
                   $data['mensaje'] = 'Se elimino el producto: '.$id_tipopro;
                }else{
                    $data['mensaje'] = 'No existe el producto';
                }
            }
        break;

        case 'GET':
            default:
            if (is_numeric($id_tipopro)) {
                $data=$tipopro->readOne($id_tipopro);
            }else{
                $data=$tipopro->read();
            }
           
    }

    $data=json_encode($data);
    echo $data;
    
?>