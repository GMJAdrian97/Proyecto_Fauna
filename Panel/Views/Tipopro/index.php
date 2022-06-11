<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" />
    <div class="centradoTipoPros">
    <h3>Tipo de Productos</h3>
    <a href="CtrlTipopro.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Tipo de producto</a>
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
                        <th scope="row"><?php echo $dato['id_tipopro']; ?></th>
                        <td><?php echo $dato['tipopro']; ?></td>
                        <td>  
                            <div>
                            <i class="btn btn-success bi-pencil"><a href="CtrlTipopro.php?accion=modify&id_tipopro=<?php echo $dato['id_tipopro']; ?>">  Modificar</a></i>
                            <i class="btn btn-danger bi bi-trash"><a href="CtrlTipopro.php?accion=delete&id_tipopro=<?php echo $dato['id_tipopro']; ?>">  Eliminar</a></i>
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