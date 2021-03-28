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
	        <li>
	          <a href="<?php echo site_url("admin").'/sicro_material_betuminoso_custo/lista_material_betuminoso/'.$sicro_material_betuminoso_custo[0]['id_sicro']; ?>">
	            Materiais Betuminosos
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Atualizar Material Betuminoso
	        </h2>
	      </div>
	     <?php
		 	$span = false;
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> sicro_equipamento_custo updated with success.';
	          echo '</div>';       
	        }else{
			  $span = true;
	          echo '<div class="alert alert-error">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
	          echo '</div>';          
	        }
	      }
	      ?>
		    <?php
		      //form data
		      $attributes = array("class" => "form-horizontal", "id" => "");
    		  
		      $options_materiais_betuminosos = array();
		      foreach ($materiais_betuminosos as $row)
		      {
		      	$options_materiais_betuminosos[$row["id"]] = $row["codigo"].' - '.$row["titulo"].'('.$row["unidade"].')';
		      }
		      //form validation
			  if(validation_errors()){
		      	echo validation_errors();
		      	$span = true;
		      }
    
		      echo form_open("admin/sicro_material_betuminoso_custo/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	  <input type="hidden" id="" name="id_sicro" value="<?php echo $sicro_material_betuminoso_custo[0]['id_sicro']; ?>" >		              
		           <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Equipamentos</label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_material_betuminoso', $options_materiais_betuminosos, $sicro_material_betuminoso_custo[0]['id_material_betuminoso'] , 'style="width: 390px;"');	
				     echo          
				            '</div>
				          </div>';	
				  ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Custo Unitário (R$)</label>
		            <div class="controls">
		              <input type="text" id="" name="custo_unitario" style="width: 380px;"value="<?php echo $sicro_material_betuminoso_custo[0]['custo_unitario']; ?>" >
		              <?php
		              	if($span){
		              		echo '<span style="color:red" class="help-inline">O separador da casa decimal é "."(ponto).</span>';	
		              	} 
		              ?>
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" style="width: 380px;" value="<?php echo $sicro_material_betuminoso_custo[0]['observacao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        
	      </div>