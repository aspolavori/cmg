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
            	<th class="header">Solução na Pista</th>
				<th colspan="3" class="yellow header headerSortDown">Solução no Acostamento</th>
				<th colspan="2"class="yellow header headerSortDown">PISTA LARGURA 7,20m ACOSTAM.LARG. 5,00m</th>
				<th colspan="2"class="yellow header headerSortDown">PISTA LARGURA 7,20m ACOSTAM.LARG. 2,00m</th>
			  </tr>
	        </thead>
	            <tbody>
	            <tr>
	            	<th class="yellow header headerSortDown">DESCRIÇÃO DA SOLUÇÃO</th>
					<th class="yellow header headerSortDown">ESPESSURA (Cm)</th>
					<th class="yellow header headerSortDown">DESCRIÇÃO DA SOLUÇÃO</th>
					<th class="yellow header headerSortDown">ESPESSURA (Cm)</th>
					<th class="yellow header headerSortDown">RS$/km</th>
					<th class="yellow header headerSortDown">R$/m2</th>
					<th class="yellow header headerSortDown">R$/km</th>
					<th class="yellow header headerSortDown">R$/m2</th>
			   </tr>
	              <?php
	              
	              $first = true;
	              foreach($solucoes as $row)
	              {
	              	if($first){
	              		$tmpTipo = $row['tipo'];
	              		echo '<tr>';
	              			echo '<td colspan="8"><b>'.$row['tipo'].'</b></td>';
	              		echo '</tr>';
	              		$first = false;
	              	}else if( $tmpTipo <> $row['tipo']){
	              		$tmpTipo = $row['tipo'];
	              		echo '<tr>';
	              			echo '<td colspan="8"><b>'.$row['tipo'].'</b></td>';
	              		echo '</tr>';
	              	}
		            echo '<tr>';
		                echo '<td>'.$row['titulo'].'</td>';
						echo '<td>'.$row['espessura1'].'</td>';
						echo '<td>'.$row['desc_solucao'].'</td>';
						echo '<td>'.$row['espessura2'].'</td>';
						echo '<td>'.number_format(round($row['result']['valor_total_km1'],2), 2, ',', '.').'</td>';
						echo '<td>'.number_format(round(($row['result']['valor_total_km1'])/((7.2+5)*1000),2), 2, ',', '.').'</td>';
						
						if($row['result']['valor_total_km1'] == $row['result']['valor_total_km2']){
							echo '<td> --- </td>';
							echo '<td> --- </td>';
						}else{
							echo '<td>'.number_format(round($row['result']['valor_total_km2'],2), 2, ',', '.').'</td>';
							echo '<td>'.number_format(round(($row['result']['valor_total_km2'])/((7.2+2)*1000),2), 2, ',', '.').'</td>';	
						}
						
	                echo "</tr>";
	              }
	              ?>      
           	</tbody>
          </table>
      </div>        
     </div>