<?php if($this->session->userdata('perfil') == 'Delegado'): ?>
<!DOCTYPE html>
<HTML lang="es-Es">
<head>
<!--  //////cabeza html  -->
<title><?php echo $title; ?></title>
</head>
<!--  ///////BODY Contenedor/////  -->

<BODY>
<?php foreach ($query['del']->result() as $row){;
///print_r($row);
?>
<div class="contenedor">

<div class="logo">
<p class="bienvenidos"><IMG SRC="<?php echo base_url();?>imagenes/logo_2.png" WIDTH="300" ALT="Logo Mapib"></p>
<p>Bienvenido&nbsp;<?php echo $row->username; ?>&nbsp;eres el&nbsp;<strong><?php echo $row->perfil; ?></strong> del Equipo <strong><?php echo $row->nom_equipo; ?></strong></p>
</div>
<div class="">
  <?php foreach ($query['jug']->result() as $fila){
    //print_r($row);;?>
<?php echo $fila->nombre_jug; ?></br>
<?php echo $fila->apellido; ?></br>
<?php echo $fila->fecha_nacimiento; ?></br>
<?php echo $fila->rut; ?></br>
<?php echo $fila->direccion; ?></br>
<hr>
<?php } ?>
</div>
<!--  //////Menu Lateral/////  -->

<!--  /////////////Contenido/////  -->

<!--  /////////////pie////////  -->
<?php } ?>
</div>
<p class="bienvenidos"><a href="<?php echo base_url(); ?>login/logout_ci"><b>Cerrar Sesi&oacute;n</b></a></p>
</BODY>
</HTML>
<?php else:?>
<?php redirect('login');?>
<?php  endif?>
