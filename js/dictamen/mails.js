$("#btn_dictamen_invitacion").click(function(event) {
	alert("Funiona boton");
});

	function Mail(){
		var _this = this;
		var email_destino = "";
		var edadParaSaludar = 1;
		this.dni = dni;
		this.nombre = nombre;

		//Metodos que accedan a las propiedades o metodos privados aqui
		//metodos privilegiados
		this.getEdad = function(){
			return edad;
		}
		this.setEdad = function(nuevaEdad){
			edad = nuevaEdad;
		}

		this.getEdadParaSaludar = function(){
			return edadParaSaludar;
		}
	}

	Persona.prototype.saludar = function(nombre){
		console.log(this.nombre + " te saluda " + nombre);
	};

	Persona.prototype.crecer = function(){
		this.setEdad(this.getEdad()+1);
		if(this.getEdad() >= this.getEdadParaSaludar()){
			this.saludar('Juanito');
		}
	}

	var yo = new Mail();
	console.log(yo.edad);//devuelve undefined ya que edad no se encuentra en el objeto al no estar declarada a travez de this

	yo.saludar("pepito");
	// yo.envejecer();//no es accesible a modo de instancia
	yo.crecer();