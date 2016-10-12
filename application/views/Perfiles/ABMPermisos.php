<div class="container">
  <div class="row">
    <div class="col-xs-8">
      <div class="alert alert-success">
        <i class="fa fa-graduation-cap fa-fw fa-2x"></i>
        <?php
          if(isset($perfiles))
          {
            // foreach ($perfiles as $row)
            // {
              echo 'Asignar nuevos permisos al perfil: '.$perfiles;
            // }
          }
        ?>
      </div>
    </div>
  </div>
<div class="row">
    <form class="form-horizontal" role="form" name="Form_Agregar_Permiso" action="<?php echo base_url(); ?>permisos/operaciones_permisos" method="POST">
      <div class="form-group">
        <label for="Perfil" class="col-lg-2 control-label">Perfil</label>
        <div class="col-lg-6">
            <input type="text" class="form-control" name ="IDPerfiles" id="IDPerfiles"
                <?php
                    echo ' value="'.$perfiles.'"';
                ?>
            readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="Pantalla" class="col-lg-2 control-label">Pantalla</label>
        <div class="col-lg-4">
                <select class="input-large form-control" name="Pantalla">
                  <?php
                      echo '<option value="">Seleccione una Pantalla</option>';
                      foreach ($pantallas as $row)
                      {
                        echo '<option value="'.$row->pantalla.'">'.$row->pantalla.'</option>';
                      }
                  ?>
                </select>
        </div>
      </div>
      <div class="form-group">
        <label for="Permiso" class="col-lg-2 control-label">Permiso</label>
        <div class="col-lg-4">
                <select class="input-large form-control" name="Permiso">
                  <option value="">Seleccione el Permiso</option>
                  <option value="VER">Ver</option>
                  <option value="ADD">Agregar</option>
                  <option value="MOD">Modificar</option>
                </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input class="btn btn-lg btn-primary" type="submit" id="submit" name="Form_Agregar_Permiso" value="Aceptar"/>
          <a class="btn btn-lg btn-primary" href="<?php echo base_url().'perfiles/modificar/'.$perfiles?>">Volver</a>
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

  </div>
</div> <!-- /container -->
