<div class="cont_editar">
<form  action="<?php echo base_url();?>delegado/nuevo_jugador" method="POST" enctype="multipart/form-data">
<h2 align="center">Nuevo Jugador</h2>
<ul>
  <li> <label for="nombre">Nombre</label><br>
  <input type="text" name="nombre_jug" value="" placeholder="" required /> </li> <br>
  <li> <label for="Apellidos">Apellidos:</label><br>
  <input type="text" name="apellido" value="" placeholder="" required /> </li> <br>
  <li> <label for="rut">Rut:</label><br>
  <input type="text" name="rut" value="" placeholder="" required /> </li> <br>
  <li> <label for="Fecha_Nacimiento">Fecha Nacimiento:</label><br>
  <input type="date" name="fecha_nacimiento" value="" placeholder="" required /> </li> <br>
  <li> <label for="direccion">Dirección:</label><br>
  <input type="text" name="direccion" value="" placeholder="" required /> </li> <br>

  <li> <label for="imagen">Imagen </label></li>
  <li><input type="file" name="imagen" /></li> <br>
  <input type="hidden" name="id_equipo" value="<?php echo $id_eq;?>" placeholder="" required />
</ul>
<input type="submit" value="Enviar"/>
</form>
</div>
