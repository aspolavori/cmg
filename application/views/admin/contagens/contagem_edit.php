    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2) ?>">
	            <?php echo ucfirst($this->uri->segment(2));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/contagens_list/'.$id_pesquisa_trafegos; ?>">
	            <?php echo 'Contagens';?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	         Update
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
	            echo '<strong>Well done!</strong> contagem updated with success.';
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
		      
		      $options_sentido = array();
		      foreach ($sentidos as $row)
		      {
		      	$options_sentido[$row["id"]] = $row["origem"].' - '.$row["destino"];
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
		      
		      echo form_open("admin/pesquisa_trafegos/contagem_update/".$id_pesquisa_trafegos.'/'.$contagem[0]['id'] , $attributes);
		     ?>
		     <fieldset>
		     	  
		          <input type="hidden" id="" name="id_pesquisa_trafegos" value="<?php echo $id_pesquisa_trafegos; ?>" >
		          <?php 
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Sentido</label>';
			          echo '<div class="controls">';			          
			          	echo form_dropdown('id_sentido', $options_sentido, $contagem[0]['id_sentido'], '');
			          	echo '&nbsp&nbsp&nbsp';
			          	echo '<a class="btn btn-success"
	          			onclick="return popitup(\''.site_url("admin").'/sentidos/pop_sentido/'.$id_pesquisa_trafegos.'\')">
	          					Adicionar / Editar
	          				  </a>';
			          echo '</div>';
		          echo '</div>';
		          
		          ?>
		          
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data</label>
		            <div class="controls">
		              <input type="date" id="" name="data" value="<?php echo  $contagem[0]['data']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Hora</label>
		            <div class="controls">
		              <input type="time" id="" name="hora" value="<?php echo  $contagem[0]['hora']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
			          
		         
	          		foreach($veiculos_list as $item){
	          			echo '<div class="control-group">';
							echo '<label for="inputError" class="control-label">'.$item['classeVeiculo'].'</label>';
							echo '<div class="controls">';
								echo form_input($item['id'], $item['quantidade'] ? $item['quantidade'] : 0 , 'class="span1"');
							echo '</div>';
						echo '</div>';
	          			
	          		}
		          		
		          ?>
		          
		          
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        
	      </div>
	      
<script language="javascript" type="text/javascript">

		          function popitup(url) {
	newwindow=window.open(url,'name','height=460,width=680');
	if (window.focus) {newwindow.focus()}
	return false;
}


</script>	      