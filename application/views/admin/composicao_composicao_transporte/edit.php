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
          <a href="<?php echo site_url("admin").'/composicao_composicao_transporte/lista_composicao_transporte/'.$composicao_composicao_transporte[0]['id_composicao']; ?>">
	         Trasnporte
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
          <a href="#">Update</a>
        </li>
      </ul>
      <div class="page-header">
        <h2>
          Atualizar Composição Transporte
        </h2>
      </div>
     <?php
      $span = false;
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-success">';
            echo '<a class="close" data-dismiss="alert">×</a>';
            echo '<strong>Well done!</strong> composicao transporte updated with success.';
          echo '</div>';       
        }else{
		  $span = true;
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
				              
		    		 echo form_dropdown('id_', $options_, sicro_material[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      if(validation_errors()){
		      	echo validation_errors();
		      	$span = true;
		      }
    
		      echo form_open("admin/composicao_composicao_transporte/update/".$this->uri->segment(4), $attributes);
		     ?>
	     <fieldset>
	     	<input type="hidden" id="" name="id_composicao" value="<?php echo $composicao_composicao_transporte[0]['id_composicao']; ?>" >		              
	           <?php 
			     echo 
			     	  '<div class="control-group">
			            <label for="inputError" class="control-label">Composição Transporte</label>
			            <div class="controls">';
			              
		    		 echo form_dropdown('id_composicao_transporte', $options_composicao_transporte, $composicao_composicao_transporte[0]['id_composicao_transporte'] , 'style="width: 390px;"');	
				     echo          
				            '</div>
				          </div>';	
			  ?>
	          <div class="control-group">
	            <label for="inputError" class="control-label">Quantidade</label>
	            <div class="controls">
	              <input type="text" id="" name="quantidade" value="<?php echo $composicao_composicao_transporte[0]['quantidade']; ?>" >
	              <!--<span class="help-inline">Woohoo!</span>-->
	            </div>
	          </div><div class="control-group">
	            <label for="inputError" class="control-label">Observação</label>
	            <div class="controls">
	              <input type="text" id="" name="observacao" value="<?php echo $composicao_composicao_transporte[0]['observacao']; ?>" >
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