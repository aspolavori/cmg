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
            $options_transportes = array();    
            foreach ($transportes as $array) {
              foreach ($array as $key => $value) {
                $options_transportes[$key] = $key;
              }
              break;
            }

            echo form_open("admin/transportes", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_transportes, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Transporte</th>
				<th class="yellow header headerSortDown">C??digo</th>
				<th class="yellow header headerSortDown">Regi??o</th>
				<th class="yellow header headerSortDown">Uf</th>
				<th class="yellow header headerSortDown">CTC1</th>
				<th class="yellow header headerSortDown">CTC2</th>
				<th class="yellow header headerSortDown">CTF1</th>
				<th class="yellow header headerSortDown">CTF2</th>
				<th class="yellow header headerSortDown">Data Base</th>
				<th class="yellow header headerSortDown">Observa????o</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($transportes as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['codigo'].'</td>';
					echo '<td>'.$row['regiao'].'</td>';
					echo '<td>'.$row['uf'].'</td>';
					echo '<td>'.$row['ctc1'].'</td>';
					echo '<td>'.$row['ctc2'].'</td>';
					echo '<td>'.$row['ctf1'].'</td>';
					echo '<td>'.$row['ctf2'].'</td>';
					echo '<td>'.$row['data_base'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
              	  <a href="'.site_url("admin").'/transporte_material_classe/lista_transporte_material_classe/'.$row['id'].'" class="btn btn-info" style="width:126px;">DMTs</a>	
                  <a href="'.site_url("admin").'/transportes/update/'.$row['id'].'" class="btn btn-info" style="width:126px;">Ver & editar</a>  
                  <a href="'.site_url("admin").'/transportes/delete/'.$row['id'].'" class="btn btn-danger" style="width:126px;" >deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>