    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Relatório Custo Médio Gerencial
	        </li>
	      </ul>	      
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           	// TODO: CONSULTAR TODOS OS ACIDENTES DO PERIODO E CALCULAR TAXAS, NO FINAL EXIVIR A LISTA DE ACIDENTES + RELATORIO EM CSV.
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
                        
            $options_regioes = array('' => "select");
            foreach($regioes as $row){
            	$options_regioes[$row['regiao']] = $row['regiao'];
            }
            
            $options_uf = array('' => "select");
            
            echo validation_errors();
            
            echo form_open("admin/relatorios_cmg", $attributes);
				            
              echo form_label("Regiões:", "regiao");
              echo form_dropdown("regiao", $options_regioes, '' , 'class=""');
            
              echo form_label("UF:", "uf");
              echo form_dropdown("uf", $options_uf, '' , 'class="span1"');
                            
              echo form_label("Ano Inicial:", "data_ini");
              echo form_input("data_ini", "", 'class="span1"');
              
              echo form_label("Ano Final:", "data_fim");
              echo form_input("data_fim", "", 'class="span1"');
              
              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Ir");
              echo form_submit($data_submit);
			
            echo form_close();
            ?>

          </div>
         <?php  
         if(isset($sicros) ){
          ?>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">Célula</th>
				<th class="yellow header headerSortDown">Região</th>
				<th class="yellow header headerSortDown">UF</th>
				<th class="yellow header headerSortDown">Indice de Pavimentação</th>
				<th class="yellow header headerSortDown">BDI</th>
				<th class="yellow header headerSortDown">BDI Betuminosos</th>
				<th class="yellow header headerSortDown">ICMS Asfaltico</th>
				<th class="yellow header headerSortDown">Fator</th>
				<th class="yellow header headerSortDown">Observação</th>
				<th class="yellow header headerSortDown">Data Base</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($sicros as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['regiao'].'</td>';
					echo '<td>'.$row['br'].'</td>';
					echo '<td>'.$row['indice_pavimentacao'].'</td>';
					echo '<td>'.$row['bdi'].'</td>';
					echo '<td>'.$row['bdi_betuminosos'].'</td>';
					echo '<td>'.$row['icms_asfaltico'].'</td>';
					echo '<td>'.$row['fator'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					echo '<td>'.$row['data_base'].'</td>';
					
	          echo '<td class="crud-actions">
              	  <a href="'.site_url("admin").'/relatorios_cmg/gerar_relatorio/'.$row['id'].'" class="btn btn-info" style="width: 120px" >Escolher Célula</a>
                </td>';
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
	
		 $('select[name=regiao]').change(function(){
		  var self = $(this),
		   id   = self.val(),
		   el   = $('select[name=uf]');	   
		  el.find('option').remove();
		  el.prepend('<option value="">Select</option>');
		  /*dados com espaco em branco*/	
		  id = id.replace(" ", "_"); 
		  $.getJSON( "<?php echo base_url().'relatorios_cmg/get_ufs_by_regiao/' ?>" + id , function( data ) {
			  for (var i = data.length - 1; i >= 0; i--) {
			      el.prepend(option(data[i]['br'], data[i]['br']));
			     };
			});
		 });
		 	
	});


	function option(value, text) {
	 return '<option value="' + value + '">' + text + '</option>';
	}
</script>