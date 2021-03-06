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
            $options_composicao_equipamento = array();    
            foreach ($composicao_equipamento as $array) {
              foreach ($array as $key => $value) {
                $options_composicao_equipamento[$key] = $key;
              }
              break;
            }

            echo form_open("admin/composicao_equipamento", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_composicao_equipamento, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Composi????o</th>
				<th class="yellow header headerSortDown">Equipamento</th>
				<th class="yellow header headerSortDown">Quantidade</th>
				<th class="yellow header headerSortDown">Utiliza????o Improdutivo</th>
				<th class="yellow header headerSortDown">Utiliza????o Operativo</th>
				<th class="yellow header headerSortDown">Observa????o</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($composicao_equipamento as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['id_composicao'].'</td>';
					echo '<td>'.$row['id_equipamento'].'</td>';
					echo '<td>'.$row['quantidade'].'</td>';
					echo '<td>'.$row['utilizacao_improdutivo'].'</td>';
					echo '<td>'.$row['utilizacao_operativo'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/composicao_equipamento/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/composicao_equipamento/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>