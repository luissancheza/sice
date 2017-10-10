$(function(){
	console.log("LISTO TODO FUL");
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
       return arg !== value;
    });

    $("#form_recepcion").validate({
        onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
        rules: {
            // id_autor_l: {valueNotEquals: "0"},
            dependencia: { valueNotEquals: "0" },
            departamento: { valueNotEquals: "0" },
            puesto: { valueNotEquals: "0" }
        },
        messages: {
            // id_autor_l: {valueNotEquals: " *Seleccione un autor"},
            dependencia: { valueNotEquals: " *Seleccione una opción" },
            departamento: { valueNotEquals: " *Seleccione una opción" },
            puesto: { valueNotEquals: " *Seleccione una opción" }
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
      alert("funciona boton");
});