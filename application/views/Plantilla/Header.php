<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo ?> : MagicWeb</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/datepicker.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css//datepicker3.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/justified-nav.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"  media="all">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" >
  <script src="<?php echo base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/metisMenu.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/morris.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sb-admin-2.css">
  <style>
      .think{
        display: none;
      }
      .lexHide{
        display: none;
      }
      #dateRangeForm .form-control-feedback {
          top: 0;
          right: -15px;
      }
  </style>
</head>
<body>
	<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="col-xs-2">
          <img class="img-circle" src="<?php echo base_url(); ?>assets/Imagenes/Sistema/magicweb.jpg" alt="Generic placeholder image" width="80" height="80">
        </div>
        <div class="col-xs-4">
          <h2 class="text-muted">MagicWeb</h2>
        </div>
        <div class="col-md-6"></div>
      </div>
      <div class="col-md-6">
        <div class="col-xs-1"></div>
        <div class="col-xs-1"></div>
        <div class="col-xs-6">
            <h6 class="text-right text-muted">Usuario : <?php echo $usuario ?> </h6>
            <h6 class="text-right text-muted">Nombre : <?php echo $nombre ?> </h6>
            <h6 class="text-right text-muted">Perfil : <?php echo $perfil ?> </h6>
        </div>
        <div class="col-xs-2">
          <img class="img-circle" src="<?php echo base_url(); ?>assets/Imagenes/Usuarios/<?php echo $usuario.'.jpg'; ?> " alt="Generic placeholder image" width="80" height="80">
        </div>
      </div>
    </div><!--row-->

    <div class="row">
      <div class="col-lg-12">
				<?php
						if ($this->session->userdata('cambia') == 0)
						{
				          echo '<div class="btn-group">';
				          echo '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
				          echo '<i class="fa fa-university fa-lg fa-fw"></i>Administracion';
				          echo '</button>';
				          echo '<ul class="dropdown-menu" role="menu">';
				          echo  '<li><a href="'.base_url().'home/"><i class="fa fa-header fa-fw"></i> Home</a></li>';
				          echo   '<li><a href="'.base_url().'usuarios/CambiaClave"><i class="fa fa-asterisk fa-fw"></i> Clave</a></li>';
				          echo   '<li><a href="'.base_url().'about/"><i class="fa fa-thumbs-up fa-fw"></i> About</a></li>';
				          echo   '<li class="divider"></li>';
				          echo   '<li><a href="'.base_url().'login/"><i class="fa fa-user-times fa-fw"></i> Logout</a></li>';
				          echo '</ul>';
	        				echo '</div>';
						}
						else
						{
							echo '<div class="btn-group">';
							echo '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
							echo '<i class="fa fa-university fa-lg fa-fw"></i>Administracion';
							echo '</button>';
							echo '<ul class="dropdown-menu" role="menu">';
				            echo   '<li><a href="'.base_url().'login/"><i class="fa fa-user-times fa-fw"></i> Logout</a></li>';
				            echo '</ul>';
	        				echo '</div>';
						}
				?>
				<?php
					if ($this->session->userdata('cambia') == 0)
					{
			          echo '<div class="btn-group">';
			          echo '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
			          echo '<i class="fa fa-list-ol fa-lg fa-fw"></i>Maestros';
			          echo '</button>';
			          echo '<ul class="dropdown-menu" role="menu">';
			          echo '<li><a href="'.base_url().'usuarios/"><i class="fa fa-users fa-fw"></i> Usuarios</a></li>';
			          echo '<li><a href="'.base_url().'perfiles/"><i class="fa fa-graduation-cap fa-fw"></i> Perfiles</a></li>';
			          echo '<li><a href="'.base_url().'estados/"><i class="fa fa-level-up fa-fw"></i> Estados</a></li>';
			          echo '<li><a href="'.base_url().'etapas/"><i class="fa fa-sort-amount-asc fa-fw"></i> Etapas</a></li>';
			          echo '<li><a href="'.base_url().'sistemas/"><i class="fa fa-tablet fa-fw"></i> Sistemas</a></li>';
			          echo '<li><a href="'.base_url().'clientes/"><i class="fa fa-btc fa-fw"></i> Clientes</a></li>';
			          echo '</ul>';
					  echo '</div>';
					}
				?>
				<?php
					if ($this->session->userdata('cambia') == 0)
					{
						echo '<div class="btn-group">';
						echo '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
						echo '<i class="fa fa-cog fa-lg fa-fw"></i>Operaciones';
						echo '</button>';
						echo '<ul class="dropdown-menu" role="menu">';
						echo '<li><a href="'.base_url().'proyectos/"><i class="fa fa-cubes fa-fw"></i> Proyectos</a></li>';
						echo '</ul>';
						echo '</div>';
					}
				?>
      </div>
    </div><!--row-->
    <br>
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-success">
							<i class="fa fa-magic fa-fw"></i> Sistema de documentos de IP&QA
        </div>
      </div>
    </div><!--row-->
</div><!--Container-->
