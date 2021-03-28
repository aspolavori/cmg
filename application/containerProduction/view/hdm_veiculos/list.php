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
            $options_hdm_veiculos = array();    
            foreach ($hdm_veiculos as $array) {
              foreach ($array as $key => $value) {
                $options_hdm_veiculos[$key] = $key;
              }
              break;
            }

            echo form_open("admin/hdm_veiculos", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_hdm_veiculos, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Reajuste Salário</th>
				<th class="yellow header headerSortDown">Ind. Reajuste</th>
				<th class="yellow header headerSortDown">Ind. Variação IGPM</th>
				<th class="yellow header headerSortDown">Valor Gasolina</th>
				<th class="yellow header headerSortDown">Fator Gasolina</th>
				<th class="yellow header headerSortDown">Valor Oleo</th>
				<th class="yellow header headerSortDown">Fator Oleo</th>
				<th class="yellow header headerSortDown">Valor Ec. Gasolina</th>
				<th class="yellow header headerSortDown">Valor E. Oleo</th>
				<th class="yellow header headerSortDown">Data Base</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($hdm_veiculos as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['reajuste_salario'].'</td>';
					echo '<td>'.$row['ind_reajuste'].'</td>';
					echo '<td>'.$row['ind_var_igpm'].'</td>';
					echo '<td>'.$row['valor_gasolina'].'</td>';
					echo '<td>'.$row['gasolina_fator_conversao'].'</td>';
					echo '<td>'.$row['valor_oleo'].'</td>';
					echo '<td>'.$row['oleo_fator_conversao'].'</td>';
					echo '<td>'.$row['valor_gas_e'].'</td>';
					echo '<td>'.$row['valor_oleo_e'].'</td>';
					echo '<td>'.$row['data_base'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/hdm_veiculos/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/hdm_veiculos/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>