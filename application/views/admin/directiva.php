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
	<h3 class="container">Integrantes de Nuestra Directiva</h3>
	<p><a href="<?php echo base_url(); ?>admin/nuevo_dire/">Ingresar nuevo Dirigente</a></p>
	 <table class="table table-striped">
	 <tr>
	 <th> </th>
	 <th>Nombre</th>
	 <th>Cargo</th>
	 <th>Descripcion</th>
	 <th>Imagen</th>
	 <th>Editar</th>
	 <th>Eliminar</th>
	 </tr>
	  <?php	// print_r($query->result());
	 $a=1;
	 foreach ($query['dire']->result() as $fila){ ?>
	<?php $articulo = $fila->descripcion;?>
	<tr>
  	<td><?php echo $a++?></td>
    <td><h4><?php echo $fila->nombre ?></h4></td>
	  <td><?php echo $fila->cargo?></td>
	  <td><?php echo cortar_palabras($articulo)?></td>
	  <td><IMG SRC="<?php echo base_url(); ?>imagenes/dire/<?php echo $fila->imagen ?>" WIDTH="50" ALT="<?php echo $fila->nombre ?>"></td>
	  <td class="icono"><a href="<?php echo base_url(); ?>admin/editar_directivo/<?php echo $fila->id_directiva ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
   	<td class="icono"><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_dire/<?php echo $fila->id_directiva ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
 	  </tr>
    <?php }?>
</table>
<hr>
</div>
