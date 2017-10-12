$(function(){
	init_autor();
	generagrid_autores();
});

$("#btn_alta_autor").click(function(){
	$.ajax({
			url:"../autor/muestra_alta",
			method:"POST",
			data:"",

			success:function(data){
				var html = data.html;
				$("#modal_autor .modal-body").empty();
				$("#modal_autor .modal-body").append(html);
				$("#modal_autor").modal("show");
			},
			error: function(error){

			}
		});
});

$("#btn_elimina_autor").click(function(){
	var rowindex = $('#jqxgridAutores').jqxGrid('getselectedrowindex');
	if(rowindex != -1){
		var data = $('#jqxgridAutores').jqxGrid('getrowdata', rowindex);
			swal({
			  title: 'Estas seguro(a) de eliminar este autor?',
			  text: "Una vez eliminado no se podra recuperar el registro",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#81c784',
			  cancelButtonColor: '#e65100',
			  confirmButtonText: 'Confirmar!',
			  cancelButtonText: 'No, cancelar!',
			  confirmButtonClass: 'btn btn-success',
			  cancelButtonClass: 'btn btn-danger',
			  buttonsStyling: false
			}).then(function () {
			  elimina_autor(data.id_autor);
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

$("#btn_edita_autor").click(function(){
	var rowindex = $('#jqxgridAutores').jqxGrid('getselectedrowindex');
	if(rowindex != -1){
		var seleccionado = $('#jqxgridAutores').jqxGrid('getrowdata', rowindex);
		console.log(seleccionado);
		$.ajax({
				url:"../autor/muestra_alta",
				method:"POST",
				data:"",

				success:function(data){
					var html = data.html;
					$("#modal_autor .modal-body").empty();
					$("#modal_autor .modal-body").append(html);
					$("#editando").val(seleccionado.id_autor);
					$("#nombre_a").val(seleccionado.nombre);
					$("#paterno_a").val(seleccionado.paterno);
					$("#materno_a").val(seleccionado.materno);
					$("#correo_a").val(seleccionado.correo);
					$("#telefono_a").val(seleccionado.telefono);
					$("#modal_autor").modal("show");
				},
				error: function(error){

				}
			});
	}else{
		swal('Seleccione un registro para editar');
	}
});

$("#btn_buscar_autor").click(function(){
		$.ajax({
			url:"../autor/busca_autores",
			method:"POST",
			data:"filtro="+$("#input_busca_autor").val(),

			success: function(data){
				loadGridrecepcion(data.resultado);
			},
			error: function(error){
				console.error(error);
			}
		});
});

function init_autor(){
	$.ajax({
		url: '../autor/baja_grid_autores',
		type: 'POST',
		dataType: 'json',
		data:"",

		success: function(data){
			console.log(data);
			loadGridrecepcion(data.result);
		},
		error: function(error){
			console.error(error);
		}
	});
	
}

function generagrid_autores(){
    $("#jqxgridAutores").jqxGrid(
        {
            width: '100%',
            height: 300,
            source: [],
            selectionmode: 'multiplerowsadvanced',
            columns: [
                { text: '<center>ID</center>', datafield: 'id_autor', width:'auto' },
                { text: '<center>Nombre</center>', datafield: 'nombre' },
                { text: '<center>Paterno</center>', datafield: 'paterno', width: 'auto' },
                { text: '<center>Materno</center>', datafield: 'materno', width: 'auto' },
                { text: '<center>Correo</center>', datafield: 'correo', width: 'auto' },
                { text: '<center>Telefono</center>', datafield: 'telefono', width: 'auto' }
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
            { name: 'id_autor', type: 'int' },
            { name: 'nombre', type: 'string' },
            { name: 'materno', type: 'string' },
            { name: 'paterno', type: 'string' },
            { name: 'correo', type: 'string' },
            { name: 'telefono', type: 'int' }
        ],
        datatype: "array"
    };
    var dataAdapter = new $.jqx.dataAdapter(source);
    // initialize jqxGrid
    $("#jqxgridAutores").jqxGrid(
        {
            source: dataAdapter,
        });
    }

    function elimina_autor(id_autor){
    	$.ajax({
    		url:"../autor/elimina_autor",
    		method:"POST",
    		data:"id_autor="+id_autor,
    		 success: function(data){
    		 	if(data.status == 1 || data.status == "1"){
    		 		swal(
					    'Eliminado!',
					    'El autor se elimino correctamente.',
					    'success'
					  );
    		 		init_autor();
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

$('#jqxgridAutores').on('rowdoubleclick', function (event) { 
    var args = event.args;
    var seleccionado = args.row['bounddata'];
    console.log(seleccionado);
    $("#id_autor_l").val(seleccionado['id_autor']);
    $("#autor_libro").val(seleccionado['nombre']+" "+seleccionado['paterno']+" "+seleccionado['materno']);
    cierra_modal_seleccionada('modal_aux_autor');
});