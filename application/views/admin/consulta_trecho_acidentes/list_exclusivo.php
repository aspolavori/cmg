    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
				<?php echo ucfirst($this->uri->segment(2).' (Exclusivo)');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Relatório de Acidentes por Trecho (Exclusivo)
            </h2>
          </div>
          <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> new acidente created with success.';
	          echo '</div>';       
	        }else{
	          echo '<div class="alert alert-error">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
	          echo '</div>';          
	        }
	      }
	      ?> 
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
            
            $km_ini = 	(set_value('km_ini')) ? set_value('km_ini') : 100; 
            $km_fim = 	(set_value('km_fim')) ? set_value('km_fim') : 200;
            $vmd = 		(set_value('vmd')) ? set_value('vmd') 		: 30000;
            $taxa =		(set_value('taxa')) ? set_value('taxa') 	:  0.05;
            $ano_base =	(set_value('ano_base')) ? set_value('$ano_base'): 2007;
            $data_ini = (set_value('data_ini')) ? set_value('data_ini') : 2004;
            $data_fim = (set_value('data_ini')) ? set_value('data_ini') : 2014;
            
            $options_uf = array('' => "select");
            foreach($ufs as $row){
            	$options_uf[$row['uf']] = $row['uf']; 
            }
            
            echo validation_errors();
            
            echo form_open("admin/consulta_trecho_acidentes/exclusivo", $attributes);
     			// TODO :  FAZER CONSULTA DINÂMICA DE UF -> BR DISPONIVEL, CALCULAR A EXTENSAO
     		    
              echo form_label("UF:", "uf");
              echo form_dropdown("uf", $options_uf, set_value('uf') , 'class="span1"');
              
              echo form_label("BR:", "uf");
              $options_br = array('' => "select");
              echo form_dropdown("br", $options_br, set_value('br'), 'class="span1"');
              
              echo form_label("Km Inicial:", "km_ini");
              echo form_input("km_ini", $km_ini, 'class="span1"');
              
              echo form_label("Km Final:", "km_fim");
              echo form_input("km_fim", $km_fim, 'class="span1"');
              
              echo form_label("VMD:", "vmd");
              echo form_input("vmd", $vmd, 'class="span1"');
              
              echo form_label("Taxa:", "hdm");
              echo form_input("taxa", $taxa, 'class="span1"');
              
              echo form_label("Ano Base:", "hdm");
              echo form_input("ano_base", $ano_base, 'class="span1"');
              
              echo form_label("Data Inicial:", "data_ini");
              echo form_input("data_ini", $data_ini, 'class="span1"');
              
              echo form_label("Data Final:", "data_fim");
              echo form_input("data_fim", $data_fim, 'class="span1"');
              
              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Ir");
              echo form_submit($data_submit);
			
            echo form_close();
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            	<thead>
	              	<tr>
	            		<th class="header"></th>
						<th class="yellow header headerSortDown"></th>
					</tr>
	            </thead>
	            <tbody>
	              <?php
	              
              	  ?>      
            	</tbody>
          </table>          								

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
		  $.getJSON( "<?php echo base_url().'consulta_trecho_acidentes/get_brs_by_uf/' ?>" + id , function( data ) {
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
			  $.getJSON( "<?php echo base_url().'consulta_trecho_acidentes/get_kms_by_uf_br/' ?>" + ufNome + "/" + id , function( data ) {
				  kmIni.val(data[0]['kmIni']);
				  kmFim.val(data[0]['kmFim']);				  
				});
			 
			 });

		 
		 	
	});


	function option(value, text) {
	 return '<option value="' + value + '">' + text + '</option>';
	}
</script>
   