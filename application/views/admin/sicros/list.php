    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst("Células");?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst("Células");?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_sicros = array();    
            foreach ($sicros as $array) {
              foreach ($array as $key => $value) {
                $options_sicros[$key] = $key;
              }
              break;
            }

            echo form_open("admin/sicros", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_sicros, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Célula</th>
				<th class="yellow header headerSortDown">Região</th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">Indice de Pavimentação Base</th>
				<th class="yellow header headerSortDown">Indice de Pavimentação</th>
				<th class="yellow header headerSortDown">BDI</th>
				<th class="yellow header headerSortDown">BDI Betuminosos</th>
				<th class="yellow header headerSortDown">ICMS Asfaltico</th>
				<th class="yellow header headerSortDown">Observação</th>
				<th class="yellow header headerSortDown">Data Base</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($sicros as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['regiao'].'</td>';
					echo '<td>'.$row['br'].'</td>';
					echo '<td>'.$row['indice_pavimentacao_base'].'</td>';
					echo '<td>'.$row['indice_pavimentacao'].'</td>';
					echo '<td>'.$row['bdi'].'</td>';
					echo '<td>'.$row['bdi_betuminosos'].'</td>';
					echo '<td>'.$row['icms_asfaltico'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					echo '<td>'.$row['data_base'].'</td>';
					
	          echo '<td class="crud-actions">
              	  <a href="'.site_url("admin").'/sicro_equipamento_custo/lista_equipamento/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Equipamentos</a>
              	  <a href="'.site_url("admin").'/sicro_material_custo/lista_material/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Materiais</a>
            	  <a href="'.site_url("admin").'/sicro_material_betuminoso_custo/lista_material_betuminoso/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Betuminosos</a>
          		  <a href="'.site_url("admin").'/sicro_mao_obra_custo/lista_mao_obra/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Mão de Obra</a>
                  <a href="'.site_url("admin").'/sicro_transporte/update/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Transporte</a>		    	
              	  <a href="'.site_url("admin").'/sicro_fator_pavimentacao/lista_fator_pavimentacao/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Fator Pavimentação</a>  
                  <a href="'.site_url("admin").'/sicros/update/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Ver & editar</a>  
                  <a href="'.site_url("admin").'/sicros/delete/'.$row['id'].'" class="btn btn-danger" style="width: 120px" >deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>