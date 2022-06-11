<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Fauna/Css/Style.css">
    <title>Acuario Fauna</title>

  </head>
  <body>

  <nav id="BarraNav" class="navbar navbar-dark navbar-expand-lg " style="background-color: rgb(0,0,0,0.6) ">

      <a class="navbar-brand" href="Index.php">
        <img src="/Fauna/Imagenes/logoF2.png" width="150" height="70" alt="LogoRCH">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <div class="navbar-nav text-center ml-auto mr-auto">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link active" href="../InicioAdmin/CtrlInicioAdmin.php">Home </a>
          </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Empleados
                </a>
                <div class="dropdown-menu" aria-label="navbarDropdown">
                  <a class="dropdown-item" href="../Empleado/CtrlEmpleado.php">Lista de empleados</a>
                  <a class="dropdown-item" href="../Area/CtrlArea.php">Lista de Areas</a>
                </div>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Productos
                </a>
                <div class="dropdown-menu" aria-label="navbarDropdown">
                  <a class="dropdown-item" href="../Productos/CtrlProductos.php">Lista de productos</a>
                  <a class="dropdown-item" href="../Tipopro/CtrlTipopro.php">Lista de Tipos de productos</a>
                  <a class="dropdown-item" href="../Proveedor/CtrlProveedor.php">Lista de Provedores</a>
                </div>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Opciones Admin
                </a>
                <div class="dropdown-menu" aria-label="navbarDropdown">
                  <a class="dropdown-item" href="../Rol/CtrlRol.php">Lista Roles</a>
                  <a class="dropdown-item" href="../TipodePago/CtrlTipoPago.php">Medios de pago</a>
                </div>
             </li>
             <li class="nav-item">
             <a class="nav-link" href="../Ventas/CtrlVentas.php">Ventas</a>
             </li>
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-person-circle"></i>
                </a>
                <div class="dropdown-menu" aria-label="navbarDropdown">
                  <a class="dropdown-item" href="../Rol/CtrlRol.php">Correo Usuario</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../Login/CtrlLogin.php?accion=logOut">Cerrar Sesion</a>
                </div>
            </li>
        </ul>
        </div>

        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>

      </div>
    </nav>