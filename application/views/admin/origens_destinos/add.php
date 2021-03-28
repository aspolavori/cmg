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
	            echo '<strong>Well done!</strong> new origem_destino created with success.';
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
		      echo validation_errors();
		      
		      echo form_open("admin/origens_destinos/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">id_pesquisa</label>
		            <div class="controls">
		              <input type="text" id="" name="id_pesquisa" value="<?php echo set_value('id_pesquisa'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Sentido</label>
		            <div class="controls">
		              <input type="text" id="" name="id_sentido" value="<?php echo set_value('id_sentido'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Veículo</label>
		            <div class="controls">
		              <input type="text" id="" name="id_veiculo" value="<?php echo set_value('id_veiculo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Placa</label>
		            <div class="controls">
		              <input type="text" id="" name="placa" value="<?php echo set_value('placa'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data</label>
		            <div class="controls">
		              <input type="text" id="" name="data" value="<?php echo set_value('data'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Hora</label>
		            <div class="controls">
		              <input type="text" id="" name="hora" value="<?php echo set_value('hora'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem País</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_pais" value="<?php echo set_value('origem_pais'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem UF</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_uf" value="<?php echo set_value('origem_uf'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem Municipio</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_municipio" value="<?php echo set_value('origem_municipio'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GeoCod Origem</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_geocod" value="<?php echo set_value('origem_geocod'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino País</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_pais" value="<?php echo set_value('destino_pais'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino UF</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_uf" value="<?php echo set_value('destino_uf'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino Municipio</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_municipio" value="<?php echo set_value('destino_municipio'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GeoCod Destino</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_geocod" value="<?php echo set_value('destino_geocod'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Combustível</label>
		            <div class="controls">
		              <input type="text" id="" name="combustivel" value="<?php echo set_value('combustivel'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Categoria</label>
		            <div class="controls">
		              <input type="text" id="" name="categoria" value="<?php echo set_value('categoria'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Numero de Pessoas</label>
		            <div class="controls">
		              <input type="text" id="" name="num_pessoas" value="<?php echo set_value('num_pessoas'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Renda Média</label>
		            <div class="controls">
		              <input type="text" id="" name="renda_media" value="<?php echo set_value('renda_media'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Motivo</label>
		            <div class="controls">
		              <input type="text" id="" name="motivo" value="<?php echo set_value('motivo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Frequencia</label>
		            <div class="controls">
		              <input type="text" id="" name="frequencia" value="<?php echo set_value('frequencia'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>