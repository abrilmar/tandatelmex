<?php //echo base_url();
//echo $grupo;?>
<?php //echo '<pre>';
			//print_r($grupo);
			//print_r($servicio);
			//print_r($pago);
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
		<?php foreach($grupo as $item): ?>
      	<br></br>
      	<!-- Panel historial-->
		<div class="panel panel-primary">
		  <div class="panel-heading"><?php echo $item->nombre.' '.$item->apellidos; ?></div>
		  <div class="panel-body">
		  	<img  src="<?php echo base_url();?>tandaestilos/img/nuevo_usr.png" class="img-historial">
		  	<div class="contenido">
		  		<p>ID de usuario: <?php echo $item->usuarios_id; ?></p>
		  		<p>Estatus: En espera</p>
		  		<p>Servicios:<?php echo $item->tipo_servicio; ?></p>
		  		<p>Forma de pago:<?php echo $item->tipo_pago; ?></p>
		  	</div>

		  </div>
		  <div class="panel-footer">
		  	<div class="panelf-buttons">
			  	<button type="submit" class="btn btn-success">Información</button>
			  	
		  	</div>
		  </div>
		</div>
		<!-- Panel historial-->
		<?php endforeach; ?>

		<form role= "form "class="form-signin" action="<?php echo base_url();?>tanda/bienvenido" id="form_login"  enctype="multipart/form-data" method="post"  >	
			
			<button class="btn btn-primary centrado">Aceptar</button>
		</form>
		<br></br>
	</div>
</body>
</html>
