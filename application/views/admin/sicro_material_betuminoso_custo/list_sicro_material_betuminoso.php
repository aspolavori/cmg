    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/sicros'; ?>">
	          	Células
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Materiais Betuminosos
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo 'Sicro Materiais Betuminosos';?>
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/add/'.$id_sicro; ?>" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Material Betuminoso</th>
				<th class="yellow header headerSortDown">Custo Unitário</th>
				<th class="yellow header headerSortDown">Unidade</th>	
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              
	              foreach($sicro_material_betuminoso_custo_not_defined as $row)
	              {
	              	echo '<tr>';
	              	echo '<td>'.$row['id'].'</td>';
	              	echo '<td>'.$row['codigo'].'-'.$row['titulo'].'</td>';
	              	echo '<td colspan="2" style="color:red;">Esse Material Betuminoso consta no Banco de Materiais Betuminosos mas não possui valor associado.</td>';
	              	 
	              	echo '<td class="crud-actions">
	                  <a href="'.site_url("admin").'/sicro_material_betuminoso_custo/add/'.$id_sicro.'/'.$row['id'].'" class="btn btn-success">Adicionar</a>
	                </td>';
	              	echo "</tr>";
	              }
	              
	              foreach($sicro_material_betuminoso_custo as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['codigo'].'-'.$row['titulo'].'</td>';
					echo '<td>'.$row['custo_unitario'].'</td>';
					echo '<td>'.$row['unidade'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/sicro_material_betuminoso_custo/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/sicro_material_betuminoso_custo/delete/'.$row['id'].'/'.$id_sicro.'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        
     </div>