    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst($this->uri->segment(2));?>
	        </li>
	      </ul>	      
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           	// TODO: CONSULTAR TODOS OS ACIDENTES DO PERIODO E CALCULAR TAXAS, NO FINAL EXIVIR A LISTA DE ACIDENTES + RELATORIO EM CSV.
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
            
            $km_ini = 	(set_value('km_ini')) ? set_value('km_ini') : 100; 
            $km_fim = 	(set_value('km_fim')) ? set_value('km_fim') : 200;
            $data_ini = (set_value('data_ini')) ? set_value('data_ini') : 2004;
            $data_fim = (set_value('data_fim')) ? set_value('data_fim') : 2015;
            
            $options_uf = array('' => "select");
            foreach($ufs as $row){
            	$options_uf[$row['uf']] = $row['uf']; 
            }
            
            echo validation_errors();
            
            echo form_open("admin/consulta_sondagens", $attributes);
     			
              echo form_label("UF:", "uf");
              echo form_dropdown("uf", $options_uf, '' , 'class="span1"');
              
              echo form_label("BR:", "uf");
              $options_br = array('' => "select");
              echo form_dropdown("br", $options_br, set_value('br'), 'class="span1"');
              
              echo form_label("Km Inicial:", "km_ini");
              echo form_input("km_ini", $km_ini, 'class="span1"');
              
              echo form_label("Km Final:", "km_fim");
              echo form_input("km_fim", $km_fim, 'class="span1"');
              
              echo form_label("Data Inicial:", "data_ini");
              echo form_input("data_ini", $data_ini, 'class="span1"');
              
              echo form_label("Data Final:", "data_fim");
              echo form_input("data_fim", $data_fim, 'class="span1"');
              
              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Ir");
              echo form_submit($data_submit);
			
            echo form_close();
            ?>

          </div>
         <?php  
         if(isset($pesquisas)){
          ?>
         <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Tipo de Sondagem</th>
				<th class="yellow header headerSortDown">Título</th>
				<th class="yellow header headerSortDown">Rodovia</th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">Trecho</th>
				<th class="yellow header headerSortDown">KM Inicial</th>
				<th class="yellow header headerSortDown">KM Final</th>
				<th class="yellow header headerSortDown">Lote</th>
				<th class="yellow header headerSortDown">Estudo</th>
				<th class="yellow header headerSortDown">Local</th>
				<th class="yellow header headerSortDown">Data Inicio</th>
				<th class="yellow header headerSortDown">Data Fim</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($pesquisas as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['tipoSondagem'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['rodovia'].'</td>';
					echo '<td>'.$row['uf'].'</td>';
					echo '<td>'.$row['trecho'].'</td>';
					echo '<td>'.$row['km_inicial'].'</td>';
	      			echo '<td>'.$row['km_final'].'</td>';
					echo '<td>'.$row['lote'].'</td>';
					echo '<td>'.$row['estudo'].'</td>';
					echo '<td>'.$row['local'].'</td>';
					echo '<td>'.$row['data_ini'].'</td>';
					echo '<td>'.$row['data_fim'].'</td>';
					
	        	   echo '<td class="crud-actions">';
	        	   if(array_key_exists('sondagem', $row)){
	        	  	echo '<a href="'.site_url("admin").'/resumo_sondagens/resumo/'.$row['id'].'" class="btn btn-info" style="width:100px;" >Exibir Sondagem</a> </br>';  
	        	   }
                	echo '</td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>
          <?php } ?>
      </div>        
 </div>
 
 <script>
$(function(){
	
		 $('select[name=uf]').change(function(){
		  var self = $(this),
		   id   = self.val(),
		   el   = $('select[name=br]');	   
		  el.find('option').remove();
		  el.prepend('<option value="">Select</option>');	  
		  $.getJSON( "<?php echo base_url().'consulta_sondagens/get_brs_by_uf/' ?>" + id , function( data ) {
			  for (var i = data.length - 1; i >= 0; i--) {
			      el.prepend(option(data[i]['rodovia'], data[i]['rodovia']));
			     };
			});
		 });

		 $('select[name=br]').change(function(){
			  var self = $(this),
			   id   = self.val(),
			   kmIni   = $('input[name=km_ini]');
			   kmFim   = $('input[name=km_fim]');
			  var uf = $('select[name=uf'), 
			  	ufNome = uf.val();	   
			  kmIni.find('value').remove();
			  kmFim.find('value').remove();	  	  
			  $.getJSON( "<?php echo base_url().'consulta_sondagens/get_kms_by_uf_br/' ?>" + ufNome + "/" + id , function( data ) {
				  kmIni.val(data[0]['kmIni']);
				  kmFim.val(data[0]['kmFim']);				  
				});
			 
			 });

		 
		 	
	});


	function option(value, text) {
	 return '<option value="' + value + '">' + text + '</option>';
	}
</script>