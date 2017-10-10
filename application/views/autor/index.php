<div class="row">
	<div class="col-xs-6">
		<button class="btn btn-md btn-success"  id="btn_alta_autor"><span class="glyphicon glyphicon-plus"></span></button>
		<button class="btn btn-md btn-warning" id="btn_edita_autor"><span class="glyphicon glyphicon-pencil"></span></button>
		<button class="btn btn-md btn-danger" id="btn_elimina_autor"><span class="glyphicon glyphicon-minus"></span></button>
	</div>
	<div class="col-xs-5">
		<input type="text" class="form-control" id="input_busca_autor" placeholder="Introduce nombre de autor">
	</div>
	<div class="col-xs-1">
		<button class="btn btn-md btn-danger" id="btn_buscar_autor" title="busca por autor"><span class="glyphicon glyphicon-search"></span></button>
	</div>
</div>
<hr>
<br>
<div class="row">
	<div class="col-xs-12">
		<div class="container-fluid">
			<div id="jqxgridAutores">
    		</div>
		</div>
	</div>
</div>

<div class="modal" id="modal_autor">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Registro de Autor</h4>
			</div>
			<div class="modal-body">
				<!-- Contenido del modal -->
			</div>
		</div>
	</div>
</div> 
<script src="<?php echo base_url(); ?>js/autor/autor.js"></script>
