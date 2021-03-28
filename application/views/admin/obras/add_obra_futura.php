    <div class="container top">
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/obras_futuras'; ?>">
	            Obras Futuras
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">New</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adicionando Obra Futura
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new obra created with success.';
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
		      foreach($id_classe_obras as $row) {
		      	$options_classes[$row['id']] = $row['codigo'].' - '.$row['descricao'] ;
		      }
		      
		      $options_tipos = array('' => 'select');
		      foreach($tipos as $row) {
				switch ($row['unidade']){
					case 1:
						$class = 'Características da Rodovia';
						break;
					case 2:
						$class = 'Tipo de Obra';
						break;
					default:
						$class = 'Local da Intervenção';
						break;
				}
		      	$options_tipos[$row['id']] = $row['unidade'].' - '.$class.' - '.$row['descricao'];
		      }
		      /*
		      $lista_tipo = array('' => "Select");
		      foreach ($equipamentos as $row)
		      {
		      	$lista_tipo[$row['id']] = $row['descricao'];
		      }
		      */
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/obras/add_obra_futura", $attributes);
		     ?>
		     <fieldset>
		     <?php 
		     echo 
		     	  '<div class="control-group">
		            <label for="inputError" class="control-label">Classe </label>
		            <div class="controls">';
		              
    		 echo form_dropdown('id_classe_obras', $options_classes, set_value('id_classe_obras') );	
		     echo          
		            '</div>
		          </div>';		     

		     echo '<div class="control-group">';
			     echo '<label for="tipos[]" class="control-label">Tipos</label>';
			     echo '<div class="controls">';
			     	echo form_multiselect('tipos[]', $options_tipos, set_value('tipos'), 'style="width: 800px; height:400px;"');
			     	echo '<span class="help-inline">Segure a tecla Ctrl e selecione as opções clicando com o mouse.</span>';
			     echo '</div>';
		     echo '</div>';
		     
		     ?>
		          <div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <input type="text" id="" name="uf" value="<?php echo set_value('uf'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">BR</label>
		            <div class="controls">
		              <input type="text" id="" name="br" value="<?php echo set_value('br'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data Inicial</label>
		            <div class="controls">
		              <input type="date" id="" name="data_ini" value="<?php echo set_value('data_ini'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data Final</label>
		            <div class="controls">
		              <input type="date" id="" name="data_fim" value="<?php echo set_value('data_fim'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Km Inicial</label>
		            <div class="controls">
		              <input type="text" id="" name="km_ini" value="<?php echo set_value('km_ini'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Km Final</label>
		            <div class="controls">
		              <input type="text" id="" name="km_fim" value="<?php echo set_value('km_fim'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">VMD C/ Projeto</label>
		            <div class="controls">
		              <input type="text" id="" name="vdm_s" value="<?php echo set_value('vdm_s'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">VMD S/ Projeto</label>
		            <div class="controls">
		              <input type="text" id="" name="vdm_c" value="<?php echo set_value('vdm_c'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Ano de Referencia VMD</label>
		            <div class="controls">
		              <input type="text" id="" name="ano_ref_vdm" value="<?php echo set_value('ano_ref_vdm'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Taxa Crescimento</label>
		            <div class="controls">
		              <input type="text" id="" name="taxa_crescimento" value="<?php echo set_value('taxa_crescimento'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Custo</label>
		            <div class="controls">
		              <input type="text" id="" name="custo" value="<?php echo set_value('custo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>		          
		          <div class="control-group">
		            <label for="inputError" class="control-label">Lat/Long Inicial</label>
		            <div class="controls">
		              <input type="text" id="" name="lat_long_ini" value="<?php echo set_value('lat_long_ini'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Lat/Long Final</label>
		            <div class="controls">
		              <input type="text" id="" name="lat_long_fim" value="<?php echo set_value('lat_long_fim'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		           <div class="control-group">
		            <label for="inputError" class="control-label">Descrição da Obra</label>
		            <div class="controls">
		              <input type="text" id="" name="descricao" value="<?php echo set_value('descricao'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Save changes</button>
	            <button class="btn" type="reset">Cancel</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>