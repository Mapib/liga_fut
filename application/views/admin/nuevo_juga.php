<div class="cont_editar">
<table class="editar">
<form  action="<?php echo base_url();?>admin/nuevo_jugador" method="POST" enctype="multipart/form-data">
 <tr class="tab_cabeza">
<h2 align="center">Nuevo Jugador</h2>
 </tr>
<ul>
  <li> <label for="nombre">Nombre</label>
  <input type="text" name="nombre_jug" value="" placeholder="" required /> </li> <br>
  <li> <label for="Apellidos">Apellidos:</label>
  <input type="text" name="apellido" value="" placeholder="" required /> </li> <br>
  <li> <label for="rut">Rut:</label>
  <input type="text" name="rut" value="" placeholder="" required /> </li> <br>
  <li> <label for="Fecha_Nacimiento">Fecha Nacimiento:</label>
  <input type="date" name="fecha_nacimiento" value="" placeholder="" required /> </li> <br>
  <li> <label for="direccion">Dirección:</label>
  <input type="text" name="direccion" value="" placeholder="" required /> </li> <br>

  <li> <label for="imagen">Imagen </label></li>
  <li><input type="file" name="imagen" /></li> <br>
</ul>
</form>
</div>
