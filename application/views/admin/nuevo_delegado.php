<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nuevo_delegado" method="POST" enctype="multipart/form-data">
 <tr class="tab_cabeza">
  <h2 align="center">Ingrese Delegado</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre_delegado" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Telefono</td>
<td><input type="text" name="fono_delegado" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Equipo</td>
<td><input type="text" name="id_equipo" value=""  placeholder="" required /></td>
</tr>
<tr>
<td class="edit_desc">Imagen</td>
<td></td>
</tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td><input type="hidden" value="" name="imagen_2"/></td>
<td><input type="hidden" value="" name="id_delegado"/></td>
<td><input type="submit" value="Enviar"/></td>
</tr>
</table>


</form>
</div>
