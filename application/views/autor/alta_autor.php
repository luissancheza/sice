<div class="container-fluid">
	<?php echo form_open('autor/create', array('id' => 'form_alta_autor')); ?>
	<input type="hidden" name="editando" id="editando" value="0">
		<div class="row">
			<div class="col-xs-4">
				<div class="form-group">
					<label for="nombre_a">Nombre</label>
					<input type="text" class="form-control" name="nombre_a" id="nombre_a" placeholder="Introduce nombre">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label for="paterno_a">Paterno</label>
					<input type="text" class="form-control" name="paterno_a" id="paterno_a" placeholder="Introduce apellido paterno">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label for="materno_a">Materno</label>
					<input type="text" class="form-control" name="materno_a" id="materno_a" placeholder="Introduce apellido materno">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<div class="form-group">
					<label for="correo_a">Correo</label>
					<input type="text" class="form-control" name="correo_a" id="correo_a" placeholder="Introduce un correo">
				</div>
			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label for="telefono_a">Telefono</label>
					<input type="text" class="form-control" name="telefono_a" id="telefono_a" placeholder="Introduce un telefono">
				</div>
			</div>
			<div class="col-xs-4">

			</div>
		</div>
		<div class="row pull-right margintop">
			<div class="col-xs-12">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn_crear_autor">Guardar</button>
			</div>
		</div>
	</form>
</div>
<script src="<?php echo base_url(); ?>js/autor/autor_index.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>