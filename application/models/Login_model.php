<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	public function login($username,$password)
	{
		//print_r($_post);
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		//return $this->db->get('users');
		$q = $this->db->get('users');


		if($q ->num_rows()>0)
		{
			return true;
		}else{
			return false;
		}
	}
	 function login_user($username,$password)
	{
		//echo "$password";d033e22ae348aeb5660fc2140aec35850c4da997
		//echo "$username";
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		//return $this->db->get('users');

		if($query->num_rows() == 1)
		{
			//echo "vamos bien";
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'login','refresh');
		}
	}
}
