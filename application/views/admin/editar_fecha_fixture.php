
<form  action="<?php echo base_url();?>admin/fixture_fecha_editada" method="POST" enctype="multipart/form-data">
</br>
<hr>
<script type="text/javascript">
 $(document).on('change','.sel',function(){
  $(this).siblings().find('option[value="'+$(this).val()+'"]').remove();
});
</script>
</br>
<?php foreach ($query['fix']->result() as $fecha){
//print_r($fecha);
$a='1';
$nom_fecha=$fecha->nombre_fecha; }
  ?>
  <p>Editar Los Partidos de <?php echo $nom_fecha?></p>
 <table>
<?php foreach ($query['fix']->result() as $fecha){?>
   <tr>
	 	<th><p>Partido <?php echo $fecha->id_fixture; ?></p> </th>
	 </tr>
   <input type="hidden" value="<?php echo $fecha->id_fixture;?>" name="id_fixture <?php echo $a;?>"/>
   <tr>
     <td>Local</td>
     <td>V/S</td>
     <td>Visita</td>
     <td>Cancha</td>
  </tr>
  <tr>
    <td><select name="id_equipo<?php echo $a?>" class="sel">
    <?php foreach ($query['eqi']->result() as $fila){
    if ($fecha->id_equipo==$fila->id_equipo) {?>
    <option  value="<?php echo $fila->id_equipo;?>" selected><?php echo $fila->nom_equipo;?></option>
    <?php }else{ ?>
      <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
    <?php }?>
     <?php }?>
    </select>
    </td>
    <td></td>
    <td><select name="id_equipo_B<?php echo $a?>" class="sel">
      <?php foreach ($query['eqi']->result() as $fila){
    //print_r($fila);
      if ($fila->id_equipo==$fecha->id_equipo_b) {?>
      <option value="<?php echo $fila->id_equipo;?>" selected><?php echo $fila->nom_equipo;?></option>
      <?php }else{ ?>
        <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
      <?php }?>
    <?php }?>
    </select>
</td>
    <td><select name="id_cancha<?php echo $a?>" class="sel">
      <?php foreach ($query['can']->result() as $fila){
        if ($fila->id_cancha==$fecha->id_cancha) {?>
      <option value="<?php echo $fecha->id_cancha;?>"selected><?php echo $fila->nombre_cancha;?></option>
      <?php }else{ ?>
        <option value="<?php echo $fila->id_cancha;?>"><?php echo $fila->nombre_cancha;?></option>
      <?php }?>
    <?php }?>
    </select></td>
  </tr>
  <?php $a++; }?>
  <hr>
</table>
<input type="submit" value="Enviar"/>
</form>
