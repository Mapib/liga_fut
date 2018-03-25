<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nueva_cancha" method="POST" enctype="multipart/form-data">
 <tr class="tab_cabeza">
  <h2 align="center">Ingresar  Cancha</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre_cancha" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Dirección</td>
<td><input type="text" name="direc_cancha" value=""  placeholder="" required /></td>
</tr>
<tr>
<!--td class="edit_desc">Descripcion</td>
<td><textarea name="descripcion" cols="40" rows="6" required><?php echo $fila->descripcion;?></textarea></td>
</tr-->
<tr>
<td class="edit_desc">Imagen</td>
<td></td>
</tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td><input type="hidden" value="" name="imagen_2"/></td>
<td><input type="hidden" value="" name="id_cancha"/></td>
<td><input type="submit" value="Enviar"/></td>
</tr>
</table>
</form>
</div>
