
<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/equipo_editado" method="POST" enctype="multipart/form-data">
 <?php foreach ($query['eqi']->result() as $fila){?>

 <tr class="tab_cabeza">
<h2 align="center">Editar Equipo</h2>
 </tr>
<tr>
<td>Nombre Equipo</td>
<td><input type="text" name="nom_equipo" value="<?php echo $fila->nom_equipo;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Direción</td>
<td><input type="text" name="direc_equipo" value="<?php echo $fila->direc_equipo;?>"  placeholder="" required /></td>
</tr>
<tr>
<!--td>Delegado</td>
<td><input type="text" name="id_delegado" value="<?php echo $fila->id_delegado;?>"  placeholder="" required /></td-->
</tr>
<tr>
<td>Cancha</td>
<td><input type="text" name="puntos" value="<?php echo $fila->id_cancha;?>"  placeholder="" required /></td>
</tr>
<tr>
<td></td>
<td><input type="text" name="puntos" value="<?php ?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Insignia</td>
<td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia?>" WIDTH="50" ALT="<?php echo $fila->nom_equipo ?>"></td>
</tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td class="busca"><input type="hidden" value="<?php echo $fila->id_equipo ?>" name="id_equipo"/></td>
<td><input type="hidden" value="<?php echo $fila->insignia ?>" name="imagen_2"/></td>
<td><input type="submit" value="Enviar"/></td>
</tr>
</table>
<?php }	?>
</form>
</div>
