    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/solucoes'; ?>">
	            Soluções
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/solucao_composicao/lista_composicao/'.$id_solucao; ?>">
	            Composições
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adicionar Composição
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new solucao_composicao created with success.';
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
			  
		      $options_composicoes = array();
		      $options_composicoes[0] = "Selecione";
		      foreach ($composicoes as $row)
		      {
		      	$options_composicoes[$row["id"]] = $row["titulo"];
		      }
		      
		      
		      $options_variaveis = array();
		      $options_variaveis[0] = "Selecione";
		      foreach ($variaveis as $row)
		      {
		      	$options_variaveis[$row["id"]] = $row["titulo"].' - '.$row["quantidade"].' '.$row["unidade"];
		      }
		      
		      $options_terceira_faixa = array('NAO' => 'NAO', 'SIM' => 'SIM');
		      
			  /*
			  echo '<div class="control-group">';
		          echo '<label for="inputError" class="control-label">Camada</label>';
		          echo '<div class="controls">';			          
		          	echo form_dropdown('pista', $options_variaveis, set_value('pista'), 'class="span2"');			          
		          echo '</div>';
	          echo '</div>';	
				*/	
			  
				
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/solucao_composicao/add/".$id_solucao, $attributes);
		     ?>
		     <fieldset>
		     	 <input type="hidden" id="" name="id_solucao" value="<?php echo $id_solucao; ?>" >
		          <?php
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Composição</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('id_composicao', $options_composicoes, set_value('id_composicao'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Largura Pista</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('pista', $options_variaveis, set_value('pista'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Acostamento1</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('acostamento1', $options_variaveis, set_value('acostamento1'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          
		          echo '<div class="control-group">';
		          echo '<label for="inputError" class="control-label">Acostamento2</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('acostamento2', $options_variaveis, set_value('acostamento2'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Comprimento Pista</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('comprimento_pista', $options_variaveis, set_value('comprimento_pista'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Volume/Quantidade</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('volume', $options_variaveis, set_value('volume'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Peso Especifico/%área</label>';
			          echo '<div class="controls">';
			          	echo form_dropdown('fator', $options_variaveis, set_value('fator'), 'class=""');
			          echo '</div>';
		          echo '</div>';
		          
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Restauração</label>';
			          echo '<div class="controls">';
			          	echo form_dropdown('restauracao_pista_existente', $options_terceira_faixa, set_value('restauracao_pista_existente'), 'class=""');
			          	echo '<span style="color:RED;" class="help-inline">Em caso específico de composição aplicada à Restauração da Pista Existente</span>';
			          echo '</div>';
		          echo '</div>';
		          ?>
		          
		          
		          <div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" value="<?php echo set_value('observacao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>