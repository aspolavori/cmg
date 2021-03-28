    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Relatório de Acidentes por Obra
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Relatório de Acidentes por Obra
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_obras = array();    
            foreach ($obras as $array) {
              foreach ($array as $key => $value) {
                $options_obras[$key] = $key;
              }
              break;
            }

            echo form_open("admin/obras", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_obras, $order, 'class="span2"');

              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Ir");

              $options_order_type = array("Asc" => "Asc", "Desc" => "Desc");
              echo form_dropdown("order_type", $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <th class="header">#</th>
              <!-- 
				<th class="yellow header headerSortDown">Classe </th>
				<th class="yellow header headerSortDown">Tipo</th>
				 -->
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">BR</th>
				<th class="yellow header headerSortDown">Data Inicial</th>
				<th class="yellow header headerSortDown">Data Final</th>
				<th class="yellow header headerSortDown">Km Inicial</th>
				<th class="yellow header headerSortDown">Km Final</th>
				<th class="yellow header headerSortDown">Vmd S/ Projeto</th>
				<th class="yellow header headerSortDown">Vmd C/ Projeto</th>
				<th class="yellow header headerSortDown">Ano de Referencia</th>
				<th class="yellow header headerSortDown">Taxa Crescimento</th>				
	    	 </tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($obras as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					//echo '<td>'.$row['id_classe_obras'].'</td>';
					//echo '<td>'.$row['id_tipo_obras'].'</td>';
					echo '<td>'.$row['uf'].'</td>';
					echo '<td>'.$row['br'].'</td>';
					echo '<td>'.$row['data_ini'].'</td>';
					echo '<td>'.$row['data_fim'].'</td>';
					echo '<td>'.$row['km_ini'].'</td>';
					echo '<td>'.$row['km_fim'].'</td>';
					echo '<td>'.$row['vdm_s'].'</td>';
					echo '<td>'.$row['vdm_c'].'</td>';
					echo '<td>'.$row['ano_ref_vdm'].'</td>';
					echo '<td>'.$row['taxa_crescimento'].'</td>';
					
	          echo '<td class="crud-actions">
                  		<a href="'.site_url("admin").'/obras/acidentes/'.$row['id'].'" class="btn btn-info">Consulta Acidentes</a>
                	</td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>