




function Dictamen(){
		// _this = this;
		// var email_destino = "";
		// var edadParaSaludar = 1;
		// this.dni = dni;
		// this.nombre = nombre;

		// //Metodos que accedan a las propiedades o metodos privados aqui
		// //metodos privilegiados
		// this.getEdad = function(){
		// 	return edad;
		// }
		// this.setEdad = function(nuevaEdad){
		// 	edad = nuevaEdad;
		// }

		// this.getEdadParaSaludar = function(){
		// 	return edadParaSaludar;
		// }
	}


	Dictamen.prototype.genera_grid = function(){
		$("#jqxgridDictamen").jqxGrid(
        {
            width: '100%',
            height: 300,
            source: [],
            selectionmode: 'multiplerowsadvanced',
            columns: [
                { text: '<center>ID</center>', datafield: 'id_dictamen', width:'auto' },
                { text: '<center>Solicitud</center>', datafield: 'solicitud' },
                { text: '<center>Dictaminador</center>', datafield: 'id_dictaminador', width: 'auto' },
                { text: '<center>Fecha Inicio</center>', datafield: 'fecha_inicio', width: 'auto' },
                { text: '<center>Fecha Fin</center>', datafield: 'fecha_fin', width: 'auto' },
                { text: '<center>Status</center>', datafield: 'status', width: 'auto' }
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
	            { name: 'id_dictamen', type: 'int' },
	            { name: 'solicitud', type: 'int' },
	            { name: 'id_dictaminador', type: 'string' },
	            { name: 'fecha_inicio', type: 'string' },
	            { name: 'fecha_fin', type: 'string' },
	            { name: 'status', type: 'int' }
	        ],
	        datatype: "array"
	    };
	    var dataAdapter = new $.jqx.dataAdapter(source);
	    // initialize jqxGrid
	    $("#jqxgridDictamen").jqxGrid({
            source: dataAdapter,
        });
	}

	Dictamen.prototype.baja_datos = function(){
		$.ajax({
            url:"../dictamen/baja_dictamenes",
            method:"POST",
            data:"",

            success:function(data){
            	// console.log(data.dictamenes);
            	llena_grid(data.dictamenes);
            },
            error: function(error){
            	console.log(error);
            }
        });
	}

	var dictamen = new Dictamen();

	dictamen.genera_grid();
	dictamen.baja_datos();