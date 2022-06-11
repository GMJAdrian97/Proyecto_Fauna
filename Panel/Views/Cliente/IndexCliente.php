<?php 
      require_once('../Productos/mdlProductos.php'); 
      require_once('../TipodePago/mdlTipoPago.php');
      $datos = $produto->read();
      $pago=$tipoPago->read();
?>

<div id="Graper">
      <div class="container">
            <div class="row">
                  <div class="col">
                        <!-- NAV Buscador -->
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                              <a class="navbar-brand" href="#">----Productos-----</a>
                              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                              </button>

                              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav mr-auto">
                                    <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-expanded="false">
                                          Peces
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Marinos</a>
                                                <a class="dropdown-item" href="#">Dulce</a>
                                          </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-expanded="false">
                                          Accesorios
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Marinas</a>
                                                <a class="dropdown-item" href="#">Agua dulce</a>
                                          </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-expanded="false">
                                          Peceras
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Marinas</a>
                                                <a class="dropdown-item" href="#">Agua Dulce</a>
                                          </div>
                                    </li>
                              </ul>
                              <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                              </form>
                              </div>
                        </nav>
                        <!-- NAV Buscador -->

                       
                        <div class="row">
                              <div class="row row-cols-1 row-cols-md-3">
                                    <?php foreach ($datos as $key => $dato): ?>
                                    <div class="col mb-4">
                                          <div class="card h-100">
                                                <div class="imagenPro">
                                                <img id="img-producto" src="../../../Imagenes/Productos/Img_Produ/<?php echo $dato['imagen']; ?>" class="card-img-top" alt="Img_Producto">
                                                </div>
                                                <form method="POST" action="CtrlIndex.php?&id_producto=<?php echo $dato['id_producto']; ?>">
                                                      <div class="card-body">
                                                            <h5 class="card-title"><?php echo $dato['nombre'];?></h5>
                                                            <h6>Precio: $ <?php echo $dato['precio'].".00 MXN"; ?></h6>
                                                            <h6>Tipo: <?php echo $dato['tipopro']; ?></h6>
                                                            <div class="module line-clamp">
                                                                  <p id="idCardPro" class="card-text" style="color:black; text-align: justify"><?php echo $dato['descripcion']; ?></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                  <label class="sr-only" for="inlineFormInputGroup">Stc</label>
                                                                  <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                              <div class="input-group-text">Stock <?php echo $dato['stock']; ?> Uds </div>
                                                                        </div>

                                                                        <select class="custom-select" id="StockP" name="StockP" required>
                                                                              <option  value="1" selected> 1 Ud</option>
                                                                              <option  value="2"> 2 Uds </option>
                                                                              <option  value="3"> 3 Uds </option>
                                                                              <option  value="4"> 4 Uds </option>
                                                                              <option  value="5"> 5 Uds </option>
                                                                        </select>
                                                                             
                                                                  </div>
                                                                  <div class="input-group mb-2">
                                                                        <div class="input-group-prepend">
                                                                              <div class="input-group-text"> Tipo de Pago </div>
                                                                        </div>
                                                                        <select class="custom-select" id="validatedInputGroupSelect" name="id_tipoP" required >
                                                                                    <option>Medio de pago</option>
                                                                                          <?php foreach ($pago as $key => $value): 
                                                                                          $selected = "";
                                                                                          if($value['tipoP'] == $datos['tipoP']):
                                                                                          $selected = "selected";
                                                                                          endif; ?>
                                                                                    <option value="<?php echo $value['id_tipoP'];?>" <?php echo $selected; ?>> <?php echo $value['tipoP']?> </option>
                                                                                    <?php endforeach; ?>
                                                                              </select>
                                                                  </div>
                                                            </div>
                                                            <!-- <a href="CtrlIndex.php?accion=comprar" class="btn btn-success btn-lg btn-block" type="submit"> Comprar</a> -->
                                                            <input name="comprar"class="btn btn-success btn-lg btn-block" type="submit" value="Comprar" id="btn-comprar"/>
                                                            <input name="comprar"class="btn btn-primary btn-lg btn-block" type="submit" value="agregarCart" />
                                                            </div>
                                                </form>
                                          </div>
                                    </div> 
                                    <?php endforeach; ?>                 
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="ventana-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

<?php require_once '../../../Componentes/footer.php'; ?>