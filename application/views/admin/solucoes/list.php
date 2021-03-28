    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst("Soluções");?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst("Soluções");?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            $options_categorias = array();
            foreach ($categorias as $row)
            {
            	$options_categorias[$row["id"]] = $row["titulo"];
            }
            
            $options_tipos = array();
            foreach ($tipos as $row)
            {
            	$options_tipos[$row["id"]] = $row["titulo"];
            }
            
            //save the columns names in a array that we will use as filter         
            $options_solucoes = array();    
            foreach ($solucoes as $array) {
              foreach ($array as $key => $value) {
                $options_solucoes[$key] = $key;
              }
              break;
            }

            echo form_open("admin/solucoes", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_solucoes, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Solução</th>
				<th class="yellow header headerSortDown">Modalidade de Intervenção</th>
				<th class="yellow header headerSortDown">Tipo</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    	</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($solucoes as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>';
						echo (isset($options_categorias[$row['id_categoria']])) ? $options_categorias[$row['id_categoria']] : 'Nenhum';
					echo '</td>';
					echo '<td>';
						echo (isset($options_tipos[$row['id_tipo']])) ? $options_tipos[$row['id_tipo']] : 'Nenhum';
					echo '</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
	          	  <a href="'.site_url("admin").'/solucao_composicao/lista_composicao/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Composições</a>	
                  <a href="'.site_url("admin").'/solucoes/update/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Ver & editar</a>  
                  <a href="'.site_url("admin").'/solucoes/delete/'.$row['id'].'" class="btn btn-danger" style="width: 120px" >deletar</a>
          		  <a href="'.site_url("admin").'/solucoes/solucao_checar/padrao/'.$row['id'].'/1" class="btn btn-info" style="width: 120px" >CHECAR PADRAO</a>
            	  <a href="'.site_url("admin").'/solucoes/solucao_checar/plano/'.$row['id'].'/1" class="btn btn-info" style="width: 120px" >PLANO</a>
            	  <a href="'.site_url("admin").'/solucoes/solucao_checar/ondulado/'.$row['id'].'/1" class="btn btn-info" style="width: 120px" >ONDULADO</a>		
            	  <a href="'.site_url("admin").'/solucoes/solucao_checar/montanhoso/'.$row['id'].'/1" class="btn btn-info" style="width: 120px" >MONTANHOSO</a>			
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>