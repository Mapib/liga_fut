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


 }
