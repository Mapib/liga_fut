<?php $this->load->view('admin/head');?>

<body>
<?php if($this->session->userdata('username')): ?>

<div id="contenedor">
<div class="cabeza">
	<ul>
	<li><IMG SRC="<?php echo base_url(); ?>imagenes/admin/logo.png" WIDTH="100" ALT="Logo Mapib"></li>
	<li><a href="<?php echo base_url(); ?>admin/productos">Productos</a>  </li>
	<li><a href="<?php echo base_url(); ?>admin/categorias">Categorias</a></li> 
	<li><a href="<?php echo base_url(); ?>login/log_out">Cerrar Sesi&oacute;n </a></li>
	</ul> 
</div>
<br><br><br>
	<ul>
	<li class="buscar_der"><a href="<?php echo base_url(); ?>admin/nuevo_prod/">Ingresar nuevo producto</a></li>
	<li class="buscar"><a href="<?php echo base_url(); ?>admin/productos/">mostrar todo</a></li>
	<li class="buscar"><form id="form" method="GET" action="<?php echo base_url(); ?>admin/buscar">
		<input type="text" name="query" id="query" />
		<input type="submit" name="" id="" value="Buscar" />
	</form></li>
	</ul>
<div class="list_prod">
	 <br><br>
	 <table class="tab_prod">
	 <tr class="tab_cabeza">
	 <td>id</td>
	 <td>nombre</td>
	 <td>descripcion</td>
	 <td>imagen</td>
	 <td>editar</td>
	 <td>eliminar</td>
	 
	 </tr>
	 <?php  $a=1;  
	 foreach ($query->result() as $fila){?>
    <tr>
      <td class="tab_productos"><?php echo $a++?></td>
      <td class="tab_productos"><a href="<?php echo base_url(); ?>admin/datos_producto/<?php echo $fila->id_prod ?>"><?php echo $fila->nombre ?></a></td>
	  <td class="tab_productos"><?php echo $fila->descripcion ?></td>
	  <td class="tab_productos"><IMG class="imag_tab" SRC="<?php echo base_url(); ?>imagenes/admin/<?php echo $fila->imagen ?>" WIDTH="50" ALT="<?php echo $fila->nombre ?>"></td>
	  <td class="tab_productos"><a href="<?php echo base_url(); ?>/admin/editar_prod/<?php echo $fila->id_prod ?>"><IMG class="imag_tab" SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
	 <td class="tab_productos"><a onclick="return confirmation()" href="<?php echo base_url(); ?>/admin/eliminar/<?php echo $fila->id_prod ?>"><IMG class="imag_tab" SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
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