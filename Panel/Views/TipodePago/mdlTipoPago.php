<?php
    require_once('../../sistema.php');

    class TipoPago extends Sistema{
 
        public function read(){
            $this->connect();
            $sql = "SELECT * FROM tipo_pago";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function readOne($id_tipoP){
            $this->connect();
            $sql = "SELECT * FROM tipo_pago WHERE id_tipoP = :id_tipoP";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_tipoP",$id_tipoP, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = $datos[0];
            return $datos;
        }

        public function create($datos){
            $this->connect();
            $sql = "INSERT INTO tipo_pago (tipoP) VALUES (:tipoP)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":tipoP",$datos['tipoP'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return $rs; 
        }

        public function update($datos, $id_tipoP){
            $this->connect();
            $sql = "UPDATE tipo_pago SET 
                            tipoP = :tipoP 
                    WHERE id_tipoP = :id_tipoP";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":tipoP",$datos['tipoP'], PDO::PARAM_STR);
            $stmt->bindParam(":id_tipoP",$id_tipoP, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }

        public function delete($id_tipoP){
            $this->connect();
            $sql = "DELETE FROM tipo_pago WHERE id_tipoP = :id_tipoP";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_tipoP",$id_tipoP, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }



    }

    $tipoPago = new TipoPago;
    
?>