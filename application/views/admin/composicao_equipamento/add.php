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
	          <a href="<?php echo site_url("admin").'/composicao_equipamento/lista_equipamento/'.$id_composicao; ?>">
	            Equipamentos
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>       
	      <div class="page-header">
	        <h2>
	          Adicionar <?php echo ucfirst('Equipamento');?>
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      $span = false;
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new composicao_equipamento created with success.';
	          echo '</div>';       
	        }else{
			  $span = false;
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
			  
			  echo '<div class="control-group">';
		          echo '<label for="inputError" class="control-label">Camada</label>';
		          echo '<div class="controls">';			          
		          	echo form_dropdown('id_', $options_, set_value('id_'), 'class="span2"');			          
		          echo '</div>';
	          echo '</div>';	
				
			  */
				
 			  //form validation
		      if(validation_errors()){
		      	echo validation_errors();
		      	$span = true;	
		      }
		      
		      echo form_open("admin/composicao_equipamento/add/".$id_composicao, $attributes);
		     ?>
		     <fieldset>
		          <input type="hidden" id="" name="id_composicao" value="<?php echo $id_composicao; ?>" >
		          <?php
		         echo '<div class="control-group">';
		          echo '<label for="inputError" class="control-label">Equipamento</label>';
		          echo '<div class="controls">';			          
		          	echo form_dropdown('id_equipamento', $options_equipamentos, set_value('id_equipamento'), 'style="width: 390px;"');			          
		          echo '</div>';
	          	 echo '</div>';
	          	 ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Quantidade</label>
		            <div class="controls">
		              <input type="text" id="" name="quantidade" value="<?php echo set_value('quantidade'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Utilização Operativo</label>
		            <div class="controls">
		              <input type="text" id="utilizacao_operativo" name="utilizacao_operativo" value="<?php echo set_value('utilizacao_operativo'); ?>" >
		              <?php
		              	if($span){
		              		echo '<span style="color:red"  class="help-inline">O separador da casa decimal é "."(ponto).</span>';	
		              	} 
		              ?>
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Utilização Improdutivo</label>
		            <div class="controls">
		              <input type="text" id="utilizacao_improdutivo" name="utilizacao_improdutivo" value="<?php echo set_value('utilizacao_improdutivo'); ?>" onfocus="completaValor()" >
		              <?php
		              	if($span){
		              		echo '<span style="color:red"  class="help-inline">O separador da casa decimal é "."(ponto).</span>';	
		              	} 
		              ?>
		            </div>
		          </div>
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
	
	      <?php echo form_close(); ?>       
	      </div>
<script>

function completaValor(){
	var value = $("#utilizacao_operativo").val();
	value = 1 - value;
	$("#utilizacao_improdutivo").val(Math.round(value * 100) / 100);
	
}
		              
</script>	      
	      
	      
	      