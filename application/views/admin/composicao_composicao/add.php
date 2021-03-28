    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/composicoes'; ?>">
	          	Composições
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/composicao_composicao/lista_composicao/'.$id_composicao; ?>">
	            Atividades Auxiliares
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>       
	      <div class="page-header">
	        <h2>
	          Adicionar Atividade Auxiliar
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      $span = false;
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new atividade auxiliar created with success.';
	          echo '</div>';       
	        }else{
			  $span = false;
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
		      
		      $options_composicoes = array();
		      foreach ($composicoes as $row)
		      {
		      	$options_composicoes[$row["id"]] = $row["codigo"].' - '.$row["titulo"];
		      }
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
		      if(validation_errors()){
		      	echo validation_errors();
		      	$span = true;	
		      }
		      
		      echo form_open("admin/composicao_composicao/add/".$id_composicao, $attributes);
		     ?>
		     <fieldset>
		          <input type="hidden" id="" name="id_composicao" value="<?php echo $id_composicao; ?>" >
		          <?php
		         echo '<div class="control-group">';
		          echo '<label for="inputError" class="control-label">Composições</label>';
		          echo '<div class="controls">';			          
		          	echo form_dropdown('id_composicao2', $options_composicoes, set_value('id_composicao2'), 'style="width: 390px;"');			          
		          echo '</div>';
	          	 echo '</div>';
	          	 ?>
	          	 <div class="control-group">
		            <label for="inputError" class="control-label">Quantidade</label>
		            <div class="controls">
		              <input type="text" id="" name="quantidade" value="<?php echo set_value('quantidade'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Unidade</label>
		            <div class="controls">
		              <input type="text" id="" name="unidade" value="<?php echo set_value('unidade'); ?>" >
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
	
	      <?php echo form_close(); ?>       
	      </div>