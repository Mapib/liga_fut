<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/fecha_editada" method="POST" enctype="multipart/form-data">
<tr class="tab_cabeza">
<?php foreach ($query['fech']->result() as $fila){ ?>
 <h2 align="center">Actualizar Fecha</h2>
 </tr>
<tr>
<td>Fecha</td>
<td> <input type="date" name="fecha_partido" id="datepicker" value="<?php echo $fila->fecha;?>" />

</td>
</tr>
<tr>
<td>Nombre de Fecha</td>
<td><input type="text" name="nombre_fecha" value="<?php echo $fila->nombre_fecha;?>"  placeholder="" required /></td>
</tr>

<tr>
<td>Status</td>
<td><select name="status" class="sel">
  <option>Selecciona</option>
  <option name="status" value="0">Pendiente</option>
  <option name="status" value="1">Por Jugar</option>
  <option name="status" value="2">Jugada</option>
</select>
</td>
</tr>
<tr>
<td><input type="submit" value="Editar Fecha"/></td>
<input type="hidden" value="<?php echo $fila->id_fecha;?>" name="id_fecha"/>
<!--td><input type="hidden" value="" name="imagen_2"/></td>
<td><input type="hidden" value="" name="id_arbitro"/></td-->
</tr>
<?php }?>

</table>
</form>
</div>
