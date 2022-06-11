<?php
    require_once('../../sistema.php');
    
    

    class Cliente extends Sistema{

        
        public function read(){
            $this->connect();
            $sql = "SELECT id_usuario, 
                     correo, 
                     contrasena
                     FROM usuario;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos; 
        }

        public function readOne($id_usuario){
            $this->connect();
            $sql = "SELECT correo, 
                        contrasena 
                        from usuario
                        WHERE usuario.id_usuario = :id_usuario";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = (isset($datos[0]))?$datos[0]:null;
            return $datos;
        }

    }

    $cliente = new Cliente();

?>