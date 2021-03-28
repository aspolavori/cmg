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
            $options_acidentes = array();    
            foreach ($acidentes as $array) {
              foreach ($array as $key => $value) {
                $options_acidentes[$key] = $key;
              }
              break;
            }

            echo form_open("admin/acidentes", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_acidentes, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Ano </th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">Rodovia</th>
				<th class="yellow header headerSortDown">Km</th>
				<th class="yellow header headerSortDown">Sentido</th>
				<th class="yellow header headerSortDown">Data</th>
				<th class="yellow header headerSortDown">Hora do Acidente</th>
				<th class="yellow header headerSortDown">Classificação</th>
				<th class="yellow header headerSortDown">Feridos</th>
				<th class="yellow header headerSortDown">Mortos</th>
				<th class="yellow header headerSortDown">Descrição</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($acidentes as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['ano'].'</td>';
					echo '<td>'.$row['uf'].'</td>';
					echo '<td>'.$row['rodovia'].'</td>';
					echo '<td>'.$row['km'].'</td>';
					echo '<td>'.$row['sentido'].'</td>';
					echo '<td>'.$row['data'].'</td>';
					echo '<td>'.$row['hora'].'</td>';
					echo '<td>'.$row['classificacao'].'</td>';
					echo '<td>'.$row['feridos'].'</td>';
					echo '<td>'.$row['mortos'].'</td>';
					echo '<td>'.$row['descricao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/acidentes/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  
                  <a href="'.site_url("admin").'/acidentes/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>