<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tanda extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('tandamodel');
		$this->load->library('session');
	}
	public function index()
	{	
		$this->load->view('index');			
	}
	public function bienvenido()
	{	
		$this->load->view('head');	
		$this->load->view('bienvenido');			
	}
	public function historial()
	{	
		$obtener_todos = $this->tandamodel->obtener_todos();
		$data = array('historial'=>$obtener_todos);
		$this->load->view('head');
		$this->load->view('historial', $data);			
	}
	public function barra_busqueda()
	{
		$obtener_busqueda_id = $this->tandamodel->obtener_busqueda_id();
		$data = array('historial'=>$obtener_busqueda_id);
		$this->load->view('head');
		$this->load->view('historial', $data);			
	}
	public function ingresar()
	{	
		$this->load->view('head');
		$this->load->view('ingresar');			
	}
	public function grupo_asignado()
	{	
		$posts = $this->input->post();
		$ingresa_data=$this->tandamodel->post_ingresar();
		$obtener_ultimo_id=$this->tandamodel->obtener_ultimo_registro();
		$get_grupo = $this->tandamodel->get_tabla_grupo($obtener_ultimo_id[0]->usuarios_id);
		$get_tabla_grupo = $this->tandamodel->obtener_usuarios_grupo($get_grupo[0]->grupo_id);
		//$obtener_servicio = $this->tandamodel->obtener_servicio($ingresa_data);
		//$obtener_tipo_pagos = $this->tandamodel->obtener_tipo_pagos($ingresa_data);
		$data = array('grupo'=>$get_tabla_grupo);
						//'servicio' => $obtener_servicio[0]->servicio,
     					//'pago'  => $obtener_tipo_pagos[0]->tipos_pagos);

		$this->load->view('head');
		$this->load->view('grupoasignado', $data);			
	}
	public function registro_pagos()
	{	
		$posts = $this->input->get();
     	$this->_usuarioid = $posts["id_usuario"];
     	$this->_servicio = $posts["serv"];
		$obtener_usuario_info = $this->tandamodel->obtener_usuario_id($this->_usuarioid);
		$obtener_cat_servicios= $this->tandamodel->obtener_cat_servicios($obtener_usuario_info[0]->tipo_servicio);
     	$data = array('idusuario'=>	$this->_usuarioid,
     					'usuario_info'=> $obtener_usuario_info,
     					'servicios'=> $obtener_cat_servicios);
		$this->load->view('head');
		$this->load->view('registropagos',$data);
	}
	public function elimar_usuario(){
		$this->load->view('head');
		$this->load->view('reportar');

	}
	public function historial_pagos()
	{
		$posts = $this->input->post();
		$this->_id=$posts["nombre"];
		$obtener_usuario_info = $this->tandamodel->obtener_usuario_id($this->_id);
		$obtener_fecha_grupo = $this->tandamodel->obtener_proximas_fechas_grupo($obtener_usuario_info[0]->grupo_id);
		$insertar=$this->tandamodel->insertar_fecha_siguiente($obtener_fecha_grupo ,$obtener_usuario_info[0]->grupo_id);

		if($obtener_fecha_grupo!="Tu grupo no esta completo"){
			$inserta_pago = $this->tandamodel->registro_pagos();
		}
		//Si grupo no esta completo no insertar
		//si grupo completo insertar

		
		$obtener_pagos = $this->tandamodel->obtener_pagos();
		//$this->_servicio_traducido = $posts["servicio_traducido"];
		//$this->_pago_traducido = $posts["pago_traducido"];
		
		$data = array('registro_pagos'=>	$obtener_pagos,
					'info_user'=>$obtener_usuario_info,
						'proxima_fecha'=> $obtener_fecha_grupo
					);
		$this->load->view('head');
		$this->load->view('historial_pagos',$data);			
	}

	public function historial_pagos_button()
	{	
		$gets = $this->input->get();
		$this->_id = $gets["id_usuario"];
		$obtener_pagos = $this->tandamodel->obtener_pagos_button();
		$obtener_usuario_info = $this->tandamodel->obtener_usuario_id($this->_id);
		$obtener_fecha_grupo = $this->tandamodel->obtener_proximas_fechas_grupo($obtener_usuario_info[0]->grupo_id);
		$insertar=$this->tandamodel->insertar_fecha_siguiente($obtener_fecha_grupo ,$obtener_usuario_info[0]->grupo_id);
		//$obtener_servicio = $this->tandamodel->obtener_servicio($this->_id);
		//$obtener_tipo_pagos = $this->tandamodel->obtener_tipo_pagos($this->_id);
		$data = array('registro_pagos'=>$obtener_pagos,
						'info_user'=>$obtener_usuario_info,
						'proxima_fecha'=> $obtener_fecha_grupo
					//'servicio_traducido'=>$obtener_servicio[0]->servicio,
     				//'pago_traducido'=>$obtener_tipo_pagos[0]->tipos_pagos
					);			
		$this->load->view('head');
		$this->load->view('historial_pagos',$data);			
	}
	//Fin de la clase 
}