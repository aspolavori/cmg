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
	            echo '<strong>Well done!</strong> new pequisa_trafeco created with success.';
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
		
		      $options_classeveicular = array();
		      foreach ($classeveicular as $row)
		      {
		      	$options_classeveicular[$row['id']] = $row['titulo'];
		      }
		      
		      $options_entrevista = array();
		      $options_entrevista[0] = 'Selecione Valor';
		      foreach ($entrevistas as $row)
		      {
		      	$options_entrevista[$row['id']] = $row['titulo'];
		      }
		      
		      
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/pesquisa_trafegos/add", $attributes);
		     ?>
		     <fieldset>
		     <?php 
		     	  echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Camada</label>';
			          echo '<div class="controls">';			          
			          	echo form_dropdown('id_classeveiculos', $options_classeveicular, set_value('id_classeveiculos'), '');			          
			          echo '</div>';
		          echo '</div>';
		      ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Título</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Rodovia</label>
		            <div class="controls">
		              <input type="text" id="" name="rodovia" value="<?php echo set_value('rodovia'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <input type="text" id="" name="uf" value="<?php echo set_value('uf'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="trecho" value="<?php echo set_value('trecho'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">KM</label>
		            <div class="controls">
		              <input type="text" id="" name="km" value="<?php echo set_value('km'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php 
		     	  echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Padrão Entrevista OD</label>';
			          echo '<div class="controls">';			          
			          	echo form_dropdown('id_entrevista', $options_entrevista, set_value('id_entrevista'), '');
			          	echo '<span class="help-inline">Caso exista pesquisa de Origem Destino, preencha esse valor</span>';			          
			          echo '</div>';
		          echo '</div>';
		      	  ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Número do Posto</label>
		            <div class="controls">
		              <input type="text" id="" name="n_posto" value="<?php echo set_value('n_posto'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Chefe do Posto</label>
		            <div class="controls">
		              <input type="text" id="" name="chefe_posto" value="<?php echo set_value('chefe_posto'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data Inicio</label>
		            <div class="controls">
		              <input type="date" id="" name="data_ini" value="<?php echo set_value('data_ini'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data Fim</label>
		            <div class="controls">
		              <input type="date" id="" name="data_fim" value="<?php echo set_value('data_fim'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          
		          <div class="control-group">
		            <label for="inputError" class="control-label">Latitude</label>
		            <div class="controls">
		              <input type="text" id="" name="lat" value="<?php echo set_value('lat'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Longitude</label>
		            <div class="controls">
		              <input type="text" id="" name="long" value="<?php echo set_value('long'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">SNV</label>
		            <div class="controls">
		              <input type="text" id="" name="snv" value="<?php echo set_value('snv'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Ano SNV</label>
		            <div class="controls">
		              <input type="date" id="" name="ano_snv" value="<?php echo set_value('ano_snv'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          
		          
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>