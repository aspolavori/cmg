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
	            echo '<strong>Well done!</strong> new usuario created with success.';
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
		      
		      echo form_open("admin/usuarios/add", $attributes);
		     ?>
		     <fieldset>
		    
		          <div class="control-group">
		            <label for="inputError" class="control-label">Instituição</label>
		            <div class="controls">
		              <input type="text" id="" name="instituicao" value="<?php echo set_value('instituicao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Login</label>
		            <div class="controls">
		              <input type="text" id="" name="login" value="<?php echo set_value('login'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Nome</label>
		            <div class="controls">
		              <input type="text" id="" name="nome" value="<?php echo set_value('nome'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Local</label>
		            <div class="controls">
		              <input type="text" id="" name="local" value="<?php echo set_value('local'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Email</label>
		            <div class="controls">
		              <input type="text" id="" name="email" value="<?php echo set_value('email'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Senha</label>
		            <div class="controls">
		              <input type="text" id="" name="senha" value="<?php echo set_value('senha'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		          /*
		          <div class="control-group">
		            <label for="inputError" class="control-label">Token</label>
		            <div class="controls">
		              <input type="text" id="" name="tokensenha" value="<?php echo set_value('tokensenha'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Ativo</label>
		            <div class="controls">
		              <input type="text" id="" name="ativo" value="<?php echo set_value('ativo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          */
		          ?>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Save changes</button>
	            <button class="btn" type="reset">Cancel</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>