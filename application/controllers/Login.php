<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('Login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		}

	public function index()
	{
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Ingrso de Sesion';
				$this->load->view('login',$data);
				break;
			case 'Administrador':
				$data['nombre'] = $this->session->userdata('username');
				$data['id'] 	= $this->session->userdata('id');
				$data['perfil'] = $this->session->userdata('perfil');
				redirect(base_url().'admin',$data);
				break;
			case 'Editor':
				$data['nombre'] = $this->session->userdata('username');
				$data['id'] 	= $this->session->userdata('id');
				$data['perfil'] = $this->session->userdata('perfil');
				redirect(base_url().'editor',$data);
				break;
			case 'Delegado':
				$data['username']  = $this->session->userdata('username');
				$data['id'] 	     = $this->session->userdata('id');
				$data['perfil']    = $this->session->userdata('perfil');
        $data['id_equipo'] = $this->session->userdata('id_equipo');
				redirect(base_url().'delegado',$data);
				break;
			default:
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login',$data);
				break;
		}
	}

public function new_user()
	{
    //print_r($_POST);
	if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{																			////|max_length[150]|xss_clean
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]');//|max_length[150]|xss_clean

            //lanzamos mensajes de error si es que los hay

			if($this->form_validation->run() === FALSE)
			{
				$this->index();
			}else{

				$username = $this->input->post('username');
				$password = sha1($this->input->post('password'));
				$check_user = $this->Login_model->login_user($username,$password);

				if($check_user == TRUE)
				{
          //print_r($check_user);
          $data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id' 			      => 		$check_user->id,
	                'perfil'		    =>		$check_user->perfil,
	                'username' 		  => 		$check_user->username,
                  'id_equipo'		  => 		$check_user->id_equipo
            		);
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	public function logout_ci()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login','refresh');//$this->index();
	}
}
