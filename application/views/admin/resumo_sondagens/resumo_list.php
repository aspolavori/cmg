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
              <?php echo ucfirst($this->uri->segment(2));?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/add/'.$id_sondagem; ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_resumo_sondagens = array();    
            foreach ($resumo_sondagens as $array) {
              foreach ($array as $key => $value) {
                $options_resumo_sondagens[$key] = $key;
              }
              break;
            }
            
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
              	<th colspan="40" >QUADRO DO RESUMO DE RESULTADOS DOS ENSAIOS</th>
              </tr>
              <tr>
              	<th colspan="8" >LOCAL DE SONDAGEM</th>
              	<th colspan="14" >ANÁLISE GRANULOMÉTRICA</th>
              	<th colspan="3" >SEDIMENTAÇÃO</th>
              	<th colspan="3" >IND. FÍSICO</th>
              	<th colspan="2" >CLASSIF.</th>
              	<th colspan="5" >COMPACTAÇÃO</th>
              	<th colspan="2" >IN SITU</th>
              	<th colspan="1" >Equivalente</th>
              	<th colspan="1" >NÍVEL D'ÁGUA</th>
              </tr>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Titulo</th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">Rodovia</th>
				<th class="yellow header headerSortDown">Furo</th>
				<th class="yellow header headerSortDown">Lado</th>
				<th class="yellow header headerSortDown">Latitude</th>
				<th class="yellow header headerSortDown">Logitude</th>
				<th class="yellow header headerSortDown">mm</th>
				<th class="yellow header headerSortDown">50_8</th>
				<th class="yellow header headerSortDown">38_1</th>
				<th class="yellow header headerSortDown">25_4</th>
				<th class="yellow header headerSortDown">19_1</th>
				<th class="yellow header headerSortDown">9_5</th>
				<th class="yellow header headerSortDown">4_8</th>
				<th class="yellow header headerSortDown">2</th>
				<th class="yellow header headerSortDown">1_2</th>
				<th class="yellow header headerSortDown">0_59</th>
				<th class="yellow header headerSortDown">0_42</th>
				<th class="yellow header headerSortDown">0_30</th>
				<th class="yellow header headerSortDown">0_15</th>
				<th class="yellow header headerSortDown">0_074</th>
				<th class="yellow header headerSortDown">% de Silte</th>
				<th class="yellow header headerSortDown">% de Argila</th>
				<th class="yellow header headerSortDown">Tipo de Solo</th>
				<th class="yellow header headerSortDown">LL(%)</th>
				<th class="yellow header headerSortDown">LP(%)</th>
				<th class="yellow header headerSortDown">IP(%)</th>
				<th class="yellow header headerSortDown">IG</th>
				<th class="yellow header headerSortDown">HRB</th>
				<th class="yellow header headerSortDown">Dmáx (g/cm2)</th>
				<th class="yellow header headerSortDown">Wot(%)</th>
				<th class="yellow header headerSortDown">EXP(%)</th>
				<th class="yellow header headerSortDown">Energia (N. golpes)</th>
				<th class="yellow header headerSortDown">ISC(%)</th>
				<th class="yellow header headerSortDown">Densidade Natural(g/cm2)</th>
				<th class="yellow header headerSortDown">Wcampo (%)</th>
				<th class="yellow header headerSortDown">Areia (%)</th>
				<th class="yellow header headerSortDown">(m)</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($resumo_sondagens as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['uf'].'</td>';
					echo '<td>'.$row['rodovia'].'</td>';
					echo '<td>'.$row['furo'].'</td>';
					echo '<td>'.$row['lado'].'</td>';
					echo '<td>'.$row['lat'].'</td>';
					echo '<td>'.$row['long'].'</td>';
					echo '<td>'.$row['mm'].'</td>';
					echo '<td>'.$row['50_8'].'</td>';
					echo '<td>'.$row['38_1'].'</td>';
					echo '<td>'.$row['25_4'].'</td>';
					echo '<td>'.$row['19_1'].'</td>';
					echo '<td>'.$row['9_5'].'</td>';
					echo '<td>'.$row['4_8'].'</td>';
					echo '<td>'.$row['2'].'</td>';
					echo '<td>'.$row['1_2'].'</td>';
					echo '<td>'.$row['0_59'].'</td>';
					echo '<td>'.$row['0_42'].'</td>';
					echo '<td>'.$row['0_30'].'</td>';
					echo '<td>'.$row['0_15'].'</td>';
					echo '<td>'.$row['0_074'].'</td>';
					echo '<td>'.$row['silte'].'</td>';
					echo '<td>'.$row['argila'].'</td>';
					echo '<td>'.$row['solo'].'</td>';
					echo '<td>'.$row['ll'].'</td>';
					echo '<td>'.$row['lp'].'</td>';
					echo '<td>'.$row['ip'].'</td>';
					echo '<td>'.$row['ig'].'</td>';
					echo '<td>'.$row['hrb'].'</td>';
					echo '<td>'.$row['dmax'].'</td>';
					echo '<td>'.$row['wot'].'</td>';
					echo '<td>'.$row['exp'].'</td>';
					echo '<td>'.$row['eng'].'</td>';
					echo '<td>'.$row['isc'].'</td>';
					echo '<td>'.$row['densidade_natural'].'</td>';
					echo '<td>'.$row['wcampo'].'</td>';
					echo '<td>'.$row['areia'].'</td>';
					echo '<td>'.$row['nivel_agua'].'</td>';
					
	          echo '<td class="crud-actions">
              	  <a href="'.site_url("admin").'/resumo_sondagem_files/resumo/'.$row['id'].'" class="btn btn-info" style="width:120px;">Ensaios Adicionais</a>		
                  <a href="'.site_url("admin").'/resumo_sondagens/update/'.$row['id'].'" class="btn btn-info" style="width:120px;">Ver & editar</a>  
                  <a href="'.site_url("admin").'/resumo_sondagens/delete/'.$row['id'].'" class="btn btn-danger" style="width:120px;">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>