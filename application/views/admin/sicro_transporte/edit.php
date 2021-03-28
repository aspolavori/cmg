    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/sicros' ?>">
	            <?php echo ucfirst('células');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Atualizar <?php echo ucfirst('célula Transporte');?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> sicro_transporte updated with success.';
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
    		  		  
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/sicro_transporte/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	  <input type="hidden" id="" name="id_sicro" value="<?php echo $sicro_transporte[0]['id_sicro']; ?>" >
		          <?php 
		          echo
		          '<div class="control-group">
				            <label for="inputError" class="control-label">Transporte</label>
				            <div class="controls">';
		          
		          echo form_dropdown('id_transporte', $options_transportes, $sicro_transporte[0]['id_transporte'] );
		          echo
		          			'</div>
				          </div>';
		          ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" value="<?php echo $sicro_transporte[0]['observacao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>