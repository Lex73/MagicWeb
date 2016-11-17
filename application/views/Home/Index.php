<div class="container">

	<div class="row">
		<div class="col-lg-4">
			<div class="alert alert-success">
					Menu
			</div>
		</div>
		<div class="col-lg-8">
			<div class="alert alert-success">
					Eventos
			</div>
		</div>
	</div><!--row-->

	<div class="row">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
		      <div class="navbar-default sidebar" role="navigation">
                  <div class="sidebar-nav navbar-collapse">
                      <ul class="nav" id="side-menu">
                          <!-- <li class="sidebar-search"> -->
                              <!-- <div class="input-group custom-search-form"> -->
                                  <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                                  <!-- <span class="input-group-btn"> -->
                                  <!-- <button class="btn btn-default" type="button"> -->
                                      <!-- <i class="fa fa-search"></i> -->
                                  <!-- </button> -->
                              <!-- </span> -->
                              <!-- </div> -->
                              <!-- /input-group -->
                          <!-- </li> -->
                          <!-- <li> -->
                              <!-- <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a> -->
                          <!-- </li> -->
						  <li>
                              <a href="#"><i class="fa fa-university fa-lg fa-fw"></i> Administración<span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level">
                                  <li>
                                      <a href="<?php echo base_url() ?>home/"><i class="fa fa-header fa-fw"></i> Home</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>usuarios/CambiaClave"><i class="fa fa-asterisk fa-fw"></i> Clave</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>about/"><i class="fa fa-thumbs-up fa-fw"></i> About</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>login/"><i class="fa fa-user-times fa-fw"></i> Logout</a>
                                  </li>
                              </ul>
                              <!-- /.nav-second-level -->
                          </li>
                          <li>
                              <a href="#"><i class="fa fa-list-ol fa-lg fa-fw"></i> Maestros<span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level">
                                  <li>
                                      <a href="<?php echo base_url() ?>usuarios/"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>perfiles/"><i class="fa fa-graduation-cap fa-fw"></i> Perfiles</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>estados/"><i class="fa fa-level-up fa-fw"></i> Estados</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>etapas/"><i class="fa fa-sort-amount-asc fa-fw"></i> Etapas</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>sistemas/"><i class="fa fa-tablet fa-fw"></i> Sistemas</a>
                                  </li>
                                  <li>
                                      <a href="<?php echo base_url() ?>clientes/"><i class="fa fa-btc fa-fw"></i> Clientes</a>
                                  </li>
                              </ul>
                              <!-- /.nav-second-level -->
                          </li>
                          <li>
                              <a href="tables.html"><i class="fa fa-cog fa-lg fa-fw"></i> Operaciones<span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level">
                                  <li>
                                      <a href="<?php echo base_url() ?>proyectos/"><i class="fa fa-cubes fa-fw"></i> Proyectos</a>
                                  </li>
                              </ul>
                          </li>
                        </ul>
                              <!-- /.nav-second-level -->
                          </li>
                      </ul>
			</div>
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-8">
		<div class="panel panel-default">
                          <div class="panel-heading">
                              <i class="fa fa-bell fa-fw"></i> Panel de estadisticas
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                              <div class="list-group">
                                  <a href="<?php echo base_url() ?>proyectos/" class="list-group-item">
                                      <i class="fa fa-cubes fa-fw"></i> Proyectos
                                      <span class="pull-right text-muted small"><em><?php echo $proyectos ?></em>
                                      </span>
                                  </a>
                                  <a href="<?php echo base_url() ?>documentos/verDocumentos" class="list-group-item">
                                      <i class="fa fa-pencil-square-o fa-fw"></i> Documentos en el sistema
                                      <span class="pull-right text-muted small"><em><?php echo $documentos ?></em>
                                      </span>
                                  </a>
                                  <a href="<?php echo base_url() ?>usuarios/" class="list-group-item">
                                      <i class="fa fa-users fa-fw"></i> Usuarios
                                      <span class="pull-right text-muted small"><em><?php echo $usuarios ?></em>
                                      </span>
                                  </a>
                                  <a href="#" class="list-group-item">
                                      <i class="fa fa-upload fa-fw"></i> Siguiente numero
                                      <span class="pull-right text-muted small"><em>
																				<?php
																						foreach ($proximo as $row)
																						{
																								$siguiente = $row->siguiente;
																						}
																						echo $siguiente;
																				?></em>
                                      </span>
                                  </a>
                              </div>
                              <!-- /.list-group -->
                              <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                          </div>
                          <!-- /.panel-body -->
		</div>
	</div>
</div>
    <!-- <div class="row"> -->
      <!-- <div class="col-xs-12"> -->
        <!-- <!-- Carousel -->
        <!-- <div id="myCarousel" class="carousel slide" data-ride="carousel"> -->
          <!-- <!-- Indicators -->
          <!-- <ol class="carousel-indicators"> -->
            <!-- <li data-target="#myCarousel" data-slide-to="0" class="active"></li> -->
            <!-- <li data-target="#myCarousel" data-slide-to="1"></li> -->
            <!-- <li data-target="#myCarousel" data-slide-to="2"></li> -->
            <!-- <li data-target="#myCarousel" data-slide-to="3"></li> -->
          <!-- </ol> -->
          <!-- <div class="carousel-inner" role="listbox"> -->
            <!-- <div class="item active"> -->
              <!-- <img class="first-slide" src="<?php //echo base_url(); ?>/assets/Imagenes/1.jpg" alt="First slide"> -->
            <!-- </div> -->
            <!-- <div class="item"> -->
              <!-- <img class="second-slide" src="<?php //echo base_url(); ?>/assets/Imagenes/2.jpg" alt="Second slide"> -->
            <!-- </div> -->
            <!-- <div class="item"> -->
              <!-- <img class="third-slide" src="<?php //echo base_url(); ?>/assets/Imagenes/3.jpg" alt="Third slide"> -->
            <!-- </div> -->
            <!-- <div class="item"> -->
              <!-- <img class="third-slide" src="<?php //echo base_url(); ?>/assets/Imagenes/4.jpg" alt="Third slide"> -->
            <!-- </div> -->
          <!-- </div> -->
          <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> -->
            <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> -->
            <!-- <span class="sr-only" data-replace-tmp-key="dd1f775e443ff3b9a89270713580a51b"><os-p key="dd1f775e443ff3b9a89270713580a51b">Previo</os-p></span> -->
          <!-- </a> -->
          <!-- <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> -->
            <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
            <!-- <span class="sr-only" data-replace-tmp-key="10ac3d04253ef7e1ddc73e6091c0cd55"><os-p key="10ac3d04253ef7e1ddc73e6091c0cd55">Siguiente</os-p></span> -->
          <!-- </a> -->
        <!-- </div> -->
      <!-- </div> -->
    <!-- </div> -->
    <!-- <!-- /.carousel -->
	<!-- </div> -->
