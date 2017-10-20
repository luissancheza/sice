$("#btn_alta_dictaminador").click(function(){
$.ajax({
			url:"../dictaminador/muestra_alta",
			method:"POST",
			data:"",

			success:function(data){
				var html = data.html;
				$("#modal_dictaminador .modal-body").empty();
				$("#modal_dictaminador .modal-body").append(html);
				$("#modal_dictaminador").modal("show");
			},
			error: function(error){

			}
		});
});

$("#btn_edita_dictaminador").click(function(){
	var rowindex = $('#jqxgridDictaminadores').jqxGrid('getselectedrowindex');
	if(rowindex != -1){
		var seleccionado = $('#jqxgridDictaminadores').jqxGrid('getrowdata', rowindex);
		console.log(seleccionado);
		$.ajax({
				url:"../dictaminador/muestra_alta",
				method:"POST",
				data:"",

				success:function(data){
					var html = data.html;
					$("#modal_dictaminador .modal-body").empty();
					$("#modal_dictaminador .modal-body").append(html);
					$("#editando").val(seleccionado.id_dictaminador);
					$("#nombre_d").val(seleccionado.nombre);
					$("#paterno_d").val(seleccionado.paterno);
					$("#materno_d").val(seleccionado.materno);
					$("#correo_d").val(seleccionado.email);
					$("#telefono_d").val(seleccionado.telefono);
					$("#celular_d").val(seleccionado.celular);
					$("#estado_d").val(seleccionado.estado);
					$("#municipio_d").val(seleccionado.municipio);
					$("#localidad_d").val(seleccionado.localidad);
					$("#colonia_d").val(seleccionado.colonia);
					$("#calle_d").val(seleccionado.calle);
					$("#num_ext_d").val(seleccionado.num_ext);
					$("#num_int_d").val(seleccionado.num_int);
					$("#modal_dictaminador").modal("show");
				},
				error: function(error){

				}
			});
	}else{
		swal('Seleccione un registro para editar');
	}
});

$("#btn_elimina_dictaminador").click(function(){
	var rowindex = $('#jqxgridDictaminadores').jqxGrid('getselectedrowindex');
	if(rowindex != -1){
		var data = $('#jqxgridDictaminadores').jqxGrid('getrowdata', rowindex);
			swal({
			  title: 'Estas seguro(a) de eliminar este Dictaminador?',
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
			  dictaminador.elimina_dictaminador(data.id_dictaminador);
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

$("#btn_buscar_dictaminador").click(function(){
		$.ajax({
			url:"../dictaminador/busca_dictaminador",
			method:"POST",
			data:"filtro="+$("#input_busca_dictaminador").val(),

			success: function(data){
				llena_grid(data.resultado);
			},
			error: function(error){
				console.error(error);
			}
		});
});



function Dictaminador(){

}


	Dictaminador.prototype.genera_grid = function(){
		$("#jqxgridDictaminadores").jqxGrid(
        {
            width: '100%',
            height: 300,
            source: [],
            selectionmode: 'multiplerowsadvanced',
            columns: [
                { text: '<center>ID</center>', datafield: 'id_dictaminador', width:'auto' },
                { text: '<center>Nombre</center>', datafield: 'n_completo' },
                { text: '<center>Correo</center>', datafield: 'email', width: 'auto' },
                { text: '<center>Telefono</center>', datafield: 'telefono', width: 'auto' },
                { text: '<center>Celular</center>', datafield: 'celular', width: 'auto' },
                { text: '<center>Estado</center>', datafield: 'estado', width: 'auto' },
                { text: '<center>Municipio</center>', datafield: 'municipio', width: 'auto' },
                { text: '<center>nombre</center>', datafield: 'nombre', width: 'auto',  hidden : true},
                { text: '<center>paterno</center>', datafield: 'paterno', width: 'auto',  hidden : true },
                { text: '<center>materno</center>', datafield: 'materno', width: 'auto',  hidden : true },
                { text: '<center>localidad</center>', datafield: 'localidad', width: 'auto',  hidden : true },
                { text: '<center>colonia</center>', datafield: 'colonia', width: 'auto',  hidden : true },
                { text: '<center>calle</center>', datafield: 'calle', width: 'auto',  hidden : true },
                { text: '<center>num_int</center>', datafield: 'num_int', width: 'auto',  hidden : true },
                { text: '<center>num_ext</center>', datafield: 'num_ext', width: 'auto',  hidden : true }
            ]
        });
	};

	function llena_grid (vector){
	    var source =
	    {
	        localdata: vector,
	        datatype: "array",
	        datafields :
	        [
	            { name: 'id_dictaminador', type: 'int' },
	            { name: 'n_completo', type: 'int' },
	            { name: 'email', type: 'string' },
	            { name: 'telefono', type: 'string' },
	            { name: 'celular', type: 'string' },
	            { name: 'estado', type: 'string' },
	            { name: 'municipio', type: 'string' },
	            { name: 'nombre', type: 'string' },
	            { name: 'paterno', type: 'string' },
	            { name: 'materno', type: 'string' },
	            { name: 'localidad', type: 'string' },
	            { name: 'colonia', type: 'string' },
	            { name: 'calle', type: 'string' },
	            { name: 'num_int', type: 'string' },
	            { name: 'num_ext', type: 'string' }
	        ],
	        datatype: "array"
	    };
	    var dataAdapter = new $.jqx.dataAdapter(source);
	    // initialize jqxGrid
	    $("#jqxgridDictaminadores").jqxGrid({
            source: dataAdapter,
        });
	}

	Dictaminador.prototype.baja_datos = function(){
		$.ajax({
            url:"../dictaminador/baja_dictamenadores",
            method:"POST",
            data:"",

            success:function(data){
            	// console.log(data.dictamenes);
            	llena_grid(data.dictaminadores);
            },
            error: function(error){
            	console.log(error);
            }
        });
	}

	Dictaminador.prototype.elimina_dictaminador = function(id_dictaminador){
    	$.ajax({
    		url:"../dictaminador/elimina_dictaminador",
    		method:"POST",
    		data:"id_dictaminador="+id_dictaminador,
    		 success: function(data){
    		 	if(data.status == 1 || data.status == "1"){
    		 		swal(
					    'Eliminado!',
					    'El dictaminador se elimino correctamente.',
					    'success'
					  );
    		 	// dictaminador.genera_grid();
				dictaminador.baja_datos();
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

	var dictaminador = new Dictaminador();

	dictaminador.genera_grid();
	dictaminador.baja_datos();