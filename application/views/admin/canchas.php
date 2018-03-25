<div class="col-md-10">
  <h3 class="container">Listado de Canchas</h3>
	<p><a href="<?php echo base_url(); ?>admin/nueva_cancha/">Ingresar nueva Cancha</a></p>
    <table class="table table-striped">
	 <tr class="tab_cabeza">
	 <th> </th>
	 <th>Nombre </th>
	 <th>Dirección</th>
	 <th>Imagen</th>
	 <th> </th>
	 <th> </th>
	 </tr>
	 <?php
	 //print_r($query['fe']->result())
	 $a=1;
	 $num_fila = 0;
	 foreach ($query['can']->result() as $fila){ ?>
	<tr>
	<td><?php echo $a++?></td>
	<td><?php echo $fila->nombre_cancha?></a></td>
	<td><?php echo $fila->direc_cancha;?></td>
	<td><IMG SRC="<?php echo base_url(); ?>imagenes/canchas/<?php echo $fila->img_cancha;?>" WIDTH="80" ALT=""></td>
	<td><a href="<?php echo base_url(); ?>admin/editar_cancha/<?php echo $fila->id_cancha;?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a>
  <td><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_cancha/<?php echo $fila->id_cancha?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
	</td>
	 </tr>
  <?php $num_fila++ ; ?>
  <?php }?>
</table>

</div>
