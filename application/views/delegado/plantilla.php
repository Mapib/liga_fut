<?php if($this->session->userdata('perfil') == 'Delegado'): ?>
<!DOCTYPE html>
<HTML lang="es-Es">
<head>
<!--  //////cabeza html  -->
<?php $this->load->view('admin/head'); ?>
<title><?php echo $title; ?></title>
</head>
<!--  ///////BODY Contenedor/////  -->

<BODY>
<?php foreach ($query['del']->result() as $row){;
///print_r($row);
?>
<header>
  <div class="container row">
    <p class="col-md-6"><IMG SRC="<?php echo base_url();?>imagenes/logo_1.png" WIDTH="100" ALT="Logo Mapib"></p>
    <p class="col-md-6">Bienvenido&nbsp;<?php echo $row->username; ?>&nbsp;eres el&nbsp;<strong><?php echo $row->perfil; ?></strong> del Sitio</p>
  </div>
</header>
<div class="container">
<section class="main row">
  <!--Menu Lateral-->
<?php $this->load->view('delegado/menu'); ?>

<!--///////Contenido--->
<?php $this->load->view('delegado/'.$vista); ?>

<?php } ?>
</div>
<script src="<?php echo base_url(); ?>bootstrap/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/boottsrap.min.js"></script>
</BODY>
</HTML>
<?php else:?>
<?php redirect('login');?>
<?php  endif?>
