<div class="contenedor">
    <img src="../../../Imagenes/FondoAdmin.jpg" alt="ImagenesF" />
    <div class="centradoAreas">
    <h3>Areas de trabajo</h3>
    <a href="CtrlArea.php?accion=new" style="margin:30px" class="btn btn-primary"> Añadir nueva area de trabajo</a>
    <div class="row">
        <div class="col">
            <div class="col">
            <table class="table" style=" background-color: rgba(0, 0, 0, 0.3); color: white">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Area</th>
                            <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                foreach ($datos as $key => $dato):
                            ?>

                            <tr>
                                <th scope="row"><?php echo $dato['id_area']; ?></th>
                                <td><?php echo $dato['area']; ?></td>
                                <td>  
                                    <div>
                                    <i class="btn btn-success bi-pencil"><a href="CtrlArea.php?accion=modify&id_area=<?php echo $dato['id_area']; ?>">  Modificar</a></i>
                                    <i class="btn btn-danger bi bi-trash"><a href="CtrlArea.php?accion=delete&id_area=<?php echo $dato['id_area']; ?>">  Eliminar</a></i>
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