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
          <?php
          		$superTotal = 0;
				foreach($contagem2 as $row){
				
				?>	
				 
				  <table class="table table-striped table-bordered table-condensed">
		            <thead>
		              <tr>
		            	<th class="header">Origem/Destino</th>
		            	<?php echo '<td>'.$row['origem'].' - '.$row['destino'].'</td>'; ?>
		            	<?php echo '<td>'.$row['label_origem'].' -> '.$row['label_destino'].'</td>'; ?>
					  </tr>
		            </thead>
		          </table>
				 <?php
				 	$totalPeriodoSum = 0;
				 	foreach( $row['data'] as $row2){ 
				  ?>
				 	<table class="table table-striped table-bordered table-condensed">
		            <thead>
		              <tr>
		            	<th class="header"><?php echo $row2['data'] ?></th>
					  </tr>
		            </thead>
		            <tbody>
		            <?php 
		            	$first = true;
		            	$totalDataSum = 0;
		            	foreach($row2['contagem'] as $row3) { 
							if($first){
								$firstLine 	= '<td>Hora</td>';
							}else{
								$firstLine 	= '';
							}
							$sndLine 	=  '<td>'.$row3['hora'].'</td>';
							$sumLine	= 0;
							foreach($row3[0] as $row4){
								$focusRow = ( $row4['quantidade'] ? $row4['quantidade'] : 0 );
								$sumLine += $focusRow;
								$sndLine 	.= '<td>'.$focusRow.'</td>';
								if($first){
									$firstLine 	.= '<td>'.$row4['classeVeiculo'].'</td>';
								}
							}
							if($first){
								echo '<tr>'.$firstLine.'<td>Total</td></tr>';
							}
							echo '<tr>'.$sndLine.'<td>'.$sumLine.'</td></tr>';
							$first = false;
							$totalDataSum += $sumLine; 
						}
						echo '<tr><td>Total: '.$totalDataSum.'</td></tr>';
						$totalPeriodoSum += $totalDataSum;
						
					?>
		           </tbody>
		          </table>
				 <?php 
					}
				?>
					<table class="table table-striped table-bordered table-condensed">
					<thead>
					<tr>
						<th class="header">Total do Período:<?php echo $totalPeriodoSum?></th>
					 </tr>
		            </thead>
		          </table>
				<?php 	
					$superTotal += $totalPeriodoSum;
          		}
          ?>
          	<table class="table table-striped table-bordered table-condensed">
			<thead>
			<tr>
				<th class="header">Super Total:<?php echo $superTotal ?></th>
			 </tr>
            </thead>
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
