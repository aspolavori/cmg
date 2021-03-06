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
              <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_caracteristica_volumetrica = array();    
            foreach ($caracteristica_volumetrica as $array) {
              foreach ($array as $key => $value) {
                $options_caracteristica_volumetrica[$key] = $key;
              }
              break;
            }

            echo form_open("admin/caracteristica_volumetrica", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_caracteristica_volumetrica, $order, 'class="span2"');

              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Ir");

              $options_order_type = array("Asc" => "Asc", "Desc" => "Desc");
              echo form_dropdown("order_type", $options_order_type, $order_type_selected, 'class="span1"');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>
				<th class="yellow header headerSortDown">T??tulo</th>
				<th class="yellow header headerSortDown">Largura da Pista</th>
				<th class="yellow header headerSortDown">Largura do Acostamento</th>
				<th class="yellow header headerSortDown">Largura do Acostamento 2</th>
				<th class="yellow header headerSortDown">Solo Estab.sem Mistura</th>
				<th class="yellow header headerSortDown">Estab.Brita40Laterita60</th>
				<th class="yellow header headerSortDown">TSD</th>
				<th class="yellow header headerSortDown">CBUQ Faixa C - espes.</th>
				<th class="yellow header headerSortDown">CBUQ Faixa B - espes.</th>
				<th class="yellow header headerSortDown">Brita Graduada - BGS</th>
				<th class="yellow header headerSortDown">Br.Grad.Tr.Cim. - BGTC</th>
				<th class="yellow header headerSortDown">Sub-base Estab.s/Mist.</th>
				<th class="yellow header headerSortDown">AAUQ</th>
				<th class="yellow header headerSortDown">40%Seixo e 60%Laterita</th>
				<th class="yellow header headerSortDown">Observa????o</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($caracteristica_volumetrica as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['titulo'].'</td>';
					echo '<td>'.$row['largura_pista'].'</td>';
					echo '<td>'.$row['largura_acostamento'].'</td>';
					echo '<td>'.$row['largura_acostamento2'].'</td>';
					echo '<td>'.$row['solo_estab_s_mistura'].'</td>';
					echo '<td>'.$row['estab_brita_40_laterita60'].'</td>';
					echo '<td>'.$row['tsd'].'</td>';
					echo '<td>'.$row['cbuq_faixa_c_espes'].'</td>';
					echo '<td>'.$row['cbuq_faixa_b_espes'].'</td>';
					echo '<td>'.$row['brita_graduada_bgs'].'</td>';
					echo '<td>'.$row['brita_graduada_bgtc'].'</td>';
					echo '<td>'.$row['sub_base_estab_s_mist'].'</td>';
					echo '<td>'.$row['aauqt'].'</td>';
					echo '<td>'.$row['40_seixo_60_laterita'].'</td>';
					echo '<td>'.$row['observacao'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/caracteristica_volumetrica/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/caracteristica_volumetrica/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>