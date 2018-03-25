
<form  action="<?php echo base_url();?>admin/fixture_fecha_creada" method="POST" enctype="multipart/form-data">
  <script type="text/javascript">
  /*$(document).on('change','.sel',function(){
  $(this).siblings().find('option[value="'+$(this).val()+'"]').remove();
});*/
  </script>
</br>
<hr>
</br>
<?php foreach ($query['fech']->result() as $fecha){?>
 <input type="hidden" value="<?php echo $fecha->id_fecha?>" name="id_fecha"/>
 <input type="hidden" value="1" name="status"/>
  <?php $nom_fecha = $fecha->nombre_fecha; }  ?>
  <p>Editar Los Partidos de <?php echo $nom_fecha?></p>
</br></br>
 <div>
	<p>Partido 1</p>
     <select name="id_equipo1" class="sel">
    <option value="" >Selecciona</option>
    <?php foreach ($query['eqi']->result() as $fila){?>
    <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
     <?php }?>
    </select>

  <select name="id_equipo_B1" class="sel">
      <option value="" >Selecciona</option>
      <?php foreach ($query['eqi']->result() as $fila){?>
      <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
    <?php }?>
    </select>

    <select name="id_cancha1" class="can">
    <option value="">Selecciona</option>
    <?php foreach ($query['can']->result() as $fila){?>
    <option value="<?php echo $fila->id_cancha;?>"><?php echo $fila->nombre_cancha;?></option>
    <?php }?>
    </select>
    <hr>

  <p>Partido 2</p>
  <input type="hidden" value="" name=""/>
  <select name="id_equipo2" class="sel">
   <option value="" >Selecciona</option>
   <?php foreach ($query['eqi']->result() as $fila){?>
   <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
    <?php }?>
   </select>

   <select name="id_equipo_B2" class="sel">
     <option value="">Selecciona</option>
     <?php foreach ($query['eqi']->result() as $fila){?>
     <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
   <?php }?>
   </select>

   <select name="id_cancha2" class="can">
   <option value="">Selecciona</option>
   <?php foreach ($query['can']->result() as $fila){?>
   <option value="<?php echo $fila->id_cancha;?>"><?php echo $fila->nombre_cancha;?></option>
   <?php }?>
   </select></td>
 <hr>
 <p>Partido 3</p>
 <input type="hidden" value="" name=""/>
  <select name="id_equipo3" class="sel">
  <option value="" >Selecciona</option>
  <?php foreach ($query['eqi']->result() as $fila){?>
  <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
   <?php }?>
  </select>

  <select name="id_equipo_B3" class="sel">
    <option value="">Selecciona</option>
    <?php foreach ($query['eqi']->result() as $fila){?>
    <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
  <?php }?>
  </select>

  <select name="id_cancha3" class="can">
  <option value="">Selecciona</option>
  <?php foreach ($query['can']->result() as $fila){?>
  <option value="<?php echo $fila->id_cancha;?>"><?php echo $fila->nombre_cancha;?></option>
  <?php }?>
  </select>
<hr>
 <th><p>Partido 4 </p> </th>

<select name="id_equipo4" class="sel">
 <option value="" >Selecciona</option>
 <?php foreach ($query['eqi']->result() as $fila){?>
 <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
  <?php }?>
 </select>

 <select name="id_equipo_B4" class="sel">
   <option value="">Selecciona</option>
   <?php foreach ($query['eqi']->result() as $fila){?>
   <option value="<?php echo $fila->id_equipo;?>"><?php echo $fila->nom_equipo;?></option>
 <?php }?>
 </select>

 <select name="id_cancha4" class="can">
 <option value="">Selecciona</option>
 <?php foreach ($query['can']->result() as $fila){?>
 <option value="<?php echo $fila->id_cancha;?>"><?php echo $fila->nombre_cancha;?></option>
 <?php }?>
 </select>
<hr>
<input type="submit" value="Enviar"/>
</form>


<!--select class="sel">
  <option>Selecciona</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select>

<select class="sel">
  <option>Selecciona</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
</select-->
