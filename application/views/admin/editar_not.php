
<div class="">
<table>
<form  action="<?php echo base_url();?>admin/noticia_editada" method="POST" enctype="multipart/form-data">
 <?php foreach ($query['noti']->result() as $fila){?>

 <tr class="tab_cabeza">
  <h2 align="center">Editar Noticia</h2>
 </tr>
<tr>
<td>Titulo</td>
<td><input class="form-control" type="text" name="titulo" value="<?php echo $fila->titulo;?>"  placeholder="" required /></td>
</tr>
<tr>
<td>Sub Titulo</td>
<td><input class="form-control" type="text" name="sub_titulo" value="<?php echo $fila->sub_titulo;?>" placeholder="" required /></td>
</tr>
<tr>
<td class="edit_desc">Contenido</td>
<td><textarea class="form-control" name="contenido"  required><?php echo $fila->contenido;?></textarea></td>
</tr>
<tr>
<td class="edit_desc">Imagen</td>
<td><IMG SRC="<?php echo base_url(); ?>imagenes/noti/<?php echo $fila->imagen ?>" WIDTH="50" ALT="<?php echo $fila->titulo ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="file" name="imagen" /></td>
</tr>
<td class="informe_1"><input type="hidden" value="<?php echo $fila->id_noticia ?>" name="id_noticia"/></td>
<td><input class="btn-primary" type="submit" value="Enviar"/></td>
<td><input type="hidden" value="<?php echo $fila->imagen ?>" name="imagen_2"/></td>
</tr>
</table>
<?php }	?>

</form>
</div>
<br><br><br>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Mapib Soluciones Web<strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>
