<div class="col-md-10">
  <h3 class="container">Listado de Equipos</h3>
	<p><a href="<?php echo base_url(); ?>admin/nuevo_equipo/">Ingresar nuevo Equipo</a></p>
    <table class="table table-striped">
	 <tr>
	 <th>	</th>
	 <th>Nombre Equipo</th>
	 <th>Direccion</th>
	 <th>Delegado</th>
	 <th>Cancha</th>
	 <th>imagen</th>
	 <th>&nbsp;</th>
	 <th>&nbsp;</th>
	 <th>&nbsp;</th>
	 </tr>
 <?php
	// print_r($query->result());
	 $a=1;
	 $num_fila = 0;
	 foreach ($query['eqi']->result() as $fila){
		 //print_r($fila);
		 ?>
		<tr>
			<td><?php echo $a++?></td>
      <td><h4><?php echo $fila->nom_equipo?></h4></td>
	  	<td><?php echo $fila->direc_equipo?></td>
	  	<td><?php ?></td>
	  	<td><?php ?></td>
	  	<td valign="middle" class="imagen"><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia ?>" WIDTH="50" ALT="<?php echo $fila->nom_equipo?>"></td>
	  	<!--<td class="tab_productos" ><?php echo $fila->foto?></td>-->
	  	<td><a href="<?php echo base_url(); ?>admin/editar_equipo/<?php echo $fila->id_equipo ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
	 		<td><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_equipo/<?php echo $fila->id_equipo ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
   </tr>
  <?php $num_fila++ ; ?>
  <?php }?>

</table>
</div>
