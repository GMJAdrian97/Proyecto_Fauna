<?php
    require_once('../../sistema.php');

    class Area extends Sistema{
 
        public function read(){
            $this->connect();
            $sql = "SELECT * FROM area";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function readOne($id_area){
            $this->connect();
            $sql = "SELECT * FROM area WHERE id_area = :id_area";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_area",$id_area, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = $datos[0];
            return $datos;
        }

        public function create($datos){
            $this->connect();
            $sql = "INSERT INTO area (area) VALUES (:area)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":area",$datos['area'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return $rs; 
        }

        public function update($datos, $id_area){
            $this->connect();
            $sql = "UPDATE area SET 
                            area = :area 
                    WHERE id_area = :id_area";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":area",$datos['area'], PDO::PARAM_STR);
            $stmt->bindParam(":id_area",$id_area, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }

        public function delete($id_area){
            $this->connect();
            $sql = "DELETE FROM area WHERE id_area = :id_area";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_area",$id_area, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }



    }

    $area = new Area;
    
?>