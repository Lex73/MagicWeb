<div class="container">

	<div class="row">
        <div class="col-xs-8">
            <div class="alert alert-success">
                <i class="fa fa-graduation-cap fa-fw fa-2x"></i> Perfiles
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
        <div class="col-xs-1">
            <?php
                if($agregar == true)
                {
                    echo '<div> <a class="btn btn-sn btn-info mitooltip" title="Agregar Perfil" href="'.base_url().'perfiles/agregar"><i class="fa fa-plus fa-fw"></i></a></div>';
                }
            ?>
        </div>
    </div><!--row-->
    <div class="row">
        <div class="col-xs-12">
          <table class="table">
            <thead>
              <tr>
	                <th>#</th>
	                <th data-replace-tmp-key="bc910f8bdf70f29374f496f05be0330c"><os-p key="bc910f8bdf70f29374f496f05be0330c">ID Perfil</os-p></th>
	                <th data-replace-tmp-key="77587239bf4c54ea493c7033e1dbf636"><os-p key="77587239bf4c54ea493c7033e1dbf636">Nombre de perfil</os-p></th>
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
				          $i = 1;
									foreach ($query as $row)
									{
				              echo '<tr>';
				              echo '<td>'.$i++.'</td>';
				              echo '<td data-replace-tmp-key="b82a9a13f4651e9abcbde90cd24ce2cb"><os-p key="b82a9a13f4651e9abcbde90cd24ce2cb">'.$row->IDPerfiles.'</os-p></td>';
				              echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8"><os-p key="846ebd7315632b4efd778655c824ebd8">'.$row->NombrePerfil.'</os-p></td>';
		                      if($modificar == true)
		                      {
		                          echo '<td data-replace-tmp-key="846ebd7315632b4efd778655c824ebd8">
		                                <os-p key="846ebd7315632b4efd778655c824ebd8"></os-p>
		                                <a class="btn btn-xs btn-success mitooltip" title="Modificar este Perfil" href="'.base_url().'perfiles/modificar/'.$row->IDPerfiles.'"><i class="fa fa-pencil-square-o"></i></a>
		                                </td>';
		                      }
				              echo '</tr>';
		          		}
							?>
            </tbody>
          </table>
    	</div>
	</div><!--row-->
</div> <!-- /container -->
