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
	            <?php echo ucfirst("Soluções");?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adicionar <?php echo ucfirst("Solução");?>
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new solucao created with success.';
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
		      
			 	$options_categorias = array();
	            foreach ($categorias as $row)
	            {
	            	$options_categorias[$row["id"]] = $row["titulo"];
	            }
	            
	            $options_tipos = array();
	            foreach ($tipos as $row)
	            {
	            	$options_tipos[$row["id"]] = $row["titulo"];
	            }
			  		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/solucoes/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Solução</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Modalidade de Intervenção</label>
		            <?php 
			            echo '<div class="controls">';			          
			          	echo form_dropdown('id_categoria', $options_categorias, set_value('id_categoria'), 'class=""');			          
			          	echo '</div>';
		          	?>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Tipo</label>
		            <?php 
			            echo '<div class="controls">';			          
			          	echo form_dropdown('id_tipo', $options_tipos, set_value('id_tipo'), 'class=""');			          
			          	echo '</div>';
		          	?>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Espessura (cm)</label>
		            <div class="controls">
		              <input type="text" id="" name="espessura1" value="<?php echo set_value('espessura1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <h2>Solução Acostamento</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Descrição da Solução</label>
		            <div class="controls">
		              <input type="text" id="" name="desc_solucao" value="<?php echo set_value('desc_solucao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Espessura (cm)</label>
		            <div class="controls">
		              <input type="text" id="" name="espessura2" value="<?php echo set_value('espessura2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         <h2>Revestimento na Pista</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Nova Faixa Espessura</label>
		            <div class="controls">
		              <input type="text" id="" name="nova_faixa_espessura" value="<?php echo set_value('nova_faixa_espessura'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Recapeamento Pista Existente</label>
		            <div class="controls">
		              <input type="text" id="" name="pista_existente" value="<?php echo set_value('pista_existente'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
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