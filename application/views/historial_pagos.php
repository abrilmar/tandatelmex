<?php  //echo '<pre>';
			//print_r($registro_pagos);
			//print_r($info_user);
			//print_r($proxima_fecha);
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
      	<br></br>
      	<h3>Registro de pagos</h3>
      	
		<table class="table table-bordered table-responsive">
			<thead>
			  <tr>
			    <td>Fecha de pago</td>
			    <td>Monto</td>
			    <td>Servicio</td>
			    <td>Forma de pago</td>
			  </tr>
			</thead>
			<tbody>
			 
			  <!-- Aplicadas en las celdas (<td> o <th>) -->
			  <?php foreach($registro_pagos as $item): ?>
			  <tr>
			    <td><?php echo $item->fecha_pago; ?></td>
			    <td>$<?php echo $item->monto_pago; ?></td>
			    <td><?php echo $info_user[0]->tipo_servicio; ?></td>
			    <td><?php echo $info_user[0]->tipo_pago; ?></td>
			  </tr>
			  <?php endforeach; ?>
			  
			</tbody>
		</table>
		
      	<br></br>
      	<h3>Proximas fechas de pago:</h3>
      	<h5><?php echo $proxima_fecha; ?></h5>
      	<br></br>
	</div>
</body>
</html>