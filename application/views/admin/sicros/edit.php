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
	            <?php echo ucfirst("Células");?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Atualizar <?php echo ucfirst("Célula");?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> sicro updated with success.';
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
		      
    		  /*
    		  $options_ = array();
		      foreach ($VARIAVELFROMCONTROLLER as $row)
		      {
		      	$options_[$row["id"]] = $row["titulo"];
		      }	
    		  <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Classe </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_', $options_, sicros[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/sicros/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Célula</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo $sicro[0]['titulo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Região </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('regiao', $options_regiores, $sicro[0]['regiao'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <?php
		              	echo form_dropdown('br', $options_uf, $sicro[0]['br'] );
		              ?>
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Indice de Pavimentação Base</label>
		            <div class="controls">
		              <input type="text" id="" name="indice_pavimentacao_base" value="<?php echo $sicro[0]['indice_pavimentacao_base']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Indice de Pavimentação</label>
		            <div class="controls">
		              <input type="text" id="" name="indice_pavimentacao" value="<?php echo $sicro[0]['indice_pavimentacao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">BDI</label>
		            <div class="controls">
		              <input type="text" id="" name="bdi" value="<?php echo $sicro[0]['bdi']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">BDI Betuminosos</label>
		            <div class="controls">
		              <input type="text" id="" name="bdi_betuminosos" value="<?php echo $sicro[0]['bdi_betuminosos']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">ICMS Asfáltico</label>
		            <div class="controls">
		              <input type="text" id="" name="icms_asfaltico" value="<?php echo $sicro[0]['icms_asfaltico']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <textarea class="form-control" type="textarea" rows="5" placeholder="Observações" id="" name="observacao"><?php echo set_value('observacao') ?  set_value('observacao') : $sicro[0]['observacao']; ?></textarea>
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data Base</label>
		            <div class="controls">
		              <input type="date" id="" name="data_base" value="<?php echo $sicro[0]['data_base']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>