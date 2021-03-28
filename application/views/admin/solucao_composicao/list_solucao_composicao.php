    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/solucoes'; ?>">
	          	Soluções
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Composições
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo 'Soluções Composição';?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/add/'.$id_solucao; ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
            	<th class="yellow header headerSortDown">Código</th>
				<th class="yellow header headerSortDown">Composição</th>
	    	</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($solucao_composicao as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id_solucao_composicao'].'</td>';
	                echo '<td>'.$row["codigo"].'</td>';
	                echo '<td>'.$row["titulo"].'</td>';
					
	          	    echo '<td class="crud-actions">
			                  <a href="'.site_url("admin").'/'.$this->uri->segment(2).'/update/'.$row['id_solucao_composicao'].'" class="btn btn-info">Ver & editar</a>  
			                  <a href="'.site_url("admin").'/'.$this->uri->segment(2).'/delete/'.$row['id_solucao_composicao'].'/'.$id_solucao.'" class="btn btn-danger">deletar</a>
			                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        
     </div>