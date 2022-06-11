<?php
    Header('Content-Type: application/json; charset=utf-8');
    require_once('mdlEmpleados.php');
    require_once('../Area/mdlArea.php');

    $id_empleado = NULL;
    $accion = NULL;
    $id_empleado = isset($_GET['id_empleado']) ? $_GET['id_empleado'] : NULL;
    $accion = $_SERVER['REQUEST_METHOD'];
    $data = array();

    switch($accion) {
        case 'POST':
            $data_input = file_get_contents('php://input');
            $data_input = json_decode($data_input, true);
            $i=0;
            $cont=0;
            if (is_numeric($id_empleado)) {
                foreach($data_input['empleados'] as $key => $datos){
                    $resultado = $empleado->update($datos, $id_empleado);
                    if ($resultado) {
                        $data[$i]['mensaje'] = 'Empleado actuaalizado';
                        $data[$i]['datos'] = $datos;
                        $cont++;
                    }else{
                        $data[$i]['mensaje'] = 'Error, update no ejecutado';
                    }
                    $i++;
                }
                $data['mensaje'] = "El metodo Actualizar se mando a llamar(".$cont.")";
            }else{
                foreach ($data_input['empleados'] as $key => $datos) {
                    $resultado = $empleado->create($datos);
                    if ($resultado) {
                        $data[$i]['mensaje'] = 'Empleado insertado';
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
            if (is_numeric($id_empleado)) {
                $n=$empleado->delete($id_empleado);
                if ($n>0) {
                    $data['cantidad']=$n;
                   $data['mensaje'] = 'Se elimino el empleado: '.$id_empleado;
                }else{
                    $data['mensaje'] = 'No existe el empleado';
                }
            }
        break;

        case 'GET':
            default:
            if (is_numeric($id_empleado)) {
                $data=$empleado->readOne($id_empleado);
            }else{
                $data=$empleado->read();
            }
           
    }

    $data=json_encode($data);
    echo $data;
    
?>