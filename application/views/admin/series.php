<?php
function cortar_palabras($texto, $largor = 15, $puntos = "...")
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
	<h3 class="container">Listado de Series</h3>
	<p><a href="<?php echo base_url(); ?>admin/nueva_serie/">Ingresar nueva Serie</a></p>
	 <table class="table table-striped">
	 <tr>
	 <th> </th>
	 <th>Nombre Serie</th>
	 <th>descripcion</th>
	 <!--<td class="parrafo">Contenido</td>
	 <td>imagen</td>-->
	 <th>&nbsp;</th>
	 <th>&nbsp;</th>
	 </tr>
  <?php
	// print_r($query->result());
	 $a=1;
	 $num_fila = 0;
	 foreach ($query['ser']->result() as $fila){ ?>
	<?php $articulo = $fila->desc_serie;?>
	<tr>
    <td><?php echo $a++?></td>
    <td><h4><?php echo $fila->nombre_serie ?></h4></td>
	  <td><?php echo cortar_palabras($articulo)?></td>
	  <td><a href="<?php echo base_url(); ?>admin/editar_serie/<?php echo $fila->id_serie ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
	  <td><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_serie/<?php echo $fila->id_serie ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
  </tr>

   </tr>
  <?php $num_fila++ ; ?>
  <?php }?>

</table>
</div>
