<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nueva_serie" method="POST" enctype="multipart/form-data">

<tr class="tab_cabeza">
<h2 align="center">Ingresar Nueva Serie</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre_serie" value=""  placeholder="" required /></td>
</tr>
<tr>
<td class="edit_desc">Descripcion</td>
<td><textarea name="desc_serie" cols="40" rows="6" required></textarea></td>
</tr>
<tr>
<td><input type="hidden" value="" name=""/></td>
<td><input type="submit" value="Ingresar Nueva Serie"/></td>
</tr>
</table>
</form>
</div>
