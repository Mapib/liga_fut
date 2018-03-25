<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Mapib Administrador</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }


	body {
	font: 30px Arial, Helvetica, sans-serif;
	background-color: #ffffff;
	font-size:20px;
	width:100%;
	}

	ul {list-style: none;width:90%;padding:0 0 0 0 ;height:150px;}
	li {text-align: right;clear:both;}
	li p {width:40%;float:left;font-size:30px;}
	input{float:right;margin-top:35px;}
	h1 {
		text-align: center;
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	#body {margin: 0 15px 0 15px;}
	#contact_form {
		text-align: center;
		width:70%;
		margin-left:auto;
		height:100%;
		margin-right:auto;
		clear:both;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
		clear:both;
	}
	.cabeza img{width:40%;}
	#container {width:93%; margin: 10px; border: 1px solid #D0D0D0; box-shadow: 0 0 8px #D0D0D0;}

	.cabeza{text-align: center;	width:auto;}



	@media screen and (max-width: 801px) {
	.cabeza img{width:70%;}
	ul {width:90%;text-align:center;}
	#contact_form {width:90%;}
	body {font-size: 20px;}
	li {width:90%;font-size: 20px;text-align:center;}

	}

	@media screen and (max-width: 460px) {
	label{width:90%;}
	.none{clear:both;}
	li p{width:90%}


	}

	</style>
</head>
<body>
<div class="cabeza">

<IMG SRC="<?php echo base_url();?>imagenes/logo_1.png" WIDTH="" ALT="Logo Mapib">

</div>
<div id="container">

	<h1>Bienvenidos al Administrador</h1>

	<form class="contact_form" action="<?php echo base_url(); ?>login" id="contact_form" method="POST" runat="server">

	<ul>
		<li> <h2 align="center">Ingrese sus datos</h2> </li>

		<li valign="middle"> <label for="name"><p>Usuario: </p></label> <input type="text" name="username" placeholder="" required /> </li> <br>
		<li> <label for="password"><p>Contraseña: </p></label><input type="password" name="password" placeholder="" required /> </li> <br>
		<li> <input type="submit" value="Enviar"></li>
		</ul>

		</form>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
