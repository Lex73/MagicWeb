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
                Documentos proyecto:
                <?php
                    foreach ($proy as $row)
                    {
                        echo ' '.$row->NombreProyecto;
                    }
                ?>
                - Item del proyecto:
                <?php
                    foreach ($item as $row)
                    {
                        echo ' '.$row->NombreItem;
                    }
                ?>
          </div>
        </div>
        <div class="col-xs-1"></div>
        <div class="col-xs-1">
            <?php
                if($agregar == true)
                {
                    echo '<div> <a class="btn btn-sn btn-info mitooltip" title="Agregar Documento" href="'.base_url().'documentos/agregar/'.$row->IDProyecto.'/'.$row->IDItemProyecto.'"><i class="fa fa-plus fa-fw"></i></a></div>';
                }
            ?>
        </div>
    </div><!--row-->

    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th data-replace-tmp-key="bc910f8bdf70f29374f496f05be0330c"><os-p key="bc910f8bdf70f29374f496f05be0330c">Código Protocolo</os-p></th>
                        <th data-replace-tmp-key="77587239bf4c54ea493c7033e1dbf636"><os-p key="77587239bf4c54ea493c7033e1dbf636">Nombre de Protocolo</os-p></th>
                        <th data-replace-tmp-key="77587239bf4c54ea493c7033e1dbf636"><os-p key="77587239bf4c54ea493c7033e1dbf636">Etapa</os-p></th>
                        <th data-replace-tmp-key="77587239bf4c54ea493c7033e1dbf636"><os-p key="77587239bf4c54ea493c7033e1dbf636">Sistema</os-p></th>
                        <th data-replace-tmp-key="77587239bf4c54ea493c7033e1dbf636"><os-p key="77587239bf4c54ea493c7033e1dbf636">Cod. Cliente</os-p></th>
                        <th data-replace-tmp-key="77587239bf4c54ea493c7033e1dbf636"><os-p key="77587239bf4c54ea493c7033e1dbf636">Estado</os-p></th>
                        <th data-replace-tmp-key="77587239bf4c54ea493c7033e1dbf636"><os-p key="77587239bf4c54ea493c7033e1dbf636">Fecha Entrega</os-p></th>
                        <?php
                            if($modificar == true)
                            {
                                echo '<th data-replace-tmp-key="f6039d44b29456b20f8f373155ae4973"><os-p key="f6039d44b29456b20f8f373155ae4973">Acción</os-p></th>';
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($query as $row)
                    {
                      echo '<tr>';
                      echo '<td data-replace-tmp-key="b82a9a13f4651e9abcbde90cd24ce2cb"><os-p key="b82a9a13f4651e9abcbde90cd24ce2cb">'.$row->CodigoProtocolo.'</os-p></td>';
                      echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$row->NombreProtocolo.'</os-p></td>';
                      echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$row->IDEtapa.'</os-p></td>';
                      echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$row->IDSistema.'</os-p></td>';
                      echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$row->CodigoCliente.'</os-p></td>';
                      echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$row->IDEstado.'</os-p></td>';
                      $fecha = $row->FechaEntrega;
                      if($fecha == '0000-00-00')
                      {
                        echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8"></os-p></td>';
                      }
                      else
                      {
                        echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$fecha .'</os-p></td>';
                      }
                      if($modificar == true)
                      {
                        if($row->nuevaversion == 'N')
                        {
                          echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8">
                                <os-p key="846ebd7315632b4efd778655c824ebd8"></os-p>
                                <a class="btn btn-xs btn-success mitooltip" title="Modificar este Documento" href="'.base_url().'documentos/modificar/'.$row->IDProyecto.'/'.$row->IDItemProyecto.'/'.$row->CodigoProtocolo.'"><i class="fa fa-pencil-square-o"></i></a>
                                </td>';
                        }
                        else
                        {
                          echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8">
                                <os-p key="846ebd7315632b4efd778655c824ebd8"></os-p>
                                <a class="btn btn-xs btn-success mitooltip" title="Ver este Usuario" href="'.base_url().'documentos/ver/'.$row->IDProyecto.'/'.$row->IDItemProyecto.'/'.$row->CodigoProtocolo.'"><i class="fa fa-search"></i></a>
                                </td>';
                        }
                      }
                      echo '</tr>';
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </div><!--row-->
</div> <!-- /container -->
