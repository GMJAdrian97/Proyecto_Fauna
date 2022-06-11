<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" />
    <div class="centradoEmpleados">
    <h3>Empleados</h3>
    <a href="CtrlEmpleado.php?accion=new" class="btn btn-primary" style="margin:30px"> Añadir nuevo Empleado</a>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white" >
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Area</th>
                            <th scope="col">Curriculum</th>
                            <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach ($datos as $key => $dato):
                            ?>

                            <tr>
                                <th scope="row"><?php echo $dato['id_empleado']; ?></th>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['telefono']; ?></td>
                                <td><?php echo $dato['direccion']; ?></td>
                                <td><?php echo $dato['area']; ?></td>
                                <td><?php echo $dato['curriculum']; ?></td>
                                <td>  
                                    <div class="j">
                                            <i class="btn btn-success bi-pencil"><a href="CtrlEmpleado.php?accion=modify&id_empleado=<?php echo $dato['id_empleado']; ?>">  Modificar</a></i>
                                            <i class="btn btn-danger bi bi-trash"><a href="CtrlEmpleado.php?accion=delete&id_empleado=<?php echo $dato['id_empleado']; ?>">  Eliminar</a></i>
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