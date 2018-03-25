<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nueva_noti" method="POST" enctype="multipart/form-data">
 <tr class="tab_cabeza">
<h2 align="center">Ingrese Nueva Noticia</h2>
 </tr>
<tr>
<td>Titulo</td>
<td><input type="text" name="titulo" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Sub Titulo</td>
<td><input type="text" name="sub_titulo" value="" placeholder="" required /></td>
</tr>
<tr>
<td class="edit_desc">Contenido</td>
<td><textarea name="contenido" cols="40" rows="6" required></textarea></td>
</tr>
<tr>
<td class="edit_desc">Imagen</td>
<td><input type="file" name="imagen" /></td>
<td></td>
</tr>
<tr>
<td><input type="hidden" value="" name=""/></td>
<td><input type="hidden" value="" name=""/></td>
<td><input type="submit" value="Enviar"/></td>
</tr>
</table>
</form>
</div>
