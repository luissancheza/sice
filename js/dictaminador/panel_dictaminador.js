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
})



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

	var dictaminador = new Dictaminador();

	dictaminador.genera_grid();
	dictaminador.baja_datos();