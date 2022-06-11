<?php require_once('../../../Componentes/headerAdmin.php') ?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoPROO">
        <div class="row">
            <div class="col">
                <!-- multistep form -->
                <form method="POST" action="CtrlProductos.php?accion=<?php echo(isset($id_producto))? "update&id_producto=".$id_producto: "add"; ?>" enctype="multipart/form-data">
                  <!-- fieldsets -->
                  <fieldset id="fieldset">
                    <h3><?php echo(isset($id_producto))? "Modificar ": "Nevo ";?>Producto</h3>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label>Producto</label>
                          <input type="text" name="nombre" value="<?php echo(isset($id_producto)) ? $datos['nombre']:"";?>" class="form-control" 
                              required
                              placeholder="ejem; Payaso Ocellaris"
                              autofocus
                              autocomplete />
                        </div>
                        <div class="form-group col-md-4">
                          <label>Descripcion</label>
                            <input type="text" name="descripcion" value="<?php echo(isset($id_producto)) ? $datos['descripcion']:"";?>" class="form-control"
                                placeholder="AP-AM-Nombre(s)"
                                autofocus
                                autocomplete />
                        </div>
                        <div class="form-group col-md-4">
                          <label>Precio</label>
                          <input type="numeric" name="precio" value="<?php echo(isset($id_producto)) ? $datos['precio']:"";?>" class="form-control"
                              placeholder="AP-AM-Nombre(s)"
                              autofocus
                              autocomplete />
                        </div>
                      </div>
                        <br />
                        <div class="row">
                          <div class="col">
                            <div>
                              <label>Stock*</label>
                              <input type= numeric name="stock" value="<?php echo(isset($id_producto)) ? $datos['stock']:"";?>" id="comentarios" rows="10" class="form-control" />
                              <br />
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group is-invalid"> 
                              <label class="input-group-text" for="validatedInputGroupSelect">Tipo Producto</label>
                              <select class="custom-select" id="validatedInputGroupSelect" name="id_tipopro" required >
                                  <option selected>Choose...</option>
                                  <?php foreach ($datostipopro as $key => $value): 
                                    $selected = "";
                                      if($value['tipopro'] == $datos['tipopro']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                                    <option value="<?php echo $value['id_tipopro'];?>" <?php echo $selected; ?>> <?php echo $value['tipopro']?> </option>
                                  <?php endforeach; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col">
                            <div class="input-group is-invalid"> 
                              <label class="input-group-text" for="validatedInputGroupSelect">Proveedor</label>
                              <select class="custom-select" id="validatedInputGroupSelect" name="id_proveedor" required >
                                <option selected>Choose...</option>
                                  <?php foreach ($datosproveedor as $key => $value): 
                                    $selected = "";
                                    if($value['proveedor'] == $datos['proveedor']):
                                        $selected = "selected";
                                    endif;
                                  ?>
                                <option value="<?php echo $value['id_proveedor'];?>" <?php echo $selected; ?>> <?php echo $value['proveedor']?> </option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <br />
                          </div>

                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile"name="imagen">
                              <label class="custom-file-label" for="customFile">Selecciona una foto</label>
                          </div>
                          <br />
                        </div>
                        <br />
                        <br />
                          <input class="btn btn-success" type="submit" value="Guardar" />
                          <a href="CtrlPonente.php" class="btn btn-danger">Cancelar</a>
                  </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
                                    