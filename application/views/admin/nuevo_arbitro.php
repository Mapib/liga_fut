<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nuevo_arbitro" method="POST" enctype="multipart/form-data">
<tr class="tab_cabeza">
  <h2 align="center">Ingresar Arbitro</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nom_arbitro" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Fecha de Nac</td>
<td><input type="date" name="fecha_nac" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Telefono</td>
<td><input type="text" name="telefono" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Descripcion</td>
<td><textarea name="descripcion" cols="40" rows="6" required></textarea></td>
</tr>
<tr>
<td>Imagen</td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td><input type="hidden" value="" name="imagen_2"/></td>
<td><input type="hidden" value="" name="id_arbitro"/></td>
<td><input type="submit" value="Ingresar Nuevo Arbitro"/></td>
</tr>
</table>
</form>
</div>
	
