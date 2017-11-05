<?php
if ($_POST['tipo']==1) {
    if (!empty($_POST['Nombre'])) {
        include '../clases/clase_cliente.php';
        $cliente = new cliente();
        if ($cliente->add_cliente(1,$_POST['Nombre'],1) == 0) {
            $cliente = null;
            $cliente = new cliente();
            $ultimo = $cliente->ultimo();
            include '../clases/clase_detalle_cliente.php';
            $detalle_cliente = new detalle_cliente();
            if ($detalle_cliente->add_detalle_cliente($ultimo[0][0],$ultimo[0][0],$_POST['Nit'],$_POST['Nrc'],$_POST['Direccion'],$_POST['Telefono'],1) == 0) {
                echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Se agrego con exito </div>';

            }else{
                echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Ocurrio un error! </div>';
            }
        }else{
            echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Ocurrio un error! </div>';
        }
    }

}elseif ($_POST['tipo']==2) {
    if (!empty($_POST['Nombre']) &&!empty($_POST['Nit']) &&!empty($_POST['Direccion']) &&!empty($_POST['Telefono'])) {
        include '../clases/clase_mecanico.php';
        $mecanico = new mecanico();
        $ultimo = $mecanico->ultimo();
        if (count($ultimo[0][0]) == 0) {
            $cod = 1;
        }elseif ($ultimo[0][0]>0) {
            $cod = ($ultimo[0][0]+1);
        }
        $mecanico = null;
        $mecanico = new mecanico();
        if ($mecanico->add_mecanico($cod,$_POST['Nombre'],$_POST['Nit'],$_POST['Direccion'],$_POST['Telefono'],1) == 0) {
            echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Se agrego con exito </div>';
        }else{
            echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> Ocurrio un error! </div>';

        }

    }
}

?>
