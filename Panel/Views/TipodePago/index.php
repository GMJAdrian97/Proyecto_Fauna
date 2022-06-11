<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" />
    <div class="centradoTipoPago">
    <h3>Tipo de pago</h3>
    <a href="CtrlTipoPago.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo medio de pago</a>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach ($datos as $key => $dato):
                            ?>

                            <tr>
                                <th scope="row"><?php echo $dato['id_tipoP']; ?></th>
                                <td><?php echo $dato['tipoP']; ?></td>
                                <td>  
                                    <div>
                                    <i class="btn btn-success bi-pencil"><a href="CtrlTipoPago.php?accion=modify&id_tipoP=<?php echo $dato['id_tipoP']; ?>">  Modificar</a></i>
                                    <i class="btn btn-danger bi bi-trash"><a href="CtrlTipoPago.php?accion=delete&id_tipoP=<?php echo $dato['id_tipoP']; ?>">  Eliminar</a></i>
                                </div>
                                </td>
                            </tr>

                            <?php
                                endforeach;
                            ?>

                        </tbody>
                </table>
            </div>
            <div class="col">
        </div>
    </div>
  </div>
</div>
</div>