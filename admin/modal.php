<!-- Modal clientes-->
<div class="modal" id="Modal_fac" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"  id="contenido-modal-fac">
            <form enctype="multipart/form-data" action='facturar.php' method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="$('#Modal_fac').hide();">&times;</button>
                    <h4 class="modal-title">Campos obligatorios</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class='col-sm-12'>
                            <select class="form-control" id="Tipo_fac" name="Tipo_fac">
                                <option value="0">Consumidor Final</option>
                                <option value="1">CCF</option>
                            </select><br>
                        </div>
                        <div class='col-sm-6' id='con-cliente'>
                            <h4 class="modal-title">Cliente</h4>
                            <input type='text' id='cd_cliente' name='cd_cliente' onchange='busclientes();' class='form-control' placeholder='Cod_cliente'><br>
                            <input type='text' id='nrc_cliente' name='nrc_cliente' onchange='busclientes();' class='form-control' placeholder='N° de Registro'><br>
                            <input type='text' id='Nombre_cl' name='Nombre_cl' class='form-control' placeholder='Nombre' required><br>
                            <input type="hidden" name='operacion' id='operacion' value='2'>
                            <input type="hidden" name='Id_cliente' id='Id_cliente' value='0'>
                            <a href="#" class='btn btn-danger' onclick='clean(1);' ><span class="glyphicon glyphicon-trash"></span></a>
                            <a href="#" data-toggle="modal" id="Btn_Modal_cliente" data-target="#Modal_cliente" class='btn btn-success'>Agregar Cliente</a>
                        </div>
                        <div class='col-sm-6' id='con-mecanico'>
                            <h4 class="modal-title">Mecanico</h4>
                            <input type='text' name='cd_mecanico' id='cd_mecanico' onchange='busmecanico();' class='form-control' placeholder='Cod_mecanico'><br>
                            <input type='text' name='Nombre_me' id='Nombre_me' class='form-control' placeholder='Nombre'><br>
                            <input type='text' name='nit_mecanico' id='nit_mecanico' onchange='busmecanico();' class='form-control' onchange='busmecanico();' placeholder='Nit'><br>
                            <input type="hidden" name='Id_mecanico' value='0'>
                            <a href="#" class='btn btn-danger' onclick='clean(2);' ><span class="glyphicon glyphicon-trash"></span></a>
                            <a href="#" data-toggle="modal" id="Btn_Modal_mecanico" data-target="#Modal_mecanico" class='btn btn-success'>Agregar Mecanico</a>
                        </div>
                        <div class='col-sm-12' id='con-vendedor'>
                            <h4 class="modal-title">Vendedor</h4>
                            <input type='text' name='Cd_vendedor' onchange='busvendedor($(this).val());' class='form-control' placeholder='Cod_vendedor'><br>
                            <input type='text' name='Nombre_ve' class='form-control' placeholder='Nombre'>
                            <input type="hidden" name='Id_vendedor' value='0'>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class='btn btn-success' value='Siguiente'>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="$('#Modal_fac').hide();">Cerrar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal productos-->
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <form enctype="multipart/form-data" id="form_edt_pro" method="post">
            <input type="hidden" name="up" value='ooo' id="name">
        <div class="modal-content"  id="contenido-modal">

        </div>
        </form>
    </div>
</div>
<!-- Modal reportes-->
<div class="modal" id="Modal_reportes" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content"  id="contenido-modal-reportes">

        </div>
    </div>
</div>
<!-- Modal agregar cliente-->
<div class="modal fade" id="Modal_cliente" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"  id="contenido-modal-fac">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#Modal_cliente').hide();">&times;</button>
                <h4 class="modal-title">Agregar Clientes</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class='col-sm-12'>
                        <div id="add-product-messages"></div>
                        <input type='text' name='Nombre' id='Nombre' class='form-control' placeholder='Nombre' required><br>
                        <input type='text' name='Nit' id='Nit' class='form-control' placeholder='Nit' required><br>
                        <input type='text' name='Nrc' id='Nrc' class='form-control' placeholder='Nrc' required><br>
                        <input type='text' name='Direccion' id='Direccion' class='form-control' placeholder='Direccion' required><br>
                        <input type='text' name='Telefono' id='Telefono' class='form-control' placeholder='Telefono' required>
                    </div>
                </div>
             </div>
             <div class="modal-footer">
                <a href='#' class='btn btn-success addclientes'>Guardar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="$('#Modal_cliente').hide();">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal agregar mecanico-->
<div class="modal fade" id="Modal_mecanico" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"  id="contenido-modal-fac">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#Modal_mecanico').hide();">&times;</button>
                <h4 class="modal-title">Agregar Mecanico</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class='col-sm-12'>
                        <div id="add-mecanico-messages"></div>
                        <input type='text' name='Nombre' id='Nombre-m' class='form-control' placeholder='Nombre' required><br>
                        <input type='text' name='Nit' id='Nit-m' class='form-control' placeholder='Nit' required><br>
                        <input type='text' name='Direccion' id='Direccion-m' class='form-control' placeholder='Direccion' required><br>
                        <input type='text' name='Telefono' id='Telefono-m' class='form-control' placeholder='Telefono' required>
                    </div>
                </div>
             </div>
             <div class="modal-footer">
                <a href='#' class='btn btn-success addmecanicos'>Guardar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="$('#Modal_mecanico').hide();">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal sacar diferencia-->
<div class="modal fade" id="Modal_diferencia" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content"  id="contenido-modal-fac">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#Modal_diferencia').hide();">&times;</button>
                <h4 class="modal-title">Agregar Mecanico</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class='col-sm-12'>
                        <div id="add-mecanico-messages"></div>
                        <input type='text' name='Nombre' id='Nombre-m' class='form-control' placeholder='Nombre' required><br>
                        <input type='text' name='Nit' id='Nit-m' class='form-control' placeholder='Nit' required><br>
                        <input type='text' name='Direccion' id='Direccion-m' class='form-control' placeholder='Direccion' required><br>
                        <input type='text' name='Telefono' id='Telefono-m' class='form-control' placeholder='Telefono' required>
                    </div>
                </div>
             </div>
             <div class="modal-footer">
                <a href='#' class='btn btn-success addmecanicos'>Guardar</a>
                <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="$('#Modal_diferencia').hide();">Cerrar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal cobrar-->
<?php
$venta_total = 0;
for ($i=0; $i < $_SESSION['n']; $i++) {
    if ($_SESSION["p"][$i] != null) {
        $r = $_SESSION["p"][$i];
        foreach ($r as $k) {
            if($k[0] != null){
                $venta_total += $k[2];
            }
        }
    }
}
 ?>
<div class="modal fade" id="Modal_cobrar" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <form enctype="multipart/form-data" id="add_facturar_g" method="post">
            <input type="hidden" name='Id_mecanico' value='<?php echo $_POST['Id_mecanico']; ?>'>
            <input type="hidden" name='Id_cliente' id='Id_cliente' value='<?php echo $_POST['Id_cliente']; ?>'>
            <input type="hidden" name='Id_vendedor' value='<?php echo $_POST['Id_vendedor']; ?>'>
            <input type="hidden" name='operacion' value='<?php echo $_POST['operacion']; ?>'>
            <input type="hidden" name='Tipo_fac' value='<?php echo $_POST['Tipo_fac']; ?>'>
            <div class="modal-content"  id="contenido-modal-fac">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="$('#Modal_cobrar').hide();">&times;</button>
                    <h4 class="modal-title">Cobrar</h4>
                </div>
                <div class="modal-body" id='con-cobrar'>
                    <div class="row">
                        <input type="hidden" name='Descuento' value='0'>
                        <div id="add-facturar-messages"></div>
                        <div class='col-sm-12'>
                            <div class='col-sm-6'>
                                <h2><b>Suma</b></h2>
                                <h2><b>Descuento</b></h2>
                                <h2><b>Iva</b></h2>
                                <h2><b>Total a Pagar</b></h2>
                                <h2><b>Ingrese cantidad</b></h2>
                                <h2><b>Cambio</b></h2>
                            </div>
                            <div class='col-sm-6'>
                                <h2>: $<?php echo number_format($sumas,2,'.',','); ?><br></h2>
                                <h2>: $<?php echo number_format(0,2,'.',',')?></h2>
                                <h2>: $<?php echo number_format($iva,2,'.',',')?></h2>
                                <h2>: $<?php echo number_format(($sumas+$iva),2,'.',','); ?><br></h2>
                                <h2><input type='text' name='Ingrese cantidad' id='Ingrese cantidad' class='form-control' placeholder='Ingrese cantidad' onchange='cambio($(this).val(),<?php echo ($sumas+$iva); ?>)' required></h2>
                                <h2 id='cambios'>: $<?php echo number_format(0,2,'.',','); ?></h2>
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="modal-footer">
                    <a href="#" class='btn btn-success' onclick='add_facturar_g();'>Facturar</a>
                    <a href="#" class="btn btn-danger" data-dismiss="modal" onclick="$('#Modal_cobrar').hide();">Cerrar</a>
                </div>
            </div>
        </form>
    </div>
</div>
