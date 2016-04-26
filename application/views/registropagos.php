<?php //echo '<pre>';
			//print_r($idusuario);
			//print_r($servicio_traducido);
			///print_r($pago_traducido);
			//print_r($servicio);
			//print_r($pago);
			//print_r($servicios);
			//print_r($usuario_info);

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
	<br></br>
	<div class="container" style="background-color: rgba(0, 92, 254, 0.23); padding: 50px;">
	  <?php foreach($usuario_info as $item): ?>
		<form role= "form "class="form-signin" action="<?php echo base_url();?>tanda/historial_pagos" id="form_login"  enctype="multipart/form-data" method="post">
		  <div class="form-group">
		    <label>ID del usuario</label>
		    <input type="text" class="form-control"  name="nombre" value="<?php echo $idusuario;?>">
		  </div>
		   <div class="form-group">
		    <label>Monto de pago</label>
		    <input type="text" class="form-control" name="dinerito" value="<?php echo $servicios[0]->por_partes ?>">
		  </div>
		  <div class="form-group">
		    <label>Servicio</label>
		    <input type="text" class="form-control"  name="servicio_traducido" value="<?php echo $item->tipo_servicio;?>">
		    <input type="hidden" class="form-control" name="servicio" value="<?php echo $item->tipo_servicio; ?>">
		  </div>
		  <div class="form-group">
		    <label>Tipo de pago</label>
		    <input type="text" class="form-control"  name="pago_traducido" value="<?php echo $item->tipo_pago; ?>">
		    <input type="hidden" class="form-control" name="pago" value="<?php echo $item->tipo_pago; ?>">
		  </div>
		  </div>
		  
		  <button type="submit" class="btn btn-default centrado">Submit</button>
		</form>
	  <?php endforeach; ?>
		
	</div>
</body>
</html>