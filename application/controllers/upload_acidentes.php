<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
class upload_acidentes extends App_controller {
	
const VIEW_FOLDER = 'admin/upload_acidentes';
    public function __construct()
	{
        parent::__construct();
        $this->load->model('upload_acidentesdao');

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }

    //uf;data;classificacao;descricao;rodovia;km;hora;qnt_acidentes;feridos_leve;feridos;mortos
    
    public function index()
    { 

    	// talvez n dê andamento a essa funcao
        $fileName = 'XXX.txt';
        $inputFile = UPLOAD . $fileName;  
        $separador = "\t";
        
        $fp = fopen($inputFile, "r");
        $fileLines = array();
        
        $i = 0;
        while (!feof($fp)){
        	//$test = fgets($fp) . "<br>";
        	$convert[] = fgets($fp);
        	//$rows[] = $convert;
        }
        
        $k = 0;
        for($i=0; $i<count($convert)-1;$i++){
        	$temp =  explode("$separador", $convert[$i]);        	
        	$data = explode("/", $temp[1]);
        	$temp[1] = $data[2].'-'.$data[1].'-'.$data[0];
        	$rows =  array( 'uf' =>		 	$temp[0], 
        					 'data' => 			$temp[1],
        					 'classificacao' => $temp[2], 
        					 'descricao' => 	$temp[3], 
        					 'rodovia' =>		$temp[4], 
        					 'km' => 			$temp[5], 
        					 'hora' => 			$temp[6], 
        					 'qnt_acidentes' => $temp[7], 
        					 'feridos_leve' => 	$temp[8], 
        					 'feridos' => 		$temp[9], 
        					 'mortos' => 		$temp[10]        			
        	);
        	
        	//para inserir no DB
        	//$this->upload_acidentesdao->store_upload_acidentes($rows);
        	
        }
        /*
        echo '<pre>';
        	print_r($rows);
        echo '</pre>';
        */
        echo $i;
        unset($rows);
        
        fclose($fp);
       	die;
 		//$this->load->model('upload_acidentesdao');
		//$acidente = mew upload_acidentesdao();
				
        //load the view
        $data['main_content'] = 'admin/upload_acidentes/list';
        $this->load->view('includes/template', $data);  

    }//index
    
    public function completo2004($fileName)
    {
    
    	// talvez n dê andamento a essa funcao
    	$inputFile = UPLOAD . $fileName;
    	$separador = "\t";
    
    	$fp = fopen($inputFile, "r");
    	$fileLines = array();
    
    	
    	while (!feof($fp)){
    		$convert[] = fgets($fp);
    	}
    	
    	//echo count($convert);
    	for($i=0; $i<count($convert);$i++){
    		$temp =  explode("$separador", $convert[$i]);
    		
    		// array com 113 elementos, com quebra de linha fantasma, este teste se torna necessario
    		if(!array_key_exists('113', $temp)){
    			echo 'A linha:'.$i.' de '.$fileName.' possui um problema de formatacao, por favor acerte isso e tente novamente<br>';
    		}
    		
    		
    		
    		$rowAcidente =  array(
    				'ano' =>	 		$temp[4],
    				'uf' =>		 		$temp[9],
    				'data' => 			$temp[4].'-'.$this->getMonthInt($temp[3]).'-'.$temp[2],
    				'classificacao' => 	$temp[26],
    				'descricao' => 		$temp[12],
    				'rodovia' =>		$temp[7],
    				'km' => 			str_replace(',' , '.' , $temp[8]),
    				'sentido' =>		$temp[28],
    				'hora' => 			$temp[5],
    				'qnt_acidentes' =>  1,
    				'ilesos' => 		$temp[25],
    				'feridos_leve' => 	0,
    				'feridos' => 		$temp[24],
    				'mortos' => 		$temp[23]
    		);
    		
    		
    		$rowLocal =  array(
    				'classificacao_acidente' =>	$temp[26],
    				'pista' =>	 			$temp[27],
    				'sentido' =>			$temp[28],
    				'tracado' => 			$temp[29],
    				'pavimento' => 			$temp[30],
    				'condicao_pista' => 	$temp[31],
    				'superficie' =>			$temp[32],
    				'obras_arte' => 		$temp[33],
    				'sinal_horizontal' =>	$temp[32],
    				'sinal_vertical' =>  	$temp[35],
    				'tempo' => 				$temp[36],
    				'fase_dia' => 			$temp[37]
    		);
    		
    		
    		$superficie = strtoupper($temp[32]);
    		
    		if($superficie == 'SECA'){
    			$seca = 'sim';
    			$molhada = 'não';
    			$outros = 'não';
    		}else if($superficie == 'MOLHADA'){
    			$seca = 'não';
    			$molhada = 'sim';
    			$outros = 'não';
    		}else{
    			$seca = 'não';
    			$molhada = 'não';
    			$outros = 'sim';
    		}
    		
    		$rowSuperficiePista =  array(
    				'buraco' =>				null,
    				'gelo' =>	 			null,
    				'enlameada' =>			null,
    				'material_granulado' => null,
    				'molhada' => 			$molhada,
    				'em_obra' => 			null,
    				'oleosa' =>				null,
    				'seca' => 				$seca,
    				'escorregadia' =>		null,
    				'outra' =>  			$outros
    		);
    		
    		$rowCondMortos =  array(
    				'condutor' =>	$temp[17],
    				'passageiro' =>	$temp[18],
    				'pedestre' =>	$temp[19],
    				'outros' => 	$temp[20],
    		);
    		
    		$rowTipoVeiculo =  array(
    				'bicicleta' =>			$temp[40],
    				'motoneta_ciclomotor' =>$temp[41],
    				'motocicleta' =>		$temp[42],
    				'triciclo_quadriciclo' =>$temp[43],
    				'automovel' => 			$temp[44],
    				'caminhonete_caminhoneta' => 	$temp[45] + $temp[46],
    				'micro_onibus' => 		$temp[47],
    				'onibus' =>				$temp[48],
    				'caminhao' =>  			$temp[49],
    				'reboque_semi_reboque' =>$temp[50] + $temp[51],
    				'caminhao_trator' =>	$temp[52] + $temp[53],
    				'tracao_animal' =>		$temp[54],
    				'outros' =>  			$temp[55]
    		);
    		
    		
    		$rowEstadoPneus =  array(
    				'bom' =>		$temp[65],
    				'regular' =>	$temp[66],
    				'liso' =>		$temp[67],
    				'ignorado' => 	$temp[68]
    		);
    		
    		$rowTipoCarga =  array(
    				'sem_carga' =>			$temp[56],
    				'nao_aplicavel' =>		$temp[57],
    				'carga_viva' =>			$temp[58],
    				'nao_classificado' => 	$temp[59],
    				'produto_perigoso' => 	$temp[60],
    				'eletro_eletronico' => 	$temp[61],
    				'alimenticio' =>		$temp[62],
    				'outros' => 			$temp[63]
    		);
    		
    		$rowCategoriaCNH =  array(
    				'a' =>				$temp[70],
    				'b' =>	 			$temp[71],
    				'c' =>				$temp[72],
    				'd' => 				$temp[73],
    				'e' => 				$temp[74],
    				'ab' => 			$temp[75],
    				'ac' =>				$temp[76],
    				'ad' => 			$temp[77],
    				'ae' =>				$temp[78],
    				'cnh_vencida' =>  	$temp[79],
    				'nao_habilitado' => $temp[80],
    				'nao_exigivel' =>	$temp[81],
    				'ignorado' =>		$temp[82]
    		);
    		
    		// verificar a partir daki
    		
    		$rowEstadoEmbriagues =  array(
    				'negativo' =>	$temp[106],
    				'aparente' =>	$temp[107],
    				'positivo' =>	$temp[108],
    				'laudo' => 		$temp[109],
    				'ignorado' => 	$temp[110]
    		);
    		
    		 $rowTempoHabilitacao =  array(
    				'menos_1ano' =>		$temp[83],
    				'1_4' =>	 		$temp[84],
    				'4_9' =>			$temp[85],
    				'10_14' => 			$temp[86],
    				'15_19' => 			$temp[87],
    				'20_24' => 			$temp[88],
    				'25_29' =>			$temp[89],
    				'mais_29' => 		$temp[90],
    				'inabilitado' =>	$temp[91],
    				'ignorado' =>  		$temp[92],
    				'nao_exigivel' => 	$temp[93]
    		);
    			
			$rowHorasDirigindo =  array(
    				'15_min' =>			$temp[98],
    				'15_1h' =>	 		$temp[99],
    				'1_2' =>			$temp[100],
    				'2_3' => 			$temp[101],
    				'3_4' => 			$temp[102],
    				'4_5' => 			$temp[103],
    				'mais_5' =>			$temp[104],
    				'ignorado' => 		$temp[105]
    		);
    		
    		$rowNumeroCondutores =  array(
    				'masculino' =>			$temp[14],
    				'feminino' =>	 		$temp[15],
    				'ignorado' =>			$temp[16]
    		);	
    		
    		$rowDadosPRF =  array(
    				'policial' =>		$temp[0],
    				'bo' =>	 			$temp[1],
    				'regional' =>		$temp[10],
    				'delegacia' => 		$temp[11],
    				'fator_contrib' => 	$temp[13]
    		);
    		
    		$rowDadosAdicionais =  array(
    				'proprietario' =>		$temp[38],
    				'placas' =>	 			$temp[39],
    				'condutor' =>			$temp[69],
    				'nome_vitimas' =>		$temp[111],
    				'socorro_prf' => 		$temp[112],
    				'assento_infantil' => 	$temp[113]
    		);	
    		
    		$rowUsoCintoCapacete =  array(
    				'sim' =>			$temp[94],
    				'nao' =>			$temp[95],
    				'ignorado' =>		$temp[96],
    				'nao_exigivel' => 	$temp[97] 
    		);
    		
    		//para inserir no DB
    		$this->upload_acidentesdao->insert_from_file(	$rowAcidente, $rowLocal, $rowCondMortos, $rowTipoVeiculo, $rowEstadoPneus, 
									$rowCategoriaCNH,  $rowEstadoEmbriagues, $rowTempoHabilitacao, $rowHorasDirigindo, 
									$rowNumeroCondutores, $rowDadosPRF, $rowDadosAdicionais,  $rowTipoCarga, $rowUsoCintoCapacete, $rowSuperficiePista );
    		  
    		 
    		
    		
    	}
    	
    
    	fclose($fp);
    	echo '<br> 2004 '.$fileName.' terminou de processar com suscesso.<br>';
    }

    public function completo2005($fileName)
    {
    
    	// talvez n dê andamento a essa funcao    	
    	$inputFile = UPLOAD . $fileName;
    	$separador = "\t";
    
    	$fp = fopen($inputFile, "r");
    	$fileLines = array();
    
    
    	while (!feof($fp)){
    		$convert[] = fgets($fp);
    	}
    
    	//echo count($convert);
    	for($i=0; $i<count($convert);$i++){
    		$temp =  explode("$separador", $convert[$i]);
    
    		// array com 110 elementos, com quebra de linha fantasma, este teste se torna necessario
    		if(!array_key_exists('112', $temp)){
    			echo 'A linha:'.$i.' de '.$fileName.' possui um problema de formatacao, por favor acerte isso e tente novamente<br>';
    			die;
    		}
    		
    		// possui o dado de feridos leves, mas n existe esse registro nas outras tabelas
    		$rowAcidente =  array(
    				'ano' =>	 		$temp[4],
    				'uf' =>		 		$temp[7],
    				'data' => 			$temp[4].'-'.$temp[3].'-'.$temp[2],
    				'classificacao' => 	$temp[43],
    				'descricao' => 		$temp[12],
    				'rodovia' =>		$temp[8],
    				'km' => 			str_replace(',' , '.' , $temp[9]),
    				'sentido' =>		$temp[45],
    				'hora' => 			$temp[5],
    				'qnt_acidentes' =>  1,
    				'ilesos' => 		$temp[42],
    				'feridos_leve' => 	$temp[40],
    				'feridos' => 		$temp[41] + $temp[40],
    				'mortos' => 		$temp[39]
    		);
    
    
    		$rowLocal =  array(
    				'classificacao_acidente' =>	$temp[43],
    				'pista' =>	 			$temp[44],
    				'sentido' =>			$temp[45],
    				'tracado' => 			$temp[46],
    				'pavimento' => 			null,
    				'condicao_pista' => 	$temp[47],
    				'superficie' =>			null,
    				'obras_arte' => 		null,
    				'sinal_horizontal' =>	null,
    				'sinal_vertical' =>  	null,
    				'tempo' => 				$temp[48],
    				'fase_dia' => 			$temp[49]
    		);
    
    		$rowSuperficiePista =  array(
    				'buraco' =>				$temp[50],
    				'gelo' =>	 			$temp[51],
    				'enlameada' =>			$temp[52],
    				'material_granulado' => $temp[53],
    				'molhada' => 			$temp[54],
    				'em_obra' => 			$temp[55],
    				'oleosa' =>				$temp[56],
    				'seca' => 				$temp[57],
    				'escorregadia' =>		$temp[58],
    				'outra' =>  			$temp[59]
    		);
    
    		$rowCondMortos =  array(
    				'condutor' =>	$temp[17],
    				'passageiro' =>	$temp[18],
    				'pedestre' =>	$temp[19],
    				'outros' => 	$temp[20],
    		);
    
    		$rowTipoVeiculo =  array(
    				'bicicleta' =>			$temp[60],
    				'motoneta_ciclomotor' =>$temp[61],
    				'motocicleta' =>		$temp[62],
    				'triciclo_quadriciclo' =>$temp[63],
    				'automovel' => 			$temp[64],
    				'caminhonete_caminhoneta' => 	$temp[65],
    				'micro_onibus' => 		$temp[66],
    				'onibus' =>				$temp[67],
    				'caminhao' =>  			$temp[68],
    				'reboque_semi_reboque' =>$temp[69],
    				'caminhao_trator' =>	$temp[70],
    				'tracao_animal' =>		$temp[71],
    				'outros' =>  			$temp[72]
    		);
    
    
    		$rowEstadoPneus =  array(
    				'bom' =>		$temp[73],
    				'regular' =>	null,
    				'liso' =>		$temp[74],
    				'ignorado' => 	$temp[75]
    		);
    		
    		$rowTipoCarga =  array();
    
    		$rowCategoriaCNH =  array(
    				'a' =>				$temp[76],
    				'b' =>	 			$temp[77],
    				'c' =>				$temp[78],
    				'd' => 				$temp[79],
    				'e' => 				$temp[80],
    				'ab' => 			$temp[81],
    				'ac' =>				$temp[82],
    				'ad' => 			$temp[83],
    				'ae' =>				$temp[84],
    				'cnh_vencida' =>  	null,
    				'nao_habilitado' => $temp[85],
    				'nao_exigivel' =>	null,
    				'ignorado' =>		$temp[86]
    		);
    
    		// verificar a partir daki
    
    		$rowEstadoEmbriagues =  array(
    				'negativo' =>	$temp[109],
    				'aparente' =>	null,
    				'positivo' =>	$temp[108],
    				'laudo' => 		null,
    				'ignorado' => 	$temp[110]
    		);
    
    		$rowTempoHabilitacao =  array(
    				'menos_1ano' =>		$temp[87],
    				'1_4' =>	 		$temp[88],
    				'4_9' =>			$temp[89],
    				'10_14' => 			$temp[90],
    				'15_19' => 			$temp[91],
    				'20_24' => 			$temp[92],
    				'25_29' =>			$temp[93],
    				'mais_29' => 		$temp[94],
    				'inabilitado' =>	$temp[95],
    				'ignorado' =>  		$temp[96],
    				'nao_exigivel' => 	null
    		);
    		 
    		$rowHorasDirigindo =  array(
    				'15_min' =>			$temp[100],
    				'15_1h' =>	 		$temp[101],
    				'1_2' =>			$temp[102],
    				'2_3' => 			$temp[103],
    				'3_4' => 			$temp[104],
    				'4_5' => 			$temp[105],
    				'mais_5' =>			$temp[106],
    				'ignorado' => 		$temp[107]
    		);
    
    		$rowNumeroCondutores =  array(
    				'masculino' =>			$temp[14],
    				'feminino' =>	 		$temp[15],
    				'ignorado' =>			$temp[16]
    		);
    
    		$rowDadosPRF =  array(
    				'policial' =>		$temp[0],
    				'bo' =>	 			$temp[1],
    				'regional' =>		$temp[10],
    				'delegacia' => 		$temp[11],
    				'fator_contrib' => 	$temp[13]
    		);
    
    		$rowDadosAdicionais =  array(
    				'proprietario' =>		null,
    				'placas' =>	 			null,
    				'condutor' =>			null,
    				'nome_vitimas' =>		null,
    				'socorro_prf' => 		$temp[111],
    				'assento_infantil' => 	null
    		);
    
    		$rowUsoCintoCapacete =  array(
    				'sim' =>			$temp[97],
    				'nao' =>			$temp[98],
    				'ignorado' =>		$temp[99],
    				'nao_exigivel' => 	null
    		);
    
    		//para inserir no DB
    		$this->upload_acidentesdao->insert_from_file2005(	$rowAcidente, $rowLocal, $rowCondMortos, $rowTipoVeiculo, $rowEstadoPneus,
    				$rowCategoriaCNH,  $rowEstadoEmbriagues, $rowTempoHabilitacao, $rowHorasDirigindo,
    				$rowNumeroCondutores, $rowDadosPRF, $rowDadosAdicionais,  $rowUsoCintoCapacete, $rowSuperficiePista );
    		
    		 
    
    
    	}
    
    
    	fclose($fp);
    	echo '<br> 2005 '.$fileName.' terminou de processar com suscesso.<br>';
    
    }
    
    public function completo2006($fileName)
    {
    
    	// talvez n dê andamento a essa funcao    	
    	$inputFile = UPLOAD . $fileName;
    	$separador = "\t";
    
    	$fp = fopen($inputFile, "r");
    	$fileLines = array();
    
    	 
    	while (!feof($fp)){
    		$convert[] = fgets($fp);
    	}
    	 
    	//echo count($convert);
    	for($i=0; $i<count($convert);$i++){
    		$temp =  explode("$separador", $convert[$i]);
    		
    		 // array com 110 elementos, com quebra de linha fantasma, este teste se torna necessario
    		if(!array_key_exists('110', $temp)){
    			echo 'A linha:'.$i.' de '.$fileName.' possui um problema de formatacao, por favor acerte isso e tente novamente<br>';
    			die;
    		}
    		
    		$rowAcidente =  array(
    				'ano' =>	 		$temp[4],
    				'uf' =>		 		$temp[7],
    				'data' => 			$temp[4].'-'.$this->getMonthInt($temp[3]).'-'.$temp[2],
    				'classificacao' => 	$temp[42],
    				'descricao' => 		$temp[12],
    				'rodovia' =>		$temp[8],
    				'km' => 			str_replace(',' , '.' , $temp[9]),
    				'sentido' =>		$temp[44],
    				'hora' => 			$temp[5],
    				'qnt_acidentes' =>  1,
    				'ilesos'		=>	$temp[41],
    				'feridos_leve' => 	0,
    				'feridos' => 		$temp[40],
    				'mortos' => 		$temp[39]
    		);
    
    
    		$rowLocal =  array(
    				'classificacao_acidente' =>	$temp[42],
    				'pista' =>	 			$temp[43],
    				'sentido' =>			$temp[44],
    				'tracado' => 			$temp[45],
    				'pavimento' => 			null,
    				'condicao_pista' => 	$temp[46],
    				'superficie' =>			null,
    				'obras_arte' => 		null,
    				'sinal_horizontal' =>	null,
    				'sinal_vertical' =>  	null,
    				'tempo' => 				$temp[47],
    				'fase_dia' => 			$temp[48]
    		);
    		
    		$rowSuperficiePista =  array(
    				'buraco' =>				$temp[49],
    				'gelo' =>	 			$temp[50],
    				'enlameada' =>			$temp[51],
    				'material_granulado' => $temp[52],
    				'molhada' => 			$temp[53],
    				'em_obra' => 			$temp[54],
    				'oleosa' =>				$temp[55],
    				'seca' => 				$temp[56],
    				'escorregadia' =>		$temp[57],
    				'outra' =>  			$temp[58]
    		);
    		
    		$rowCondMortos =  array(
    				'condutor' =>	$temp[17],
    				'passageiro' =>	$temp[18],
    				'pedestre' =>	$temp[19],
    				'outros' => 	$temp[20],
    		);
    
    		$rowTipoVeiculo =  array(
    				'bicicleta' =>			$temp[59],
    				'motoneta_ciclomotor' =>$temp[60],
    				'motocicleta' =>		$temp[61],
    				'triciclo_quadriciclo' =>$temp[62],
    				'automovel' => 			$temp[63],
    				'caminhonete_caminhoneta' => 	$temp[64],
    				'micro_onibus' => 		$temp[65],
    				'onibus' =>				$temp[66],
    				'caminhao' =>  			$temp[67],
    				'reboque_semi_reboque' =>$temp[68],
    				'caminhao_trator' =>	$temp[69],
    				'tracao_animal' =>		$temp[70],
    				'outros' =>  			$temp[71]
    		);
    
    
    		$rowEstadoPneus =  array(
    				'bom' =>		$temp[72],
    				'regular' =>	null,
    				'liso' =>		$temp[73],
    				'ignorado' => 	$temp[74]
    		);
    		
    		$rowTipoCarga =  array();
    		
    		$rowCategoriaCNH =  array(
    				'a' =>				$temp[75],
    				'b' =>	 			$temp[76],
    				'c' =>				$temp[77],
    				'd' => 				$temp[78],
    				'e' => 				$temp[79],
    				'ab' => 			$temp[80],
    				'ac' =>				$temp[81],
    				'ad' => 			$temp[82],
    				'ae' =>				$temp[83],
    				'cnh_vencida' =>  	null,
    				'nao_habilitado' => $temp[84],
    				'nao_exigivel' =>	null,
    				'ignorado' =>		$temp[85]
    		);
    
    		// verificar a partir daki
    
    		$rowEstadoEmbriagues =  array(
    				'negativo' =>	$temp[108],
    				'aparente' =>	null,
    				'positivo' =>	$temp[107],
    				'laudo' => 		null,
    				'ignorado' => 	$temp[109]
    		);
    
    		$rowTempoHabilitacao =  array(
    				'menos_1ano' =>		$temp[86],
    				'1_4' =>	 		$temp[87],
    				'4_9' =>			$temp[88],
    				'10_14' => 			$temp[89],
    				'15_19' => 			$temp[90],
    				'20_24' => 			$temp[91],
    				'25_29' =>			$temp[92],
    				'mais_29' => 		$temp[93],
    				'inabilitado' =>	$temp[94],
    				'ignorado' =>  		$temp[95],
    				'nao_exigivel' => 	null
    		);
    		 
    		$rowHorasDirigindo =  array(
    				'15_min' =>			$temp[99],
    				'15_1h' =>	 		$temp[100],
    				'1_2' =>			$temp[101],
    				'2_3' => 			$temp[102],
    				'3_4' => 			$temp[103],
    				'4_5' => 			$temp[104],
    				'mais_5' =>			$temp[105],
    				'ignorado' => 		$temp[106]
    		);
    
    		$rowNumeroCondutores =  array(
    				'masculino' =>			$temp[14],
    				'feminino' =>	 		$temp[15],
    				'ignorado' =>			$temp[16]
    		);
    
    		$rowDadosPRF =  array(
    				'policial' =>		$temp[0],
    				'bo' =>	 			$temp[1],
    				'regional' =>		$temp[10],
    				'delegacia' => 		$temp[11],
    				'fator_contrib' => 	$temp[13]
    		);
    
    		$rowDadosAdicionais =  array(
    				'proprietario' =>		null,
    				'placas' =>	 			null,
    				'condutor' =>			null,
    				'nome_vitimas' =>		null,
    				'socorro_prf' => 		$temp[110],
    				'assento_infantil' => 	null
    		);
    
    		$rowUsoCintoCapacete =  array(
    				'sim' =>			$temp[96],
    				'nao' =>			$temp[97],
    				'ignorado' =>		$temp[98],
    				'nao_exigivel' => 	null
    		);
    
    		//para inserir no DB
    		$this->upload_acidentesdao->insert_from_file2006(	$rowAcidente, $rowLocal, $rowCondMortos, $rowTipoVeiculo, $rowEstadoPneus,
    				$rowCategoriaCNH,  $rowEstadoEmbriagues, $rowTempoHabilitacao, $rowHorasDirigindo,
    				$rowNumeroCondutores, $rowDadosPRF, $rowDadosAdicionais,  $rowUsoCintoCapacete, $rowSuperficiePista );
    		
    		 
    
    
    	}
    	
    
    	fclose($fp);
    
    	echo '<br> 2006 '.$fileName.' terminou de processar com suscesso.<br>';
    }

    public function insert_all_data(){

    	/* funcoes para aplicar com o mysql
    	 *  SETANDO A DESCRICAO DO ACIDENTE PARA PADRONIZAR
    	 update acidentes_new set descricao = lower(descricao), classificacao = lower(classificacao),  sentido = lower(sentido);
    	 update acidentes_new set classificacao = "sem vitimas" where classificacao = "sem vitima"; 
    	 update acidentes_new set sentido = 'nao definido' where sentido = 'nao definido                                      ';
    	 update acidentes_new set descricao = "atropelamento de animal" where descricao = "atrop animal";
    	 update acidentes_new set descricao = "atropelamento de pedestre" where descricao = "atrop pedestre";
    	 update acidentes_new set descricao = "atropelamento de pedestre" where descricao = "atropelamento de pessoa";
    	 update acidentes_new set descricao = "colisao com objeto fixo" where descricao = "COL COM OB. FIXO";
    	 update acidentes_new set descricao = "colisao frontal" where descricao = "COL FRONTAL";
    	 update acidentes_new set descricao = "colisao lateral" where descricao = "COL LATERAL";
    	 update acidentes_new set descricao = "colisao transversal" where descricao = "COL TRANSVERSAL";
    	 update acidentes_new set descricao = "colisao traseira" where descricao = "COL TRASEIRA";
    	 
    	 // EM 2005, SE ESTIVER MARCADO COM VITIMA, MAS ILESOS E MORTOS ESTIVEREM ZERADOS, PROVAVELMENTE SÃO FERIDOS LEVES E GRAVES Q N ESTAO REGISTRADOS NAS CELULAS EM BRACO
    	  
    	 // hardcore !!!
    	 INSERT INTO dnitserver.acidentes_new ( ano, uf, rodovia, km, sentido, data, hora, classificacao, qnt_acidentes, ilesos, feridos_leve, feridos, mortos, descricao) (SELECT ano, uf, rodovia, km, sentido, data, hora, classificacao, qnt_acidentes, ilesos, feridos_leve, feridos, mortos, descricao FROM dnitserver.acidentes )
    	 update acidentes_new set descricao = lower(descricao), classificacao = lower(classificacao),  sentido = lower(sentido); 
    	 update acidentes_new set descricao = "atropelamento de pedestre" where descricao = "atropelamento de pessoa"; 
    	 
    	 // AQUI OUVE O POSSIVEL ERRO PARA 2005 
    	 UPDATE acidentes_new SET classificacao = "com mortos" where mortos > 0; 
    	 UPDATE acidentes_new SET classificacao = "com feridos" where mortos <= 0 and ( feridos > 0 or feridos_leve  > 0); 
    	 UPDATE acidentes_new SET classificacao = "ilesos" where mortos <= 0 and feridos <= 0 and feridos_leve  <= 0 ;
    	 
    	 // sentido
    	 UPDATE acidentes_new SET sentido = "ambos" where sentido = "0";
    	 UPDATE acidentes_new SET sentido = "ambos" where sentido = "ignorado";
    	 UPDATE acidentes_new SET sentido = "ambos" where sentido = "nao definido";
    	 UPDATE acidentes_new SET sentido = "ambos" where sentido = "" ; 
     */
    	
    	
    	/* registros 2004
    	$fileName = 'DN1S2004VER2ed.txt';
    	$this->completo2004($fileName);
		$fileName = 'DN2S2004VER2ed.txt';
    	$this->completo2004($fileName);
    	
    	
    	// registros 2005    	
    	$fileName = 'DN1S2005VER2ed.txt';
    	$this->completo2005($fileName);
    	$fileName = 'DN2S2005VER2ed.txt';
    	$this->completo2005($fileName);
    	
    	
    	// registros 2006
    	$fileName = 'DN1S2006VER2ed.txt';
    	$this->completo2006($fileName);
    	$fileName = 'DN2S2006VER2ed.txt';
    	$this->completo2006($fileName);
    	
    	*/
    	/*load the view
    	 $data['main_content'] = 'admin/upload_acidentes/list';
    	$this->load->view('includes/template', $data);
    	*/
    	
    }
    
    
}