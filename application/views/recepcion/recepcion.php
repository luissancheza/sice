<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url($css . 'bootstrap-datetimepicker.min.css'); ?>">
	<script src="<?php echo base_url($js . 'bootstrap-datetimepicker.js'); ?>"></script>
	<script src="<?php echo base_url(); ?>js/recepcion/recepcion.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control" name="autor_libro" id="autor_libro" placeholder="Autor">
							</div>
						</div>
						<div class="col-xs-1">
							<button class="btn btn-default" id="btn_levanta_autores"><span class="glyphicon glyphicon-share"></span></button>
						</div>
					</div>
				</div>
				<?php echo form_open('recepcion/create', array('id' => 'form_recepcion')); ?>
					<div class="container-fluid">
					<input type="hidden" class="form-control" name="id_autor_l" id="id_autor_l">
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
									<label for="dependencia">Dependencia</label>
									<input type="text" class="form-control" name="dependencia" id="dependencia" placeholder="Introduce una dependencia">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="departamento">Departamento</label>
									<input type="text" class="form-control" name="departamento" id="departamento" placeholder="Introduce un departamento">
								</div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
									<label for="puesto">Puesto</label>
									<input type="text" class="form-control" name="puesto" id="puesto" placeholder="Introduce un puesto">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="form-group">
					                <label for="dtp_input_recepcion">Fecha de recepción</label>
					                <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input_recepcion" data-link-format="yyyy-mm-dd">
					                    <input class="form-control" size="16" type="text" value="" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					                </div>
									<input type="hidden" id="dtp_input_recepcion" value="" name="dtp_input_recepcion" /><br/>
					            </div>
							</div>
							<div class="col-xs-4">
								<div class="form-group">
					                <label for="dtp_input_oficio">Fecha de oficio</label>
					                <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input_oficio" data-link-format="yyyy-mm-dd">
					                    <input class="form-control" size="16" type="text" value="" readonly>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					                </div>
									<input type="hidden" id="dtp_input_oficio" value="" name="dtp_input_oficio" /><br/>
					            </div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
								    <label for="n_oficio">N. oficio</label>
								    <input type="text" class="form-control" name="n_oficio" id="n_oficio">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label for="solicitud">Solicitud</label>
								<textarea class="form-control" rows="3" id="solicitud" name="solicitud" style="resize: none;"></textarea>
							</div>
							<div class="col-xs-6">
								<label for="observaciones">Observaciones</label>
								<textarea class="form-control" rows="3" id="observaciones" name="observaciones" style="resize: none;"></textarea>
							</div>
						</div>
					</div>
					<div class="row pull-right margintop">
						<div class="col-xs-12">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-primary" id="btn_guarda_recepcion">Guardar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
<style>
.margintop{
  margin-top: 10px;
}
</style>