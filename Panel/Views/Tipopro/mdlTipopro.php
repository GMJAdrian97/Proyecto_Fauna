<?php
    require_once('../../sistema.php');

    class Tipopro extends Sistema{
 
        public function read(){
            $this->connect();
            $sql = "SELECT * FROM tipopro";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function readOne($id_tipopro){
            $this->connect();
            $sql = "SELECT * FROM tipopro WHERE id_tipopro = :id_tipopro";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_tipopro",$id_tipopro, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = $datos[0];
            return $datos;
        }

        public function create($datos){
            $this->connect();
            $sql = "INSERT INTO tipopro (tipopro) VALUES (:tipopro)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":tipopro",$datos['tipopro'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return $rs; 
        }

        public function update($datos, $id_tipopro){
            $this->connect();
            $sql = "UPDATE tipopro SET 
                            tipopro = :tipopro 
                    WHERE id_tipopro = :id_tipopro";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":tipopro",$datos['tipopro'], PDO::PARAM_STR);
            $stmt->bindParam(":id_tipopro",$id_tipopro, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }

        public function delete($id_tipopro){
            $this->connect();
            $sql = "DELETE FROM tipopro WHERE id_tipopro = :id_tipopro";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_tipopro",$id_tipopro, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }



    }

    $tipopro = new Tipopro;
    
?>