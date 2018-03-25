<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {
	
if($this->session->userdata('username')):		

	public function index()
	{
		echo "estamos en administrador";
		//cargo el helper de url, con funciones para trabajo con URL del sitio
		//$this->load->helper('url');
		//$this->load->view('admin/inicio');
	}
	
	
 }	
}
