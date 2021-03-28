    <?php
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
                        
            
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
            	 CATÁLOGO DE CONSERVA ROTINEIRA P/ RODOVIAS EM TRECHO RURAL - DNIT
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
        
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Rodovia Pavimentada - Pista Simples: Pista com 7,20m (2 fx 3,60) e acostamento com 5,00m (2 lados 2,50);</th>
			  </tr>
	        </thead>
	            <tbody>
	            <tr>
	            	<th rowspan="4" colspan="3" class="yellow header headerSortDown">CONSERVA ROTINEIRA (Custo = R$/km)</th>
					<th rowspan="4" colspan="1"class="yellow header headerSortDown">OBS</th>
			   </tr>
			   <tr>
			   		<th colspan="2" class="yellow header headerSortDown">IRI < 3</th>
					<th colspan="2" class="yellow header headerSortDown"> 3 < IRI <=4 </th>
					<th colspan="2" class="yellow header headerSortDown">4 < IRI</th>
			   </tr>
			   <tr>
			   		<th colspan="2" class="yellow header headerSortDown">PISTA COND. BOA</th>
					<th colspan="2" class="yellow header headerSortDown">PISTA COND. REGULAR</th>
					<th colspan="2" class="yellow header headerSortDown">PISTA COND. RUIM</th>
			   </tr>
			   <tr>
			   		<th class="yellow header headerSortDown">C. Financeiro</th>
			   		<th class="yellow header headerSortDown">C. Econômico</th>
					<th class="yellow header headerSortDown">C. Financeiro</th>
					<th class="yellow header headerSortDown">C. Econômico</th>
					<th class="yellow header headerSortDown">C. Financeiro</th>
					<th class="yellow header headerSortDown">C. Econômico</th>
			   </tr>
			   <tr>
			   	<td rowspan="6" >RODOVIA <br> EM <br> PISTA <br> SIMPLES</td>
			   </tr>
	           <tr>
			   		<td >Drainage</td>
			   		<td >Drenagem</td>
			   		<td >(5)</td>			   		
			   		<td ><?php echo $result['drenagem'][0]; ?></td>
			   		<td ><?php echo $result['drenagemE'][0];  ?></td>
			   		<td ><?php echo $result['drenagem'][1];  ?></td>
			   		<td ><?php echo $result['drenagemE'][1];  ?></td>
			   		<td ><?php echo $result['drenagem'][2];  ?></td>
			   		<td ><?php echo $result['drenagemE'][2];  ?></td>
			   </tr>
			   <tr>
			   		<td >Miscellaneous</td>
			   		<td >Diversos</td>
			   		<td >(18)</td>
			   		<td ><?php echo $result['diversos'][0]; ?></td>
			   		<td ><?php echo $result['diversosE'][0];  ?></td>
			   		<td ><?php echo $result['diversos'][1];  ?></td>
			   		<td ><?php echo $result['diversosE'][1];  ?></td>
			   		<td ><?php echo $result['diversos'][2];  ?></td>
			   		<td ><?php echo $result['diversosE'][2];  ?></td>
			   </tr>
			   <tr>
			   		<td >Shoulder repair</td>
			   		<td >Reparos acostamento</td>
			   		<td >(19)</td>
			   		<td ><?php echo $result['reparos'][0]; ?></td>
			   		<td ><?php echo $result['reparosE'][0];  ?></td>
			   		<td ><?php echo $result['reparos'][1];  ?></td>
			   		<td ><?php echo $result['reparosE'][1];  ?></td>
			   		<td ><?php echo $result['reparos'][2];  ?></td>
			   		<td ><?php echo $result['reparosE'][2];  ?></td>
			   </tr>
			   <tr>
			   		<td >Emergency</td>
			   		<td >Serviços Emergênciais</td>
			   		<td >(20)</td>
			   		<td ><?php echo $result['servicos'][0]; ?></td>
			   		<td ><?php echo $result['servicosE'][0];  ?></td>
			   		<td ><?php echo $result['servicos'][1];  ?></td>
			   		<td ><?php echo $result['servicosE'][1];  ?></td>
			   		<td ><?php echo $result['servicos'][2];  ?></td>
			   		<td ><?php echo $result['servicosE'][2];  ?></td>
			   </tr>
			   <tr>
			   		<td colspan="3" >Total =></td>
			   		<td ><?php echo $result['totalPavF'][0]; ?></td>
			   		<td ><?php echo $result['totalPavE'][0];  ?></td>
			   		<td ><?php echo $result['totalPavF'][1];  ?></td>
			   		<td ><?php echo $result['totalPavE'][1];  ?></td>
			   		<td ><?php echo $result['totalPavF'][2];  ?></td>
			   		<td ><?php echo $result['totalPavE'][2];  ?></td>
			   </tr>    
           	</tbody>
          </table>
          
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Rodovia Pavimentada - Pista Dupla: 2 Pistas c/ 7,20m (2 fx 3,60), acost. externos c/ 5,00m (2 lados est. 2,50), acost. internos c/ 2,00m (2 int. 1,00)</th>
			  </tr>
	        </thead>
	            <tbody>
	            <tr>
	            	<th rowspan="4" colspan="3" class="yellow header headerSortDown">CONSERVA ROTINEIRA (Custo = R$/km)</th>
					<th rowspan="4" colspan="1"class="yellow header headerSortDown">OBS</th>
			   </tr>
			   <tr>
			   		<th colspan="2" class="yellow header headerSortDown">IRI < 3</th>
					<th colspan="2" class="yellow header headerSortDown"> 3 < IRI <=4 </th>
					<th colspan="2" class="yellow header headerSortDown">4 < IRI</th>
			   </tr>
			   <tr>
			   		<th colspan="2" class="yellow header headerSortDown">PISTA COND. BOA</th>
					<th colspan="2" class="yellow header headerSortDown">PISTA COND. REGULAR</th>
					<th colspan="2" class="yellow header headerSortDown">PISTA COND. RUIM</th>
			   </tr>
			   <tr>
			   		<th class="yellow header headerSortDown">C. Financeiro</th>
			   		<th class="yellow header headerSortDown">C. Econômico</th>
					<th class="yellow header headerSortDown">C. Financeiro</th>
					<th class="yellow header headerSortDown">C. Econômico</th>
					<th class="yellow header headerSortDown">C. Financeiro</th>
					<th class="yellow header headerSortDown">C. Econômico</th>
			   </tr>
			   <tr>
			   	<td rowspan="6" >RODOVIA <br> EM <br> PISTA <br> DUPLA</td>
			   </tr>
	           <tr>
			   		<td >Drainage</td>
			   		<td >Drenagem</td>
			   		<td >(5)  2*p.simples</td>			   		
			   		<td ><?php echo $result['drenagem'][0] * 2; ?></td>
			   		<td ><?php echo $result['drenagemE'][0] * 2;  ?></td>
			   		<td ><?php echo $result['drenagem'][1] * 2;  ?></td>
			   		<td ><?php echo $result['drenagemE'][1] * 2;  ?></td>
			   		<td ><?php echo $result['drenagem'][2] * 2;  ?></td>
			   		<td ><?php echo $result['drenagemE'][2] * 2;  ?></td>
			   </tr>
			   <tr>
			   		<td >Miscellaneous</td>
			   		<td >Diversos</td>
			   		<td >(18) 1.5*p.simples</td>
			   		<td ><?php echo $result['diversos'][0] * 1.5; ?></td>
			   		<td ><?php echo $result['diversosE'][0] * 1.5;  ?></td>
			   		<td ><?php echo $result['diversos'][1] * 1.5;  ?></td>
			   		<td ><?php echo $result['diversosE'][1] * 1.5;  ?></td>
			   		<td ><?php echo $result['diversos'][2] * 1.5;  ?></td>
			   		<td ><?php echo $result['diversosE'][2] * 1.5;  ?></td>
			   </tr>
			   <tr>
			   		<td >Shoulder repair</td>
			   		<td >Reparos acostamento</td>
			   		<td >(19) 2*p.simples</td>
			   		<td ><?php echo $result['reparos'][0] * 2; ?></td>
			   		<td ><?php echo $result['reparosE'][0] * 2;  ?></td>
			   		<td ><?php echo $result['reparos'][1] * 2;  ?></td>
			   		<td ><?php echo $result['reparosE'][1] * 2;  ?></td>
			   		<td ><?php echo $result['reparos'][2] * 2;  ?></td>
			   		<td ><?php echo $result['reparosE'][2] * 2;  ?></td>
			   </tr>
			   <tr>
			   		<td >Emergency</td>
			   		<td >Serviços Emergênciais</td>
			   		<td >(20) 2*p.simples</td>
			   		<td ><?php echo $result['servicos'][0] * 2; ?></td>
			   		<td ><?php echo $result['servicosE'][0] * 2;  ?></td>
			   		<td ><?php echo $result['servicos'][1] * 2;  ?></td>
			   		<td ><?php echo $result['servicosE'][1] * 2;  ?></td>
			   		<td ><?php echo $result['servicos'][2] * 2;  ?></td>
			   		<td ><?php echo $result['servicosE'][2] * 2;  ?></td>
			   </tr>
			   <tr>
			   		<td colspan="3" >Total =></td>
			   		<td ><?php echo round(($result['drenagem'][0] * 2)  + ($result['diversos'][0] * 1.5) + ($result['reparos'][0] * 2)   + ($result['servicos'][0] * 2), 2);  ?></td>
			   		<td ><?php echo round(($result['drenagemE'][0] * 2) + ($result['diversosE'][0] * 1.5) + ($result['reparosE'][0] * 2) + ($result['servicosE'][0] * 2), 2);  ?></td>
			   		<td ><?php echo round(($result['drenagem'][1] * 2)  + ($result['diversos'][1] * 1.5) + ($result['reparos'][1] * 2)   + ($result['servicos'][1] * 2), 2);   ?></td>
			   		<td ><?php echo round(($result['drenagemE'][1] * 2) + ($result['diversosE'][1] * 1.5) + ($result['reparosE'][1] * 2) + ($result['servicosE'][1] * 2), 2);   ?></td>
			   		<td ><?php echo round(($result['drenagem'][2] * 2)  + ($result['diversos'][2] * 1.5) + ($result['reparos'][2] * 2)   + ($result['servicos'][2] * 2), 2);   ?></td>
			   		<td ><?php echo round(($result['drenagemE'][2] * 2) + ($result['diversosE'][2] * 1.5) + ($result['reparosE'][2] * 2) + ($result['servicosE'][2] * 2), 2);   ?></td>
			   </tr>    
           	</tbody>
          </table>
          <p>
          OBSERVAÇÕES:<br>									
			1) Nestes custos de CONSERVA ROTINEIRA, para rodovias pavimentadas em pista simples e pista dupla, não estão incluidas nenhuma intervenção nas FAIXAS DE ROLAMENTO (exemplo: selagens de trincas, tapa buraco, reparos de bordo, etc), uma vez que, nas análises do HDM estas intervenções são consideradas em separado, em função do grau de deterioração da pista;<br>									
			2) Apesar dos seviços de Conserva em Travessiva Urbana apresentarem diferenciações nos tipos de serviços, para efeito dos estudos de Viabilidade serão adotados os mesmos valores de Conserva de Rodovia Rural.<br>									
          
          </p>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Rodovia Não Pavimentada: Estrada c/ largura aproximada de 7,00m</th>
			  </tr>
	        </thead>
	            <tbody>
	            <tr>
	            	<th rowspan="3" colspan="3" class="yellow header headerSortDown">CONSERVA ROTINEIRA (Custo = R$/km)</th>
					<th rowspan="3" colspan="1"class="yellow header headerSortDown">OBS</th>
			   </tr>
			   <tr>
			   		<th colspan="2" class="yellow header headerSortDown">POUCO MOVIMENTO DE VEICULOS</th>
					<th colspan="2" class="yellow header headerSortDown">GRANDE MOVIMENTO DE VEICULOS</th>
			   </tr>
			   <tr>
			   		<th class="yellow header headerSortDown">C. Financeiro</th>
			   		<th class="yellow header headerSortDown">C. Econômico</th>
					<th class="yellow header headerSortDown">C. Financeiro</th>
					<th class="yellow header headerSortDown">C. Econômico</th>
			   </tr>
			   <tr>
			   	<td rowspan="6" >RODOVIA <br> EM <br> PISTA <br> DUPLA</td>
			   </tr>
	           <tr>
			   		<td >Spot Regravelling</td>
			   		<td >Reposição de material (descontínua), Cascalhamento ptos isolados</td>
			   		<td >(1)</td>			   		
			   		<td ><?php echo $result['descontinua'][0]; ?></td>
			   		<td ><?php echo $result['descontinuaE'][0];  ?></td>
			   		<td ><?php echo $result['descontinua'][1];  ?></td>
			   		<td ><?php echo $result['descontinuaE'][1];  ?></td>
			   </tr>
			   <tr>
			   		<td >Grading</td>
			   		<td >Patrolagem</td>
			   		<td >(2)</td>
			   		<td ><?php echo $result['regularizacao'][0]; ?></td>
			   		<td ><?php echo $result['regularizacaoE'][0];  ?></td>
			   		<td ><?php echo $result['regularizacao'][1];  ?></td>
			   		<td ><?php echo $result['regularizacaoE'][1];  ?></td>
			   </tr>
			   <tr>
			   		<td >Regraveling/ Resurfacing</td>
			   		<td >Reposição de material (continua) - Cascalhamento</td>
			   		<td >(3)</td>
			   		<td ><?php echo $result['continua'][0]; ?></td>
			   		<td ><?php echo $result['continuaE'][0];  ?></td>
			   		<td ><?php echo $result['continua'][1];  ?></td>
			   		<td ><?php echo $result['continuaE'][1];  ?></td>
			   </tr>
			   <tr>
			   		<td >Miscellaneous</td>
			   		<td >Diversos(limpeza faixa de domínio, controle vegetação, cercas, sinalização vertical, etc). Adotado 20% da rodovia Pavimentada</td>
			   		<td >(20) 20%da.pista simples</td>
			   		<td ><?php echo $result['mice'][0]; ?></td>
			   		<td ><?php echo $result['miceE'][0];  ?></td>
			   		<td ><?php echo $result['mice'][1];  ?></td>
			   		<td ><?php echo $result['miceE'][1];  ?></td>
			   </tr>
			   <tr>
			   		<td colspan="3" >Total =></td>
			   		<td ><?php echo $result['totalNPavF'][0]; ?></td>
			   		<td ><?php echo $result['totalNPavE'][0];  ?></td>
			   		<td ><?php echo $result['totalNPavF'][1];  ?></td>
			   		<td ><?php echo $result['totalNPavE'][1];  ?></td>
			   </tr>    
           	</tbody>
          </table>
      </div>        
     </div>