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
	          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/origens_destinos_list/'.$id_pesquisa_trafegos; ?>">
	            <?php echo 'Origem Destino';?>
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
	          Adicionar Origem Destino
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
			  
		      $options_veiculo = array();
		      foreach ($veiculos_list as $row)
		      {
		      	$options_veiculo[$row["id"]] = $row["classeVeiculo"];
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
		      
		      echo form_open("admin/pesquisa_trafegos/origens_destinos_add/".$id_pesquisa_trafegos, $attributes);
		     ?>
		     <fieldset>
		     	  <input type="hidden" id="" name="id_pesquisa" value="<?php echo $id_pesquisa_trafegos; ?>" >
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
		          
		          <?php
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Veiculo</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('id_veiculo', $options_veiculo, set_value('id_veiculo'), '');
			          echo '</div>';
		          echo '</div>';
		          ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Placa</label>
		            <div class="controls">
		              <input type="text" id="" name="placa" value="<?php echo set_value('placa'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data</label>
		            <div class="controls">
		              <input type="date" id="" name="data" value="<?php echo set_value('data'); ?>" >
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
		          <div class="control-group">
		            <label for="inputError" class="control-label">Origem País</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_pais" value="<?php echo set_value('origem_pais'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem UF</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_uf" value="<?php echo set_value('origem_uf'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem Municipio</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_municipio" value="<?php echo set_value('origem_municipio'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GeoCod Origem</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_geocod" value="<?php echo set_value('origem_geocod'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino País</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_pais" value="<?php echo set_value('destino_pais'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino UF</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_uf" value="<?php echo set_value('destino_uf'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino Municipio</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_municipio" value="<?php echo set_value('destino_municipio'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GeoCod Destino</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_geocod" value="<?php echo set_value('destino_geocod'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Combustível</label>
		            <div class="controls">
		              <input type="text" id="" name="combustivel" value="<?php echo set_value('combustivel'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Categoria</label>
		            <div class="controls">
		              <input type="text" id="" name="categoria" value="<?php echo set_value('categoria'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Numero de Pessoas</label>
		            <div class="controls">
		              <input type="text" id="" name="num_pessoas" value="<?php echo set_value('num_pessoas'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Renda Média</label>
		            <div class="controls">
		              <input type="text" id="" name="renda_media" value="<?php echo set_value('renda_media'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Motivo</label>
		            <div class="controls">
		              <input type="text" id="" name="motivo" value="<?php echo set_value('motivo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Frequencia</label>
		            <div class="controls">
		              <input type="text" id="" name="frequencia" value="<?php echo set_value('frequencia'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		          	$perg = 'Veiculo;Placa;Data(DD/MM/AAA);Hora(HH:MM);Origem Pais;Origem UF;Origem Municipio;GeoCod Origem;Destino Pais;Destino UF;Destino Municipio;GeoCod Destino;Combustivel;Categoria;Numero de Pessoas;Renda Media;Motivo;Frequencia;';
		          	foreach($perguntas_adicionais as $item) {
						$perg .= $item['titulo'].';';
					?>
		          		<div class="control-group">
							<label for="inputError" class="control-label"><?php echo $item['titulo']?></label>
							<div class="controls">
								<input type="text" id="" name="<?php echo $item['id']?>" value="<?php echo set_value($item['id']); ?>" >
								<!--<span class="help-inline">Woohoo!</span>-->
							</div>
						</div>
				<?php 			
		          	}		          ?>
		          
		   </div>
		   <div id="file">
		    	<div class="control-group">
		    		<label for="file">Data:</label>
		    		<input type="file" name="file" class="btn-primary"  />
		    		
		    	</div>
		    	<p>
		    		O arquivo deve conter "apenas dados" separados por ";"(ponto e virgula) no fomato CSV. 
		    		Não faça upload de arquivos maiores que 2mb, separe em arquivos menores e faça upload mais de uma vez.
		    		Acesse o Link abaixo para vizualizar a ordem que os dados devem seguir.
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