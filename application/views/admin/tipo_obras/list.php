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
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_tipo_obras = array();    
            foreach ($tipo_obras as $array) {
              foreach ($array as $key => $value) {
                $options_tipo_obras[$key] = $key;
              }
              break;
            }

            echo form_open("admin/tipo_obras", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_tipo_obras, $order, 'class="span2"');

              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Go");

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
				<th class="yellow header headerSortDown">C??digo </th>
				<th class="yellow header headerSortDown">Descri????o</th>
				<th class="yellow header headerSortDown">Classifica????o</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($tipo_obras as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['codigo'].'</td>';
					echo '<td>'.$row['descricao'].'</td>';
					echo '<td>';
					switch ($row['unidade']) {
						case 1 :
							echo 'Caracter??stica da Rodovia';
							break;
						case 2:
							echo 'Tipo de Obra';
							break;
						default :	
							echo 'Local da Interven????o';
							break;
					}
					echo '</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/tipo_obras/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/tipo_obras/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>