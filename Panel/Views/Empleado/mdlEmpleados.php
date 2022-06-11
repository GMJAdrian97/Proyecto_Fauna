<?php
    require_once('../../sistema.php');

    class Empleado extends Sistema{
 
        public function read(){
            $this->connect();
            $sql = "SELECT id_empleado,
                            CONCAT(nombre,' ',apaterno,' ',amaterno) as nombre,
                            telefono,
                            direccion,
                            descripcion as curriculum,
                            area.area
                    FROM empleado
                    INNER JOIN area on empleado.id_area = area.id_area  
                    order by 1";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function readOne($id_empleado){
            $this->connect();
            $sql = "SELECT id_empleado,
                            nombre,
                            apaterno,
                            amaterno,
                            telefono,
                            direccion,
                            descripcion,
                            area.area
                    FROM empleado
                    INNER JOIN area on empleado.id_area = area.id_area 
                    WHERE empleado.id_empleado = :id_empleado";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_empleado",$id_empleado, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = $datos[0];
            return $datos;
        }

        public function create($datos){
            $this->connect();
            $sql = "INSERT INTO empleado (
                                nombre, 
                                apaterno, 
                                amaterno,
                                telefono,
                                direccion,
                                descripcion,
                                id_area) 
                    VALUES (:nombre, 
                            :apaterno, 
                            :amaterno,
                            :telefono,
                            :direccion,
                            :descripcion,
                            :id_area)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":apaterno",$datos['apaterno'], PDO::PARAM_STR);
            $stmt->bindParam(":amaterno",$datos['amaterno'], PDO::PARAM_STR);
            $stmt->bindParam(":telefono",$datos['telefono'], PDO::PARAM_INT);
            $stmt->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":id_area",$datos['id_area'], PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs; 
        }

        public function update($datos,$id_empleado){
            $this->connect();
            $sql = "UPDATE empleado SET 
                            nombre = :nombre, 
                            apaterno = :apaterno, 
                            amaterno = :amaterno,
                            telefono = :telefono,
                            direccion = :direccion,
                            descripcion = :descripcion,
                            id_area = :id_area 
                     WHERE id_empleado = :id_empleado";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":nombre",$datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":apaterno",$datos['apaterno'], PDO::PARAM_STR);
            $stmt->bindParam(":amaterno",$datos['amaterno'], PDO::PARAM_STR);
            $stmt->bindParam(":telefono",$datos['telefono'], PDO::PARAM_INT);
            $stmt->bindParam(":direccion",$datos['direccion'], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion",$datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":id_area",$datos['id_area'], PDO::PARAM_INT);
            $stmt->bindParam(":id_empleado",$id_empleado, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }

        public function delete($id_empleado){
            $this->connect();
            $sql = "DELETE FROM empleado WHERE id_empleado = :id_empleado";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":id_empleado",$id_empleado, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $rs;
        }



    }

    $empleado = new Empleado;
    
?>