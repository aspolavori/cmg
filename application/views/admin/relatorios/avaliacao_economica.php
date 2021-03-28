    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Relatório de Acidentes por Tipo de Obra (Avaliação Econômica)
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Relatório de Acidentes por Tipo de  Obra (Avaliação Econômica)
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
       <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Relatório da Obra</th>
              	</tr>
	         </thead> 
            <tbody>	
	            <tr>
					<th class="yellow header headerSortDown">Tipo</th>
					<?php echo '<th> '.ucfirst($obra[0]['classe']).' </th>'; ?>  
					<th class="yellow header headerSortDown">Subtipo</th>
					<?php 
						echo '<th colspan="3"> ';
						if($listTiposObraFutura){
							foreach($listTiposObraFutura as $tipoObra){
								echo $tipoObra['descricao'].', ';
							}	
						}else{
							echo "Não Especificada";	
						}
    					echo ' </th>'; 
    				?> 
				</tr>
              	<tr>
              		<th class="yellow header headerSortDown">Dados do Trecho</th>
              		<th class="yellow header headerSortDown">UF</th>
					<?php echo '<th> '.$obra[0]['uf'].' </th>'; ?> 
					<th class="yellow header headerSortDown">Rodovia</th>
					<?php echo '<th colspan="2"> '.$obra[0]['br'].' </th>'; ?> 	
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Km Inicial</th>
					<?php echo '<th> '.$obra[0]['km_ini'].' </th>'; ?>
					<th class="yellow header headerSortDown">Km Final</th>
					<?php echo '<th> '.$obra[0]['km_fim'].' </th>'; ?>
					<th class="yellow header headerSortDown">Ext. (km)</th>
              		<?php echo '<th> '.( $obra[0]['km_fim'] - $obra[0]['km_ini']).' </th>'; ?>   
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
              		<?php echo '<th> '.$obra[0]['data_ini'].' </th>'; ?>
              		<?php echo '<th> '.$obra[0]['vdm_s'].' </th>'; ?>                		
              		<?php echo '<th> '.$obra[0]['data_fim'].' </th>'; ?>
              		<?php echo '<th> '.$obra[0]['vdm_c'].' </th>'; ?>              		
              		<?php echo '<th> '.$obra[0]['ano_ref_vdm'].' </th>'; ?>              		
              		<?php echo '<th> '.$obra[0]['taxa_crescimento'].' </th>'; ?>  
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Custo</th>
					<?php echo '<th colspan="5"> '.$obra[0]['custo'].' </th>'; ?>
				</tr>
	         </tbody>
	       </table> 
	       <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Custos por Gravidade de Acidente</th>
              	</tr>
	         </thead> 
            <tbody>	
	            <tr>
	            	<th  class="yellow header headerSortDown">Gravidade</th>
					<th  class="yellow header headerSortDown">Apenas danos Materiais</th>
					<th  class="yellow header headerSortDown">Feridos</th>
					<th  class="yellow header headerSortDown">Mortos</th>
					<th  class="yellow header headerSortDown">Geral</th>
					<th  class="yellow header headerSortDown">Data Base</th>	
				</tr>
				<tr>
					<th  class="yellow header headerSortDown">Custo por Acidente em R$</th>
					<th class="yellow header headerSortDown"><?php echo $custo_acidente[0]['ilesos']; ?></th>
					<th class="yellow header headerSortDown"><?php echo $custo_acidente[0]['feridos']; ?></th>
					<th class="yellow header headerSortDown"><?php echo $custo_acidente[0]['mortos']; ?></th>
					<th class="yellow header headerSortDown"><?php echo $custo_acidente[0]['geral']; ?></th>
					<th class="yellow header headerSortDown"><?php echo $custo_acidente[0]['data_base']; ?></th>
				</tr>
              	
	         </tbody>
	       </table>
	       <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Relatório de Acidentes</th>
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
	       		echo $this->gcharts->ColumnChart('Relatório de Acidentes')->outputInto('relatorio1_div'); 
	       		echo $this->gcharts->div(); 
	       		if($this->gcharts->hasErrors()) { 
					echo $this->gcharts->getErrors(); 
				}
	       ?>
	       <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th colspan="10" class="header">Relatório de Indide de Acidentes</th>
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
	       		echo $this->gcharts->ColumnChart('Relatório de indide de Acidentes')->outputInto('relatorio2_div'); 
	       		echo $this->gcharts->div(); 
	       		if($this->gcharts->hasErrors()) { 
					echo $this->gcharts->getErrors(); 
				}
	       ?> 
	       
        <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Relatório da Obra por Tipo (Variação)  </th>
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
	       
	       <table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Avaliação Econôminca  </th>
              	</tr>
	         </thead> 
            <tbody>	
	            <tr>
					<th rowspan="2" class="yellow header headerSortDown">Ano</th>
					<th colspan="4" class="yellow header headerSortDown">Custos (R$ x 10^6) - Sem Projeto</th>
					<th colspan="4" class="yellow header headerSortDown">Custos (R$ x 10^6) - Com Projeto</th>
					<th rowspan="2" class="yellow header headerSortDown">Benefício Líquido</th>	
				</tr>
				<tr>
					<th class="yellow header headerSortDown">Obra</th>
					<th class="yellow header headerSortDown">Ac. Danos Mat.</th>
					<th class="yellow header headerSortDown">Ac. Feridos</th>
					<th class="yellow header headerSortDown">Ac. Mortos</th>
					<th class="yellow header headerSortDown">Obra</th>
					<th class="yellow header headerSortDown">Ac. Danos Mat.</th>
					<th class="yellow header headerSortDown">Ac. Feridos</th>
					<th class="yellow header headerSortDown">Ac. Mortos</th>
				</tr>
				<?php
				foreach($relatorio3 as $item){
				?>	 
	              	<tr>
						<th class="yellow header headerSortDown"><?php echo $item['ano'] ?></th>
						<th class="yellow header headerSortDown"><?php echo $item['obra'] ?></th>
						<th class="yellow header headerSortDown"><?php echo round($item['ac_ilecos'], 3) ?></th>
						<th class="yellow header headerSortDown"><?php echo round($item['ac_feridos'], 3) ?></th>
						<th class="yellow header headerSortDown"><?php echo round($item['ac_mortos'], 3) ?></th>
						<th class="yellow header headerSortDown"><?php echo $item['obra_futura'] ?></th>
						<th class="yellow header headerSortDown"><?php echo round($item['ac_ilecos_f'], 3) ?></th>
						<th class="yellow header headerSortDown"><?php echo round($item['ac_feridos_f'], 3) ?></th>
						<th class="yellow header headerSortDown"><?php echo round($item['ac_mortos_f'], 3) ?></th>
						<th class="yellow header headerSortDown"><?php echo round($item['benef_liqui'], 3) ?></th> 	 	
	              	</tr>
              	<?php 
              	}
              	?>
              		<tr>
						<th colspan="9" class="yellow header headerSortDown" style="text-align:right;">VPL</th>
						<th class="yellow header headerSortDown"><?php echo round($vpl, 3) ?></th> 	 	
	              	</tr>
	         </tbody>
	       </table>
	      
      </div>        
     </div>