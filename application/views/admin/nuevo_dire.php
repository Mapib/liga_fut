<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nuevo_dire" method="POST" enctype="multipart/form-data">
<tr class="tab_cabeza">
  <h2 align="center">Ingresar Integrante Diretiva</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Cargo</td>
<td><input type="text" name="cargo" value="" placeholder="" required /></td>
</tr>
<tr>
<td>Contenido</td>
<td><textarea name="descripcion" cols="40" rows="6" required></textarea></td>
</tr>
<tr>
<td>Imagen</td>
<td><input type="file" name="imagen" style="color: transparent"/></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td><input type="hidden" value="" name=""/></td>
<td><input type="hidden" value="" name=""/></td>
<td><input type="submit" value="Ingresar Integrante"/></td>
</tr>
</table>
</form>
</div>
