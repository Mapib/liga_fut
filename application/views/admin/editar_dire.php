<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/dire_editado" method="POST" enctype="multipart/form-data">
 <?php foreach ($query['dire']->result() as $fila){?>

 <tr class="tab_cabeza">
  <h2 align="center">Editar Integrante Diretiva</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre" value="<?php echo $fila->nombre;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Cargo</td>
<td><input type="text" name="cargo" value="<?php echo $fila->cargo;?>" placeholder="" required /></td>
</tr>
<tr>
<td class="edit_desc">Contenido</td>
<td><textarea name="descripcion" cols="40" rows="6" required><?php echo $fila->descripcion;?></textarea></td>
</tr>
<tr>
<td class="edit_desc">Imagen</td>
<td><IMG SRC="<?php echo base_url(); ?>imagenes/dire/<?php echo $fila->imagen ?>" WIDTH="100"></td>
</tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td class="busca"><input type="hidden" value="<?php echo $fila->id_directiva ?>" name="id_directiva"/></td>
<td><input type="hidden" value="<?php echo $fila->imagen ?>" name="imagen_2"/></td>
<td><input type="submit" value="Editar Integrante"/></td>
</tr>
</table>
<?php }	?>

</form>
</div>
