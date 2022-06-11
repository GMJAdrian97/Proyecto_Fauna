<?php require_once('../../../Componentes/headerAdmin.php') ?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoArea">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST" action="CtrlArea.php?accion=<?php echo(isset($id_area))? "update&id_area=".$id_area: "add"; ?>" enctype="multipart/form-data" id="msform">
                <!-- fieldsets -->
                <fieldset id="fieldset">
                    <h2 class="fs-title"><?php echo(isset($id_area))? "Modifica  tu ": " Introduce tu Neva ";?>area de trabajo </h2>
                    <br />
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Area</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                            </div>
                            <input type="text" name="area" value="<?php echo(isset($id_area)) ? $datos['area']:"";?>" class="form-control" id="inlineFormInputGroup" placeholder="area de trabajo">
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