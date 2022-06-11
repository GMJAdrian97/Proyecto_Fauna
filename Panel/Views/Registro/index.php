<?php require_once '../../../Componentes/header.php'; ?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo2.jpg" alt="ImagenesF" />
    <div class="centradoR">
    <div id="presentacion" class="card text-white">
        <div class="card-body">
        <form method="post" action="CtrlRegistro.php?accion=register">
          <div class="row"><h3>Crea una Cuenta Fauna</h3></div>
          <br />
          <div class="form-row">
            <div class="form-group col-md-4">
              <label >Nombre</label>
              <input name="nombre" type="Text" class="form-control" id="inputEmil4" placeholder="">
            </div>
            <div class="form-group col-md-4">
              <label >Primer Apellido</label>
              <input name="apaterno" type="text" class="form-control" id="2erapellidp" placeholder="">
            </div>
            <div class="form-group col-md-4">
              <label>Segundo Apellido</label>
              <input name="amaterno" type="text" class="form-control" id="1apellido" placeholder="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label >Telefono</label>
              <input name="telefono" type="number" class="form-control" id="inputEil4" placeholder="">
            </div>
            <div class="form-group col-md-4">
              <label >Direccion</label>
              <input name="direccion" type="text" class="form-control" id="1erapellidp" placeholder="">
            </div>
          </div>

          <div class="form-group">
            <label for="inputAddress">Corro Electronico</label>
            <input name="correo" type="email" class="form-control" id="inputAddress" placeholder="Fauna@Outlook.com">
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="inputCity">Contraseña</label>
              <input name="contrasena" type="password" class="form-control" id="inputCity">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
        </div>
    </div>
  </div>
</div>
