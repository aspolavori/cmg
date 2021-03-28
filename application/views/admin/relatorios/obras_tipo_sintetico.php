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
		
      foreach($lista_reducao_classe_acidente as $itemClasseReducao){;
			$posicao = strpos($itemClasseReducao, '_rel4');
			$tmpArrayClasse = $$itemClasseReducao;
			?>
			<table class="table table-striped table-bordered table-condensed">
          	<thead>
          		<tr>
              	    <th class="header">Relatório Varialção Classe de Acidente<?php echo ucfirst( str_replace( '_', ' ', substr($itemClasseReducao, 0, $posicao)));?></th>
              	</tr>
	         </thead> 
            <tbody>	
	            <tr>
					<th rowspan="3"  colspan="4" class="yellow header headerSortDown">Variação Média</th>	
				</tr>
				<tr>
					<th class="yellow header headerSortDown">Ilesos</th>
					<th class="yellow header headerSortDown">Feridos</th>
					<th class="yellow header headerSortDown">Mortos</th>
				</tr>
              	<tr>
					<th class="yellow header headerSortDown"><?php echo round($tmpArrayClasse['ilesos'] , 3)?></th>
					<th class="yellow header headerSortDown"><?php echo round($tmpArrayClasse['feridos'], 3)?></th>
					<th class="yellow header headerSortDown"><?php echo round($tmpArrayClasse['mortos'] , 3)?></th> 	 	
              	</tr>
	         </tbody>
	       </table>
			
			<?php
      }
          ?>
	      
      </div>        
     </div>