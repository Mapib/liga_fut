<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delegado extends CI_Controller {



	public function index()
	{
		//echo "estamos en Delegado";
	$this->load->helper('url');
	$user = $this->session->userdata('id');
	$this->load->model('Delegado_model');
  $data['del']  = $this->Delegado_model->dame_usuario($user);
	$data['jug']  = $this->Delegado_model->dame_jugadores($user);
  $datos_vista = array('query' => $data);
	$datos_vista['title'] = "Liga Fut | Delegados";
	$this->load->view('delegado/plantilla',$datos_vista);
	}


 }
