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
              Modalidades de Intervenção
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Modalidade de Intervenção</th>
				<th class="yellow header headerSortDown">Observação</th>
			  </tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($categorias as $row)
	              {
		                echo '<tr>';
		                echo '<td>'.$row['id'].'</td>';
						echo '<td>'.$row['titulo'].'</td>';
						echo '<td>'.$row['observacao'].'</td>';
						
		          	echo '<td class="crud-actions">
		                  <a href="'.site_url("admin").'/relatorios_cmg/gerar_relatorio_categoria/padrao/'.$id_sicro.'/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Solução Padrão</a>
	      				  <a href="'.site_url("admin").'/relatorios_cmg/gerar_relatorio_categoria/plano/'.$id_sicro.'/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Terreno Plano</a>
        				  <a href="'.site_url("admin").'/relatorios_cmg/gerar_relatorio_categoria/ondulado/'.$id_sicro.'/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Terreno Ondulado</a>
	      				  <a href="'.site_url("admin").'/relatorios_cmg/gerar_relatorio_categoria/montanhoso/'.$id_sicro.'/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Terreno Montanhoso</a>
								
		                </td>';
	                echo "</tr>";
	              }
	              ?>      
           	</tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        
     </div>