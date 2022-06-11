<?php require_once '../../../Componentes/headerSinM.php'; ?>
<div class="contenedor">
    <img src="../../../Imagenes/Fondo.jpg" alt="Imagen"/>
        <div class="centradoL">
            <div id="presentacion" class="card text-white">
                <div class="card-body">
                <div id="login">
                <div class="row" style="margin:5px">
                    <div class="col"></div>
                    <div class="col">
                    </div>
                    <div class="col"></div>
                </div>
                <div class="contain">
                    <div id="login-row" class="row justify-content-center align-items-center" style="color:#FFFFFF">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <form  id="login-form" class="form" action="CtrlLogin.php?accion=login" method="POST">
                                    <h3 class="text-center text-info">Login</h3>
                                    <div class="form-group">
                                        <label for="username" class="text-info">Username:</label><br>
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="text-info" style="color: whitesmoke;" >Password:</label><br>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                        <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                    </div>
                                    <div id="register-link" class="text-info">
                                        <a href="#" class="text-info">Register here</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
 </div>














