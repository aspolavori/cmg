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
            $options_sicro_material_betuminoso_custo = array();    
            foreach ($sicro_material_betuminoso_custo as $array) {
              foreach ($array as $key => $value) {
                $options_sicro_material_betuminoso_custo[$key] = $key;
              }
              break;
            }

            echo form_open("admin/sicro_material_betuminoso_custo", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_sicro_material_betuminoso_custo, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Sicro</th>
				<th class="yellow header headerSortDown">Betuminoso</th>
				<th class="yellow header headerSortDown">Custo Unit??rio</th>
				<th class="yellow header headerSortDown">Observa????o</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($sicro_material_betuminoso_custo as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['id_sicro'].'</td>';
					echo '<td>'.$row['id_material_betuminoso'].'</td>';
					echo '<td>'.$row['custo_unitario'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/sicro_material_betuminoso_custo/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/sicro_material_betuminoso_custo/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>