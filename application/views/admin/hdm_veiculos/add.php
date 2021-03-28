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
	            <?php echo ucfirst('HDM Veículos');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adicionar <?php echo ucfirst('HDM Veículos');?>
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new hdm_veiculos created with success.';
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
		    
		      $ftGas = $fatoresConversao[0]['FEUC_GAS'] ;
		      $ftOil = $fatoresConversao[0]['FEUC_OLEO'];
		    
		      $options_hdm_veiculos = array();
		      foreach ($hdm_veiculos_options as $row)
		      {
		      	$options_hdm_veiculos[$row["id"]] = $row["data_base"];
		      }
		    
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
		      
		      echo form_open("admin/hdm_veiculos/add", $attributes);
		     ?>
		     <fieldset>
		     <input type="hidden" id="gasolina_fator_conversao" name="gasolina_fator_conversao" value="<?php echo $ftGas ; ?>"  >
		     <input type="hidden" id="oleo_fator_conversao" name="oleo_fator_conversao" value="<?php echo $ftOil; ?>"  >
		     <?php
				     echo '<div class="control-group">';
				     echo '<label for="inputError" class="control-label">Data para Referência</label>';
				     echo '<div class="controls">';
				     echo form_dropdown('id_hdm_veiculos', $options_hdm_veiculos, set_value('id_hdm_veiculos'), 'class=""');
				     echo '</div>';
				     echo '</div>';
		     ?>
		     	  <div class="control-group">
		            <label for="inputError" class="control-label">Salário Mínimo Mês Base</label>
		            <div class="controls">
		              <input type="text" id="" name="reajuste_salario" value="<?php echo set_value('reajuste_salario'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Ind. Reajuste</label>
		            <div class="controls">
		              <input type="text" id="" name="ind_reajuste" value="<?php echo set_value('ind_reajuste'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Ind. Variação IGPM</label>
		            <div class="controls">
		              <input type="text" id="" name="ind_var_igpm" value="<?php echo set_value('ind_var_igpm'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Valor Gasolina</label>
		            <div class="controls">
		              <input type="text" id="valor_gasolina" name="valor_gasolina" value="<?php echo set_value('valor_gasolina'); ?>" >
		              <span class="help-inline">Fator de Conversão para Econômico <?php echo $ftGas ; ?></span>
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Valor Ec. Gasolina</label>
		            <div class="controls">
		              <input type="text" id="valor_gas_e" name="valor_gas_e" value="<?php echo set_value('valor_gas_e'); ?>" readonly onfocus="calcGas();" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>		          
		          <div class="control-group">
		            <label for="inputError" class="control-label">Valor Oleo</label>
		            <div class="controls">
		              <input type="text" id="valor_oleo" name="valor_oleo" value="<?php echo set_value('valor_oleo'); ?>" >
		              <span class="help-inline">Fator de Conversão para Econômico <?php echo $ftOil ; ?></span>
		            </div>
		          </div>		              
		          <div class="control-group">
		            <label for="inputError" class="control-label">Valor E. Oleo</label>
		            <div class="controls">
		              <input type="text" id="valor_oleo_e" name="valor_oleo_e" value="<?php echo set_value('valor_oleo_e'); ?>" readonly onfocus="calcOil();"  >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Data Base</label>
		            <div class="controls">
		              <input type="date" id="" name="data_base" value="<?php echo set_value('data_base'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Variação Valor Veículo</label>
		            <div class="controls">
		              <input type="text" id="" name="var_veiculo" value="1" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		          <?php
		          	foreach($veiculos as $item){

		          		echo '<div class="control-group">';
		          		$style = '';
		          		$input2 = '';
		          		/*
		          		if($item['id'] == 9){
		          			$style = 'color:red;';
		          			$input2 = '<input type="text" id="'.$item['id'].'_1" name="" value="'.$item['FUC_VEH'].'" >';
		          		}
		          		*/
						echo '<label for="inputError" style="'.$style.'" class="control-label">'.$item['VEH_NAME'].'</label>';
						echo '<div class="controls">';
						echo '<input type="text" id="'.$item['id'].'" name="'.$item['id'].'" value="'.round($item['FUC_VEH'], 2).'" >';
						echo $input2;
						echo '<span class="help-inline">'.$item['INFO'].'</span>';
						echo '</div>';
						echo '</div>';
		          	}
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
	
	      <?php echo form_close(); ?>        
	     </div>
<script>

$(function(){
	
	 $('select[name=id_hdm_veiculos]').change(function(){
	  var self = $(this),
	   id   = self.val();
	  $('input[name=var_veiculo]').val(1);	
	  $.getJSON( "<?php echo base_url().'hdm_veiculos/get_veiculos_by_hd_data_base_json/' ?>" + id , function( data ) {
		  for (var i = data.length - 1; i >= 0; i--) {
			  $('input[name='+data[i]['id']+']').val(data[i]['FUC_VEH']); 
		     };
		});
	 });
	 
	 $('input[name=var_veiculo]').change(function(){
		  var self = $(this),
		   var_veiculo = self.val(), 
		   id   = $('select[name=id_hdm_veiculos]').val();
		  	
		  $.getJSON( "<?php echo base_url().'hdm_veiculos/get_veiculos_by_hd_data_base_json/' ?>" + id , function( data ) {
			  for (var i = data.length - 1; i >= 0; i--) {
				  $('input[name='+data[i]['id']+']').val(Math.round(data[i]['FUC_VEH'] * var_veiculo * 100) / 100 ); 
			     };
			});
		 });	
});

		          
function calcGas(){
	var value = $("#valor_gasolina").val();
	var fator = $("#gasolina_fator_conversao").val();	
	$("#valor_gas_e").val(Math.round(value * fator * 100) / 100);
}

function calcOil(){
	var value = $("#valor_oleo").val();
	var fator = $("#oleo_fator_conversao").val();
	$("#valor_oleo_e").val(Math.round(value * fator * 100) / 100);
}
		              
</script>	 	     