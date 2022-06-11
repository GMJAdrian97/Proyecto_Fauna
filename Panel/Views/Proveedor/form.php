<?php require_once('../../../Componentes/headerAdmin.php') ?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoProvedor">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST" action="CtrlProveedor.php?accion=<?php echo(isset($id_proveedor))? "update&id_proveedor=".$id_proveedor: "add"; ?>" enctype="multipart/form-data" id="msform">
                <!-- fieldsets -->
                <fieldset id="fieldset">
                    <h2 class="fs-title"><?php echo(isset($id_proveedor))? "Modifica a tu ": " Introduce tu Nevo ";?>Proveedor</h2>
                    <br />
                    <div class="col-auto">
                        <label class="sr-only" >proveedor</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                            </div>
                            <input type="text" name="proveedor" value="<?php echo(isset($id_proveedor)) ? $datos['proveedor']:"";?>" class="form-control" id="inlineFormInputGroup1" placeholder="Provededor">
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="col-auto">
                        <label class="sr-only" >telefono</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-phone"></i></div>
                            </div>
                            <input type="number" name="telefono" value="<?php echo(isset($id_proveedor)) ? $datos['telefono']:"";?>" class="form-control" id="inlineFormInputGroup2" placeholder="telefono">
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="col-auto">
                        <label class="sr-only" >Direccion</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-signpost-2"></i></div>
                            </div>
                            <input type="text" name="direccion" value="<?php echo(isset($id_proveedor)) ? $datos['direccion']:"";?>" class="form-control" id="inlineFormInputGroup3" placeholder="Username">
                        </div>
                    </div>
                    <br />
                    <br />
                    <input class="btn btn-primary" type="submit" value="Guardar" />
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
