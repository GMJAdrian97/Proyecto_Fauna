<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoTipoPro">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form  id="msform">
                <!-- fieldsets -->
                <fieldset id="fieldset">
                    <h2>Elige un medio de pago</h2>
                    <br />
                    <div class="col-auto">
                           <form method="POST" action="CtrlIndex.php?accion=comprar&id_producto=<?php echo $dato['id_producto']; ?>">
                           <select class="custom-select" id="validatedInputGroupSelect" name="id_tipoP" required >
                                <option selected>Choose...</option>
                                    <?php foreach ($pago as $key => $value): 
                                        $selected = "";
                                        if($value['tipoP'] == $datos['tipoP']):
                                        $selected = "selected";
                                    endif; ?>
                                <option value="<?php echo $value['id_tipoP'];?>" <?php echo $selected; ?>> <?php echo $value['tipoP']?> </option>
                                 <?php endforeach; ?>
                             </select>
                           </form>
                    </div>
                    <br />
                    <br />
                    <input class="btn btn-primary" type="submit" value="Continuar" />
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>