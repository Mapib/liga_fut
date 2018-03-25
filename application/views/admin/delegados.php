<div class="col-md-10">
  <h3 class="container">Listado de Delegados</h3>
	<p><a href="<?php echo base_url(); ?>admin/nuevo_delegado/">Ingresar nuevo Delegado</a></p>
    <table class="table table-striped">
	 <tr>
	 <td> </td>
	 <td>Nombre</td>
	 <td>Telefono</td>
   <td>Equipo</td>
	 <td>Foto</td>
	<td>&nbsp;</td>
	 <td>&nbsp;</td>

	 </tr>
	 <?php
	// print_r($query->result());
	 $a=1;
	 $num_fila = 0;
	 foreach ($query['arb']->result() as $fila){ ?>
	<tr>
		<td><?php echo $a++?></td>
		<td><h4><?php echo $fila->nombre_delegado?></h4></td>
		<td><?php echo $fila->fono_delegado?></td>
		<td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia ?>" WIDTH="50" ALT="<?php echo $fila->nom_equipo?>"></td>
		<td><IMG SRC="<?php echo base_url(); ?>imagenes/deleg/<?php echo $fila->img_delegado ?>" WIDTH="50" ALT="<?php echo $fila->nombre_delegado?>"></td>
		<td><a href="<?php echo base_url(); ?>admin/editar_delegado/<?php echo $fila->id_delegado?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
		<td><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_delegado/<?php echo $fila->id_delegado ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
	</tr>
  <?php $num_fila++ ; ?>
  <?php }?>
</table>
</div>
