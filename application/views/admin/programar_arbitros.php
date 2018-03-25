
<div class="col-md-10">
  <h3 class="col-md-6">Programar Arbitros</h3>
	<hr>
	<table class="table table-striped">
<form class="" action="<?php echo base_url(); ?>/admin/arbitros_programados" method="post">
	 <tr>
	 <td></td>
	 <td></td>
	 <td>Equipos Local</td>
	 <td> </td>
	 <td>Equipos visita</td>
	 <td>Cancha</td>
	 <td>Dirección</td>
	 <!--td>eliminar</td-->
	</tr>
	<?php
	$a=1;
	$num_fila = 0;
	foreach ($query['fix']->result() as $fila){
		//print_r($fila);?>
    <input type="hidden" name="id_fixture" value="<?php echo $fila->id_fixture?>">

	<tr>
    <td></td>
    <td>Inicio 09:00 hrs.-</td>
	  <td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia ?>" WIDTH="50"/><br><?php echo $fila->nom_equipo?></td>
	  <td>V/S</td>
	  <td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->img_2?>" WIDTH="50"/><br><?php echo $fila->viky?></td>
	  <td><?php echo $fila->nombre_cancha?></td>
		<td><?php echo $fila->direc_cancha?></td>
  </tr>
<?php $num_fila++ ; ?>
<?php }?>
<input type="hidden" name="id_serie1" value="">
<tr>
  <td></td>
  <?php foreach ($query['ser']->result() as $series){  ?>
<input type="hidden" name="id_serie<?php echo $a;?>" value="<?php echo $series->id_serie;?>">
    <td>Arbitro Serie <?php echo $series->nombre_serie;?><br><select name="id_arbitro<?php echo $a;?>" class="sel">
    <?php foreach ($query['ar']->result() as $fila){?>
    <option value="<?php echo $fila->id_arbitro;?>"><?php echo $fila->nom_arbitro;?></option>
     <?php }?>
    </select>
    <hr>
  </td>
  <?php $a++; } ?>
  </tr>
  <tr>
    <td></td>
    <td> <input type="submit" name="" value="Enviar"> </td>
  </tr>
  </form>
</table>
<hr>
</div>
