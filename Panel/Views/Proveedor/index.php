<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" />
    <div class="centradoProvedores">
    <h3>Proveedores</h3>
    <a href="CtrlProveedor.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Proveedor</a>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        foreach ($datos as $key => $dato):
                    ?>

                    <tr>
                        <th scope="row"><?php echo $dato['id_proveedor']; ?></th>
                        <td><?php echo $dato['proveedor']; ?></td>
                        <td><?php echo $dato['telefono']; ?></td>
                        <td><?php echo $dato['direccion']; ?></td>
                        <td>  
                            <div>
                            <i class="btn btn-success bi-pencil"><a href="CtrlProveedor.php?accion=modify&id_proveedor=<?php echo $dato['id_proveedor']; ?>">  Modificar</a></i>
                            <i class="btn btn-danger bi bi-trash"><a href="CtrlProveedor.php?accion=delete&id_proveedor=<?php echo $dato['id_proveedor']; ?>">  Eliminar</a></i>
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