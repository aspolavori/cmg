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
            $options_ocorrencia_logs = array();    
            foreach ($ocorrencia_logs as $array) {
              foreach ($array as $key => $value) {
                $options_ocorrencia_logs[$key] = $key;
              }
              break;
            }

            echo form_open("admin/ocorrencia_logs", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_ocorrencia_logs, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Log</th>
				<th class="yellow header headerSortDown">Tipo Ocorrencia</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($ocorrencia_logs as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['ID_OCORRENCIA_LOG'].'</td>';
					echo '<td>'.$row['ID_LOG'].'</td>';
					echo '<td>'.$row['ID_TIPO_OCORRENCIA'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/ocorrencia_logs/update/'.$row['ID_OCORRENCIA_LOG'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/ocorrencia_logs/delete/'.$row['ID_OCORRENCIA_LOG'].'" class="btn btn-danger">delete</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>