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
	            echo '<strong>Well done!</strong> new caracteristica_volumetrica created with success.';
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
		      
		      echo form_open("admin/caracteristica_volumetrica/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">Título</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo set_value('titulo'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Largura da Pista</label>
		            <div class="controls">
		              <input type="text" id="" name="largura_pista" value="<?php echo set_value('largura_pista'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Largura do Acostamento</label>
		            <div class="controls">
		              <input type="text" id="" name="largura_acostamento" value="<?php echo set_value('largura_acostamento'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Largura do Acostamento 2</label>
		            <div class="controls">
		              <input type="text" id="" name="largura_acostamento2" value="<?php echo set_value('largura_acostamento2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Solo Estab.sem Mistura</label>
		            <div class="controls">
		              <input type="text" id="" name="solo_estab_s_mistura" value="<?php echo set_value('solo_estab_s_mistura'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Estab.Brita40Laterita60</label>
		            <div class="controls">
		              <input type="text" id="" name="estab_brita_40_laterita60" value="<?php echo set_value('estab_brita_40_laterita60'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TSD</label>
		            <div class="controls">
		              <input type="text" id="" name="tsd" value="<?php echo set_value('tsd'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CBUQ Faixa C - espes.</label>
		            <div class="controls">
		              <input type="text" id="" name="cbuq_faixa_c_espes" value="<?php echo set_value('cbuq_faixa_c_espes'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CBUQ Faixa B - espes.</label>
		            <div class="controls">
		              <input type="text" id="" name="cbuq_faixa_b_espes" value="<?php echo set_value('cbuq_faixa_b_espes'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Brita Graduada - BGS</label>
		            <div class="controls">
		              <input type="text" id="" name="brita_graduada_bgs" value="<?php echo set_value('brita_graduada_bgs'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Br.Grad.Tr.Cim. - BGTC</label>
		            <div class="controls">
		              <input type="text" id="" name="brita_graduada_bgtc" value="<?php echo set_value('brita_graduada_bgtc'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Sub-base Estab.s/Mist.</label>
		            <div class="controls">
		              <input type="text" id="" name="sub_base_estab_s_mist" value="<?php echo set_value('sub_base_estab_s_mist'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">AAUQ</label>
		            <div class="controls">
		              <input type="text" id="" name="aauqt" value="<?php echo set_value('aauqt'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">40%Seixo e 60%Laterita</label>
		            <div class="controls">
		              <input type="text" id="" name="40_seixo_60_laterita" value="<?php echo set_value('40_seixo_60_laterita'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
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