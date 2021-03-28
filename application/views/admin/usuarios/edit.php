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
	          Updating <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> usuario updated with success.';
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
    
		      echo form_open("admin/usuarios/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	  
		          <div class="control-group">
		            <label for="inputError" class="control-label">Instituição</label>
		            <div class="controls">
		              <input type="text" id="" name="instituicao" value="<?php echo $usuario[0]['instituicao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Login</label>
		            <div class="controls">
		              <input type="text" id="" name="login" value="<?php echo $usuario[0]['login']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Nome</label>
		            <div class="controls">
		              <input type="text" id="" name="nome" value="<?php echo $usuario[0]['nome']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Local</label>
		            <div class="controls">
		              <input type="text" id="" name="local" value="<?php echo $usuario[0]['local']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Email</label>
		            <div class="controls">
		              <input type="text" id="" name="email" value="<?php echo $usuario[0]['email']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		          /* 
		          <div class="control-group">
		            <label for="inputError" class="control-label">Senha</label>
		            <div class="controls">
		              <input type="text" id="" name="senha" value="<?php echo $usuario[0]['senha']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Token</label>
		            <div class="controls">
		              <input type="text" id="" name="tokensenha" value="<?php echo $usuario[0]['tokensenha']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Ativo</label>
		            <div class="controls">
		              <input type="text" id="" name="ativo" value="<?php echo $usuario[0]['ativo']; ?>" >
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