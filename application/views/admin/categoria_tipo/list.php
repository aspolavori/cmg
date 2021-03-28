    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst('Modalidade de Intervenção Tipo');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('Modalidade de Intervenção Tipo');?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
            
            $options_categorias = array('' => 'Nenhum');
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
            $options_categoria_tipo = array();    
            foreach ($categoria_tipo as $array) {
              foreach ($array as $key => $value) {
                $options_categoria_tipo[$key] = $key;
              }
              break;
            }

            echo form_open("admin/categoria_tipo", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_categoria_tipo, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">Modalidade de Intervenção</th>
				<th class="yellow header headerSortDown">Tipo</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($categoria_tipo as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>';
						echo (isset($options_categorias[$row['id_categoria']])) ? $options_categorias[$row['id_categoria']] : 'Nenhum';
					echo '</td>';
					echo '<td>';
						echo (isset($options_tipos[$row['id_tipo']])) ? $options_tipos[$row['id_tipo']] : 'Nenhum';
					echo '</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/categoria_tipo/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/categoria_tipo/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>