<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SICE</title>
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>img/imagotipo.jpg"/>
	<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/mystyles.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css" rel="stylesheet" integrity="sha384-+ENW/yibaokMnme+vBLnHMphUYxHs34h9lpdbSLuAwGkOKFRl4C34WkjazBtb7eT" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/styles/jqx.base.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/sweetalert2/sweetalert2.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 minimum-scale=1" />
    <!-- <script type="text/javascript" src="../../scripts/jquery-1.11.1.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxdata.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxtooltip.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxcheckbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxgrid.sort.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxgrid.pager.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxgrid.selection.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/jqwidgets/jqxgrid.edit.js"></script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jqwidgets/scripts/demos.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/sweetalert2/sweetalert2.min.js"></script>
</head>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="#">Bienvenido(a)</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home <span class="badge">42</span></a></li>
				<li><a href="#">Profile <span class="badge"></span></a></li>
				<li><a href="../mensajes/index">Messages <span class="badge">3</span></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo site_url("login/cerrar_sesion")?>">Cerrar sesión</a></li>
			</ul>
		</div>
	</div>
</nav>
<body>
	<div class="container-fluid" id="body_content">
		<div class="row">
			<div class="col-xs-2" id="menu_izq_panel">
				<ul class="nav nav-pills nav-stacked">
				  <li class="active"><a href="#">Panel</a></li>
				  <li><a href="<?php echo site_url("panel/index")?>">Recepción</a></li>
				  <li><a href="<?php echo site_url("dictamen/index")?>">Dictamen</a></li>
				  <li class="dropdown">
				    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
				      Catalogos <span class="caret"></span>
				    </a>
				    <ul class="dropdown-menu">
				      <li><a href="<?php echo site_url("autor/index")?>">Autores</a></li>
				      <li class="divider"></li>
				      <li><a href="#">Obras</a></li>
				      <li class="divider"></li>
				      <li><a href="<?php echo site_url("dictaminador/index")?>">Dictaminadores</a></li>
				      <li class="divider"></li>
				      <li><a href="#">Separated link</a></li>
				    </ul>
				  </li>
				</ul>
			</div>
			<div class="col-xs-10">
				<div class="container-fluid" id="contenedor_vistas_full">