<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $titulo ?> : MagicWeb</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/justified-nav.css" rel="stylesheet">
	<link  href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>
</head>
<body>
	<div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 class="text-center">
          <img class="img-circle" src="<?php echo base_url(); ?>assets/Imagenes/Sistema/magicweb.jpg" alt="Generic placeholder image" width="80" height="80">
          <small>   MagicWeb</small></h1>
      </div>
    </div>
      <div class="row">
      <div class="col-xs-12">
      <form class="form-signin" role="form" name="Form_Login" action="<?php echo base_url(); ?>login/ingresar" method="POST">
        <h2 class="form-signin-heading text-center"
          <os-p key="37b3dca3312939d1728ac08ec3f4a935">Por favor ingresa</os-p></h2>
        <label for="inputEmail" class="sr-only"
          <os-p key="b357b524e740bc85b9790a0712d84a30">Nombre de usuario</os-p></label>
        <input type="text" name="inputUser" id="inputUser" class="form-control" placeholder="ID de usuario" required autofocus data-translatable-key="b357b524e740bc85b9790a0712d84a30" data-translatable-string="Email address">
        <label for="inputPassword" class="sr-only">
          <os-p key="dc647eb65e6711e155375218212b3964">Contraseña</os-p></label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Contraseña" required data-translatable-key="dc647eb65e6711e155375218212b3964" data-translatable-string="Password">
        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar sesión" name="submit_login"/>
      </form>

			<?php if(isset($year)) :?>
					<p class="text-center text-warning"> <?php echo $year; ?></p>'
			<?php endif; ?>
     	<?php if(isset($mensaje)) :?>
      		<p class="text-center text-danger">  <?php echo $mensaje; ?> </p>
     <?php endif; ?>
    </div>
  </div>

</div> <!-- /container -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
