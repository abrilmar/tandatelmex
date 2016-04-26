
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
		<form role= "form "class="form-signin" action="<?php echo base_url();?>tanda/grupo_asignado" id="form_login"  enctype="multipart/form-data" method="post">
		  <div class="form-group">
		    <label>Nombre</label>
		    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
		  </div>
		   <div class="form-group">
		    <label>Apellidos</label>
		    <input type="text" class="form-control" id="nombre" placeholder="Apellido Paterno  / Materno" name="apellidos">
		  </div>
		  <div class="form-group">
		    <label>Tipo de servicio</label>
		    <select name="tiposervicio" class="form-control">
			  <option value="Servicio Telefónico">Servicio Telefónico</option>
			  <option value="Claro Video">Claro video</option>
			  <option value="Claro musica">Claro musica</option>
			  <option value="Claro video + Claro musica">Claro video + Claro musica</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label>Forma de pago</label>
		    <select name="formapago" class="form-control">
			  <option value="Pagos mensuales">Pagos mensuales</option>
			  <option value="Partes Iguales">Partes iguales</option>
			</select>
		  </div>
		  
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
		
	</div>
</body>
</html>