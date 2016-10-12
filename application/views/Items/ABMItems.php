<div class="container">
  <div class="row">
      <div class="col-xs-8">
          <div class="alert alert-success">
              <i class="fa fa-indent fa-fw fa-2x"></i>
              <?php
                if(isset($proyecto) & !isset($item))
                {
                  foreach ($proyecto as $row)
                  {
                    $proy = $row->IDProyecto;
                    echo 'Agregar Item al proyecto: '.$row->IDProyecto.'-'.$row->NombreProyecto;
                  }
                }
                else
                {
                  foreach ($proyecto as $row)
                  {
                    foreach ($item as $rowAux)
                    {
                      $proy = $row->IDProyecto;
                      $it = $rowAux->IDItemProyecto;
                      $nomIt = $rowAux->NombreItem;
                      $obs = $rowAux->Observaciones;
                      echo 'Modificar Item: '.$it.' - '.$nomIt.' al Proyecto: '.$row->IDProyecto.'-'.$row->NombreProyecto;
                    }
                  }
                }
              ?>
          </div>
      </div>
      <div class="col-xs-2">
          <p class="text-success">
            <?php
                echo $mensaje;
            ?>
          </p>
      </div>
      <div class="col-xs-1"></div>
      <div class="col-xs-1"></div>
  </div><!--row-->

  <div class="row">
      <form class="form-horizontal" role="form" name="Form_Modificar_Items" action="<?php echo base_url(); ?>items/operaciones_items" method="POST">
        <div class="form-group">
          <label for="NombreItem" class="col-lg-2 control-label lexHide">IDProyecto</label>
          <div class="col-lg-6">
              <input type="text" class="form-control lexHide" name ="IDProyecto" id="IDProyecto" value="<?php echo $proy; ?>" >
          </div>
        </div>
                <?php
                   if(isset($item))
                   {
                      echo '<div class="form-group">';
                      echo '<label for="IDItemProyecto" class="col-lg-2 control-label">ID Item</label>';
                      echo '<div class="col-lg-2">';
                      echo '<input type="text" class="form-control" name ="IDItemProyecto" id="IDItemProyecto"';
                      echo 'value="'.$it.'"';
                      echo 'readonly>';
                      echo '</div>';
                      echo '</div>';
                  }
                  else
                  {
                  }
                ?>
          <div class="form-group">
            <label for="NombreItem" class="col-lg-2 control-label">Nombre Item</label>
            <div class="col-lg-6">
                <input type="text" class="form-control" name ="NombreItem" id="NombreItem"
                <?php
                   if(isset($item))
                   {
                     echo 'value="'.$nomIt.'">';
                   }
                   else
                   {
                     echo 'placeholder="Nombre Item">';
                   }
                ?>
            </div>
          </div>
          <div class="form-group">
            <label for="Observaciones" class="col-lg-2 control-label">Observaciones</label>
            <div class="col-lg-6">
                <textarea  type="text" class="form-control" name ="Observaciones" id="Observaciones"
                  <?php
                     if(isset($item))
                     {
                       echo '>'.$obs.'</textarea>';
                     }
                     else
                     {
                       echo 'placeholder="Observaciones"></textarea>';
                     }
                  ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
             <input class="btn btn-lg btn-primary mitooltip" title="Grabar los cambios" type="submit" id="submit"
               <?php
                  if(!isset($item))
                  {
                    echo 'name="submit_Agregar_Item" value="Aceptar"';
                  }
                  else
                  {
                    echo 'name="submit_Modificar_Item" value="Aceptar"';
                  }
                ?>
                >
              <a class="btn btn-lg btn-primary mitooltip" title="Salir sin guardar" href="<?php echo base_url().'proyectos/modificar/'.$proy ?>">Volver</a>
            </div>
          </div><!--form-group-->
      </form><!--form-->
      <div class="col-xs-12">
        <div class="col-xs-4"></div>
        <div class="col-xs-4">
          <p class="text-center text-danger">  <?php echo validation_errors(); ?> </p>
        </div>
        <div class="col-xs-4"></div>
      </div>
    </div><!--row-->
</div> <!-- container -->
