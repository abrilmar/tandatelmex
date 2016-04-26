<?php// echo '<pre>';
			//print_r($historial);
		//echo '</pre>';

 ?>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Tanda Telmex</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="<?php echo base_url();?>tanda/bienvenido">Inicio<span class="sr-only">(current)</span></a></li>
	        <li><a href="<?php echo base_url();?>tanda/ingresar">Inscribir usuario</a></li>
	        <li><a href="<?php echo base_url();?>tanda/historial">Historial</a></li>
	        <li><a href="#">Reportar</a></li>
	        <li><a href="#">Manual</a></li>
	      </ul>
	      
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Cerrar sesion</a></li>
	        
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class="container">
		 <form class="barra-busqueda" action="<?php echo base_url();?>tanda/barra_busqueda"  enctype="multipart/form-data" method="post" role="form">
	         <input type="text" placeholder="Buscar" name="buscar">
	        <button type="submit" class="btn btn-primary">Enviar</button>
      	</form>
      	<br></br>
      	<?php foreach($historial as $item): ?>
      	<!-- Panel historial-->
		<div class="panel panel-primary">
		  <div class="panel-heading"><?php echo $item->nombre.' '.$item->apellidos; ?></div>
		  <div class="panel-body">
		  	<img src="<?php echo base_url();?>tandaestilos/img/nuevo_usr.png" class="img-historial">
		  	<div class="contenido">
		  		<p>ID de usuario: <?php echo $item->usuarios_id; ?></p>
		  		<p>Estatus: En espera</p>
		  		<p>Servicios:<?php echo $item->tipo_servicio.'('.$item->tipo_pago.')' ?></p>
		  		
		  	</div>
 
		  </div>
		  <div class="panel-footer">
		  	<div class="panelf-buttons">
		  		
			  	<button type="submit" class="btn btn-success">Información</button>
			  	<a href="<?php echo base_url();?>tanda/registro_pagos?id_usuario=<?php echo $item->usuarios_id; ?>& serv=<?php echo $item->tipo_servicio;?>&pag=<?php echo $item->tipo_pago;?>"><button type="submit" class="btn btn-danger">Registro de pagos</button></a>
			  	<a href="<?php echo base_url();?>tanda/historial_pagos_button?id_usuario=<?php echo $item->usuarios_id;?>"><button type="submit" class="btn btn-warning">Historial de pagos</button></a>
		  	</div>
		  </div>
		</div>
		<?php endforeach; ?>
	</div>
</body>
</html>