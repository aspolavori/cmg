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
	            <?php echo ucfirst('Composição Transporte');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Atualizar <?php echo ucfirst('Composição Transporte');?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> composicao_transporte_transporte updated with success.';
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
		      
		      $options_tranporte = array('' => 'Nenhum');
		      foreach ($transporte_material_classe as $row)
		      {
		      	$options_tranporte[$row["id_secundario"]] = $row["titulo"].' - '.$row["origem"].' - '.$row["destino"].' - '.$row["trans_veic_caminho"];
		      }
		      
		      $options_composicao_transporte = array();
		      foreach ($composicao_transporte as $row)
		      {
		      	$options_composicao_transporte[$row["id"]] = $row["codigo"].' - '.$row["titulo"];
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
				              
		    		 echo form_dropdown('id_', $options_, composicao_transporte_transporte[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/composicao_transporte_transporte/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	  <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Composição Transporte</label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_composicao_transporte', $options_composicao_transporte, $composicao_transporte_transporte[0]['id_composicao_transporte'] ,'style="width:600px;"');	
				     echo          
				            '</div>
				          </div>';	
				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Transporte 1</label>
				            <div class="controls">';
				     
				     echo form_dropdown('id_transporte_material_classe1', $options_tranporte, $composicao_transporte_transporte[0]['id_transporte_material_classe1'] ,'style="width:600px;"');
				     echo
				     '</div>
				          </div>';
				     
				      echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Transporte 2</label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_transporte_material_classe2', $options_tranporte, $composicao_transporte_transporte[0]['id_transporte_material_classe2'] ,'style="width:600px;"');	
				     echo          
				            '</div>
				          </div>';	
				 
				 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" value="<?php echo $composicao_transporte_transporte[0]['observacao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>