    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Relatório de Acidentes por Tipo de Obra
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Relatório de Acidentes por Tipo de  Obra
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
        <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Relatório da Obra por Tipo</th>
              	</tr>
	         </thead> 
            <tbody>	
	            <tr>
					<th rowspan="2" class="yellow header headerSortDown">Tipo de Obra</th>
					<th rowspan="2" class="yellow header headerSortDown">Número de Obras</th>
					<th colspan="3" class="yellow header headerSortDown">Variação Média</th>	
				</tr>
				<tr>
					<th class="yellow header headerSortDown">Ilesos</th>
					<th class="yellow header headerSortDown">Feridos</th>
					<th class="yellow header headerSortDown">Mortos</th>
				</tr>
              	<tr>
              		<th class="yellow header headerSortDown">
              			<?php
              				foreach($tipos_selecionados as $tiposSelecionados){
              					echo $tiposSelecionados['descricao'].', ';
              				} 
              			?>
              		</th>
              		<th class="yellow header headerSortDown"><?php echo $variacao_total['quantidade']?></th>
					<th class="yellow header headerSortDown"><?php echo round($variacao_total['ilesos'] , 3)?></th>
					<th class="yellow header headerSortDown"><?php echo round($variacao_total['feridos'], 3)?></th>
					<th class="yellow header headerSortDown"><?php echo round($variacao_total['mortos'] , 3)?></th> 	 	
              	</tr>
	         </tbody>
	       </table>
<?php // starts here

$ind  = 1;
$ind2 = 0;    
foreach($viewDataRelatorio as $viewrel) {
	
	$obra		= $$viewrel['obra'];
	$tiposByObra = $$viewrel['listTipo'];
	$relatorio1 = $$viewrel['rel1'];
	$relatorio2 = $$viewrel['rel2'];
	$relatorio3 = $$viewrel['rel3'];
	$relatorio4 = $$viewrel['rel4'];
			
?>	
          <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Relatório da Obra <?php echo $ind; ?></th>
              	</tr>
	         </thead> 
            <tbody>	
	            <tr>
					<th class="yellow header headerSortDown">Tipo</th>
					<?php echo '<th> '.ucfirst($obra['classe']).' </th>'; ?>  
					<th class="yellow header headerSortDown">Subtipo</th>
					<?php 
						echo '<th colspan="3"> ';
						  foreach($tiposByObra as $tiposObra){
						  	echo $tiposObra['descricao'].', ';
						  }	
    					  echo  ' </th>'; 
					?> 
					
				</tr>
              	<tr>
              		<th class="yellow header headerSortDown">Dados do Trecho</th>
              		<th class="yellow header headerSortDown">UF</th>
					<?php echo '<th> '.$obra['uf'].' </th>'; ?> 
					<th class="yellow header headerSortDown">Rodovia</th>
					<?php echo '<th colspan="2"> '.$obra['br'].' </th>'; ?> 	
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Km Inicial</th>
					<?php echo '<th> '.$obra['km_ini'].' </th>'; ?>
					<th class="yellow header headerSortDown">Km Final</th>
					<?php echo '<th> '.$obra['km_fim'].' </th>'; ?>
					<th class="yellow header headerSortDown">Ext. (km)</th>
              		<?php echo '<th> '.( $obra['km_fim'] - $obra['km_ini']).' </th>'; ?>   
				</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Inicio da Obra</th>
					<th class="yellow header headerSortDown">VMD (s/ Projeto)</th>
					<th class="yellow header headerSortDown">Fim da Obra</th>					
					<th class="yellow header headerSortDown">VMD (c/ Projeto)</th>
					<th class="yellow header headerSortDown">Ano de Referência - VMD</th>
					<th class="yellow header headerSortDown">Taxa de Crescimento</th>
				</tr>
              	<tr>
              		<?php echo '<th> '.$obra['data_ini'].' </th>'; ?>
              		<?php echo '<th> '.$obra['vdm_s'].' </th>'; ?>                		
              		<?php echo '<th> '.$obra['data_fim'].' </th>'; ?>
              		<?php echo '<th> '.$obra['vdm_c'].' </th>'; ?>              		
              		<?php echo '<th> '.$obra['ano_ref_vdm'].' </th>'; ?>              		
              		<?php echo '<th> '.$obra['taxa_crescimento'].' </th>'; ?>  
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Custo</th>
					<?php echo '<th colspan="5"> '.$obra['custo'].' </th>'; ?>
				</tr>
	         </tbody>
	       </table> 
            
	      <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Relatório de Acidentes <?php echo $ind; ?></th>
              	</tr>
            </thead>
            <tbody>
            	<tr>
	             <?php
	             	echo '<tr>';
	             		echo '<th></th>';
             			for($i=0; $i < sizeof($relatorio1['ano']); $i++ ){
             				echo '<th>'.$relatorio1['ano'][$i].'</th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Numero de Acidentes - Com Danos Materiais </th>';
             			for($i=0; $i < sizeof($relatorio1['ilesos']); $i++ ){
             				echo '<th> '.$relatorio1['ilesos'][$i].' </th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Numero de Acidentes - Com Feridos </th>';
             			for($i=0; $i < sizeof($relatorio1['feridos']); $i++ ){
             				echo '<th> '.$relatorio1['feridos'][$i].' </th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Numero de Acidentes - Com Mortos </th>';
             			for($i=0; $i < sizeof($relatorio1['mortos']); $i++ ){
             				echo '<th> '.$relatorio1['mortos'][$i].' </th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Numero de Acidentes - Total </th>';
             			for($i=0; $i < sizeof($relatorio1['total']); $i++ ){
             				echo '<th> '.$relatorio1['total'][$i].' </th>';
             			}
             		echo '</tr>';
	             	?>
	             	
		     </tbody>
	       </table>
	       <?php        
	       		echo $this->gcharts->ColumnChart('Relatório de Acidentes Obra '.$ind)->outputInto('relatorio1_div_'.$ind); 
	       		echo $this->gcharts->div(); 
	       		if($this->gcharts->hasErrors()) { 
					echo $this->gcharts->getErrors(); 
				}
	       ?>
	       <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th colspan="10" class="header">Relatório de Indide de Acidentes <?php echo $ind; ?></th>
              	</tr>
            </thead>
            <tbody>
            	<tr>
	             <?php
	             	echo '<tr>';
	             		echo '<th>Gravidade</th>';
             			for($i=0; $i < sizeof($relatorio2['ano']); $i++ ){
             				echo '<th>'.$relatorio2['ano'][$i].'</th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Ilesos </th>';
             			for($i=0; $i < sizeof($relatorio2['ilesos']); $i++ ){
             				echo '<th> '.round($relatorio2['ilesos'][$i], 3).' </th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Feridos </th>';
             			for($i=0; $i < sizeof($relatorio2['feridos']); $i++ ){
             				echo '<th> '.round($relatorio2['feridos'][$i], 3).' </th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Mortos </th>';
             			for($i=0; $i < sizeof($relatorio2['mortos']); $i++ ){
             				echo '<th> '.round($relatorio2['mortos'][$i], 3).' </th>';
             			}
             		echo '</tr>';
             		echo '<tr>';
             			echo '<th>Total </th>';
             			for($i=0; $i < sizeof($relatorio2['total']); $i++ ){
             				echo '<th> '.round($relatorio2['total'][$i], 3).' </th>';
             			}
             		echo '</tr>';
	             	?>
	             	
		     </tbody>
	       </table>  
	        
	        <?php     
	       		echo $this->gcharts->ColumnChart('Relatório de indide de Acidentes Obra '.$ind)->outputInto('relatorio2_div_'.$ind); 
	       		echo $this->gcharts->div(); 
	       		if($this->gcharts->hasErrors()) { 
					echo $this->gcharts->getErrors(); 
				}
	       ?> 
	        
	       <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Cálculo de Variação <?php echo $ind; ?></th>
              	</tr>
          		<tr>
          			<th class="yellow header headerSortDown"></th>
					<th class="yellow header headerSortDown">Antes</th>
					<th class="yellow header headerSortDown">Depois</th>
					<th class="yellow header headerSortDown">Variação</th>
				</tr>
	         </thead> 
            <tbody>	
              		<?php 
              			$co = 0;
              			foreach($relatorio3 as $item){
              				echo '<tr>';
              				if($co == 0){
              					echo '<th>Ilesos</th>';	
              				}
              				elseif($co == 1){
              					echo '<th>Feridos</th>';
              				}
              				else{
              					echo '<th>Mortos</th>';
              				}
              				echo '<th> '.round($item['antes'],3).' </th>';
              				echo '<th> '.round($item['depois'],3).' </th>';
              				echo '<th> '.round($item['reducao'],2).'% </th>';
              				echo '</tr>';
              				$co++;
              			}              			
              		?>
	         </tbody>
	       </table>   
	  
	       
	       <?php
	       		$tempVar = 'list_acidente_relatorio_desc_obra_'.$ind2;
	       		
       			foreach($$tempVar as $relTitle){
       					$item = $$relTitle;
       					$posicao = strpos($relTitle, '_rel4');

					?>
					<table class="table table-striped table-bordered table-condensed">
		          	<thead>
		          		<tr>
		              	    <th class="header"><?php echo ucfirst( str_replace( '_', ' ', substr($relTitle, 0, $posicao))).' Obra '.$ind;  ?></th>
		              	</tr>
			         </thead> 
		            <tbody>
					<tr>
		             <?php
		             	echo '<tr>';
		             		echo '<th></th>';
	             			for($i=0; $i < sizeof($item['ano']); $i++ ){
	             				echo '<th>'.$item['ano'][$i].'</th>';
	             			}
	             		echo '</tr>';
	             		echo '<tr>';
	             			echo '<th>Numero de Acidentes - Com Danos Materiais </th>';
	             			for($i=0; $i < sizeof($item['ilesos']); $i++ ){
	             				echo '<th> '.$item['ilesos'][$i].' </th>';
	             			}
	             		echo '</tr>';
	             		echo '<tr>';
	             			echo '<th>Numero de Acidentes - Com Feridos </th>';
	             			for($i=0; $i < sizeof($item['feridos']); $i++ ){
	             				echo '<th> '.$item['feridos'][$i].' </th>';
	             			}
	             		echo '</tr>';
	             		echo '<tr>';
	             			echo '<th>Numero de Acidentes - Com Mortos </th>';
	             			for($i=0; $i < sizeof($item['mortos']); $i++ ){
	             				echo '<th> '.$item['mortos'][$i].' </th>';
	             			}
	             		echo '</tr>';
	             		echo '<tr>';
	             			echo '<th>Numero de Acidentes - Total </th>';
	             			for($i=0; $i < sizeof($item['total']); $i++ ){
	             				echo '<th> '.$item['total'][$i].' </th>';
	             			}
	             		echo '</tr>';
		             	?>
		       		</tbody>
		       		</table>
					       			 
					      <?php	
	
       			}
       			$tempVar = 'list_indice_acidente_relatorio_desc_obra_'.$ind2;
       			
       			foreach($$tempVar as $relTitle){
       				$item = $$relTitle;
       				$posicao = strpos($relTitle, '_rel4');
       			
       				?>
					<table class="table table-striped table-bordered table-condensed">
       				<thead>
						<tr>
       						<th class="header"><?php echo ucfirst( str_replace( '_', ' ', substr($relTitle, 0, $posicao))).' Obra '.$ind.' (Indice)'; ?></th>
       				  </tr>
       				</thead> 
       				<tbody>
       				<tr>
       			<?php
       				echo '<tr>';
       				echo '<th>Gravidade</th>';
       				for($i=0; $i < sizeof($item['ano']); $i++ ){
       					echo '<th>'.round($item['ano'][$i], 3).'</th>';
					}
       				echo '</tr>';
       				echo '<tr>';
       				echo '<th>Com Danos Materiais </th>';
					for($i=0; $i < sizeof($item['ilesos']); $i++ ){
       					echo '<th> '.round($item['ilesos'][$i], 3).' </th>';
       				}
       				echo '</tr>';
       				echo '<tr>';
       				echo '<th>Com Feridos </th>';
       				for($i=0; $i < sizeof($item['feridos']); $i++ ){
       					echo '<th> '.round($item['feridos'][$i], 3).' </th>';
       				}
       				echo '</tr>';
       				echo '<tr>';
       				echo '<th>Com Mortos </th>';
       				for($i=0; $i < sizeof($item['mortos']); $i++ ){
       					echo '<th> '.round($item['mortos'][$i], 3).' </th>';
       				}
       				echo '</tr>';
       				echo '<tr>';
       				echo '<th>Total </th>';
      				for($i=0; $i < sizeof($item['total']); $i++ ){
       					echo '<th> '.round($item['total'][$i], 3).' </th>';
       				}
       				echo '</tr>';
       				?>
					</tbody>
       				</table>
       								       			 
       				<?php	
       				
       			}

       			$tempVar = 'lista_media_indice_acidentes_descricao_obra_'.$ind2;
       			foreach($$tempVar as $relTitle){
       				$item = $$relTitle;
       				$posicao = strpos($relTitle, '_rel4');
				?>
				
       			<table class="table table-striped table-bordered table-condensed">
       			<thead>
	       			<tr>
	       				<th class="header"><?php echo ucfirst( str_replace( '_', ' ', substr($relTitle, 0, $posicao))).' Obra '.$ind.' (Média)'; ?></th>
	       			</tr>
	       			<tr>
		       			<th class="yellow header headerSortDown"></th>
		       			<th class="yellow header headerSortDown">Antes</th>
		       			<th class="yellow header headerSortDown">Depois</th>
		       			<th class="yellow header headerSortDown">Variação</th>
	       			</tr>
	       			</thead> 
       			    <tbody>	
       			    <?php 
       			    	$co = 0;
       			        foreach($item as $item2){
       			        	echo '<tr>';
       			            	if($co == 0){
       			              		echo '<th>Ilesos</th>';	
       			              	}
       			              	elseif($co == 1){
       			              		echo '<th>Feridos</th>';
      			              	}
       			              	else{
       			              		echo '<th>Mortos</th>';
       			              	}
       			              	echo '<th> '.round($item2['antes'],3).' </th>';
       			              	echo '<th> '.round($item2['depois'],3).' </th>';
       			              	echo '<th> '.round($item2['reducao'],2).'% </th>';
       			              	echo '</tr>';
       			              	$co++;
       			        } 
 					}	      			                     			
       			     ?>
       				 </tbody>
       				 </table>  
<?php 	       
	      
  $ind++;
  $ind2++;
       
}// ends here	     
	      
	      ?>
	      
      </div>        
     </div>