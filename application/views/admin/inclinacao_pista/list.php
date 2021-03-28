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
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst($this->uri->segment(2));?>
              
            </h2>
          </div>
          <?php
	      //flash messages
	      if($this->session->flashdata('flash_message')){
	        if($this->session->flashdata('flash_message') == 'updated')
	        {
	          echo '<div class="alert alert-success">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Well done!</strong> inclinacao_pista updated with success.';
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
           
            //save the columns names in a array that we will use as filter
            if($inclinacao_pista){         
	            $options_inclinacao_pista = array();    
	            foreach ($inclinacao_pista as $array) {
	              foreach ($array as $key => $value) {
	                $options_inclinacao_pista[$key] = $key;
	              }
	              break;
	            }
            }
			
            
            $options_ciclo = array('' => "Select");
            foreach ($ciclos as $row)
            {
            	$options_ciclo[$row['ID_CICLO']] = $row['NM_CICLO'];
            }
	        if($nm_ufs){   
	            $options_nm_uf = array('' => "Select");
	            foreach ($nm_ufs as $row)
	            {
	            	$options_nm_uf[$row['NM_UF']] = $row['NM_UF'];
	            }
            }else{
            	$options_nm_uf = array();
            }
            if($nm_brs){
            	$options_nm_br = array('' => "Select");
            	foreach ($nm_brs as $row)
            	{
            		$options_nm_br[$row['NM_BR']] = $row['NM_BR'];
            	}
            }else{
            	$options_nm_br = array();
            }
            
            
            echo form_open("admin/inclinacao_pista", $attributes);
     		/*
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_inclinacao_pista, $order, 'class="span2"');
			*/
              echo form_label("Ciclo:", "ciclo");
              echo form_dropdown("ciclo", $options_ciclo, $search_ciclo_selected, 'class="span2" ');
              
              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Go");

              $options_order_type = array();
              echo form_label("UF:", "NM_UF");
              echo form_dropdown("NM_UF", $options_nm_uf, $nm_uf_selected, 'class="span2"');
              
              echo form_label("BR:", "NM_BR");
              echo form_dropdown("NM_BR", $options_nm_br, $nm_br_selected, 'class="span2"');

              echo form_label("Sentido:", "DESC_SENTIDO");
              echo form_dropdown("DESC_SENTIDO", array('C' => 'Crescente', 'D' => 'Decrescente'), $nm_br_selected, 'class="span2"');
              
              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Trecho</th>
				<th class="yellow header headerSortDown">Hodometro</th>
				<th class="yellow header headerSortDown">Altitude</th>
				<!-- 
				<th class="yellow header headerSortDown">Ciclo</th>
				<th class="yellow header headerSortDown">Lote</th>
				<th class="yellow header headerSortDown">Trecho</th>
				<th class="yellow header headerSortDown">Levantamento</th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">BR</th>
				<th class="yellow header headerSortDown">Pista</th>
				<th class="yellow header headerSortDown">Sentido</th>
				<th class="yellow header headerSortDown">Faixa</th>
				<th class="yellow header headerSortDown">Km Inicial</th>
				<th class="yellow header headerSortDown">Km Final</th>
				<th class="yellow header headerSortDown">DT Upload</th>
				<th class="yellow header headerSortDown">Descrição Caminho</th>
				<th class="yellow header headerSortDown">TP Trecho</th>
				 -->
	    	  </tr>
	         </thead>
	         <tbody>
	              <?php
	              if($inclinacao_pista){
	              	foreach($inclinacao_pista as $row)
					{
						echo '<tr>';
						echo '<td>'.$row['ID_TRECHO'].'</td>';
						echo '<td>'.$row['NM_TRECHO'].'</td>';
						echo '<td>'.$row['HODOMETRO_TRECHO'].'</td>';
						echo '<td>'.$row['GPS_ALTITUDE'].'</td>';
						/*
						echo '<td>'.$row['ID_CICLO'].'</td>';
						echo '<td>'.$row['ID_LOTE'].'</td>';
						
						echo '<td>'.$row['DT_LEVANTAMENTO'].'</td>';
						echo '<td>'.$row['NM_UF'].'</td>';
						echo '<td>'.$row['NM_BR'].'</td>';
						echo '<td>'.$row['DESC_PISTA'].'</td>';
						echo '<td>'.$row['DESC_SENTIDO'].'</td>';
						echo '<td>'.$row['DESC_FAIXA'].'</td>';
						echo '<td>'.$row['KM_INICIAL'].'</td>';
						echo '<td>'.$row['KM_FINAL'].'</td>';
						echo '<td>'.$row['DT_UPLOAD'].'</td>';
						echo '<td>'.$row['DESC_CAMINHO'].'</td>';
						echo '<td>'.$row['ID_TP_TRECHO'].'</td>';				
						*/ 
						echo "</tr>";
					}
				 }		              
              ?>      
            </tbody>
          </table>

          <?php //echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>
    
<script>
$(function(){
	
		 $('select[name=ciclo]').change(function(){
		  var self = $(this),
		   id   = self.val(),
		   el   = $('select[name=NM_UF]');	   
		  el.find('option').remove();
		  el.prepend('<option value="">Select</option>');	  
		  $.getJSON( "<?php echo base_url().'inclinacao_pista/get_ciclo_uf/' ?>" + id, function( data ) {
			  for (var i = data.length - 1; i >= 0; i--) {
			      el.prepend(option(data[i]['NM_UF'], data[i]['NM_UF']));
			     };
			});
		 });
	

		$('select[name=NM_UF]').change(function(){
		  var self = $(this),
		   id   = self.val(),
		   el   = $('select[name=NM_BR]');
		  var ciclo = $('select[name=ciclo]'), 
		  	idciclo = ciclo.val();	   
		  el.find('option').remove();	  
		  el.prepend('<option value="">Select</option>');
		  $.getJSON( "<?php echo base_url().'inclinacao_pista/get_ciclo_uf_br/' ?>" + idciclo + "/" + id  , function( data ) {			  
			  for (var i = data.length - 1; i >= 0; i--) {
			      el.prepend(option(data[i]['NM_BR'], data[i]['NM_BR']));
			     };
			});
		 });
	});


	function option(value, text) {
	 return '<option value="' + value + '">' + text + '</option>';
	}
</script>