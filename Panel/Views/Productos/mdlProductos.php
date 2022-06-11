<?php
    require_once('../../sistema.php');

    class Producto extends sistema{
        public $id_producto;
        public $nombre;
        public $descripcion;
        public $precio;
        public $stock;
        public $imagen;
        public $id_proveedor ;
        public $id_tipopro;

      /* Geters & Seters */
        public function getId_producto(){
            return $this->id_producto;
        }

        public function setId_producto($id_producto){
            $this->id_producto = $id_producto;
            return $this;
        }
 
        public function getNombre(){
                return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }
 
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }
 
        public function getPrecio(){
            return $this->precio;
        }
 
        public function setPrecio($precio){
        $this->precio = $precio;
        return $this;
        }

        public function getStock(){
            return $this->stock;
        }

        public function setStock($stock){
            $this->stock = $stock;
            return $this;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function setImagen($imagen)
        {
            $this->imagen = $imagen;
            return $this;
        }

        public function getId_proveedor(){
            return $this->id_proveedor;
        }

        public function setId_proveedor($id_proveedor){
            $this->id_proveedor = $id_proveedor;
            return $this;
        }
 
        public function getId_tipopro(){
            return $this->id_tipopro;
        }

        public function setId_tipopro($id_tipopro){
            $this->id_tipopro = $id_tipopro;
            return $this;
        }
      /* Geters & Seters */


      /* Metodos CRUD */
        public function read(){
            $this->connect();
            $sql = "SELECT id_producto,
                        nombre,
                        descripcion,
                        precio,
                        stock,
                        imagen,
                        proveedor,
                        tipopro
                    FROM producto
                    INNER JOIN proveedor on proveedor.id_proveedor = producto.id_proveedor
                    INNER JOIN tipopro on tipopro.id_tipopro = producto.id_tipopro
                    order by id_producto;";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos; 
        }

        public function readOne($id_producto){
            $this->connect();
            $sql = "SELECT imagen,
                            nombre,
                            descripcion,
                            precio,
                            proveedor,
                            tipopro, 
                            stock
                    FROM producto
                    INNER JOIN proveedor on proveedor.id_proveedor = producto.id_proveedor
                    INNER JOIN tipopro on tipopro.id_tipopro = producto.id_tipopro
                    WHERE id_producto = :id_producto";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = (isset($datos[0]))?$datos[0]:null;
            return $datos;
        }

        public function readMedianteTipo($tipoproducto){
            $this->connect();
            $sql = "SELECT id_producto,
            nombre,
            descripcion,
            precio,
            stock,
            imagen,
            proveedor,
            tipopro
        FROM producto
        INNER JOIN proveedor on proveedor.id_proveedor = producto.id_proveedor
        INNER JOIN tipopro on tipopro.id_tipopro = producto.id_tipopro
        WHERE tipopro.tipopro=:tipopro;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':tipopro', $tipoproducto, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos; 
        }

        public function create($datos){
            $this->connect();
            $archivo = $this->cargarImagen("imagen", "../../../Imagenes/Productos/Img_Produ/");
            if(is_null($archivo)){
                $sql = "INSERT INTO producto (nombre, descripcion, precio, stock, id_proveedor, id_tipopro) VALUES (:nombre, :descripcion, :precio, :stock, :id_proveedor, :id_tipopro)"; 
            } else{
                $sql = "INSERT INTO producto (nombre, descripcion, precio, stock, imagen, id_proveedor, id_tipopro) VALUES (:nombre, :descripcion, :precio, :stock, :imagen, :id_proveedor, :id_tipopro)";
            }
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
            $stmt -> bindParam(':stock', $datos['stock'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_proveedor', $datos['id_proveedor'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_tipopro', $datos['id_tipopro'], PDO::PARAM_INT);
            if(!is_null($archivo)){
                $stmt -> bindParam(':imagen', $archivo, PDO::PARAM_STR);
            }
            
            $rs = $stmt->execute();
            return  $stmt->rowCount();;
        }

        public function update($datos, $id_producto){
            
            $this->connect();
            $archivo = $this->cargarImagen("imagen", "../../../Imagenes/Productos/Img_Produ/");
            if(is_null($archivo)){
                $sql = "UPDATE producto SET 
                                nombre = :nombre, 
                                descripcion = :descripcion,
                                precio = :precio, 
                                stock = :stock, 
                                id_proveedor = :id_proveedor,
                                id_tipopro = :id_tipopro 
                        WHERE id_producto = :id_producto;";
            } else{
                $sql = "UPDATE producto SET 
                                nombre = :nombre, 
                                descripcion = :descripcion,
                                precio = :precio, 
                                stock = :stock, 
                                id_proveedor = :id_proveedor,
                                id_tipopro = :id_tipopro, 
                                imagen = :imagen
                        WHERE id_producto = :id_producto;";
            }
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt -> bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt -> bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
            $stmt -> bindParam(':stock', $datos['stock'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_proveedor', $datos['id_proveedor'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_tipopro', $datos['id_tipopro'], PDO::PARAM_INT);
            $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            if(!is_null($archivo)){
                $stmt -> bindParam(':imagen', $archivo, PDO::PARAM_STR);
            }
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        public function updateS($id_producto, $stockP){
            
            $this->connect();
            $sql = "UPDATE producto SET 
                                stock =(SELECT sum(stock) - sum($stockP) FROM producto
                                        WHERE id_producto = :id_producto)
                    WHERE id_producto = :id_producto";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':stock', $stockP, PDO::PARAM_INT);
            $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }


        public function delete($id_producto){
            $this->connect();
            $sql = "DELETE FROM producto where id_producto = :id_producto";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
        }

      /* Metodos CRUD */
    }

    $produto = new Producto;
?>