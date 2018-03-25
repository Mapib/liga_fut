<?php
function cortar_palabras($texto, $largor = 25, $puntos = "...")
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
  <h3 class="container">Listado de Noticias</h3>
	<p><a href="<?php echo base_url(); ?>admin/nueva_noti/">Ingresar nueva Noticia</a></p>
    <table class="table table-striped">
      <tr>
        <th>&nbsp;</th>
        <th>Titulo</th>
        <th>Sub-Titulo</th>
        <th>Contenido</th>
        <th>Imagen</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
			<?php
		 // print_r($query->result());
			$a=1;
			$num_fila = 0;
			foreach ($query['noti']->result() as $fila){ ;
		  $articulo = $fila->contenido;?>
      <tr>
       <td><?php echo $a;?></td>
       <td><h4><?php echo $fila->titulo ?></h4></td>
       <td><?php echo cortar_palabras($fila->sub_titulo)?></td>
       <td><?php echo cortar_palabras($articulo)?></td>
			 <td><IMG SRC="<?php echo base_url(); ?>imagenes/noti/<?php echo $fila->imagen ?>" WIDTH="50" ALT="<?php echo $fila->titulo ?>"></td>
       <td class="icono"><a href="<?php echo base_url(); ?>admin/editar_noti/<?php echo $fila->id_noticia?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
 	     <td class="icono"><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_noti/<?php echo $fila->id_noticia?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
      </tr>
      <?php $a++; } ?>
    </table>

<hr>
</div>
<!--/table>
</div-->
