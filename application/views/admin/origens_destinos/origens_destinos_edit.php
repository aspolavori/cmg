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
	         Update
	        </li>
	      </ul>	      
	      <div class="page-header">
	        <h2>
	          Atualizar Origem Destino
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> origem_destino updated with success.';
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
    		  <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Classe </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_', $options_, origens_destinos[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		       echo form_open("admin/pesquisa_trafegos/origens_destinos_update/".$id_pesquisa_trafegos.'/'.$origem_destino[0]['id'] , $attributes);
		     ?>
		     <fieldset>
		     		<input type="hidden" id="" name="id_pesquisa_trafegos" value="<?php echo $id_pesquisa_trafegos; ?>" >
		          <?php 
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Sentido</label>';
			          echo '<div class="controls">';			          
			          	echo form_dropdown('id_sentido', $options_sentido, $origem_destino[0]['id_sentido'], '');
			          	echo '&nbsp&nbsp&nbsp';
			          	echo '<a class="btn btn-success"
	          			onclick="return popitup(\''.site_url("admin").'/sentidos/pop_sentido/'.$id_pesquisa_trafegos.'\')">
	          					Adicionar / Editar
	          				  </a>';
			          echo '</div>';
		          echo '</div>';
		          echo '<div class="control-group">';
			          echo '<label for="inputError" class="control-label">Veiculo</label>';
			          echo '<div class="controls">';
			         	 echo form_dropdown('id_veiculo', $options_veiculo, $origem_destino[0]['id_veiculo'], '');
			          echo '</div>';
		          echo '</div>';
		          ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Placa</label>
		            <div class="controls">
		              <input type="text" id="" name="placa" value="<?php echo $origem_destino[0]['placa']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data</label>
		            <div class="controls">
		              <input type="text" id="" name="data" value="<?php echo $origem_destino[0]['data']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Hora</label>
		            <div class="controls">
		              <input type="text" id="" name="hora" value="<?php echo $origem_destino[0]['hora']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem País</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_pais" value="<?php echo $origem_destino[0]['origem_pais']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem UF</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_uf" value="<?php echo $origem_destino[0]['origem_uf']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Origem Municipio</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_municipio" value="<?php echo $origem_destino[0]['origem_municipio']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GeoCod Origem</label>
		            <div class="controls">
		              <input type="text" id="" name="origem_geocod" value="<?php echo $origem_destino[0]['origem_geocod']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino País</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_pais" value="<?php echo $origem_destino[0]['destino_pais']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino UF</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_uf" value="<?php echo $origem_destino[0]['destino_uf']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Destino Municipio</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_municipio" value="<?php echo $origem_destino[0]['destino_municipio']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GeoCod Destino</label>
		            <div class="controls">
		              <input type="text" id="" name="destino_geocod" value="<?php echo $origem_destino[0]['destino_geocod']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Combustível</label>
		            <div class="controls">
		              <input type="text" id="" name="combustivel" value="<?php echo $origem_destino[0]['combustivel']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Categoria</label>
		            <div class="controls">
		              <input type="text" id="" name="categoria" value="<?php echo $origem_destino[0]['categoria']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Numero de Pessoas</label>
		            <div class="controls">
		              <input type="text" id="" name="num_pessoas" value="<?php echo $origem_destino[0]['num_pessoas']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Renda Média</label>
		            <div class="controls">
		              <input type="text" id="" name="renda_media" value="<?php echo $origem_destino[0]['renda_media']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Motivo</label>
		            <div class="controls">
		              <input type="text" id="" name="motivo" value="<?php echo $origem_destino[0]['motivo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Frequencia</label>
		            <div class="controls">
		              <input type="text" id="" name="frequencia" value="<?php echo $origem_destino[0]['frequencia']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		         // print_r($perguntas_adicionais);
		          //die;
		          	foreach($perguntas_adicionais as $item){
		          		?>
		          		
		          		 <div class="control-group">
				            <label for="inputError" class="control-label"><?php echo $item['titulo'] ?></label>
				            <div class="controls">
				              <input type="text" id="" name="<?php echo $item['id'] ?>" value="<?php echo $item['resposta']; ?>" >
				              <!--<span class="help-inline">Woohoo!</span>-->
				            </div>
				          </div>
		          		
		          		<?php 
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