    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin")."/hdm_veiculos"; ?>">
	            <?php echo ucfirst('HDM Veículos');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst('Fator de Conversão');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('Fator de Conversão');?>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Veículo</th>
				<th class="yellow header headerSortDown">EUC_LABOUR</th>
				<th class="yellow header headerSortDown">EUC_CREW</th>
				<th class="yellow header headerSortDown">EUC_TYRE</th>
				<th class="yellow header headerSortDown">EUC_OIL</th>
				<th class="yellow header headerSortDown">EUC_OHEAD</th>
				<th class="yellow header headerSortDown">EUC_VEH</th>
				<th class="yellow header headerSortDown">EUC_GAS</th>
				<th class="yellow header headerSortDown">EUC_OLEO</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              
	              $option_veiculos = array();
	              foreach($veiculos as $item){
	              	$option_veiculos[$item['id']] = $item['VEH_NAME'];
	              }
	              
	              foreach($fator_conversao as $row)
	              {
	                echo '<tr>';
					echo '<td>'.$option_veiculos[$row['id_veiculo']].'</td>';
					echo '<td>'.$row['FEUC_LABOUR'].'</td>';
					echo '<td>'.$row['FEUC_CREW'].'</td>';
					echo '<td>'.$row['FEUC_TYRE'].'</td>';
					echo '<td>'.$row['FEUC_OIL'].'</td>';
					echo '<td>'.$row['FEUC_OHEAD'].'</td>';
					echo '<td>'.$row['FEUC_VEH'].'</td>';
					echo '<td>'.$row['FEUC_GAS'].'</td>';
					echo '<td>'.$row['FEUC_OLEO'].'</td>';
				/*	
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/fator_conversao/update/'.$row['id'].'/'.$id_hdm_veiculo.'" class="btn btn-info">Ver & editar</a>
                </td>';
                */
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>