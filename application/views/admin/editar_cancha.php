<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/cancha_editada" method="POST" enctype="multipart/form-data">
 <?php foreach ($query['can']->result() as $fila){?>

 <tr class="tab_cabeza">
  <h2 align="center">Editar Cancha</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre_cancha" value="<?php echo $fila->nombre_cancha;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Dirección</td>
<td><input type="text" name="direc_cancha" value="<?php echo $fila->direc_cancha;?>"  placeholder="" required /></td>
</tr>
<tr>
<!--td class="edit_desc">Descripcion</td>
<td><textarea name="descripcion" cols="40" rows="6" required><?php echo $fila->descripcion;?></textarea></td>
</tr-->
<tr>
<td class="edit_desc">Imagen</td>
<td><IMG SRC="<?php echo base_url(); ?>imagenes/canchas/<?php echo $fila->img_cancha?>" WIDTH="100" ALT="<?php echo $fila->nombre_cancha?>"></td>
</tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td><input type="hidden" value="<?php echo $fila->img_cancha?>" name="imagen_2"/></td>
<td><input type="hidden" value="<?php echo $fila->id_cancha?>" name="id_cancha"/></td>
<td><input type="submit" value="Enviar"/></td>
</tr>
</table>
<?php  }	?>

</form>
</div>
