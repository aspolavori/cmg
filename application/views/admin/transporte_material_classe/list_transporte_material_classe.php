    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin")."/transportes"; ?>">
	            <?php echo ucfirst('transportes');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst('transportes DMTs');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('transportes DMTs');?>
              <?php /*<a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a> */ ?>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
            
            $options_transportes = array();
            foreach ($transportes as $row)
            {
            	$options_transportes[$row["id"]] = $row["titulo"].' - '.$row["regiao"].' - '.$row["uf"];
            }
            	
            $options_composicoes = array("0" => "Fator de Correção");
            foreach ($composicoes as $row)
            {
            	$options_composicoes[$row["id"]] = $row["codigo"].' - '.$row["titulo"];
            }
            
           
            //save the columns names in a array that we will use as filter         
            $options_transporte_material_classe = array();    
            foreach ($transporte_material_classe as $array) {
              foreach ($array as $key => $value) {
                $options_transporte_material_classe[$key] = $key;
              }
              break;
            }

            ?>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Transporte</th>
				<th class="yellow header headerSortDown">Composição</th>
				<th class="yellow header headerSortDown">Material</th>
				<th class="yellow header headerSortDown">Origem</th>
				<th class="yellow header headerSortDown">Destino</th>
				<th class="yellow header headerSortDown">Distância (km)</th>
				<th class="yellow header headerSortDown">Fórmula</th>
				<th class="yellow header headerSortDown">Trans./Veíc./Caminho</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($transporte_material_classe as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>';
						echo (isset($options_transportes[$row['id_transporte']])) ? $options_transportes[$row['id_transporte']] : 'Nenhum';
					echo '</td>';
					echo '<td>';
						echo (isset($options_composicoes[$row['id_composicao']])) ? $options_composicoes[$row['id_composicao']] : 'Fator de Correção';
    				echo '</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['origem'].'</td>';
					echo '<td>'.$row['destino'].'</td>';
					echo '<td>'.$row['distancia'].'</td>';
					echo '<td>'.$row['formula'].'</td>';
					echo '<td>'.$row['trans_veic_caminho'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">';
              echo '<a href="'.site_url("admin").'/transporte_material_classe/update/'.$row['id'].'/'.$id_transporte.'" class="btn btn-info">Ver & editar</a>';  
              //echo '<a href="'.site_url("admin").'/transporte_material_classe/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>';
              echo '</td>';
              echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>