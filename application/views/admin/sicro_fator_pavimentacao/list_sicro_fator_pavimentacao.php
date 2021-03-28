    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin")."/sicros"; ?>">
	            <?php echo ucfirst('Células');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst('Fator Pavimentação Célula');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('Fator Pavimentação Célula');?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add/<?php echo $id_sicro; ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
            
            $options_categorias = array();
            foreach($categorias as $row){
            	$options_categorias[$row['id']] = $row['titulo'];
            }
           
          
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Modalidade Intervenção</th>
				<th class="yellow header headerSortDown">Padrâo</th>
				<th class="yellow header headerSortDown">Restauração</th>
				<th class="yellow header headerSortDown">Plano</th>
				<th class="yellow header headerSortDown">Ondulado</th>
				<th class="yellow header headerSortDown">Montanhoso</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($sicro_fator_pavimentacao as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>';
						echo $options_categorias[$row['id_categoria']];
					echo '</td>';
					echo '<td>'.$row['padrao'].'</td>';
					echo '<td>'.$row['restauracao_pista_existente'].'</td>';
					echo '<td>'.$row['plano'].'</td>';
					echo '<td>'.$row['ondulado'].'</td>';
					echo '<td>'.$row['montanhoso'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/sicro_fator_pavimentacao/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/sicro_fator_pavimentacao/delete/'.$row['id'].'/'.$id_sicro.'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>