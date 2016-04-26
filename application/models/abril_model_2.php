<?php
Class Abril_model extends CI_Model{
	//Crear variables proefidas por cada variable paises el input usuarios

	protected $_arterupestre;
	protected $_paises;
	protected $_usuarios;
	protected $_observaciones;

	function __construct(){
		$this->load->database();
	}
	function get_country(){
		$this->db
					->select('c.countryId, c.country, c.status')
					->from('rawa_cat_country AS  c');
					//Ese as es para ponerle un alias as y el alias
		$query = $this->db->get();
		return $query->result();
	}

	function get_users(){
		//$arte_rupestre= $base_modelo->consulta_a_base('SELECT * FROM arte_rupestre INNER JOIN rawa_cat_country ON "arte_rupestre"."countryid" = "rawa_cat_country"."countryId" INNER JOIN rawa_cat_ownership ON "arte_rupestre"."ownershipid" = "rawa_cat_ownership"."ownershipId" INNER JOIN usuario ON "arte_rupestre"."user_id" = "usuario"."user_id" ORDER BY id ',$conexion);
		$this->db
					->select('c.userId, c.userName, c.lastName, c.status')
					->from('rawa_user AS  c');
					//Ese as es para ponerle un alias as y el alias
		$query = $this->db->get();
		return $query->result();
	}

	public function inserta_pais()
	{
		$bolean_if=TRUE;
     $posts = $this->input->post();
     //echo "Estoy en el modelo";
     //print_r($posts);
     $this->_arterupestre  = $posts["arte_rupestre_input"];
     $this->_paises = $posts["select_paises"];
     $this->_usuarios  = $posts["select_users"];
     $this->_observaciones  = $posts["observaciones"];
     $this->db
					->select('arte_rupestre')
					->from('rawa_abril')
					->where('arte_rupestre', $this->_arterupestre);
					//Ese as es para ponerle un alias as y el class_alias()
	$query_busqueda = $this->db->get();
	if($query_busqueda->result()){
		$bolean_if=FALSE;
		 $otravar='Hay un campo repetido';
	}
	else{
		$bolean_if=TRUE;
		$otravar='';
	}
     try {
     		if ($bolean_if) {
     			
           $this->db->set('arte_rupestre',  $this->_arterupestre);
           $this->db->set('pais',  $this->_paises);
           $this->db->set('usuario',  $this->_usuarios);
           $this->db->set('observaciones',  $this->_observaciones);
           //$this->db->set('pais',  1);           
            $this->db->insert("rawa_abril");
            return array('inserta' => TRUE, 'mensaje' => '');
        }	
        	else{
        		return array('inserta' => FALSE, 'mensaje' => 'Tiene un campo repetido');
        	}
        } catch (Exception $e) {

            return array('inserta' => false, 'mensaje' => $this->db->last_query());   
      }
      
}
	//Aqui termina la clase del modelo o.o e que shii

	//Crear un metodo de inserta pas  e iguarlo al contenido que tenga nuestro formulario despues hacer un insert y hacerlo con try catch


} 

?>