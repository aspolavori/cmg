<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class consulta_trecho_acidentes extends App_controller {

	const VIEW_FOLDER = 'admin/consulta_trecho_acidentes';
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('consulta_trecho_acidentesdao');
        $this->load->library('gcharts');

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {
    	
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		
    		//form validation
    		$this->form_validation->set_rules('uf', 'uf', 'required');
    		$this->form_validation->set_rules('br', 'br', 'required', 'numeric');
    		$this->form_validation->set_rules('km_ini', 'km inicial', 'trim|required|numeric');
    		$this->form_validation->set_rules('km_fim', 'km final', 'trim|required|numeric');
    		$this->form_validation->set_rules('vmd', 'vmd', 'trim|required|numeric');
    		$this->form_validation->set_rules('taxa', 'taxa', 'trim|required|numeric');
    		$this->form_validation->set_rules('ano_base', 'ano_base', 'trim|required|numeric');
    		$this->form_validation->set_rules('data_ini', 'data inicial', 'trim|required|numeric');
    		$this->form_validation->set_rules('data_fim', 'data final', 'trim|required|numeric');
    		
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    	
    	
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    			
    			$data_to_store = array(	'uf' 		=> $this->input->post('uf'),
				    					'br'		=> $this->input->post('br'),
				    					'km_ini' 	=> $this->input->post('km_ini'),
				    					'km_fim' 	=> $this->input->post('km_fim'),
				    					'vdm' 		=> $this->input->post('vmd'),
				    					'taxa' 		=> $this->input->post('taxa'),
    									'ano_base' 	=> $this->input->post('ano_base'),
				    					'data_ini' 	=> $this->input->post('data_ini'),
				    					'data_fim' 	=> $this->input->post('data_fim')
    			);
    			
    			    			 
    			$this->load->model('acidentesdao');
    			$acidentes = new acidentesdao();
    			
    			$lista_acidentes = $acidentes->get_acidentes_by_trecho($data_to_store);
    			$data['acidentes'] = $lista_acidentes; 
    			 
    			$anoIniObra = substr( $data_to_store['data_ini'], 0, 4);
    			$anoFimObra =  substr( $data_to_store['data_fim'], 0, 4);
    			 
    			$relatorio_acidentes = $this->relatorio_acidentes($anoIniObra, $anoFimObra, $lista_acidentes );
    			$data['relatorio1'] = $this->relatorio_acidentes_format($relatorio_acidentes);
    				
    			// charts call
    			$this->column_chart($relatorio_acidentes, 'Relatório de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
    			
    			$indice_acidentes = $this->indice_acidentes($data_to_store, $relatorio_acidentes );
    			$data['relatorio2'] = $this->indice_acidentes_format($indice_acidentes);

    			// charts call    			 
    			$this->column_chart($indice_acidentes, 'Relatório de indide de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
    			
    			//$data['relatorio3'] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes );
    			 
    			$lista_descricao = $acidentes->get_descricao_acidentes();
    			 
    			$lista_acidentes_descricao = $acidentes->get_acidentes_descricao_by_trecho($data_to_store);    			
    			$data['relatorio4'] = $this->relatorio_acidentes_descricao($anoIniObra, $anoFimObra,$lista_descricao, $lista_acidentes_descricao );
    			
    			foreach($data['relatorio4'] as $key => $rel){
    					
    				$descr_acidente = str_replace(' ', '_', $key.'_rel4_obra');
    				$lista_acidentes_descricao_obra[] = $descr_acidente;
    					
    				$descr_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_indice_acidente');
    				$lista_indice_acidentes_descricao_obra[] = $descr_indice_acidente;
    					
    				$descr_media_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_media_indice_acidente');
    				$lista_media_indice_acidentes_descricao_obra[] = $descr_media_indice_acidente;
    					
    				$temp = array();
    				foreach($rel as $key2 => $rel2){
    					$temp[] = array('ano' =>  $key2, 'mortos' => $rel2['mortos'], 'feridos' => $rel2['feridos'], 'ilesos' => $rel2['ilesos'] );
    						
    				}
    				$data[$descr_acidente]		  = $this->relatorio_acidentes_format($temp);
    				$indice_acidentes = $this->indice_acidentes($data_to_store, $temp );
    				$data[$descr_indice_acidente] = $this->indice_acidentes_format($indice_acidentes);
    				//$data[$descr_media_indice_acidente] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes );
    				 
    			}
    			$data['list_acidente_relatorio_desc_obra'] = $lista_acidentes_descricao_obra;
    			$data['list_indice_acidente_relatorio_desc_obra'] = $lista_indice_acidentes_descricao_obra;
    			$data['lista_media_indice_acidentes_descricao_obra'] = $lista_media_indice_acidentes_descricao_obra;
    			
    		}
    		// load trecho data view
    		$data['trecho'] = $data_to_store;
    		$data['main_content'] = 'admin/relatorios/trechos';
    	}else{
    		$data['main_content'] = 'admin/consulta_trecho_acidentes/list';
    	}
    	
    	// ufs data
    	$data['ufs'] = $this->get_ufs();
    	  	
        //load the view
        
        $this->load->view('includes/template', $data);  

    }//index    

    private function relatorio_acidentes($dataIniObra, $dataFimObra, $lista_acidentes ){
    	 
    	$anoFlag   = true;
    	$anoAtual  = 0;
    	$acMortos  = 0;
    	$acFeridos = 0;
    	$acIlesos  = 0;
    	$acTotal   = 0;
    	$date = 0;
    	 
    	foreach($lista_acidentes as $item){
    		if($anoFlag == true){
    			if($item['classificacao'] == "com mortos"){
    				$acMortos++;
    			}else if($item['classificacao'] == "com feridos"){
    				$acFeridos++;
    			}else{
    				$acIlesos++;
    			}
    			$anoAtual = $item['ano'];
    			$anoFlag = false;
    		}else{
    			if($anoAtual != $item['ano']){
    				
    				$cadastro1[] = array('ano' => $anoAtual, 'mortos' => $acMortos, 'feridos' => $acFeridos, 'ilesos' => $acIlesos);
    				$anoAtual = $item['ano'];
    				$acMortos = 0;
    				$acFeridos = 0;
    				$acIlesos = 0;
    				if($item['classificacao'] == "com mortos"){
    					$acMortos++;
    				}else if($item['classificacao'] == "com feridos"){
    					$acFeridos++;
    				}else{
    					$acIlesos++;
    				}
    			}else{
    				if($item['classificacao'] == "com mortos"){
    					$acMortos++;
    				}else if($item['classificacao'] == "com feridos"){
    					$acFeridos++;
    				}else{
    					$acIlesos++;
    				}
    			}
    		}
    	}
    	$cadastro1[] = array('ano' => $anoAtual, 'mortos' => $acMortos, 'feridos' => $acFeridos, 'ilesos' => $acIlesos);
    	return $cadastro1;
    }
    // $data['obra'][0]
    private function relatorio_acidentes_format($relatorio_acidentes){
    	 
    	foreach($relatorio_acidentes as $item){
    		$ano[] 		= $item['ano'];
    		$mortos[] 	= $item['mortos'];
    		$feridos[]	= $item['feridos'];
    		$ilesos[] 	= $item['ilesos'];
    		$total[]	= $item['mortos'] + $item['feridos'] + $item['ilesos'];
    	}
    	$result['ano'] 		= $ano;
    	$result['ilesos'] 	= $ilesos;
    	$result['feridos'] 	= $feridos;
    	$result['mortos'] 	= $mortos;
    	$result['total'] 	= $total;
    	 
    	return $result;
    }
    
    private function indice_acidentes_format($indice_acidentes){
    	 
    	foreach($indice_acidentes as $item){
    		$anoInd[] 		= $item['ano'];
    		$mortosInd[] 	= $item['mortos'];
    		$feridosInd[]	= $item['feridos'];
    		$ilesosInd[] 	= $item['ilesos'];
    		$totalInd[]		= $item['total'];
    	}
    	$result['ano'] 		= $anoInd;
    	$result['ilesos'] 	= $ilesosInd;
    	$result['feridos'] 	= $feridosInd;
    	$result['mortos'] 	= $mortosInd;
    	$result['total'] 	= $totalInd;
    	 
    	return $result;
    }
    
    private function indice_acidentes($arrayObra, $relatorio_acidentes ){
    	 
    	$extTotal = $arrayObra['km_fim'] - $arrayObra['km_ini'];
    	if($extTotal == 0){
    		$extTotal = 1;
    	}
    	//$extTotal = 20;
    	$vdm_s	=	$arrayObra['vdm'];
    	$vdm_c	=	$arrayObra['vdm'];
    	$anoRef =   $arrayObra['ano_base'];
    	//$anoRef =   2010;
    	$taxa	=	$arrayObra['taxa'];
    	$anoIniObra = substr( $arrayObra['data_ini'], 0, 4);
    	$anoFimObra = substr( $arrayObra['data_fim'], 0, 4);
    	 
    	 
    	foreach($relatorio_acidentes as $item){
    		if($item['ano'] <  $anoIniObra){
    			$vdm = $vdm_s;
    		}else{
    			$vdm = $vdm_c;
    		}
    		$anoAtual = $item['ano'];
    
    		// 10^6
    		// 10^8
    
    		//calculo da taxa testado e aprovado conforme a tabela do guilherme
    		$calcIlesos  = ($item['ilesos']*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    		$calcFeridos = ($item['feridos']*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    		$calcMortos  = ($item['mortos']*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    		$calcTotal 	 = (($item['mortos']+$item['feridos']+$item['ilesos'])*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    
    		$cadastro2[] = array('ano' => $anoAtual, 'ilesos' => $calcIlesos, 'feridos' => $calcFeridos, 'mortos' => $calcMortos, 'total' => $calcTotal);
    
    	}
    	 
    	return $cadastro2;
    	 
    }
    
    private function media_idice_acidentes($anoIniObra, $arrayIndAcidentes){
    
    	$mAntIlesos  = 0;
    	$mAntFeridos = 0;
    	$mAntMortos  = 0;
    	$qntAntes = 0;
    	$mPosIlesos  = 0;
    	$mPosFeridos = 0;
    	$mPosMortos  = 0;
    	$qntPos = 0;
    
    	foreach($arrayIndAcidentes as $item){
    
    		if($item['ano'] <  $anoIniObra){
    			$mAntIlesos  += $item['ilesos'];
    			$mAntFeridos += $item['feridos'];
    			$mAntMortos  += $item['mortos'];
    			$qntAntes++;
    		}
    		else if($item['ano'] >  $anoIniObra)
    		{
    			$mPosIlesos  +=	$item['ilesos'];
    			$mPosFeridos += $item['feridos'];
    			$mPosMortos  +=	$item['mortos'];
    			$qntPos++;
    		}
    
    	}
    
    	$mAntIlesos  = $mAntIlesos/$qntAntes;
    	$mAntFeridos = $mAntFeridos/$qntAntes;
    	$mAntMortos  = $mAntMortos/$qntAntes;
    
    	$mPosIlesos  = $mPosIlesos/$qntPos;
    	$mPosFeridos = $mPosFeridos/$qntPos;
    	$mPosMortos  = $mPosMortos/$qntPos;
    
    	if($mAntIlesos == 0){
    		$mRedIlesos  = $mPosIlesos * 100;
    	}else{
    		$mRedIlesos  = (($mPosIlesos  - $mAntIlesos  )/$mAntIlesos ) * 100;
    	}
    
    	if($mAntFeridos == 0){
    		$mRedFeridos  = $mPosFeridos * 100;
    	}else{
    		$mRedFeridos = (($mPosFeridos - $mAntFeridos )/$mAntFeridos) * 100;
    	}
    
    	if($mAntMortos == 0){
    		$mRedMortos  = $mPosMortos * 100;
    	}else{
    		$mRedMortos  = (($mPosMortos  - $mAntMortos  )/$mAntMortos ) * 100;
    	}
    
    
    
    	// se 2 coluna maior que primeira, invert sinal
    
    	$cadastro3[]  = array('antes' => $mAntIlesos,  'depois' => $mPosIlesos,  'reducao' => $mRedIlesos  );
    	$cadastro3[]  = array('antes' => $mAntFeridos, 'depois' => $mPosFeridos, 'reducao' => $mRedFeridos  );
    	$cadastro3[]  = array('antes' => $mAntMortos,  'depois' => $mPosMortos,  'reducao' => $mRedMortos  );
    
    	return $cadastro3;
    }
    
    private function relatorio_acidentes_descricao($anoIniObra, $anoFimObra, $lista_descricao, $lista_acidentes_descricao ){
    
    	$anoIni = 0;
    	$inicio = true;
    	foreach($lista_acidentes_descricao as $ano ){
    		if($inicio){
    			$anoIni = $ano['ano'];
    			$listaAno[] = $anoIni;
    			$inicio = false;
    		}
    		if($anoIni != $ano['ano']){
    			$anoIni = $ano['ano'];
    			$listaAno[] = $anoIni;
    		}
    	}
    
    	foreach($lista_descricao as $desc){
    			
    		foreach($listaAno as $ano){
    			$ilesos = 0;
    			$feridos = 0;
    			$mortos = 0;
    			foreach($lista_acidentes_descricao as $item){
    					
    				if($item['descricao'] == $desc['descricao']){
    					if($item['ano'] == $ano){
    						if($item['classificacao'] == 'ilesos'){
    							$ilesos = $item['qnt_class'];
    						}
    						if($item['classificacao'] == 'com feridos'){
    
    							$feridos = $item['qnt_class'];
    						}
    						if($item['classificacao'] == 'com mortos'){
    							$mortos  = $item['qnt_class'];
    						}
    					}
    				}
    			}
    			$result[$ano] = array('mortos' => $mortos, 'feridos' => $feridos, 'ilesos' => $ilesos);
    			$result2[$desc['descricao']][$ano] = $result[$ano];
    		}
    	}
    
    	return $result2;
    	//die;
    
    }
    
    public function column_chart($dataToPrint, $divName, $col1, $col2, $col3, $col4){
    
    	$this->gcharts->load('ColumnChart');
    
    	$this->gcharts->DataTable($divName)
    	->addColumn('string', 'Classroom', 'class')
    	->addColumn('number', ucfirst($col1), $col1)
    	->addColumn('number', ucfirst($col2), $col2)
    	->addColumn('number', ucfirst($col3), $col3)
    	->addColumn('number', ucfirst($col4), $col4);
    
    
    	foreach($dataToPrint as $item){
    			
    		$data = array(
    				$item['ano'],
    				$item[strtolower($col1)] ,
    				$item[strtolower($col2)],
    				$item[strtolower($col3)],
    				($item[strtolower($col1)] + $item[strtolower($col2)] + $item[strtolower($col3)])
    		);
    			
    		$this->gcharts->DataTable($divName)->addRow($data);
    	}
    
    	$config = array(
    			'title' => $divName
    	);
    
    	$this->gcharts->ColumnChart($divName)->setConfig($config);
    }
    
    
    
    // gel all ufs disponiveis
    public function get_ufs(){
    	
    	$this->load->model('acidentesdao');
    	$ufs = new acidentesdao();
    	return  $ufs->get_ufs_disponiveis();
    	
    }
    
    public function get_brs_by_uf($uf){
    	
    	$this->load->model('acidentesdao');
    	$brs = new acidentesdao();
    	
    	$myJSON = json_encode($brs->get_brs_by_uf($uf));
    	echo($myJSON);
    	
    	
    }
    
    public function get_kms_by_uf_br($uf, $br){
    	 
    	$this->load->model('acidentesdao');
    	$km = new acidentesdao();
    	 
    	$myJSON = json_encode($km->get_km_by_uf_br($uf, $br));
    	echo($myJSON);
    	 
    }
    
    public function exclusivo(){
    	
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		
    		//form validation
    		$this->form_validation->set_rules('uf', 'uf', 'required');
    		$this->form_validation->set_rules('br', 'br', 'required', 'numeric');
    		$this->form_validation->set_rules('km_ini', 'km inicial', 'trim|required|numeric');
    		$this->form_validation->set_rules('km_fim', 'km final', 'trim|required|numeric');
    		$this->form_validation->set_rules('vmd', 'vmd', 'trim|required|numeric');
    		$this->form_validation->set_rules('taxa', 'taxa', 'trim|required|numeric');
    		$this->form_validation->set_rules('ano_base', 'ano_base', 'trim|required|numeric');
    		$this->form_validation->set_rules('data_ini', 'data inicial', 'trim|required|numeric');
    		$this->form_validation->set_rules('data_fim', 'data final', 'trim|required|numeric');
    		
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    	
    	
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    			
    			$data_to_store = array(	'uf' 		=> $this->input->post('uf'),
				    					'br'		=> $this->input->post('br'),
				    					'km_ini' 	=> $this->input->post('km_ini'),
				    					'km_fim' 	=> $this->input->post('km_fim'),
				    					'vdm' 		=> $this->input->post('vmd'),
				    					'taxa' 		=> $this->input->post('taxa'),
    									'ano_base' 	=> $this->input->post('ano_base'),
				    					'data_ini' 	=> $this->input->post('data_ini'),
				    					'data_fim' 	=> $this->input->post('data_fim')
    			);
    			
    			    			 
    			$this->load->model('acidentesdao');
    			$acidentes = new acidentesdao();
    			
    			$lista_acidentes = $acidentes->get_acidentes_by_trecho_exclusivo($data_to_store);
    			$data['acidentes'] = $lista_acidentes; 
    			 
    			$anoIniObra = substr( $data_to_store['data_ini'], 0, 4);
    			$anoFimObra =  substr( $data_to_store['data_fim'], 0, 4);
    			 
    			$relatorio_acidentes = $this->relatorio_acidentes($anoIniObra, $anoFimObra, $lista_acidentes );
    			$data['relatorio1'] = $this->relatorio_acidentes_format($relatorio_acidentes);
    				
    			// charts call
    			$this->column_chart($relatorio_acidentes, 'Relatório de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
    			
    			$indice_acidentes = $this->indice_acidentes($data_to_store, $relatorio_acidentes );
    			$data['relatorio2'] = $this->indice_acidentes_format($indice_acidentes);

    			// charts call    			 
    			$this->column_chart($indice_acidentes, 'Relatório de indide de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
    			
    			$data['relatorio3'] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes );
    			 
    			$lista_descricao = $acidentes->get_descricao_acidentes();
    			 
    			$lista_acidentes_descricao = $acidentes->get_acidentes_descricao_by_trecho_exclusivo($data_to_store);    			
    			$data['relatorio4'] = $this->relatorio_acidentes_descricao($anoIniObra, $anoFimObra,$lista_descricao, $lista_acidentes_descricao );
    			
    			foreach($data['relatorio4'] as $key => $rel){
    					
    				$descr_acidente = str_replace(' ', '_', $key.'_rel4_obra');
    				$lista_acidentes_descricao_obra[] = $descr_acidente;
    					
    				$descr_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_indice_acidente');
    				$lista_indice_acidentes_descricao_obra[] = $descr_indice_acidente;
    					
    				$descr_media_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_media_indice_acidente');
    				$lista_media_indice_acidentes_descricao_obra[] = $descr_media_indice_acidente;
    					
    				$temp = array();
    				foreach($rel as $key2 => $rel2){
    					$temp[] = array('ano' =>  $key2, 'mortos' => $rel2['mortos'], 'feridos' => $rel2['feridos'], 'ilesos' => $rel2['ilesos'] );
    						
    				}
    				$data[$descr_acidente]		  = $this->relatorio_acidentes_format($temp);
    				$indice_acidentes = $this->indice_acidentes($data_to_store, $temp );
    				$data[$descr_indice_acidente] = $this->indice_acidentes_format($indice_acidentes);
    				$data[$descr_media_indice_acidente] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes );
    				 
    			}
    			$data['list_acidente_relatorio_desc_obra'] = $lista_acidentes_descricao_obra;
    			$data['list_indice_acidente_relatorio_desc_obra'] = $lista_indice_acidentes_descricao_obra;
    			$data['lista_media_indice_acidentes_descricao_obra'] = $lista_media_indice_acidentes_descricao_obra;
    			
    		}
    		// load trecho data view
    		$data['trecho'] = $data_to_store;
    		$data['main_content'] = 'admin/relatorios/trechos_exclusivo';
    	}else{
    		//load the view
    		$data['main_content'] = 'admin/consulta_trecho_acidentes/list_exclusivo';
    	}
    	
    	// ufs data
    	$data['ufs'] = $this->get_ufs();
    	  	
        //load the view
        
        $this->load->view('includes/template', $data); 
    }
    
    
}