<div class="container">
	<div class="row">
        <div class="col-xs-2">
            <p class="text-success">
                <?php
                    echo $mensaje;
                ?>
            </p>
        </div>
        <div class="col-xs-8">
          <div class="alert alert-success">
						<i class="fa fa-pencil-square-o fa-fw fa-2x"></i>
                Documentos en el sistema:
          </div>
        </div>
        <div class="col-xs-1"></div>
        <div class="col-xs-1">
        </div>
    </div><!--row-->

    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th width="180">Código Protocolo</th>
                        <th width="400">Nombre de Protocolo</th>
                        <th>Etapa</th>
                        <th>Sistema</th>
                        <th>Cod. Cliente</th>
                        <th>Estado</th>
                        <th>Fecha Entrega</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($query as $row)
                    {
                      echo '<tr>';
                      echo '<td width="180">'.$row->CodigoProtocolo.'</os-p></td>';
                      echo '<td width="400">'.$row->NombreProtocolo.'</os-p></td>';
                      echo '<td>'.$row->IDEtapa.'</os-p></td>';
                      echo '<td>'.$row->IDSistema.'</os-p></td>';
                      echo '<td>'.$row->CodigoCliente.'</os-p></td>';
                      echo '<td>'.$row->IDEstado.'</os-p></td>';
                      $fecha = $row->FechaEntrega;
                      if($fecha == '0000-00-00')
                      {
                        echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8"></os-p></td>';
                      }
                      else
                      {
                        echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$fecha .'</os-p></td>';
                      }
                      echo '</tr>';
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div><!--row-->
</div> <!-- /container -->
