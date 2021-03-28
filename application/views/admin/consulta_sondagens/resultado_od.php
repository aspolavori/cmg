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
	  <div class="row">
	    <div class="span12 columns">
          
         <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Contagem</th>
			  </tr>
            </thead>
	            <tbody>
	            <tr>
	            	<td>Classe de Contagem</td>
	            	<td><?php echo $pesquisa_trafego['classeVeiculo']; ?></td>
	            	<td>Uf/BR</td>
	            	<td><?php echo $pesquisa_trafego['uf'].' / '.$pesquisa_trafego['rodovia']; ?></td>
	            	<td>Km</td>
	            	<td><?php echo $pesquisa_trafego['km']; ?></td>
	            </tr>
	            <tr>
	            	<td>Trecho</td>
	            	<td><?php echo $pesquisa_trafego['trecho']; ?></td>
	            	<td>Localidade</td>
	            	<td><?php echo $pesquisa_trafego['origem'].' / '.$pesquisa_trafego['destino']; ?></td>
	            	<td>Período</td>
	            	<td><?php echo $pesquisa_trafego['data_ini'].' - '.$pesquisa_trafego['data_fim'] ; ?></td>
	            </tr>
	          </tbody>
          </table> 
         <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="yellow header headerSortDown">Sentido</th>
				<th class="yellow header headerSortDown">Veículo</th>
				<th class="yellow header headerSortDown">Placa</th>
				<th class="yellow header headerSortDown">Data</th>
				<th class="yellow header headerSortDown">Hora</th>
				<th class="yellow header headerSortDown">Origem País</th>
				<th class="yellow header headerSortDown">Origem UF</th>
				<th class="yellow header headerSortDown">Origem Municipio</th>
				<th class="yellow header headerSortDown">GeoCod Origem</th>
				<th class="yellow header headerSortDown">Destino País</th>
				<th class="yellow header headerSortDown">Destino UF</th>
				<th class="yellow header headerSortDown">Destino Municipio</th>
				<th class="yellow header headerSortDown">GeoCod Destino</th>
				<th class="yellow header headerSortDown">Combustível</th>
				<th class="yellow header headerSortDown">Categoria</th>
				<th class="yellow header headerSortDown">Numero de Pessoas</th>
				<th class="yellow header headerSortDown">Renda Média</th>
				<th class="yellow header headerSortDown">Motivo</th>
				<th class="yellow header headerSortDown">Frequencia</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($origens_destinos as $row)
	              {
	                echo '<tr>';
					echo '<td>'.$row['label_origem'].$row['label_destino'].'</td>';
					echo '<td>'.$row['classeVeiculo'].'</td>';
					echo '<td>'.$row['placa'].'</td>';
					echo '<td>'.$row['data'].'</td>';
					echo '<td>'.$row['hora'].'</td>';
					echo '<td>'.$row['origem_pais'].'</td>';
					echo '<td>'.$row['origem_uf'].'</td>';
					echo '<td>'.$row['origem_municipio'].'</td>';
					echo '<td>'.$row['origem_geocod'].'</td>';
					echo '<td>'.$row['destino_pais'].'</td>';
					echo '<td>'.$row['destino_uf'].'</td>';
					echo '<td>'.$row['destino_municipio'].'</td>';
					echo '<td>'.$row['destino_geocod'].'</td>';
					echo '<td>'.$row['combustivel'].'</td>';
					echo '<td>'.$row['categoria'].'</td>';
					echo '<td>'.$row['num_pessoas'].'</td>';
					echo '<td>'.$row['renda_media'].'</td>';
					echo '<td>'.$row['motivo'].'</td>';
					echo '<td>'.$row['frequencia'].'</td>';
	          
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>
      </div>
	  
	  <?php
	  /* 
        <div class="span12 columns">
          
         <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Contagem</th>
			  </tr>
            </thead>
	            <tbody>
	            <tr>
	            	<td>Classe de Contagem</td>
	            	<td><?php echo $pesquisa_trafego['classeVeiculo']; ?></td>
	            	<td>Uf/BR</td>
	            	<td><?php echo $pesquisa_trafego['uf'].' / '.$pesquisa_trafego['rodovia']; ?></td>
	            	<td>Km</td>
	            	<td><?php echo $pesquisa_trafego['km']; ?></td>
	            </tr>
	            <tr>
	            	<td>Trecho</td>
	            	<td><?php echo $pesquisa_trafego['trecho']; ?></td>
	            	<td>Localidade</td>
	            	<td><?php echo $pesquisa_trafego['origem'].' / '.$pesquisa_trafego['destino']; ?></td>
	            	<td>Período</td>
	            	<td><?php echo $pesquisa_trafego['data_ini'].' - '.$pesquisa_trafego['data_fim'] ; ?></td>
	            </tr>
	          </tbody>
          </table> 
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Origem/Destino</th>
            	<th class="header">Data</th>
            	<th class="header">Hora</th>
            	<th class="header">Veículo</th>
            	<th class="header">quantidade</th>
			  </tr>
            </thead>
	            <tbody>
	             <?php
	              foreach($contagem as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['origem'].' - '.$row['destino'].'</td>';
					echo '<td>'.$row['data'].'</td>';
					echo '<td>'.$row['hora'].'</td>';
					echo '<td>'.$row['veiculo_classe'].'</td>';
					echo '<td>'.$row['quantidade'].'</td>';				
                	echo "</tr>";
              	  }
                ?>  
	          </tbody>
          </table>
      </div>
      */
      ?>        
 </div>
