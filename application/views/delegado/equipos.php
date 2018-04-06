<div class="col-md-10">
  <h3 class="container">Información de Nuestro Equipo</h3>
	<br><br>
    <table class="table table-striped">
	 <tr>
	 <th>Nombre Equipo</th>
	 <th>Direccion</th>
	 <th>Cancha</th>
	 <th>Insignia</th>
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
			<td><h4><?php echo $fila->nom_equipo?></h4></td>
	  	<td><?php echo $fila->direc_equipo?></td>
	   	<td><IMG SRC="<?php echo base_url(); ?>imagenes/canchas/<?php echo $fila->img_cancha ?>" WIDTH="80" ALT="<?php echo $fila->nombre_cancha ?>"></td>
	  	<td valign="middle" class="imagen"><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia ?>" WIDTH="50" ALT="<?php echo $fila->nom_equipo?>"></td>
	  	<!--<td class="tab_productos" ><?php echo $fila->foto?></td>-->
	  	<td><a href="<?php echo base_url(); ?>delegado/editar_equipo/<?php echo $fila->id_equipo ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
   </tr>
  <tr>
    <td>Información</td>
    <td colspan="5"><?php echo $fila->desc_equipo?></td>
  </tr>
  <?php $num_fila++ ; ?>
  <?php }?>

</table>
</div>
