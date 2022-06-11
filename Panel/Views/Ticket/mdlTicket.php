<?php
    require_once('../../sistema.php');

    class Tickett extends Sistema{

        public function Ticket($id_compra){
            $this->connect();
            $sql = "SELECT * FROM compras WHERE id_compra = :id_compra;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_compra', $id_compra, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = (isset($datos[0]))?$datos[0]:null;
            if (!is_null($datos)) {
                $sql = "SELECT DISTINCTROW dc.id_compra,
                                concat(nombre,' ',apaterno,' ',amaterno) as Nombre_Cliente,
                                c.fecha
                        From detalle_compra dc
                        INNER JOIN compras c on dc.id_compra = c.id_compra
                        INNER JOIN cliente cl on c.id_cliente = cl.id_cliente
                        WHERE dc.id_compra = :id_compra";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':id_compra', $id_compra, PDO::PARAM_INT);
                $stmt->execute();

                $conferencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($conferencias as $key => $conferencia){
                    $sql = "SELECT p.nombre,
                                    dp.cantidad,
                                    p.precio,
                                    SUM(dp.cantidad*p.precio) as total
                            FROM detalle_compra dp
                            INNER JOIN producto p on dp.id_producto = p.id_producto
                            WHERE id_compra = :id_compra;";
                     $stmt = $this->con->prepare($sql);
                     $stmt -> bindParam(':id_compra', $conferencia['id_compra'], PDO::PARAM_INT);
                     $stmt->execute();
                     $participantes[$key] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $content = include('ticket.php');
            }else{
                $content = 'No se puede mostrar el reporte';
            }
            return $content;
        }
    }

    $ticket = new Tickett;
?>