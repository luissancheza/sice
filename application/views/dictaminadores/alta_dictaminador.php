<div class="container-fluid">
	<?php echo form_open('dictaminador/create', array('id' => 'form_alta_dictaminador')); ?>
	<input type="hidden" name="editando" id="editando" value="0">
		<div class="panel panel-default">
		  <div class="panel-body">
			<div class="row">
				<div class="col-xs-4">
					<div class="form-group">
						<label for="nombre_a">Nombre</label>
						<input type="text" class="form-control" name="nombre_d" id="nombre_d" placeholder="Introduce nombre">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label for="paterno_a">Paterno</label>
						<input type="text" class="form-control" name="paterno_d" id="paterno_d" placeholder="Introduce apellido paterno">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label for="materno_a">Materno</label>
						<input type="text" class="form-control" name="materno_d" id="materno_d" placeholder="Introduce apellido materno">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5">
					<div class="form-group">
						<label for="correo_a">Correo</label>
						<input type="text" class="form-control" name="correo_d" id="correo_d" placeholder="Introduce un correo">
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="telefono_a">Telefono</label>
						<input type="text" class="form-control" name="telefono_d" id="telefono_d" placeholder="Introduce un telefono">
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="telefono_a">Celular</label>
						<input type="text" class="form-control" name="celular_d" id="celular_d" placeholder="Introduce un numero celular">
					</div>
				</div>
			</div>
		  </div>
		</div>
		<div class="panel panel-default">
		  <div class="panel-body">
		    <div class="row">
				<div class="col-xs-3">
					<div class="form-group">
						<label for="telefono_a">Estado</label>
						<input type="text" class="form-control" name="estado_d" id="estado_d" placeholder="Introduce un estado">
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="correo_a">Municipio</label>
						<input type="text" class="form-control" name="municipio_d" id="municipio_d" placeholder="Introduce un municipio">
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="telefono_a">Localidad</label>
						<input type="text" class="form-control" name="localidad_d" id="localidad_d" placeholder="Introduce una localidad">
					</div>
				</div>
				<div class="col-xs-3">
					<div class="form-group">
						<label for="telefono_a">Colonia</label>
						<input type="text" class="form-control" name="colonia_d" id="colonia_d" placeholder="Introduce una colonia">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<div class="form-group">
						<label for="correo_a">Calle</label>
						<input type="text" class="form-control" name="calle_d" id="calle_d" placeholder="Introduce una calle">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label for="telefono_a">Num Ext.</label>
						<input type="text" class="form-control" name="num_ext_d" id="num_ext_d" placeholder="Introduce numero exterior">
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						<label for="telefono_a">Num Int.</label>
						<input type="text" class="form-control" name="num_int_d" id="num_int_d" placeholder="Introduce numero interior">
					</div>
				</div>
			</div>
		  </div>
		</div>
		<div class="row pull-right margintop">
			<div class="col-xs-12">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn_crear_dictaminador">Guardar</button>
			</div>
		</div>
	</form>
</div>
<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>js/dictaminador/validaciones.js"></script>