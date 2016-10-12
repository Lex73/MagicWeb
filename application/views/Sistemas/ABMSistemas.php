<div class="container">
  <div class="row">
    <div class="col-xs-8">
      <div class="alert alert-success">
        <i class="fa fa-tablet fa-fw fa-2x"></i>
        <?php
          if(isset($sistemas))
          {
            foreach ($sistemas as $row)
            {
              echo 'Modificar: '.$row->IDSistema.'-'.$row->NombreSistema;
            }
          }
          else
          {
            echo 'Agregar nuevo sistema';
          }
        ?>
      </div>
    </div>
  </div>
<div class="row">
  <form class="form-horizontal" role="form" name="Form_Agregar_Sistemas" action="<?php echo base_url(); ?>sistemas/operaciones_sistemas" method="POST">
    <div class="form-group">
      <label for="IDSistema" class="col-lg-2 control-label">ID Sistemas</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" name ="IDSistema" id="IDSistema"
        <?php
            if(isset($sistemas))
            {
                foreach ($sistemas as $row)
                {
                  echo ' value="'.$row->IDSistema.'" readonly';
                }
            }
            else
            {
                echo ' value="'.@set_value('IDSistema').'" placeholder="ID Sistemas"';
            }
        ?>
        >
      </div>
    </div>
      <div class="form-group">
      <label for="NombreSistema" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" name ="NombreSistema" id="NombreSistema"
        <?php
            if(isset($sistemas))
            {
                foreach ($sistemas as $row)
                {
                  echo ' value="'.$row->NombreSistema.'"';
                }
            }
            else
            {
                echo ' value="'.@set_value('NombreSistema').'" placeholder="Nombre Sistemas"';
            }
        ?>
        >
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
       <input class="btn btn-lg btn-primary" type="submit" id="submit"
         <?php
            if(!isset($sistemas))
            {
                echo 'name="submit_Agregar_Sistema"';
            }
            else
            {
                echo 'name="submit_Modificar_Sistema"';
            }
          ?>
        value="Aceptar"/>
        <a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>sistemas/">Volver</a>
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
