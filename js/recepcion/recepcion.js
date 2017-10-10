$(function(){
	console.log("LISTO TODO FUL");
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
       return arg !== value;
    });

    $("#form_recepcion").validate({
        onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
        rules: {
            autor_libro: {required: true},
            dependencia: {required: true},
            departamento: {required: true},
            puesto: {required: true, minlength: 5},
            n_oficio: {required: true},
            solicitud: {required: true},
            observaciones: {required: true}
        },
        messages: {
            autor_libro: {required: " *Seleccione un autor"},
            dependencia: { required: " *es requerido" },
            departamento: { required: " *es requerido" },
            puesto: { required: " *es requerido", minlength: "*almenos 5 caracteres" },
            n_oficio: {required: "*es requerido"},
            solicitud: {required: "*es requerido"},
            observaciones: {required: "*es requerido"}
        }
    });
});


$("#btn_levanta_autores").click(function(){
    $.ajax({
            url:"../recepcion/llama_vista",
            method:"POST",
            data:"",

            success:function(data){
                $("#modal_aux_autor .modal-body").empty();
                $("#modal_aux_autor .modal-body").append(data.html);
                $("#modal_aux_autor").modal("show");
            },
            error: function(error){

            }
        });
});

$("#cierra_modal_aux_autor").click(function(){
    cierra_modal_seleccionada('modal_aux_autor');
});

function cierra_modal_seleccionada(id_modal){
    $('#'+id_modal).modal('toggle');
}

$("#btn_guarda_recepcion").click(function(e){
      e.preventDefault();
      $("#form_recepcion").submit();
});