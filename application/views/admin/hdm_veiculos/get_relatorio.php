<?php
    $nameFile = $hdm_relatorio[0]['data_base'].'_hdm_veiculos.csv';
    $cabecalho = "VEH_ID;VEH_NAME;CATEGORY;BASE_TYPE;CLASS;INFO;LIFE_MODEL;PCSE;NUM_WHEELS;NUM_AXLES;TYRE_TYPE;TYRE_NR0;TYRE_RREC;AKM0;HRWK0;LIFE0;PP;PAX;W;WEIGHT_OP;WGT_UNIT;ESAL;EUC_VEH;EUC_TYRE;EUC_FUEL;EUC_OIL;EUC_LABOUR;EUC_CREW;EUC_OHEAD;EUC_INTRST;EUC_WORK;EUC_NONWRK;EUC_CARGO;FUC_VEH;FUC_TYRE;FUC_FUEL;FUC_OIL;FUC_LABOUR;FUC_CREW;FUC_OHEAD;FUC_INTRST;AF;CD;CDMULT;CR_B_A0;CR_B_A1;CR_B_A2;PDRIVE;PDRV_UNITS;PBRAKE;PBRK_UNITS;PRAT;PRAT_UNITS;FPLIM;B_VDES2;B_VDES_A0;B_VDES_A1;B_VDES_A2;B_VDES_CW1;B_VDES_CW2;C_VDES2;C_VDES_A0;C_VDES_A1;C_VDES_A2;C_VDES_CW1;C_VDES_CW2;U_VDES2;U_VDES_A0;U_VDES_A1;U_VDES_A2;U_VDES_CW1;U_VDES_CW2;VCURVE_A0;VCURVE_A1;VROUGH_A0;ARVMAX;SPEED_SIG;SPEED_BETA;COV;CGR_A0;CGR_A1;CGR_A2;RPM_A0;RPM_A1;RPM_A2;RPM_A3;RPM_IDLE;IDLE_FUEL;ZETAB;EHP;EDT;PACCS_A0;PCTPENG;OILCONT;OILOPER;AMAXV;FRIAMAX;NMTAMAX;RIAMAX;AMAXRI;WHEEL_DIAM;TYRE_C0TC;TYRE_CTCTE;TYRE_CTCON;TYRE_VOL;PARTS_A0;PARTS_A1;PARTS_KP;RI_SHAPE;RIMIN;CPCON;PARTS_K0PC;PARTS_K1PC;LAB_A0;LAB_A1;LAB_K0LH;LAB_K1LH;OPTLIFE_A0;OPTLIFE_A1;OPTLIFE_A2;OPTLIFE_A3;OPTLIFE_A4;EM_CATCONVTR;EN_FUELTYP;EN_PRODVEH;EN_PCTPART;EN_PCTVEH;EN_TYREWGT;EN_TAREWGT;EN_TAREUNT;NM_WHEEL;NM_PAYLOAD;NM_VDESP;NM_VDESU;NM_A_RGH;NM_CRGR;NM_A_GRD;NM_A_RMC;NM_B_RMC;NM_KEF;EUC_PSGR;EUC_ENERGY;FUC_PSGR;FUC_CARGO;FUC_ENERGY;EMRAT_A0;EMRAT_A1;EMRAT_A2;KPFAC;KPEA;\n";
?>
    <div class="container top">
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").'/hdm_veiculos/relatorios/'.$ano; ?>">
	            <?php echo ucfirst('HDM Veículos Relatórios');?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <?php echo ucfirst('Relatório Solicitado');?>
	        </li>
	      </ul>
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst('HDM Veículos');?>
              <a  href="<?php echo site_url("assets").'/'.$this->uri->segment(2).'/'.$nameFile; ?>" class="btn btn-success">Baixar Arquivo</a>
            </h2>
          </div>
	  <div class="row">
        <div class="span12 columns">
         <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">VEH_ID</th>
				<th class="yellow header headerSortDown">VEH_NAME</th>
				<th class="yellow header headerSortDown">CATEGORY</th>
				<th class="yellow header headerSortDown">BASE_TYPE</th>
				<th class="yellow header headerSortDown">CLASS</th>
				<th class="yellow header headerSortDown">INFO</th>
				<th class="yellow header headerSortDown">LIFE_MODEL</th>
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
				<th class="yellow header headerSortDown">EUC_VEH</th>
				<th class="yellow header headerSortDown">EUC_TYRE</th>
				<th class="yellow header headerSortDown">EUC_FUEL</th>
				<th class="yellow header headerSortDown">EUC_OIL</th>
				<th class="yellow header headerSortDown">EUC_LABOUR</th>
				<th class="yellow header headerSortDown">EUC_CREW</th>
				<th class="yellow header headerSortDown">EUC_OHEAD</th>
				<th class="yellow header headerSortDown">EUC_INTRST</th>
				<th class="yellow header headerSortDown">EUC_WORK</th>
				<th class="yellow header headerSortDown">EUC_NONWRK</th>
				<th class="yellow header headerSortDown">EUC_CARGO</th>
				<th class="yellow header headerSortDown">FUC_VEH</th>
				<th class="yellow header headerSortDown">FUC_TYRE</th>
				<th class="yellow header headerSortDown">FUC_FUEL</th>
				<th class="yellow header headerSortDown">FUC_OIL</th>
				<th class="yellow header headerSortDown">FUC_LABOUR</th>
				<th class="yellow header headerSortDown">FUC_CREW</th>
				<th class="yellow header headerSortDown">FUC_OHEAD</th>
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
	              $dados ='';
	              foreach($hdm_relatorio as $row)
	              {
	                echo '<tr>';
	                echo '<td>'.$row['VEH_ID'].'</td>';
					echo '<td>'.$row['VEH_NAME'].'</td>';
					echo '<td>'.$row['CATEGORY'].'</td>';
					echo '<td>'.$row['BASE_TYPE'].'</td>';
					echo '<td>'.$row['CLASS'].'</td>';
					echo '<td>'.$row['INFO'].'</td>';
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
					echo '<td>'.$row['EUC_VEH'].'</td>';
					echo '<td>'.$row['EUC_TYRE'].'</td>';
					echo '<td>'.$row['EUC_FUEL'].'</td>';
					echo '<td>'.$row['EUC_OIL'].'</td>';
					echo '<td>'.$row['EUC_LABOUR'].'</td>';
					echo '<td>'.$row['EUC_CREW'].'</td>';
					echo '<td>'.$row['EUC_OHEAD'].'</td>';
					echo '<td>'.$row['EUC_INTRST'].'</td>';
					echo '<td>'.$row['EUC_WORK'].'</td>';
					echo '<td>'.$row['EUC_NONWRK'].'</td>';
					echo '<td>'.$row['EUC_CARGO'].'</td>';
					echo '<td>'.$row['FUC_VEH'].'</td>';
					echo '<td>'.$row['FUC_TYRE'].'</td>';
					echo '<td>'.$row['FUC_FUEL'].'</td>';
					echo '<td>'.$row['FUC_OIL'].'</td>';
					echo '<td>'.$row['FUC_LABOUR'].'</td>';
					echo '<td>'.$row['FUC_CREW'].'</td>';
					echo '<td>'.$row['FUC_OHEAD'].'</td>';
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
                echo "</tr>";
                $file =  HDM_VEICULOS_FOLDER."/".$nameFile;
                $dados .= number_format($row['VEH_ID'], 2, ',', '.').";".$row['VEH_NAME'].";".number_format($row['CATEGORY'], 2, ',', '.').";".number_format($row['BASE_TYPE'], 2, ',', '.').";".number_format($row['CLASS'], 2, ',', '.').";".$row['INFO'].";".number_format($row['LIFE_MODEL'], 2, ',', '.').";".number_format($row['PCSE'], 2, ',', '.').";".number_format($row['NUM_WHEELS'], 2, ',', '.').";".number_format($row['NUM_AXLES'], 2, ',', '.').";".number_format($row['TYRE_TYPE'], 2, ',', '.').";".number_format($row['TYRE_NR0'], 2, ',', '.').";".number_format($row['TYRE_RREC'], 2, ',', '.').";".number_format($row['AKM0'], 2, ',', '.').";".number_format($row['HRWK0'], 2, ',', '.').";".number_format($row['LIFE0'], 2, ',', '.').";".number_format($row['PP'], 2, ',', '.').";".number_format($row['PAX'], 2, ',', '.').";".number_format($row['W'], 2, ',', '.').";".number_format($row['WEIGHT_OP'], 2, ',', '.').";".number_format($row['WGT_UNIT'], 2, ',', '.').";".number_format($row['ESAL'], 2, ',', '.').";".number_format($row['EUC_VEH'], 2, ',', '.').";".number_format($row['EUC_TYRE'], 2, ',', '.').";".number_format($row['EUC_FUEL'], 2, ',', '.').";".number_format($row['EUC_OIL'], 2, ',', '.').";".number_format($row['EUC_LABOUR'], 2, ',', '.').";".number_format($row['EUC_CREW'], 2, ',', '.').";".number_format($row['EUC_OHEAD'], 2, ',', '.').";".number_format($row['EUC_INTRST'], 2, ',', '.').";".number_format($row['EUC_WORK'], 2, ',', '.').";".number_format($row['EUC_NONWRK'], 2, ',', '.').";".number_format($row['EUC_CARGO'], 2, ',', '.').";".number_format($row['FUC_VEH'], 2, ',', '.').";".number_format($row['FUC_TYRE'], 2, ',', '.').";".number_format($row['FUC_FUEL'], 2, ',', '.').";".number_format($row['FUC_OIL'], 2, ',', '.').";".number_format($row['FUC_LABOUR'], 2, ',', '.').";".number_format($row['FUC_CREW'], 2, ',', '.').";".number_format($row['FUC_OHEAD'], 2, ',', '.').";".number_format($row['FUC_INTRST'], 2, ',', '.').";".number_format($row['AF'], 2, ',', '.').";".number_format($row['CD'], 2, ',', '.').";".number_format($row['CDMULT'], 2, ',', '.').";".number_format($row['CR_B_A0'], 2, ',', '.').";".number_format($row['CR_B_A1'], 2, ',', '.').";".number_format($row['CR_B_A2'], 2, ',', '.').";".number_format($row['PDRIVE'], 2, ',', '.').";".number_format($row['PDRV_UNITS'], 2, ',', '.').";".number_format($row['PBRAKE'], 2, ',', '.').";".number_format($row['PBRK_UNITS'], 2, ',', '.').";".number_format($row['PRAT'], 2, ',', '.').";".number_format($row['PRAT_UNITS'], 2, ',', '.').";".number_format($row['FPLIM'], 2, ',', '.').";".number_format($row['B_VDES2'], 2, ',', '.').";".number_format($row['B_VDES_A0'], 2, ',', '.').";".number_format($row['B_VDES_A1'], 2, ',', '.').";".number_format($row['B_VDES_A2'], 2, ',', '.').";".number_format($row['B_VDES_CW1'], 2, ',', '.').";".number_format($row['B_VDES_CW2'], 2, ',', '.').";".number_format($row['C_VDES2'], 2, ',', '.').";".number_format($row['C_VDES_A0'], 2, ',', '.').";".number_format($row['C_VDES_A1'], 2, ',', '.').";".number_format($row['C_VDES_A2'], 2, ',', '.').";".number_format($row['C_VDES_CW1'], 2, ',', '.').";".number_format($row['C_VDES_CW2'], 2, ',', '.').";".number_format($row['U_VDES2'], 2, ',', '.').";".number_format($row['U_VDES_A0'], 2, ',', '.').";".number_format($row['U_VDES_A1'], 2, ',', '.').";".number_format($row['U_VDES_A2'], 2, ',', '.').";".number_format($row['U_VDES_CW1'], 2, ',', '.').";".number_format($row['U_VDES_CW2'], 2, ',', '.').";".number_format($row['VCURVE_A0'], 2, ',', '.').";".number_format($row['VCURVE_A1'], 2, ',', '.').";".number_format($row['VROUGH_A0'], 2, ',', '.').";".number_format($row['ARVMAX'], 2, ',', '.').";".number_format($row['SPEED_SIG'], 2, ',', '.').";".number_format($row['SPEED_BETA'], 2, ',', '.').";".number_format($row['COV'], 2, ',', '.').";".number_format($row['CGR_A0'], 2, ',', '.').";".number_format($row['CGR_A1'], 2, ',', '.').";".number_format($row['CGR_A2'], 2, ',', '.').";".number_format($row['RPM_A0'], 2, ',', '.').";".number_format($row['RPM_A1'], 2, ',', '.').";".number_format($row['RPM_A2'], 2, ',', '.').";".number_format($row['RPM_A3'], 2, ',', '.').";".number_format($row['RPM_IDLE'], 2, ',', '.').";".number_format($row['IDLE_FUEL'], 2, ',', '.').";".number_format($row['ZETAB'], 2, ',', '.').";".number_format($row['EHP'], 2, ',', '.').";".number_format($row['EDT'], 2, ',', '.').";".number_format($row['PACCS_A0'], 2, ',', '.').";".number_format($row['PCTPENG'], 2, ',', '.').";".number_format($row['OILCONT'], 2, ',', '.').";".number_format($row['OILOPER'], 2, ',', '.').";".number_format($row['AMAXV'], 2, ',', '.').";".number_format($row['FRIAMAX'], 2, ',', '.').";".number_format($row['NMTAMAX'], 2, ',', '.').";".number_format($row['RIAMAX'], 2, ',', '.').";".number_format($row['AMAXRI'], 2, ',', '.').";".number_format($row['WHEEL_DIAM'], 2, ',', '.').";".number_format($row['TYRE_C0TC'], 2, ',', '.').";".number_format($row['TYRE_CTCTE'], 2, ',', '.').";".number_format($row['TYRE_CTCON'], 2, ',', '.').";".number_format($row['TYRE_VOL'], 2, ',', '.').";".number_format($row['PARTS_A0'], 2, ',', '.').";".number_format($row['PARTS_A1'], 2, ',', '.').";".number_format($row['PARTS_KP'], 2, ',', '.').";".number_format($row['RI_SHAPE'], 2, ',', '.').";".number_format($row['RIMIN'], 2, ',', '.').";".number_format($row['CPCON'], 2, ',', '.').";".number_format($row['PARTS_K0PC'], 2, ',', '.').";".number_format($row['PARTS_K1PC'], 2, ',', '.').";".number_format($row['LAB_A0'], 2, ',', '.').";".number_format($row['LAB_A1'], 2, ',', '.').";".number_format($row['LAB_K0LH'], 2, ',', '.').";".number_format($row['LAB_K1LH'], 2, ',', '.').";".number_format($row['OPTLIFE_A0'], 2, ',', '.').";".number_format($row['OPTLIFE_A1'], 2, ',', '.').";".number_format($row['OPTLIFE_A2'], 2, ',', '.').";".number_format($row['OPTLIFE_A3'], 2, ',', '.').";".number_format($row['OPTLIFE_A4'], 2, ',', '.').";".number_format($row['EM_CATCONVTR'], 2, ',', '.').";".number_format($row['EN_FUELTYP'], 2, ',', '.').";".number_format($row['EN_PRODVEH'], 2, ',', '.').";".number_format($row['EN_PCTPART'], 2, ',', '.').";".number_format($row['EN_PCTVEH'], 2, ',', '.').";".number_format($row['EN_TYREWGT'], 2, ',', '.').";".number_format($row['EN_TAREWGT'], 2, ',', '.').";".number_format($row['EN_TAREUNT'], 2, ',', '.').";".number_format($row['NM_WHEEL'], 2, ',', '.').";".number_format($row['NM_PAYLOAD'], 2, ',', '.').";".number_format($row['NM_VDESP'], 2, ',', '.').";".number_format($row['NM_VDESU'], 2, ',', '.').";".number_format($row['NM_A_RGH'], 2, ',', '.').";".number_format($row['NM_CRGR'], 2, ',', '.').";".number_format($row['NM_A_GRD'], 2, ',', '.').";".number_format($row['NM_A_RMC'], 2, ',', '.').";".number_format($row['NM_B_RMC'], 2, ',', '.').";".number_format($row['NM_KEF'], 2, ',', '.').";".number_format($row['EUC_PSGR'], 2, ',', '.').";".number_format($row['EUC_ENERGY'], 2, ',', '.').";".number_format($row['FUC_PSGR'], 2, ',', '.').";".number_format($row['FUC_CARGO'], 2, ',', '.').";".number_format($row['FUC_ENERGY'], 2, ',', '.').";".number_format($row['EMRAT_A0'], 2, ',', '.').";".number_format($row['EMRAT_A1'], 2, ',', '.').";".number_format($row['EMRAT_A2'], 2, ',', '.').";".number_format($row['KPFAC'], 2, ',', '.').";".number_format($row['KPEA'], 2, ',', '.').";\n";
              }
              ?>      
            </tbody>
          </table>

          <?php
          	file_put_contents($file, $cabecalho.$dados);
          ?>

      </div>        </div>