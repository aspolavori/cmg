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
	            echo '<strong>Well done!</strong> transporte_material_classe updated with success.';
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
    		  <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Classe </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_', $options_, transporte_material_classe[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/transporte_material_classe/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Transporte</label>
		            <div class="controls">
		              <input type="text" id="" name="id_transporte" value="<?php echo $transporte_material_classe[0]['id_transporte']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Composição</label>
		            <div class="controls">
		              <input type="text" id="" name="id_composicao" value="<?php echo $transporte_material_classe[0]['id_composicao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Material</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo $transporte_material_classe[0]['titulo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem</label>
		            <div class="controls">
		              <input type="text" id="" name="origem" value="<?php echo $transporte_material_classe[0]['origem']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino</label>
		            <div class="controls">
		              <input type="text" id="" name="destino" value="<?php echo $transporte_material_classe[0]['destino']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Distância (km)</label>
		            <div class="controls">
		              <input type="text" id="" name="distancia" value="<?php echo $transporte_material_classe[0]['distancia']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Fórmula</label>
		            <div class="controls">
		              <input type="text" id="" name="formula" value="<?php echo $transporte_material_classe[0]['formula']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Trans./Veíc./Caminho</label>
		            <div class="controls">
		              <input type="text" id="" name="trans_veic_caminho" value="<?php echo $transporte_material_classe[0]['trans_veic_caminho']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" value="<?php echo $transporte_material_classe[0]['observacao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>