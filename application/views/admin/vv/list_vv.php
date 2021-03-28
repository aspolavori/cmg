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
	          <?php echo ucfirst('Valores de Veículos');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('Valores de Veículos Data Base: '.$hdm_veiculos[0]['data_base']);?>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Veículo</th>
				<th class="yellow header headerSortDown">FUC_VEH</th>
				<th class="yellow header headerSortDown">EUC_VEH</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              
	              $option_veiculos = array();
	              foreach($veiculos as $item){
	              	$option_veiculos[$item['id']] = $item['VEH_NAME'];
	              }
	              
	              foreach($vv as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$option_veiculos[$row['id_veiculo']].'</td>';
					echo '<td>'.$row['FUC_VEH'].'</td>';
					echo '<td>'.$row['EUC_VEH'].'</td>';
					
	          		echo '<td class="crud-actions">';
              		echo '<a href="'.site_url("admin").'/vv/update/'.$row['id'].'/'.$id_hdm_veiculo.'" class="btn btn-info" style="width:126px;">Ver & editar</a>';  
                  	//<a href="'.site_url("admin").'/vv/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
               		echo '</td>';
               	    echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        
     </div>