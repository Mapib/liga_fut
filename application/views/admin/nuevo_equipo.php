<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nuevo_equipo" method="POST" enctype="multipart/form-data">

 <tr class="tab_cabeza">
<h2 align="center">Ingresar Nuevo Equipo</h2>
 </tr>
<tr>
<td>Nombre Equipo</td>
<td><input type="text" name="nom_equipo" value=""  placeholder="" required /></td>
</tr>
<tr>
<td>Puntos</td>
<td><input type="text" name="direc_equipo" value=""  placeholder="" required /></td>
</tr>

<tr>
<td class="edit_desc">Imagen</td>
<td><input type="file" name="imagen" /></td>

</tr>
<td></td>

</tr>
<tr>
<td><input type="hidden" value="" name=""/></td>
<td><input type="hidden" value="" name=""/></td>
<td><input type="submit" value="Ingresar Equipo"/></td>
</tr>
</table>
</form>
</div>
