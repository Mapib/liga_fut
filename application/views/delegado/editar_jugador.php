<div class="col-md-9">

<form  action="<?php echo base_url();?>admin/jugador_editado" method="POST" enctype="multipart/form-data">
	<?php
	 foreach ($query['jug']->result() as $row);
	 //echo $row->nombre;
	 {?>
	<ul>
		<li> <h2 align="center">Modifique datos del Jugador</h2> </li>

		<li> <label for="nombre">Nombre</label>
		<input type="text" name="nombre_jug" value="<?php echo $row->nombre_jug?>" placeholder="" required /> </li> <br>
		<li> <label for="Apellidos">Apellidos:</label>
		<input type="text" name="apellido" value="<?php echo $row->apellido?>" placeholder="" required /> </li> <br>
		<li> <label for="rut">Rut:</label>
		<input type="text" name="rut" value="<?php echo $row->rut?>" placeholder="" required /> </li> <br>
		<li> <label for="Fecha_Nacimiento">Fecha Nacimiento:</label>
		<input type="date" name="fecha_nacimiento" value="<?php echo $row->fecha_nacimiento;?>" placeholder="" required /></li><br>
		<li> <label for="direccion">Dirección:</label>
		<input type="text" name="direccion" value="<?php echo $row->direccion?>" placeholder="" required /> </li> <br>

		<li> <label for="imagen">Imagen </label>
		<IMG SRC="<?php echo base_url(); ?>imagenes/jugadores/<?php echo $row->foto_jug?>" WIDTH="50" ALT="<?php echo $row->nombre_jug ?>"></li>
		<li><input type="file" name="imagen" /></li> <br>

		<input type="hidden" value="<?php echo $row->foto_jug ?>" name="imagen_2"/>
		<input type="hidden" value="<?php echo $row->id_jugador ?>" name="id_jugador"/>
	</ul>
<?php }; ?>
<input type="submit" value="Enviar"/>
</form>
</div>
