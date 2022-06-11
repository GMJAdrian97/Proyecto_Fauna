<?php 
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename="Ventas.xls');
require_once('mdlVentas.php');
$MisVenta = $ventas->read();
?>

<table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
                <thead>
                        <tr>
                        <th scope="col">ID Venta</th>
                        <th scope="col">ID Cliente</th> 
                        <th scope="col">Fecha</th>
                        <th scope="col">Ticket</th>
                        </tr>
                </thead>
                <tbody>

                        <?php foreach ($MisVenta as $key => $venta): ?>
                            <tr>
                                <td ><?php echo $venta['id_compra']?></td>
                                <td ><?php echo $venta['id_cliente']?></td>
                                <td><?php echo $venta['fecha']?></td>
                            </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
