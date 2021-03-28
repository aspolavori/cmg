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
            $options_pesquisa_trafegos = array();    
            foreach ($pesquisa_trafegos as $array) {
              foreach ($array as $key => $value) {
                $options_pesquisa_trafegos[$key] = $key;
              }
              break;
            }

            echo form_open("admin/pesquisa_trafegos", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_pesquisa_trafegos, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Classificação Veicular</th>
				<th class="yellow header headerSortDown">Título</th>
				<th class="yellow header headerSortDown">Rodovia</th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">Trecho</th>
				<th class="yellow header headerSortDown">KM</th>
				<th class="yellow header headerSortDown">Latitude</th>
				<th class="yellow header headerSortDown">Longitude</th>
				<th class="yellow header headerSortDown">Data Inicio</th>
				<th class="yellow header headerSortDown">Data Fim</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($pesquisa_trafegos as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['classeveiculo'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['rodovia'].'</td>';
					echo '<td>'.$row['uf'].'</td>';
					echo '<td>'.$row['trecho'].'</td>';
					echo '<td>'.$row['km'].'</td>';
					echo '<td>'.$row['lat'].'</td>';
					echo '<td>'.$row['long'].'</td>';
					echo '<td>'.$row['data_ini'].'</td>';
					echo '<td>'.$row['data_fim'].'</td>';
					
	          echo '<td class="crud-actions">
              	  <a href="'.site_url("admin").'/pesquisa_trafegos/contagens_list/'.$row['id'].'" class="btn btn-info" style="width:100px;" >Contagens</a> </br>
        		  <a href="'.site_url("admin").'/pesquisa_trafegos/origens_destinos_list/'.$row['id'].'" class="btn btn-info" style="width:100px;" >ODs</a> </br>
                  <a href="'.site_url("admin").'/pesquisa_trafegos/update/'.$row['id'].'" class="btn btn-info" style="width:100px;">Ver & editar</a> </br> 
                  <a href="'.site_url("admin").'/pesquisa_trafegos/delete/'.$row['id'].'" class="btn btn-danger" style="width:100px;">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>