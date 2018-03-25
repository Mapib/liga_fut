<div class="col-md-9">
  <h3 class="container">Listado de Jugadores</h3>
  <p><a href="<?php echo base_url(); ?>admin/nuevo_jugador/">Ingresar nuevo Jugador</a></p>
    <table class="table table-striped">
      <tr>
        <th>&nbsp;</th>
        <th>Nombre</th>
        <th>Equipo</th>
        <th>Fecha Nac</th>
        <th>Foto</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
      <?php $a=1;
    foreach ($query['jug']->result() as $fila){
      ?>
      <tr>
       <td><?php echo $a;?></td>
       <td><a href="<?php echo base_url();?>admin/datos_del_jugador/<?php echo $fila->id_jugador?>"><?php echo $fila->nombre_jug; ?>&nbsp;<?php echo $fila->apellido; ?></a></td>
       <td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia ?>" WIDTH="50" ALT="<?php echo $fila->nom_equipo?>"></td>
       <td><?php echo $fila->fecha_nacimiento; ?></td>
       <td><IMG SRC="<?php echo base_url(); ?>imagenes/jugadores/<?php echo $fila->foto_jug?>" WIDTH="50" ALT="<?php echo $fila->nombre_jug ?>"</td>
       <td class="icono"><a href="<?php echo base_url(); ?>admin/editar_jug/<?php echo $fila->id_jugador?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/editar.png" WIDTH="30" ALT="imagen editar"></a></td>
 	     <td class="icono"><a onclick="return confirmation()" href="<?php echo base_url(); ?>admin/eliminar_jug/<?php echo $fila->id_jugador?>"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/delete.png" WIDTH="30" ALT="imagen eliminar"></a></td>
      </tr>
      <?php $a++; } ?>
    </table>

<hr>

</div>
