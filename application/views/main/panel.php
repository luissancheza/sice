<div class="row">
	<div class="col-xs-12 col-md-3">
		<a class="btn btn-md btn-success"  id="btn_alta_recepcion" title="Nueva solicitud"><span class="glyphicon glyphicon-plus"></span></a>
		<button class="btn btn-md btn-warning" id="btn_edita_recepcion" title="Editar solicitud"><span class="glyphicon glyphicon-pencil"></span></button>
		<button class="btn btn-md btn-danger" id="btn_elimina_recepcion" title="Eliminar solicitud"><span class="glyphicon glyphicon-minus"></span></button>
		<button class="btn btn-md btn-primary" id="btn_exporta_recepcion" title="Generar oficio"><span class="glyphicon glyphicon-list-alt"></span></button>
	</div>
</div>
<hr>
<br>
<div class="row margintop">
	<!-- <div class="col-xs-12 col-md-9"> -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
			  <input type="text" class="form-control" id="txt_id_solicitud" placeholder="ID de solicitud" >
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
			  <input type="text" class="form-control" id="txt_dependencia_solicitud" placeholder="Dependencia">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
			  <input type="text" class="form-control" id="txt_departamento_solicitud" placeholder="Departamento">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
			  <input type="text" class="form-control" id="txt_autor_solicitud" placeholder="Autor">
		</div>
	<!-- </div> -->
</div>
<br>
<div class="row">
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="" id="chk_por_fechas">
	    Por Fechas
	  </label>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div id='dateInput_inicio'>
			 </div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<div id='dateInput_fin'>
		</div>
	</div>
	<div class="col-xs-1">
		<button class="btn btn-sm btn-success" id="btn_busqueda_avanzada"><span class="glyphicon glyphicon-search"></span> Buscar</button>
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<div class="container-fluid">
			<div id="jqxgridRecepcion">
    		</div>
		</div>
	</div>
</div>


<div class="modal" id="modal_resepcion">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modalhead">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Registro de la obra</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">Nombre del autor</span>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_aux_autor">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="cierra_modal_aux_autor" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Seleccione Autor</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-4">
						<div class="input-group input-group-sm">
							<span class="input-group-addon">Nombre del autor</span>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script> 
<script src="<?php echo base_url(); ?>js/recepcion/recepcion_panel.js"></script>



    