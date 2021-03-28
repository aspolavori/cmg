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
	            echo '<strong>Well done!</strong> new veiculo_classeveiculo created with success.';
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
		
		      $options_classes = array('' => 'select');
		      foreach($classeveiculos as $row) {
		      	$options_classes[$row['id']] = $row['titulo'] ;
		      }
		      
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/veiculo_classeveiculo/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Título</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php 
		          echo '<div class="control-group">';
		            echo '<label for="inputError" class="control-label">Classe</label>';
		            echo '<div class="controls">';
		              echo form_dropdown('id_classeveiculo', $options_classes, set_value('id_classeveiculo'), '');
		            echo '</div>';
		          echo '</div>';
		          
		         echo '<table class="table table-striped table-bordered table-condensed">'; 
		         $i = 0;
		         $first = true;
		          foreach($veiculos as $item){
					
						if($i <= 6){
							$startBlock = '<td>';
							$endBlock 	= '</td>';
						}else{
							$startBlock = '</tr>
		      							   <tr>
		      								<td>';
							$endBlock =    '</td>';
							$i = 0;
						}
						if($first){
							$startBlock = '<tr>
		      								<td>';
							$endBlock =    '</td>';
							$first = false;
						}
					echo $startBlock;
		          	 echo form_checkbox('idVeiculos[]', $item['id'], FALSE);
		          	 echo '<img src="'.base_url().'assets/img/veiculos/'.$item['id'].'.png'.'" style="height:55px; width:187px">';
		          	echo $endBlock;
		          	 $i++;
		          }
		         echo '</table>'; 
			     ?>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>