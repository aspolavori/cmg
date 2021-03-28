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
	          Atualizar <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> pequisa_trafeco updated with success.';
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
    
		      echo form_open("admin/pesquisa_trafegos/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Classe </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_classeveiculos', $options_classeveicular, $pequisa_trafeco[0]['id_classeveiculos'] );	
				     echo          
				            '</div>
				          </div>';	
			 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Título</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo $pequisa_trafeco[0]['titulo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Rodovia</label>
		            <div class="controls">
		              <input type="text" id="" name="rodovia" value="<?php echo $pequisa_trafeco[0]['rodovia']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <input type="text" id="" name="uf" value="<?php echo $pequisa_trafeco[0]['uf']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="trecho" value="<?php echo $pequisa_trafeco[0]['trecho']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">KM</label>
		            <div class="controls">
		              <input type="text" id="" name="km" value="<?php echo $pequisa_trafeco[0]['km']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Padrão Entrevista OD</label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_entrevista', $options_entrevista, $pequisa_trafeco[0]['id_entrevista'] );	
				     echo          
				            '</div>
				          </div>';	
				 	 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Número do Posto</label>
		            <div class="controls">
		              <input type="text" id="" name="n_posto" value="<?php echo $pequisa_trafeco[0]['n_posto']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Chefe do Posto</label>
		            <div class="controls">
		              <input type="text" id="" name="chefe_posto" value="<?php echo $pequisa_trafeco[0]['chefe_posto']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data Inicio</label>
		            <div class="controls">
		              <input type="date" id="" name="data_ini" value="<?php echo $pequisa_trafeco[0]['data_ini']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data Fim</label>
		            <div class="controls">
		              <input type="date" id="" name="data_fim" value="<?php echo $pequisa_trafeco[0]['data_fim']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          
		          
		          <div class="control-group">
		            <label for="inputError" class="control-label">Latitude</label>
		            <div class="controls">
		              <input type="text" id="" name="lat" value="<?php echo $pequisa_trafeco[0]['lat']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Longitude</label>
		            <div class="controls">
		              <input type="text" id="" name="long" value="<?php echo $pequisa_trafeco[0]['long']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">SNV</label>
		            <div class="controls">
		              <input type="text" id="" name="snv" value="<?php echo $pequisa_trafeco[0]['snv']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Ano SNV</label>
		            <div class="controls">
		              <input type="date" id="" name="ano_snv" value="<?php echo $pequisa_trafeco[0]['ano_snv']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>