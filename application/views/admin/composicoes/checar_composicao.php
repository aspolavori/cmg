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
				<th class="header">SICRO</th>
    		 </tr>
            </thead>
	            <tbody>
	            <tr>
		            <th class="header">SICRO</th>
					<th class="yellow header headerSortDown">Região</th>
					<th class="yellow header headerSortDown">UF</th>
					<th class="yellow header headerSortDown">Indice de Pavimentação</th>
					<th class="yellow header headerSortDown">BDI</th>
					<th class="yellow header headerSortDown">BDI Betuminosos</th>
					<th class="yellow header headerSortDown">ICMS Asfáltico</th>
					<th class="yellow header headerSortDown">Data Base</th>
				</tr>	
	              <?php
	              foreach($sicro_data as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['regiao'].'</td>';
					echo '<td>'.$row['br'].'</td>';
					echo '<td>'.$row['indice_pavimentacao'].'</td>';
					echo '<td>'.$row['bdi'].'</td>';
					echo '<td>'.$row['bdi_betuminosos'].'</td>';
					echo '<td>'.$row['icms_asfaltico'].'</td>';
					echo '<td>'.$row['data_base'].'</td>';
                	echo "</tr>";
                	echo '<tr>';
                	echo '<td  colspan="8" >'.$row['observacao'].'</td>';
                	echo "</tr>";
              	  }
              	  
              ?>      
            </tbody>
          </table>

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Composição</th>
    		 </tr>
            </thead>
	            <tbody>
	            <tr>
		            <th class="yellow header headerSortDown">Código</th>
		            <th class="yellow header headerSortDown">Composição</th>
					<th class="yellow header headerSortDown">Tipo</th>
					<th class="yellow header headerSortDown">Categoria</th>
					<th class="yellow header headerSortDown">Produção da Equipe</th>
					<th class="yellow header headerSortDown">Unidade</th>
					<th class="yellow header headerSortDown">Adc.M.O.</th>
					<th class="yellow header headerSortDown">Data Base</th>
				</tr>
	              <?php
	              //print_r($composicao_data);
	              foreach($composicao_data as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['codigo'].'</td>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['tipo'].'</td>';
					echo '<td>'.$row['categoria'].'</td>';
					echo '<td>'.$row['producao_equipe'].'</td>';
					echo '<td>'.$row['producao_equipe_unidade'].'</td>';
					echo '<td>'.$row['adc_mo'].'</td>';
					echo '<td>'.$row['data_base'].'</td>';
                	echo "</tr>";
                	echo '<tr>';
                	echo '<td  colspan="8" >'.$row['observacao'].'</td>';
                	echo "</tr>";
              	  }
              	  
              ?>      
            </tbody>
          </table>
          
           
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="yellow header headerSortDown">Equipamento</th>
    		 </tr>
            </thead>
	            <tbody>
	             <tr>
					<th class="header">Código</th>
					<th class="yellow header headerSortDown">Equipamento</th>
					<th class="yellow header headerSortDown">Quantidade</th>
					<th class="yellow header headerSortDown">Utilização Improdutivo</th>
					<th class="yellow header headerSortDown">Utilização Operativo</th>
					<th class="yellow header headerSortDown">Improdutivo</th>
					<th class="yellow header headerSortDown">Operativo</th>
					<th class="yellow header headerSortDown">Custo Unitário</th>
	    		 </tr>
	              <?php
	              foreach($equipamentos_data['arrayResult'] as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['codigo'].'</td>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['quantidade'].'</td>';
					echo '<td>'.$row['utilizacao_improdutivo'].'</td>';
					echo '<td>'.$row['utilizacao_operativo'].'</td>';
					echo '<td>'.round($row['improdutivo'],2).'</td>';
					echo '<td>'.round($row['operativo'],2).'</td>';
					echo '<td>'.round($row['custo_unitario'],2).'</td>';
                	echo "</tr>";
              	  }
              	  echo '<tr>';
              	  	echo '<td  colspan="7" >Custo Horário de Equipamentos</td>';
              	  	echo '<td  colspan="1" >'.$equipamentos_data['result'].'</td>';
              	  echo "</tr>";
              ?>      
            </tbody>
          </table>
           
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Mão de Obra</th>
    		 </tr>
            </thead>
	            <tbody>
	              <tr>
					<th class="header">Código</th>
					<th class="yellow header headerSortDown">Mão de Obra</th>
					<th class="yellow header headerSortDown">Quantidade</th>
					<th class="yellow header headerSortDown">Custo Hoário</th>
					<th class="yellow header headerSortDown">Custo Unitário</th>
	    		 </tr>
	              <?php
	              foreach($mao_obra_data['arrayResult'] as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['codigo'].'</td>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['quantidade'].'</td>';
					echo '<td>'.round($row['custo_horario'],2).'</td>';
					echo '<td>'.round($row['custo_unitario'],2).'</td>';
                	echo "</tr>";
              	  }
              	  echo '<tr>';
              	  	echo '<td  colspan="4" >Custo Horário de Equipamentos</td>';
              	  	echo '<td  colspan="1" >'.$mao_obra_data['result'].'</td>';
              	  echo "</tr>";
              ?>      
            </tbody>
          </table>
          
           <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Parcial</th>
    		 </tr>
            </thead>
	            <tbody>
	              <?php
	                echo '<tr>';
		                echo '<td colspan="5">Adc.M.O. - Ferramentas: ('.$composicao_data[0]['adc_mo'].')</td>';		               
		                echo '<td colspan="1">'.round( $composicao_data[0]['adc_mo'] * $mao_obra_data['result'],2).'</td>';
                	echo "</tr>";
                	echo '<tr>';
                		echo '<td colspan="5">Custo Horário de Execução</td>';
                		echo '<td colspan="1" >'.round($custo_horario_execucao,2).'</td>';
                	echo "</tr>";
              	  echo '<tr>';
              	  	echo '<td  colspan="5" >Custo Unitário de Execução</td>';
              	  	echo '<td  colspan="1" >'.round($custo_unitario_execucao,2).'</td>';
              	  echo "</tr>";
              ?>      
            </tbody>
          </table>
          
           <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Material</th>
			  </tr>
            </thead>
	            <tbody>
	             <tr>
					<th class="header">Código</th>
					<th class="yellow header headerSortDown">Material</th>
					<th class="yellow header headerSortDown">Quantidade</th>
					<th class="yellow header headerSortDown">Custo Hoário</th>
					<th class="yellow header headerSortDown">Custo Unitário</th>
	    		 </tr>
	              <?php
	              foreach($materiais_data['arrayResult'] as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['codigo'].'</td>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['quantidade'].'</td>';
					echo '<td>'.round($row['preco_unitario'],2).'</td>';
					echo '<td>'.round($row['custo_unitario'],2).'</td>';
                	echo "</tr>";
              	  }
              	  echo '<tr>';
              	  	echo '<td  colspan="4" >Custo Total de Materiais</td>';
              	  	echo '<td  colspan="1" >'.$materiais_data['result'].'</td>';
              	  echo "</tr>";
              ?>      
            </tbody>
          </table>
          
           <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Atividades Auxiliares</th>
    		 </tr>
            </thead>
	            <tbody>
	             <tr>
					<th class="header">Código</th>
					<th class="yellow header headerSortDown">Material</th>
					<th class="yellow header headerSortDown">Quantidade</th>
					<th class="yellow header headerSortDown">Unidade</th>
					<th class="yellow header headerSortDown">Preço Unitário</th>
					<th class="yellow header headerSortDown">Custo Unitário</th>
	    		 </tr>
	              <?php
	              
	              foreach($atividades_auxiliares_data['arrayResult'] as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['codigo'].'</td>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['quantidade'].'</td>';
	                echo '<td>'.$row['unidade'].'</td>';
					echo '<td>'.round($row['preco_unitario'],2).'</td>';
					echo '<td>'.round($row['custo_unitario'],2).'</td>';
                	echo "</tr>";
              	  }
              	  echo '<tr>';
              	  	echo '<td  colspan="5" >Custo Total Atividades Auxiliares</td>';
              	  	echo '<td  colspan="1" >'.$atividades_auxiliares_data['result'].'</td>';
              	  echo "</tr>";
              ?>      
            </tbody>
          </table>
          <?php
          	if(isset($transportes_data['arrayResult'])){
 
          ?>
           <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Transporte</th>
    		 </tr>
            </thead>
	            <tbody>
	            <tr>
					<th class="header">Código</th>
					<th class="yellow header headerSortDown">Transporte</th>
					<th class="yellow header headerSortDown">Quantidade</th>
					<th class="yellow header headerSortDown">Preço Unitário</th>
					<th class="yellow header headerSortDown">Custo Unitário</th>
	    		 </tr>
	              <?php
	              foreach($transportes_data['arrayResult'] as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['codigo'].'</td>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['quantidade'].'</td>';
	                echo '<td>'.round($row['preco_unitario'],2).'</td>';
					echo '<td>'.round($row['custo_unitario'],2).'</td>';
                	echo "</tr>";
              	  }
              	  echo '<tr>';
              	  	echo '<td  colspan="4" >Custo Total de Transportes</td>';
              	  	echo '<td  colspan="1" >'.$transportes_data['result'].'</td>';
              	  echo "</tr>";
              ?>      
            </tbody>
          </table>
          <?php
          	} 
          	
          	if(isset($betuminosos_data['arrayResult'])){
          	
          ?>
           <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="header">Material Betuminiso</th>
    		 </tr>
            </thead>
	            <tbody>
	            <tr>
					<th class="header">Código</th>
					<th class="yellow header headerSortDown">Material Betuminiso</th>
					<th class="yellow header headerSortDown">Quantidade</th>
					<th class="yellow header headerSortDown">Preço Unitário</th>
					<th class="yellow header headerSortDown">Custo Unitário</th>
	    		 </tr>
	              <?php
	              foreach($betuminosos_data['arrayResult'] as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['codigo'].'</td>';
	                echo '<td>'.$row['titulo'].'</td>';
	                echo '<td>'.$row['quantidade'].'</td>';
	                echo '<td>'.round($row['preco_unitario'],2).'</td>';
					echo '<td>'.round($row['custo_unitario'],2).'</td>';
                	echo "</tr>";
              	  }
              	  echo '<tr>';
              	  	echo '<td  colspan="4" >Impostos</td>';
              	  	echo '<td  colspan="1" >'.round($impostos_data,2).'</td>';
              	  echo "</tr>";
              	  echo '<tr>';
              	 	echo '<td  colspan="4" >Lucros e despesas</td>';
              	  	echo '<td  colspan="1" >'.round($lucros_despesas_data,2).'</td>';
              	  echo "</tr>";
              	  echo '<tr>';
	              	  echo '<td  colspan="4" >Preço Total Betuminosos</td>';
	              	  echo '<td  colspan="1" >'.round($preco_unitario_total_betuminosos,2).'</td>';
              	  echo "</tr>";
              ?>      
            </tbody>
          </table>
          <?php
          	} 
          ?>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
             <tr>
				<th class="header">Lucros e Despesas Indiretas</th>
				<th class="header"><?php echo round($lucros_despesas_indiretas,2); ?></th>
    		 </tr>
              <tr>
				<th class="header">Valor Unitário Final</th>
				<th class="header"><?php echo round($preco_unitario_total,2); ?></th>
    		 </tr>
            </thead>
	         <tbody>
	           
            </tbody>
          </table>
           
      </div>        
    </div>