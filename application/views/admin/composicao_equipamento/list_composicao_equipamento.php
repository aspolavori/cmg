    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/composicoes'; ?>">
	          	Composições
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Equipamentos
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo 'Composição Equipamentos';?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/add/'.$id_composicao; ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Equipamento</th>
				<th class="yellow header headerSortDown">Quantidade</th>
				<th class="yellow header headerSortDown">Operativo</th>
				<th class="yellow header headerSortDown">Improdutivo</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($composicao_equipamento as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['codigo'].'-'.$row['titulo'].'</td>';
					echo '<td>'.$row['quantidade'].'</td>';
					echo '<td>'.$row['utilizacao_operativo'].'</td>';
					echo '<td>'.$row['utilizacao_improdutivo'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/composicao_equipamento/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/composicao_equipamento/delete/'.$row['id'].'/'.$id_composicao.'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        
     </div>