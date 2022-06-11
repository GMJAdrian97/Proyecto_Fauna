<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" />
    <div class="centradoVentas">
    <h3>¡Mis Ventas!</h3>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
                <thead>
                        <tr>
                        <th scope="col">ID Venta</th>
                        <th scope="col">ID Cliente</th> 
                        <th scope="col">Fecha</th>
                        <th scope="col">Ticket</th>
                        <th scope="col">Opciones</th>
                        </tr>
                </thead>
                <tbody>

                        <?php foreach ($MisVenta as $key => $venta): ?>
                            <tr>
                                <td ><?php echo $venta['id_compra']?></td>
                                <td ><?php echo $venta['id_cliente']?></td>
                                <td><?php echo $venta['fecha']?></td>
                                <td><i class="btn btn-primary"><a href="../Ticket/CtrlTikect.php?accion=ticket&id_compra=<?php echo $venta['id_compra']; ?>">Imprimir tikect</a></i></td>
                                <td><i class="btn btn-primary"><a href="excel.php">Descargar Excel</a></i></td>
                            </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
            </div>
            <div class="col">
        </div>
    </div>
  </div>
</div>
</div>