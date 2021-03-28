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
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_visualizatabelas = array();    
            foreach ($visualizatabelas as $array) {
              foreach ($array as $key => $value) {
                $options_visualizatabelas[$key] = $key;
              }
              break;
            }

            echo form_open("admin/visualizatabelas", $attributes);

              echo form_hidden('onsubmit', 'true');
              
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);
				
              echo form_label("in:", "colunaSearch");
              echo form_dropdown("colunaSearch", $options_visualizatabelas, $colunaSearch, 'class="span2"');
              
              echo form_label("Coluna:", "coluna");
              echo form_dropdown("coluna", $options_visualizatabelas, $coluna, 'class="span2"');
              
              echo form_label("Entre:", "startRange");
              echo form_input("startRange", $startRange, 'style="width:90px"');
              echo form_label("e:", "endRange");
              echo form_input("endRange", $endRange, 'style="width:90px"');
              
              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_visualizatabelas, $order, 'class="span2"');

              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Go");

              $options_order_type = array("Asc" => "Asc", "Desc" => "Desc");
              echo form_dropdown("order_type", $options_order_type, $order_type_selected, 'class="span1"');
              
              echo form_label("Número de Registros por Página:", "limit_page");
              echo form_input("limit_page", $per_page_selected, 'style="width:90px"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<?php
            		$firstreg = true;
            		foreach	($options_visualizatabelas as $row)	:
            			if($firstreg){
            				echo '<th class="header">'.$row.'</th>';
            			}else{
							echo '<th class="yellow header headerSortDown">'.$row.'</th>';
						}
            		endforeach;
            	?>
            	
	    	  </tr>
	            </thead>
	            <tbody>
	         	<?php
	              foreach($visualizatabelas as $row)
	              {
	              	echo "<tr>";
	              	foreach	($row as $value)	:
	              		echo "<td>".$value."</td>";
	              	endforeach;
	          		//echo '<td class="crud-actions">';
                    	//echo '<a href="'.site_url("admin").'/visualizatabelas/update/'.$row['id'].'" class="btn btn-info">view & edit</a>';  
                    	//echo '<a href="'.site_url("admin").'/visualizatabelas/delete/'.$row['id'].'" class="btn btn-danger">delete</a>';
                	//echo '</td>';
                  	echo "</tr>";
              	  }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>