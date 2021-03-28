    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>">
	            <?php echo ucfirst($this->uri->segment(2));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adicionar <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new transporte_material_classe created with success.';
	          echo '</div>';       
	        }else{
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
		      
			$options_transportes = array();
            foreach ($transportes as $row)
            {
            	$options_transportes[$row["id"]] = $row["titulo"].' - '.$row["regiao"].' - '.$row["uf"];
            }
            	
            $options_composicoes = array("0" => "Fator de Correção");
            foreach ($composicoes as $row)
            {
            	$options_composicoes[$row["id"]] = $row["codigo"].' - '.$row["titulo"];
            }
			  
			  
			  
				
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/transporte_material_classe/add", $attributes);
		     ?>
		     <fieldset>
		          <?php 
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Transporte</label>';
			          echo '<div class="controls">';
			          	echo form_dropdown('id_transporte', $options_transportes, set_value('id_transporte'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Composição</label>';
			          echo '<div class="controls">';			          
			          	echo form_dropdown('id_composicao', $options_composicoes, set_value('id_composicao'), 'class=""');			          
			          echo '</div>';
	         	  echo '</div>';
	         	  ?>	
				
		          ><div class="control-group">
		            <label for="inputError" class="control-label">Material</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem</label>
		            <div class="controls">
		              <input type="text" id="" name="origem" value="<?php echo set_value('origem'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino</label>
		            <div class="controls">
		              <input type="text" id="" name="destino" value="<?php echo set_value('destino'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Distância (km)</label>
		            <div class="controls">
		              <input type="text" id="" name="distancia" value="<?php echo set_value('distancia'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Fórmula</label>
		            <div class="controls">
		              <input type="text" id="" name="formula" value="<?php echo set_value('formula'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Trans./Veíc./Caminho</label>
		            <div class="controls">
		              <input type="text" id="" name="trans_veic_caminho" value="<?php echo set_value('trans_veic_caminho'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" value="<?php echo set_value('observacao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>