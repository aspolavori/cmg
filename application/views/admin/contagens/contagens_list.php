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
	          <?php echo 'Contagens'?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst($this->uri->segment(2));?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/contagem_add/<?php echo $id_pesquisa_trafego ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_contagens = array();    
            foreach ($contagens as $array) {
              foreach ($array as $key => $value) {
                $options_contagens[$key] = $key;
              }
              break;
            }

            echo form_open("admin/contagens", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_contagens, $order, 'class="span2"');

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
				<!-- <th class="yellow header headerSortDown">Pesquisa Tr??fego</th>  -->
				<th class="yellow header headerSortDown">Sentido</th>
				<th class="yellow header headerSortDown">Data</th>
				<th class="yellow header headerSortDown">Hora</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              
	              foreach($contagens as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					//echo '<td>'.$row['id_pesquisa_trafegos'].'</td>';
					echo '<td>'.$row['origem'].' - '.$row['destino'].'</td>';
					echo '<td>'.$row['data'].'</td>';
					echo '<td>'.$row['hora'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/pesquisa_trafegos/contagem_update/'.$row['id_pesquisa_trafegos'].'/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/contagens/delete/'.$row['id_pesquisa_trafegos'].'/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>