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
	            echo '<strong>Well done!</strong> sondagem updated with success.';
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
		      
			  $options_tipo_sondagem = array();
		      foreach ($tipos_sondagens as $row)
		      {
		      	$options_tipo_sondagem[$row["id"]] = $row["titulo"];
		      }
		      
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
				              
		    		 echo form_dropdown('id_', $options_, sondagens[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/sondagens/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	  <div class="control-group">
		            <label for="inputError" class="control-label">Titulo</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo $sondagem[0]['titulo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Tipo </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_tipo_sondagem', $options_tipo_sondagem, $sondagem[0]['id_tipo_sondagem'] );	
				     echo          
				            '</div>
				          </div>';	
			 		 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Rodovia</label>
		            <div class="controls">
		              <input type="text" id="" name="rodovia" value="<?php echo $sondagem[0]['rodovia']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <input type="text" id="" name="uf" value="<?php echo $sondagem[0]['uf']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="trecho" value="<?php echo $sondagem[0]['trecho']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Km Inicial</label>
		            <div class="controls">
		              <input type="text" id="" name="km_inicial" value="<?php echo $sondagem[0]['km_inicial']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Km Final</label>
		            <div class="controls">
		              <input type="text" id="" name="km_final" value="<?php echo $sondagem[0]['km_final']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Lote</label>
		            <div class="controls">
		              <input type="text" id="" name="lote" value="<?php echo $sondagem[0]['lote']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Estudo</label>
		            <div class="controls">
		              <input type="text" id="" name="estudo" value="<?php echo $sondagem[0]['estudo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Local</label>
		            <div class="controls">
		              <input type="text" id="" name="local" value="<?php echo $sondagem[0]['local']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data Inicial</label>
		            <div class="controls">
		              <input type="date" id="" name="data_ini" value="<?php echo $sondagem[0]['data_ini']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data Final</label>
		            <div class="controls">
		              <input type="date" id="" name="data_fim" value="<?php echo $sondagem[0]['data_fim']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Descrição</label>
		            <div class="controls">
		              <input type="text" id="" name="descricao" value="<?php echo $sondagem[0]['descricao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>