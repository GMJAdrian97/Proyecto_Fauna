<?php
 require_once('mdlInicioAdmin.php');
 $sistema -> validarRol('Administrador');
    $accion = NULL;
    require_once('../../../Componentes/headerAdmin.php');
    switch($accion){
        default:
            $Empleado['Reef']=$inicioAdm->conteoEmpleados(1);
            $Empleado['Candy']=$inicioAdm->conteoEmpleados(2);
            $Empleado['Recepcion']=$inicioAdm->conteoEmpleados(3);
            $Empleado['Mantenimiento']=$inicioAdm->conteoEmpleados(4);
            $Empleado['Instalador de Peceras']=$inicioAdm->conteoEmpleados(5);
            require_once('index.php');
    }
    require_once('../../../Componentes/footer.php');
?>