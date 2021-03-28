    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/sicros'; ?>">
	          	Células
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/sicro_equipamento_custo/lista_equipamento/'.$sicro_equipamento_custo[0]['id_sicro']; ?>">
	            Equipamentos
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Atualizar Equipamento
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
	            echo '<strong>Well done!</strong> sicro_equipamento_custo updated with success.';
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
		      
		      $options_equipamentos = array();
		      foreach ($equipamentos as $row)
		      {
		      	$options_equipamentos[$row["id"]] = $row["codigo"].' - '.$row["titulo"];
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
				              
		    		 echo form_dropdown('id_', $options_, sicro_equipamento_custo[0]['id_'] );	
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
    
		      echo form_open("admin/sicro_equipamento_custo/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		           <input type="hidden" id="" name="id_sicro" value="<?php echo $sicro_equipamento_custo[0]['id_sicro']; ?>" >		              
		           <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Equipamentos</label>
				            <div class="controls">';
				              
			    		 echo form_dropdown('id_equipamento', $options_equipamentos, $sicro_equipamento_custo[0]['id_equipamento'] , 'style="width: 390px;"');	
					     echo          
					            '</div>
					          </div>';	
				  ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Improdutivo (R$)</label>
		            <div class="controls">
		              <input type="text" id="" name="improdutivo" value="<?php echo $sicro_equipamento_custo[0]['improdutivo']; ?>" style="width: 380px;">
		              <?php
		              	if($span){
		              		echo '<span style="color:red"  class="help-inline">O separador da casa decimal é "."(ponto).</span>';	
		              	} 
		              ?>
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Operativo (R$)</label>
		            <div class="controls">
		              <input type="text" id="" name="operativo" value="<?php echo $sicro_equipamento_custo[0]['operativo']; ?>" style="width: 380px;" >
		              <?php
		              	if($span){
		              		echo '<span style="color:red"  class="help-inline">O separador da casa decimal é "."(ponto).</span>';	
		              	} 
		              ?>
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>