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
	            <?php echo ucfirst('Fator de conversão padrão HDM veículos');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Atualizar <?php echo ucfirst('Fator de conversão padrão HDM veículos');?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> fator_conversao_padrao updated with success.';
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
		      
		      $option_veiculos = array();
		      foreach($veiculos as $item){
		      	$option_veiculos[$item['id']] = $item['VEH_NAME'];
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
				              
		    		 echo form_dropdown('id_', $options_, fator_conversao_padrao[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/fator_conversao_padrao/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	 <?php 
				     echo '<div class="control-group">';
				     echo '<label for="inputError" class="control-label">Veículo </label>';
				     echo '<div class="controls">';				              
		    		 echo form_dropdown('id_veiculo', $option_veiculos, $fator_conversao_padrao[0]['id_veiculo'] );	
				     echo '</div>';
				     echo '</div>';	
			 		 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">EUC_LABOUR</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_LABOUR" value="<?php echo $fator_conversao_padrao[0]['FEUC_LABOUR']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_CREW</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_CREW" value="<?php echo $fator_conversao_padrao[0]['FEUC_CREW']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_TYRE</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_TYRE" value="<?php echo $fator_conversao_padrao[0]['FEUC_TYRE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_OIL</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_OIL" value="<?php echo $fator_conversao_padrao[0]['FEUC_OIL']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_OHEAD</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_OHEAD" value="<?php echo $fator_conversao_padrao[0]['FEUC_OHEAD']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_VEH</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_VEH" value="<?php echo $fator_conversao_padrao[0]['FEUC_VEH']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_GAS</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_GAS" value="<?php echo $fator_conversao_padrao[0]['FEUC_GAS']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_OLEO</label>
		            <div class="controls">
		              <input type="text" id="" name="FEUC_OLEO" value="<?php echo $fator_conversao_padrao[0]['FEUC_OLEO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>