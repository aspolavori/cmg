    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/relatorios_cmg/catalogos'; ?>">
	            <?php echo ucfirst('Catálogos');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Catálogos E Soluções Técnicas
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Catálogos E Soluções Técnicas
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Catálogos</th>
				<th class="yellow header headerSortDown">Modalidade de Intervenção</th>
				<th class="yellow header headerSortDown">Observação</th>
			  </tr>
	            </thead>
	            <tbody>
	              <tr>
	            	<td>CATÁLOGO DE CONSERVA ROTINEIRA P/ RODOVIAS EM TRECHO RURAL - DNIT</td>
					<td>Padrão HDM-4</td>
					<td></td>
					<td class="crud-actions">
              	  		<?php echo '<a href="'.site_url("admin").'/relatorios_cmg/get_catalogo_hdm/'.$id_sicro.'" class="btn btn-info" style="width: 120px" >Escolher Relatório</a>'; ?> 
                	</td>
				  </tr>
				  <tr>
	            	<td>CATÁLOGO DE SOLUÇÕES TÉCNICAS - DNIT</td>
					<td>Concreto Asfáltico</td>
					<td>Rodovias c/ revestimento em Concreto Asfáltico (Soluções de reforço calculados pela PRO-11/79 10 anos)</td>
					<td class="crud-actions">
              	  		<?php echo '<a href="'.site_url("admin").'/relatorios_cmg/get_catalogo_concreto_asflatico/'.$id_sicro.'" class="btn btn-info" style="width: 120px" >Escolher Relatório</a>'; ?> 
                	</td>
				  </tr>
				  <tr>
	            	<td>CATÁLOGO DE SOLUÇÕES TÉCNICAS - DNIT</td>
					<td>Tratamento Superficial</td>
					<td>Rodovias com revestimento em Tratamento Superficial (Soluções de reforço calculados pela PRO-11/79 10 anos)</td>
					<td class="crud-actions">
              	  		<?php echo '<a href="'.site_url("admin").'/relatorios_cmg/get_catalogo_tratamento_superficial/'.$id_sicro.'" class="btn btn-info" style="width: 120px" >Escolher Relatório</a>'; ?> 
                	</td>
				  </tr>
				  <tr>
	            	<td>CÁLCULO DO CUSTO MÉDIO DE PASSARELA METÁLICA (SEÇÃO TRANSVERSAL: 2,2x2,5m)</td>
					<td>1 - CÁLCULO DOS COMPRIMENTOS APROXIMADOS</td>
					<td></td>
					<td class="crud-actions">
              	  		<?php echo '<a href="'.site_url("admin").'/relatorios_cmg/get_passarela'.'" class="btn btn-info" style="width: 120px" >Escolher Relatório</a>'; ?> 
                	</td>
				  </tr>
           	</tbody>
          </table>
      </div>        
     </div>