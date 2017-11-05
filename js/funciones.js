var mostrar_p = false;
var mos = 1;
document.onkeydown=function(e){
    /*console.log(e.which);*/
    if(e.which == 17) mostrar_p=true;
    if(e.which == 80 && mostrar_p == true) {
        mos = 1;
        mostrar_p = false;
        shCont();
        return false;
    }
    /*ESC*/
    if (e.which==27) {
        $('#Modal_fac').hide();
        $('#Modal_cliente').hide();
        $('#Modal_mecanico').hide();
        $('#Modal_diferencia').hide();
        $('#myModal').hide();
        $('#Modal_reportes').hide();
    }
}
function add_facturar_g(){
    var formData = new FormData(document.getElementById("add_facturar_g"));
    $.ajax({
        url: "factura.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(res) {
        $('#add-facturar-messages').html(res);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
};
$(function(event){
    $("#form_edt_pro").on("submit", function(e){
        e.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("form_edt_pro"));
        $.ajax({
            url: "editar_productos.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        })
        .done(function(res) {
            $('#edit-product-messages').html(res);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    });
    $(".addclientes").click(function(event) {
        var tipo = 1;
        var Nombre = $("#Nombre").val();
        var Nit = $("#Nit").val();
        var Nrc = $("#Nrc").val();
        var Direccion = $("#Direccion").val();
        var Telefono = $("#Telefono").val();
        if (Nombre == '') {
            $("#Nombre").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Nombre').closest('.form-group').addClass('has-error');
        }else if(Nit == ''){
            $("#Nit").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Nit').closest('.form-group').addClass('has-error');
        }else if(Nrc == ''){
            $("#Nrc").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Nrc').closest('.form-group').addClass('has-error');
        }else if(Direccion == ''){
            $("#Direccion").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Direccion').closest('.form-group').addClass('has-error');
        }else if(Telefono == ''){
            $("#Telefono").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Telefono').closest('.form-group').addClass('has-error');
        }else{
            $("#Nombre").find('.text-danger').remove();
            $("#Nombre").closest('.form-group').addClass('has-success');
            $("#Nit").find('.text-danger').remove();
            $("#Nit").closest('.form-group').addClass('has-success');
            $("#Nrc").find('.text-danger').remove();
            $("#Nrc").closest('.form-group').addClass('has-success');
            $("#Direccion").find('.text-danger').remove();
            $("#Direccion").closest('.form-group').addClass('has-success');
            $("#Telefono").find('.text-danger').remove();
            $("#Telefono").closest('.form-group').addClass('has-success');
            $.ajax({
                    url: "agregar_cm.php",
                    type : 'post',
                    dataType: 'html',
                    data: {
                        Nombre: Nombre,
                        Nit: Nit,
                        Nrc: Nrc,
                        Direccion: Direccion,
                        Telefono: Telefono,
                        tipo: tipo
                    },
                })
                .done(function(data) {
                    $('#add-product-messages').html(data);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    $('#img').html("");
                });
        }
    });
    $(".addmecanicos").click(function(event) {
        var tipo = 2;
        var Nombre = $("#Nombre-m").val();
        var Nit = $("#Nit-m").val();
        var Direccion = $("#Direccion-m").val();
        var Telefono = $("#Telefono-m").val();
        if (Nombre == '') {
            $("#Nombre-m").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Nombre-m').closest('.form-group').addClass('has-error');
        }else if(Nit == ''){
            $("#Nit-m").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Nit-m').closest('.form-group').addClass('has-error');
        }else if(Direccion == ''){
            $("#Direccion-m").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Direccion-m').closest('.form-group').addClass('has-error');
        }else if(Telefono == ''){
            $("#Telefono-m").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Telefono-m').closest('.form-group').addClass('has-error');
        }else{
            $("#Nombre-m").find('.text-danger').remove();
            $("#Nombre-m").closest('.form-group').addClass('has-success');
            $("#Nit-m").find('.text-danger').remove();
            $("#Nit-m").closest('.form-group').addClass('has-success');
            $("#Direccion-m").find('.text-danger').remove();
            $("#Direccion-m").closest('.form-group').addClass('has-success');
            $("#Telefono-m").find('.text-danger').remove();
            $("#Telefono-m").closest('.form-group').addClass('has-success');
            $.ajax({
                    url: "agregar_cm.php",
                    type : 'post',
                    dataType: 'html',
                    data: {
                        Nombre: Nombre,
                        Nit: Nit,
                        Direccion: Direccion,
                        Telefono: Telefono,
                        tipo: tipo
                    },
                })
                .done(function(data) {
                    $('#add-mecanico-messages').html(data);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    $('#img').html("");
                });
        }
    });
    $(".aEntrada").click(function(event) {
        var Cod = $('#Cod').val(),
        Can = $('#Cantidad').val(),
        Pre_c = $('#Precio_compra').val(),
        Pre_v = $('#Precio_Venta').val(),
        Des = $('#Descuento').val();
        Nom = $('#Nombre_proc').val();
        if (Cod == '') {
            $("#Cod").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Cod').closest('.form-group').addClass('has-error');
        }else if(Can == ''){
            $("#Cantidad").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Cantidad').closest('.form-group').addClass('has-error');
        }else if(Pre_c == ''){
            $("#Precio_compra").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Precio_compra').closest('.form-group').addClass('has-error');
        }else if(Pre_v == ''){
            $("#Precio_Venta").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Precio_Venta').closest('.form-group').addClass('has-error');
        }else if(Des == ''){
            $("#Descuento").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Descuento').closest('.form-group').addClass('has-error');
        }else if(Nom == ''){
            $("#Nombre_proc").after('<p class="text-danger">Este campo es obligatorio</p>');
            $('#Nombre_proc').closest('.form-group').addClass('has-error');
        }else{
            $("#Cod").find('.text-danger').remove();
            $("#Cod").closest('.form-group').addClass('has-success');
            $("#Cantidad").find('.text-danger').remove();
            $("#Cantidad").closest('.form-group').addClass('has-success');
            $("#Precio_compra").find('.text-danger').remove();
            $("#Precio_compra").closest('.form-group').addClass('has-success');
            $("#Precio_Venta").find('.text-danger').remove();
            $("#Precio_Venta").closest('.form-group').addClass('has-success');
            $("#Descuento").find('.text-danger').remove();
            $("#Descuento").closest('.form-group').addClass('has-success');
            $("#Nombre_proc").find('.text-danger').remove();
            $("#Nombre_proc").closest('.form-group').addClass('has-success');
            $.ajax({
                url: '../admin/addentradas.php',
                type: 'POST',
                dataType: 'html',
                data: {can:Can, pre_c:Pre_c, pre_v:Pre_v, cod:Cod, des:Des, nom:Nom },
            })
            .done(function(data) {
                $("#dp").html(data);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                shCont();
            });
        }
    });
});
function cambio(dato,total) {
    var cam = dato - total;
    $('#cambios').html(': $'+cam);
}
function descuento(dato,Tipo_fac) {
    $.ajax({
        url: 'descuento.php',
        async:true,
        dataType:"html",
        type: 'POST',
        data: {tipo: 0, dato: dato, Tipo_fac: Tipo_fac},
    })
    .done(function(data) {
        console.log("success");
        document.getElementById('descuento').innerHTML = data;
        $.ajax({
            url: 'descuento.php',
            async:true,
            dataType:"html",
            type: 'POST',
            data: {tipo: 1, dato: dato, Tipo_fac: Tipo_fac},
        })
        .done(function(data) {
            console.log("success");
            document.getElementById('con-cobrar').innerHTML = data;
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

}
function data_table() {
    $('#tabla_datos').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ Registros por pagina",
            "zeroRecords": "No hay resultados - lo siento",
            "info": "Mostrando _PAGE_ de _PAGES_ paginas",
            "infoEmpty": "No hay resultados - lo siento",
            "sSearch": "Buscar: ",
            "infoFiltered": "( En _MAX_ Registros)"
        }
    } );
}
function Buscar_r(Id) {
    var Tipo = 1;
    $.ajax({
        url: 'reporte_entradas.php',
        async:true,
        dataType:"html",
        type: 'POST',
        data: {id: Id, tipo: Tipo },
    })
    .done(function(data) {
        console.log("success");
        document.getElementById('contenido-modal-reportes').innerHTML = data;
        $("#Modal_reportes").show();
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

}
function modal(Id){
    $.ajax({
        url: 'contenido.php',
        async:true,
        dataType:"html",
        type: 'POST',
        data: {id: Id },
    })
    .done(function(data) {
        console.log("success");
        document.getElementById('contenido-modal').innerHTML = data;
        $("#myModal").show();
        addPedido();

    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}
function modal_fac() {
    $("#Modal_fac").show();
}
function validar_campos(e) {
	tecla = (document.all) ? e.KeyCode : e.which;
	//Tecla de retroceso para borrar, siempre la permite
	if (tecla = 8) {
		return true;
	}
	//patron de entrada, en este caso solo acepta numeros
	patron = /[0-9]/;
	tecla_final = String.fromCharCode(tecla);
	return patron.test(tecla_final);
}
function clean(dato) {
    if (dato==1) {
        $('#cd_cliente').val('');
        $('#nrc_cliente').val('');
        $('#Nombre_cl').val('');
        $('#operacion').val(2);
        $('#Id_cliente').val(0);
    }else if(dato==2){
        $('#cd_mecanico').val('');
        $('#Nombre_me').val('');
        $('#nit_mecanico').val('');
    }
}
function busclientes() {
    var tipo = 1;
    var cd_cliente = $('#cd_cliente').val();
    var nrc_cliente = $('#nrc_cliente').val();
    $.ajax({
        url: "buscar.php",
        type : 'post',
        dataType: 'html',
        data: {
            cd_cliente: cd_cliente,
            nrc_cliente: nrc_cliente,
            tipo: tipo
        },
    })
    .done(function(data) {
        document.getElementById('con-cliente').innerHTML = data;
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        $('#img').html("");
    });
};
function busmecanico() {
    var tipo = 2;
    var cd_mecanico =  $('#cd_mecanico').val();
    var nit_mecanico =  $('#nit_mecanico').val();
    $.ajax({
        url: "buscar.php",
        type : 'post',
        dataType: 'html',
        data: {
            cd_mecanico: cd_mecanico,
            nit_mecanico: nit_mecanico,
            tipo: tipo
        },
    })
    .done(function(data) {
        document.getElementById('con-mecanico').innerHTML = data;
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        $('#img').html("");
    });
};
function busvendedor(cod) {
    var tipo = 3;
    $.ajax({
        url: "buscar.php",
        type : 'post',
        dataType: 'html',
        data: {
            cod: cod,
            tipo: tipo
        },
    })
    .done(function(data) {
        document.getElementById('con-vendedor').innerHTML = data;
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        $('#img').html("");
    });
};
