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
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Atualizar <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> entrevista_pergunta updated with success.';
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
    
		      echo form_open("admin/entrevista_perguntas/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	 <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Entrevista </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_entrevista', $options_entrevistas, $entrevista_pergunta[0]['id_entrevista'] );	
				     echo          
				            '</div>
				          </div>';

				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Pergunta </label>
				            <div class="controls">';
				     
				     echo form_dropdown('id_pergunta', $options_perguntas, $entrevista_pergunta[0]['id_pergunta'] );
				     echo
				     '</div>
				          </div>';
			  ?>
		     
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>