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
		background-color: #fff;

		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	ul {
		list-style: none;
		width:250px;
		padding:0 0 0 0 ;

	}
	li {
		text-align: right;

	}
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

	#body {
		margin: 0 15px 0 15px;
	}
	#contact_form {
		text-align: center;
		width:300px;
		margin-left:auto;
		margin-right:auto;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	.cabeza{

		text-align: center;
		width:auto;
	}
	</style>
</head>
<body>
<div class="cabeza">

<IMG SRC="<?php echo base_url(); ?>imagenes/admin/logo.png" WIDTH="300" ALT="Logo Mapib">

</div>
<div id="container">

	<h1>Bienvenidos a Mapib Servicios Web</h1>

	<form class="contact_form" action="#" id="contact_form" runat="server">

	<ul>
		<li> <h2 align="center">Ingrese sus datos</h2> </li>

		<li> <label for="name">Usuario: </label> <input type="text" placeholder="" required /> </li> <br>
		<li> <label for="password">Contraseña: </label> <input type="password" name="email" placeholder="" required /> </li> <br>
		<!-- <li> <label for="website">Sitio web:</label> <input type="url" name="website" placeholder="http://developerji.com" required pattern="(http|https)://.+" /> <span class="form_hint">Formato correcto: "http://developerji.com"</span> </li>
		<li> <label for="message">Mensaje:</label> <textarea name="message" cols="40" rows="6" required></textarea> </li> -->
		<li> <button class="submit" type="submit">Enviar</button> </li>
		</ul>

		</form>
	<p> <a href="<?PHP echo base_url();?>login_1/logout_ci">cerrar seson</a></p>
	<!--<div id="body">
		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/Welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div> -->

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
