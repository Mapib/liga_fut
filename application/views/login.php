<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="favicon.ico" rel="icon" />
		 <link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
		 <style type="text/css">
		 	body{font-family:arial;

			}
			img{text-align: center;margin: 20px auto;}
			.container_12{text-align: center;}
			h1{
		 		font-size: 22px;
		 		text-align: center;
		 		margin: 20px 0px;
		 	}
		 	#login{
		 		background: #fefefe;
				width:450px;
		 		min-height: 400px;
				margin-left:auto;
				margin-right:auto;
		 	}
		 	#formulario_login{
		 		font-size: 14px;
		 		border: 8px solid #112233;
		 	}
		 	label{
		 		display: block;
		 		font-size: 16px;
		 		color: #333333;
		 		font-weight: bold;
		 	}
		 	input[type=text],input[type=password]{
		 		padding: 10px 6px;
		 		width: 388px;
		 	}
		 	input[type=submit]{
		 		padding: 5px 40px;
		 		background: #61399d;
		 		color: #fff;
		 	}
		 	#campos_login{
		 		margin: 50px 10px;
		 	}
		 	p{
		 		color: #f00;
		 		font-weight: bold;
		 	}
		 </style>
		 <title><?php echo "$titulo"; ?></title>
	</head>
	<body>
	<?php
	$username = array('name' => 'username', 'placeholder' => 'nombre de usuario');
	$password = array('name' => 'password',	'placeholder' => 'introduce tu password');
	$submit = array('name' => 'submit', 'value' => 'Iniciar sesión', 'title' => 'Iniciar sesión');
	?>
	<div class="container_12">
		<IMG SRC="<?php echo base_url(); ?>imagenes/logo_1.png" WIDTH="200" ALT="Logo Mapib">
		<h1>Ingrese sus datos</h1>
		<div class="grid_12" id="login">
			<div class="grid_8 push_2" id="formulario_login">
				<div class="grid_6 push_1" id="campos_login">
					<?=form_open(base_url().'login/new_user')?>
					<label for="username">Nombre de usuario:</label>
					<?=form_input($username)?><p><?=form_error('username')?></p>
					<label for="password">Introduce tu password:</label>
					<?=form_password($password)?><p><?=form_error('password')?></p>
					<?=form_hidden('token',$token)?></br>
					<?=form_submit($submit)?>
					<?=form_close()?>

					<?php
					if($this->session->flashdata('usuario_incorrecto'))
					{
					?>
					<p><?=$this->session->flashdata('usuario_incorrecto')?></p>
					<?php
					}
					?>
				</div>
				<p><a href="<?php echo base_url(); ?>login/logout_ci"><b>Cerrar Sesión</b></a></p>
			</div>
		</div>
	</div>
	</body>
</html>
