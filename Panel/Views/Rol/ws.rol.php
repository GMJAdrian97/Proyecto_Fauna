<?php
    Header('Content-Type: application/json; charset=utf-8');
    require_once('mdlRol.php');

    $id_rol = NULL;
    $accion = NULL;
    $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();

    switch($accion) {
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input, true);
            $i=0;
            $cont=0;
            if (is_numeric($id_rol)) {
                foreach($data_input['roles'] as $key => $datos){
                    $resultado = $rol->update($datos, $id_rol);
                    if ($resultado) {
                        $data[$i]['mensaje'] = 'Rol actuaalizado';
                        $data[$i]['datos'] = $datos;
                        $cont++;
                    }else{
                        $data[$i]['mensaje'] = 'Error, update no ejecutado';
                    }
                    $i++;
                }
                $data['mensaje'] = "El Rol Actualizar se mando a llamar(".$cont.")";
            }else{
                foreach ($data_input['roles'] as $key => $datos) {
                    $resultado = $rol->create($datos);
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
            if (is_numeric($id_rol)) {
                $n=$rol->delete($id_rol);
                if ($n>0) {
                    $data['cantidad']=$n;
                   $data['mensaje'] = 'Se elimino el producto: '.$id_rol;
                }else{
                    $data['mensaje'] = 'No existe el producto';
                }
            }
        break;

        case 'GET':
            default:
            if (is_numeric($id_rol)) {
                $data=$rol->readOne($id_rol);
            }else{
                $data=$rol->read();
            }
           
    }

    $data=json_encode($data);
    echo $data;
    
?>