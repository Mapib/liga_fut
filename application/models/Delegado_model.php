<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Delegado_model extends CI_Model {
 function __construct()
    {
        parent::__construct();
    }

//class Tienda_model extends Model {

	function dame_delegado($user)
  {
  $this->db->select('*');
  $this->db->from('users');
  $this->db->where('users.id',$user);
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
