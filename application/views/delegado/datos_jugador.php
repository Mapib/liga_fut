<div class="col-md-9">
  <h3 class="container">Estadisticas del Jugador</h3>
  <p></p>
    <table class="table table-striped">
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Equipo</th>
        <th>Foto</th>
        <th>Fecha Nacimiento</th>
        <th>Rut</th>
        <th>Direccion</th>
      </tr>
      <?php $a=1;
    foreach ($query['jug']->result() as $fila){
      ?>
      <tr>
       <td><?php echo $fila->nombre_jug; ?></td>
       <td><?php echo $fila->apellido; ?></td>
       <td><IMG SRC="<?php echo base_url(); ?>imagenes/club/<?php echo $fila->insignia ?>" WIDTH="50" ALT="<?php echo $fila->nom_equipo?>"></td>
       <td><IMG SRC="<?php echo base_url(); ?>imagenes/jugadores/<?php echo $fila->foto_jug?>" WIDTH="50" ALT="<?php echo $fila->nombre_jug ?>"</td>
       <td><?php echo $fila->fecha_nacimiento;?></td>
       <td><?php echo $fila->rut;?></td>
       <td><?php echo $fila->direccion;?></td>
      </tr>
      <tr>
        <td>Goles Serie A</td>
        <td>Goles Serie B</td>
        <td>Goles Serie C</td>
        <td>Goles Serie D</td>
        <td>Tarjetas Amarillas</td>
        <td>Tarjetas Rojas</td>
        <td><a href="<?php echo base_url(); ?>admin/ingresar_goles/<?php echo $fila->id_jugador;?>">Ingresar Goles</a></td>
      </tr>
      <tr>
        <td><?php //echo $fila->; ?></td>
        <td><?php //echo $fila->; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <?php $a++; } ?>
    </table>

<hr>

</div>
