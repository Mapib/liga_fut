
<?php $this->load->view("admin/cabeza"); ?>
<?php if($this->session->userdata('username')): ?>
<body>
<?php $this->load->view("admin/part_roja"); ?>
<div class="buscador">
<ul>
<li id="logo"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/rect4624.png"  WIDTH="180"ALT="Logo Liga"></li>
<li id="iconoMenuDesplegable"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/rect4624.png"  WIDTH="180"ALT="Logo Liga"></li>
<!--li>Liga Futbol</br>Hugo Gonzalez </li-->
<li></li>

<li class="">&nbsp;  &#160;</li>

</ul>
</div>
<?php $this->load->view("admin/menu"); ?><br> <br> 

<div class="cont_editar">

<div class="ventana_A">
<?php $this->load->view("admin/detalle_A"); ?>
</div>
 <div class="ventana_B">
<?php $this->load->view("admin/detalle_B"); ?>
</div>
 <div class="ventana_C">
<?php $this->load->view("admin/detalle_C"); ?>
</div>
 <div class="ventana_D">
<?php $this->load->view("admin/detalle_D"); ?>
</div>
<table class="edit_partido">
<form  action="<?php echo base_url();?>admin/arbitros_programados" method="POST" enctype="multipart/form-data"> 
<tr class="cabe">
  <h2 align="center">Editar Resultados</h2>
 </tr>
 <tr >
  <td colspan="4">&nbsp;  &#160;</td>
</tr>
<tr >
  <td colspan="4">&nbsp;  &#160;</td>
</tr>
  <?php foreach ($query['re']->result() as $fecha){ ?>	
 <input type="hidden" value="<?php  echo $fecha->id_resultado;?>" name="id_resultado"/>
<input type="hidden" value="2" name="estado"/>
<tr>
 <td>&nbsp;  &#160;</td>
<td colspan="2">Fecha</td>
<td><?php  echo $fecha->fecha_partido;?></td>
</tr>
<tr>
<td>&nbsp;  &#160;</td>
<td colspan="2">Nombre de Fecha</td>
<td colspan="2"><?php  echo $fecha->nombre_fecha;?></td>
</tr>
<tr>
<td colspan="3"><?php  echo $fecha->nom_equipo;?></td>
<td>V/S</td>
<td colspan="2"><?php  echo $fecha->viky;?></td>
</tr>
<tr >
  <td colspan="4">&nbsp;  &#160;</td>
</tr>
<tr>
<td>Serie</td>
<td>Arbitro</td>
<td>Informe de Arbitro</td>
<td>&nbsp;  &#160;</td>
<td>Goles Local</td>
<td>Goles Visita</td>
</tr>
<tr>
 <td valign="middle" class="imagen">Serie A</td>
 <td valign="middle" class="imagen"><?php  echo $fecha->arb_1;?></td>	
<td colspan="2"><textarea rows="4" cols="30" name="informe_A">
</textarea> </td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_1A"/></td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_2A"/></td>
 <td valign="middle" class="imagen"><a id="uno" href="javascript:openventana_A();">Detalles Goles</a></td>

</tr>
<tr>
 <td valign="middle" class="imagen">Serie B</td>
 <td valign="middle" class="imagen"><?php  echo $fecha->arb_2;?></td>  
<td colspan="2"><textarea rows="4" cols="30" name="informe_B">
</textarea></td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_1B"/></td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_2B"/></td>
 <td valign="middle" class="imagen"><a id="dos" href="javascript:openventana_B();">Detalles Goles</a></td>
</tr>
<tr>
 <td valign="middle" class="imagen">Serie C</td>
 <td valign="middle" class="imagen"><?php  echo $fecha->arb_3;?></td>  
<td colspan="2"><textarea rows="4" cols="30" name="informe_C">
</textarea> </td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_1C"/></td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_2C"/></td>
 <td valign="middle" class="imagen"><a id="tres" href="javascript:openventana_C();">Detalles Goles</a></td>
</tr>
<tr>
 <td valign="middle" class="imagen">Serie D</td>
 <td valign="middle" class="imagen"><?php  echo $fecha->arb_4;?></td>  
<td colspan="2"><textarea rows="4" cols="30" name="informe_D">
</textarea> </td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_1D"/></td>
 <td valign="middle" class="imagen"><input type="text" value="" name="goles_2D"/></td>
<td valign="middle" class="imagen"><a id="cuatro" href="javascript:openventana_D();">Detalles Goles</a></td>
</tr>

<!--td></td>

<tr class="ventana_1">
<td>Goles A</td>
<td>Amarillas A</td>
<td>Rojas A</td>
<td>Goles B</td>
<td>Amarillas B</td>
<td>Rojas B</td>
</tr>

<td><input type="hidden" value="" name="id_arbitro"/></td>
<td></td-->
<tr>
<td>&nbsp;  &#160;</td>
<td>&nbsp;  &#160;</td>
<td><input id="boton_1" type="submit" value="Actualizar Datos"/></td>
</tr>
	<?php } ?>	
  
</table>

</form>
</div>

<br><br><br>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Mapib Soluciones Web<strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>
<?php else:?>
<?php redirect('login');?>
<?php  endif?>

</body>
</html>