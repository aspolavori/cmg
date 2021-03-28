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
	          <a href="#">New</a>
	        </li>
	      </ul>      
	      <div class="page-header">
	        <h2>
	          Adding <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div> 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new inclinacao_log created with success.';
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
		
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/inclinacao_logs/add", $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="ID_TRECHO" value="<?php echo set_value('ID_TRECHO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Hodometro trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="HODOMETRO_TRECHO" value="<?php echo set_value('HODOMETRO_TRECHO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Velocidade</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_VELOCIDADE" value="<?php echo set_value('GPS_VELOCIDADE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Hodometro</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_HODOMETRO" value="<?php echo set_value('GPS_HODOMETRO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Latitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_LATITUDE" value="<?php echo set_value('GPS_LATITUDE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Longitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_LONGITUDE" value="<?php echo set_value('GPS_LONGITUDE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Altitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_ALTITUDE" value="<?php echo set_value('GPS_ALTITUDE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Erro</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_ERRO" value="<?php echo set_value('GPS_ERRO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Qnt. Satelites</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_QTDE_SATELITES" value="<?php echo set_value('GPS_QTDE_SATELITES'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS X</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_X" value="<?php echo set_value('GPS_X'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Y</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_Y" value="<?php echo set_value('GPS_Y'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Azimute</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_AZIMUTE" value="<?php echo set_value('GPS_AZIMUTE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS_NMEA_GPRMC </label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_NMEA_GPRMC" value="<?php echo set_value('GPS_NMEA_GPRMC'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS_NMEA_GPGGA</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_NMEA_GPGGA" value="<?php echo set_value('GPS_NMEA_GPGGA'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data Hora</label>
		            <div class="controls">
		              <input type="text" id="" name="DATA_HORA" value="<?php echo set_value('DATA_HORA'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Barometro Pressao</label>
		            <div class="controls">
		              <input type="text" id="" name="BAROMETRO_PRESSAO" value="<?php echo set_value('BAROMETRO_PRESSAO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Barametro Temperatura</label>
		            <div class="controls">
		              <input type="text" id="" name="BAROMETRO_TEMPERATURA" value="<?php echo set_value('BAROMETRO_TEMPERATURA'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Barametro Altitude</label>
		            <div class="controls">
		              <input type="text" id="" name="BAROMETRO_ALTITUDE" value="<?php echo set_value('BAROMETRO_ALTITUDE'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">IRI INTERNO</label>
		            <div class="controls">
		              <input type="text" id="" name="IRI_INTERNO" value="<?php echo set_value('IRI_INTERNO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">IRI EXTERNO</label>
		            <div class="controls">
		              <input type="text" id="" name="IRI_EXTERNO" value="<?php echo set_value('IRI_EXTERNO'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Odometro</label>
		            <div class="controls">
		              <input type="text" id="" name="odometro" value="<?php echo set_value('odometro'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Save changes</button>
	            <button class="btn" type="reset">Cancel</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>        </div>