    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          Relatório de Acidentes por Tipo de Obra (Avaliação Ecômica)
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              Relatório de Acidentes por Tipo de Obra (Avaliação Ecômica)
            </h2>
          </div>
           <?php
	      //flash messages
		  if(isset($flash_message)){
	        if($flash_message == FALSE)
	        {
	           echo '<div class="alert alert-error">';
	            echo '<a class="close" data-dismiss="alert">×</a>';
	            echo '<strong>Erro na consulta!</strong> Preencha ao menos um Campo.';
	          echo '</div>'; 
	                  
	        }
	      }
	      ?>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
            
            //$options_caracteristicas = array('' => 'select');
	      	foreach($caracteristica as $row) {
	      		$options_caracteristicas[$row['id']] = $row['descricao'];
	      	}
	      	
	      	//$options_tipos = array('' => 'select');
	      	foreach($tipo as $row) {
	      		$options_tipos[$row['id']] = $row['descricao'];
	      	}
	      	
	      	//$options_localidades = array('' => 'select');
	      	foreach($localidade as $row) {
	      		$options_localidades[$row['id']] = $row['descricao'];
	      	}
	      	
	      	$options_obras = array();
	      	foreach ($obras as $array) {
	      		foreach ($array as $key => $value) {
	      			$options_obras[$key] = $key;
	      		}
	      		break;
	      	}
	      	
            echo form_open("admin/obras/obras_futuras_analise", $attributes);
     
              echo form_label("Característica da Rodovia:", "caracteristica[]");
              echo form_multiselect('caracteristica[]', $options_caracteristicas, $caracteristica_selected, 'style="width: 250px; height:200px;"' );

              echo form_label("Tipos de Obra:", "tipo[]");
              echo form_multiselect('tipo[]', $options_tipos, $tipo_selected, 'style="width: 250px; height:200px;"' );
              
              echo form_label("Foco da Intervenção:", "localidade[]");
              echo form_multiselect('localidade[]', $options_localidades, $localidade_selected, 'style="width: 250px; height:200px;"' );
              
              echo '<br>';
              
              echo form_label("VMD:", "vmd");
              echo form_input("vmd1", $vmd1, 'class="span1"');
              echo ' <= VMD <= ';
              echo form_input("vmd2", $vmd2, 'class="span1"');
              
              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Buscar");

              //$options_order_type = array("Asc" => "Asc", "Desc" => "Desc");
             // echo form_dropdown("order_type", $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>
          
          </table> 
          <table class="table table-striped table-bordered table-condensed"> 
              <thead>
          		<tr>
              	    <th colspan="5" class="header">Obra Foco</th>
              	</tr>
	         </thead> 
            <tbody>
	            <tr>
					<th class="yellow header headerSortDown">Tipo</th>
					<?php echo '<th> '.ucfirst($obra[0]['classe']).' </th>'; ?>  
					<th class="yellow header headerSortDown">Subtipo</th>
					<?php 
						echo '<th colspan="3"> ';
						  foreach($obra[0]['id_tipo_obras'] as $tiposObra){
						  	echo $tiposObra['descricao'].', ';
						  }
    					  echo  ' </th>'; 
					?> 
					
				</tr>
              	<tr>
              		<th class="yellow header headerSortDown">Dados do Trecho</th>
              		<th class="yellow header headerSortDown">UF</th>
					<?php echo '<th> '.$obra[0]['uf'].' </th>'; ?> 
					<th class="yellow header headerSortDown">Rodovia</th>
					<?php echo '<th colspan="2"> '.$obra[0]['br'].' </th>'; ?> 	
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Km Inicial</th>
					<?php echo '<th> '.$obra[0]['km_ini'].' </th>'; ?>
					<th class="yellow header headerSortDown">Km Final</th>
					<?php echo '<th> '.$obra[0]['km_fim'].' </th>'; ?>
					<th class="yellow header headerSortDown">Ext. (km)</th>
              		<?php echo '<th> '.( $obra[0]['km_fim'] - $obra[0]['km_ini']).' </th>'; ?>   
				</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Inicio da Obra</th>
					<th class="yellow header headerSortDown">VMD (s/ Projeto)</th>
					<th class="yellow header headerSortDown">Fim da Obra</th>					
					<th class="yellow header headerSortDown">VMD (c/ Projeto)</th>
					<th class="yellow header headerSortDown">Ano de Referência - VMD</th>
					<th class="yellow header headerSortDown">Taxa de Crescimento</th>
				</tr>
              	<tr>
              		<?php echo '<th> '.$obra[0]['data_ini'].' </th>'; ?>
              		<?php echo '<th> '.$obra[0]['vdm_s'].' </th>'; ?>                		
              		<?php echo '<th> '.$obra[0]['data_fim'].' </th>'; ?>
              		<?php echo '<th> '.$obra[0]['vdm_c'].' </th>'; ?>              		
              		<?php echo '<th> '.$obra[0]['ano_ref_vdm'].' </th>'; ?>              		
              		<?php echo '<th> '.$obra[0]['taxa_crescimento'].' </th>'; ?>  
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Custo</th>
					<?php echo '<th colspan="5"> '.$obra[0]['custo'].' </th>'; ?>
				</tr>
				<tr>
					<?php echo '<th colspan="6"> '.$obra[0]['descricao'].' </th>'; ?>
				</tr>
	         </tbody>
	       </table> 
          
          <?php
          	echo form_open("admin/obras/obras_futuras_tipo_acidente");
          ?>
          <?php
          if($obras)
		  { ?> 
          <table class="table table-striped table-bordered table-condensed"> 
              <thead>
          		<tr>
              	    <th colspan="3" class="header">Relatório de Obras</th>
              	    <th colspan="1" class="header">Taxa de Desconto:
              	    	<?php echo form_input("taxa_desconto", $taxa_desconto, 'class="span1" style="margin-bottom: -2px;" ');?>
              	    </th>
              	    <th colspan="1" class="header">Quant. Anos:
              	    	<?php echo form_input("anos", $anos, 'class="span1"  style="margin-bottom: -2px;" ');?>
              	    </th>
              	    <th class="header" style="float: right;">
              	    	<?php echo 'Marcar/Desmarcar Todas ';  echo form_checkbox('all', '', TRUE, 'onClick="toggle(this)"');?>
              	    </th> 
              	</tr>
	         </thead> 
            <tbody>
            </tbody>
         </table>
      	<?php }?>
          <?php
	          $ind = 1;
              foreach($obras as $row)
              { ?>      
			<table class="table table-striped table-bordered table-condensed"> 
              <thead>
          		<tr>
              	    <th colspan="5" class="header">Obra <?php echo $ind++; ?></th>
              	    <th class="header" style="float: right;">
              	    	Incluir no Estudo <?php  echo form_checkbox('idObras[]', $row['id'], TRUE);?>
              	    </th>
              	</tr>
	         </thead> 
            <tbody>
	            <tr>
					<th class="yellow header headerSortDown">Tipo</th>
					<?php echo '<th> '.ucfirst($row['classe']).' </th>'; ?>  
					<th class="yellow header headerSortDown">Subtipo</th>
					<?php 
						echo '<th colspan="3"> ';
						  foreach($row['id_tipo_obras'] as $tiposObra){
						  	echo $tiposObra['descricao'].', ';
						  }
    					  echo  ' </th>'; 
					?> 
					
				</tr>
              	<tr>
              		<th class="yellow header headerSortDown">Dados do Trecho</th>
              		<th class="yellow header headerSortDown">UF</th>
					<?php echo '<th> '.$row['uf'].' </th>'; ?> 
					<th class="yellow header headerSortDown">Rodovia</th>
					<?php echo '<th colspan="2"> '.$row['br'].' </th>'; ?> 	
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Km Inicial</th>
					<?php echo '<th> '.$row['km_ini'].' </th>'; ?>
					<th class="yellow header headerSortDown">Km Final</th>
					<?php echo '<th> '.$row['km_fim'].' </th>'; ?>
					<th class="yellow header headerSortDown">Ext. (km)</th>
              		<?php echo '<th> '.( $row['km_fim'] - $row['km_ini']).' </th>'; ?>   
				</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Inicio da Obra</th>
					<th class="yellow header headerSortDown">VMD (s/ Projeto)</th>
					<th class="yellow header headerSortDown">Fim da Obra</th>					
					<th class="yellow header headerSortDown">VMD (c/ Projeto)</th>
					<th class="yellow header headerSortDown">Ano de Referência - VMD</th>
					<th class="yellow header headerSortDown">Taxa de Crescimento</th>
				</tr>
              	<tr>
              		<?php echo '<th> '.$row['data_ini'].' </th>'; ?>
              		<?php echo '<th> '.$row['vdm_s'].' </th>'; ?>                		
              		<?php echo '<th> '.$row['data_fim'].' </th>'; ?>
              		<?php echo '<th> '.$row['vdm_c'].' </th>'; ?>              		
              		<?php echo '<th> '.$row['ano_ref_vdm'].' </th>'; ?>              		
              		<?php echo '<th> '.$row['taxa_crescimento'].' </th>'; ?>  
              	</tr>
              	<tr>	
					<th class="yellow header headerSortDown">Custo</th>
					<?php echo '<th colspan="5"> '.$row['custo'].' </th>'; ?>
				</tr>
				<tr>
					<?php echo '<th colspan="6"> '.$row['descricao'].' </th>'; ?>
				</tr>
	         </tbody>
	       </table> 
	       <?php
              } 
              if($obras){
              	echo form_submit($data_submit);	
              }
              
              echo form_close();
              
	         ?>	
      </div>        
     </div>
     <script language="JavaScript">
     	
     	function toggle(source) {
    	  checkboxes = document.getElementsByName('idObras[]');
    	  for(var i=0, n=checkboxes.length;i<n;i++) {
    	    checkboxes[i].checked = source.checked;
    	  }
    	}
	 </script>
     