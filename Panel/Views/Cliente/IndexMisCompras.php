<h1> ¡Mis Compras! </h1>
    <div class="row">
        <div class="col">
            <div class="col">
                <table class="table" id="Tbamis_compras" >
                    <thead>
                        <tr>
                        <th scope="col">ID Compra</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Ticket</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            foreach ($miscompras as $key => $compras):
                        ?>

                        <tr>
                            <td ><?php echo $compras['id_compra']?></td>
                            <td><?php echo $compras['fecha']?></td>
                            <td><i class="btn btn-primary"><a href="../Ticket/CtrlTikect.php?accion=ticket&id_compra=<?php echo $compras['id_compra']; ?>">Imprimir tikect</a></i></td>
                        </tr>
                        <?php
                endforeach;
            ?>
                    </tbody>
                </table>
            </div>
            </div>
            </div>