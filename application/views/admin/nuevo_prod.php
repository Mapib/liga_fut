<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="es-Es" xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bienvenidos al Administrador</title>
<!--<link href="<?php echo base_url(); ?>imagenes/reset.css" rel="stylesheet" type="text/css">-->
<link href="<?php echo base_url(); ?>imagenes/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php if($this->session->userdata('username')): ?>
<div id="contenedor">
<div class="cabeza">
	<ul>
	<li><IMG SRC="<?php echo base_url(); ?>imagenes/admin/logo.png" WIDTH="100" ALT="Logo Mapib"></li>
	<li><a href="<?php echo base_url(); ?>admin/productos">Productos</a>  </li>
	<li><a href="<?php echo base_url(); ?>admin/categorias">Categorias</a>  </li> 
	<li>Cerrar Sesi&oacute;n</li>
	</ul> 
</div>


<div class="list_prod">
	
<form  action="<?php echo base_url();?>/admin/nuevo_prod" method="POST" enctype="multipart/form-data"> 
	 
	<ul>
		<li> <h2 align="center">Ingrese datos nuevo Producto</h2> </li> 
		
		<li> <label for="nombre">Nombre Producto</label> <input type="text" name="nombre" placeholder="" required /> </li> <br> 
		<li> <label for="descripcion">Descrpcion del Producto:</label>
		<textarea name="descripcion" cols="40" rows="6" required></textarea></li><br>
		<li> <label for="imagen">Imagen del producto</label> <input type="file" name="imagen"/></li> <br>
		<input type="submit" value="Añadir Nuevo Producto"/>
		<!--<li> <button class="submit" type="submit">Enviar</button> </li>  -->
		</ul> 
	 
		</form>


</div>


<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Mapib Soluciones Web<strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>
<?php else:?>
<?php redirect('login');?>
<?php  endif?>

</body>
</html>