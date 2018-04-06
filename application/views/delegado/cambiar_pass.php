<div class="col-md-9">
<script type="text/javascript">
function comprobarClave(){
	clave1 = document.f1.clave1.value
	clave2 = document.f1.clave2.value

	if (clave1 != clave2)
		 alert("Las dos claves NO son iguales...\nRealizaríamos las acciones del caso positivo")
	//else
		// alert("Las dos claves son distintas...\nRealizaríamos las acciones del caso negativo")
}
</script>
<form name="f1" action="<?php echo base_url();?>delegado/pass_cambiada" method="POST" enctype="multipart/form-data">
	<?php
	 foreach ($query['user']->result() as $row);
	 //print_r($row);
	 {?>
	<ul>
		<li> <h2 align="center"><strong><?php echo $row->username?></strong> Quiere Modificar su Contraseña???</h2> </li>

		<li> <label for="clave1">Nueva Contraseña</label><br>
	  <input type="text" name="clave1" value="" placeholder="" required /> </li> <br>
	  <li> <label for="clave2">Repita Contraseña</label><br>
	  <input type="text" name="clave2" value="" placeholder="" required /> </li> <br>
		<input type="hidden" value="" name="imagen_2"/>
		<input type="hidden" value="<?php echo $row->id?>" name="id"/>
	</ul>
<?php }; ?>
<input type="submit" onClick="comprobarClave()" value="Enviar"/>
</form>
</div>
