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
	            echo '<strong>Well done!</strong> new inclinacao_pista created with success.';
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
		      
		      echo form_open("admin/inclinacao_pista/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Ciclo</label>
		            <div class="controls">
		              <input type="text" id="" name="ID_CICLO" value="<?php echo set_value('ID_CICLO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Lote</label>
		            <div class="controls">
		              <input type="text" id="" name="ID_LOTE" value="<?php echo set_value('ID_LOTE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_TRECHO" value="<?php echo set_value('NM_TRECHO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Levantamento</label>
		            <div class="controls">
		              <input type="text" id="" name="DT_LEVANTAMENTO" value="<?php echo set_value('DT_LEVANTAMENTO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_UF" value="<?php echo set_value('NM_UF'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">BR</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_BR" value="<?php echo set_value('NM_BR'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Pista</label>
		            <div class="controls">
		              <input type="text" id="" name="DESC_PISTA" value="<?php echo set_value('DESC_PISTA'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Sentido</label>
		            <div class="controls">
		              <input type="text" id="" name="DESC_SENTIDO" value="<?php echo set_value('DESC_SENTIDO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Faixa</label>
		            <div class="controls">
		              <input type="text" id="" name="DESC_FAIXA" value="<?php echo set_value('DESC_FAIXA'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Km Inicial</label>
		            <div class="controls">
		              <input type="text" id="" name="KM_INICIAL" value="<?php echo set_value('KM_INICIAL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Km Final</label>
		            <div class="controls">
		              <input type="text" id="" name="KM_FINAL" value="<?php echo set_value('KM_FINAL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">DT Upload</label>
		            <div class="controls">
		              <input type="text" id="" name="DT_UPLOAD" value="<?php echo set_value('DT_UPLOAD'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Descrição Caminho</label>
		            <div class="controls">
		              <input type="text" id="" name="DESC_CAMINHO" value="<?php echo set_value('DESC_CAMINHO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TP Trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="ID_TP_TRECHO" value="<?php echo set_value('ID_TP_TRECHO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Save changes</button>
	            <button class="btn" type="reset">Cancel</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>