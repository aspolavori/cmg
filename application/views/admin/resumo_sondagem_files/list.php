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
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/add/'.$id_resumo; ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
          
          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Titulo</th>
				<th class="yellow header headerSortDown">Tipo</th>
				<th class="yellow header headerSortDown">File</th>
				<th class="yellow header headerSortDown">Descrição</th>
	    	  </tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($resumo_sondagem_files as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['tipo'].'</td>';
					echo '<td>'.$row['file'].'</td>';
					echo '<td>'.$row['descricao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.base_url().'assets/resumos/'.$row['file'].'" class="btn btn-info" target="_blank" >Ver PDF</a>    
                  <a href="'.site_url("admin").'/resumo_sondagem_files/delete/'.$row['id'].'/'.$id_resumo.'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>