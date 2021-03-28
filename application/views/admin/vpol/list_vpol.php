    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/hdm_veiculos'; ?>">
	            <?php echo ucfirst('HDM Veículos');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst('Valores de Pneu/Oleo/Carga');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('Valores de Pneu/Oleo/Carga Data Base: '.$hdm_veiculos[0]['data_base']);?>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Veículo</th>
				<th class="yellow header headerSortDown">EUC_TYRE</th>
				<th class="yellow header headerSortDown">EUC_OIL</th>
				<th class="yellow header headerSortDown">EUC_CARGO</th>
				<th class="yellow header headerSortDown">EUC_OHEAD</th>
				<th class="yellow header headerSortDown">FUC_TYRE</th>
				<th class="yellow header headerSortDown">FUC_OIL</th>
				<th class="yellow header headerSortDown">FUC_OHEAD</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              $option_veiculos = array();
	              foreach($veiculos as $item){
	              	$option_veiculos[$item['id']] = $item['VEH_NAME'];
	              }
	               
	              foreach($vpol as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$option_veiculos[$row['id_veiculo']].'</td>';
					echo '<td>'.$row['EUC_TYRE'].'</td>';
					echo '<td>'.$row['EUC_OIL'].'</td>';
					echo '<td>'.$row['EUC_CARGO'].'</td>';
					echo '<td>'.$row['EUC_OHEAD'].'</td>';
					echo '<td>'.$row['FUC_TYRE'].'</td>';
					echo '<td>'.$row['FUC_OIL'].'</td>';
					echo '<td>'.$row['FUC_OHEAD'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/vpol/update/'.$row['id'].'/'.$id_hdm_veiculo.'" class="btn btn-info" style="width:126px;">Ver & editar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>