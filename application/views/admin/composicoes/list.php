    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst("Composições");?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst("Composições");?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_composicoes = array();    
            foreach ($composicoes as $array) {
              foreach ($array as $key => $value) {
                $options_composicoes[$key] = $key;
              }
              break;
            }

            echo form_open("admin/composicoes", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_composicoes, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Código</th>
				<th class="yellow header headerSortDown">Composição</th>
				<th class="yellow header headerSortDown">Data Base</th>
				<th class="yellow header headerSortDown">Tipo</th>
				<th class="yellow header headerSortDown">Categoria</th>
				<th class="yellow header headerSortDown">Produção da Equipe</th>
				<th class="yellow header headerSortDown">Prod. Eq. Unidade</th>
				<th class="yellow header headerSortDown">Adc.M.O.</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($composicoes as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['codigo'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['data_base'].'</td>';
					echo '<td>'.$row['tipo'].'</td>';
					echo '<td>'.$row['categoria'].'</td>';
					echo '<td>'.$row['producao_equipe'].'</td>';
					echo '<td>'.$row['producao_equipe_unidade'].'</td>';
					echo '<td>'.$row['adc_mo'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
			
	          echo '<td class="crud-actions">
              	  <a href="'.site_url("admin").'/composicao_equipamento/lista_equipamento/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Equipamentos</a>
              	  <a href="'.site_url("admin").'/composicao_material/lista_material/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Materiais</a>
            	  <a href="'.site_url("admin").'/composicao_material_betuminoso/lista_material_betuminoso/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Betuminosos</a>
          		  <a href="'.site_url("admin").'/composicao_mao_obra/lista_mao_obra/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Mão de Obra</a>
            	  <a href="'.site_url("admin").'/composicao_composicao/lista_composicao/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Atividades Auxiliares</a>
              	  <a href="'.site_url("admin").'/composicao_composicao_transporte/lista_composicao_transporte/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Transportes</a>	
                  <a href="'.site_url("admin").'/composicoes/update/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Ver & editar</a>
                  <a href="'.site_url("admin").'/composicoes/delete/'.$row['id'].'" class="btn btn-danger" style="width: 120px" >deletar</a>
              	  <a href="'.site_url("admin").'/composicoes/composicao_checar/1/'.$row['id'].'" class="btn btn-info" style="width: 120px" >CHECAR</a>	
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>