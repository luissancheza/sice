$(function(){
$("#dateInput_inicio").jqxDateTimeInput({ width: '250px', height: '32px' });
$("#dateInput_fin").jqxDateTimeInput({ width: '250px', height: '32px' });
	$("#btn_alta_recepcion").click(function(){
		$.ajax({
			url:"../recepcion/index",
			method:"POST",
			data:"",

			success:function(data){
				var html = JSON.parse(data);
				$("#modal_resepcion .modal-body").empty();
				$("#modal_resepcion .modal-body").append(html);
				$("#modal_resepcion").modal("show");
			},
			error: function(error){

			}
		});
	});

	generagrid_recepcion();
	init();
	
});

function init(){
	baja_solicitudes();
}

function baja_solicitudes(){
	$.ajax({
		url:"../recepcion/baja_solicitudes",
		method:"POST",
		data:"",

		success: function(data){
			loadGridrecepcion(data.solicitudes);
		},
		error:function(error) {
			console.error(error);
		}
	});
}

function generagrid_recepcion(){
    $("#jqxgridRecepcion").jqxGrid(
        {
            width: '100%',
            height: 300,
            source: [],
            selectionmode: 'multiplerowsadvanced',
            columns: [
                { text: '<center>ID</center>', datafield: 'id_solicitud', width:'auto' },
                { text: '<center>id_autor</center>', datafield: 'id_autor', hidden : true },
                { text: '<center>Dependencia</center>', datafield: 'dependencia', width: 'auto' },
                { text: '<center>Departamento</center>', datafield: 'departamento', width: 'auto' },
                { text: '<center>Puesto</center>', datafield: 'puesto', width: 'auto' },
                { text: '<center>N. oficio</center>', datafield: 'numero_oficio', width: 'auto' },
                { text: '<center>Fecha recepcion</center>', datafield: 'fecha_recepcion', width: 'auto' },
                { text: '<center>Fecha oficio</center>', datafield: 'fecha_oficio', width: 'auto' },
                { text: '<center>nombre</center>', datafield: 'nombre', width: 'auto', hidden : true },
                { text: '<center>solicitud</center>', datafield: 'solicitud', width: 'auto', hidden : true },
                { text: '<center>observacion</center>', datafield: 'observacion', width: 'auto', hidden : true },
            ]
        });
    }

    function loadGridrecepcion(vector){
    var data = vector;
    var source =
    {
        localdata: data,
        datatype: "array",
        datafields :
        [
            { name: 'id_solicitud', type: 'int' },
            { name: 'id_autor', type: 'int' },
            { name: 'dependencia', type: 'string' },
            { name: 'departamento', type: 'string' },
            { name: 'puesto', type: 'string' },
            { name: 'numero_oficio', type: 'int' },
            { name: 'fecha_recepcion', type: 'string' },
            { name: 'fecha_oficio', type: 'string' },
            { name: 'nombre', type: 'string' },
            { name: 'solicitud', type: 'string' },
            { name: 'observacion', type: 'string' }
        ],
        datatype: "array"
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    // initialize jqxGrid
    $("#jqxgridRecepcion").jqxGrid(
        {
            source: dataAdapter,
        });
    }
$("#btn_edita_recepcion").click(function(){
    var rowindex = $('#jqxgridRecepcion').jqxGrid('getselectedrowindex');
    if(rowindex != -1){
        var seleccionado = $('#jqxgridRecepcion').jqxGrid('getrowdata', rowindex);
        console.log(seleccionado);
        $.ajax({
            url:"../recepcion/index",
            method:"POST",
            data:"",

            success:function(data){
                var html = JSON.parse(data);
                $("#modal_resepcion .modal-body").empty();
                $("#modal_resepcion .modal-body").append(html);
                $("#id_autor_l").val(seleccionado.id_autor);
                $("#editando_recepcion").val(seleccionado.id_solicitud);
                $("#autor_libro").val(seleccionado.nombre);
                $("#dependencia").val(seleccionado.dependencia);
                $("#departamento").val(seleccionado.departamento);
                $("#puesto").val(seleccionado.puesto);
                $("#input_fecha_recep_no").val(seleccionado.fecha_recepcion);
                $("#dtp_input_recepcion").val(seleccionado.fecha_recepcion)
                $("#input_fecha_of_no").val(seleccionado.fecha_oficio);
                $("#dtp_input_oficio").val(seleccionado.fecha_oficio);
                $("#n_oficio").val(seleccionado.numero_oficio);
                $("#solicitud").val(seleccionado.solicitud);
                $("#observaciones").val(seleccionado.observacion);
                $("#modal_resepcion").modal("show");
            },
            error: function(error){

            }
        });
    }else{
        swal('Seleccione un registro para editar');
    }
});

$("#btn_elimina_recepcion").click(function(){
    var rowindex = $('#jqxgridRecepcion').jqxGrid('getselectedrowindex');
    if(rowindex != -1){
        var data = $('#jqxgridRecepcion').jqxGrid('getrowdata', rowindex);
            swal({
              title: 'Estas seguro(a) de eliminar esta solicitud?',
              text: "Una vez eliminado no se podra recuperar el registro",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Confirmar!',
              cancelButtonText: 'No, cancelar!',
              confirmButtonClass: 'btn btn-success btn-xs',
              cancelButtonClass: 'btn btn-danger btn-xs',
              buttonsStyling: false
            }).then(function () {
              elimina_solicitud(data.id_solicitud);
            }, function (dismiss) {
              // dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
              if (dismiss === 'cancel') {
                //verificar usabilidad
              }
            });
    }else{
        swal('Seleccione un registro para eliminar');
    }
});


function elimina_solicitud(id_solicitud){
    $.ajax({
            url:"../recepcion/elimina_solicitud",
            method:"POST",
            data:"id_solicitud="+id_solicitud,
             success: function(data){
                if(data.status == 1 || data.status == "1"){
                    swal(
                        'Eliminado!',
                        'La solicitud se elimino correctamente.',
                        'success'
                      );
                    init();
                }else{
                    swal(
                        'Error!',
                        'Algo salio mal consulte con soporte',
                        'error'
                      );
                }
             },
             error: function(error){
                console.error(error);
                swal(
                        'Error!',
                        'Algo salio mal consulte con soporte erro: '+error.statusText,
                        'error'
                      );
             }
        });
}