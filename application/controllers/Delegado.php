<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delegado extends CI_Controller {



	public function index()
	{
	//echo "estamos en Delegado";
	$this->load->helper('url');
	$ideq = $this->session->userdata('id_equipo');
	$user = $this->session->userdata('id');
	$this->load->model('Delegado_model');
  $data['del']  = $this->Delegado_model->dame_delegado($user);
	$data['jug']  = $this->Delegado_model->dame_jugadores($ideq);
  $datos_vista = array('query' => $data);
	$datos_vista['title'] = "Liga Fut | Delegados";
	$datos_vista['vista'] = "jugadores";
	$this->load->view('delegado/plantilla',$datos_vista);
	}
	public function jugadores(){
	$this->load->helper('url');
	$ideq = $this->session->userdata('id_equipo');
	$usr = $this->session->userdata('id');
	$this->load->model('Delegado_model');
	$data['del']  = $this->Delegado_model->dame_delegado($usr);
	$data['usr'] = $this->Delegado_model->user($usr);
	$data['jug'] = $this->Delegado_model->dame_jugadores();
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Listado de Jugadores";
	$datos_vista['vista'] = "jugadores";
	$this->load->view('admin/plantilla',$datos_vista);
	}//nuevo_jugador
	public function editar_jug($id){
	$this->load->helper('url');
	$ideq = $this->session->userdata('id_equipo');
	$user = $this->session->userdata('id');
	$this->load->model('Delegado_model');
	$data['del']  = $this->Delegado_model->dame_delegado($user);
	$data['usr'] = $this->Delegado_model->user($user);
	$data['jug'] = $this->Delegado_model->dame_jugador($id);
	$datos_vista = array('query' => $data);
	$datos_vista['vista'] = "editar_jugador";
	$datos_vista['title'] = "Editando Jugador";
	$this->load->view('delegado/plantilla',$datos_vista);
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
		$this->load->model('Delegado_model');
		$this->Delegado_model->jugador_editado($contenido);
		redirect(base_url().'delegado/jugadores');
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
	$this->load->model('Delegado_model');
	$this->Delegado_model->jugador_editado($contenido);
	redirect(base_url().'delegado/jugadores');
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
			$this->load->model('Delegado_model');
			$this->Delegado_model->jugador_editado($contenido);
			redirect(base_url().'admin/jugadores');
		}

	}
	public function nuevo_jugador()
	{
		$this->load->helper('url');
		$ideq = $this->session->userdata('id_equipo');
		$user = $this->session->userdata('id');
		if ($_POST){
		$mi_archivo = 'imagen';

		$config['upload_path'] = './imagenes/jugadores/';
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
			'id_equipo'				=>$_POST['id_equipo'],
			'foto_jug'				=>$nom_imag
			);
			//cargo el modelo de artículos
			$this->load->model('Delegado_model');
			$this->Delegado_model->insert_jugador($contenido);
			redirect(base_url().'delegado/jugadores');
			}
		}else{
			$this->load->helper('url');
			$ideq = $this->session->userdata('id_equipo');
			$usr = $this->session->userdata('id');
			$this->load->model('Delegado_model');
			$data['del']  = $this->Delegado_model->dame_delegado($user);
			$data['usr'] = $this->Delegado_model->user($usr);
			$datos_vista = array('query' => $data);
			$datos_vista['title'] = "Nuevo Jugador";
			$datos_vista['vista'] = "nuevo_juga";
			$datos_vista['id_eq'] = $ideq;
			$this->load->view('delegado/plantilla',$datos_vista);
		}
	}
	public function buscar_jugador(){
		$this->load->helper('url');
		$ideq = $this->session->userdata('id_equipo');
		$user = $this->session->userdata('id');
		$this->load->model('Delegado_model');
		$data['del']  = $this->Delegado_model->dame_delegado($user);
		$buscar = $this->input->get('query', TRUE);
		$data = $this->Delegado_model->buscar_jugador(trim($buscar));
		$datos_vista = array('query' => $data);
		$datos_vista['title'] = "Listado de Jugadores";
		$this->load->view('delegado/jugadores', $datos_vista);

	}
	public function eliminar_jugador($id)
	{
		$this->load->helper('url');
		$this->load->model('Delegado_model');
		$data = $this->Delegado_model->elimina_jugador($id);
		redirect(base_url().'delegado/jugadores');
	}
	public function datos_del_jugador($id)
	{
		$this->load->helper('url');
		$ideq = $this->session->userdata('id_equipo');
		$user = $this->session->userdata('id');
		$this->load->model('Delegado_model');
		$data['del']  = $this->Delegado_model->dame_delegado($user);
		$data['gol'] = $this->Delegado_model->dame_goles($id);
		$data['ama'] = $this->Delegado_model->dame_tarjetas_ama($id);
		$data['roj'] = $this->Delegado_model->dame_tarjetas_roj($id);
		$data['usr'] = $this->Delegado_model->user($usr);
		$data['jug'] = $this->Delegado_model->dame_jugador($id);
		$datos_vista = array('query' => $data);
		$datos_vista['vista'] = "datos_jugador";
		$datos_vista['title'] = "Estadisticas del Jugador";
		$this->load->view('delegado/plantilla',$datos_vista);
	}
	//////////////////////////////////////////////////////////////////
	public function cambiar_pass()
	{
	$user = $this->session->userdata('id');
	$this->load->helper('url');
	$this->load->model('Delegado_model');
	$data['del']  = $this->Delegado_model->dame_delegado($user);
	$data['user'] = $this->Delegado_model->user($user);
	$datos_vista = array('query' => $data);
	$datos_vista['vista'] = "cambiar_pass";
	$datos_vista['title'] = "Cambiar Contraseña";
	$this->load->view('delegado/plantilla',$datos_vista);
	}
	///////////////////////////////////////////////////////////////////
	public function equipo()
	{
	$user 	= $this->session->userdata('id');
	$ideq = $this->session->userdata('id_equipo');
	$this->load->helper('url');
	$this->load->model('Delegado_model');
	$data['del'] = $this->Delegado_model->dame_delegado($user);
	$data['usr'] = $this->Delegado_model->user($user);
	$data['eqi'] = $this->Delegado_model->dame_equipo($ideq);
	$datos_vista = array('query' => $data);
	$datos_vista['title'] = "Nuestro Equipo";
	$datos_vista['vista'] = "equipos";
	$this->load->view('delegado/plantilla',$datos_vista);
	}










 }
