<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {
 function __construct()
    {
        parent::__construct();
    }

	function dame_usuario($user)
  {
  $this->db->select('*');
  $this->db->where('id',$user);
  $this->db->from('users');
  return $this->db->get();
  }
  function dame_jugadores()
  {
  $this->db->select('*');
  $this->db->order_by('jugadores.id_equipo');
  $this->db->from('jugadores');
  $this->db->join('equipos','equipos.id_equipo=jugadores.id_equipo');
  return $this->db->get();
  }
  function dame_jugador($id)
  {
  $this->db->select('*');
  $this->db->where('jugadores.id_jugador', $id);
  $this->db->from('jugadores');
  $this->db->join('equipos','equipos.id_equipo=jugadores.id_equipo');
  return $this->db->get();
    }
	function buscar_productos($buscar)
  {
	$this->db->like('nombre',$buscar);
	return $this->db->get('PRODUCTOS');
	/*if ($data->num_rows() > 0){
		return $query;
	}else{ return FALSE; }*/
	}
  function dame_articulo($id)
  {
  $this->db->where('id_prod', $id);
	return $this->db->get('PRODUCTOS');

   }
   function insert_articulo($contenido)
  {
   $this->db->insert('productos',$contenido);
	 return $this->db->insert_id;

   }
	function elimina_articulo($id)
	{
	$this->db->where('id_prod', $id);
	return $this->db->delete('PRODUCTOS');

	}
  function jugador_editado($contenido)
	{
  //print_r($contenido);
  $this->db->where('id_jugador', $contenido['id_jugador']);
	$this->db->update('jugadores',$contenido);
	return $this->db->get('jugadores');
	}




   function dame_subcategoria($id){
      $ssql = "select * from subcategorias where id_subcategoria=" . $id;
      $rs = mysql_query($ssql);
      if (mysql_numrows($rs)==0){
         return false;
      }else{
         return mysql_fetch_array($rs);
      }
   }
   function dame_categoria($id){
      $ssql = "select * from categorias where id_categoria=" . $id;
      $rs = mysql_query($ssql);
      if (mysql_numrows($rs)==0){
         return false;
      }else{
         return mysql_fetch_array($rs);
      }
   }


 }
