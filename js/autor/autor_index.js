$(function(){
	init_autor();
	$("#form_alta_autor").validate({
	    onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
	    rules: {
	        nombre_a: {required: true},
	        paterno_a: {required: true},
	        materno_a: {required: true},
	        correo_a: {required: true, email: true},
	        telefono_a: {required: true ,minlength:10, maxlength:10}
	        // departamento: { valueNotEquals: "0" },
	        // puesto: { valueNotEquals: "0" }
	    },
	    messages: {
	        nombre_a: {required: " *es requerido"},
	        paterno_a: {required: " *es requerido"},
	        materno_a: {required: " *es requerido"},
	        correo_a: {required: " *es requerido", email: "*introduzca mail valido"},
	        telefono_a: {required: " *es requerido", minlength:"*introduzca almenos 7 dijitos", maxlength:"*solo admite 10 digitos"}
	        // departamento: { valueNotEquals: " *Seleccione una opción" },
	        // puesto: { valueNotEquals: " *Seleccione una opción" }
	    }
});

});







$("#btn_crear_autor").click(function(e){
	e.preventDefault();
    $("#form_alta_autor").submit();
});
