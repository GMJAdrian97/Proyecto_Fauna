<?php
    require_once('../../sistema.php');

    class InicioAdm extends Sistema{
        
        public function conteoEmpleados($id_area){
            $this->connect();
            $sql = "SELECT count(*) as conteo FROM empleado WHERE id_area = :id_area";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_area', $id_area, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos[0]['conteo'];
        }

    }  

    $inicioAdm = new InicioAdm();

?>