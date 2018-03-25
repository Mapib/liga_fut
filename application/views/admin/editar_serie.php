
<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/serie_editada" method="POST" enctype="multipart/form-data">
 <?php foreach ($query['ser']->result() as $fila){?>

 <tr class="tab_cabeza">
  <h2 align="center">Editar Serie</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre_serie" value="<?php echo $fila->nombre_serie;?>"  placeholder="" required /></td>
</tr>
<tr>
<td class="edit_desc">Descripcion</td>
<td><textarea name="desc_serie" cols="40" rows="6" required><?php echo $fila->desc_serie;?></textarea></td>
</tr>
<tr>
<td></td>
<input type="hidden" value="<?php echo $fila->id_serie ?>" name="id_serie"/></td>
<td><input type="submit" value="Editar Serie"/></td>
</tr>
</table>
<?php }	?>

</form>
</div>
