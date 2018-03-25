<?php if($this->session->userdata('perfil')== 'editor'): ?>
<!DOCTYPE html>
<HTML lang="es-Es">
<head>
<!--  //////cabeza html  -->
<?php //$this->load->view("admin/cabeza"); ?>
</head>
<!--  ///////BODY Contenedor/////  -->

<BODY>

<div class="contenedor">
<?php //$this->load->view("cortar_palabras"); ?>

<div class="logo">
<p class="bienvenidos"><IMG SRC="<?php echo base_url();?>imagenes/logo_2.png" WIDTH="300" ALT="Logo Mapib">
Bienvenido&nbsp;<?php echo $this->session->userdata('username'); ?>&nbsp;eres el&nbsp;<strong><?php echo $this->session->userdata('perfil'); ?></strong> del Sitio</p>
<p class="bienvenidos"><a href="<?php echo base_url(); ?>login/logout_ci"><b>Cerrar Sesi&oacute;n</b></a></p>
</div>
<!--  //////Menu Lateral/////  -->
<?php// $this->load->view("admin/menu"); ?>

<!--  /////////////Contenido/////  -->
<?php// $this->load->view("admin/$vista"); ?>

<!--  /////////////pie////////  -->
</div>
</BODY>
</HTML>
<?php else:?>
<?php redirect('login');?>
<?php  endif?>
