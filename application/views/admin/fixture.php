
<div class="col-md-10">
  <h3 class="col-md-6">Fixture Torneo</h3>
	<p class="col-md-6"><a href="<?php echo base_url(); ?>admin/fixture_fecha/">Ingresar Fixture de Fecha</a></p>
	<hr>
	<?php foreach ($query['fech']->result() as $fech){ ?>
		<div class="row">
			<p class="col-md-6"><?php echo $fech->nombre_fecha.'<br>'.$fech->fecha?></p>
			<?php if ($fech->status=='2') {?>
			<p class="col-md-6">Fecha Jugada</p><?php }?>
			<?php if ($fech->status=='1') {?>
			<p class="col-md-6"><a href="<?php echo base_url(); ?>admin/editar_fecha_fixture/<?php echo $fech->id_fecha?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar">Editar fixture <?php echo $fech->nombre_fecha?> </a></p>	<?php } ?>
			<?php if ($fech->status=='0') {?>
			<p class="col-md-6"><a href="<?php echo base_url(); ?>admin/crear_fecha_fixture/<?php echo $fech->id_fecha?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar">Crear fixture Fecha <?php echo $fech->nombre_fecha?> </a></p>	<?php } ?>
		</div>
		<br>
	<table class="table table-striped">
	 <tr>
	 <td></td>
	 <td></td>
	 <td>Equipos Local</td>
	 <td> </td>
	 <td>Equipos visita</td>
	 <td>Cancha</td>
	 <td>Dirección</td>
	 <td>prog Arb</td>
	 <!--td>eliminar</td-->
	</tr>
	<?php
	$a=1;
	$num_fila = 0;
	foreach ($query['fix']->result() as $fila){
		if ($fila->id_fecha==$fech->id_fecha) {?>
	<tr>
    <td></td>
    <td>Inicio 09:00 hrs.-</td>
	  <td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia ?>" WIDTH="50"/><br><?php echo $fila->nom_equipo?></td>
	  <td>V/S</td>
	  <td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->img_2?>" WIDTH="50"/><br><?php echo $fila->viky?></td>
	  <td><?php echo $fila->nombre_cancha?></td>
		<td><?php echo $fila->direc_cancha?></td>
		<td><?php if ($fila->arb_prog=='0') { ?>
		  <a class='inline' href="<?php echo base_url(); ?>admin/programar_arbitro/<?php echo $fila->id_fixture ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/pito.png" WIDTH="30" ALT="pito"></a></td><?php } ?>
        <?php if ($fila->arb_prog=='1') { ?>
          <IMG SRC="<?php echo base_url(); ?>imagenes/admin/visto_bueno.png" WIDTH="30" ALT="pito"></td><?php } ?>
  	 <!--td class="tab_productos"><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_informe/<?php echo $fila->id_resultado ?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td-->
	</tr>
  <?php $num_fila++ ; ?>
  <?php }?>
	<?php } ?>
</table>
<hr>
<?php }; ?>
<div style='display:none'>
<div id="inline_content">
<?php $this->load->view('admin/head'); ?>
</div>
</div>
</div>
