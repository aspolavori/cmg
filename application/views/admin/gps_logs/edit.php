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
	          <a href="#">Update</a>
	        </li>
	      </ul>
	      <div class="page-header">
	        <h2>
	          Updating <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div>
	     <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> gps_log updated with success.';
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
    
		      echo form_open("admin/gps_logs/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="ID_TRECHO" value="<?php echo $gps_log[0]['ID_TRECHO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Velocidade</label>
		            <div class="controls">
		              <input type="text" id="" name="VELOCIDADE" value="<?php echo $gps_log[0]['VELOCIDADE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Velocidade</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_VELOCIDADE" value="<?php echo $gps_log[0]['GPS_VELOCIDADE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Hodometro</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_HODOMETRO" value="<?php echo $gps_log[0]['GPS_HODOMETRO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Latitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_LATITUDE" value="<?php echo $gps_log[0]['GPS_LATITUDE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Longitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_LONGITUDE" value="<?php echo $gps_log[0]['GPS_LONGITUDE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Altitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_ALTITUDE" value="<?php echo $gps_log[0]['GPS_ALTITUDE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Erro</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_ERRO" value="<?php echo $gps_log[0]['GPS_ERRO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Qnt. Satelites</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_QTDE_SATELITES" value="<?php echo $gps_log[0]['GPS_QTDE_SATELITES']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS X</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_X" value="<?php echo $gps_log[0]['GPS_X']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Y</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_Y" value="<?php echo $gps_log[0]['GPS_Y']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Azimute</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_AZIMUTE" value="<?php echo $gps_log[0]['GPS_AZIMUTE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS_NMEA_GPRMC </label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_NMEA_GPRMC" value="<?php echo $gps_log[0]['GPS_NMEA_GPRMC']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS_NMEA_GPGGA</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_NMEA_GPGGA" value="<?php echo $gps_log[0]['GPS_NMEA_GPGGA']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Log Original</label>
		            <div class="controls">
		              <input type="text" id="" name="ID_LOG_ORIGINAL" value="<?php echo $gps_log[0]['ID_LOG_ORIGINAL']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Save changes</button>
	            <button class="btn" type="reset">Cancel</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>