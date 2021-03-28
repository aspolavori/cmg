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
            $options_veiculos = array();    
            foreach ($veiculos as $array) {
              foreach ($array as $key => $value) {
                $options_veiculos[$key] = $key;
              }
              break;
            }

            echo form_open("admin/veiculos", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_veiculos, $order, 'class="span2"');

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
				<th class="yellow header headerSortDown">VEH_NAME</th>
				<th class="yellow header headerSortDown">CATEGORY</th>
				<th class="yellow header headerSortDown">BASE_TYPE</th>
				<th class="yellow header headerSortDown">CLASS</th>
				<th class="yellow header headerSortDown">INFO</th>
				<th class="yellow header headerSortDown">PCSE</th>
				<th class="yellow header headerSortDown">NUM_WHEELS</th>
				<th class="yellow header headerSortDown">NUM_AXLES</th>
				<th class="yellow header headerSortDown">TYRE_TYPE</th>
				<th class="yellow header headerSortDown">TYRE_NR0</th>
				<th class="yellow header headerSortDown">TYRE_RREC</th>
				<th class="yellow header headerSortDown">AKM0</th>
				<th class="yellow header headerSortDown">HRWK0</th>
				<th class="yellow header headerSortDown">LIFE0</th>
				<th class="yellow header headerSortDown">PP</th>
				<th class="yellow header headerSortDown">PAX</th>
				<th class="yellow header headerSortDown">W</th>
				<th class="yellow header headerSortDown">WEIGHT_OP</th>
				<th class="yellow header headerSortDown">WGT_UNIT</th>
				<th class="yellow header headerSortDown">ESAL</th>
				<th class="yellow header headerSortDown">EUC_FUEL</th>
				<th class="yellow header headerSortDown">EUC_INTRST</th>
				<th class="yellow header headerSortDown">FUC_FUEL</th>
				<th class="yellow header headerSortDown">FUC_INTRST</th>
				<th class="yellow header headerSortDown">AF</th>
				<th class="yellow header headerSortDown">CD</th>
				<th class="yellow header headerSortDown">CDMULT</th>
				<th class="yellow header headerSortDown">CR_B_A0</th>
				<th class="yellow header headerSortDown">CR_B_A1</th>
				<th class="yellow header headerSortDown">CR_B_A2</th>
				<th class="yellow header headerSortDown">PDRIVE</th>
				<th class="yellow header headerSortDown">PDRV_UNITS</th>
				<th class="yellow header headerSortDown">PBRAKE</th>
				<th class="yellow header headerSortDown">PBRK_UNITS</th>
				<th class="yellow header headerSortDown">PRAT</th>
				<th class="yellow header headerSortDown">PRAT_UNITS</th>
				<th class="yellow header headerSortDown">FPLIM</th>
				<th class="yellow header headerSortDown">B_VDES2</th>
				<th class="yellow header headerSortDown">B_VDES_A0</th>
				<th class="yellow header headerSortDown">B_VDES_A1</th>
				<th class="yellow header headerSortDown">B_VDES_A2</th>
				<th class="yellow header headerSortDown">B_VDES_CW1</th>
				<th class="yellow header headerSortDown">B_VDES_CW2</th>
				<th class="yellow header headerSortDown">C_VDES2</th>
				<th class="yellow header headerSortDown">C_VDES_A0</th>
				<th class="yellow header headerSortDown">C_VDES_A1</th>
				<th class="yellow header headerSortDown">C_VDES_A2</th>
				<th class="yellow header headerSortDown">C_VDES_CW1</th>
				<th class="yellow header headerSortDown">C_VDES_CW2</th>
				<th class="yellow header headerSortDown">U_VDES2</th>
				<th class="yellow header headerSortDown">U_VDES_A0</th>
				<th class="yellow header headerSortDown">U_VDES_A1</th>
				<th class="yellow header headerSortDown">U_VDES_A2</th>
				<th class="yellow header headerSortDown">U_VDES_CW1</th>
				<th class="yellow header headerSortDown">U_VDES_CW2</th>
				<th class="yellow header headerSortDown">VCURVE_A0</th>
				<th class="yellow header headerSortDown">VCURVE_A1</th>
				<th class="yellow header headerSortDown">VROUGH_A0</th>
				<th class="yellow header headerSortDown">ARVMAX</th>
				<th class="yellow header headerSortDown">SPEED_SIG</th>
				<th class="yellow header headerSortDown">SPEED_BETA</th>
				<th class="yellow header headerSortDown">COV</th>
				<th class="yellow header headerSortDown">CGR_A0</th>
				<th class="yellow header headerSortDown">CGR_A1</th>
				<th class="yellow header headerSortDown">CGR_A2</th>
				<th class="yellow header headerSortDown">RPM_A0</th>
				<th class="yellow header headerSortDown">RPM_A1</th>
				<th class="yellow header headerSortDown">RPM_A2</th>
				<th class="yellow header headerSortDown">RPM_A3</th>
				<th class="yellow header headerSortDown">RPM_IDLE</th>
				<th class="yellow header headerSortDown">IDLE_FUEL</th>
				<th class="yellow header headerSortDown">ZETAB</th>
				<th class="yellow header headerSortDown">EHP</th>
				<th class="yellow header headerSortDown">EDT</th>
				<th class="yellow header headerSortDown">PACCS_A0</th>
				<th class="yellow header headerSortDown">PCTPENG</th>
				<th class="yellow header headerSortDown">OILCONT</th>
				<th class="yellow header headerSortDown">OILOPER</th>
				<th class="yellow header headerSortDown">AMAXV</th>
				<th class="yellow header headerSortDown">FRIAMAX</th>
				<th class="yellow header headerSortDown">NMTAMAX</th>
				<th class="yellow header headerSortDown">RIAMAX</th>
				<th class="yellow header headerSortDown">AMAXRI</th>
				<th class="yellow header headerSortDown">WHEEL_DIAM</th>
				<th class="yellow header headerSortDown">TYRE_C0TC</th>
				<th class="yellow header headerSortDown">TYRE_CTCTE</th>
				<th class="yellow header headerSortDown">TYRE_CTCON</th>
				<th class="yellow header headerSortDown">TYRE_VOL</th>
				<th class="yellow header headerSortDown">PARTS_A0</th>
				<th class="yellow header headerSortDown">PARTS_A1</th>
				<th class="yellow header headerSortDown">PARTS_KP</th>
				<th class="yellow header headerSortDown">RI_SHAPE</th>
				<th class="yellow header headerSortDown">RIMIN</th>
				<th class="yellow header headerSortDown">CPCON</th>
				<th class="yellow header headerSortDown">PARTS_K0PC</th>
				<th class="yellow header headerSortDown">PARTS_K1PC</th>
				<th class="yellow header headerSortDown">LAB_A0</th>
				<th class="yellow header headerSortDown">LAB_A1</th>
				<th class="yellow header headerSortDown">LAB_K0LH</th>
				<th class="yellow header headerSortDown">LAB_K1LH</th>
				<th class="yellow header headerSortDown">OPTLIFE_A0</th>
				<th class="yellow header headerSortDown">OPTLIFE_A1</th>
				<th class="yellow header headerSortDown">OPTLIFE_A2</th>
				<th class="yellow header headerSortDown">OPTLIFE_A3</th>
				<th class="yellow header headerSortDown">OPTLIFE_A4</th>
				<th class="yellow header headerSortDown">EM_CATCONVTR</th>
				<th class="yellow header headerSortDown">EN_FUELTYP</th>
				<th class="yellow header headerSortDown">EN_PRODVEH</th>
				<th class="yellow header headerSortDown">EN_PCTPART</th>
				<th class="yellow header headerSortDown">EN_PCTVEH</th>
				<th class="yellow header headerSortDown">EN_TYREWGT</th>
				<th class="yellow header headerSortDown">EN_TAREWGT</th>
				<th class="yellow header headerSortDown">EN_TAREUNT</th>
				<th class="yellow header headerSortDown">NM_WHEEL</th>
				<th class="yellow header headerSortDown">NM_PAYLOAD</th>
				<th class="yellow header headerSortDown">NM_VDESP</th>
				<th class="yellow header headerSortDown">NM_VDESU</th>
				<th class="yellow header headerSortDown">NM_A_RGH</th>
				<th class="yellow header headerSortDown">NM_CRGR</th>
				<th class="yellow header headerSortDown">NM_A_GRD</th>
				<th class="yellow header headerSortDown">NM_A_RMC</th>
				<th class="yellow header headerSortDown">NM_B_RMC</th>
				<th class="yellow header headerSortDown">NM_KEF</th>
				<th class="yellow header headerSortDown">EUC_PSGR</th>
				<th class="yellow header headerSortDown">EUC_ENERGY</th>
				<th class="yellow header headerSortDown">FUC_PSGR</th>
				<th class="yellow header headerSortDown">FUC_CARGO</th>
				<th class="yellow header headerSortDown">FUC_ENERGY</th>
				<th class="yellow header headerSortDown">EMRAT_A0</th>
				<th class="yellow header headerSortDown">EMRAT_A1</th>
				<th class="yellow header headerSortDown">EMRAT_A2</th>
				<th class="yellow header headerSortDown">KPFAC</th>
				<th class="yellow header headerSortDown">KPEA</th>
				
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($veiculos as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['id'].'</td>';
					echo '<td>'.$row['VEH_NAME'].'</td>';
					echo '<td>'.$row['CATEGORY'].'</td>';
					echo '<td>'.$row['BASE_TYPE'].'</td>';
					echo '<td>'.$row['CLASS'].'</td>';
					echo '<td>'.$row['LIFE_MODEL'].'</td>';
					echo '<td>'.$row['PCSE'].'</td>';
					echo '<td>'.$row['NUM_WHEELS'].'</td>';
					echo '<td>'.$row['NUM_AXLES'].'</td>';
					echo '<td>'.$row['TYRE_TYPE'].'</td>';
					echo '<td>'.$row['TYRE_NR0'].'</td>';
					echo '<td>'.$row['TYRE_RREC'].'</td>';
					echo '<td>'.$row['AKM0'].'</td>';
					echo '<td>'.$row['HRWK0'].'</td>';
					echo '<td>'.$row['LIFE0'].'</td>';
					echo '<td>'.$row['PP'].'</td>';
					echo '<td>'.$row['PAX'].'</td>';
					echo '<td>'.$row['W'].'</td>';
					echo '<td>'.$row['WEIGHT_OP'].'</td>';
					echo '<td>'.$row['WGT_UNIT'].'</td>';
					echo '<td>'.$row['ESAL'].'</td>';
					echo '<td>'.$row['EUC_FUEL'].'</td>';
					echo '<td>'.$row['EUC_INTRST'].'</td>';
					echo '<td>'.$row['FUC_FUEL'].'</td>';
					echo '<td>'.$row['FUC_INTRST'].'</td>';
					echo '<td>'.$row['AF'].'</td>';
					echo '<td>'.$row['CD'].'</td>';
					echo '<td>'.$row['CDMULT'].'</td>';
					echo '<td>'.$row['CR_B_A0'].'</td>';
					echo '<td>'.$row['CR_B_A1'].'</td>';
					echo '<td>'.$row['CR_B_A2'].'</td>';
					echo '<td>'.$row['PDRIVE'].'</td>';
					echo '<td>'.$row['PDRV_UNITS'].'</td>';
					echo '<td>'.$row['PBRAKE'].'</td>';
					echo '<td>'.$row['PBRK_UNITS'].'</td>';
					echo '<td>'.$row['PRAT'].'</td>';
					echo '<td>'.$row['PRAT_UNITS'].'</td>';
					echo '<td>'.$row['FPLIM'].'</td>';
					echo '<td>'.$row['B_VDES2'].'</td>';
					echo '<td>'.$row['B_VDES_A0'].'</td>';
					echo '<td>'.$row['B_VDES_A1'].'</td>';
					echo '<td>'.$row['B_VDES_A2'].'</td>';
					echo '<td>'.$row['B_VDES_CW1'].'</td>';
					echo '<td>'.$row['B_VDES_CW2'].'</td>';
					echo '<td>'.$row['C_VDES2'].'</td>';
					echo '<td>'.$row['C_VDES_A0'].'</td>';
					echo '<td>'.$row['C_VDES_A1'].'</td>';
					echo '<td>'.$row['C_VDES_A2'].'</td>';
					echo '<td>'.$row['C_VDES_CW1'].'</td>';
					echo '<td>'.$row['C_VDES_CW2'].'</td>';
					echo '<td>'.$row['U_VDES2'].'</td>';
					echo '<td>'.$row['U_VDES_A0'].'</td>';
					echo '<td>'.$row['U_VDES_A1'].'</td>';
					echo '<td>'.$row['U_VDES_A2'].'</td>';
					echo '<td>'.$row['U_VDES_CW1'].'</td>';
					echo '<td>'.$row['U_VDES_CW2'].'</td>';
					echo '<td>'.$row['VCURVE_A0'].'</td>';
					echo '<td>'.$row['VCURVE_A1'].'</td>';
					echo '<td>'.$row['VROUGH_A0'].'</td>';
					echo '<td>'.$row['ARVMAX'].'</td>';
					echo '<td>'.$row['SPEED_SIG'].'</td>';
					echo '<td>'.$row['SPEED_BETA'].'</td>';
					echo '<td>'.$row['COV'].'</td>';
					echo '<td>'.$row['CGR_A0'].'</td>';
					echo '<td>'.$row['CGR_A1'].'</td>';
					echo '<td>'.$row['CGR_A2'].'</td>';
					echo '<td>'.$row['RPM_A0'].'</td>';
					echo '<td>'.$row['RPM_A1'].'</td>';
					echo '<td>'.$row['RPM_A2'].'</td>';
					echo '<td>'.$row['RPM_A3'].'</td>';
					echo '<td>'.$row['RPM_IDLE'].'</td>';
					echo '<td>'.$row['IDLE_FUEL'].'</td>';
					echo '<td>'.$row['ZETAB'].'</td>';
					echo '<td>'.$row['EHP'].'</td>';
					echo '<td>'.$row['EDT'].'</td>';
					echo '<td>'.$row['PACCS_A0'].'</td>';
					echo '<td>'.$row['PCTPENG'].'</td>';
					echo '<td>'.$row['OILCONT'].'</td>';
					echo '<td>'.$row['OILOPER'].'</td>';
					echo '<td>'.$row['AMAXV'].'</td>';
					echo '<td>'.$row['FRIAMAX'].'</td>';
					echo '<td>'.$row['NMTAMAX'].'</td>';
					echo '<td>'.$row['RIAMAX'].'</td>';
					echo '<td>'.$row['AMAXRI'].'</td>';
					echo '<td>'.$row['WHEEL_DIAM'].'</td>';
					echo '<td>'.$row['TYRE_C0TC'].'</td>';
					echo '<td>'.$row['TYRE_CTCTE'].'</td>';
					echo '<td>'.$row['TYRE_CTCON'].'</td>';
					echo '<td>'.$row['TYRE_VOL'].'</td>';
					echo '<td>'.$row['PARTS_A0'].'</td>';
					echo '<td>'.$row['PARTS_A1'].'</td>';
					echo '<td>'.$row['PARTS_KP'].'</td>';
					echo '<td>'.$row['RI_SHAPE'].'</td>';
					echo '<td>'.$row['RIMIN'].'</td>';
					echo '<td>'.$row['CPCON'].'</td>';
					echo '<td>'.$row['PARTS_K0PC'].'</td>';
					echo '<td>'.$row['PARTS_K1PC'].'</td>';
					echo '<td>'.$row['LAB_A0'].'</td>';
					echo '<td>'.$row['LAB_A1'].'</td>';
					echo '<td>'.$row['LAB_K0LH'].'</td>';
					echo '<td>'.$row['LAB_K1LH'].'</td>';
					echo '<td>'.$row['OPTLIFE_A0'].'</td>';
					echo '<td>'.$row['OPTLIFE_A1'].'</td>';
					echo '<td>'.$row['OPTLIFE_A2'].'</td>';
					echo '<td>'.$row['OPTLIFE_A3'].'</td>';
					echo '<td>'.$row['OPTLIFE_A4'].'</td>';
					echo '<td>'.$row['EM_CATCONVTR'].'</td>';
					echo '<td>'.$row['EN_FUELTYP'].'</td>';
					echo '<td>'.$row['EN_PRODVEH'].'</td>';
					echo '<td>'.$row['EN_PCTPART'].'</td>';
					echo '<td>'.$row['EN_PCTVEH'].'</td>';
					echo '<td>'.$row['EN_TYREWGT'].'</td>';
					echo '<td>'.$row['EN_TAREWGT'].'</td>';
					echo '<td>'.$row['EN_TAREUNT'].'</td>';
					echo '<td>'.$row['NM_WHEEL'].'</td>';
					echo '<td>'.$row['NM_PAYLOAD'].'</td>';
					echo '<td>'.$row['NM_VDESP'].'</td>';
					echo '<td>'.$row['NM_VDESU'].'</td>';
					echo '<td>'.$row['NM_A_RGH'].'</td>';
					echo '<td>'.$row['NM_CRGR'].'</td>';
					echo '<td>'.$row['NM_A_GRD'].'</td>';
					echo '<td>'.$row['NM_A_RMC'].'</td>';
					echo '<td>'.$row['NM_B_RMC'].'</td>';
					echo '<td>'.$row['NM_KEF'].'</td>';
					echo '<td>'.$row['EUC_PSGR'].'</td>';
					echo '<td>'.$row['EUC_ENERGY'].'</td>';
					echo '<td>'.$row['FUC_PSGR'].'</td>';
					echo '<td>'.$row['FUC_CARGO'].'</td>';
					echo '<td>'.$row['FUC_ENERGY'].'</td>';
					echo '<td>'.$row['EMRAT_A0'].'</td>';
					echo '<td>'.$row['EMRAT_A1'].'</td>';
					echo '<td>'.$row['EMRAT_A2'].'</td>';
					echo '<td>'.$row['KPFAC'].'</td>';
					echo '<td>'.$row['KPEA'].'</td>';
					
	          echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/veiculos/update/'.$row['id'].'" class="btn btn-info">Ver & editar</a>  
                  <a href="'.site_url("admin").'/veiculos/delete/'.$row['id'].'" class="btn btn-danger">deletar</a>
                </td>';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>        </div>