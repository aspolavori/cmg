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
	            echo '<strong>Well done!</strong> new transporte created with success.';
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
		      $options_regiores = array('CENTRO OESTE' => 'CENTRO OESTE', 'NORDESTE' => 'NORDESTE','NORTE' => 'NORTE','SUDESTE' => 'SUDESTE','SUL' => 'SUL' );
		      
		      $options_uf = array('AC' => 'AC', 'AL' => 'AL', 'AP' => 'AP', 'AM' => 'AM', 'BA' => 'BA', 'CE' => 'CE', 'DF' => 'DF', 'EF' => 'EF', 'GO' => 'GO',
		      		'MA' => 'MA', 'MS' => 'MS', 'MT' => 'MT', 'MG' => 'MG', 'PA' => 'PA', 'PB' => 'PB', 'PR' => 'PR', 'PE' => 'PE', 'PI' => 'PI',
		      		'RJ' => 'RJ', 'RN' => 'RN', 'RS' => 'RS', 'RO' => 'RO', 'RR' => 'RR', 'SC' => 'SC', 'SP' => 'SP', 'SE' => 'SE', 'TO' => 'TO'
		      );
		      
			  $options_transportesmodelo = array();
			  
		 	  foreach($transportes_modelos as $item){
		 	  		$options_transportesmodelo[$item['id']] = $item['titulo']." - ".$item['regiao']." - ".$item['uf']." - ".$item['data_base'];  
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
		      echo validation_errors();
		      
		      echo form_open("admin/transportes/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Transporte</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		           <?php
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Modelo</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('modelo', $options_transportesmodelo, set_value('modelo'), 'style="width: 500px;"');
			          echo '</div>';
		          echo '</div>';
		          ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Código</label>
		            <div class="controls">
		              <input type="text" id="" name="codigo" value="<?php echo set_value('codigo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Região</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('regiao', $options_regiores, set_value('regiao'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Uf</label>
		            <div class="controls">
		              <?php
		              	echo form_dropdown('uf', $options_uf, set_value('uf'), 'class=""'); 
		              ?>
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">CTC1</label>
		            <div class="controls">
		              <input type="text" id="" name="ctc1" value="<?php echo set_value('ctc1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">CTC2</label>
		            <div class="controls">
		              <input type="text" id="" name="ctc2" value="<?php echo set_value('ctc2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">CTF1</label>
		            <div class="controls">
		              <input type="text" id="" name="ctf1" value="<?php echo set_value('ctf1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">CTF2</label>
		            <div class="controls">
		              <input type="text" id="" name="ctf2" value="<?php echo set_value('ctf2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data Base</label>
		            <div class="controls">
		              <input type="date" id="" name="data_base" value="<?php echo set_value('data_base'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
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
	
	      <?php echo form_close(); ?>        </div>