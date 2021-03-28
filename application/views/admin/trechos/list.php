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
            $options_trechos = array();    
            foreach ($trechos as $array) {
              foreach ($array as $key => $value) {
                $options_trechos[$key] = $key;
              }
              break;
            }

            echo form_open("admin/trechos", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_trechos, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Ciclo</th>
				<th class="yellow header headerSortDown">Lote</th>
				<th class="yellow header headerSortDown">Trecho</th>
				<th class="yellow header headerSortDown">Levantamento</th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">BR</th>
				<th class="yellow header headerSortDown">Pista</th>
				<th class="yellow header headerSortDown">Sentido</th>
				<th class="yellow header headerSortDown">Faixa</th>
				<th class="yellow header headerSortDown">Km Inicial</th>
				<th class="yellow header headerSortDown">Km Final</th>
				<th class="yellow header headerSortDown">DT Upload</th>
				<th class="yellow header headerSortDown">Descrição Caminho</th>
				<th class="yellow header headerSortDown">TP Trecho</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($trechos as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['ID_TRECHO'].'</td>';
					echo '<td>'.$row['ID_CICLO'].'</td>';
					echo '<td>'.$row['ID_LOTE'].'</td>';
					echo '<td>'.$row['NM_TRECHO'].'</td>';
					echo '<td>'.$row['DT_LEVANTAMENTO'].'</td>';
					echo '<td>'.$row['NM_UF'].'</td>';
					echo '<td>'.$row['NM_BR'].'</td>';
					echo '<td>'.$row['DESC_PISTA'].'</td>';
					echo '<td>'.$row['DESC_SENTIDO'].'</td>';
					echo '<td>'.$row['DESC_FAIXA'].'</td>';
					echo '<td>'.$row['KM_INICIAL'].'</td>';
					echo '<td>'.$row['KM_FINAL'].'</td>';
					echo '<td>'.$row['DT_UPLOAD'].'</td>';
					echo '<td>'.$row['DESC_CAMINHO'].'</td>';
					echo '<td>'.$row['ID_TP_TRECHO'].'</td>';
			 
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>