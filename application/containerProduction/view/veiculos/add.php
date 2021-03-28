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
	            echo '<strong>Well done!</strong> new veiculos created with success.';
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
		      
		      echo form_open("admin/veiculos/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">VEH_NAME</label>
		            <div class="controls">
		              <input type="text" id="" name="VEH_NAME" value="<?php echo set_value('VEH_NAME'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CATEGORY</label>
		            <div class="controls">
		              <input type="text" id="" name="CATEGORY" value="<?php echo set_value('CATEGORY'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">BASE_TYPE</label>
		            <div class="controls">
		              <input type="text" id="" name="BASE_TYPE" value="<?php echo set_value('BASE_TYPE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CLASS</label>
		            <div class="controls">
		              <input type="text" id="" name="CLASS" value="<?php echo set_value('CLASS'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">INFO</label>
		            <div class="controls">
		              <input type="text" id="" name="LIFE_MODEL" value="<?php echo set_value('LIFE_MODEL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PCSE</label>
		            <div class="controls">
		              <input type="text" id="" name="PCSE" value="<?php echo set_value('PCSE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NUM_WHEELS</label>
		            <div class="controls">
		              <input type="text" id="" name="NUM_WHEELS" value="<?php echo set_value('NUM_WHEELS'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NUM_AXLES</label>
		            <div class="controls">
		              <input type="text" id="" name="NUM_AXLES" value="<?php echo set_value('NUM_AXLES'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TYRE_TYPE</label>
		            <div class="controls">
		              <input type="text" id="" name="TYRE_TYPE" value="<?php echo set_value('TYRE_TYPE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TYRE_NR0</label>
		            <div class="controls">
		              <input type="text" id="" name="TYRE_NR0" value="<?php echo set_value('TYRE_NR0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TYRE_RREC</label>
		            <div class="controls">
		              <input type="text" id="" name="TYRE_RREC" value="<?php echo set_value('TYRE_RREC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">AKM0</label>
		            <div class="controls">
		              <input type="text" id="" name="AKM0" value="<?php echo set_value('AKM0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">HRWK0</label>
		            <div class="controls">
		              <input type="text" id="" name="HRWK0" value="<?php echo set_value('HRWK0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">LIFE0</label>
		            <div class="controls">
		              <input type="text" id="" name="LIFE0" value="<?php echo set_value('LIFE0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PP</label>
		            <div class="controls">
		              <input type="text" id="" name="PP" value="<?php echo set_value('PP'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PAX</label>
		            <div class="controls">
		              <input type="text" id="" name="PAX" value="<?php echo set_value('PAX'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">W</label>
		            <div class="controls">
		              <input type="text" id="" name="W" value="<?php echo set_value('W'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">WEIGHT_OP</label>
		            <div class="controls">
		              <input type="text" id="" name="WEIGHT_OP" value="<?php echo set_value('WEIGHT_OP'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">WGT_UNIT</label>
		            <div class="controls">
		              <input type="text" id="" name="WGT_UNIT" value="<?php echo set_value('WGT_UNIT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">ESAL</label>
		            <div class="controls">
		              <input type="text" id="" name="ESAL" value="<?php echo set_value('ESAL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_FUEL</label>
		            <div class="controls">
		              <input type="text" id="" name="EUC_FUEL" value="<?php echo set_value('EUC_FUEL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_INTRST</label>
		            <div class="controls">
		              <input type="text" id="" name="EUC_INTRST" value="<?php echo set_value('EUC_INTRST'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">FUC_FUEL</label>
		            <div class="controls">
		              <input type="text" id="" name="FUC_FUEL" value="<?php echo set_value('FUC_FUEL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">FUC_INTRST</label>
		            <div class="controls">
		              <input type="text" id="" name="FUC_INTRST" value="<?php echo set_value('FUC_INTRST'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">AF</label>
		            <div class="controls">
		              <input type="text" id="" name="AF" value="<?php echo set_value('AF'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CD</label>
		            <div class="controls">
		              <input type="text" id="" name="CD" value="<?php echo set_value('CD'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CDMULT</label>
		            <div class="controls">
		              <input type="text" id="" name="CDMULT" value="<?php echo set_value('CDMULT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CR_B_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="CR_B_A0" value="<?php echo set_value('CR_B_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CR_B_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="CR_B_A1" value="<?php echo set_value('CR_B_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CR_B_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="CR_B_A2" value="<?php echo set_value('CR_B_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PDRIVE</label>
		            <div class="controls">
		              <input type="text" id="" name="PDRIVE" value="<?php echo set_value('PDRIVE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PDRV_UNITS</label>
		            <div class="controls">
		              <input type="text" id="" name="PDRV_UNITS" value="<?php echo set_value('PDRV_UNITS'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PBRAKE</label>
		            <div class="controls">
		              <input type="text" id="" name="PBRAKE" value="<?php echo set_value('PBRAKE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PBRK_UNITS</label>
		            <div class="controls">
		              <input type="text" id="" name="PBRK_UNITS" value="<?php echo set_value('PBRK_UNITS'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PRAT</label>
		            <div class="controls">
		              <input type="text" id="" name="PRAT" value="<?php echo set_value('PRAT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PRAT_UNITS</label>
		            <div class="controls">
		              <input type="text" id="" name="PRAT_UNITS" value="<?php echo set_value('PRAT_UNITS'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">FPLIM</label>
		            <div class="controls">
		              <input type="text" id="" name="FPLIM" value="<?php echo set_value('FPLIM'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">B_VDES2</label>
		            <div class="controls">
		              <input type="text" id="" name="B_VDES2" value="<?php echo set_value('B_VDES2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">B_VDES_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="B_VDES_A0" value="<?php echo set_value('B_VDES_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">B_VDES_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="B_VDES_A1" value="<?php echo set_value('B_VDES_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">B_VDES_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="B_VDES_A2" value="<?php echo set_value('B_VDES_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">B_VDES_CW1</label>
		            <div class="controls">
		              <input type="text" id="" name="B_VDES_CW1" value="<?php echo set_value('B_VDES_CW1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">B_VDES_CW2</label>
		            <div class="controls">
		              <input type="text" id="" name="B_VDES_CW2" value="<?php echo set_value('B_VDES_CW2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">C_VDES2</label>
		            <div class="controls">
		              <input type="text" id="" name="C_VDES2" value="<?php echo set_value('C_VDES2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">C_VDES_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="C_VDES_A0" value="<?php echo set_value('C_VDES_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">C_VDES_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="C_VDES_A1" value="<?php echo set_value('C_VDES_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">C_VDES_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="C_VDES_A2" value="<?php echo set_value('C_VDES_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">C_VDES_CW1</label>
		            <div class="controls">
		              <input type="text" id="" name="C_VDES_CW1" value="<?php echo set_value('C_VDES_CW1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">C_VDES_CW2</label>
		            <div class="controls">
		              <input type="text" id="" name="C_VDES_CW2" value="<?php echo set_value('C_VDES_CW2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">U_VDES2</label>
		            <div class="controls">
		              <input type="text" id="" name="U_VDES2" value="<?php echo set_value('U_VDES2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">U_VDES_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="U_VDES_A0" value="<?php echo set_value('U_VDES_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">U_VDES_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="U_VDES_A1" value="<?php echo set_value('U_VDES_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">U_VDES_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="U_VDES_A2" value="<?php echo set_value('U_VDES_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">U_VDES_CW1</label>
		            <div class="controls">
		              <input type="text" id="" name="U_VDES_CW1" value="<?php echo set_value('U_VDES_CW1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">U_VDES_CW2</label>
		            <div class="controls">
		              <input type="text" id="" name="U_VDES_CW2" value="<?php echo set_value('U_VDES_CW2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">VCURVE_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="VCURVE_A0" value="<?php echo set_value('VCURVE_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">VCURVE_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="VCURVE_A1" value="<?php echo set_value('VCURVE_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">VROUGH_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="VROUGH_A0" value="<?php echo set_value('VROUGH_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">ARVMAX</label>
		            <div class="controls">
		              <input type="text" id="" name="ARVMAX" value="<?php echo set_value('ARVMAX'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">SPEED_SIG</label>
		            <div class="controls">
		              <input type="text" id="" name="SPEED_SIG" value="<?php echo set_value('SPEED_SIG'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">SPEED_BETA</label>
		            <div class="controls">
		              <input type="text" id="" name="SPEED_BETA" value="<?php echo set_value('SPEED_BETA'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">COV</label>
		            <div class="controls">
		              <input type="text" id="" name="COV" value="<?php echo set_value('COV'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CGR_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="CGR_A0" value="<?php echo set_value('CGR_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CGR_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="CGR_A1" value="<?php echo set_value('CGR_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CGR_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="CGR_A2" value="<?php echo set_value('CGR_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RPM_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="RPM_A0" value="<?php echo set_value('RPM_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RPM_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="RPM_A1" value="<?php echo set_value('RPM_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RPM_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="RPM_A2" value="<?php echo set_value('RPM_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RPM_A3</label>
		            <div class="controls">
		              <input type="text" id="" name="RPM_A3" value="<?php echo set_value('RPM_A3'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RPM_IDLE</label>
		            <div class="controls">
		              <input type="text" id="" name="RPM_IDLE" value="<?php echo set_value('RPM_IDLE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">IDLE_FUEL</label>
		            <div class="controls">
		              <input type="text" id="" name="IDLE_FUEL" value="<?php echo set_value('IDLE_FUEL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">ZETAB</label>
		            <div class="controls">
		              <input type="text" id="" name="ZETAB" value="<?php echo set_value('ZETAB'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EHP</label>
		            <div class="controls">
		              <input type="text" id="" name="EHP" value="<?php echo set_value('EHP'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EDT</label>
		            <div class="controls">
		              <input type="text" id="" name="EDT" value="<?php echo set_value('EDT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PACCS_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="PACCS_A0" value="<?php echo set_value('PACCS_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PCTPENG</label>
		            <div class="controls">
		              <input type="text" id="" name="PCTPENG" value="<?php echo set_value('PCTPENG'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">OILCONT</label>
		            <div class="controls">
		              <input type="text" id="" name="OILCONT" value="<?php echo set_value('OILCONT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">OILOPER</label>
		            <div class="controls">
		              <input type="text" id="" name="OILOPER" value="<?php echo set_value('OILOPER'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">AMAXV</label>
		            <div class="controls">
		              <input type="text" id="" name="AMAXV" value="<?php echo set_value('AMAXV'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">FRIAMAX</label>
		            <div class="controls">
		              <input type="text" id="" name="FRIAMAX" value="<?php echo set_value('FRIAMAX'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NMTAMAX</label>
		            <div class="controls">
		              <input type="text" id="" name="NMTAMAX" value="<?php echo set_value('NMTAMAX'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RIAMAX</label>
		            <div class="controls">
		              <input type="text" id="" name="RIAMAX" value="<?php echo set_value('RIAMAX'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">AMAXRI</label>
		            <div class="controls">
		              <input type="text" id="" name="AMAXRI" value="<?php echo set_value('AMAXRI'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">WHEEL_DIAM</label>
		            <div class="controls">
		              <input type="text" id="" name="WHEEL_DIAM" value="<?php echo set_value('WHEEL_DIAM'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TYRE_C0TC</label>
		            <div class="controls">
		              <input type="text" id="" name="TYRE_C0TC" value="<?php echo set_value('TYRE_C0TC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TYRE_CTCTE</label>
		            <div class="controls">
		              <input type="text" id="" name="TYRE_CTCTE" value="<?php echo set_value('TYRE_CTCTE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TYRE_CTCON</label>
		            <div class="controls">
		              <input type="text" id="" name="TYRE_CTCON" value="<?php echo set_value('TYRE_CTCON'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">TYRE_VOL</label>
		            <div class="controls">
		              <input type="text" id="" name="TYRE_VOL" value="<?php echo set_value('TYRE_VOL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PARTS_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="PARTS_A0" value="<?php echo set_value('PARTS_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PARTS_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="PARTS_A1" value="<?php echo set_value('PARTS_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PARTS_KP</label>
		            <div class="controls">
		              <input type="text" id="" name="PARTS_KP" value="<?php echo set_value('PARTS_KP'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RI_SHAPE</label>
		            <div class="controls">
		              <input type="text" id="" name="RI_SHAPE" value="<?php echo set_value('RI_SHAPE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">RIMIN</label>
		            <div class="controls">
		              <input type="text" id="" name="RIMIN" value="<?php echo set_value('RIMIN'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">CPCON</label>
		            <div class="controls">
		              <input type="text" id="" name="CPCON" value="<?php echo set_value('CPCON'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PARTS_K0PC</label>
		            <div class="controls">
		              <input type="text" id="" name="PARTS_K0PC" value="<?php echo set_value('PARTS_K0PC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">PARTS_K1PC</label>
		            <div class="controls">
		              <input type="text" id="" name="PARTS_K1PC" value="<?php echo set_value('PARTS_K1PC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">LAB_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="LAB_A0" value="<?php echo set_value('LAB_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">LAB_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="LAB_A1" value="<?php echo set_value('LAB_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">LAB_K0LH</label>
		            <div class="controls">
		              <input type="text" id="" name="LAB_K0LH" value="<?php echo set_value('LAB_K0LH'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">LAB_K1LH</label>
		            <div class="controls">
		              <input type="text" id="" name="LAB_K1LH" value="<?php echo set_value('LAB_K1LH'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">OPTLIFE_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="OPTLIFE_A0" value="<?php echo set_value('OPTLIFE_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">OPTLIFE_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="OPTLIFE_A1" value="<?php echo set_value('OPTLIFE_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">OPTLIFE_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="OPTLIFE_A2" value="<?php echo set_value('OPTLIFE_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">OPTLIFE_A3</label>
		            <div class="controls">
		              <input type="text" id="" name="OPTLIFE_A3" value="<?php echo set_value('OPTLIFE_A3'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">OPTLIFE_A4</label>
		            <div class="controls">
		              <input type="text" id="" name="OPTLIFE_A4" value="<?php echo set_value('OPTLIFE_A4'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EM_CATCONVTR</label>
		            <div class="controls">
		              <input type="text" id="" name="EM_CATCONVTR" value="<?php echo set_value('EM_CATCONVTR'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EN_FUELTYP</label>
		            <div class="controls">
		              <input type="text" id="" name="EN_FUELTYP" value="<?php echo set_value('EN_FUELTYP'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EN_PRODVEH</label>
		            <div class="controls">
		              <input type="text" id="" name="EN_PRODVEH" value="<?php echo set_value('EN_PRODVEH'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EN_PCTPART</label>
		            <div class="controls">
		              <input type="text" id="" name="EN_PCTPART" value="<?php echo set_value('EN_PCTPART'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EN_PCTVEH</label>
		            <div class="controls">
		              <input type="text" id="" name="EN_PCTVEH" value="<?php echo set_value('EN_PCTVEH'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EN_TYREWGT</label>
		            <div class="controls">
		              <input type="text" id="" name="EN_TYREWGT" value="<?php echo set_value('EN_TYREWGT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EN_TAREWGT</label>
		            <div class="controls">
		              <input type="text" id="" name="EN_TAREWGT" value="<?php echo set_value('EN_TAREWGT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EN_TAREUNT</label>
		            <div class="controls">
		              <input type="text" id="" name="EN_TAREUNT" value="<?php echo set_value('EN_TAREUNT'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_WHEEL</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_WHEEL" value="<?php echo set_value('NM_WHEEL'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_PAYLOAD</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_PAYLOAD" value="<?php echo set_value('NM_PAYLOAD'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_VDESP</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_VDESP" value="<?php echo set_value('NM_VDESP'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_VDESU</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_VDESU" value="<?php echo set_value('NM_VDESU'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_A_RGH</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_A_RGH" value="<?php echo set_value('NM_A_RGH'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_CRGR</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_CRGR" value="<?php echo set_value('NM_CRGR'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_A_GRD</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_A_GRD" value="<?php echo set_value('NM_A_GRD'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_A_RMC</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_A_RMC" value="<?php echo set_value('NM_A_RMC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_B_RMC</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_B_RMC" value="<?php echo set_value('NM_B_RMC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">NM_KEF</label>
		            <div class="controls">
		              <input type="text" id="" name="NM_KEF" value="<?php echo set_value('NM_KEF'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_PSGR</label>
		            <div class="controls">
		              <input type="text" id="" name="EUC_PSGR" value="<?php echo set_value('EUC_PSGR'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EUC_ENERGY</label>
		            <div class="controls">
		              <input type="text" id="" name="EUC_ENERGY" value="<?php echo set_value('EUC_ENERGY'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">FUC_PSGR</label>
		            <div class="controls">
		              <input type="text" id="" name="FUC_PSGR" value="<?php echo set_value('FUC_PSGR'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">FUC_CARGO</label>
		            <div class="controls">
		              <input type="text" id="" name="FUC_CARGO" value="<?php echo set_value('FUC_CARGO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">FUC_ENERGY</label>
		            <div class="controls">
		              <input type="text" id="" name="FUC_ENERGY" value="<?php echo set_value('FUC_ENERGY'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EMRAT_A0</label>
		            <div class="controls">
		              <input type="text" id="" name="EMRAT_A0" value="<?php echo set_value('EMRAT_A0'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EMRAT_A1</label>
		            <div class="controls">
		              <input type="text" id="" name="EMRAT_A1" value="<?php echo set_value('EMRAT_A1'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EMRAT_A2</label>
		            <div class="controls">
		              <input type="text" id="" name="EMRAT_A2" value="<?php echo set_value('EMRAT_A2'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">KPFAC</label>
		            <div class="controls">
		              <input type="text" id="" name="KPFAC" value="<?php echo set_value('KPFAC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">KPEA</label>
		            <div class="controls">
		              <input type="text" id="" name="KPEA" value="<?php echo set_value('KPEA'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>