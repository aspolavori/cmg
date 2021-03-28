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
	        <a id="1"  name="local" onclick="changeClass(1);" class="btn btn-primary" >local</a>
	        <a id="2"  name="glanulometrica" onclick="changeClass(2);" class="btn">glanulometrica</a>
	        <a id="3"  name="sedimentacao" onclick="changeClass(3);" class="btn">sedimentacao</a>
	        <a id="4"  name="fisico" onclick="changeClass(4);" class="btn btn-primary">fisico</a>
	        <a id="5"  name="classificacao" onclick="changeClass(5);" class="btn">classificacao</a>
	        <a id="6"  name="compactacao" onclick="changeClass(6);" class="btn btn-primary">compactacao</a>
	        <a id="7"  name="in_situ" onclick="changeClass(7);" class="btn">in situ</a>
	        <a id="8"  name="equivalente" onclick="changeClass(8);" class="btn">equivalente</a>
	        <a id="9"  name="nivel_agua" onclick="changeClass(9);" class="btn">nivel_agua</a>
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
	            echo '<strong>Well done!</strong> resumo_sondagem updated with success.';
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
    		  <?php 
				     echo 
				     	  '<div class="control-group">
				            <label for="inputError" class="control-label">Classe </label>
				            <div class="controls">';
				              
		    		 echo form_dropdown('id_', $options_, resumo_sondagens[0]['id_'] );	
				     echo          
				            '</div>
				          </div>';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/resumo_sondagens/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>
		     	  <input type="hidden" id="" name="id_sondagem" value="<?php echo $resumo_sondagem[0]['id_sondagem']; ?>" >
		     	 <div id="local" >
		         <h2>LOCAL DE SONDAGEM</h2>
		     	  <div class="control-group">
		            <label for="inputError" class="control-label">Titulo</label>
		            <div class="controls">
		              <input type="text" id="" name="titulo" value="<?php echo $resumo_sondagem[0]['titulo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">UF</label>
		            <div class="controls">
		              <input type="text" id="" name="uf" value="<?php echo $resumo_sondagem[0]['uf']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Rodovia</label>
		            <div class="controls">
		              <input type="text" id="" name="rodovia" value="<?php echo $resumo_sondagem[0]['rodovia']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Furo</label>
		            <div class="controls">
		              <input type="text" id="" name="furo" value="<?php echo $resumo_sondagem[0]['furo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Lado</label>
		            <div class="controls">
		              <input type="text" id="" name="lado" value="<?php echo $resumo_sondagem[0]['lado']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Latitude</label>
		            <div class="controls">
		              <input type="text" id="" name="lat" value="<?php echo $resumo_sondagem[0]['lat']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Logitude</label>
		            <div class="controls">
		              <input type="text" id="" name="long" value="<?php echo $resumo_sondagem[0]['long']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div> 
		          
		         <div id="glanulometrica" style="display: none;" > 
		         <h2>ANÁLISE GRANULOMÉTRICA</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">mm</label>
		            <div class="controls">
		              <input type="text" id="" name="mm" value="<?php echo $resumo_sondagem[0]['mm']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">50_8</label>
		            <div class="controls">
		              <input type="text" id="" name="50_8" value="<?php echo $resumo_sondagem[0]['50_8']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">38_1</label>
		            <div class="controls">
		              <input type="text" id="" name="38_1" value="<?php echo $resumo_sondagem[0]['38_1']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">25_4</label>
		            <div class="controls">
		              <input type="text" id="" name="25_4" value="<?php echo $resumo_sondagem[0]['25_4']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">19_1</label>
		            <div class="controls">
		              <input type="text" id="" name="19_1" value="<?php echo $resumo_sondagem[0]['19_1']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">9_5</label>
		            <div class="controls">
		              <input type="text" id="" name="9_5" value="<?php echo $resumo_sondagem[0]['9_5']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">4_8</label>
		            <div class="controls">
		              <input type="text" id="" name="4_8" value="<?php echo $resumo_sondagem[0]['4_8']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">2</label>
		            <div class="controls">
		              <input type="text" id="" name="2" value="<?php echo $resumo_sondagem[0]['2']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">1_2</label>
		            <div class="controls">
		              <input type="text" id="" name="1_2" value="<?php echo $resumo_sondagem[0]['1_2']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">0_59</label>
		            <div class="controls">
		              <input type="text" id="" name="0_59" value="<?php echo $resumo_sondagem[0]['0_59']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">0_42</label>
		            <div class="controls">
		              <input type="text" id="" name="0_42" value="<?php echo $resumo_sondagem[0]['0_42']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">0_30</label>
		            <div class="controls">
		              <input type="text" id="" name="0_30" value="<?php echo $resumo_sondagem[0]['0_30']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">0_15</label>
		            <div class="controls">
		              <input type="text" id="" name="0_15" value="<?php echo $resumo_sondagem[0]['0_15']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">0_074</label>
		            <div class="controls">
		              <input type="text" id="" name="0_074" value="<?php echo $resumo_sondagem[0]['0_074']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		          
		         <div id="sedimentacao" style="display: none;">
		         <h2>SEDIMENTAÇÃO</h2> 
		          <div class="control-group">
		            <label for="inputError" class="control-label">% de Silte</label>
		            <div class="controls">
		              <input type="text" id="" name="silte" value="<?php echo $resumo_sondagem[0]['silte']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">% de Argila</label>
		            <div class="controls">
		              <input type="text" id="" name="argila" value="<?php echo $resumo_sondagem[0]['argila']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Tipo de Solo</label>
		            <div class="controls">
		              <input type="text" id="" name="solo" value="<?php echo $resumo_sondagem[0]['solo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div> 
		         
		         <div id="fisico" style="display: none;"> 
		         <h2>IND. FÍSICO</h2> 
		          <div class="control-group">
		            <label for="inputError" class="control-label">LL(%)</label>
		            <div class="controls">
		              <input type="text" id="" name="ll" value="<?php echo $resumo_sondagem[0]['ll']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">LP(%)</label>
		            <div class="controls">
		              <input type="text" id="" name="lp" value="<?php echo $resumo_sondagem[0]['lp']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">IP(%)</label>
		            <div class="controls">
		              <input type="text" id="" name="ip" value="<?php echo $resumo_sondagem[0]['ip']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		         
		         <div id="classificacao" style="display: none;">
		         <h2>CLASSIFICAÇÃO</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">IG</label>
		            <div class="controls">
		              <input type="text" id="" name="ig" value="<?php echo $resumo_sondagem[0]['ig']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">HRB</label>
		            <div class="controls">
		              <input type="text" id="" name="hrb" value="<?php echo $resumo_sondagem[0]['hrb']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		         
		         
		         <div id="compactacao" style="display: none;">
		         <h2>COMPACTAÇÃO</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Dmáx (g/cm2)</label>
		            <div class="controls">
		              <input type="text" id="" name="dmax" value="<?php echo $resumo_sondagem[0]['dmax']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Wot(%)</label>
		            <div class="controls">
		              <input type="text" id="" name="wot" value="<?php echo $resumo_sondagem[0]['wot']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">EXP(%)</label>
		            <div class="controls">
		              <input type="text" id="" name="exp" value="<?php echo $resumo_sondagem[0]['exp']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Energia (N. golpes)</label>
		            <div class="controls">
		              <input type="text" id="" name="eng" value="<?php echo $resumo_sondagem[0]['eng']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">ISC(%)</label>
		            <div class="controls">
		              <input type="text" id="" name="isc" value="<?php echo $resumo_sondagem[0]['isc']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		          
		         <div id="in_situ" style="display: none;">
		         <h2>IN SITU</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Densidade Natural</label>
		            <div class="controls">
		              <input type="text" id="" name="densidade_natural" value="<?php echo $resumo_sondagem[0]['densidade_natural']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div><div class="control-group">
		            <label for="inputError" class="control-label">Wcampo</label>
		            <div class="controls">
		              <input type="text" id="" name="wcampo" value="<?php echo $resumo_sondagem[0]['wcampo']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		          
		         <div id="equivalente" style="display: none;">
		         <h2>EQUIVALENTE</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Areia</label>
		            <div class="controls">
		              <input type="text" id="" name="areia" value="<?php echo $resumo_sondagem[0]['areia']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		          
		         <div id="nivel_agua" style="display: none;">
		         <h2>NÍVEL D'ÁGUA</h2> 
		          <div class="control-group">
		            <label for="inputError" class="control-label">Nível de Água (m)</label>
		            <div class="controls">
		              <input type="text" id="" name="nivel_agua" value="<?php echo $resumo_sondagem[0]['nivel_agua']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		         <?php
		         /*  
		         <div id="triaxial" style="display: none;">
		         <h2>ENSAIO TRIAXIAL</h2>
		          <div class="control-group">
		            <label for="inputError" class="control-label">Ensaio Triaxial</label>
		            <div class="controls">
		              <input type="text" id="" name="ensaio_triaxial" value="<?php echo $resumo_sondagem[0]['ensaio_triaxial']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>
		         </div>
		         */
		         ?>
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>        
	     </div>
	     
<script>

function changeClass( id ){
	$("#"+id).toggleClass( "btn-primary" );
	name = $("#"+id).attr("name");
	$("#"+name).toggle();
	
	
}
		     
</script>		     