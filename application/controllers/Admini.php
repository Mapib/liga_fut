<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 function index()
	{
  $this->load->helper('url');
	$this->load->model('Admin_model');
	$data = $this->Admin_model->productos();
	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "productos";
	//$datos_vista['title'] = "Admin|Productos";
	$this->load->view('admin/plantilla',$datos_vista);
	}
  function ciclismo()
 	{
  $this->load->helper('url');
 	$this->load->model('Admin_model');
 	$data = $this->Admin_model->ciclismo();
 	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "productos";
 	$datos_vista['title'] = "Admin|Productos";
 	$this->load->view('admin/plantilla',$datos_vista);
 	}
  function outdoor()
 	{
  $this->load->helper('url');
 	$this->load->model('Admin_model');
 	$data = $this->Admin_model->outdoor();
 	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "productos";
 	$datos_vista['title'] = "Admin|Productos";
 	$this->load->view('admin/plantilla',$datos_vista);
 	}
  function cambiar_pass(){
    $this->load->helper('url');
   	$datos_vista['vista'] = "password";
   	$datos_vista['title'] = "Cambiar Password ";
   	$this->load->view('admin/plantilla',$datos_vista);
  }
  function camb_pass(){
    $this->load->helper('url');
  //  print_r($_POST);
  $contenido = array(
  'id'    		  =>$_POST['id'],
  'password'	  => sha1($_POST['clave2']),
    );
  $this->load->model('Admin_model');
  $data = $this->Admin_model->cambio_password($contenido);
  }
  function cambiada(){
  $this->load->helper('url');
  $this->load->view('admin/cambiada');
  }
  function nuevo_prod()
 	{
  $this->load->helper('url');
  $this->load->model('Admin_model');
  $data['color'] = $this->Admin_model->dame_colores();
  $data['cat'] = $this->Admin_model->dame_categorias();
  $datos_vista = array('query' => $data);
  $datos_vista['vista'] = "nuevo_prod";
  $datos_vista['title'] = "Ingresar Nombre del Producto";
  $this->load->view('admin/plantilla',$datos_vista);
 	}
  function descripcion_hecha()
  {
    $this->load->helper('url');
  		if ($_POST){
        $mi_archivo = 'img_prod';

  		$config['upload_path'] = './imagenes/productos/';
  		$config['allowed_types'] = 'gif|jpg|png|jpeg';
  		$config['max_size'] = '10000';
  		$config['encrypt_name'] = TRUE;
  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);
  		if (!$this->upload->do_upload($mi_archivo)) {
  		echo $this->upload->display_errors(); exit();
  		} else {
  		$data = array('upload_data' => $this->upload->data());
  		$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
  		 // REDIMENSIONAMOS
       $config['image_library'] = 'gd2';
       $config['source_image'] = $img_full_path;
       $config['maintain_ratio'] = TRUE;
       $config['width'] = 800;
       $config['height'] = 600;
       $config['new_image'] = './imagenes/productos/'. $data['upload_data']['file_name'];
  	   $img_redim1 = $config['new_image'];
       $this->load->library('image_lib', $config);

       if (!$this->image_lib->resize()) {
            @unlink($img_full_path);
            echo $this->image_lib->display_errors(); exit();
       }
       $this->image_lib->clear();
  	//print_r($data);
  	$nom_imag =$this->load->helper('url');
  		if ($_POST){
        $mi_archivo = 'img_prod';

  		$config['upload_path'] = './imagenes/productos/';
  		$config['allowed_types'] = 'gif|jpg|png|jpeg';
  		$config['max_size'] = '10000';
  		$config['encrypt_name'] = TRUE;
  		$this->load->library('upload', $config);
  		$this->upload->initialize($config);
  		if (!$this->upload->do_upload($mi_archivo)) {
  		echo $this->upload->display_errors(); exit();
  		} else {
  		$data = array('upload_data' => $this->upload->data());
  		$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
  		 // REDIMENSIONAMOS
       $config['image_library'] = 'gd2';
       $config['source_image'] = $img_full_path;
       $config['maintain_ratio'] = TRUE;
       $config['width'] = 800;
       $config['height'] = 600;
       $config['new_image'] = './imagenes/productos/'. $data['upload_data']['file_name'];
  	   $img_redim1 = $config['new_image'];
       $this->load->library('image_lib', $config);

       if (!$this->image_lib->resize()) {
            @unlink($img_full_path);
            echo $this->image_lib->display_errors(); exit();
       }
       $this->image_lib->clear();
  	//print_r($data);
  	$nom_imag = $data['upload_data']['file_name'];

       $tipoprod = array(
        'nombre'       =>$_POST['nombre'],);
  			//cargo el modelo de artículos
  			$this->load->model('Admin_model');
        $this->Admin_model->insert_tipoprod($tipoprod);
        $data = $this->Admin_model->dame_ultimoprod();
        foreach ($data->result() as $fila){
        $id_tpp = $fila->id_tipoprod;
        }
        $contenido = array(
        'id_prod'           =>$id_tpp,
        'descripcion_prod'	=>$_POST['descripcion_prod'],
  			'valor'	            =>$_POST['valor'],
        'id_categoria'	    =>$_POST['categoria'],
  			'id_tipoprod'		    =>$id_tpp,
        'stock'   	        =>$_POST['stock'],
        'id_color'          =>$_POST['color']
  			);
        $this->Admin_model->insert_prod($contenido);
        $img_prin = array(
        'id_prod'      =>$id_tpp,
        'id_tipoprod'  =>$id_tpp,
        'nombre_foto'	 =>$nom_imag);
        $this->Admin_model->insert_fotoprinc($img_prin);
        redirect(base_url().'admin');
  			}
  		}
  //print_r($contenido);
  } $data['upload_data']['file_name'];

       $tipoprod = array(
        'nombre'       =>$_POST['nombre'],);
  			//cargo el modelo de artículos
  			$this->load->model('Admin_model');
        $this->Admin_model->insert_tipoprod($tipoprod);
        $data = $this->Admin_model->dame_ultimoprod();
        foreach ($data->result() as $fila){
        $id_tpp = $fila->id_tipoprod;
        }
        $contenido = array(
        'id_prod'           =>$id_tpp,
        'descripcion_prod'	=>$_POST['descripcion_prod'],
  			'valor'	            =>$_POST['valor'],
        'id_categoria'	    =>$_POST['categoria'],
  			'id_tipoprod'		    =>$id_tpp,
        'stock'   	        =>$_POST['stock'],
        'id_color'          =>$_POST['color']
  			);
        $this->Admin_model->insert_prod($contenido);
        $img_prin = array(
        'id_prod'      =>$id_tpp,
        'id_tipoprod'  =>$id_tpp,
        'nombre_foto'	 =>$nom_imag);
        $this->Admin_model->insert_fotoprinc($img_prin);
        redirect(base_url().'admin');
  			}

  }
  function editar_prod($id)
 	{
  $this->load->helper('url');
 	$this->load->model('Admin_model');
 	$data['d'] = $this->Admin_model->dame_prod($id);
  $data['color'] = $this->Admin_model->dame_colores();
  $data['cat'] = $this->Admin_model->dame_categorias();
 	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "editar_prod";
 	$datos_vista['title'] = "Editar Datos del Producto";
 	$this->load->view('admin/plantilla',$datos_vista);
 	}
  function datos_bici($id)
 	{
  $this->load->helper('url');
 	$this->load->model('Admin_model');
 	$data = $this->Admin_model->dame_bici($id);
 	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "datos_bici";
 	$datos_vista['title'] = "Datos de Bici ";
 	$this->load->view('admin/plantilla',$datos_vista);
 	}
    function prod_editado()
    {
		$this->load->helper('url');
    //print_r($_POST);

    if ($_POST){
		//$nom_imag = array($_POST['imagen']);
		$mi_archivo = 'img_prod';
		$config['upload_path']    = './imagenes/productos/';
		$config['allowed_types']  = 'gif|jpg|png|jpeg';
		$config['max_size']       = '10000';
		$config['encrypt_name']   = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		if (!$this->upload->do_upload($mi_archivo)) {
      $tipoprod = array(
       'nombre'       =>$_POST['nombre'],
       'id_tipoprod'	=>$_POST['id_tipoprod'],
     );
      $contenido = array(
      'descripcion_prod'	=>$_POST['descripcion_prod'],
  		'valor'	            =>$_POST['valor'],
      'stock'	            =>$_POST['stock'],
      'id_categoria'	    =>$_POST['id_categoria'],
			'id_prod'	          =>$_POST['id_prod'],
			);
      $img_prin = array(
      'id_foto'      =>$_POST['id_foto'],
      'id_prod'      =>$_POST['id_prod'],
      'id_tipoprod'  =>$_POST['id_tipoprod'],
      'nombre_foto'	 =>$_POST['imagen_2']
    );
		//cargo el modelo de edicion
			$this->load->model('Admin_model');
			$this->Admin_model->nom_editado($tipoprod);
      $this->Admin_model->prod_editado($contenido);
      $this->Admin_model->foto_editado($img_prin);
      redirect(base_url().'admin');
		} else {
		$data = array('upload_data' => $this->upload->data());
		$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
   // REDIMENSIONAMOS
     $config['image_library'] = 'gd2';
     $config['source_image'] = $img_full_path;
     $config['maintain_ratio'] = TRUE;
     $config['width'] = 800;
     $config['height'] = 600;
     $config['new_image'] = './imagenes/productos/'. $data['upload_data']['file_name'];
	 $img_redim1 = $config['new_image'];
     $this->load->library('image_lib', $config);
     if (!$this->image_lib->resize()) {
          @unlink($img_full_path);
          echo $this->image_lib->display_errors(); exit();
     }
     $this->image_lib->clear();
	//print_r($data);
	$nom_imag = $data['upload_data']['file_name'];
  $tipoprod = array(
   'nombre'       =>$_POST['nombre'],
   'id_tipoprod'	=>$_POST['id_tipoprod'],
 );
  $contenido = array(
  'descripcion_prod'	=>$_POST['descripcion_prod'],
  'valor'	            =>$_POST['valor'],
  'stock'	            =>$_POST['stock'],
  'id_categoria'	    =>$_POST['id_categoria'],
  'id_prod'	          =>$_POST['id_prod'],
  );
  $img_prin = array(
  'id_foto'      =>$_POST['id_foto'],
  'id_prod'      =>$_POST['id_prod'],
  'id_tipoprod'  =>$_POST['id_tipoprod'],
  'nombre_foto'	 =>$nom_imag
);
			//cargo el modelo de artículos
      $this->load->model('Admin_model');
			$this->Admin_model->nom_editado($tipoprod);
      $this->Admin_model->prod_editado($contenido);
      $this->Admin_model->foto_editado($img_prin);
      redirect(base_url().'admin');
			}
		}
	}
  function eliminar_prod($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['v'] = $this->Admin_model->elimina_prod($id);
    $data['f'] = $this->Admin_model->elimina_fotos($id);
    $data['q'] = $this->Admin_model->elimina_tipoprod($id);
		redirect(base_url().'admin');
	}
    ///////////////////////categorias///////////////////
    function categorias()
    {
    $this->load->helper('url');
    $this->load->model('Admin_model');
    $data = $this->Admin_model->dame_categorias();
    $datos_vista = array('query' => $data);
    $datos_vista['vista'] = "categorias";
    $datos_vista['title'] = "Listado de Categorias";
    $this->load->view('admin/plantilla',$datos_vista);
    }
    function nueva_cat()
    {
      $this->load->helper('url');
      if ($_POST){
      $contenido = array(
      'nombre_categoria'		=>$_POST['nombre_categoria']);
      //cargo el modelo de artículos
      $this->load->model('Admin_model');
      $this->Admin_model->insert_cat($contenido);
      redirect(base_url().'admin/categorias');
      }else{
      $this->load->helper('url');
      $datos_vista['vista'] = "nueva_cat";
      $datos_vista['title'] = "Ingrese Categoria";
      $this->load->view('admin/plantilla',$datos_vista);
    }
  }
  function editar_cat($id)
  {
    $this->load->helper('url');
    if ($_POST){
    $contenido = array(
    'nombre_categoria'		=>$_POST['nombre_categoria'],
    'id_categoria'		    =>$_POST['id_categoria']
  );
    //cargo el modelo de artículos
    $this->load->model('Admin_model');
    $this->Admin_model->editar_cat($contenido);
    redirect(base_url().'admin/categorias');
    }else{
    $this->load->helper('url');
    $this->load->model('Admin_model');
    $data = $this->Admin_model->dame_cat($id);
    $datos_vista = array('query' => $data);
    $datos_vista['vista'] = "editar_cat";
    $datos_vista['title'] = "Edite la Categoria";
    $this->load->view('admin/plantilla',$datos_vista);
    }
  }
  function eliminar_cat($id)
  {
    $this->load->helper('url');
    $this->load->model('Admin_model');
    $data = $this->Admin_model->elimina_cat($id);
    redirect(base_url().'admin/categorias');
  }
  ///////////////////////colores///////////////////
  function colores()
  {
  $this->load->helper('url');
  $this->load->model('Admin_model');
  $data = $this->Admin_model->dame_colores();
  $datos_vista = array('query' => $data);
  $datos_vista['vista'] = "colores";
  $datos_vista['title'] = "Listado de Colores";
  $this->load->view('admin/plantilla',$datos_vista);
  }
  function nuevo_color()
  {
    $this->load->helper('url');
    if ($_POST){
    $contenido = array(
    'nombre_color'		=>$_POST['nombre_color']);
    //cargo el modelo de artículos
    $this->load->model('Admin_model');
    $this->Admin_model->insert_color($contenido);
    redirect(base_url().'admin/colores');
    }else{
    $this->load->helper('url');
    $datos_vista['vista'] = "nuevo_color";
    $datos_vista['title'] = "Ingrese Color";
    $this->load->view('admin/plantilla',$datos_vista);
  }
}
function editar_color($id)
{
  $this->load->helper('url');
  if ($_POST){
  $contenido = array(
  'nombre_color'		=>$_POST['nombre_color'],
  'id_color'		    =>$_POST['id_color']
);
  //cargo el modelo de artículos
  $this->load->model('Admin_model');
  $this->Admin_model->editar_color($contenido);
  redirect(base_url().'admin/colores');
  }else{
  $this->load->helper('url');
  $this->load->model('Admin_model');
  $data = $this->Admin_model->dame_color($id);
  $datos_vista = array('query' => $data);
  $datos_vista['vista'] = "edit_color";
  $datos_vista['title'] = "Edite el Color";
  $this->load->view('admin/plantilla',$datos_vista);
  }
}
function eliminar_color($id)
{
  $this->load->helper('url');
  $this->load->model('Admin_model');
  $data = $this->Admin_model->elimina_color($id);
  redirect(base_url().'admin/colores');
}
  /////////////////////// cascos ///////////////////
  function cascos()
 	{
  $this->load->helper('url');
 	$this->load->model('Admin_model');
 	$data = $this->Admin_model->dame_cascos();
 	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "cascos";
 	$datos_vista['title'] = "Listado de Cascos";
 	$this->load->view('admin/plantilla',$datos_vista);
 	}
  function editar_casco($id)
 	{
  $this->load->helper('url');
 	$this->load->model('Admin_model');
 	$data = $this->Admin_model->dame_casco($id);
 	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "edit_casco";
 	$datos_vista['title'] = "Editar Casco";
 	$this->load->view('admin/plantilla',$datos_vista);
 	}
  function datos_casco($id)
 	{
  $this->load->helper('url');
 	$this->load->model('Admin_model');
 	$data = $this->Admin_model->dame_casco($id);
 	$datos_vista = array('query' => $data);
  $datos_vista['vista'] = "datos_casco";
 	$datos_vista['title'] = "Editar Casco";
 	$this->load->view('admin/plantilla',$datos_vista);
 	}
  function nuevo_casco()
  {
    $this->load->helper('url');
      if ($_POST){
        $mi_archivo = 'img_casco';
      $config['upload_path'] = './imagenes/cascos/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = '10000';
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if (!$this->upload->do_upload($mi_archivo)) {
      echo $this->upload->display_errors(); exit();
      } else {
      $data = array('upload_data' => $this->upload->data());
      $img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
       // REDIMENSIONAMOS
       $config['image_library'] = 'gd2';
       $config['source_image'] = $img_full_path;
       $config['maintain_ratio'] = TRUE;
       $config['width'] = 800;
       $config['height'] = 600;
       $config['new_image'] = './imagenes/cascos/'. $data['upload_data']['file_name'];
       $img_redim1 = $config['new_image'];
       $this->load->library('image_lib', $config);

       if (!$this->image_lib->resize()) {
            @unlink($img_full_path);
            echo $this->image_lib->display_errors(); exit();
       }
       $this->image_lib->clear();
    //print_r($data);
    $nom_imag = $data['upload_data']['file_name'];

        $contenido = array(
        'nom_casco'		=>$_POST['nom_casco'],
        'desc_casco'	=>$_POST['desc_casco'],
        'valor'	      =>$_POST['Valor'],
        'img_casco'		=>$nom_imag,
        );
        //cargo el modelo de artículos
        $this->load->model('Admin_model');
        $this->Admin_model->insert_casco($contenido);
        redirect(base_url().'admin/cascos');
        }
      }else{
        $this->load->helper('url');
        $datos_vista['vista'] = "nuevo_casco";
        $datos_vista['title'] = "Ingrese Cascos";
        $this->load->view('admin/plantilla',$datos_vista);
  }
}
  function casco_editado()
  {
  $this->load->helper('url');
    if ($_POST){
    $mi_archivo = 'img_casco';

    $config['upload_path'] = './imagenes/cascos/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = '10000';
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($mi_archivo)) {
    echo $this->upload->display_errors(); exit();
    } else {
    $data = array('upload_data' => $this->upload->data());
    $img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
     // REDIMENSIONAMOS
     $config['image_library'] = 'gd2';
     $config['source_image'] = $img_full_path;
     $config['maintain_ratio'] = TRUE;
     $config['width'] = 800;
     $config['height'] = 600;
     $config['new_image'] = './imagenes/cascos/'. $data['upload_data']['file_name'];
     $img_redim1 = $config['new_image'];
     $this->load->library('image_lib', $config);

     if (!$this->image_lib->resize()) {
          @unlink($img_full_path);
          echo $this->image_lib->display_errors(); exit();
     }
     $this->image_lib->clear();
  //print_r($data);
  $nom_imag = $data['upload_data']['file_name'];

  $contenido = array(
  'nom_casco'		=>$_POST['nom_casco'],
  'desc_casco'	=>$_POST['desc_casco'],
  'valor'	      =>$_POST['Valor'],
  'img_casco'		=>$nom_imag,
  'id_casco'    =>$_POST['id_casco'],
  );
      //cargo el modelo de artículos
      $this->load->helper('url');
      $this->load->model('Admin_model');
      $this->Admin_model->casco_editado($contenido);
      redirect(base_url().'admin/cascos');
      }
    }
  }
  function eliminar_casco($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data = $this->Admin_model->elimina_casco($id);
		redirect(base_url().'admin/cascos');
	}
  function contacto(){
    $this->load->helper('url');
    $datos_vista['vista'] = "contacto";
    $datos_vista['title'] = "Contactanos!!!!";
    $this->load->view('admin/plantilla',$datos_vista);
  }
  function envio_cont(){
  $this->load->helper('url');
  //print_r($_POST);
  if ($_POST) {
    $contenido = array(
    'nomb_contacto'	=>$_POST['nombre'],
    'email'	        =>$_POST['email']
    );
  $this->load->library('email');
  $this->email->from($_POST['email'],$_POST['nombre']);
  $this->email->to('gonzalobravoprod@gmail.com');
  $this->email->subject($_POST['asunto']);
  $this->email->message($_POST['comentario']);
  if ($this->email->send()){
	  //cargo el modelo de artículos
  $this->load->helper('url');
  $this->load->model('Admin_model');
  $this->Admin_model->contacto_new($contenido);
  redirect(base_url().'admin/exito');
      }
    }
  }
  function exito(){
    $this->load->helper('url');
    $datos_vista['vista'] = "exito";
    $datos_vista['title'] = "Mensaje Enviado!!!!";
    $this->load->view('admin/plantilla',$datos_vista);
  }








}
