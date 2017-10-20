$(function(){
	$("#form_alta_dictaminador").validate({
	    onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
	    rules: {
	        nombre_d: {required: true},
	        paterno_d: {required: true},
	        materno_d: {required: true},
	        correo_d: {required: true, email: true},
	        telefono_d: {required: true ,minlength:10, maxlength:10},
	        celular_d: {required: true ,minlength:10, maxlength:10}
	    },
	    messages: {
	        nombre_d: {required: " *es requerido"},
	        paterno_d: {required: " *es requerido"},
	        materno_d: {required: " *es requerido"},
	        correo_d: {required: " *es requerido", email: "*introduzca mail valido"},
	        telefono_d: {required: " *es requerido", minlength:"*introduzca almenos 7 dijitos", maxlength:"*solo admite 10 digitos"},
	        celular_d: {required: " *es requerido", minlength:"*introduzca almenos 7 dijitos", maxlength:"*solo admite 10 digitos"}
	    }
	});
});







$("#btn_crear_dictaminador").click(function(e){
	// alert("Dandole aqui");
	e.preventDefault();
    $("#form_alta_dictaminador").submit();
});