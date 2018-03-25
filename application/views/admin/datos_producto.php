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
	 <table class="tab_prod">
	 <tr class="tab_cabeza">
	 <td>id</td>
	 <td>nombre</td>
	 <td>descripcion</td>
	 <td>imagen</td>
	 <td>editar</td>
	 <td>eliminar</td>
	 
	 </tr>	
	 <?php  
	 foreach ($query->result() as $row);
	
	 {?>
    <tr>
      <td class="tab_productos"><?php echo $row->id_prod ?></td>
      <td class="tab_productos"><?php echo $row->nombre ?></a></td>
	  <td class="tab_productos"><?php echo $row->descripcion ?></td>
	  <td class="tab_productos"><IMG class="imag_tab" SRC="<?php echo base_url(); ?>imagenes/admin/<?php echo $row->imagen ?>" WIDTH="100" ALT="<?php echo $row->nombre ?>"></td>
	  <td class="tab_productos"><a href="<?php echo base_url(); ?>/admin/editar_prod/<?php echo $row->id_prod ?>"><IMG class="imag_tab" SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
	 <td class="tab_productos"><a href="<?php echo base_url(); ?>/admin/eliminar/<?php echo $row->id_prod ?>"><IMG class="imag_tab" SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
    </tr>
 	  
<?php  }	?>
</table>



</div>


<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Mapib Soluciones Web<strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>

<?php else:?>

<?php redirect('login');?>
<?php  endif?>
</body>
</html>