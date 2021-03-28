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
	            echo '<strong>Well done!</strong> new entrevista_pergunta created with success.';
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
			  
			  $options_entrevistas = array();
		      foreach ($entrevistas as $row)
		      {
		      	$options_entrevistas[$row["id"]] = $row["titulo"];
		      }

		      $options_perguntas = array();
		      foreach ($perguntas as $row)
		      {
		      	$options_perguntas[$row["id"]] = $row["titulo"];
		      }
		      	
		      
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/entrevista_perguntas/add", $attributes);
		     ?>
		     <fieldset>
		     	<?php
			     	echo '<div class="control-group">';
			     	echo '<label for="inputError" class="control-label">Entrevista</label>';
			     	echo '<div class="controls">';
			     	echo form_dropdown('id_entrevista', $options_entrevistas, set_value('id_entrevista'), '');
			     	echo '</div>';
			     	echo '</div>';
			     	
			     	echo '<div class="control-group">';
			     	echo '<label for="inputError" class="control-label">Pergunta</label>';
			     	echo '<div class="controls">';
			     	echo form_dropdown('id_pergunta', $options_perguntas, set_value('id_pergunta'), '');
			     	echo '</div>';
			     	echo '</div>';
		     	
		     	?>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>