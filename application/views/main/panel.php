<div class="row">
	<div class="col-xs-12">
		<a class="btn btn-md btn-success"  id="btn_alta_recepcion"><span class="glyphicon glyphicon-plus"></span></a>
		<button class="btn btn-md btn-warning"><span class="glyphicon glyphicon-pencil" onclick="ejemplo()"></span></button>
		<button class="btn btn-md btn-danger"><span class="glyphicon glyphicon-minus"></span></button>
	</div>
</div>
<hr>
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
			<div class="modal-header">
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



    