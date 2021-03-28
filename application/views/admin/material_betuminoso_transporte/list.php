    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst($this->uri->segment(2));?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst($this->uri->segment(2));?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
            
            $options_tranporte = array('' => 'Nenhum');
            foreach ($transporte_material_classe as $row)
            {
            	$options_tranporte[$row["id_secundario"]] = $row["titulo"].' - '.$row["origem"].' - '.$row["destino"].' - '.$row["trans_veic_caminho"];
            }
            
            $options_materiais = array();
            foreach ($materiais as $row)
            {
            	$options_materiais[$row["id"]] = $row["codigo"].' - '.$row["titulo"];
            }
           
            //save the columns names in a array that we will use as filter         
            $options_material_betuminoso_transporte = array();    
            foreach ($material_betuminoso_transporte as $array) {
              foreach ($array as $key => $value) {
                $options_material_betuminoso_transporte[$key] = $key;
              }
              break;
            }

            echo form_open("admin/material_betuminoso_transporte", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_material_betuminoso_transporte, $order, 'class="span2"');

              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Ir");

              $options_order_type = array("Asc" => "Asc", "Desc" => "Desc");
              echo form_dropdown("order_type", $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Material</th>
				<th class="yellow header headerSortDown">transporte 1</th>
				<th class="yellow header headerSortDown">transporte 2</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($material_betuminoso_transporte as $row)
	              {
	                echo '<tr>';
	                echo '<td>';
	               		echo (isset($options_materiais[$row['id_material_betuminoso']])) ? $options_materiais[$row['id_material_betuminoso']] : 'Nenhum';
	                echo '</td>';
	                echo '<td>';
	                	echo (isset($options_tranporte[$row['id_transporte_material_classe1']])) ? $options_tranporte[$row['id_transporte_material_classe1']] : 'Fator de Correção';
	                echo '</td>';
	                echo '<td>';
	                	echo (isset($options_tranporte[$row['id_transporte_material_classe2']])) ? $options_tranporte[$row['id_transporte_material_classe2']] : 'Fator de Correção';
	                echo '</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/material_betuminoso_transporte/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/material_betuminoso_transporte/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>