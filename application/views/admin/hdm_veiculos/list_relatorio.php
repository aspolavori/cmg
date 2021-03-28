    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst('HDM Veículos Relatórios');?>
	        </li>
	      </ul>
	  <div class="row">
        <div class="span12 columns">
	        <div class="well">
	           
	            <?php
	           
	            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
	           
	            //save the columns names in a array that we will use as filter         
	            $options_hdm_veiculos = array();    
	            foreach ($hdm_veiculos as $array) {
	              foreach ($array as $key => $value) {
	                $options_hdm_veiculos[$key] = $key;
	              }
	              break;
	            }
	
	            echo form_open("admin/hdm_veiculos/relatorios", $attributes);
	     
	              echo form_label("Buscar por Ano:", "ano");
	              echo form_input("ano");
		
	              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Buscar");
	              echo form_submit($data_submit);
	
	            echo form_close();
	            ?>
	
	          </div>
	          
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">Data Base</th>
				<th class="yellow header headerSortDown">Data para Referência</th>
				<th class="yellow header headerSortDown">Observação</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              
		              $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
		               
		              //save the columns names in a array that we will use as filter
		              $options_hdm_data_ref = array();
		              $options_hdm_data_ref[0] = "Sem data de Referência";
		              foreach ($hdm_veiculos_ref as $array) {
		              	$options_hdm_data_ref[$array['id']] = $array['data_base'];
		              }
	              
	              
	              foreach($hdm_veiculos as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['data_base'].'</td>';
	                echo '<td>'.$options_hdm_data_ref[$row['id_hdm_veiculos']].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
           		  <a href="'.site_url("admin").'/hdm_veiculos/get_relatorio/'.$row['id'].'/'.$ano.'" class="btn btn-info" style="width:126px;">Visualizar Relatório</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

      </div>        
      </div>