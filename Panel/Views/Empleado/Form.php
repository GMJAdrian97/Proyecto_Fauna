<?php require_once('../../../Componentes/headerAdmin.php'); 
?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoEmpleado">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST" action="CtrlEmpleado.php?accion=<?php echo(isset($id_empleado))? "update&id_empleado=".$id_empleado: "add"; ?>" enctype="multipart/form-data" id="msform">
                <!-- fieldsets -->
                <fieldset id="fieldset">
                    <h2 class="fs-title"><?php echo(isset($id_empleado))? "Modifica a tu ": " Introduce tu Nevo ";?>Empleado</h2>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="inputEmail4">Nombre</label>
                        <input type="text" name="nombre" value="<?php echo(isset($id_empleado)) ? $datos['nombre']:"";?>" class="form-control" id="inlineFormInputGroup1" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-4">
                        <label >Primer Apellido</label>
                        <input type="text" name="apaterno" value="<?php echo(isset($id_empleado)) ? $datos['apaterno']:"";?>" class="form-control" id="inlineFormInputGroup2" placeholder="Apelldo P.">
                        </div>
                        <div class="form-group col-md-4">
                        <label>Segundo Apellido</label>
                        <input type="text" name="amaterno" value="<?php echo(isset($id_empleado)) ? $datos['amaterno']:"";?>" class="form-control" id="inlineFormInputGroup3" placeholder="Apelldo M.">
                        </div>
                    </div>
                    <br />
                    <div class="col-auto">
                        <label class="sr-only" >telefono</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-phone"></i></div>
                            </div>
                            <input type="number" name="telefono" value="<?php echo(isset($id_empleado)) ? $datos['telefono']:"";?>" class="form-control" id="inlineFormInputGroup4" placeholder="Telefono">
                        </div>
                    </div>
                    <br />
                    <div class="col-auto">
                        <label class="sr-only" >Direccion</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-signpost-2"></i></div>
                            </div>
                            <input type="text" name="direccion" value="<?php echo(isset($id_empleado)) ? $datos['direccion']:"";?>" class="form-control" id="inlineFormInputGroup5" placeholder="Direccion">
                        </div>
                    </div>
                    <br />
                    
                            <div class="input-group is-invalid"> 
                                <label class="input-group-text" for="validatedInputGroupSelect">Options</label>
                                <select class="custom-select" id="validatedInputGroupSelect" name="id_area" required >
                                    <option selected>Choose...</option>
                                    <?php foreach ($datosarea as $key => $value): 
                                    $selected = "";
                                        if($value['id_area'] == $datosarea['id_area']):
                                        $selected = "selected";
                                        endif;
                                    ?>
                                    <option value="<?php echo $value['id_area'];?>" <?php echo $selected; ?>> <?php echo $value['area']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                    <br />
                    <div class="col-auto">
                        <label class="sr-only" >Curriculum</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-signpost-2"></i></div>
                            </div>
                            <input type="text" name="descripcion" value="<?php echo(isset($id_empleado)) ? $datos['descripcion']:"";?>" class="form-control" id="inlineFormInputGroup" placeholder="Crriculum">
                        </div>
                    </div>

                    <input class="btn btn-primary" type="submit" value="Guardar" />
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
