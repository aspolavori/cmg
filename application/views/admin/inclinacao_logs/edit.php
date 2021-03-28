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
	            echo '<strong>Well done!</strong> inclinacao_log updated with success.';
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
    
		      echo form_open("admin/inclinacao_logs/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset><div class="control-group">
		            <label for="inputError" class="control-label">trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="ID_TRECHO" value="<?php echo $inclinacao_log[0]['ID_TRECHO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Hodometro trecho</label>
		            <div class="controls">
		              <input type="text" id="" name="HODOMETRO_TRECHO" value="<?php echo $inclinacao_log[0]['HODOMETRO_TRECHO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Velocidade</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_VELOCIDADE" value="<?php echo $inclinacao_log[0]['GPS_VELOCIDADE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Hodometro</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_HODOMETRO" value="<?php echo $inclinacao_log[0]['GPS_HODOMETRO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Latitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_LATITUDE" value="<?php echo $inclinacao_log[0]['GPS_LATITUDE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Longitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_LONGITUDE" value="<?php echo $inclinacao_log[0]['GPS_LONGITUDE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Altitude</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_ALTITUDE" value="<?php echo $inclinacao_log[0]['GPS_ALTITUDE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Erro</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_ERRO" value="<?php echo $inclinacao_log[0]['GPS_ERRO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Qnt. Satelites</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_QTDE_SATELITES" value="<?php echo $inclinacao_log[0]['GPS_QTDE_SATELITES']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS X</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_X" value="<?php echo $inclinacao_log[0]['GPS_X']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Y</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_Y" value="<?php echo $inclinacao_log[0]['GPS_Y']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS Azimute</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_AZIMUTE" value="<?php echo $inclinacao_log[0]['GPS_AZIMUTE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS_NMEA_GPRMC </label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_NMEA_GPRMC" value="<?php echo $inclinacao_log[0]['GPS_NMEA_GPRMC']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">GPS_NMEA_GPGGA</label>
		            <div class="controls">
		              <input type="text" id="" name="GPS_NMEA_GPGGA" value="<?php echo $inclinacao_log[0]['GPS_NMEA_GPGGA']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Data Hora</label>
		            <div class="controls">
		              <input type="text" id="" name="DATA_HORA" value="<?php echo $inclinacao_log[0]['DATA_HORA']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Barometro Pressao</label>
		            <div class="controls">
		              <input type="text" id="" name="BAROMETRO_PRESSAO" value="<?php echo $inclinacao_log[0]['BAROMETRO_PRESSAO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Barametro Temperatura</label>
		            <div class="controls">
		              <input type="text" id="" name="BAROMETRO_TEMPERATURA" value="<?php echo $inclinacao_log[0]['BAROMETRO_TEMPERATURA']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Barametro Altitude</label>
		            <div class="controls">
		              <input type="text" id="" name="BAROMETRO_ALTITUDE" value="<?php echo $inclinacao_log[0]['BAROMETRO_ALTITUDE']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">IRI INTERNO</label>
		            <div class="controls">
		              <input type="text" id="" name="IRI_INTERNO" value="<?php echo $inclinacao_log[0]['IRI_INTERNO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">IRI EXTERNO</label>
		            <div class="controls">
		              <input type="text" id="" name="IRI_EXTERNO" value="<?php echo $inclinacao_log[0]['IRI_EXTERNO']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Odometro</label>
		            <div class="controls">
		              <input type="text" id="" name="odometro" value="<?php echo $inclinacao_log[0]['odometro']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Save changes</button>
	            <button class="btn" type="reset">Cancel</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        </div>