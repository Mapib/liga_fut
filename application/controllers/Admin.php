<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/////////////////////////////////////////Noticias/////////////////////////////////////////////////////////////
	public function index(){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['noti'] = $this->Admin_model->dame_noticias();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Administrador de Noticias";
	$datos_vista['vista'] = "noticias";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function nueva_not(){
	$this->load->helper('url');
	$datos_vista['title'] = "Nueva Noticia";
	$this->load->view('admin/nueva_not',$datos_vista);
	}
	public function editar_noti($id){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['noti'] = $this->Admin_model->dame_noticia($id);
	$datos_vista = array('query' => $data);
	$datos_vista['vista'] = "editar_not";
	$datos_vista['title'] = "Editar Noticia";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function eliminar_noti($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data = $this->Admin_model->elimina_noticia($id);
		redirect(base_url().'admin/noticias');

	}
	public function noticia_editada ()
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		if ($_POST){
		//$nom_imag = array($_POST['imagen']);
		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/noti/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		if (!$this->upload->do_upload($mi_archivo)) {
			$contenido = array(
			'titulo'			=>$_POST['titulo'],
			'sub_titulo'	=>$_POST['sub_titulo'],
			'contenido'		=>$_POST['contenido'],
			'imagen'			=>$_POST['imagen_2'],
			'id_noticia'	=>$_POST['id_noticia'],
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->noti_editada($contenido);
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
     $config['new_image'] = './imagenes/noti/'. $data['upload_data']['file_name'];
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
			'titulo'			=>$_POST['titulo'],
			'sub_titulo'	=>$_POST['sub_titulo'],
			'contenido'		=>$_POST['contenido'],
			'imagen'			=>$nom_imag,
			'id_noticia'	=>$_POST['id_noticia'],
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->noti_editada($contenido);
			redirect(base_url().'admin');
		}
		}else{
			$contenido = array(
			'titulo'			=>$_POST['titulo'],
			'sub_titulo'	=>$_POST['sub_titulo'],
			'contenido'		=>$_POST['contenido'],
			'imagen'			=>$_POST['imagen_2'],
			'id_noticia'	=>$_POST['id_noticia'],
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->noti_editada($contenido);
			redirect(base_url().'admin');
			}
}

	public function nueva_noti()
	{
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
		if ($_POST){
		//$nom_imag = array($_POST['imagen']);
		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/noti/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
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
     $config['new_image'] = './imagenes/noti/'. $data['upload_data']['file_name'];
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
			'titulo'			=>$_POST['titulo'],
			'sub_titulo'	=>$_POST['sub_titulo'],
			'contenido'		=>$_POST['contenido'],
			'imagen'			=>$nom_imag,
			//'id_noticia'	=>$_POST['id_noticia'],

			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->insert_noti($contenido);
			redirect(base_url().'admin');
			}
		}else{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$datos_vista = array('query' => $data);
		$datos_vista['vista'] = "nueva_noti";
		$datos_vista['title'] = "Nueva Noticia";
		$this->load->view('admin/plantilla',$datos_vista);
		}
	}
////////////////////////////////////////////////////Canchas/////////////////////////////////////////////////////
public function canchas(){
$usr 	= $this->session->userdata('id');
$this->load->helper('url');
$this->load->model('Admin_model');
$data['usr'] = $this->Admin_model->user($usr);
$data['can'] = $this->Admin_model->dame_canchas();
$datos_vista = array('query' => $data);
$datos_vista['title'] = "Administrador de Canchas";
$datos_vista['vista'] = "canchas";
$this->load->view('admin/plantilla',$datos_vista);
}
public function editar_cancha($id)
{
$usr 	= $this->session->userdata('id');
$this->load->helper('url');
$this->load->model('Admin_model');
$data['usr'] = $this->Admin_model->user($usr);
$data['can'] = $this->Admin_model->dame_cancha($id);
$datos_vista = array('query' => $data);
$datos_vista['title'] = "Editando Cancha";
$datos_vista['vista'] = "editar_cancha";
$this->load->view('admin/plantilla',$datos_vista);
}
public function cancha_editada ()
{
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	if ($_POST){
	$mi_archivo = 'imagen';

	$config['upload_path'] = './imagenes/canchas/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size'] = '10000';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload', $config);
	//$this->upload->initialize($config);
	if (!$this->upload->do_upload($mi_archivo)) {
		$contenido = array(
		'nombre_cancha'	=>$_POST['nombre_cancha'],
		'direc_cancha'	=>$_POST['direc_cancha'],
		//'descripcion'	=>$_POST['descripcion'],
		'img_cancha'		=>$_POST['imagen_2'],
		'id_cancha'			=>$_POST['id_cancha']
		);
		//cargo el modelo de artículos
		$this->load->model('Admin_model');
		$this->Admin_model->cancha_editada($contenido);
		redirect(base_url().'admin/canchas');
	} else {
	$data = array('upload_data' => $this->upload->data());
	$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
	 // REDIMENSIONAMOS
	 $config['image_library'] = 'gd2';
	 $config['source_image'] = $img_full_path;
	 $config['maintain_ratio'] = TRUE;
	 $config['width'] = 800;
	 $config['height'] = 600;
	 $config['new_image'] = './imagenes/canchas/'. $data['upload_data']['file_name'];
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
			'nombre_cancha'	=>$_POST['nombre_cancha'],
			'direc_cancha'	=>$_POST['direc_cancha'],
			//'descripcion'	=>$_POST['descripcion'],
			'img_cancha'		=>$nom_imag,
			'id_cancha'			=>$_POST['id_cancha']
		);
		//cargo el modelo de artículos
		$this->load->model('Admin_model');
		$this->Admin_model->cancha_editada($contenido);
		redirect(base_url().'admin/canchas');
	}
	}else{
		/*$contenido = array(
		'nombre'			=>$_POST['nombre'],
		'cargo'				=>$_POST['cargo'],
		'descripcion'	=>$_POST['descripcion'],
		'imagen'			=>$_POST['imagen_2'],
		'id_directiva'=>$_POST['id_directiva']
		);
		//cargo el modelo de artículos
		$this->load->model('Admin_model');
		$this->Admin_model->cancha_editada($contenido);
		redirect(base_url().'admin/canchas');*/
		}
}
public function nueva_cancha()
{
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	if ($_POST){
	//$nom_imag = array($_POST['imagen']);
	$mi_archivo = 'imagen';

	$config['upload_path'] = './imagenes/canchas/';
	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	$config['max_size'] = '10000';
	$config['encrypt_name'] = TRUE;
	$this->load->library('upload', $config);
	//$this->upload->initialize($config);
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
	 $config['new_image'] = './imagenes/canchas'. $data['upload_data']['file_name'];
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
			'nombre_cancha'	=>$_POST['nombre_cancha'],
			'direc_cancha'	=>$_POST['direc_cancha'],
			//'descripcion'	=>$_POST['descripcion'],
			'img_cancha'		=>$nom_imag,
			//'id_cancha'			=>$_POST['id_cancha']
		);
		//cargo el modelo de artículos
		$this->load->model('Admin_model');
		$this->Admin_model->insert_cancha($contenido);
		redirect(base_url().'admin/canchas');
		}
	}else{
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Nueva Cancha";
		$datos_vista['vista'] = "nueva_cancha";
		$this->load->view('admin/plantilla',$datos_vista);

	}
}
public function eliminar_cancha($id)
{
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data = $this->Admin_model->elimina_cancha($id);
	redirect(base_url().'admin/canchas');
}
	////////////////////////////////////////////////////Directiva/////////////////////////////////////////////////////
	public function directiva(){
		$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['dire'] = $this->Admin_model->dame_directiva();
	$data['usr'] = $this->Admin_model->user($usr);
	$datos_vista = array('query' => $data);
	$datos_vista['vista'] = "directiva";
	$datos_vista['title'] = "Nuestra Directiva";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function editar_directivo($id)
	{
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['dire'] = $this->Admin_model->dame_directivo($id);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Editando Directivo";
	$datos_vista['vista'] = "editar_dire";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function dire_editado ()
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		if ($_POST){
		//$nom_imag = array($_POST['imagen']);
		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/dire/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		if (!$this->upload->do_upload($mi_archivo)) {
			$contenido = array(
			'nombre'			=>$_POST['nombre'],
			'cargo'				=>$_POST['cargo'],
			'descripcion'	=>$_POST['descripcion'],
			'imagen'			=>$_POST['imagen_2'],
			'id_directiva'=>$_POST['id_directiva']
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->dire_editado($contenido);
			redirect(base_url().'admin/directiva');
		} else {
		$data = array('upload_data' => $this->upload->data());
		$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
     // REDIMENSIONAMOS
     $config['image_library'] = 'gd2';
     $config['source_image'] = $img_full_path;
     $config['maintain_ratio'] = TRUE;
     $config['width'] = 800;
     $config['height'] = 600;
     $config['new_image'] = './imagenes/dire/'. $data['upload_data']['file_name'];
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
			'nombre'			=>$_POST['nombre'],
			'cargo'				=>$_POST['cargo'],
			'descripcion'	=>$_POST['descripcion'],
			'imagen'			=>$nom_imag,
			'id_directiva'=>$_POST['id_directiva']
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->dire_editado($contenido);
			redirect(base_url().'admin/directiva');
		}
		}else{
			$contenido = array(
			'nombre'			=>$_POST['nombre'],
			'cargo'				=>$_POST['cargo'],
			'descripcion'	=>$_POST['descripcion'],
			'imagen'			=>$_POST['imagen_2'],
			'id_directiva'=>$_POST['id_directiva']
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->dire_editado($contenido);
			redirect(base_url().'admin');
			}
}
	public function nuevo_dire()
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		if ($_POST){
		//$nom_imag = array($_POST['imagen']);
		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/dire/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
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
     $config['new_image'] = './imagenes/dire'. $data['upload_data']['file_name'];
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
			'nombre'			=>$_POST['nombre'],
			'cargo'				=>$_POST['cargo'],
			'descripcion'	=>$_POST['descripcion'],
			'imagen'			=>$nom_imag,
			//'id_directiva'	=>$_POST['id_directiva'],

			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->insert_dire($contenido);
			redirect(base_url().'admin/directiva');
			}
		}else{
			$this->load->model('Admin_model');
			$data['usr'] = $this->Admin_model->user($usr);
			$datos_vista = array('query' => $data);
		  $datos_vista['title'] = "Nuevo Directivo";
			$datos_vista['vista'] = "nuevo_dire";
			$this->load->view('admin/plantilla',$datos_vista);

		}
	}
	public function eliminar_dire($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data = $this->Admin_model->elimina_directiva($id);
		redirect(base_url().'admin/directiva');
	}
////////////////////////////////////////////////////Series//////////////////////////////////////////////////////////
	public function series(){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['ser'] = $this->Admin_model->dame_series();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Nuestras Series";
	$datos_vista['vista'] = "series";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function editar_serie($id){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['ser'] = $this->Admin_model->dame_serie($id);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Editando Serie";
	$datos_vista['vista'] = "editar_serie";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function nueva_serie()
	{
	$this->load->helper('url');
	if ($_POST){
		$contenido = array(
			'nombre_serie'	=>$_POST['nombre_serie'],
			'desc_serie'	=>$_POST['desc_serie'],
			//'id_serie'		=>$_POST['id_serie'],
			);
		//cargo el modelo de edicion
			$this->load->model('Admin_model');
			$this->Admin_model->insert_serie($contenido);
			redirect(base_url().'admin/series');
		} else{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Nueva Serie";
		$datos_vista['vista'] = "nueva_serie";
		$this->load->view('admin/plantilla',$datos_vista);
		}
	}
	public function serie_editada($id){
	$this->load->helper('url');
	if ($_POST){
		$contenido = array(
			'nombre_serie'	=>$_POST['nombre_serie'],
			'desc_serie'	=>$_POST['desc_serie'],
			'id_serie'		=>$_POST['id_serie'],
			);
		//cargo el modelo de edicion
			$this->load->model('Admin_model');
			$this->Admin_model->serie_editada($contenido);
			redirect(base_url().'admin/series');
		} else{
	echo $this->upload->display_errors(); exit();
		}
	}
	public function eliminar_serie($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data = $this->Admin_model->elimina_serie($id);
		redirect(base_url().'admin/series');
	}
	////////////////////////////////////////////////////Equipos//////////////////////////////////////////////////////////
	public function equipos(){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['eqi'] = $this->Admin_model->dame_equipos();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Nuestros Equipos";
	$datos_vista['vista'] = "equipos";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function editar_equipo($id)
	{
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['eqi'] = $this->Admin_model->dame_equipo($id);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Editando Equipo";
	$datos_vista['vista'] = "editar_equipo";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function equipo_editado ()
	{
			$usr 	= $this->session->userdata('id');
			$this->load->helper('url');
			if ($_POST){
			//$nom_imag = array($_POST['imagen']);
			$mi_archivo = 'imagen';

			$config['upload_path'] = './imagenes/club/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '10000';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			//$this->upload->initialize($config);
			if (!$this->upload->do_upload($mi_archivo)) {
				$contenido = array(
					'nom_equipo'	=>$_POST['nom_equipo'],
					'direc_equipo'=>$_POST['direc_equipo'],
					//'contenido'		=>$_POST['contenido'],
					'insignia'		=>$_POST['imagen_2'],
					'id_equipo'		=>$_POST['id_equipo'],
				);
				//cargo el modelo de artículos
				$this->load->model('Admin_model');
				$this->Admin_model->equipo_editado($contenido);
				redirect(base_url().'admin/equipos');
			} else {
			$data = array('upload_data' => $this->upload->data());
			$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
	     // REDIMENSIONAMOS
	     $config['image_library'] = 'gd2';
	     $config['source_image'] = $img_full_path;
	     $config['maintain_ratio'] = TRUE;
	     $config['width'] = 800;
	     $config['height'] = 600;
	     $config['new_image'] = './imagenes/club/'. $data['upload_data']['file_name'];
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
				'nom_equipo'	=>$_POST['nom_equipo'],
				'direc_equipo'=>$_POST['direc_equipo'],
				//'contenido'		=>$_POST['contenido'],
				'insignia'		=>$nom_imag,
				'id_equipo'		=>$_POST['id_equipo'],
				);
				//cargo el modelo de artículos
				$this->load->model('Admin_model');
				$this->Admin_model->equipo_editado($contenido);
				redirect(base_url().'admin/equipos');
			}
			}else{
				$contenido = array(
					'nom_equipo'	=>$_POST['nom_equipo'],
					'direc_equipo'=>$_POST['direc_equipo'],
					//'contenido'		=>$_POST['contenido'],
					'insignia'		=>$_POST['imagen_2'],
					'id_equipo'		=>$_POST['id_equipo'],
				);
				//cargo el modelo de artículos
				$this->load->model('Admin_model');
				$this->Admin_model->equipo_editado($contenido);
				redirect(base_url().'admin/equipos');
				}
	}
	public function nuevo_equipo()
	{
		$this->load->helper('url');
		if ($_POST){

		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/club/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
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
     $config['new_image'] = './imagenes/club'. $data['upload_data']['file_name'];
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
				'nom_equipo'	=>$_POST['nom_equipo'],
				'direc_equipo'=>$_POST['direc_equipo'],
				//'contenido'		=>$_POST['contenido'],
				//'insignia'		=>$_POST['imagen_2'],
			//'descripcion'	=>$_POST['descripcion'],
			'insignia'		=>$nom_imag,
			//'id_directiva'	=>$_POST['id_directiva'],

			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->insert_equipo($contenido);
			redirect(base_url().'admin/equipos');
			}
		}else{
			$usr 	= $this->session->userdata('id');
			$this->load->helper('url');
			$this->load->model('Admin_model');
			$data['usr'] = $this->Admin_model->user($usr);
			$datos_vista = array('query' => $data);
			$datos_vista['title'] = "Nuevo Equipo";
			$datos_vista['vista'] = "nuevo_equipo";
			$this->load->view('admin/plantilla',$datos_vista);
			}
	}
	public function eliminar_equipo($id){
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data = $this->Admin_model->elimina_equipo($id);
	redirect(base_url().'admin/equipos');
	}
	////////////////////////////////////////////////////Arbitros//////////////////////////////////////////////////////////
	public function arbitros(){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['arb'] = $this->Admin_model->dame_Arbitros();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Nuestros Arbitros";
	$datos_vista['vista'] = "arbitros";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function editar_arbitro($id){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['arb'] = $this->Admin_model->dame_arbitro($id);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Editando Sr Arbitro";
	$datos_vista['vista'] = "editar_arbitro";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function arbitro_editado ()
	{
			$usr 	= $this->session->userdata('id');
			$this->load->helper('url');
			if ($_POST){
			//$nom_imag = array($_POST['imagen']);
			$mi_archivo = 'imagen';

			$config['upload_path'] = './imagenes/juez/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '10000';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			//$this->upload->initialize($config);
			if (!$this->upload->do_upload($mi_archivo)) {
				$contenido = array(
				'nom_arbitro'	=>$_POST['nom_arbitro'],
				'fecha_nac'		=>$_POST['fecha_nac'],
				'descripcion'	=>$_POST['descripcion'],
				'telefono'		=>$_POST['telefono'],
				'imagen'			=>$_POST['imagen_2'],
				'id_arbitro'	=>$_POST['id_arbitro'],
				);
				//cargo el modelo de artículos
				$this->load->model('Admin_model');
				$this->Admin_model->arbitro_editado($contenido);
				redirect(base_url().'admin/arbitros');
			} else {
			$data = array('upload_data' => $this->upload->data());
			$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
	     // REDIMENSIONAMOS
	     $config['image_library'] = 'gd2';
	     $config['source_image'] = $img_full_path;
	     $config['maintain_ratio'] = TRUE;
	     $config['width'] = 800;
	     $config['height'] = 600;
	     $config['new_image'] = './imagenes/juez/'. $data['upload_data']['file_name'];
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
		'nom_arbitro'		=>$_POST['nom_arbitro'],
		'fecha_nac'		=>$_POST['fecha_nac'],
		'descripcion'	=>$_POST['descripcion'],
		'telefono'		=>$_POST['telefono'],
		'imagen'		=>$nom_imag,
		'id_arbitro'	=>$_POST['id_arbitro'],
		);

		//cargo el modelo de artículos
		$this->load->model('Admin_model');
		$this->Admin_model->arbitro_editado($contenido);
		redirect(base_url().'admin/arbitros');
		}
			}else{
				$contenido = array(
				'nom_arbitro'	=>$_POST['nom_arbitro'],
				'fecha_nac'		=>$_POST['fecha_nac'],
				'descripcion'	=>$_POST['descripcion'],
				'telefono'		=>$_POST['telefono'],
				'imagen'		=>$_POST['imagen_2'],
				'id_arbitro'	=>$_POST['id_arbitro'],
				);
				//cargo el modelo de artículos
				$this->load->model('Admin_model');
				$this->Admin_model->arbitro_editado($contenido);
				redirect(base_url().'admin/arbitros');
				}
	}
	public function nuevo_arbitro()
	{
		$this->load->helper('url');
		if ($_POST){

		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/juez/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
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
     $config['new_image'] = './imagenes/juez'. $data['upload_data']['file_name'];
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
			'nom_arbitro'	=>$_POST['nom_arbitro'],
			'fecha_nac'		=>$_POST['fecha_nac'],
			'descripcion'	=>$_POST['descripcion'],
			'telefono'		=>$_POST['telefono'],
			'imagen'		=>$nom_imag,
			//'id_arbitro'	=>$_POST['id_arbitro'],
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->insert_arbitro($contenido);
			redirect(base_url().'admin/arbitros');
			}
		}else{
			$usr 	= $this->session->userdata('id');
			$this->load->helper('url');
			$this->load->model('Admin_model');
			$data['usr'] = $this->Admin_model->user($usr);
			$datos_vista = array('query' => $data);
			$datos_vista['title'] = "Ingresando Sr Arbitro";
			$datos_vista['vista'] = "nuevo_arbitro";
			$this->load->view('admin/plantilla',$datos_vista);
		}
	}
	public function eliminar_arbitro($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data = $this->Admin_model->elimina_arbitro($id);
		redirect(base_url().'admin/arbitros');
	}
	////////////////////////////////////////////////////Delegados ///////////////////////////////////////////////////
	public function delegados(){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['arb'] = $this->Admin_model->dame_delegados();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Nuestros Delegados";
	$datos_vista['vista'] = "delegados";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function editar_delegado($id){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['arb'] = $this->Admin_model->dame_delegado($id);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Editando Sr Delegado";
	$datos_vista['vista'] = "editar_delegado";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function delegado_editado ()
	{
			$usr 	= $this->session->userdata('id');
			$this->load->helper('url');
			if ($_POST){
			//$nom_imag = array($_POST['imagen']);
			$mi_archivo = 'imagen';

			$config['upload_path'] = './imagenes/deleg/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '10000';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			//$this->upload->initialize($config);
			if (!$this->upload->do_upload($mi_archivo)) {
				$contenido = array(
				'nombre_delegado'	=>$_POST['nombre_delegado'],
				'fono_delegado'		=>$_POST['fono_delegado'],
				'id_equipo'				=>$_POST['id_equipo'],
				'img_delegado'		=>$_POST['imagen_2'],
				'id_delegado'			=>$_POST['id_delegado']
				);
					//cargo el modelo de artículos
					$this->load->model('Admin_model');
					$this->Admin_model->delegado_editado($contenido);
					redirect(base_url().'admin/delegados');
			} else {
			$data = array('upload_data' => $this->upload->data());
			$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
	     // REDIMENSIONAMOS
	     $config['image_library'] = 'gd2';
	     $config['source_image'] = $img_full_path;
	     $config['maintain_ratio'] = TRUE;
	     $config['width'] = 800;
	     $config['height'] = 600;
	     $config['new_image'] = './imagenes/deleg/'. $data['upload_data']['file_name'];
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
		'nombre_delegado'	=>$_POST['nombre_delegado'],
		'fono_delegado'		=>$_POST['fono_delegado'],
		'id_equipo'				=>$_POST['id_equipo'],
		'img_delegado'		=>$nom_imag,
		'id_delegado'			=>$_POST['id_delegado']
		);

		//cargo el modelo de artículos
		$this->load->model('Admin_model');
		$this->Admin_model->delegado_editado($contenido);
		redirect(base_url().'admin/delegados');
		}
			}else{
			$contenido = array(
			'nombre_delegado'	=>$_POST['nombre_delegado'],
			'fono_delegado'		=>$_POST['fono_delegado'],
			'id_equipo'				=>$_POST['id_equipo'],
			'imagen'					=>$_POST['imagen_2'],
			'id_delegado'			=>$_POST['id_delegado']
			);
				//cargo el modelo de artículos
				$this->load->model('Admin_model');
				$this->Admin_model->delegado_editado($contenido);
				redirect(base_url().'admin/delegados');
				}
	}
	public function nuevo_delegado()
	{
		$this->load->helper('url');
		if ($_POST){

		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/deleg/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
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
     $config['new_image'] = './imagenes/deleg'. $data['upload_data']['file_name'];
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
			'nom_arbitro'	=>$_POST['nom_arbitro'],
			'fecha_nac'		=>$_POST['fecha_nac'],
			'descripcion'	=>$_POST['descripcion'],
			'telefono'		=>$_POST['telefono'],
			'imagen'		=>$nom_imag,
			//'id_arbitro'	=>$_POST['id_arbitro'],
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->insert_delegado($contenido);
			redirect(base_url().'admin/delegados');
			}
		}else{
			$usr 	= $this->session->userdata('id');
			$this->load->helper('url');
			$this->load->model('Admin_model');
			$data['usr'] = $this->Admin_model->user($usr);
			$datos_vista = array('query' => $data);
			$datos_vista['title'] = "Ingresando Sr delegado";
			$datos_vista['vista'] = "nuevo_delegado";
			$this->load->view('admin/plantilla',$datos_vista);
		}
	}
	public function eliminar_delegado($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data = $this->Admin_model->elimina_delegado($id);
		redirect(base_url().'admin/delegados');
	}
	////////////////////////////////////////////////////Jugadores//////////////////////////////////////////////////////////
	public function jugadores(){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['jug'] = $this->Admin_model->dame_jugadores();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Listado de Jugadores";
	$datos_vista['vista'] = "jugadores";
	$this->load->view('admin/plantilla',$datos_vista);
	}//nuevo_jugador
	public function editar_jug($id){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['jug'] = $this->Admin_model->dame_jugador($id);
	$datos_vista = array('query' => $data);
	$datos_vista['vista'] = "editar_jugador";
	$datos_vista['title'] = "Editando Jugador";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function jugador_editado ()
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		if ($_POST){
		//$nom_imag = array($_POST['imagen']);
		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/jugadores/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
		if (!$this->upload->do_upload($mi_archivo)) {
			$contenido = array(
			'nombre_jug'			=>$_POST['nombre_jug'],
			'apellido'				=>$_POST['apellido'],
			'fecha_nacimiento'=>$_POST['fecha_nacimiento'],
			'rut'							=>$_POST['rut'],
			'direccion'				=>$_POST['direccion'],
			'foto_jug'				=>$_POST['imagen_2'],
			'id_jugador'			=>$_POST['id_jugador'],
			);
		//cargo el modelo de artículos
		$this->load->model('Admin_model');
		$this->Admin_model->jugador_editado($contenido);
		redirect(base_url().'admin/jugadores');
		} else {
		$data = array('upload_data' => $this->upload->data());
		$img_full_path = $config['upload_path'] . $data['upload_data']['file_name'];
		 // REDIMENSIONAMOS
		 $config['image_library'] = 'gd2';
		 $config['source_image'] = $img_full_path;
		 $config['maintain_ratio'] = TRUE;
		 $config['width'] = 800;
		 $config['height'] = 600;
		 $config['new_image'] = './imagenes/jugadores/'. $data['upload_data']['file_name'];
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
	'nombre_jug'			=>$_POST['nombre_jug'],
	'apellido'				=>$_POST['apellido'],
	'fecha_nacimiento'=>$_POST['fecha_nacimiento'],
	'rut'							=>$_POST['rut'],
	'direccion'				=>$_POST['direccion'],
	'foto_jug'				=>$nom_imag,
	'id_jugador'			=>$_POST['id_jugador'],
	);

	//cargo el modelo de artículos
	$this->load->model('Admin_model');
	$this->Admin_model->jugador_editado($contenido);
	redirect(base_url().'admin/jugadores');
	}
		}else{
				$contenido = array(
				'nombre_jug'			=>$_POST['nombre_jug'],
				'apellido'				=>$_POST['apellido'],
				'fecha_nacimiento'=>$_POST['fecha_nacimiento'],
				'rut'							=>$_POST['rut'],
				'direccion'				=>$_POST['direccion'],
				'foto_jug'				=>$_POST['imagen_2'],
				'id_jugador'			=>$_POST['id_jugador'],
				);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->jugador_editado($contenido);
			redirect(base_url().'admin/jugadores');
		}

	}

	public function nuevo_jugador()
	{
		$this->load->helper('url');
		if ($_POST){

		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/juga/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		//$this->upload->initialize($config);
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
     $config['new_image'] = './imagenes/juez'. $data['upload_data']['file_name'];
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
			'nombre_jug'			=>$_POST['nombre_jug'],
			'apellido'				=>$_POST['apellido'],
			'fecha_nacimiento'=>$_POST['fecha_nacimiento'],
			'rut'							=>$_POST['rut'],
			'direccion'				=>$_POST['direccion'],
			'foto_jug'				=>$nom_imag
			//'id_jugador'			=>$_POST['id_jugador'],
			);
			//cargo el modelo de artículos
			$this->load->model('Admin_model');
			$this->Admin_model->insert_jugador($contenido);
			redirect(base_url().'admin/jugadores');
			}
		}else{
			$usr 	= $this->session->userdata('id');
			$this->load->helper('url');
			$this->load->model('Admin_model');
			$data['usr'] = $this->Admin_model->user($usr);
			$datos_vista = array('query' => $data);
			$datos_vista['title'] = "Nuevo Jugador";
			$datos_vista['vista'] = "nuevo_juga";
			$this->load->view('admin/plantilla',$datos_vista);
		}
	}
	public function buscar_jugador(){
		$this->load->helper('url');
		$buscar = $this->input->get('query', TRUE);
		$this->load->model('Admin_model');
		$data = $this->Admin_model->buscar_jugador(trim($buscar));
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Listado de Jugadores";
		$this->load->view('admin/jugadores', $datos_vista);

	}
	public function eliminar_jugador($id)
	{
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data = $this->Admin_model->elimina_jugador($id);
		redirect(base_url().'admin/jugadores');
	}
	public function datos_del_jugador($id)
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['gol'] = $this->Admin_model->dame_goles($id);
		$data['ama'] = $this->Admin_model->dame_tarjetas_ama($id);
		$data['roj'] = $this->Admin_model->dame_tarjetas_roj($id);
		$data['usr'] = $this->Admin_model->user($usr);
		$data['jug'] = $this->Admin_model->dame_jugador($id);
		$datos_vista = array('query' => $data);
		$datos_vista['vista'] = "datos_jugador";
		$datos_vista['title'] = "Estadisticas del Jugador";
		$this->load->view('admin/plantilla',$datos_vista);
	}

	////////////////////////////////////////////////////Informes//////////////////////////////////////////////////////////
	public function informes(){
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data = $this->Admin_model->dame_informes();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Informes de los Sr. Arbitros";
	$this->load->view('admin/informes',$datos_vista);
	}
	public function nuevo_informe(){
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['fe'] = $this->Admin_model->dame_fecha_informe();
	$data['ju'] = $this->Admin_model->dame_jugadores();
	$data['ar'] = $this->Admin_model->dame_arbitros();
	$data['se'] = $this->Admin_model->dame_series();
	$data['eq'] = $this->Admin_model->dame_equipos();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Nuevo Informe";
	$this->load->view('admin/nuevo_informe',$datos_vista);
	}
	public function fechas()
	{
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['fech'] = $this->Admin_model->dame_fechas();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "fechas_fixture";
	$datos_vista['vista'] = "fechas";
	$this->load->view('admin/plantilla',$datos_vista);
}
	public function nueva_fecha()
	{
	$this->load->helper('url');
	if ($_POST){
		$contenido = array(
			'fecha'	=>$_POST['fecha'],
			'nombre_fecha'	=>$_POST['nombre_fecha'],
			);
			//cargo el modelo de edicion
			$this->load->model('Admin_model');
			 $this->Admin_model->insert_fecha($contenido);
			redirect(base_url().'admin/fechas');
		} else{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Nueva Fecha";
		$datos_vista['vista'] = "nueva_fecha";
		$this->load->view('admin/plantilla',$datos_vista);
		}
	}
	public function editar_fecha($id){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['fech'] = $this->Admin_model->dame_fecha($id);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Editando fecha";
	$datos_vista['vista'] = "editar_fecha";
	$this->load->view('admin/plantilla',$datos_vista);
}
	public function fecha_editada(){
	$this->load->helper('url');
	if ($_POST){
		$contenido = array(
			'fecha'				=>$_POST['fecha_partido'],
			'nombre_fecha'=>$_POST['nombre_fecha'],
			'id_fecha'		=>$_POST['id_fecha'],
			'status'			=>$_POST['status']
			);
		//cargo el modelo de edicion
			$this->load->model('Admin_model');
			$this->Admin_model->fecha_editada($contenido);
			redirect(base_url().'admin/fechas');
		} else{
	echo $this->upload->display_errors(); exit();
		}
	}
	public function fixture()
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$data['fech'] = $this->Admin_model->dame_fechas();
		$data['fix'] = $this->Admin_model->dame_fixture_2();
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "fechas_fixture";
		$datos_vista['vista'] = "fixture";
		$this->load->view('admin/plantilla',$datos_vista);
	}
	public function editar_fecha_fixture($id)
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$data['can'] = $this->Admin_model->dame_canchas();
		$data['eqi'] = $this->Admin_model->dame_equipos();
		$data['fix'] = $this->Admin_model->dame_fecha_fixture($id);
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Editar fecha fixture";
		$datos_vista['vista'] = "editar_fecha_fixture";
		$this->load->view('admin/plantilla',$datos_vista);
	}
	public function crear_fecha_fixture($id)
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$data['fech'] = $this->Admin_model->dame_fecha($id);
		$data['can'] = $this->Admin_model->dame_canchas();
		$data['eqi'] = $this->Admin_model->dame_equipos();
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Crear fecha fixture";
		$datos_vista['vista'] = "crear_fecha_fixture";
		$this->load->view('admin/plantilla',$datos_vista);
	}
	public function fixture_fecha_creada()
	{
		//print_r($_POST);
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		if ($_POST){
			//$contenido = array(
					$part_1 = array(
					//'id_fixture'	=>$_POST['id_fixture_1'],
					'id_fecha'		=>$_POST['id_fecha'],
					'id_cancha'		=>$_POST['id_cancha1'],
					'id_equipo'		=>$_POST['id_equipo1'],
					'arb_prog'		=>'1',
					'id_equipo_b'	=>$_POST['id_equipo_B1']

				);
					$part_2 = array(
					//'id_fixture'	=>$_POST['id_fixture_2'],
					'id_fecha'		=>$_POST['id_fecha'],
					'id_cancha'		=>$_POST['id_cancha2'],
					'id_equipo'		=>$_POST['id_equipo2'],
					'id_equipo_b'	=>$_POST['id_equipo_B2']
				);
					$part_3 = array(
					//'id_fixture'	=>$_POST['id_fixture_3'],
					'id_fecha'		=>$_POST['id_fecha'],
					'id_cancha'		=>$_POST['id_cancha3'],
					'id_equipo'		=>$_POST['id_equipo3'],
					'id_equipo_b'	=>$_POST['id_equipo_B3']
				);
					$part_4 = array(
					//'id_fixture'	=>$_POST['id_fixture_4'],
					'id_fecha'		=>$_POST['id_fecha'],
					'id_cancha'		=>$_POST['id_cancha4'],
					'id_equipo'		=>$_POST['id_equipo4'],
					'id_equipo_b'	=>$_POST['id_equipo_B4']
				);
				//	);
			//cargo el modelo de edicion
				$this->load->model('Admin_model');
				$this->Admin_model->fixture_fecha_creada($part_1,$part_2,$part_3,$part_4);
				redirect(base_url().'admin/fixture');
			} else{
		echo $this->upload->display_errors(); exit();
			}
	}
	public function programar_arbitro($id){
	$usr 	= $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['usr'] = $this->Admin_model->user($usr);
	$data['ser'] = $this->Admin_model->dame_series();
	$data['ar'] = $this->Admin_model->dame_Arbitros();
	$data['fech'] = $this->Admin_model->dame_fechas();
	$data['fix'] = $this->Admin_model->dame_fixture_3($id);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Programar Arbitro";
	$datos_vista['vista'] = "programar_arbitros";
	$this->load->view('admin/plantilla',$datos_vista);
	}
	public function	arbitros_programados(){
	//print_r($_POST);
	$this->load->helper('url');
	if ($_POST){
		$part_0 = array('id_fixture'	=>$_POST['id_fixture'],'arb_prog'		=>'1');
		$part_1 = array(
			'id_fixture'	=>$_POST['id_fixture'],
			'id_serie'		=>$_POST['id_serie1'],
			'id_arbitro'	=>$_POST['id_arbitro1']
			);
		$part_2 = array(
				'id_fixture'	=>$_POST['id_fixture'],
				'id_serie'		=>$_POST['id_serie2'],
				'id_arbitro'	=>$_POST['id_arbitro2']
				);
		$part_3 = array(
					'id_fixture'	=>$_POST['id_fixture'],
					'id_serie'		=>$_POST['id_serie3'],
					'id_arbitro'	=>$_POST['id_arbitro3']
					);
		$part_4 = array(
						'id_fixture'	=>$_POST['id_fixture'],
						'id_serie'		=>$_POST['id_serie4'],
						'id_arbitro'	=>$_POST['id_arbitro4']
						);

		//cargo el modelo de edicion
			$this->load->model('Admin_model');
			$this->Admin_model->arb_programados($part_1,$part_2,$part_3,$part_4);
			$this->Admin_model->arb_listos($part_0);
			redirect(base_url().'admin/fixture');
		} else{
	echo $this->upload->display_errors(); exit();
}
	}
	public function programar_arbitros()
	{
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$data['usr'] = $this->Admin_model->user($usr);
		$data['fech'] = $this->Admin_model->dame_fechas();
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Programar Arbitros";
		$datos_vista['vista'] = "programar_arbitros";
		$this->load->view('admin/plantilla',$datos_vista);
	}
	public function	editar_resultado($id){
	$this->load->helper('url');
	if ($_POST){
		$contenido = array(
			'id_resultado'	=>$_POST['id_resultado'],
			'estado'				=>$_POST['estado'],
			'id_arbitro_A'	=>$_POST['id_arbitro_A'],
			'id_arbitro_B'	=>$_POST['id_arbitro_B'],
			'id_arbitro_C'	=>$_POST['id_arbitro_C'],
			'id_arbitro_D'	=>$_POST['id_arbitro_D']
			);

		//cargo el modelo de edicion
			$this->load->model('Admin_model');
			$this->Admin_model->arb_programados($contenido);
			redirect(base_url().'admin/fixture');
		} else{
		$this->load->model('Admin_model');
		$data['re'] = $this->Admin_model->dame_resultado_2($id);
		$data['fe'] = $this->Admin_model->dame_fecha_fixture();
		//$data['ju'] = $this->Admin_model->dame_jugadores();
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Ingresar Resultados";
		$this->load->view('admin/editar_resultado',$datos_vista);
		}
	}
	public function fixture_fecha_editada()
	{
		//print_r($_POST);
		$usr 	= $this->session->userdata('id');
		$this->load->helper('url');
		if ($_POST){
			//$contenido = array(
					$part_1 = array(
					'id_fixture'	=>$_POST['id_fixture_1'],
					'id_cancha'		=>$_POST['id_cancha1'],
					'id_equipo'		=>$_POST['id_equipo1'],
					'id_equipo_b'	=>$_POST['id_equipo_B1']
				);
					$part_2 = array(
					'id_fixture'	=>$_POST['id_fixture_2'],
					'id_cancha'		=>$_POST['id_cancha2'],
					'id_equipo'		=>$_POST['id_equipo2'],
					'id_equipo_b'	=>$_POST['id_equipo_B2']
				);
					$part_3 = array(
					'id_fixture'	=>$_POST['id_fixture_3'],
					'id_cancha'		=>$_POST['id_cancha3'],
					'id_equipo'		=>$_POST['id_equipo3'],
					'id_equipo_b'	=>$_POST['id_equipo_B3']
				);
					$part_4 = array(
					'id_fixture'	=>$_POST['id_fixture_4'],
					'id_cancha'		=>$_POST['id_cancha4'],
					'id_equipo'		=>$_POST['id_equipo4'],
					'id_equipo_b'	=>$_POST['id_equipo_B4']
				);
				//	);
			//cargo el modelo de edicion
				$this->load->model('Admin_model');
				$this->Admin_model->fixture_fecha_editada($part_1,$part_2,$part_3,$part_4);
				redirect(base_url().'admin/fixture');
			} else{
		echo $this->upload->display_errors(); exit();
			}
		}

	public function fixture_fecha_creada_2()
	{
	$this->load->helper('url');

	if ($_POST){
		$hecho = array(
			'hecha'		=>$_POST['hecha'],
			'id_fecha'	=>$_POST['id_fecha'],);

		$contenido = array(
	'id_fecha'	=>$_POST['id_fecha'],
	'id_equipo1'=>$_POST['id_equipo1'],
	'id_equipo2'=>$_POST['id_equipo2'],
	'id_equipo3'=>$_POST['id_equipo3'],
	'id_equipo4'=>$_POST['id_equipo4'],
	'id_equipo_B1' =>$_POST['id_equipo_B1'],
	'id_equipo_B2'=>$_POST['id_equipo_B2'],
	'id_equipo_B3'=>$_POST['id_equipo_B3'],
	'id_equipo_B4'=>$_POST['id_equipo_B4'],
			);
		//cargo el modelo de edicion
		$this->load->model('Admin_model');
		$this->Admin_model->insert_hecho($hecho);
		$this->Admin_model->insert_fixture($contenido);
		redirect(base_url().'admin/fixture');
		} else{
		$this->load->model('Admin_model');
		$data['eq'] = $this->Admin_model->dame_equipos();
		$data['fe'] = $this->Admin_model->dame_fecha_fixture();
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Nueva Fecha";
		$this->load->view('admin/fixture_fecha_creada',$datos_vista);
		}
	}
	public function detalle(){
	$this->load->helper('url');
	$this->load->model('Admin_model');
	$data['ju'] = $this->Admin_model->dame_jugadores();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Nueva Noticia";
	$this->load->view('admin/detalle_C',$datos_vista);
	}
	public function enviar_detalle_A(){
	//print_r($_POST);
	$this->load->helper('url');
	if ($_POST){
		$goles = array(
			'id_1'	=>$_POST['gol_1'],'id_2'	=>$_POST['gol_2'],
			'id_3'	=>$_POST['gol_3'],'id_4'	=>$_POST['gol_4'],
			'id_5'	=>$_POST['gol_5'],'id_6'	=>$_POST['gol_6'],
			'id_7'	=>$_POST['gol_7'],'id_8'	=>$_POST['gol_8'],
			'id_9'	=>$_POST['gol_9'],'id_10'	=>$_POST['gol_10'],
			'id_11'	=>$_POST['gol_11'],'id_12'	=>$_POST['gol_12'],
			'id_13'	=>$_POST['gol_13'],
			'id_1B'	=>$_POST['gol_1B'],'id_2B'		=>$_POST['gol_2B'],
			'id_3B'		=>$_POST['gol_3B'],'id_4B'		=>$_POST['gol_4B'],
			'id_5B'		=>$_POST['gol_5B'],'id_6B'		=>$_POST['gol_6B'],
			'id_7B'		=>$_POST['gol_7B'],'id_8B'		=>$_POST['gol_8B'],
			'id_9B'		=>$_POST['gol_9B'],'id_10B'		=>$_POST['gol_10B'],
			'id_11B'	=>$_POST['gol_11B'],'id_12B'	=>$_POST['gol_12B'],
			'id_13B'	=>$_POST['gol_13B']);
		$ama = array(
			'id_1'	=>$_POST['ama_1'],'id_2'	=>$_POST['ama_2'],
			'id_3'	=>$_POST['ama_3'],'id_4'	=>$_POST['ama_4'],
			'id_5'	=>$_POST['ama_5'],'id_6'	=>$_POST['ama_6'],
			'id_7'	=>$_POST['ama_7'],'id_8'	=>$_POST['ama_8'],
			'id_9'	=>$_POST['ama_9'],'id_10'	=>$_POST['ama_10'],
			'id_11'	=>$_POST['ama_11'],'id_12'	=>$_POST['ama_12'],
			'id_13'	=>$_POST['ama_13'],
			'id_1B'	=>$_POST['ama_1B'],'id_2B'		=>$_POST['ama_2B'],
			'id_3B'		=>$_POST['ama_3B'],'id_4B'		=>$_POST['ama_4B'],
			'id_5B'		=>$_POST['ama_5B'],'id_6B'		=>$_POST['ama_6B'],
			'id_7B'		=>$_POST['ama_7B'],'id_8B'		=>$_POST['ama_8B'],
			'id_9B'		=>$_POST['ama_9B'],'id_10B'		=>$_POST['ama_10B'],
			'id_11B'	=>$_POST['ama_11B'],'id_12B'	=>$_POST['ama_12B'],
			'id_13B'	=>$_POST['ama_13B']);
		$roja = array(
			'id_1'	=>$_POST['roja_1'],'id_2'	=>$_POST['roja_2'],
			'id_3'	=>$_POST['roja_3'],'id_4'	=>$_POST['roja_4'],
			'id_5'	=>$_POST['roja_5'],'id_6'	=>$_POST['roja_6'],
			'id_7'	=>$_POST['roja_7'],'id_8'	=>$_POST['roja_8'],
			'id_9'	=>$_POST['roja_9'],'id_10'	=>$_POST['roja_10'],
			'id_11'	=>$_POST['roja_11'],'id_12'	=>$_POST['roja_12'],
			'id_13'	=>$_POST['roja_13'],
			'id_1B'	=>$_POST['roja_1B'],'id_2B'	=>$_POST['roja_2B'],
			'id_3B'		=>$_POST['roja_3B'],'id_4B'		=>$_POST['roja_4B'],
			'id_5B'		=>$_POST['roja_5B'],'id_6B'		=>$_POST['roja_6B'],
			'id_7B'		=>$_POST['roja_7B'],'id_8B'		=>$_POST['roja_8B'],
			'id_9B'		=>$_POST['roja_9B'],'id_10B'	=>$_POST['roja_10B'],
			'id_11B'	=>$_POST['roja_11B'],'id_12B'	=>$_POST['roja_12B'],
			'id_13B'	=>$_POST['roja_13B']);
		}
	$this->load->model('Admin_model_2');
	$this->Admin_model_2->insert_goles_A($goles);
	$this->Admin_model_2->insert_ama_A($ama);
	$this->Admin_model_2->insert_roja_A($roja);
	//echo "Tus Datos Fueron eviados CORRECTAMENTE";
	//redirect(base_url().'admin/jugadores');
	}
	public function enviar_detalle_B(){
	//print_r($_POST);
	$this->load->helper('url');
	if ($_POST){
		$goles = array(
			'id_1'	=>$_POST['gol_1'],'id_2'	=>$_POST['gol_2'],
			'id_3'	=>$_POST['gol_3'],'id_4'	=>$_POST['gol_4'],
			'id_5'	=>$_POST['gol_5'],'id_6'	=>$_POST['gol_6'],
			'id_7'	=>$_POST['gol_7'],'id_8'	=>$_POST['gol_8'],
			'id_9'	=>$_POST['gol_9'],'id_10'	=>$_POST['gol_10'],
			'id_11'	=>$_POST['gol_11'],'id_12'	=>$_POST['gol_12'],
			'id_13'	=>$_POST['gol_13'],
			'id_1B'	=>$_POST['gol_1B'],'id_2B'		=>$_POST['gol_2B'],
			'id_3B'		=>$_POST['gol_3B'],'id_4B'		=>$_POST['gol_4B'],
			'id_5B'		=>$_POST['gol_5B'],'id_6B'		=>$_POST['gol_6B'],
			'id_7B'		=>$_POST['gol_7B'],'id_8B'		=>$_POST['gol_8B'],
			'id_9B'		=>$_POST['gol_9B'],'id_10B'		=>$_POST['gol_10B'],
			'id_11B'	=>$_POST['gol_11B'],'id_12B'	=>$_POST['gol_12B'],
			'id_13B'	=>$_POST['gol_13B']);
		$ama = array(
			'id_1'	=>$_POST['ama_1'],'id_2'	=>$_POST['ama_2'],
			'id_3'	=>$_POST['ama_3'],'id_4'	=>$_POST['ama_4'],
			'id_5'	=>$_POST['ama_5'],'id_6'	=>$_POST['ama_6'],
			'id_7'	=>$_POST['ama_7'],'id_8'	=>$_POST['ama_8'],
			'id_9'	=>$_POST['ama_9'],'id_10'	=>$_POST['ama_10'],
			'id_11'	=>$_POST['ama_11'],'id_12'	=>$_POST['ama_12'],
			'id_13'	=>$_POST['ama_13'],
			'id_1B'	=>$_POST['ama_1B'],'id_2B'		=>$_POST['ama_2B'],
			'id_3B'		=>$_POST['ama_3B'],'id_4B'		=>$_POST['ama_4B'],
			'id_5B'		=>$_POST['ama_5B'],'id_6B'		=>$_POST['ama_6B'],
			'id_7B'		=>$_POST['ama_7B'],'id_8B'		=>$_POST['ama_8B'],
			'id_9B'		=>$_POST['ama_9B'],'id_10B'		=>$_POST['ama_10B'],
			'id_11B'	=>$_POST['ama_11B'],'id_12B'	=>$_POST['ama_12B'],
			'id_13B'	=>$_POST['ama_13B']);
		$roja = array(
			'id_1'	=>$_POST['roja_1'],'id_2'	=>$_POST['roja_2'],
			'id_3'	=>$_POST['roja_3'],'id_4'	=>$_POST['roja_4'],
			'id_5'	=>$_POST['roja_5'],'id_6'	=>$_POST['roja_6'],
			'id_7'	=>$_POST['roja_7'],'id_8'	=>$_POST['roja_8'],
			'id_9'	=>$_POST['roja_9'],'id_10'	=>$_POST['roja_10'],
			'id_11'	=>$_POST['roja_11'],'id_12'	=>$_POST['roja_12'],
			'id_13'	=>$_POST['roja_13'],
			'id_1B'	=>$_POST['roja_1B'],'id_2B'	=>$_POST['roja_2B'],
			'id_3B'		=>$_POST['roja_3B'],'id_4B'		=>$_POST['roja_4B'],
			'id_5B'		=>$_POST['roja_5B'],'id_6B'		=>$_POST['roja_6B'],
			'id_7B'		=>$_POST['roja_7B'],'id_8B'		=>$_POST['roja_8B'],
			'id_9B'		=>$_POST['roja_9B'],'id_10B'	=>$_POST['roja_10B'],
			'id_11B'	=>$_POST['roja_11B'],'id_12B'	=>$_POST['roja_12B'],
			'id_13B'	=>$_POST['roja_13B']);
		}
	$this->load->model('Admin_model_2');
	$this->Admin_model_2->insert_goles_B($goles);
	$this->Admin_model_2->insert_ama_B($ama);
	$this->Admin_model_2->insert_roja_B($roja);
	}
	public function enviar_detalle_C(){
	//print_r($_POST);
	$this->load->helper('url');
	if ($_POST){
		$goles = array(
			'id_1'	=>$_POST['gol_1'],'id_2'	=>$_POST['gol_2'],
			'id_3'	=>$_POST['gol_3'],'id_4'	=>$_POST['gol_4'],
			'id_5'	=>$_POST['gol_5'],'id_6'	=>$_POST['gol_6'],
			'id_7'	=>$_POST['gol_7'],'id_8'	=>$_POST['gol_8'],
			'id_9'	=>$_POST['gol_9'],'id_10'	=>$_POST['gol_10'],
			'id_11'	=>$_POST['gol_11'],'id_12'	=>$_POST['gol_12'],
			'id_13'	=>$_POST['gol_13'],
			'id_1B'	=>$_POST['gol_1B'],'id_2B'		=>$_POST['gol_2B'],
			'id_3B'		=>$_POST['gol_3B'],'id_4B'		=>$_POST['gol_4B'],
			'id_5B'		=>$_POST['gol_5B'],'id_6B'		=>$_POST['gol_6B'],
			'id_7B'		=>$_POST['gol_7B'],'id_8B'		=>$_POST['gol_8B'],
			'id_9B'		=>$_POST['gol_9B'],'id_10B'		=>$_POST['gol_10B'],
			'id_11B'	=>$_POST['gol_11B'],'id_12B'	=>$_POST['gol_12B'],
			'id_13B'	=>$_POST['gol_13B']);
		$ama = array(
			'id_1'	=>$_POST['ama_1'],'id_2'	=>$_POST['ama_2'],
			'id_3'	=>$_POST['ama_3'],'id_4'	=>$_POST['ama_4'],
			'id_5'	=>$_POST['ama_5'],'id_6'	=>$_POST['ama_6'],
			'id_7'	=>$_POST['ama_7'],'id_8'	=>$_POST['ama_8'],
			'id_9'	=>$_POST['ama_9'],'id_10'	=>$_POST['ama_10'],
			'id_11'	=>$_POST['ama_11'],'id_12'	=>$_POST['ama_12'],
			'id_13'	=>$_POST['ama_13'],
			'id_1B'	=>$_POST['ama_1B'],'id_2B'		=>$_POST['ama_2B'],
			'id_3B'		=>$_POST['ama_3B'],'id_4B'		=>$_POST['ama_4B'],
			'id_5B'		=>$_POST['ama_5B'],'id_6B'		=>$_POST['ama_6B'],
			'id_7B'		=>$_POST['ama_7B'],'id_8B'		=>$_POST['ama_8B'],
			'id_9B'		=>$_POST['ama_9B'],'id_10B'		=>$_POST['ama_10B'],
			'id_11B'	=>$_POST['ama_11B'],'id_12B'	=>$_POST['ama_12B'],
			'id_13B'	=>$_POST['ama_13B']);
		$roja = array(
			'id_1'	=>$_POST['roja_1'],'id_2'	=>$_POST['roja_2'],
			'id_3'	=>$_POST['roja_3'],'id_4'	=>$_POST['roja_4'],
			'id_5'	=>$_POST['roja_5'],'id_6'	=>$_POST['roja_6'],
			'id_7'	=>$_POST['roja_7'],'id_8'	=>$_POST['roja_8'],
			'id_9'	=>$_POST['roja_9'],'id_10'	=>$_POST['roja_10'],
			'id_11'	=>$_POST['roja_11'],'id_12'	=>$_POST['roja_12'],
			'id_13'	=>$_POST['roja_13'],
			'id_1B'	=>$_POST['roja_1B'],'id_2B'	=>$_POST['roja_2B'],
			'id_3B'		=>$_POST['roja_3B'],'id_4B'		=>$_POST['roja_4B'],
			'id_5B'		=>$_POST['roja_5B'],'id_6B'		=>$_POST['roja_6B'],
			'id_7B'		=>$_POST['roja_7B'],'id_8B'		=>$_POST['roja_8B'],
			'id_9B'		=>$_POST['roja_9B'],'id_10B'	=>$_POST['roja_10B'],
			'id_11B'	=>$_POST['roja_11B'],'id_12B'	=>$_POST['roja_12B'],
			'id_13B'	=>$_POST['roja_13B']);
		}
	$this->load->model('Admin_model_2');
	$this->Admin_model_2->insert_goles_C($goles);
	$this->Admin_model_2->insert_ama_C($ama);
	$this->Admin_model_2->insert_roja_C($roja);
	}
	public function enviar_detalle_D(){
	//print_r($_POST);
	$this->load->helper('url');
	if ($_POST){
		$goles = array(
			'id_1'	=>$_POST['gol_1'],'id_2'	=>$_POST['gol_2'],
			'id_3'	=>$_POST['gol_3'],'id_4'	=>$_POST['gol_4'],
			'id_5'	=>$_POST['gol_5'],'id_6'	=>$_POST['gol_6'],
			'id_7'	=>$_POST['gol_7'],'id_8'	=>$_POST['gol_8'],
			'id_9'	=>$_POST['gol_9'],'id_10'	=>$_POST['gol_10'],
			'id_11'	=>$_POST['gol_11'],'id_12'	=>$_POST['gol_12'],
			'id_13'	=>$_POST['gol_13'],
			'id_1B'	=>$_POST['gol_1B'],'id_2B'		=>$_POST['gol_2B'],
			'id_3B'		=>$_POST['gol_3B'],'id_4B'		=>$_POST['gol_4B'],
			'id_5B'		=>$_POST['gol_5B'],'id_6B'		=>$_POST['gol_6B'],
			'id_7B'		=>$_POST['gol_7B'],'id_8B'		=>$_POST['gol_8B'],
			'id_9B'		=>$_POST['gol_9B'],'id_10B'		=>$_POST['gol_10B'],
			'id_11B'	=>$_POST['gol_11B'],'id_12B'	=>$_POST['gol_12B'],
			'id_13B'	=>$_POST['gol_13B']);
		$ama = array(
			'id_1'	=>$_POST['ama_1'],'id_2'	=>$_POST['ama_2'],
			'id_3'	=>$_POST['ama_3'],'id_4'	=>$_POST['ama_4'],
			'id_5'	=>$_POST['ama_5'],'id_6'	=>$_POST['ama_6'],
			'id_7'	=>$_POST['ama_7'],'id_8'	=>$_POST['ama_8'],
			'id_9'	=>$_POST['ama_9'],'id_10'	=>$_POST['ama_10'],
			'id_11'	=>$_POST['ama_11'],'id_12'	=>$_POST['ama_12'],
			'id_13'	=>$_POST['ama_13'],
			'id_1B'	=>$_POST['ama_1B'],'id_2B'		=>$_POST['ama_2B'],
			'id_3B'		=>$_POST['ama_3B'],'id_4B'		=>$_POST['ama_4B'],
			'id_5B'		=>$_POST['ama_5B'],'id_6B'		=>$_POST['ama_6B'],
			'id_7B'		=>$_POST['ama_7B'],'id_8B'		=>$_POST['ama_8B'],
			'id_9B'		=>$_POST['ama_9B'],'id_10B'		=>$_POST['ama_10B'],
			'id_11B'	=>$_POST['ama_11B'],'id_12B'	=>$_POST['ama_12B'],
			'id_13B'	=>$_POST['ama_13B']);
		$roja = array(
			'id_1'	=>$_POST['roja_1'],'id_2'	=>$_POST['roja_2'],
			'id_3'	=>$_POST['roja_3'],'id_4'	=>$_POST['roja_4'],
			'id_5'	=>$_POST['roja_5'],'id_6'	=>$_POST['roja_6'],
			'id_7'	=>$_POST['roja_7'],'id_8'	=>$_POST['roja_8'],
			'id_9'	=>$_POST['roja_9'],'id_10'	=>$_POST['roja_10'],
			'id_11'	=>$_POST['roja_11'],'id_12'	=>$_POST['roja_12'],
			'id_13'	=>$_POST['roja_13'],
			'id_1B'	=>$_POST['roja_1B'],'id_2B'	=>$_POST['roja_2B'],
			'id_3B'		=>$_POST['roja_3B'],'id_4B'		=>$_POST['roja_4B'],
			'id_5B'		=>$_POST['roja_5B'],'id_6B'		=>$_POST['roja_6B'],
			'id_7B'		=>$_POST['roja_7B'],'id_8B'		=>$_POST['roja_8B'],
			'id_9B'		=>$_POST['roja_9B'],'id_10B'	=>$_POST['roja_10B'],
			'id_11B'	=>$_POST['roja_11B'],'id_12B'	=>$_POST['roja_12B'],
			'id_13B'	=>$_POST['roja_13B']);
		}
	$this->load->model('Admin_model_2');
	$this->Admin_model_2->insert_goles_D($goles);
	$this->Admin_model_2->insert_ama_D($ama);
	$this->Admin_model_2->insert_roja_D($roja);
	}


}
