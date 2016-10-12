<div class="container">
  <div class="row">
      <div class="col-xs-8">
          <div class="alert alert-success">
              <i class="fa fa-cubes fa-fw fa-2x"></i>
              <?php
                if(isset($proyecto))
                {
                  foreach ($proyecto as $row)
                  {
                    echo 'Modificar: '.$row->IDProyecto.'-'.$row->NombreProyecto;
                  }
                }
                else
                {
                  echo 'Agregar nuevo proyecto';
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
    <form class="form-horizontal" role="form" name="Form_Agregar_Usuarios" action="<?php echo base_url(); ?>proyectos/operaciones_proyectos" method="POST">
      <?php
        if(isset($proyecto))
        {
          foreach ($proyecto as $row)
          {
            echo '<div class="form-group">';
            echo '<label for="IDProyecto" class="col-lg-2 control-label">ID de Proyecto</label>';
            echo '<div class="col-lg-2">';
            echo '<input type="text" class="form-control" name ="IDProyecto" id="IDProyecto"';
            echo ' value="'.$row->IDProyecto.'" readonly';
          }
            echo '>';
            echo '</div>';
            echo '</div>';//form-group
        }
      ?>
      <div class="form-group">
        <label for="NombreProyecto" class="col-lg-2 control-label">Nombre</label>
        <div class="col-lg-6">
          <input type="text" class="form-control" name ="NombreProyecto" id="NombreProyecto"
          <?php
            if(isset($proyecto))
            {
              foreach ($proyecto as $row)
              {
                echo ' value="'.$row->NombreProyecto.'"';
              }
            }
            else
            {
              echo ' value="'.@set_value('NombreProyecto').'" placeholder="Nombre Proyecto"';
            }
          ?>
        >
        </div>
      </div><!--form-group-->

      <div class="form-group">
        <label for="Cliente" class="col-lg-2 control-label">Cliente</label>
        <div class="col-lg-4">
          <select class="input-large form-control" name="IDCliente">
          <?php
              if(!isset($proyecto))
              {
                echo '<option value="">Seleccione un Cliente</option>';
                foreach ($query as $row)
                {
                  echo '<option value="'.$row->IDCliente.'">'.$row->NombreCliente.'</option>';
                }
              }
              else
              {
                foreach ($query as $row)
                {
                  foreach ($proyecto as $rowAux)
                  {
                    if($rowAux->IDCliente == $row->IDCliente)
                    {
                      echo '<option selected value="'.$row->IDCliente.'">'.$row->NombreCliente.'</option>';
                    }
                    else
                    {
                      echo '<option value="'.$row->IDCliente.'">'.$row->NombreCliente.'</option>';
                    }
                  }
                }
              }
          ?>
          </select>
        </div>
      </div><!--form-group-->

      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
         <input class="btn btn-lg btn-primary" type="submit" id="submit"
           <?php
              if(!isset($proyecto))
              {
                echo 'name="submit_Agregar_Proyecto" value="Aceptar"';
              }
              else
              {
                echo 'name="submit_Modificar_Proyecto" value="Aceptar"';
              }
            ?>
            >
          <a class="btn btn-lg btn-primary mitooltip" title="Volver a la pantalla anterior" href="<?php echo base_url(); ?>proyectos/">Volver</a>
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
    <br>
  </div><!--row-->

  <div class="row">
    <div class="col-xs-2"></div>
    <div class="col-xs-4">
      <div class="col-xs-6">
        <h4>Items del proyecto</h4>
      </div>
      <div class="col-xs-6">
        <?php
          if(isset($proyecto))
          {
            foreach ($proyecto as $row)
            {
              echo '<a class="btn btn-sm btn-info mitooltip" title="Agregar Item a este Proyecto" href="'.base_url().'items/agregar/'.$row->IDProyecto.'"><i class="fa fa-plus fa-fw"></i></a>';
            }
          }
          else
          {
          }
        ?>
      </div>
    </div>
    <div class="col-xs-4"></div>
  </div><!--row-->
  <div class="row">
    <div class="col-xs-2"></div>
    <div class="col-xs-4">
      <ul class="list-group">
        <?php
          if(isset($items))
          {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Item</th>';
            echo '<th>Acciones</th>';
            echo '<th></th>';
            echo '</tr>';
            echo '</thead>';
            foreach ($items as $rowAux)
            {
              echo '<tbody>';
              echo '<tr>';
              echo '<td>'.$rowAux->IDItemProyecto.'</td>';
              echo '<td>'.$rowAux->NombreItem.'</td>';
              echo '<td><a class="btn btn-xs btn-success mitooltip" title="Modificar este Item" href="'.base_url().'items/modificar/'.$rowAux->IDProyecto.'/'.$rowAux->IDItemProyecto.'"><i class="fa fa-pencil-square-o"></i></a></td>';
              echo '<td><a class="btn btn-xs btn-info mitooltip" title="Agregar Documento al Item" href="'.base_url().'documentos/index/'.$rowAux->IDProyecto.'/'.$rowAux->IDItemProyecto .'"><i class="fa fa-file-text-o"></i></a></td>';
              echo '</tr>';
            }
              echo '</tbody>';
              echo '</table>';
          }
        ?>
      </ul>
    </div>
    <div class="col-xs-4"></div>
  </div><!--row-->
</div> <!-- /container -->
