$(function(){

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
                { text: '<center>Fecha oficio</center>', datafield: 'fecha_oficio', width: 100 }
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
            { name: 'fecha_recepcion', type: 'date' },
            { name: 'fecha_oficio', type: 'date' }
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



