<div class="col-md-10">
  <h3 class="container">Listado de Fechas</h3>
	<p><a href="<?php echo base_url(); ?>admin/nueva_fecha/">Ingresar nuevo Fecha</a></p>
    <table class="table table-striped">
	 <tr class="tab_cabeza">
	 <th> </th>
	 <th>Nombre </th>
	 <th>Fecha </th>
	 <th>Estado</th>
	 <th> </th>
	 <th> </th>
	 </tr>
	 <?php
	 //print_r($query['fe']->result())
	 $a=1;
	 $num_fila = 0;
	 foreach ($query['fech']->result() as $fila){ ?>
	<tr>
	<td><?php echo $a++?></td>
	<td><?php echo $fila->nombre_fecha?></a></td>
	<td><?php echo $fila->fecha;?></td>
	<td><?php $fila->status;
   if ($fila->status==0) {	echo "Pendiente";} //si el estado es 0 escribir pendiente
   if ($fila->status==1) {	echo "Por Jugar ";} //si el estado es 0 escribir Por Jugar
   if ($fila->status==2) {	echo "Jugada";} //si el estado es 0 escribir Jugada

  ?></td>
	<td>
	 <?php if ($fila->status!=2) { ?>
 	<a href="<?php echo base_url(); ?>admin/editar_fecha/<?php echo $fila->id_fecha ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a>
 	<?php	}	else{ ?>
 	<a href="<?php echo base_url(); ?>admin/editar_fecha/<?php echo $fila->id_fecha ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/visto_bueno.png" WIDTH="30" ALT="imagen editar">
	<?php } ?>

	</td>
	    </tr>
  <?php $num_fila++ ; ?>
  <?php }?>
</table>

</div>
