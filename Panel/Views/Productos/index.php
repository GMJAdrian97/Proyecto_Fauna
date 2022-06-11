<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin2.jpg" alt="ImagenesF" />
    <div class="centradoProductoss">
    <h3>Productos</h3>
    <a href="CtrlProductos.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Producto</a>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fotografia</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Tipo de producto</th>
                    <th scope="col">Proovedor</th>
                    <th scope="col">stock</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        foreach ($datos as $key => $dato):
                    ?>

                    <tr>
                        <th scope="row"><?php echo $dato['id_producto']; ?></th>
                        <td>
                            <div class="text-center">
                                <img src="../../../Imagenes/Productos/Img_Produ/<?php echo $dato['imagen']; ?>" class="img-circle" width="200" style="border-radius:300px"  alt="img_producto">
                            </div>
                        </td>
                        <td><?php echo $dato['nombre']; ?></td>
                        <td><?php echo $dato['descripcion']; ?></td>
                        <td><?php echo $dato['precio']; ?>.00 $MXN</td>
                        <td><?php echo $dato['tipopro']; ?></td>
                        <td><?php echo $dato['proveedor']; ?></td>
                        <td><?php echo $dato['stock']; ?></td>
                        <td>  
                            <div>
                            <i class="btn btn-success bi-pencil"><a href="CtrlProductos.php?accion=modify&id_producto=<?php echo $dato['id_producto']; ?>">Modificar</a></i>
                            <i class="btn btn-danger bi bi-trash"><a href="CtrlProductos.php?accion=delete&id_producto=<?php echo $dato['id_producto']; ?>">Eliminar</a></i>
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