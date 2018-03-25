<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/delegado_editado" method="POST" enctype="multipart/form-data">
 <?php foreach ($query['arb']->result() as $fila){?>

 <tr class="tab_cabeza">
  <h2 align="center">Editar delegado</h2>
 </tr>
<tr>
<td>Nombre</td>
<td><input type="text" name="nombre_delegado" value="<?php echo $fila->nombre_delegado;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Telefono</td>
<td><input type="text" name="fono_delegado" value="<?php echo $fila->fono_delegado;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Equipo</td>
<td><input type="text" name="id_equipo" value="<?php echo $fila->nom_equipo;?>"  placeholder="" required /></td>
</tr>
<tr>
<td class="edit_desc">Imagen</td>
<td><IMG SRC="<?php echo base_url(); ?>imagenes/deleg/<?php echo $fila->img_delegado ?>" WIDTH="100" ALT="<?php echo $fila->nombre_delegado ?>"></td>
</tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<tr>
<td><input type="hidden" value="<?php echo $fila->img_delegado ?>" name="imagen_2"/></td>
<td><input type="hidden" value="<?php echo $fila->id_delegado ?>" name="id_delegado"/></td>
<td><input type="submit" value="Enviar"/></td>
</tr>
<tr>
<td><input type="hidden" value="<?php echo $fila->id_equipo ?>" name="id_equipo"/></td>
</tr>
</table>
<?php  }	?>

</form>
</div>
