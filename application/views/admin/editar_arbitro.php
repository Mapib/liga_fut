<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/arbitro_editado" method="POST" enctype="multipart/form-data">
 <?php foreach ($query['arb']->result() as $fila){?>

 <tr class="tab_cabeza">
  <h2 align="center">Editar Arbitro</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nom_arbitro" value="<?php echo $fila->nom_arbitro;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Fecha de Nac</td>
<td><input type="date" name="fecha_nac" value="<?php echo $fila->fecha_nac;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Telefono</td>
<td><input type="text" name="telefono" value="<?php echo $fila->telefono;?>"  placeholder="" required /></td>
</tr>

<tr>
<td class="edit_desc">Descripcion</td>
<td><textarea name="descripcion" cols="40" rows="6" required><?php echo $fila->descripcion;?></textarea></td>
</tr>
<tr>
<td class="edit_desc">Imagen</td>
<td><IMG SRC="<?php echo base_url(); ?>imagenes/juez/<?php echo $fila->imagen ?>" WIDTH="100" ALT="<?php echo $fila->nom_arbitro ?>"></td>
</tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td><input type="hidden" value="<?php echo $fila->imagen ?>" name="imagen_2"/></td>
<td><input type="hidden" value="<?php echo $fila->id_arbitro ?>" name="id_arbitro"/></td>
<td><input type="submit" value="Editar Arbitro"/></td>
</tr>
</table>
<?php  }	?>

</form>
</div>
