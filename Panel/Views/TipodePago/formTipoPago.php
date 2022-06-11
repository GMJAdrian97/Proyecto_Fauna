<?php require_once('../../../Componentes/headerAdmin.php') ?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoTipoPro">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST" action="CtrlTipoPago.php?accion=<?php echo(isset($id_tipoP))? "update&id_tipoP=".$id_tipoP: "add"; ?>" enctype="multipart/form-data" id="msform">
                <!-- fieldsets -->
                <fieldset id="fieldset">
                    <h2 class="fs-title"><?php echo(isset($id_tipoP))? "Modifica a tu ": " Introduce tu Nevo ";?>Tipo de Producto</h2>
                    <br />
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Tipo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-journal-plus"></i></div>
                            </div>
                            <input type="text" name="tipoP" value="<?php echo(isset($id_tipoP)) ? $datos['tipoP']:"";?>" class="form-control" id="inlineFormInputGroup" placeholder="Tipo de pago">
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