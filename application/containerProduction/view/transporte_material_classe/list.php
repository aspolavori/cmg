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
           
            //save the columns names in a array that we will use as filter         
            $options_transporte_material_classe = array();    
            foreach ($transporte_material_classe as $array) {
              foreach ($array as $key => $value) {
                $options_transporte_material_classe[$key] = $key;
              }
              break;
            }

            echo form_open("admin/transporte_material_classe", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_transporte_material_classe, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Transporte</th>
				<th class="yellow header headerSortDown">Composição</th>
				<th class="yellow header headerSortDown">Material</th>
				<th class="yellow header headerSortDown">Origem</th>
				<th class="yellow header headerSortDown">Destino</th>
				<th class="yellow header headerSortDown">Distância (km)</th>
				<th class="yellow header headerSortDown">Fórmula</th>
				<th class="yellow header headerSortDown">Trans./Veíc./Caminho</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($transporte_material_classe as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['id_transporte'].'</td>';
					echo '<td>'.$row['id_composicao'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['origem'].'</td>';
					echo '<td>'.$row['destino'].'</td>';
					echo '<td>'.$row['distancia'].'</td>';
					echo '<td>'.$row['formula'].'</td>';
					echo '<td>'.$row['trans_veic_caminho'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/transporte_material_classe/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/transporte_material_classe/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>