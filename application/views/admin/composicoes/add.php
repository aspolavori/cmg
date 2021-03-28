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
	            <?php echo ucfirst("Composições");?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adicionar <?php echo ucfirst("Composição");?>
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new composicao created with success.';
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
		      
		      $options_categoria = array('Principal' => 'Principal', 'Auxiliar' => 'Auxiliar');
		      
		      
			  /*
			  $options_ = array();
		      foreach ($VARIAVELFROMCONTROLLER as $row)
		      {
		      	$options_[$row["id"]] = $row["titulo"];
		      }
			  
			  echo '<div class="control-group">';
		          echo '<label for="inputError" class="control-label">Camada</label>';
		          echo '<div class="controls">';			          
		          	echo form_dropdown('id_', $options_, set_value('id_'), 'class="span2"');			          
		          echo '</div>';
	          echo '</div>';	
				
			  */
				
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/composicoes/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Código</label>
		            <div class="controls">
		              <input type="text" id="" name="codigo" value="<?php echo set_value('codigo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Composição</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data Base</label>
		            <div class="controls">
		              <input type="date" id="" name="data_base" value="<?php echo set_value('data_base'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Tipo</label>
		            <div class="controls">
		              <input type="text" id="" name="tipo" value="<?php echo set_value('tipo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php 
			         echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Categoria</label>';
			          echo '<div class="controls">';			          
			          	echo form_dropdown('categoria', $options_categoria, set_value('categoria'), 'class=""');			          
			          echo '</div>';
		         	 echo '</div>';
	         	 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Produção da Equipe</label>
		            <div class="controls">
		              <input type="text" id="" name="producao_equipe" value="<?php echo set_value('producao_equipe'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Prod. Eq. Unidade</label>
		            <div class="controls">
		              <input type="text" id="" name="producao_equipe_unidade" value="<?php echo set_value('producao_equipe_unidade'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Adc.M.O.</label>
		            <div class="controls">
		              <input type="text" id="" name="adc_mo" value="<?php echo set_value('adc_mo'); ?>" >
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