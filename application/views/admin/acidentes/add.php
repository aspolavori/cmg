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
	          <a href="#">New</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adding <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new acidente created with success.';
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
		
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/acidentes/add", $attributes);
		     ?>
		     <fieldset>
		     	  <div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <input type="text" id="" name="uf" value="<?php echo set_value('uf'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Rodovia</label>
		            <div class="controls">
		              <input type="text" id="" name="rodovia" value="<?php echo set_value('rodovia'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Km</label>
		            <div class="controls">
		              <input type="text" id="" name="km" value="<?php echo set_value('km'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Sentido</label>
		            <div class="controls">
		              <input type="text" id="" name="sentido" value="<?php echo set_value('sentido'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data</label>
		            <div class="controls">
		              <input type="date" id="" name="data" value="<?php echo set_value('data'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Hora do Acidente</label>
		            <div class="controls">
		              <input type="time" id="" name="hora" value="<?php echo set_value('hora'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Classificação</label>
		            <div class="controls">
		              <input type="text" id="" name="classificacao" value="<?php echo set_value('classificacao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Feridos</label>
		            <div class="controls">
		              <input type="text" id="" name="feridos" value="<?php echo set_value('feridos'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Mortos</label>
		            <div class="controls">
		              <input type="text" id="" name="mortos" value="<?php echo set_value('mortos'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Descrição</label>
		            <div class="controls">
		              <input type="text" id="" name="descricao" value="<?php echo set_value('descricao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Save changes</button>
	            <button class="btn" type="reset">Cancel</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>