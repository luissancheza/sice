<div class="container-fluid">
	<?php echo form_open('dictaminador/create', array('id' => 'form_alta_dictaminador')); ?>
		<div class="panel panel-default">
		  <div class="panel-body">
			<div class="row">
				<input type="hidden" name="invitando" id="invitando" value="0">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="nombre_a">Dictaminadores:</label>
						<select id="sel_correo_invitacion" name="sel_correo_invitacion" class="form-control">
							<?php foreach ($correos as $correo) { ?>
		                      <option value="<?= $correo['data']; ?>" > <?= $correo['label']; ?> </option>
		                    <?php } ?>
						</select>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-5">
					<div class="form-group">
						<label for="correo_a">Asunto</label>
						<input type="text" class="form-control" name="asunto_d" id="asunto_d" placeholder="Introduce un asunto">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="correo_a">Mensaje</label>
						<textarea class="form-control" rows="3"></textarea>
					</div>
				</div>
			</div>
		  </div>
		</div>
		<div class="row pull-right margintop">
			<div class="col-xs-12">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn_crear_dictaminador">Enviar Invitacion</button>
			</div>
		</div>
	</form>
</div>