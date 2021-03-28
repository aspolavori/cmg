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
	         Novo
	        </li>
	        <a id="1"  name="file" onclick="changeClass(1);" class="btn" >Formulário</a>
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
	            echo '<strong>Well done!</strong> new contagem created with success.';
	            if(isset($flash_message_count)){
	            	echo '<br>'.$flash_message_count['inseridos'].' registros inseridos com sucesso.';
	            }
	          echo '</div>';       
	        }else{
	          echo '<div class="alert alert-error">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
	            if(isset($flash_message_file)){
	            	foreach($flash_message_file as $row){
						echo 'Registro: '.$row.' falhou<br>';
					}
					echo '<br>'.$flash_message_count['falha'].' registros nao inseridos.';
	            }
	          echo '</div>';          
	        }
	      
	      }
	      ?> 
		    <?php
		      //form data
		      $attributes = array("class" => "form-horizontal", "id" => "", "enctype" => "multipart/form-data");
		      
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
		      
		      echo form_open("admin/pesquisa_trafegos/contagem_add/".$id_pesquisa_trafegos , $attributes);
		     ?>
		     <fieldset>
		     	  
		          <input type="hidden" id="" name="id_pesquisa_trafegos" value="<?php echo $id_pesquisa_trafegos; ?>" >
		          <?php 
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Sentido</label>';
			          echo '<div class="controls">';			          
			          	echo form_dropdown('id_sentido', $options_sentido, set_value('id_sentido'), '');
			          	echo '&nbsp&nbsp&nbsp';
	          			echo '<a class="btn btn-success" 
	          			onclick="return popitup(\''.site_url("admin").'/sentidos/pop_sentido/'.$id_pesquisa_trafegos.'\')"> 
	          					Adicionar / Editar
	          				  </a>';			          
			          echo '</div>';
		          echo '</div>';
		          ?>
		          
		          
		    <div id="formulario" style="display: none;" >
		    
		      
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data</label>
		            <div class="controls">
		              <input type="date" id="" name="data" 
		              	value="<?php echo set_value('data'); ?>" 
		              	max="<?php echo $date[0]['max'] ?>" min="<?php echo $date[0]['min'] ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Hora</label>
		            <div class="controls">
		              <input type="time" id="" name="hora" value="<?php echo set_value('hora'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		          		$perg = 'Data(DD/MM/AAA);Hora(HH:MM);';
		          		foreach($veiculos_list as $item){
							$perg .= $item['classeVeiculo'].';';
		          			echo '<div class="control-group">';
								echo '<label for="inputError" class="control-label">'.$item['classeVeiculo'].'</label>';
								echo '<div class="controls">';
									echo form_input($item['id'], set_value($item['classeVeiculo']), 'class="span1"');
								echo '</div>';
							echo '</div>';
		          			
		          		} 
		          ?>
		    </div>      
		   	<div id="file">
		    	<div class="control-group">
		    		<label for="file">Data:</label>
		    		<input type="file" name="file" class="btn-primary"  />
		    		
		    	</div>
		    	<p>
		    		O arquivo deve conter "apenas dados" separados por ";"(ponto e virgula) no fomato CSV. 
		    		Não faça upload de arquivos maiores que 2mb, separe em arquivos menores e faça upload mais de uma vez.
		    		Acesse o Link abaixo para vizualizar a ordem que os dados devem seguir.<br><br>
		    		IMPORTANTE! Não tome esse arquivo como padrão ETERNO de inserção de dados de contagem. Como o sistema é configurável, 
		    		antes de realizar uma importação, verifique qual é o atual padrão de inserção.
		    	
		    	</p>
		    	<?php
			    	$fileName = 'formato_para_upload_de_dados.csv';
			    	echo '<a href="'.base_url().'assets/temp/'.$fileName.'" download="'.$fileName.'" >Exemplo de Formato de Arquivo para Download</a>' ;
			    	$fileFullPathName = TMP_FOLDER . $fileName;
			    	file_put_contents($fileFullPathName, $perg );
		    	?>
		    </div>
		          
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

          function changeClass( id ){
                	$("#"+id).toggleClass( "btn-primary" );
                	name = $("#"+id).attr("name");
                	if(name == 'file'){
                		$("#"+name).toggle();
                		$("#formulario").toggle();  	
                  }else{
                  	$("#"+name).toggle();
                		$("#file").toggle();
                  }
                	
                	
          }

</script>