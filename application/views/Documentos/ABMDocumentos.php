<div class="container">
<div class="row">
      <div class="col-xs-8">
          <div class="alert alert-success">
              <i class="fa fa-file-text-o fa-fw fa-2x"></i>
              <?php
                if(isset($documento))
                {
                  foreach ($documento as $row)
                  {
                    echo 'Modificar: '.$row->CodigoProtocolo.'-'.$row->NombreProtocolo;
                  }
                }
                else
                {
                  echo 'Agregar nuevo documento para el item';
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
   <form class="form-horizontal" role="form" name="jsForm_Agregar_Docs" id="jsForm_Agregar_Docs" action="<?php echo base_url(); ?>documentos/operaciones_documentos" method="POST">
        <div class="form-group">
         <label for="IDProyecto" class="col-lg-3 control-label">IDProyecto</label>
         <div class="col-xs-1">
         	<input type="text" class="form-control" name ="IDProyecto" id="IDProyecto" value=
            <?php
               if(isset($proy))
               {
                  foreach ($proy as $row)
                  {
                     echo $row->IDProyecto;
                  }
               }
               ?>
               readonly>
                </div><!-- col-xs-1 -->
                <div class="col-xs-6">
                     <label type="text" class="form-control" name ="NombreProyecto" id="NombreProyecto">
                     <?php
                        if(isset($proy))
                        {
                            foreach ($proy as $row)
                            {
                                echo $row->NombreProyecto;
                            }
                        }
                     ?>
                    </label>
                </div><!-- col-xs-6 -->
            </div><!-- form-group-->
            <div class="form-group">
            <label for="IDCliente" class="col-lg-3 control-label" style="display: none;">IDCliente</label>
             <div class="col-xs-1">
              <input type="text" class="form-control" name ="IDCliente" id="IDCliente" style="display: none;" value=
                <?php
                   if(isset($proy))
                   {
                      foreach ($proy as $row)
                      {
                         echo $row->IDCliente;
                      }
                   }
                   ?>
                   readonly>
                    </div><!-- col-xs-1 -->
              </div><!-- form-group-->
            <div class="form-group">
                <label for="IDItemProyecto" class="col-lg-3 control-label">Item Proyecto</label>
                <div class="col-xs-1">
                     <input type="text" class="form-control" name ="IDItemProyecto" id="IDItemProyecto" value=
                     <?php
                        if(isset($item))
                        {
                            foreach ($item as $row)
                            {
                                echo $row->IDItemProyecto;
                            }
                        }
                     ?>
                     readonly>
                </div><!-- col-xs-1 -->
                <div class="col-xs-6">
                     <label type="text" class="form-control" name ="NombreItem" id="NombreItem">
                     <?php
                        if(isset($item))
                        {
                            foreach ($item as $row)
                            {
                                echo $row->NombreItem;
                            }
                        }
                     ?>
                     </label>
                </div><!-- col-xs-6 -->
            </div><!-- form-group-->
            <div class="form-group">
                <label for="CodigoProtocolo" class="col-lg-3 control-label">Codigo Protocolo</label>
                <div class="col-lg-4">
                <?php
                  if(isset($documento))
                  {
                      foreach ($documento as $row)
                      {
                        echo '<input type="text" class="form-control" name ="CodigoProtocolo" id="CodigoProtocolo"';
                        echo 'value="'.$row->CodigoProtocolo.'" readonly>';
                        echo '</div><!-- col-lg-2 -->';

                        if($soloVer == 'N')
                        {
                          echo '<button type="button" class="btn btn-default mitooltip" title="Nueva versión del documento" name ="jsNuevaVersion" id="jsNuevaVersion">Nueva Version</button>';
                        }
                      }
                  }
                  else
                  {
                    echo '<input type="text" class="form-control" name ="CodigoProtocolo" id="CodigoProtocolo" placeholder="Codigo Protocolo"readonly>';
                    echo '</div><!-- col-lg-2 -->';
                    echo '<button type="button" class="btn btn-default mitooltip" title="Obtener el Código" name ="jsObtenerCodigo" id="jsObtenerCodigo">Código</button>';
                  }
                ?>
                <i class="fa fa-refresh fa-lg fa-spin think"></i>
            </div><!-- form-group-->
            <div class="form-group">
                <label for="NombreProtocolo" class="col-lg-3 control-label">Nombre Protocolo</label>
                <div class="col-lg-7">
                  <?php
                    if(isset($documento))
                    {
                      foreach ($documento as $row)
                      {
                         echo '<input type="text" class="form-control" name ="NombreProtocolo" id="NombreProtocolo"';
                         echo 'value="'.$row->NombreProtocolo.'"';
                         if($soloVer == 'S')
                         {
                            echo 'readonly';
                         }
                         echo '>';
                      }
                    }
                    else
                    {
                       echo '<input type="text" class="form-control  mitooltip" title="Ingrese un nombre" name ="NombreProtocolo" id="NombreProtocolo" placeholder="Nombre Protocolo">';
                    }
                  ?>
                </div><!-- col-lg-8 -->
            </div><!-- form-group-->
            <div class="form-group">
                <label for="Etapa" class="col-lg-3 control-label">Etapa</label>
                <div class="col-lg-4">
                      <?php
                        if(!isset($documento))
                        {
                          echo '<select class="input-large form-control" name ="idEt" id="idEt">';
                          echo '<option value="">Seleccione una Etapa</option>';
                          foreach ($etapas as $row)
                          {
                            echo '<option value="'.$row->IDEtapa.'">'.$row->NombreEtapa.'</option>';
                          }
                        }
                        else
                        {
                          echo '<select class="input-large form-control" name ="idEt" id="idEt" readonly>';
                          foreach ($documento as $row)
                          {
                            foreach ($etapas as $rowAux)
                            {
                              if($rowAux->IDEtapa == $row->IDEtapa)
                              {
                                echo '<option selected value="'.$rowAux->IDEtapa.'" disabled="true">'.$rowAux->NombreEtapa.'</option>';
                              }
                              else
                              {

                              }
                            }
                          }
                        }
                      ?>
                    </select>
                    <?php
                      if(!isset($documento))
                      {
                          echo '<input  type="text" class="form-control mitooltip"  name ="Et" id="Et" style="display:none;">';
                      }
                      else
                      {
                          foreach ($documento as $row)
                          {
                                echo '<input  type="text" class="form-control mitooltip"  name ="Et" id="Et" value="'.$row->IDEtapa.'" style="display:none;" >';
                          }
                      }
                    ?>
                </div><!-- col-lg-8 -->
            </div><!-- form-group-->
            <div class="form-group">
                <label for="Sistema" class="col-lg-3 control-label">Sistema</label>
                <div class="col-lg-4">
                        <?php
                            if(!isset($documento))
                            {
                              echo '<select class="input-large form-control" name ="Sistema" id="Sistema">';
                              echo '<option value="">Seleccione un Sistema</option>';
                              foreach ($sistemas as $row)
                              {
                                echo '<option value="'.$row->IDSistema.'">'.$row->NombreSistema.'</option>';
                              }
                            }
                            else
                            {
                              echo '<select class="input-large form-control" name ="Sistema" id="Sistema" ';
                              if($soloVer == 'S')
                              {
                                echo 'readonly';
                              }
                              echo '>';

                              foreach ($documento as $row)
                              {
                                foreach ($sistemas as $rowAux)
                                {
                                  if($rowAux->IDSistema == $row->IDSistema)
                                  {
                                    echo '<option selected value="'.$rowAux->IDSistema.'">'.$rowAux->NombreSistema.'</option>';
                                  }
                                  else
                                  {
                                    if($soloVer == 'N')
                                    {
                                      echo '<option value="'.$rowAux->IDSistema.'">'.$rowAux->NombreSistema.'</option>';
                                    }
                                  }
                                }
                              }
                            }
                        ?>
                    </select>
                </div><!-- col-lg-8 -->
            </div><!-- form-group-->
            <div class="form-group">
                <label for="CodigoCliente" class="col-lg-3 control-label">Codigo Cliente</label>
                <div class="col-lg-4">
                  <?php
                    if(isset($documento))
                    {
                      foreach ($documento as $row)
                      {
                         echo '<input  type="text" class="form-control  mitooltip" title="Codigo asignado por el cliente" name ="CodigoCliente" id="CodigoCliente"';
                         echo 'value="'.$row->CodigoCliente.'"';
                         if($soloVer == 'S')
                         {
                            echo 'readonly';
                         }
                         echo '>';
                      }
                    }
                    else
                    {
                       echo '<input  type="text" class="form-control mitooltip" title="Codigo asignado por el cliente" name ="CodigoCliente" id="CodigoCliente" placeholder="Codigo Cliente">';
                    }
                  ?>
                </div><!-- col-lg-8 -->
            </div><!-- form-group-->
            <div class="form-group">
                <label for="Estado" class="col-lg-3 control-label">Estado</label>
                <div class="col-lg-4">
                      <?php
                          if(!isset($documento))
                          {
                            echo '<select class="input-large form-control" name ="Estado" id="Estado">';
                            echo '<option value="">Seleccione un Estado</option>';
                            foreach ($estados as $row)
                            {
                              echo '<option value="'.$row->IDEstados.'">'.$row->NombreEstado.'</option>';
                            }
                          }
                          else
                          {
                            echo '<select class="input-large form-control" name ="Estado" id="Estado"';
                            if($soloVer == 'S')
                            {
                              echo 'readonly';
                            }
                            echo '>';

                            foreach ($documento as $row)
                            {
                              foreach ($estados as $rowAux)
                              {
                                if($rowAux->IDEstados == $row->IDEstado)
                                {
                                  echo '<option selected value="'.$rowAux->IDEstados.'">'.$rowAux->NombreEstado.'</option>';
                                }
                                else
                                {
                                  if($soloVer == 'N')
                                  {
                                    echo '<option value="'.$rowAux->IDEstados.'">'.$rowAux->NombreEstado.'</option>';
                                  }
                                }
                              }
                            }
                          }
                      ?>
                    </select>
                </div><!-- col-lg-8 -->
            </div><!-- form-group-->
            <div class="form-group">
              <label for="FechaEntrega" class="col-lg-3 control-label">Fecha Entrega</label>
                <div class="col-lg-4">
                    <?php
                      if(isset($documento))
                      {
                        if($soloVer == 'N')
                        {
                              echo '<div class="input-group input-append date" id="dateRangePicker" name="dateRangePicker">';
                              foreach ($documento as $row)
                              {
                                $fecha = $row->FechaEntrega;

                                echo '<input type="text" class="form-control" name="FechaEntrega"';
                                if($fecha == '0000-00-00')
                                {
                                  echo '"/>';
                                }
                                else
                                {
                                  echo 'value="'.$fecha.'"/>';
                                }
                              }
                              echo '<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>';
                              echo '</div>';
                        }
                        else
                        {
                          echo '<input  type="text" class="form-control" name ="FechaEntrega" id="FechaEntrega"';
                          $fecha = $row->FechaEntrega;
                          if($fecha == '0000-00-00')
                          {
                            echo 'value=""';
                          }
                          else
                          {
                            echo 'value="'.$fecha .'"';
                          }
                          echo ' readonly >';
                        }
                      }
                      else
                      {
                        echo '<div class="input-group input-append date" id="dateRangePicker" name="dateRangePicker">';
                        echo '<input type="text" class="form-control" name="FechaEntrega" />';
                        echo '<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>';
                        echo '</div>';
                      }
                    ?>
                </div>
            </div><!-- form-group-->
            <div class="col-xs-2">
              <?php
                if(isset($documento))
                {
                  echo '<input type="text" class="lexHide" name ="VersionNueva" id="VersionNueva" value="N">';
                  echo '<input type="text" class="lexHide" name ="CodigoAnterior" id="CodigoAnterior" value="">';
                }
                else
                {
                  echo '<input type="text" class="lexHide" name ="VersionNueva" id="VersionNueva" value="S">';
                  echo '<input type="text" class="lexHide" name ="CodigoAnterior" id="CodigoAnterior" value="">';
                }
              ?>
            </div>
            <div class="col-xs-1"> <span class="hola"></span></div>
            <div class="col-xs-1"></div>
            <div class="col-xs-1"></div>
            <div class="col-xs-1"></div>
            <div class="col-xs-1"></div>
            <div class="col-xs-1"></div>
            <div class="col-xs-1">
              <?php
                  if(isset($documento))
                  {
                    if($soloVer == 'N')
                    {
                      echo '<input class="btn btn-sn btn-primary mitooltip" title="Grabar cambios" type="submit" id="submit" name="submit_Modificar_Documentos" value="Aceptar"/>';
                    }
                  }
                  else
                  {
                      echo '<input class="btn btn-sn btn-primary mitooltip" title="Grabar cambios" type="submit" id="submit" name="submit_Agregar_Documentos" value="Aceptar"/>';
                  }
              ?>
            </div>
            <div class="col-xs-1">
              <?php
                  foreach ($proy as $row)
                  {
                     $p = $row->IDProyecto;
                  }
                  foreach ($item as $row)
                  {
                     $i = $row->IDItemProyecto;
                  }
                  echo '<a class="btn btn-sn btn-primary mitooltip" title="Salir sin guardar" href="'.base_url().'documentos/Index/'.$p.'/'.$i.'">Salir</a>';
              ?>
            </div>
            <div class="col-xs-2"></div>
        </form><!--form-->
        <div class="col-xs-12">
          <div class="col-xs-4"></div>
          <div class="col-xs-4">
            <p class="text-center text-danger">  <?php echo validation_errors(); ?> </p>
          </div>
          <div class="col-xs-4"></div>
        </div>
    </div><!--modal-body-->
</div>
