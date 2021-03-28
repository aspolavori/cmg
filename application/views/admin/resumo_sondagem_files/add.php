    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/resumo/'.$id_resumo; ?>">
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
	            echo '<strong>Well done!</strong> new resumo_sondagem_file created with success.';
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
		      $attributes = array("class" => "form-horizontal", "id" => "", "enctype" => "multipart/form-data");
			  
			  $options_tipo = array();
		      foreach ($tipoEnsaios as $row)
		      {
		      	$options_tipo[$row["titulo"]] = $row["titulo"];
		      }
			   				
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/resumo_sondagem_files/add/".$id_resumo, $attributes);
		     ?>
		     <fieldset>
		     	  <input type="hidden" id="" name="id_resumo" value="<?php echo $id_resumo ?>" >
		          <div class="control-group">
		            <label for="inputError" class="control-label">Titulo</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Tipo Ensaio</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('tipo', $options_tipo, set_value('tipo'), '');
			          echo '</div>';
		          echo '</div>';
		          ?>
		          <div class="control-group">
		            <label for="file">Pdf:</label>
					<input type="file" name="file" class="btn-primary"  />
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Descrição</label>
		            <div class="controls">
		              <input type="text" id="" name="descricao" value="<?php echo set_value('descricao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>