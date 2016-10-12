<div class="container">
  <div class="row">
    <div class="col-xs-8">
      <div class="alert alert-success">
        <i class="fa fa-level-up fa-fw fa-2x"></i>
        <?php
          if(isset($estados))
          {
            foreach ($estados as $row)
            {
              echo 'Modificar: '.$row->IDEstados.'-'.$row->NombreEstado;
            }
          }
          else
          {
            echo 'Agregar nuevo estado';
          }
        ?>
      </div>
    </div>
  </div>
  <div class="row">
    <form class="form-horizontal" role="form" name="Form_Agregar_Estados" action="<?php echo base_url(); ?>estados/operaciones_estados" method="POST">
      <div class="form-group">
      <label for="IDEstados" class="col-lg-2 control-label">ID Estado</label>
      <div class="col-lg-4">
      <input type="text" class="form-control" name ="IDEstados" id="IDEstados"
        <?php
          if(isset($estados))
          {
            foreach ($estados as $row)
            {
              echo ' value="'.$row->IDEstados.'" readonly';
            }
          }
          else
          {
            echo ' value="'.@set_value('IDEstados').'" placeholder="ID Estado"';
          }
        ?>
      >
    </div>
  </div>
  <div class="form-group">
    <label for="NombreEstado" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-6">
      <input type="text" class="form-control" name ="NombreEstado" id="NombreEstado"
      <?php
        if(isset($estados))
        {
          foreach ($estados as $row)
          {
            echo ' value="'.$row->NombreEstado.'"';
          }
        }
        else
        {
          echo ' value="'.@set_value('NombreEstado').'" placeholder="Nombre Estado"';
        }
      ?>
      >
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input class="btn btn-lg btn-primary" type="submit" id="submit"
      <?php
        if(!isset($estados))
        {
          echo 'name="submit_Agregar_Estado"';
        }
        else
        {
          echo 'name="submit_Modificar_Estado"';
        }
      ?>
      value="Aceptar"/>
      <a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>estados/">Volver</a>
    </div>
  </div>
</form>
  <div class="col-xs-12">
    <div class="col-xs-4"></div>
      <div class="col-xs-4">
        <p class="text-center text-danger">  <?php echo validation_errors(); ?> </p>
      </div>
      <div class="col-xs-4"></div>
    </div>
    <br>
  </div>
</div> <!-- /container -->
