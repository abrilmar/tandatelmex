<body>
	
<div id="header">
<?php echo '<pre>';
			print_r($data_user);
		echo '</pre>';
 ?>
 <div class="jumbotron" style="background-color: <?php echo $color; ?>;">
<?php //foreach($data_user as $item): ?>
<?php// echo $item; ?>

    <h1>Bienvenid@! <?php echo $data_user['nombre']; ?></h1>
    <p>Tu eres : <?php echo $data_user['rol']; ?></p>
    <p>Y tu correo es: <?php echo $data_user['email']; ?></p>

<?php //endforeach; ?>
</div>

<h1><a href="<?php echo base_url();?>abril/destroy_session">log out</a></h1>
</div>





</body>
