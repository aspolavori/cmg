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
            	<th class="header">SOLUÇÃO NA PISTA</th>
				<th colspan="2" class="yellow header headerSortDown">REVESTIMENTO NA PISTA</th>
				<th colspan="2"class="yellow header headerSortDown">SOLUÇÃO NO ACOSTAMENTO</th>
				<th colspan="2"class="yellow header headerSortDown">PISTA LARGURA 7,20m + 3,60m + ACOSTAM.LARG. 5,00m</th>
			  </tr>
	        </thead>
	            <tbody>
	            <tr>
	            	<th class="yellow header headerSortDown">DESCRIÇÃO DA SOLUÇÃO</th>
					<th class="yellow header headerSortDown">NOVA FAIXA ESPESSURA (Cm)</th>
					<th class="yellow header headerSortDown">RECAPEAMENTO PISTA EXISTENTE</th>
					<th class="yellow header headerSortDown">DESCRIÇÃO SOLUÇÃO</th>
					<th class="yellow header headerSortDown">ESPESSURA</th>
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
						echo '<td>'.$row['nova_faixa_espessura'].'</td>';
						echo '<td>'.$row['desc_solucao'].'</td>';
						echo '<td>'.$row['pista_existente'].'</td>';
						echo '<td>'.$row['espessura2'].'</td>';
						echo '<td>'.number_format(round($row['result']['somatorio_3_itens'],2), 2, ',', '.').'</td>';
						echo '<td>'.number_format(round(($row['result']['somatorio_3_itens'])/((7.2+7.2+2+5)*1000),2), 2, ',', '.').'</td>';
	                echo "</tr>";
	              }
	              ?>      
           	</tbody>
          </table>

           <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th rowspan="2" class="header">ESTRUTURAS DE PAVIMENTOS ACIMA</th>
				<th colspan="3" class="yellow header headerSortDown">ITENS</th>
			  </tr>
	        </thead>
	            <tbody>
	              <tr>
	                <th class="header"></th>
	            	<th class="yellow header headerSortDown">1.1 a 1.4</th>
					<th class="yellow header headerSortDown">1.5 a 1.6</th>
					<th  class="yellow header headerSortDown">1.7</th>
					<th class="yellow header headerSortDown">2.1 a 2.2</th>
					<th  class="yellow header headerSortDown">3.1</th>
				  </tr>
	            <tr>
	            	<th >REGULARIZAÇÃO DO SUB LEITO - CBR in situ 5%</th>
					<th ></th>
					<th ></th>
					<th ></th>
			   </tr>
			   <tr>
	            	<th >REFORÇO DO SUB LEITO EM SOLO ESTABILIZADO SEM MISTURA - CBR projeto 8%</th>
					<th >20cm</th>
					<th >20cm</th>
					<th >20cm</th>
					<th >20cm</th>
					<th >20cm</th>
			   </tr>
			   <tr>
	            	<th >SUB BASE EM SOLO ESTABILIZADO SEM MISTURA CBR >= 20%</th>
					<th >20cm</th>
					<th >16cm(BGTC)</th>
					<th >18cm(BGTC)</th>
					<th >20cm</th>
					<th >20cm</th>
			   </tr>
			   <tr>
	            	<th >BASE DE BRITA GRADUADA  (BGS)   CBR >= 80%</th>
					<th >15cm</th>
					<th >13cm</th>
					<th >15cm</th>
					<th >15cm</th>
					<th >20cm(40%Briota+60%Laterita)</th
			   </tr>
			   <tr>
	            	<th >IMPRIMAÇÃO</th>
					<th ></th>
					<th ></th>
					<th ></th>
					<th ></th>
					<th ></th>
			   </tr>
			   <tr>
	            	<th >PINTURA DE LIGAÇÃO</th>
					<th ></th>
					<th ></th>
					<th ></th>
					<th ></th>
					<th ></th>
			   </tr>
			   <tr>
	            	<th >REVESTIMENTO EM TSD ou CBUQ fx "C"+TSD ou CBUQ fx"C" ou CBUQ fx"B"+CBUQ fx"C"</th>
					<th >Variável</th>
					<th >Variável</th>
					<th >Variável</th>
					<th >Variável</th>
					<th >Variável</th>
			   </tr>
           	</tbody>
          </table>
      </div>        
     </div>