<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SISE</title>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<script src="<?php echo base_url($js . 'login.js'); ?>"></script>
</head>
<body>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url(); ?>img/imagotipo.jpg"/>
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="<?php echo site_url('login/login_action');?>" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Cuenta de correo" required autofocus>
                <input type="password" name ="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Iniciar sesión</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
    <div class="row">
        <section style="text-align:center; margin:10px auto;"><p>Develop by <a href="http://businessdevelop.esy.es/">Lic. José Luis Sánchez Arenas</a></p></section>
        <div class="col-xs-12 " style="text-align:center; margin:10px auto;">
            <p >© 2017 SMARTB, All rights reserved</p>
        </div>
    </div>
</body>
</html>