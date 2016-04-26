<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abril extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');//Hleper siempre va arriba
		//Pasar variables desde controlador
		$this->load->model('abril_model');
		$this->load->library('session');
		//Todo lo que tnego en el constrctor se hereda en todos los metodos
	}
	public function index()
	{	
		
		echo '<pre>';
			print_r($this->session->userdata);
		echo '</pre>';
		if($this->session->userdata('rol')){
	switch ($this->session->userdata('rol')) {	
			case 'admin':

				$color = 'green';
				break;
			case 'editor':
				
				$color = 'orange';
				break;	
			case 'user':
				$color = 'blue';	
				break;
			default:
				$color = 'none';
				
				redirect('login', 'refresh');
				break;
				}
				$data=array('data_user'=>$this->session->userdata,
							'color'=>$color);
				$this->load->view('header');
				$this->load->view('rol', $data);
				$this->load->view('footer');
					
				}
				else{
						$this->load->view('header');
					$this->load->view('login');
					$this->load->view('footer');
				}		
	}
	public function validate_user()
	{	
		$query_result=$this->abril_model->validate_login();
	
		if($query_result['busqueda_login']){
		foreach ($query_result['resultado'] as $row)
		{
		$nuevosdatos = array(
                   'nombre'  =>$row->name,
                   'email'     => $row->userName,
                   'rol' => $row->rol
               );
		}
		$this->session->set_userdata($nuevosdatos);
		
		}
		
			$response_abril = array(
            'exito_abril'=> $query_result['busqueda_login']
            , 'mensaje_abril' =>  $query_result ['mensaje']
        //if ternario
        );
    	echo json_encode($response_abril); 
		
	}
	public function destroy_session(){
		$this->session->sess_destroy(); 
		header("location:index");
	}

	//Termina gestion de usuarios
	public function index_crud(){

		//$data['variable']="variable codeigniter";
		//echo "hola mundo cruel";
		//$get_country = $this ->abril_model-> get_country();
		$get_tabla_principal = $this->abril_model->get_tabla_principal();
		$data = array('ejemplo'=> $get_tabla_principal);
		//Pasar variables desde controlador
		//$this->load->view('abril_vista', $data);
		$this->load->view('header');
		$this->load->view('crud_vista', $data);
		$this->load->view('footer');
	}
	public function show_principal(){
		$this->load->view('principal');
	}
	function formulario_editar(){
		$get_registro=$this->abril_model->obtener_registro();
		$get_country = $this->abril_model->get_country();
        $get_user = $this->abril_model->get_users();
        $data=array('arregloid' =>$get_registro,
                    'arreglopaises'=>$get_country,
                    'arreglousuarios' =>$get_user           
            );
		$this->load->view('header');
		$this->load->view('vista_editar', $data);
		$this->load->view('footer');
	}

	/*
	        public function editar()
    {

        $nuevo=$this->gissel_model->obten_registro();
        $get_country = $this->gissel_model->get_country();
        $get_user = $this->gissel_model->get_user();
        

        $data=array('ArregloNuevo' =>$nuevo,
                    'ArregloPaises'=>$get_country,
                    'ArregloUsuario' =>$get_user
                    
            );

            $this->load->view('header');
            $this->load->view('body', $data);
            $this->load->view('footer');

    }

	*/

	public function show_formulario(){
		
		$get_country = $this ->abril_model-> get_country();
		$get_users = $this ->abril_model-> get_users();
			$data['ejemplo']= $get_country;
			$data['users']=$get_users;
		$this->load->view('header');
		$this->load->view('body', $data);
		$this->load->view('footer');
	}



	function formulario_guarda()
{  /*
	echo"hola";
	echo "<pre>";
		print_r($this->input->post());
	echo "</pre>";*/
    $busca_arterupestre=$this->abril_model->busca_ar();
    if($busca_arterupestre['busqueda']==true):
    	$this->abril_model->inserta_pais();
    	endif;
    $response_abril = array(
            'exito_abril'=> $busca_arterupestre['busqueda']
            , 'mensaje_abril' =>  $busca_arterupestre ['busqueda'] ? 'Registro Guardado' : 'hubo un error al guardar'.$busca_arterupestre ['mensaje']
        //if ternario
        );
    echo json_encode($response_abril);    
   
}
public function formulario_update(){
		$haciendo_update=$this->abril_model->formulario_update();
		$get_tabla_principal = $this->abril_model->get_tabla_principal();
		$data = array('ejemplo'=> $get_tabla_principal);
		

		$this->load->view('header');
		$this->load->view('crud_vista', $data);
		$this->load->view('footer');
}
public function eliminar(){
	$data=$this->input->post('id');
	$data=explode('_', $data);
	$abril_id=$data[1];
	$borra =$this->abril_model->borra($abril_id);
	$response=array(
			'exito'=>$borra['borra']
			,'mensaje'=>$borra['borra']? 'Registro Guardado' : 'hubo un error al guardar'.$borra ['mensaje']
		);
	echo json_encode($response);    
}

	//Fin de la clase 
}
