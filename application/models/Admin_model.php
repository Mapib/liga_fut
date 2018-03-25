<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
	}

	//////////////////////////////////////noticias////////////////////////////
	function user($usr)
   {
	 $this->db->where('id', $usr);
	 return $this->db->get('users');

   }
	function dame_noticias()
   {
	$this->load->database();
	$this->db->order_by('id_noticia desc');
	return $this->db->get('noticias');

   }
	function dame_noticia($id)
  {
   $this->db->where('id_noticia', $id);
	 return $this->db->get('noticias');

   }
   function noti_editada($contenido)
	{
   $this->db->where('id_noticia', $contenido['id_noticia']);
	 $this->db->update('noticias',$contenido);
	 return $this->db->get('noticias');

	}
	function insert_noti($contenido)
  {
     $this->db->insert('noticias',$contenido);
	 return $this->db->insert_id;

   }
   function elimina_noticia($id)
	{
	$this->db->where('id_noticia', $id);
	return $this->db->delete('noticias');
	}

	////////////////////////////////////Directivos//////////////////////////////////////
   function dame_directiva()
   {
	$this->load->database();
	//$this->db->order_by('id_noticia desc');
	return $this->db->get('directiva');
	}
	function dame_directivo($id)
	{
   $this->db->where('id_directiva', $id);
	 return $this->db->get('directiva');
    }
	function dire_editado($contenido)
	{
  $this->db->where('id_directiva', $contenido['id_directiva']);
	$this->db->update('directiva',$contenido);
	return $this->db->get('directiva');
    }
	function insert_dire($contenido)
	{
   $this->db->insert('directiva',$contenido);
	 return $this->db->insert_id;
    }
	function elimina_directiva($id)
	{
	$this->db->where('id_directiva', $id);
	return $this->db->delete('directiva');
	}
	///////////////////////////////////////////series////////////////////////////////////////////////
	function dame_series()
   {
	$this->load->database();
	//$this->db->order_by('id_noticia desc');
	return $this->db->get('series');
	}
	function dame_serie($id)
	{
     $this->db->where('id_serie', $id);
	 return $this->db->get('series');
    }
	function serie_editada($contenido)
	{
   $this->db->where('id_serie', $contenido['id_serie']);
	 $this->db->update('series',$contenido);
	 return $this->db->get('series');
    }
	function elimina_serie($id)
	{
	$this->db->where('id_serie', $id);
	return $this->db->delete('series');
	}
	function insert_serie($contenido)
	{
     $this->db->insert('series',$contenido);
	 return $this->db->insert_id;
    }
	///////////////////////////////////////////Canchas////////////////////////////////////////////////
	function dame_canchas()
 {
 $this->db->SELECT('*');
 $this->db->from('canchas');
 $this->db->order_by('canchas.id_cancha desc');
 return $this->db->get();
 }
 function dame_cancha($id)
 {
 $this->db->where('id_cancha', $id);
return $this->db->get('canchas');
}
function cancha_editada($contenido)
{
 $this->db->where('id_cancha', $contenido['id_cancha']);
 $this->db->update('canchas',$contenido);
 return $this->db->get('canchas');
}
function insert_cancha($contenido)
{
$this->db->insert('canchas',$contenido);
return $this->db->insert_id;
	}
   ///////////////////////////////////////////equipos////////////////////////////////////////////////
   function dame_equipos()
  {
	$this->db->SELECT('*');
	$this->db->from('equipos');
	//$this->db->join('delegado','equipos.id_delegado = delegado.id_delegado');
	//$this->db->join('canchas','equipos.id_cancha = canchas.id_cancha');
	$this->db->order_by('equipos.id_equipo desc');
	return $this->db->get();
	}
	function dame_equipo($id)
	{
   $this->db->where('id_equipo', $id);
	 return $this->db->get('equipos');
    }
	function equipo_editado($contenido)
	{
	$this->db->where('id_equipo', $contenido['id_equipo']);
	$this->db->update('equipos',$contenido);
	return $this->db->get('equipos');
	}
	function insert_equipo($contenido)
	{
     $this->db->insert('equipos',$contenido);
	 return $this->db->insert_id;
    }
	function elimina_equipo($id)
	{
	$this->db->where('id_equipo', $id);
	return $this->db->delete('equipos');
	}
   ///////////////////////////////////////////Arbitros////////////////////////////////////////////////
	function dame_arbitros()
   {
	$this->load->database();
	//$this->db->order_by('puntos desc');
	return $this->db->get('arbitros');
	}
	function dame_arbitro($id)
	{
     $this->db->where('id_arbitro', $id);
	 return $this->db->get('arbitros');
    }
	function arbitro_editado($contenido)
	{
	$this->db->where('id_arbitro', $contenido['id_arbitro']);
	$this->db->update('arbitros',$contenido);
	return $this->db->get('arbitros');
	}
	function insert_arbitro($contenido)
	{
     $this->db->insert('arbitros',$contenido);
	 return $this->db->insert_id;
    }
	function elimina_arbitro($id)
	{
	$this->db->where('id_arbitro', $id);
	return $this->db->delete('arbitros');
	}
	 ///////////////////////////////////////////Deñlegados////////////////////////////////////////////////
	function dame_delegados()
    {
 	$this->load->database();
	$this->db->select('*');
 	$this->db->from('delegados');
 	$this->db->join('equipos','equipos.id_equipo = delegados.id_equipo');
 	$this->db->order_by('equipos.id_equipo desc');
 	return $this->db->get();
 	}
 	function dame_delegado($id)
 	{
  $this->db->select('*');
  $this->db->from('delegados');
  $this->db->join('equipos','equipos.id_equipo=delegados.id_equipo');
	$this->db->where('delegados.id_delegado',$id);
  return $this->db->get();
  }
 	function delegado_editado($contenido)
 	{
 	$this->db->where('id_delegado', $contenido['id_delegado']);
 	$this->db->update('delegados',$contenido);
 	return $this->db->get('delegados');
 	}
 	function insert_delegado($contenido)
 	{
  $this->db->insert('delegados',$contenido);
 	return $this->db->insert_id;
  }
 	function elimina_delegados($id)
 	{
 	$this->db->where('id_delegado', $id);
 	return $this->db->delete('delegados');
 	}
	///////////////////////////////////////////Jugadores////////////////////////////////////////////////
	function dame_jugadores()
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
	///////////////////////////////////////////goles////////////////////////////////////////////////
	function dame_goles($id)
	{
	$this->db->where('id_jugador',$id);
	return $this->db->get('goles');
	}
	function dame_tarjetas_ama($id)
	{
	$this->db->where('id_jugador',$id);
	$this->db->where('id_tarjeta','1');
	return $this->db->get('tarjetero');
	}
	function dame_tarjetas_roj($id)
	{
	$this->db->where('id_jugador',$id);
	$this->db->where('id_tarjeta','2');
	return $this->db->get('tarjetero');
	}
	///////////////////////////////////////////fechas////////////////////////////////////////////////
	function dame_fechas()
	{
	return $this->db->get('fechas');
	}
	function fecha_editada($contenido){
	$this->db->where('id_fecha', $contenido['id_fecha']);
	$this->db->update('fechas',$contenido);
	return $this->db->get('fechas');
	}
	function dame_fixture()
	{
	return $this->db->query('SELECT A.*, B.nombre_fecha,B.fecha,C.nombre_cancha,C.direc_cancha,D.nom_equipo,D.insignia,E.nom_equipo as viky,E.insignia as img_2
	FROM fixture A, fechas B, canchas C, equipos D,equipos E
	WHERE  A.id_equipo=D.id_equipo
	AND A.id_fecha=B.id_fecha
	AND A.id_cancha=C.id_cancha
	AND A.id_equipo_b=E.id_equipo ');
	}
	function dame_fixture_2()
	{
	return $this->db->query('SELECT A.*, B.nombre_fecha,B.fecha,C.nombre_cancha,C.direc_cancha,D.nom_equipo,D.insignia,E.nom_equipo as viky,E.insignia as img_2
	FROM fixture A, fechas B, canchas C, equipos D,equipos E
	WHERE  A.id_equipo=D.id_equipo
	AND A.id_fecha=B.id_fecha
	AND A.id_cancha=C.id_cancha
	AND A.id_equipo_b=E.id_equipo
	AND B.status !="2"');
	}
	function dame_fixture_3($id)
	{
	return $this->db->query("SELECT A.*,C.nombre_cancha,C.direc_cancha,D.nom_equipo,D.insignia,E.nom_equipo as viky,E.insignia as img_2
	FROM fixture A, canchas C, equipos D,equipos E
	WHERE  A.id_equipo=D.id_equipo
	AND A.id_cancha=C.id_cancha
	AND A.id_equipo_b=E.id_equipo
	AND A.id_fixture =' ".$id." ' ");
	}
	function dame_fecha_fixture($id)
	{
		$this->db->select('*');
	 	$this->db->from('fixture');
	 	$this->db->join('fechas','fechas.id_fecha = fixture.id_fecha');
	 	$this->db->where('fixture.id_fecha',$id);
		return $this->db->get();
	}
	function dame_partido()
	{
	return $this->db->query('SELECT A.*, B.nom_arbitro, C.nom_equipo,D.nombre_serie, E.nom_equipo as viky, f.*
FROM resultados A, arbitros B, equipos C, series D, equipos E, fecha_fixture F
	WHERE A.id_arbitro=B.id_arbitro
	AND A.id_equipo=C.id_equipo
	AND A.id_equipo_b=E.id_equipo
	AND A.id_serie=D.id_serie
    AND A.id_fecha=F.id_fecha
    ORDER by F.id_fecha ASC');
	}
	function dame_fecha_informe()
	{
	$this->db->where('status=1');
	return $this->db->get('fecha_fixture');
	}
	function dame_fecha_fixture_hecha()
	{
	$this->db->where('hecha=0');
	return $this->db->get('fecha_fixture');
	}
	///////////////////////////////////////////Informes////////////////////////////////////////////////
	function dame_informes()
   {
	return $this->db->query('SELECT A.*, B.nom_arbitro,C.nom_arbitro as arb_2,D.nom_arbitro as arb_3, E.nom_arbitro as arb_4, F.nom_equipo,G.nom_equipo AS viky, H.nombre_fecha,H.fecha_partido
	FROM resultados A, arbitros B, arbitros C, arbitros D,arbitros E, equipos F, equipos G,fecha_fixture H
	WHERE  A.id_equipo=F.id_equipo
	AND A.id_arbitro_B=D.id_arbitro
	AND A.id_arbitro_C=E.id_arbitro
	AND A.id_arbitro_D=B.id_arbitro
	AND A.id_arbitro_A=C.id_arbitro
	AND A.id_equipo_b=G.id_equipo
	AND A.id_fecha=H.id_fecha');
	}
	function fixture_fecha_editada($part_1,$part_2,$part_3,$part_4)
	{
		/*print_r($part_1);echo "<br>";
		print_r($part_2);echo "<br>";
		print_r($part_3);echo "<br>";
		print_r($part_4);echo "<br>";*/
		$this->db->where('id_fixture',$part_1['id_fixture']);
		$this->db->update('fixture',$part_1);
		$this->db->where('id_fixture',$part_2['id_fixture']);
		$this->db->update('fixture',$part_2);
		$this->db->where('id_fixture',$part_3['id_fixture']);
		$this->db->update('fixture',$part_3);
		$this->db->where('id_fixture',$part_4['id_fixture']);
		$this->db->update('fixture',$part_4);
		return $this->db->get('fixture');
	}
	function fixture_fecha_creada($part_1,$part_2,$part_3,$part_4)
	{
		$this->db->insert('fixture',$part_1);
		$this->db->insert('fixture',$part_2);
		$this->db->insert('fixture',$part_3);
		$this->db->insert('fixture',$part_4);
		return $this->db->insert_id;
	}
	function dame_fecha($id)
	{
  $this->db->where('id_fecha',$id);
	return $this->db->get('fechas');
  }
	 function insert_fecha($contenido)
	{
   $this->db->insert('fechas',$contenido);
	 return $this->db->insert_id;
  }
	function insert_fixture($contenido)
	{
	//echo($contenido['id_equipo1']);
	$data = array(
 array(
 'id_resultado'	=> 'NULL',
 'id_equipo' 	=> ($contenido['id_equipo1']),
 'id_equipo_B' 	=> ($contenido['id_equipo_B1']),
 'id_fecha' 	=> ($contenido['id_fecha'])
 ),
 array(
 'id_resultado'	=> 'NULL',
 'id_equipo' 	=> ($contenido['id_equipo2']),
 'id_equipo_B' 	=> ($contenido['id_equipo_B2']),
 'id_fecha' 	=> ($contenido['id_fecha'])
 ),
 array(
 'id_resultado'	=> 'NULL',
 'id_equipo' 	=> ($contenido['id_equipo3']),
 'id_equipo_B' 	=> ($contenido['id_equipo_B3']),
 'id_fecha' 	=> ($contenido['id_fecha'])
 ),
 array(
 'id_resultado'	=> 'NULL',
 'id_equipo' 	=> ($contenido['id_equipo4']),
 'id_equipo_B' 	=> ($contenido['id_equipo_B4']),
 'id_fecha' 	=> ($contenido['id_fecha'])
 )
);
	$this->db->insert_batch('resultados',$data);
}
function insert_hecho($contenido){
	$this->db->where('id_fecha', $contenido['id_fecha']);
	$this->db->update('fecha_fixture',$contenido);
}
function fixture()
	{
	return $this->db->query('SELECT A.*,B.status,F.nom_equipo,G.nom_equipo AS viky
	FROM resultados A, fecha_fixture B, equipos F, equipos G
	WHERE  A.id_equipo=F.id_equipo
	AND A.id_equipo_b=G.id_equipo
  AND A.id_fecha=B.id_fecha ');
	}
	function dame_resultado($id)
	{
	return $this->db->query("
		SELECT A.*, B.*,C.foto, C.nom_equipo, D.foto as foto_2, D.nom_equipo as viky
	FROM resultados A, fecha_fixture B, equipos C, equipos D
	WHERE A.id_fecha=B.id_fecha
    AND A.id_equipo=C.id_equipo
    AND A.id_equipo_B=D.id_equipo
    AND A.id_resultado=' ".$id." ' ");
    }
    function arb_programados($part_1,$part_2,$part_3,$part_4)
		{
			//$a= array('arb_prog'=>'1');
			$this->db->insert('arb_prog',$part_1);
			$this->db->insert('arb_prog',$part_2);
			$this->db->insert('arb_prog',$part_3);
			$this->db->insert('arb_prog',$part_4);
			return $this->db->insert_id;
    }
		function arb_listos($part_0){
			$this->db->where('id_fixture',$part_0['id_fixture']);
			$this->db->update('fixture',$part_0);
		}
    function dame_resultado_2($id)
	{
	return $this->db->query("SELECT A.*, B.*,C.foto, C.nom_equipo,D.foto as foto_2, D.nom_equipo as viky, E.nom_arbitro as arb_1,F.nom_arbitro as arb_2,G.nom_arbitro as arb_3,H.nom_arbitro as arb_4
	FROM resultados A, fecha_fixture B, equipos C, equipos D, arbitros E,arbitros F,arbitros G,arbitros H
	WHERE A.id_fecha=B.id_fecha
	AND A.id_arbitro_A=E.id_arbitro
	AND A.id_arbitro_B=F.id_arbitro
	AND A.id_arbitro_C=G.id_arbitro
	AND A.id_arbitro_D=H.id_arbitro
	AND A.id_equipo=C.id_equipo
	AND A.id_equipo_B=D.id_equipo
	 AND A.id_resultado=' ".$id." ' ");
	}


}
