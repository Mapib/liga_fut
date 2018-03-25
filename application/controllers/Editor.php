<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editor extends CI_Controller {


	public function index()
	{
		//echo "estamos en editor";
		//cargo el helper de url, con funciones para trabajo con URL del sitio
		$this->load->helper('url');
		$this->load->view('editor/plantilla');
	}



}
