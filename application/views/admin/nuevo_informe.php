<?php $this->load->view("admin/cabeza"); ?>
<?php if($this->session->userdata('username')): ?>
<body>
<?php $this->load->view("admin/part_roja"); ?>
<div class="buscador">
<ul>
<li id="logo"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/rect4624.png"  WIDTH="180"ALT="Logo Liga"></li>
<li id="iconoMenuDesplegable"><IMG SRC="<?php echo base_url(); ?>imagenes/admin/rect4624.png"  WIDTH="180"ALT="Logo Liga"></li>
<!--li>Liga Futbol</br>Hugo Gonzalez </li-->
<li>&nbsp; &#160;</li>
<!--li><a href="<?php echo base_url(); ?>admin/nueva_noti/">Ingresar nueva Noticia</a></li>
<li class="busca"><form id="form" method="GET" action="<?php echo base_url(); ?>admin/buscar_noticia">
		<input type="text" name="query" id="query" />
		<input type="submit" name="" id="" value="Buscar" />
	</form></li-->
<li>&nbsp;  &#160;</li>

	
</ul>
</div>
<?php $this->load->view("admin/menu"); ?>
<div class="cont_informes">
<form name="f1"> 
<select name=pais onchange="cambia_provincia()"> 
<option value="0" selected>Seleccione... 
<option value="1">España 
<option value="2">Argentina 
<option value="3">Colombia 
<option value="4">Francia 
</select>
<script>
/**/
var provincias_1=new Array("-"," <?php foreach ($query['fe']->result() as $fila){
echo $fila->fecha_partido; echo '",'; }?>"...") 
var provincias_2=new Array("-","Salta","San Juan","San Luis","La Rioja","La Pampa","...") 
var provincias_3=new Array("-","Cali","Santamarta","Medellin","Cartagena","...") 
var provincias_4=new Array("-","Aisne","Creuse","Dordogne","Essonne","Gironde ","...")
function cambia_provincia(){ 
   	//tomo el valor del select del pais elegido 
   	var pais 
   	pais = document.f1.pais[document.f1.pais.selectedIndex].value 
   	//miro a ver si el pais está definido 
   	if (pais != 0) { 
      	//si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
      	//selecciono el array de provincia adecuado 
      	mis_provincias=eval("provincias_" + pais) 
      	//calculo el numero de provincias 
      	num_provincias = mis_provincias.length 
      	//marco el número de provincias en el select 
      	document.f1.provincia.length = num_provincias 
      	//para cada provincia del array, la introduzco en el select 
      	for(i=0;i<num_provincias;i++){ 
         	document.f1.provincia.options[i].value=mis_provincias[i] 
         	document.f1.provincia.options[i].text=mis_provincias[i] 
      	}	
   	}else{ 
      	//si no había provincia seleccionada, elimino las provincias del select 
      	document.f1.provincia.length = 1 
      	//coloco un guión en la única opción que he dejado 
      	document.f1.provincia.options[0].value = "-" 
      	document.f1.provincia.options[0].text = "-" 
   	} 
   	//marco como seleccionada la opción primera de provincia 
   	document.f1.provincia.options[0].selected = true 
}
</script>
<select name=provincia> 
<option value="-">- 
</select> 
</form>


<table class="editar">
<form  action="<?php echo base_url();?>admin/nuevo_inform" method="POST" enctype="multipart/form-data"> 
 <tr colspan="4" class="tab_cabeza">
<h2 align="center">Ingrese Nuevo Informe</h2>
 </tr>
<tr>
<td>Fecha</td>
<td> <?php foreach ($query['fe']->result() as $fila){
echo $fila->fecha_partido; }?>	
</td>
<td>Arbitro</td>
<td> <select><?php foreach ($query['ar']->result() as $fila){ ?>	
  <option value="<?php echo $fila->id_arbitro;?>"><?php echo $fila->nom_arbitro;?></option>
 <?php }?>
</select> </td>
</tr>
<tr>
<td>Serie</td>
<td> <select><?php foreach ($query['se']->result() as $fila){ ?>	
  <option value="<?php echo $fila->id_serie;?>"><?php echo $fila->nombre_serie;?></option>
 <?php }?>
</select> </td>

</tr>
<td>Equipo Local</td>
<td><select>
  <option value="1">equipo_1</option>
  <option value="2">equipo_2</option>
  <option value="3">equipo_3</option>
  <option value="4">equipo_4</option>
</select></td>
<td>Equipo Visita</td>
<td><select>
  <option value="1">equipo_1</option>
  <option value="2">equipo_2</option>
  <option value="3">equipo_3</option>
  <option value="4">equipo_4</option>
</select></td>
</tr>
<tr>
<td>Gol 1</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Gol 1</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Gol 2</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Gol 2</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Gol 3</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Gol 3</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Gol 4</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Gol 4</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Gol 5</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Gol 5</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<!--///////////////////////////////amarillas///////////////////////////////////////////////////-->
<tr>
<td>Amarilla 1</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Amarilla 1</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Amarilla 2</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Amarilla 2</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Amarilla 3</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Amarilla 3</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Amarilla 4</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Amarilla 4</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>
<tr>
<td>Amarilla 5</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
<td>Amarilla 5</td>
<td><select>
  <option value="1">jugador_1</option>
  <option value="2">jugador_2</option>
  <option value="3">jugador_3</option>
  <option value="4">jugador_4</option>
</select></td>
</tr>


<tr>
<td class="edit_desc">Contenido</td>
<td colspan="3"><textarea name="contenido" cols="40" rows="6" required></textarea></td>
</tr>
<tr>
<td class="edit_desc">Imagen</td>
<td><input type="file" name="imagen" /></td>
<td></td>
</tr>
<tr>
<td><input type="hidden" value="" name=""/></td>
<td><input type="hidden" value="" name=""/></td>
<td><input type="submit" value="Ingresar Nuevo Informe"/></td>
</tr>

</table>
</form>
</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Mapib Soluciones Web<strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>
<?php else:?>
<?php redirect('login');?>
<?php  endif?>

</body>
</html>
