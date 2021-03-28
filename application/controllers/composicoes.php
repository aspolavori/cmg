<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
require_once(APPPATH . 'controllers/transportes' . EXT);

class composicoes extends App_controller {
	const VIEW_FOLDER = 'admin/composicoes';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('composicoesdao');
        
    }
    	
    public function index()
    {

    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
    	
        //all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 200;

        $config['base_url'] = base_url().'admin/composicoes';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //if order type was changed
        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            //we have something stored in the session? 
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';    
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($search_string !== false && $order !== false || $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */
            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            
            //fetch sql data into arrays
            $data['count_products']= $this->composicoesdao->count_composicoes($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['composicoes'] = $this->composicoesdao->get_composicoes($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['composicoes'] = $this->composicoesdao->get_composicoes($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['composicoes'] = $this->composicoesdao->get_composicoes('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['composicoes'] = $this->composicoesdao->get_composicoes('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['composicao_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->composicoesdao->count_composicoes();
            $data['composicoes'] = $this->composicoesdao->get_composicoes('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/composicoes/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
public function add()
    {
    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
    	
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('codigo', 'codigo', 'required'); 
        	$this->form_validation->set_rules('titulo', 'titulo', 'required'); 
        	$this->form_validation->set_rules('data_base', 'data_base', 'required'); 
        	$this->form_validation->set_rules('tipo', 'tipo', 'required');
        	$this->form_validation->set_rules('categoria', 'categoria', 'required');
        	$this->form_validation->set_rules('producao_equipe', 'producao_equipe', 'numeric|required'); 
        	$this->form_validation->set_rules('producao_equipe_unidade', 'producao_equipe_unidade', 'required');
        	$this->form_validation->set_rules('adc_mo', 'adc_mo', 'required');
        	$this->form_validation->set_rules('observacao', 'observacao', ''); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array( 'codigo' => $this->input->post('codigo'),
                						'titulo' => $this->input->post('titulo'),
                						'data_base' => $this->input->post('data_base'),
                						'tipo' => $this->input->post('tipo'),
                						'categoria' => $this->input->post('categoria'),
                						'producao_equipe' => $this->input->post('producao_equipe'),
                						'producao_equipe_unidade' => $this->input->post('producao_equipe_unidade'),
                						'adc_mo' => $this->input->post('adc_mo'),
                						'observacao' => $this->input->post('observacao')
                );
                //if the insert has returned true then we show the flash message
                if($this->composicoesdao->store_composicao($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/composicoes/add';
        $this->load->view('includes/template', $data);  
    }       
    			
    	
    public function update()
    {
    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
    	
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
        	$this->form_validation->set_rules('codigo', 'codigo', 'required');
        	$this->form_validation->set_rules('titulo', 'titulo', 'required');
        	$this->form_validation->set_rules('data_base', 'data_base', 'required');
        	$this->form_validation->set_rules('tipo', 'tipo', 'required');
        	$this->form_validation->set_rules('categoria', 'categoria', 'required');
        	$this->form_validation->set_rules('producao_equipe', 'producao_equipe', 'numeric|required');
        	$this->form_validation->set_rules('producao_equipe_unidade', 'producao_equipe_unidade', 'required');
        	$this->form_validation->set_rules('adc_mo', 'adc_mo', 'required');
        	$this->form_validation->set_rules('observacao', 'observacao', '');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
		        	'codigo' => $this->input->post('codigo'),
		        	'titulo' => $this->input->post('titulo'),
		        	'data_base' => $this->input->post('data_base'),
		        	'tipo' => $this->input->post('tipo'),
                	'categoria' => $this->input->post('categoria'),
		        	'producao_equipe' => $this->input->post('producao_equipe'),
		        	'producao_equipe_unidade' => $this->input->post('producao_equipe_unidade'),
                	'adc_mo' => $this->input->post('adc_mo'),
		        	'observacao' => $this->input->post('observacao')                    
                );
                //if the insert has returned true then we show the flash message
                if($this->composicoesdao->update_composicao($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/composicoes/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['composicao'] = $this->composicoesdao->get_composicao_by_id($id);
        //load the view
        $data['main_content'] = 'admin/composicoes/edit';
        $this->load->view('includes/template', $data);            

    }//update    			
    	
    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
        //product id 
        $id = $this->uri->segment(4);
        $this->composicoesdao->delete_composicao($id);
        redirect('admin/composicoes');
    }//edit
    
    function composicao_checar($id_sicro = null, $id_composicao= null){
    	//product id
    	$resultTeste = 0;
    	 
    	$this->load->model('sicrosdao');
    	$sicro = new sicrosdao();
    	 
    	$this->load->model('composicoesdao');
    	$composicao = new composicoesdao();
    	 
    	$sicroData = $sicro->get_sicro_by_id($id_sicro);
    	$composicaoData = $composicao->get_composicao_by_id($id_composicao);

    	$data['sicro_data'] = $sicroData; 
    	$data['composicao_data'] = $composicaoData;
    	 
    	$principal = true;
    	if($composicaoData[0]['categoria'] == 'Auxiliar'){
    		$principal = false;
    	}
    	 
    	if(!$composicaoData[0]['adc_mo']){
    		$adcMO = 0;
    	}else{
    		$adcMO = $composicaoData[0]['adc_mo'];
    	}
    	$icms_asfaltico = $sicroData[0]['icms_asfaltico'];
    	 
    	$resultEquip 	= $this->get_valor_unitario_equip($id_sicro, $id_composicao);
    	$data['equipamentos_data'] = $resultEquip;
    	 
    	$resultMaoObra 	= $this->get_valor_unitario_mao_obra($id_sicro, $id_composicao);
    	$data['mao_obra_data'] = $resultMaoObra;
    	
    	// parcial do valor unitario da composicao
    	$custoHorarioExecucao = ($resultMaoObra['result'] * $adcMO) + $resultMaoObra['result'] + $resultEquip['result'];
    	$custoUnitarioExecucao = $custoHorarioExecucao/$composicaoData[0]['producao_equipe'];
    	$data['custo_horario_execucao'] = $custoHorarioExecucao;
    	$data['custo_unitario_execucao'] = $custoUnitarioExecucao;
    	 
    	$resultAtividadesAuxiliares = $this->get_valor_unitario_atividades_auxiliares_checar($id_sicro, $id_composicao );
    	$data['atividades_auxiliares_data'] = $resultAtividadesAuxiliares;
    	 
    	$custoUnitarioAtividadesAuxiliares = 0;
    	if(!empty($resultAtividadesAuxiliares)){
    		$custoUnitarioAtividadesAuxiliares = $resultAtividadesAuxiliares['result'];
    	}
    	 
    	$resultMat 		= $this->get_valor_unitario_material($id_sicro, $id_composicao);
    	$data['materiais_data'] = $resultMat;
    	 
    	
    	// se existe algum material, adiciona o material no calculo
    	$partialCustoDiretoTotal = 0;
    	$tmpMat = 0;
    	if(!empty($resultMat)){
    		foreach($resultMat['arrayResult'] as $item){
    			$tmpMat += $item['custo_unitario'] ;
    		}
    		$partialCustoDiretoTotal += $tmpMat;
    	}
    	
    	 
    	$resultComposicaoTransporte = $this->get_valor_unitario_composicao_transporte($id_sicro, $id_composicao);
    	$data['transportes_data'] = $resultComposicaoTransporte;
    	 
    	$tmpCompTransporte = 0;
    	if(!empty($resultComposicaoTransporte)){
    	
    		foreach($resultComposicaoTransporte['arrayResult'] as $item){
    			$tmpCompTransporte += $item['custo_unitario'];
    		}
    		$partialCustoDiretoTotal += $tmpCompTransporte;
    	}
    	 
    	$data['custo_total_transporte'] = $tmpCompTransporte;
    	 
    	//ECHO " <br>CUSTO TOTAL + CUSTO DE EXECUCAO + CUSTO DE ATIVIDADES AUXILIARES ".$partialCustoDiretoTotal." + ".$custoUnitarioExecucao." + ".$custoUnitarioAtividadesAuxiliares."<br>";
    	 
    	$partialCustoDiretoTotal = ($partialCustoDiretoTotal + $custoUnitarioExecucao + $custoUnitarioAtividadesAuxiliares);
    	$data['somatorio1'] = $partialCustoDiretoTotal;
    	 
    	if($principal){
    		//ECHO " <br>É PRINCIPAL, LOGO APLICA CALCULO DE BDI ".$partialCustoDiretoTotal." * ".$sicroData[0]['bdi']." = ".(($partialCustoDiretoTotal) * $sicroData[0]['bdi'])."<br>";
    		$partialCustoDiretoTotal += ($partialCustoDiretoTotal) * $sicroData[0]['bdi'];
    		$data['lucros_despesas_indiretas'] = ($partialCustoDiretoTotal) * $sicroData[0]['bdi'];;
    		$data['somatorio1_bdi'] = $partialCustoDiretoTotal;
    	}else{
    		$data['lucros_despesas_indiretas'] = 0;
    	}
    	 
    	$resultMatBet = $this->get_valor_unitario_material_betuminoso($id_sicro, $id_composicao);
    	$data['betuminosos_data'] = $resultMatBet;
    	 
    	if(!empty($resultMatBet)){
    		$somatorioUnitarioBetuminosos = 0;
    	
    		foreach($resultMatBet['arrayResult'] as $item){
    			$somatorioUnitarioBetuminosos += $item['custo_unitario'];
    		}
    		//ECHO " SOMATORIO DOS MATERIAIS BETUMINOSOS ";
    		//ECHO $somatorioUnitarioBetuminosos;
    		//ECHO " PRECO PARCIAL CUSTO DIRETO TOTAL ANTES DO TRANSPORTE * BDI ";
    		//ECHO $partialCustoDiretoTotal;
    		//ECHO "<BR>";
    		//ECHO " IMPOSTOS = UNITARIO BETUMINOSOS * ICMS_ASFALTICO ";
    		//ECHO $impostos = $somatorioUnitarioBetuminosos * $icms_asfaltico;
    		$impostos = $somatorioUnitarioBetuminosos * $icms_asfaltico;
    		//ECHO " LUCROS DESPESAS (SUMUNITARIOBET + IMPOSTOS) * BDIBETUMINOSOS ";
    		//ECHO $lucrosDespesas = ($somatorioUnitarioBetuminosos + $impostos) * $sicroData[0]['bdi_betuminosos'];
    		$lucrosDespesas = ($somatorioUnitarioBetuminosos + $impostos) * $sicroData[0]['bdi_betuminosos'];
    		//ECHO " PRECO UNITARIO BETUMINOSOS (SUM UNITARIO BET + IMPOSTOS + LUCROSDESPESAS)  ";
    		//ECHO $precoUnitarioTotalBetuminosos = $somatorioUnitarioBetuminosos + $impostos + $lucrosDespesas ;
    		$precoUnitarioTotalBetuminosos = $somatorioUnitarioBetuminosos + $impostos + $lucrosDespesas ;
    		//ECHO " PRECO UNITARIO TOTAL  PARCIAL TOTAL + UNITARIO BETUMINOSOS ";
    		$precoUnitarioTotal = $partialCustoDiretoTotal + $precoUnitarioTotalBetuminosos;
    		
    		$data['impostos_data'] = $impostos;
    		$data['lucros_despesas_data'] = $lucrosDespesas;
    		$data['preco_unitario_total_betuminosos'] = $precoUnitarioTotalBetuminosos;
    		
    	}else{
    		//ECHO " PRECO UNITARIO TOTAL  ";
    		$precoUnitarioTotal = $partialCustoDiretoTotal;
    	}
    	
    	$data['preco_unitario_total'] = $precoUnitarioTotal;
    	
    	$data['main_content'] = 'admin/composicoes/checar_composicao';
    	$this->load->view('includes/template', $data);
    		
    }

    public function get_valor_unitario_atividades_auxiliares_checar($id_sicro, $id_composicao){
    
    	$this->load->model('composicao_composicaodao');
    	$compAuxiliares = new composicao_composicaodao();
    	$compAuxiliaresData = $compAuxiliares->get_composicao_by_id_composicao($id_composicao);
    	
    	$k = 0;
    	$compAuxCustoUnitarioTotal = 0;
    	foreach($compAuxiliaresData as $item){
    		$compAuxiliaresData[$k]['preco_unitario'] = $this->get_valor_unitario($id_sicro, $item['id_composicao2']);
    		$compAuxiliaresData[$k]['custo_unitario'] =  $item['quantidade'] * $compAuxiliaresData[$k]['preco_unitario'];
    		$compAuxCustoUnitarioTotal += $compAuxiliaresData[$k]['custo_unitario'];
    		$k++;
    
    		$this->get_valor_unitario($id_sicro, $item['id_composicao2']) ;
    	}
    	 
    	$result = array('arrayResult' => $compAuxiliaresData, 'result' => round($compAuxCustoUnitarioTotal,2) );
    	 
    	return $result;
    }
    
    
    public function get_valor_unitario($id_sicro, $id_composicao){
    		
    	$resultTeste = 0;
    	
    	$this->load->model('sicrosdao');
    	$sicro = new sicrosdao();
    	
    	$this->load->model('composicoesdao');
    	$composicao = new composicoesdao();
    	
    	$sicroData = $sicro->get_sicro_by_id($id_sicro);
    	$composicaoData = $composicao->get_composicao_by_id($id_composicao);
    	    	
    	$principal = true;
    	if($composicaoData[0]['categoria'] == 'Auxiliar'){
    		$principal = false;
    	}
    	
    	if(!$composicaoData[0]['adc_mo']){
    		$adcMO = 0;
    	}else{
    		$adcMO = $composicaoData[0]['adc_mo'];
    	}
    	
    	$icms_asfaltico = $sicroData[0]['icms_asfaltico'];    	
    	$resultEquip 	= $this->get_valor_unitario_equip($id_sicro, $id_composicao);       
    	$resultMaoObra 	= $this->get_valor_unitario_mao_obra($id_sicro, $id_composicao);    	
    	$custoHorarioExecucao = ($resultMaoObra['result'] * $adcMO) + $resultMaoObra['result'] + $resultEquip['result']; 
    	$custoUnitarioExecucao = $custoHorarioExecucao/$composicaoData[0]['producao_equipe'];
    	$resultAtividadesAuxiliares = $this->get_valor_unitario_atividades_auxiliares($id_sicro, $id_composicao );
    	
    	$custoUnitarioAtividadesAuxiliares = 0;
    	if(!empty($resultAtividadesAuxiliares)){
    		$custoUnitarioAtividadesAuxiliares = $resultAtividadesAuxiliares['result'];
    	}
    	
    	$resultMat 		= $this->get_valor_unitario_material($id_sicro, $id_composicao);  	
    	
    	$partialCustoDiretoTotal = 0;
    	
    	// se existe algum material, adiciona o material no calculo
    	$tmpMat = 0;
    	if(!empty($resultMat)){
			foreach($resultMat['arrayResult'] as $item){
				$tmpMat += $item['custo_unitario'] ;			
			}			
			$partialCustoDiretoTotal += $tmpMat;			
    	}		
    	
    	$resultComposicaoTransporte = $this->get_valor_unitario_composicao_transporte($id_sicro, $id_composicao);
    	
    	
    	$tmpCompTransporte = 0;
    	if(!empty($resultComposicaoTransporte)){
    		
			foreach($resultComposicaoTransporte['arrayResult'] as $item){
				$tmpCompTransporte += $item['custo_unitario'];			
			}			
			$partialCustoDiretoTotal += $tmpCompTransporte;
    	}
    	
    	$partialCustoDiretoTotal = ($partialCustoDiretoTotal + $custoUnitarioExecucao + $custoUnitarioAtividadesAuxiliares);
    	
    	if($principal){
    		$partialCustoDiretoTotal += ($partialCustoDiretoTotal) * $sicroData[0]['bdi'];
    	}
    	    	
    	// falta adicionar o fator de transporte
    	$resultMatBet = $this->get_valor_unitario_material_betuminoso($id_sicro, $id_composicao);    	
    	
    	if(!empty($resultMatBet)){
    		$somatorioUnitarioBetuminosos = 0;
    		
    		foreach($resultMatBet['arrayResult'] as $item){
    			$somatorioUnitarioBetuminosos += $item['custo_unitario'];
    		}
    		$impostos = $somatorioUnitarioBetuminosos * $icms_asfaltico;
    		$lucrosDespesas = ($somatorioUnitarioBetuminosos + $impostos) * $sicroData[0]['bdi_betuminosos'];
    		$precoUnitarioTotalBetuminosos = $somatorioUnitarioBetuminosos + $impostos + $lucrosDespesas ;
    		$precoUnitarioTotal = $partialCustoDiretoTotal + $precoUnitarioTotalBetuminosos;    		
    		
    	}else{
    		$precoUnitarioTotal = $partialCustoDiretoTotal;   		
    		
    	}
    	
    	
    	return round($precoUnitarioTotal,2);
    }

    public function get_valor_unitario_equip($id_sicro, $id_composicao){
    	 
    	$this->load->model('composicoesdao');
    	$tmpVar = new composicoesdao();
    	 
    	$arrayUnitarioEquipamentos = $tmpVar->get_unitario_equipamento_by_id_composicao_sicro($id_sicro, $id_composicao);
    	 
    	$k = 0;
    	$equipCustoUnitarioTotal = 0;
    	foreach($arrayUnitarioEquipamentos as $item){
    		// Metodo de calculo de valor parcial unitario e total
    		$arrayUnitarioEquipamentos[$k]['custo_unitario'] =  $item['quantidade'] * (($item['utilizacao_improdutivo'] * $item['improdutivo']) + ($item['utilizacao_operativo'] * $item['operativo']));
    		$equipCustoUnitarioTotal += $arrayUnitarioEquipamentos[$k]['custo_unitario'];
    		$k++;
    	}
    	 
    	$result = array('arrayResult' => $arrayUnitarioEquipamentos, 'result' => round($equipCustoUnitarioTotal,2) );
    	
    	return $result;
    }
    
    
    public function get_valor_unitario_atividades_auxiliares($id_sicro, $id_composicao){
    
    	$this->load->model('composicao_composicaodao');
    	$compAuxiliares = new composicao_composicaodao();
    	$compAuxiliaresData = $compAuxiliares->get_composicao_by_id_composicao($id_composicao);
    	    	
    	$k = 0;
    	$compAuxCustoUnitarioTotal = 0;
    	foreach($compAuxiliaresData as $item){
    		
    		$compAuxiliaresData[$k]['custo_unitario'] =  $item['quantidade'] * $this->get_valor_unitario($id_sicro, $item['id_composicao2']);
    		$compAuxCustoUnitarioTotal += $compAuxiliaresData[$k]['custo_unitario'];
    		$k++;
    		$this->get_valor_unitario($id_sicro, $item['id_composicao2']) ;
    	}
    	
    	$result = array('arrayResult' => $compAuxiliaresData, 'result' => round($compAuxCustoUnitarioTotal,2) );    	
    	
    	return $result;
    }
    
    public function get_valor_unitario_composicao_transporte($id_sicro, $id_composicao){
    
    	$this->load->model('composicoesdao');
    	$tmpVar = new composicoesdao();
   	
    	$arrayUnitarioComposicaoTransporte = $tmpVar->get_unitario_composicao_transporte_by_id_composicao($id_composicao);
    	
    	if(!empty($arrayUnitarioComposicaoTransporte)){
    		$k = 0;
    		$composicaoTransporteCustoUnitarioTotal = 0;
    		foreach($arrayUnitarioComposicaoTransporte as $item){
    			// Metodo de calculo de valor parcial unitario e total
    			
    			$unitarioTransporte = $this->get_valor_unitario_transporte_by_id_sicro_composicao_transporte($id_sicro,$arrayUnitarioComposicaoTransporte[$k]['id_composicao_transporte']);
    			
    			$arrayUnitarioComposicaoTransporte[$k]['custo_unitario'] =  $item['quantidade'] * $unitarioTransporte;
    			$arrayUnitarioComposicaoTransporte[$k]['preco_unitario'] = $unitarioTransporte;
    			$composicaoTransporteCustoUnitarioTotal += $arrayUnitarioComposicaoTransporte[$k]['custo_unitario'];
    			$k++;
    		}
    	    $matResult = array('arrayResult' => $arrayUnitarioComposicaoTransporte, 'result' => round($composicaoTransporteCustoUnitarioTotal,2) );
    
    	}else{
    		$matResult =array();
    	}
    	 
    	return $matResult;
    }
    
    public function get_valor_unitario_material($id_sicro, $id_composicao){
    
    	$this->load->model('composicoesdao');
    	$tmpVar = new composicoesdao();
    	 
    	$arrayUnitarioMateriais = $tmpVar->get_unitario_material_by_id_composicao_sicro($id_sicro, $id_composicao);
    	 
    	$k = 0;
    	$materialCustoUnitarioTotal = 0;
    	foreach($arrayUnitarioMateriais as $item){
    		// Metodo de calculo de valor parcial unitario e total
    		$arrayUnitarioMateriais[$k]['custo_unitario'] =  $item['quantidade'] * $item['preco_unitario'];
    		$materialCustoUnitarioTotal += $arrayUnitarioMateriais[$k]['custo_unitario'];
    		$k++;
    	}
    	 
    	$result = array('arrayResult' => $arrayUnitarioMateriais, 'result' => round($materialCustoUnitarioTotal,2) );
    	
    	return $result;
    }

    
    public function get_valor_unitario_material_betuminoso($id_sicro, $id_composicao){
    
    	$this->load->model('composicoesdao');
    	$tmpVar = new composicoesdao();
    
    	$arrayUnitarioMateriais = $tmpVar->get_unitario_material_betuminiso_by_id_composicao_sicro($id_sicro, $id_composicao);
    	 
    	if(!empty($arrayUnitarioMateriais)){
    		$k = 0;
    		$materialCustoUnitarioTotal = 0;
    		foreach($arrayUnitarioMateriais as $item){
    			// Metodo de calculo de valor parcial unitario e total
    			$arrayUnitarioMateriais[$k]['custo_unitario'] =  $item['quantidade'] * $item['preco_unitario'];    		   
    			$materialCustoUnitarioTotal += $arrayUnitarioMateriais[$k]['custo_unitario'];
    			$k++;
    		}
    	  
    		$matResult = array('arrayResult' => $arrayUnitarioMateriais, 'result' => round($materialCustoUnitarioTotal,2) );
    
    	}else{
    		$matResult =array();
    	}
    	 
    	return $matResult;
    }
    
    public function get_valor_unitario_mao_obra($id_sicro, $id_composicao){
    
    	$this->load->model('composicoesdao');
    	$tmpVar = new composicoesdao();
    
    	$arrayUnitarioMaoObra = $tmpVar->get_unitario_mao_obra_by_id_composicao_sicro($id_sicro, $id_composicao);
    
    	$k = 0;
    	$maoObraCustoUnitarioTotal = 0;
    	foreach($arrayUnitarioMaoObra as $item){
    		// Metodo de calculo de valor parcial unitario e total
    		$arrayUnitarioMaoObra[$k]['custo_unitario'] =  $item['quantidade'] * $item['custo_horario'];
    		$maoObraCustoUnitarioTotal += $arrayUnitarioMaoObra[$k]['custo_unitario'];
    		$k++;
    	}
    
    	$matResult = array('arrayResult' => $arrayUnitarioMaoObra, 'result' => round($maoObraCustoUnitarioTotal,2) );
    	 
    	return $matResult;
    }
    
    public function get_valor_unitario_transporte_by_id_sicro_composicao_transporte($id_sicro, $id_composicao_transporte){
    
    	$transporte = new transportes();
    	return $transporte->get_valor_unitario($id_sicro, $id_composicao_transporte);
    }
    
    // passando o calculo de valor de transportes para controle transporte
    // DEPRECTED
    public function get_valor_unitario_transporte_by_id_sicro_material_betuminoso($id_sicro, $id_material){
    
    	$transporte = new transportes();
    	return $transporte->get_valor_unitario_betuminoso($id_sicro, $id_material);
    }
    
    public function get_valor_unitario_transporte_by_id_sicro_material($id_sicro, $id_material){
    
    	$transporte = new transportes();
    	return $transporte->get_valor_unitario_material($id_sicro, $id_material);
    }
    
    
}




















