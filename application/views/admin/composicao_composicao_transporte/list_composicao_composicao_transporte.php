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
	          Transportes
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo 'Composicao Transportes';?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/add/'.$id_composicao ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Transporte</th>
				<th class="yellow header headerSortDown">Quantidade</th>
				<th class="yellow header headerSortDown">Unidade</th>	
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($composicao_composicao_transporte as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['codigo'].'-'.$row['titulo'].'</td>';
					echo '<td>'.$row['quantidade'].'</td>';
					echo '<td>'.$row['unidade'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/composicao_composicao_transporte/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/composicao_composicao_transporte/delete/'.$row['id'].'/'.$id_composicao.'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        
     </div>