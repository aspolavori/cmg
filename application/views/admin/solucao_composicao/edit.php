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
	          <a href="<?php echo site_url("admin").'/solucao_composicao/lista_composicao/'.$solucao_composicao[0]['id_solucao']; ?>">
	            Composições
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
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
	            echo '<strong>Well done!</strong> solucao_composicao updated with success.';
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
		      
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/solucao_composicao/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	<input type="hidden" id="" name="id_solucao" value="<?php echo  $solucao_composicao[0]['id_solucao'] ?>" >
		          <?php 
		             echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Composição </label>
				            <div class="controls">';
				     
				     echo form_dropdown('id_composicao', $options_composicoes, $solucao_composicao[0]['id_composicao'] );
				     echo
				     '</div>
				          </div>';

				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Largura Pista </label>
				            <div class="controls">';
				     
				     echo form_dropdown('pista', $options_variaveis, $solucao_composicao[0]['pista'] );
				     echo
				     '</div>
				          </div>';
				     
				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Acostamento1</label>
				            <div class="controls">';
				      
				     echo form_dropdown('acostamento1', $options_variaveis, $solucao_composicao[0]['acostamento1'] );
				     echo
				     '</div>
				          </div>';
				     
				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Acostamento2</label>
				            <div class="controls">';
				      
				     echo form_dropdown('acostamento2', $options_variaveis, $solucao_composicao[0]['acostamento2'] );
				     echo
				     '</div>
				          </div>';
				     
				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Comprimento da Pista</label>
				            <div class="controls">';
				      
				     echo form_dropdown('comprimento_pista', $options_variaveis, $solucao_composicao[0]['comprimento_pista'] );
				     echo
				     '</div>
				          </div>';
				     
				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Volume/Quantidade</label>
				            <div class="controls">';
				      
				     echo form_dropdown('volume', $options_variaveis, $solucao_composicao[0]['volume'] );
				     echo
				     '</div>
				          </div>';
				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Peso Especifico/%área</label>
				            <div class="controls">';
				     
				     echo form_dropdown('fator', $options_variaveis, $solucao_composicao[0]['fator'] );
				     echo
				     '</div>
				          </div>';
				     echo
				     '<div class="control-group">
				            <label for="inputError" class="control-label">Restauração</label>
				            <div class="controls">';
				     
				     echo form_dropdown('restauracao_pista_existente', $options_terceira_faixa, $solucao_composicao[0]['restauracao_pista_existente'], 'class=""');
				     echo '<span style="color:RED;" class="help-inline">Em caso específico de composição aplicada à Restauração da Pista Existente</span>';
				     echo
				     '</div>
				          </div>';
				     
				     //
			  		?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Observação</label>
		            <div class="controls">
		              <input type="text" id="" name="observacao" value="<?php echo $solucao_composicao[0]['observacao']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>