    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2) ?>">
	            <?php echo ucfirst($this->uri->segment(2));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo 'Origem Destino'?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Pesquisas Origem Destino
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/origens_destinos_add/<?php echo $id_pesquisa_trafego ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_origens_destinos = array();    
            foreach ($origens_destinos as $array) {
              foreach ($array as $key => $value) {
                $options_origens_destinos[$key] = $key;
              }
              break;
            }

            echo form_open("admin/origens_destinos", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_origens_destinos, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Sentido</th>
				<th class="yellow header headerSortDown">Ve??culo</th>
				<th class="yellow header headerSortDown">Placa</th>
				<th class="yellow header headerSortDown">Data</th>
				<th class="yellow header headerSortDown">Hora</th>
				<th class="yellow header headerSortDown">Origem Pa??s</th>
				<th class="yellow header headerSortDown">Origem UF</th>
				<th class="yellow header headerSortDown">Origem Municipio</th>
				<th class="yellow header headerSortDown">GeoCod Origem</th>
				<th class="yellow header headerSortDown">Destino Pa??s</th>
				<th class="yellow header headerSortDown">Destino UF</th>
				<th class="yellow header headerSortDown">Destino Municipio</th>
				<th class="yellow header headerSortDown">GeoCod Destino</th>
				<th class="yellow header headerSortDown">Combust??vel</th>
				<th class="yellow header headerSortDown">Categoria</th>
				<th class="yellow header headerSortDown">Numero de Pessoas</th>
				<th class="yellow header headerSortDown">Renda M??dia</th>
				<th class="yellow header headerSortDown">Motivo</th>
				<th class="yellow header headerSortDown">Frequencia</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($origens_destinos as $row)
	              {
	                echo '<tr>';
					echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['label_origem'].'->'.$row['label_destino'].'</td>';
					echo '<td>'.$row['classeVeiculo'].'</td>';
					echo '<td>'.$row['placa'].'</td>';
					echo '<td>'.$row['data'].'</td>';
					echo '<td>'.$row['hora'].'</td>';
					echo '<td>'.$row['origem_pais'].'</td>';
					echo '<td>'.$row['origem_uf'].'</td>';
					echo '<td>'.$row['origem_municipio'].'</td>';
					echo '<td>'.$row['origem_geocod'].'</td>';
					echo '<td>'.$row['destino_pais'].'</td>';
					echo '<td>'.$row['destino_uf'].'</td>';
					echo '<td>'.$row['destino_municipio'].'</td>';
					echo '<td>'.$row['destino_geocod'].'</td>';
					echo '<td>'.$row['combustivel'].'</td>';
					echo '<td>'.$row['categoria'].'</td>';
					echo '<td>'.$row['num_pessoas'].'</td>';
					echo '<td>'.$row['renda_media'].'</td>';
					echo '<td>'.$row['motivo'].'</td>';
					echo '<td>'.$row['frequencia'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/pesquisa_trafegos/origens_destinos_update/'.$row['id_pesquisa'].'/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/origens_destinos/delete/'.$row['id'].'/'.$row['id_pesquisa'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>