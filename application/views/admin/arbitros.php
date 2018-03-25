<?php function cortar_palabras($texto, $largor = 15, $puntos = "...")
{
	$palabras = explode(' ', $texto);
	if (count($palabras) > $largor)
	{
		return implode(' ', array_slice($palabras, 0, $largor)) ." ". $puntos;
	} else
				{
					return $texto;
				}
}

?>
<div class="col-md-10">
  <h3 class="container">Listado de Arbitros</h3>
	<p><a href="<?php echo base_url(); ?>admin/nuevo_arbitro/">Ingresar nueva Arbitro</a></p>
    <table class="table table-striped">
	 <tr>
	 <td> </td>
	 <td>Nombre</td>
	 <td>Fecha de Nacimiento</td>
	 <td>Telefono</td>
	<td>Descripcion</td>
	 <td>Foto</td>
	<td>&nbsp;</td>
	 <td>&nbsp;</td>

	 </tr>
	 <?php
	// print_r($query->result());
	 $a=1;
	 $num_fila = 0;
	 foreach ($query['arb']->result() as $fila){ ?>
	<?php $articulo = $fila->descripcion;?>
	<tr>
		<td ><?php echo $a++?></td>
		<td><h4><?php echo $fila->nom_arbitro?></h4></td>
		<td><?php echo $fila->fecha_nac?></td>
		<td><?php echo $fila->telefono?></td>
		<td><p><?php echo cortar_palabras($articulo)?></p></td>
		<td><IMG SRC="<?php echo base_url(); ?>imagenes/juez/<?php echo $fila->imagen ?>" WIDTH="50" ALT="<?php echo $fila->nom_arbitro?>"></td>
		<td><a href="<?php echo base_url(); ?>admin/editar_arbitro/<?php echo $fila->id_arbitro ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
		<td><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_arbitro/<?php echo $fila->id_arbitro ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
	</tr>
  <?php $num_fila++ ; ?>
  <?php }?>
</table>
</div>
