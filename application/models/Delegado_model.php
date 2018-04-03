<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Delegado_model extends CI_Model {
 function __construct()
    {
        parent::__construct();
    }

//class Tienda_model extends Model {
function user($user)
 {
 $this->db->where('id', $user);
 return $this->db->get('users');
 }
	function dame_delegado($usr)
  {
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('users.id',$usr);
  //$this->db->where('id',);
  $this->db->join('equipos','equipos.id_equipo=users.id_equipo');
  return $this->db->get();
  }
  function dame_jugadores($ideq)
  {
  $this->db->select('*');
  $this->db->from('jugadores');
  $this->db->join('equipos','equipos.id_equipo = jugadores.id_equipo');
  $this->db->where('jugadores.id_equipo ='.$ideq);
  return $this->db->get();
  }
  function dame_jugadoress()
   {
  $this->db->select('*');
  $this->db->from('jugadores');
  $this->db->join('equipos','equipos.id_equipo = jugadores.id_equipo');
  $this->db->order_by('equipos.id_equipo desc');
  return $this->db->get();
  }
  function dame_jugador($id)
  {
    $this->db->select('*');
    $this->db->from('jugadores');
    $this->db->join('equipos','equipos.id_equipo = jugadores.id_equipo');
    $this->db->order_by('equipos.id_equipo desc');
    $this->db->where('jugadores.id_jugador',$id);
    return $this->db->get();
   }
  function jugador_editado($contenido)
  {
  $this->db->where('id_jugador', $contenido['id_jugador']);
  $this->db->update('jugadores',$contenido);
  return $this->db->get('jugadores');
  }
  function insert_jugador($contenido)
  {
  $this->db->insert('jugadores',$contenido);
  return $this->db->insert_id;
  }
  function buscar_jugador($buscar){
  $this->db->like('nombre_jug',$buscar);
  return $this->db->get('jugadores');
  }
  function elimina_jugador($id)
  {
  $this->db->where('id_jugador', $id);
  return $this->db->delete('jugadores');
  }
  //////////////////////////////////////////////////////////////
  function dame_equipo($ideq)
  {
   $this->db->where('id_equipo', $ideq);
   return $this->db->get('equipos');
    }


  //////////////////////////////////////////////
	function buscar_productos($buscar){
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
    function editar_articulo($contenido)
	{
     $this->db->where('id_prod', $contenido['id_prod']);
	 $this->db->update('PRODUCTOS',$contenido);
	 return $this->db->get('PRODUCTOS');

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
