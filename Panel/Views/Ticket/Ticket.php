<?php
    $content = "
    <h1>"."Fecha: ".$datos['fecha']."&nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;&nbsp;"." Id_Compra"." ".$datos['id_compra']."</h1>";
    
    foreach ($conferencias as $key => $conferencia):
        $content.="<h4>"."Nombre del cliente: ".$conferencia['Nombre_Cliente']."</h4>";
        foreach ($participantes[$key] as $key2 => $participante):
            $content.="<P>"."Producto: ".$participante['nombre']."</P>";
            $content.="<P>"."Cantidad: ".$participante['cantidad']."</P>";
            $content.="<P>"."Precio: ".$participante['precio']."MNX"."</P>";
            $content.="<P>"."total: ".$participante['total']."MNX"."</P>";
            $content.="<br>";
        endforeach;
        $content.="<hr />";
    endforeach;
    return $content;
?>