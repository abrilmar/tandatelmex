<?php

Class tandamodel extends CI_Model{
     function __construct(){
          $this->load->database();
     }
     public function post_ingresar()
     {
     $posts = $this->input->post();
     $this->_nombre = $posts["nombre"];
     $this->_apellido = $posts["apellidos"];
     $this->_tiposervicio  = $posts["tiposervicio"];
     $this->_formapago  = $posts["formapago"];
     $this->_status  = "Activo" ;
     $this->db->set('nombre',  $this->_nombre);
     $this->db->set('apellidos',  $this->_apellido);
     $this->db->set('tipo_servicio',  $this->_tiposervicio);
     $this->db->set('tipo_pago',  $this->_formapago);
     $this->db->set('status_usuario',  $this->_status);
     $this->db->insert("usuarios_servicios");
     }

     public function get_tabla_grupo($id_number){
     $this->db->select('grupo_id')
                    ->from('usuarios_servicios')
                    ->where('usuarios_id', $id_number);
                    $query =$this->db->get();
                    return $query->result();  
     }
     public function obtener_usuarios_grupo($grupo_usuario){
     $this->db->select('*')
               ->from('usuarios_servicios')
               ->where('grupo_id', (int)$grupo_usuario);
               $query =$this->db->get();
               return $query->result(); 
     }
     public function obtener_todos(){

     $this->db->select('*')
               ->from('usuarios_servicios');
               $query =$this->db->get();
               return $query->result(); 
     }
     public function obtener_busqueda_id()
     {
          $posts = $this->input->post();
          $this->_ids = $posts["buscar"];
          $this->db->select('*')
               ->from('usuarios_servicios')
               ->where('usuarios_id',  $this->_ids);
               $query =$this->db->get();
               return $query->result(); 
     }
     public function obtener_servicio($id_number)
     {
     $this->db->select('cs.servicio')
                    ->from('usuarios_servicios AS usr')
                    ->join('cat_servicios AS cs', 'usr.tipo_servicio = cs.id_servicio')
                    ->where('usr.usuarios_id', $id_number);
     $query=$this->db->get();
     return $query->result();
     }
     public function obtener_tipo_pagos($id_number)
     {

          $this->db->select('ctp.tipos_pagos')
                         ->from('usuarios_servicios AS usr')
                         ->join('cat_tipo_pagos AS ctp', 'usr.tipo_pago = ctp.tipo_pagos_id')
                         ->where('usr.usuarios_id', $id_number);
          $query=$this->db->get();
     return $query->result();

     }
     public function registro_pagos(){
          $posts = $this->input->post();
          $this->_id_usuario = $posts["nombre"];
          $this->_servicio = $posts["servicio"];
          $this->_monto_pago = $posts["dinerito"];
          $this->db->set('id_usuario', $this->_id_usuario);
          $this->db->set('monto_pago',  $this->_monto_pago);
          $this->db->set('fecha_pago', 'NOW()', FALSE);
          $this->db->set('servicio',  $this->_servicio);
          $this->db->insert("registro_pagos");
     }
     public function obtener_pagos(){
          $posts = $this->input->post();
          $posts_guet = $this->input->get();
          $this->_id_usuario =  $posts["nombre"];
          $this->_id_usuario_get = $posts_guet["id_usuario"];
          $this->db->select('*')
               ->from('registro_pagos')
               ->where('id_usuario',  $this->_id_usuario)
               ->or_where('id_usuario',  $this->_id_usuario_get); 
               $query =$this->db->get();
               return $query->result();    
     }

     public function obtener_pagos_button(){
          $posts_guet = $this->input->get();
          $this->_id_usuario_get = $posts_guet["id_usuario"];
          $this->db->select('*')
               ->from('registro_pagos')
               ->where('id_usuario',  $this->_id_usuario_get);
               $query =$this->db->get();
               return $query->result();    
     }


     public function obtener_usuario_id($id_usuario){

           $this->db->select('*')
               ->from('usuarios_servicios')
               ->where('usuarios_id',  $id_usuario);
               $query =$this->db->get();
               return $query->result();
     }   

     public function obtener_proximas_fechas_grupo($id_grupo){
           $this->db->select('fecha_inicio')
               ->from('grupos_servicios')
               ->where('grupo_id',  $id_grupo);
               $query =$this->db->get();
               $fecha_inicio_grupo=$query->result();
               if(empty($fecha_inicio_grupo[0]->fecha_inicio)){
                    $cadena_encontro="Tu grupo no esta completo";
                   
               }
               else{
                    $cadena_encontro="si encontro";
                     $this->db->select('fecha_siguiente')
                         ->from('pagos_partes_iguales')
                         ->where('id_grupo',  $id_grupo);
                         $query_partes_iguales =$this->db->get();
                         $fecha_siguiente_grupo=$query->result();
                         if(empty($fecha_siguiente_grupo[0]->fecha_siguiente)){
                         $date=date_create($fecha_inicio_grupo[0]->fecha_inicio);
                         date_add($date,date_interval_create_from_date_string("1 months"));
                         $newformat=date_format($date,"Y-m-d");                    
                         $cadena_encontro=$newformat;
                         }
                         else{
 
                              $cadena_encontro=$fecha_siguiente_grupo[0]->fecha_siguiente;
                         }

               }
               return $cadena_encontro;
     }  


     public function insertar_fecha_siguiente($nueva_fecha, $id_grupo){
          $this->_status  = "Activo";
          $this->db->set('id_grupo',  $id_grupo);
          $this->db->set('fecha_siguiente',  $nueva_fecha);
          $this->db->set('status_usuario',  $this->_status);
          $this->db->insert("pagos_partes_iguales");
     }
     public function obtener_cat_servicios($servicio){
          $this->db->select('*')
               ->from('cat_servicios')
               ->where('servicio',  $servicio);
               $query =$this->db->get();
               return $query->result();
     }

     public function obtener_ultimo_registro(){
          $this->db->select('usuarios_id')
               ->from('usuarios_servicios')
               ->order_by('usuarios_id', 'DESC')
               ->limit(1);
               $query =$this->db->get();
               return $query->result();
     }

}
?>