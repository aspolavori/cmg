    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst('Fator de conversão padrão HDM veículos');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('Fator de conversão padrão HDM veículos');?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_fator_conversao_padrao = array();    
            foreach ($fator_conversao_padrao as $array) {
              foreach ($array as $key => $value) {
                $options_fator_conversao_padrao[$key] = $key;
              }
              break;
            }

            $option_veiculos = array();
            foreach($veiculos as $item){
            	$option_veiculos[$item['id']] = $item['VEH_NAME'];
            }
            
            echo form_open("admin/fator_conversao_padrao", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_fator_conversao_padrao, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Veículo</th>
				<th class="yellow header headerSortDown">EUC_LABOUR</th>
				<th class="yellow header headerSortDown">EUC_CREW</th>
				<th class="yellow header headerSortDown">EUC_TYRE</th>
				<th class="yellow header headerSortDown">EUC_OIL</th>
				<th class="yellow header headerSortDown">EUC_OHEAD</th>
				<th class="yellow header headerSortDown">EUC_VEH</th>
				<th class="yellow header headerSortDown">EUC_GAS</th>
				<th class="yellow header headerSortDown">EUC_OLEO</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($fator_conversao_padrao as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$option_veiculos[$row['id_veiculo']].'</td>';
					echo '<td>'.$row['FEUC_LABOUR'].'</td>';
					echo '<td>'.$row['FEUC_CREW'].'</td>';
					echo '<td>'.$row['FEUC_TYRE'].'</td>';
					echo '<td>'.$row['FEUC_OIL'].'</td>';
					echo '<td>'.$row['FEUC_OHEAD'].'</td>';
					echo '<td>'.$row['FEUC_VEH'].'</td>';
					echo '<td>'.$row['FEUC_GAS'].'</td>';
					echo '<td>'.$row['FEUC_OLEO'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/fator_conversao_padrao/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/fator_conversao_padrao/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>