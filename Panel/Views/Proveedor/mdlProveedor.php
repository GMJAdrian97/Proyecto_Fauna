<?php
    require_once('../../sistema.php');

    class Provedor extends Sistema{
 
        public function read(){
            $this->connect();
            $sql = "SELECT * FROM proveedor;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function readOne($id_proveedor){
            $this->connect();
            $sql = "SELECT * FROM proveedor WHERE id_proveedor = :id_proveedor";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_proveedor",$id_proveedor, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = $datos[0];
            return $datos;
        }

        public function create($datos){
            $this->connect();
            $sql = "INSERT INTO proveedor (proveedor, telefono, direccion) VALUES (:proveedor, :telefono, :direccion)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":proveedor",$datos['proveedor'], PDO::PARAM_STR);
            $stmt->bindParam(":telefono",$datos['telefono'], PDO::PARAM_INT);
            $stmt->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return $rs; 
        }

        public function update($datos,$id_proveedor){
            $this->connect();
            $sql = "UPDATE proveedor SET 
                            proveedor = :proveedor,
                            telefono = :telefono,
                            direccion = :direccion
                     WHERE id_proveedor = :id_proveedor";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":proveedor",$datos['proveedor'], PDO::PARAM_STR);
            $stmt->bindParam(":telefono",$datos['telefono'], PDO::PARAM_INT);
            $stmt->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(":id_proveedor",$id_proveedor, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }

        public function delete($id_proveedor){
            $this->connect();
            $sql = "DELETE FROM proveedor WHERE id_proveedor = :id_proveedor";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_proveedor",$id_proveedor, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }



    }

    $proveedor = new Provedor;
    
?>