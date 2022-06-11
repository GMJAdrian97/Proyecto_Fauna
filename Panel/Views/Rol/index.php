<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" />
    <div class="centradoRoles">
    <h1> ¡Roles! </h1>
    <a href="CtrlRol.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo rol</a>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">rol</th>
            <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($datos as $key => $dato):
            ?>

            <tr>
            <td><?php echo $dato['id_rol'] ?></td>
            <td><?php echo $dato['rol'] ?></td>

                <td>  
                    <div>
                    <i class="btn btn-success bi-pencil"><a href="CtrlRol.php?accion=modify&id_rol=<?php echo $dato['id_rol']; ?>">Modificar</a></i>
                    <i class="btn btn-danger bi bi-trash"><a href="CtrlRol.php?accion=delete&id_rol=<?php echo $dato['id_rol']; ?>">Eliminar</a></i>
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