<?php
Class Abril_model extends CI_Model{
	//Crear variables proefidas por cada variable paises el input usuarios

	protected $_arterupestre;
	protected $_paises;
	protected $_usuarios;
	protected $_observaciones;
	protected $_id;

	//Esto es del login
	protected $_emailuser;
	protected $_passuser;

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
     $posts = $this->input->post();
     //echo "Estoy en el modelo";
     //print_r($posts);
     $this->_arterupestre  = $posts["arte_rupestre_input"];
     $this->_paises = $posts["select_paises"];
     $this->_usuarios  = $posts["select_users"];
     $this->_observaciones  = $posts["observaciones"];
    
     try {
     			
           $this->db->set('arte_rupestre',  $this->_arterupestre);
           $this->db->set('pais',  $this->_paises);
           $this->db->set('usuario',  $this->_usuarios);
           $this->db->set('observaciones',  $this->_observaciones);
           //$this->db->set('pais',  1);           
            $this->db->insert("rawa_abril");
            return array('inserta' => TRUE, 'mensaje' => '');
        } catch (Exception $e) {

            return array('inserta' => false, 'mensaje' => $this->db->last_query());   
      }
      
}
	//Aqui termina la clase del modelo o.o e que shii

	//Crear un metodo de inserta pas  e iguarlo al contenido que tenga nuestro formulario despues hacer un insert y hacerlo con try catch


	public function busca_ar(){
		$posts = $this->input->post();
	    $this->_arterupestre  = $posts["arte_rupestre_input"];
	    $this->_observaciones  = $posts["observaciones"];
		try{
			$this->db->select('arte_rupestre')
					->from('rawa_abril')
					->where('arte_rupestre', $this->_arterupestre)
					->or_where('observaciones', $this->_observaciones);
			$query_busquedas=$this->db->get();
			if($query_busquedas->result()){
				 return array('busqueda' => false, 'mensaje' => 'Ya existe un registro existente');
			}
			else{
				 return array('busqueda' => true, 'mensaje' => '');
			}
		}
		catch (Exception $e) {
	            return array('busqueda' => false, 'mensaje' => $this->db->last_query());   
	      }    
	}
	public function get_tabla_principal(){
	$this->db->select('ra.id_abril,ra.arte_rupestre, ra.pais, ra.usuario, ra.observaciones, rc.country,rc.countryId, ru.userName, ru.lastName, ru.userId')
				->from('rawa_abril AS ra')
				->join('rawa_cat_country AS rc', 'ra.pais = rc.countryId')
				->join('rawa_user AS ru', 'ra.usuario=ru.userId');
				//->where('ra.id_abril>', 5);

	$query=$this->db->get();
	//echo $this->db->last_query();
	//exit();
	return $query->result();

	}

//Aqui empieza la funcion de editar
	public function obtener_registro(){
			$this->_id = $this->input->get('obtener');
		   	$this->db->select('ra.id_abril,ra.arte_rupestre, ra.pais, ra.usuario, ra.observaciones, rc.country,rc.countryId, ru.userName, ru.lastName, ru.userId')
		   		->from('rawa_abril AS ra')
		   		->join('rawa_cat_country AS rc','ra.pais=rc.countryId')
		   		->join('rawa_user AS ru','ra.usuario=ru.userId')
				->where('ra.id_abril', $this->_id);
		   		$query =$this->db->get();
		   		//echo $this->db->last_query();
		   		return $query->result();	   	
	}

	public function formulario_update()
	{
     $posts = $this->input->post();
     //echo "Estoy en el modelo";
     //print_r($posts);
     $this->_arterupestre  = $posts["arte_rupestre_input"];
     $this->_paises = $posts["select_paises"];
     $this->_usuarios  = $posts["select_users"];
     $this->_observaciones  = $posts["observaciones"];
    
     try {
     			
           $this->db->set('arte_rupestre',  $this->_arterupestre);
           $this->db->set('pais',  $this->_paises);
           $this->db->set('usuario',  $this->_usuarios);
           $this->db->set('observaciones',  $this->_observaciones);
           $this->db->where('id_abril',$this->_id);
	    	$this->db->update("rawa_abril");      
            return array('busqueda' => TRUE, 'mensaje' => '');
        } catch (Exception $e) {

            return array('busqueda' => false, 'mensaje' => $this->db->last_query());   
      }
      
}


	public function borra($id)
		   {
		    	try{
		    		
		    		$this->db->where('id_abril',$id);
		    		$this->db->delete("rawa_abril");
		            //echo $this->db->last_query();
		            return array('borra' => TRUE, 'mensaje' => '');
				

		        } catch (Exception $e) {
		            return array('borra' => false, 'mensaje' => $this->db->last_query());   
		      }

		      	
		   }


	public function validate_login(){
		$posts = $this->input->post();
		$this->_emailuser  = $posts["email_user"];
     	$this->_passuser = $posts["pass_user"];
     	try{
     	$this->db->select('ru.userName, ru.name, ru.passwordUser, ru.profileId, ru.status, ru.userId, pa.rol')
     	->from('rawa_user AS ru')
     	->join('perfil_abril AS pa','ru.profileId=pa.user_id')
        ->where('ru.userName',$this->_emailuser)
        ->where('ru.passwordUser',$this->_passuser); 
	   	$query =$this->db->get();
	   	if($query->result()){
			return array('busqueda_login' => true, 'mensaje' => 'Login correcto', 'resultado'=>$query->result());
			}
			else{
				 return array('busqueda_login' => false, 'mensaje' => 'La contraseña o el usuario es incorrecto', 'resultado'=>'no hay registros');
			}
		}
		catch (Exception $e) {
	            return array('busqueda_login' => false, 'mensaje' => $this->db->last_query(), 'resultado'=>'Ocurrio un error de por si');   
	      }    

	}
	//Quieres escaparte conmigo a c& e hay zapatos de compra uno y el otro al 50%
//Aqui termino la clasex

		}
	?>