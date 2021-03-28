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
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
        
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Solução</th>
    		 </tr>
            </thead>
	            <tbody>
				
	              <?php
	              foreach($solucao as $composicao_data){
		             	echo '<tr>';
							echo '<td colspan="16">'.$composicao_data['codigo'].'-'.$composicao_data['titulo'].'</td>';
						echo "</tr>";
						echo '<tr>';
							echo '<td>Pista</td>';
							echo '<td>'.$composicao_data['solucao']['tamanho_pista'].'</td>';
							echo '<td>Vol. Pista</td>';
							echo '<td>'.$composicao_data['solucao']['volume_total'].'</td>';
							echo '<td>Custo da Pista</td>';
							echo '<td>'.$composicao_data['solucao']['pista'].'</td>';
							echo '<td>Comprimento</td>';
							echo '<td>'.$composicao_data['solucao']['comprimento_pista'].'</td>';							
		              	echo '</tr>';
		              	echo '<tr>';
			              	echo '<td>Acostamento1</td>';
			              	echo '<td>'.$composicao_data['solucao']['tamanho_acostamento1'].'</td>';
		              		echo '<td>Vol. Acost.1</td>';
		              		echo '<td>'.$composicao_data['solucao']['volume_aco1'].'</td>';
		              		echo '<td>Custo de Acostamento 1</td>';
		              		echo '<td>'.$composicao_data['solucao']['acostamento1'].'</td>';
		              		echo '<td>Valor Unitário</td>';
		              		echo '<td>'.$composicao_data['solucao']['valor_unitario'].'</td>';
	              		echo '</tr>';
	              		echo '<tr>';
		              		echo '<td>Acostamento2</td>';
		              		echo '<td>'.$composicao_data['solucao']['tamanho_acostamento2'].'</td>';
		              		echo '<td>Vol. Acost.2</td>';
		              		echo '<td>'.$composicao_data['solucao']['volume_aco2'].'</td>';
		              		echo '<td>Custo de Acostamento 2</td>';
		              		echo '<td>'.$composicao_data['solucao']['acostamento2'].'</td>';
		              		
		              		echo '<td>Peso Esp./Reparos</td>';
		              		echo '<td>'.$composicao_data['solucao']['fator'].'</td>';
		              	echo "</tr>";	              
	              }
	              
              ?>      
            </tbody>
          </table>
           
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Resultado Final</th>
    		 </tr>
            </thead>
	            <tbody>
				<?php 
             	  echo '<tr>';
		              echo '<td>Valor Total Pavimento Pista</td>';
		              echo '<td>'.$result['valor_total_pavimento_pista'].'</td>';
		              echo '<td>Valor Final Pista c/ demais itens </td>';
		              echo '<td>'.$result['valor_final_pista'].'</td>';
		              echo '<td><td/><td></td>';
		              
	              echo "</tr>";
	              
	              echo '<tr>';
		              echo '<td>Valor Total Pavimento Acostamento 1</td>';
		              echo '<td>'.$result['valor_total_pavimento_acos1'].'</td>';
		              echo '<td>Valor Final Acostamento 1 c/ demais itens</td>';
		              echo '<td>'.$result['valor_final_acos1'].'</td>';
		              echo '<td>Valor Total por km 1</td>';
		              echo '<td>'.round($result['valor_total_km1'],2).'</td>';
	              echo "</tr>";
	              
	              echo '<tr>';
	              	  echo '<td>Valor Total Pavimento Acostamento 2</td>';
		              echo '<td>'.$result['Valor_potal_pavimento_acos2'].'</td>';
		              echo '<td>Valor Final Acostamento 2 c/ demais itens</td>';
		              echo '<td>'.$result['valor_final_acos2'].'</td>';
		              echo '<td>Valor Total por km 2</td>';
		              echo '<td>'.round($result['valor_total_km2'],2).'</td>';
	              echo "</tr>";
	              
	              echo '<tr>';
		              echo '<td>Valor Somatorio 3 itens</td>';
		              echo '<td>'.round(($result['somatorio_3_itens']), 2).'</td>';
	              echo "</tr>";
	              
              ?>      
            </tbody>
          </table>
                    
      </div>        
    </div>