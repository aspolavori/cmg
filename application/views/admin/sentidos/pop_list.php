    <div class="container top">
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst($this->uri->segment(2));?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/pop_add/'.$id_pesquisa_trafegos; ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">         
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
				<th class="yellow header headerSortDown">Origem</th>
				<th class="yellow header headerSortDown">Label Origem</th>
				<th class="yellow header headerSortDown">Destino</th>
				<th class="yellow header headerSortDown">Label Destino</th>
			 </tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($sentidos as $row)
	              {
	                echo '<tr>';	                
					echo '<td>'.$row['origem'].'</td>';
					echo '<td>'.$row['label_origem'].'</td>';
					echo '<td>'.$row['destino'].'</td>';
					echo '<td>'.$row['label_destino'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/sentidos/pop_update/'.$row['id'].'/'.$id_pesquisa_trafegos.'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/sentidos/pop_delete/'.$row['id'].'/'.$id_pesquisa_trafegos.'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        
     </div>