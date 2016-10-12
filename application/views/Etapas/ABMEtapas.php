<div class="container">
  <div class="row">
    <div class="col-xs-8">
      <div class="alert alert-success">
        <i class="fa fa-sort-amount-asc fa-fw fa-2x"></i>
        <?php
          if(isset($etapas))
          {
            foreach ($etapas as $row)
            {
              echo 'Modificar: '.$row->IDEtapa.'-'.$row->NombreEtapa;
            }
          }
          else
          {
            echo 'Agregar nueva etapa';
          }
        ?>
      </div>
    </div>
  </div>
<div class="row">
  <form class="form-horizontal" role="form" name="Form_Agregar_Etapas" action="<?php echo base_url(); ?>etapas/operaciones_etapas" method="POST">
    <div class="form-group">
      <label for="IDEtapa" class="col-lg-2 control-label">ID Etapa</label>
      <div class="col-lg-4">
        <input type="text" class="form-control" name ="IDEtapa" id="IDEtapa"
        <?php
            if(isset($etapas))
            {
                foreach ($etapas as $row)
                {
                  echo ' value="'.$row->IDEtapa.'" readonly';
                }
            }
            else
            {
                echo ' value="'.@set_value('IDEtapa').'" placeholder="ID Etapa"';
            }
        ?>
        >
      </div>
    </div>
      <div class="form-group">
      <label for="NombreEtapa" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" name ="NombreEtapa" id="NombreEtapa"
        <?php
            if(isset($etapas))
            {
                foreach ($etapas as $row)
                {
                  echo ' value="'.$row->NombreEtapa.'"';
                }
            }
            else
            {
                echo ' value="'.@set_value('NombreEtapa').'" placeholder="Nombre Etapa"';
            }
        ?>
        >
      </div>
    </div>
      <div class="form-group">
      <label for="ClaveProt" class="col-lg-2 control-label">Clave Protocolo</label>
       <div class="col-lg-6">
        <input type="text" class="form-control" name ="ClaveProt" id="ClaveProt"
        <?php
            if(isset($etapas))
            {
                foreach ($etapas as $row)
                {
                  echo ' value="'.$row->ClaveProt.'"';
                }
            }
            else
            {
                echo ' value="'.@set_value('ClaveProt').'" placeholder="Clave Protocolo"';
            }
        ?>
        >
      </div>
      </div>
      <div class="form-group">
      <label for="ClaveInf" class="col-lg-2 control-label">Clave Informe</label>
          <div class="col-lg-6">
        <input type="text" class="form-control" name ="ClaveInf" id="ClaveInf"
        <?php
            if(isset($etapas))
            {
                foreach ($etapas as $row)
                {
                  echo ' value="'.$row->ClaveInf.'"';
                }
            }
            else
            {
                echo ' value="'.@set_value('ClaveInf').'" placeholder="Clave Informe"';
            }
        ?>
        >
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
       <input class="btn btn-lg btn-primary" type="submit" id="submit"
         <?php
            if(!isset($etapas))
            {
                echo 'name="submit_Agregar_Etapas"';
            }
            else
            {
                echo 'name="submit_Modificar_Etapas"';
            }
          ?>
        value="Aceptar"/>
        <a class="btn btn-lg btn-primary" href="<?php echo base_url(); ?>etapas/">Volver</a>
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
