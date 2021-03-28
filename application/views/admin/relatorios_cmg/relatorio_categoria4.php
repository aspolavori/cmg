    <?php
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
                        
            $options_categorias = array('' => "select");
            foreach($categorias as $row){
            	$options_categorias[$row['id']] = $row['titulo'];
            }
            
         ?>
    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Relatórios Custo Médio Gerencial
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
             <?php echo (isset($options_categorias[$id_categoria])) ? $options_categorias[$id_categoria] : 'Modalidade';?>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
        
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th colspan="4"class="header">Solução na Pista</th>
			  </tr>
	        </thead>
	            <tbody>
	            <tr>
	            	<th class="yellow header headerSortDown">DESCRIÇÃO DA SOLUÇÃO</th>
					<th class="yellow header headerSortDown">INCIDÊNCIA/UNIDADE</th>
					<th class="yellow header headerSortDown">CUSTO (R$)</th>
			   </tr>
	              <?php
	              
	              $first = true;
	              foreach($solucoes as $row)
	              {
	              	if($first){
	              		$tmpTipo = $row['tipo'];
	              		echo '<tr>';
	              			echo '<td colspan="5">'.$row['tipo'].'</td>';
	              		echo '</tr>';
	              		$first = false;
	              	}else if( $tmpTipo <> $row['tipo']){
	              		$tmpTipo = $row['tipo'];
	              		echo '<tr>';
	              			echo '<td colspan="5">'.$row['tipo'].'</td>';
	              		echo '</tr>';
	              	}
		            echo '<tr>';
		                echo '<td>'.$row['titulo'].'</td>';
						echo '<td>'.$row['desc_solucao'].'</td>';
						if($row['espessura1'] > 0){
							echo '<td>'.round(($row['result']['valor_total_km1']),2).'</td>';
						}else{
							echo '<td>'.round(($row['result']['valor_total_km1'])/((7.2)*1000),2).'</td>';	
						}
	                echo "</tr>";
	              }
	              ?>      
           	</tbody>
          </table>
      </div>        
     </div>