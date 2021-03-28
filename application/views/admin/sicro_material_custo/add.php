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
	          <a href="<?php echo site_url("admin").'/sicro_material_custo/lista_material/'.$id_sicro; ?>">
	            Materiais
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	        <a id="1"  name="file" onclick="changeClass(1);" class="btn" >Formulário</a>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adicionar Material
	        </h2>
	      </div> 
	      <?php
	      //flash menssage
	      $span = false;
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
	      if(isset($flash_message_not_exist)){
	      	echo '<div class="alert alert-error">';
	      	echo '<a class="close" data-dismiss="alert">×</a>';
	      	echo 'O registro de material <strong>'.$flash_message_not_exist.'</strong> não existe no cadastro de materiais. Cadastro-o primeiro e tente o upload novamente.';
	      	echo '</div>';
	      }
		      ?> 
		    <?php
		      //form data
		      $attributes = array("class" => "form-horizontal", "id" => "", "enctype" => "multipart/form-data");
		      
		      $options_materiais = array();
		      foreach ($materiais as $row)
		      {
		      	$options_materiais[$row["id"]] = $row["codigo"].' - '.$row["titulo"].' ('.$row["unidade"].')';
		      }
		      
				
			 //form validation
		      if(validation_errors()){
		      	echo validation_errors();
		      	$span = true;	
		      }
		      
		      echo form_open("admin/sicro_material_custo/add/".$id_sicro, $attributes);
		     ?>
		     <fieldset>
		     <div id="formulario" style="display: none;" >
		     	  <input type="hidden" id="" name="id_sicro" value="<?php echo $id_sicro; ?>" >
		     	<?php
		         echo '<div class="control-group">';
		          echo '<label for="inputError" class="control-label">Material</label>';
		          echo '<div class="controls">';
		          	if( isset($id_material)){
		          		echo form_dropdown('id_material', $options_materiais, $id_material, 'style="width: 390px;"');
		          	}else{
		          		echo form_dropdown('id_material', $options_materiais, set_value('id_material'), 'style="width: 390px;"');
		          	}			          
		          echo '</div>';
	          	 echo '</div>';
	          	 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Custo Unitário (R$)</label>
		            <div class="controls">
		              <input type="text" id="" name="custo_unitario" style="width: 380px;" value="<?php echo set_value('custo_unitario'); ?>" >
		              <?php
		              	if($span){
		              		echo '<span style="color:red" class="help-inline">O separador da casa decimal é "."(ponto).</span>';	
		              	} 
		              ?>
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" style="width: 380px;" value="<?php echo set_value('observacao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		      </div>
		      <div id="file">
		    	<div class="control-group">
		    		<label for="file">Data:</label>
		    		<input type="file" name="file" class="btn-primary"  />
		    		
		    	</div>
		    	<p>
		    		O arquivo deve conter o conteúdo copiado do arquivo de valores do SICRO.<br><br>.
		    	</p>
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