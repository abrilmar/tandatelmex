<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tandaestilos/css/estilo-login.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tandaestilos/bootstrap/css/bootstrap.css">
    <script src="<?php echo base_url();?>tandaestilos/bootstrap/js/bootstrap.js"></script>
    
</head>
<body>
	<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url();?>tandaestilos/img/icon-user.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form role= "form "class="form-signin" action="<?php echo base_url();?>tanda/bienvenido" id="form_login"  enctype="multipart/form-data" method="post" >
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            </form><!-- /form -->
            <a href="bienvenido.html" class="forgot-password">
                Olvidaste contraseña?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>