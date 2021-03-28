<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
require_once(APPPATH . 'controllers/composicoes' . EXT);

class solucoes extends App_controller {

	const VIEW_FOLDER = 'admin/solucoes';
	
	public $pista = null;
	public $acostamento1 = null;
	public $acostamento2 = null;
	public $comp_pista = null;
	public $volume = null;
	public $fator = null;
	
	
	public $areaPista = null;
	public $areaPistaTotal1 = null;
	public $areaPistaTotal2 = null;
	
	public $areaAcostamento1 = null;
	public $areaAcostamento2 = null;
	
	
	public $variaveis = null;
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('solucoesdao');
        
        $this->load->model('variaveisdao');
        $variavel = new variaveisdao();

        // acertar a estrutura do dado para criar o array de variaveis
        foreach($variavel->get_variaveis() as $item){
        	$this->variaveis[$item['titulo']] = $item;
        }
        
        
        // acertar o modelo pra buscar ou pelo usuario ou por default
       // $lista_variaveis = $variaveis->get_variaveis();
      
       
    }
    	
    public function index()
    {

    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
    	
    	$this->load->model('categoriasdao');
    	$categoria = new categoriasdao();
    	$data['categorias'] = $categoria->get_categorias();
    	
    	$this->load->model('tipo_solucaodao');
    	$tipo = new tipo_solucaodao();
    	$data['tipos'] = $tipo->get_tipo_solucao();
    	
        //all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 300;

        $config['base_url'] = base_url().'admin/solucoes';
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
            $data['count_products']= $this->solucoesdao->count_solucoes($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['solucoes'] = $this->solucoesdao->get_solucoes($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['solucoes'] = $this->solucoesdao->get_solucoes($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['solucoes'] = $this->solucoesdao->get_solucoes('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['solucoes'] = $this->solucoesdao->get_solucoes('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['solucao_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->solucoesdao->count_solucoes();
            $data['solucoes'] = $this->solucoesdao->get_solucoes('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/solucoes/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
public function add()
    {
    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
    	
    	$this->load->model('categoriasdao');
    	$categoria = new categoriasdao();
    	$data['categorias'] = $categoria->get_categorias();
    	
    	$this->load->model('tipo_solucaodao');
    	$tipo = new tipo_solucaodao();
    	$data['tipos'] = $tipo->get_tipo_solucao();
    	
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('titulo', 'titulo', 'required'); 
        	$this->form_validation->set_rules('id_categoria', 'id_categoria', 'required'); 
        	$this->form_validation->set_rules('id_tipo', 'id_tipo', 'required');
        	$this->form_validation->set_rules('espessura1', 'espessura1', '');
        	$this->form_validation->set_rules('desc_solucao', 'desc_solucao', '');
        	$this->form_validation->set_rules('espessura2', 'espessura2', '');
        	$this->form_validation->set_rules('nova_faixa_espessura', 'nova_faixa_espessura', '');
        	$this->form_validation->set_rules('pista_existente', 'pista_existente', '');
        	$this->form_validation->set_rules('observacao', 'observacao', ''); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('titulo' => $this->input->post('titulo'),
                		'id_categoria' => $this->input->post('id_categoria'),
                		'id_tipo' => $this->input->post('id_tipo'),
                		'espessura1' => $this->input->post('espessura1'),
                		'desc_solucao' => $this->input->post('desc_solucao'),
                		'espessura2' => $this->input->post('espessura2'),
                		'nova_faixa_espessura' => $this->input->post('nova_faixa_espessura'),
                		'pista_existente' => $this->input->post('pista_existente'),
                		'observacao' => $this->input->post('observacao')
                );
                //if the insert has returned true then we show the flash message
                if($this->solucoesdao->store_solucao($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/solucoes/add';
        $this->load->view('includes/template', $data);  
    }       
    			
    	
    public function update()
    {
    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
    	
        //product id 
        $id = $this->uri->segment(4);
  
        $this->load->model('categoriasdao');
        $categoria = new categoriasdao();
        $data['categorias'] = $categoria->get_categorias();
        
        $this->load->model('tipo_solucaodao');
        $tipo = new tipo_solucaodao();
        $data['tipos'] = $tipo->get_tipo_solucao();
        
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
        	$this->form_validation->set_rules('titulo', 'titulo', 'required');
        	$this->form_validation->set_rules('id_categoria', 'id_categoria', 'required');
        	$this->form_validation->set_rules('id_tipo', 'id_tipo', 'required');
        	$this->form_validation->set_rules('espessura1', 'espessura1', '');
        	$this->form_validation->set_rules('desc_solucao', 'desc_solucao', '');
        	$this->form_validation->set_rules('espessura2', 'espessura2', '');
        	$this->form_validation->set_rules('nova_faixa_espessura', 'nova_faixa_espessura', '');
        	$this->form_validation->set_rules('pista_existente', 'pista_existente', '');
        	$this->form_validation->set_rules('observacao', 'observacao', '');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
			        	'titulo' => $this->input->post('titulo'),
			        	'id_categoria' => $this->input->post('id_categoria'),
			        	'id_tipo' => $this->input->post('id_tipo'),
                		'espessura1' => $this->input->post('espessura1'),
                		'desc_solucao' => $this->input->post('desc_solucao'),
                		'espessura2' => $this->input->post('espessura2'),
                		'nova_faixa_espessura' => $this->input->post('nova_faixa_espessura'),
                		'pista_existente' => $this->input->post('pista_existente'),
			        	'observacao' => $this->input->post('observacao')                    
                );
                //if the insert has returned true then we show the flash message
                if($this->solucoesdao->update_solucao($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/solucoes/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['solucao'] = $this->solucoesdao->get_solucao_by_id($id);
        //load the view
        $data['main_content'] = 'admin/solucoes/edit';
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
        $this->solucoesdao->delete_solucao($id);
        redirect('admin/solucoes');
    }//edit

    
    // catálogo de soluções
    
    //public function (){}
    
    
    public function executa_solucao($id_solucao, $id_sicro, $fatorPavimentar = null){

    	// id da solucao
    	$id = $id_solucao;
    	
    	$solucaoData = $this->solucoesdao->get_solucao_by_id($id);
    	
    	$this->load->model('solucao_composicaodao');
    	$composicao = new solucao_composicaodao();
    	
    	$this->load->model('composicao_variaveisdao');
    	$composicaoVar = new composicao_variaveisdao();
    	
    	$this->load->model('variaveisdao');
    	$variavel = new variaveisdao();
    	 

    	$this->load->model('sicrosdao');
    	$sicro = new sicrosdao();
    	$sicroData = $sicro->get_sicro_by_id($id_sicro);
    	
    	if($fatorPavimentar <> null){
    		$this->load->model('sicro_fator_pavimentacaodao');
    		$sicroFatorPavimentacao = new sicro_fator_pavimentacaodao();
    		$fatorMultiCalFinal  = $sicroFatorPavimentacao->get_fator_by_id_sicro_id_categoria_classificacao($id_sicro, $solucaoData[0]['id_categoria'], $fatorPavimentar);
    		
    	}else{
    		$fatorMultiCalFinal[0]['fator1'] = 1;
    		$fatorMultiCalFinal[0]['fator2'] = 1; 
    	}
    	
    	 
    
    	// TODO : trocar isso por metodo que busca lista de composições da solução
    	$listaComposicoes = $composicao->get_solucao_composicao_list_by_id_solucao($id);
    	
    	$ind = 0;
    	$acumPista = 0;
    	$acumAcostamento1 = 0;
    	$acumAcostamento2 = 0;
    	
    	$acumResPista 	   	 = 0;
    	$acumResAcostamento1 = 0;
    	$acumARescostamento2 = 0;
    	
    	$arrayAcumulados = array();

    	
    foreach($listaComposicoes as $item){
    		
    		$valUnitarioResult = $this->get_valor_unitario_by_id_sicro_composicao($id_sicro, $item['id']);
    		
    		$tmpPista 		  = 0;
    		$tmpAcostamento1 = 0;
    		$tmpAcostamento2 = 0;
    		$tmpComp_pista	  = 0;
    		 
    		$tmpPistaParcial 		= 0;
    		$tmpAcostamento1Parcial = 0;
    		$tmpAcostamento2Parcial = 0;    		 
    		 
    		$tmpVolume 	  = 1;
    		$tmpFator 	  = 1;
    		 
    		if($item['pista']){
    			$listaComposicoes[$ind]['pista'] = $variavel->get_variaveis_by_id($item['pista']);
    			$tmpPista = $listaComposicoes[$ind]['pista'][0]['quantidade'];
    		}
    		if($item['acostamento1']){
    			$listaComposicoes[$ind]['acostamento1'] = $variavel->get_variaveis_by_id($item['acostamento1']);
    			$tmpAcostamento1 = $listaComposicoes[$ind]['acostamento1'][0]['quantidade'];
    		}
    		if($item['acostamento2']){
    			$listaComposicoes[$ind]['acostamento2'] = $variavel->get_variaveis_by_id($item['acostamento2']);
    			$tmpAcostamento2 = $listaComposicoes[$ind]['acostamento2'][0]['quantidade'];
    		}
    		if($item['comprimento_pista']){
    			$listaComposicoes[$ind]['comprimento_pista'] = $variavel->get_variaveis_by_id($item['comprimento_pista']);
    			$tmpComp_pista = $listaComposicoes[$ind]['comprimento_pista'][0]['quantidade'];
    		}
    		if($item['volume']){
    			$listaComposicoes[$ind]['volume'] = $variavel->get_variaveis_by_id($item['volume']);
    			$tmpVolume = $listaComposicoes[$ind]['volume'][0]['quantidade'];
    		}
    		if($item['fator']){
    			$listaComposicoes[$ind]['fator'] = $variavel->get_variaveis_by_id($item['fator']);
    			$tmpFator = $listaComposicoes[$ind]['fator'][0]['quantidade'];
    		}
    		 
    		$valUnitarioResult = round($valUnitarioResult, 2);
    		 
    		$tmpPistaParcial 		 = ($this->get_volume_total(($tmpPista), $tmpComp_pista, $tmpVolume) * $tmpFator ) * $valUnitarioResult;
    		$tmpAcostamento1Parcial = ($this->get_volume_total(($tmpAcostamento1), $tmpComp_pista, $tmpVolume) * $tmpFator ) * $valUnitarioResult;
    		$tmpAcostamento2Parcial = ($this->get_volume_total(($tmpAcostamento2), $tmpComp_pista, $tmpVolume) * $tmpFator ) * $valUnitarioResult;
    		 
    		$listaComposicoes[$ind]['solucao'] = array(
    				'tamanho_pista' => $tmpPista,
    				'tamanho_acostamento1' => $tmpAcostamento1,
    				'tamanho_acostamento2' => $tmpAcostamento2,
    				'comprimento_pista' => $tmpComp_pista,
    				'temp_volume' => $tmpVolume,
    				'valor_unitario' => $valUnitarioResult,
    				'fator'		   => $tmpFator,
    				'volume_total' => ($this->get_volume_total(($tmpPista), $tmpComp_pista, $tmpVolume)* $tmpFator ),
    				'volume_aco1' => ($this->get_volume_total(($tmpAcostamento1), $tmpComp_pista, $tmpVolume)* $tmpFator ),
    				'volume_aco2' => ($this->get_volume_total(($tmpAcostamento2), $tmpComp_pista, $tmpVolume)* $tmpFator ),
    				'pista' 	   => $tmpPistaParcial,
    				'acostamento1' => $tmpAcostamento1Parcial,
    				'acostamento2' => $tmpAcostamento2Parcial
    		);

    		    		
    		if($item['restauracao_pista_existente'] == 'SIM'){
    			$acumResPista 	   	 += $tmpPistaParcial;
    			$acumResAcostamento1 += $tmpAcostamento1Parcial;
    			$acumARescostamento2 += $tmpAcostamento2Parcial;
    		}else{
    			$acumPista 	   += $tmpPistaParcial;
    			$acumAcostamento1 += $tmpAcostamento1Parcial;
    			$acumAcostamento2 += $tmpAcostamento2Parcial;
    		}
    		 
    		 
    		 
    		$ind++;
    		 
    	}	
    	
    	$data['solucao'] = $listaComposicoes;
    	
    	if( $solucaoData[0]['id_categoria'] == 2){
    		$data['result'] = array(
    				
    				'valor_total_pavimento_pista'	=> ($acumPista + $acumResPista),
    				'valor_total_pavimento_acos1' 	=> ($acumAcostamento1 + $acumResAcostamento1),
    				'Valor_potal_pavimento_acos2' 	=> ($acumAcostamento2 + $acumARescostamento2),
    				'valor_final_pista' 			=> ($acumPista * $fatorMultiCalFinal[0]['fator1'])  + ($acumResPista * $fatorMultiCalFinal[0]['fator2']),
    				'valor_final_acos1' 			=> ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']) + ($acumResAcostamento1 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_final_acos2' 			=> ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']) + ($acumARescostamento2 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km1' 				=> (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']) + (($acumResPista + $acumResAcostamento1) * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km2' 				=> (($acumPista + $acumAcostamento2) * $fatorMultiCalFinal[0]['fator1']) + (($acumResPista + $acumARescostamento2) * $fatorMultiCalFinal[0]['fator2']),

    				'valor_total_pavimento_pista_cons' => $acumPista,
    				'valor_total_pavimento_acos1_cons' => $acumAcostamento1,
    				'Valor_potal_pavimento_acos2_cons' => $acumAcostamento2,
    				'valor_final_pista_cons' 		  => ($acumPista * $fatorMultiCalFinal[0]['fator1']) ,
    				'valor_final_acos1_cons' 		  => ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_final_acos2_cons' 		  => ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km1_cons' 			  => (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km2_cons' 			  => (($acumPista + $acumAcostamento2) * $fatorMultiCalFinal[0]['fator1']),
    				
    				'valor_total_pavimento_pista_res'	=> $acumResPista,
    				'valor_total_pavimento_acos1_res' 	=> $acumResAcostamento1,
    				'Valor_potal_pavimento_acos2_res' 	=> $acumARescostamento2,
    				'valor_final_pista_res' 			=> ($acumResPista * $fatorMultiCalFinal[0]['fator2']) ,
    				'valor_final_acos1_res' 			=> ($acumResAcostamento1 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_final_acos2_res' 			=> ($acumARescostamento2 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km1_res' 				=> (($acumResPista + $acumResAcostamento1) * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km2_res' 				=> (($acumResPista + $acumARescostamento2) * $fatorMultiCalFinal[0]['fator2']),
    				
    				'somatorio_3_itens'					=> (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']) + (($acumResPista + $acumResAcostamento1) * $fatorMultiCalFinal[0]['fator2'])				
    				
    		);
    	}else{
    		
    		$data['result'] = array(
    				'valor_total_pavimento_pista' => $acumPista,
    				'valor_total_pavimento_acos1' => $acumAcostamento1,
    				'Valor_potal_pavimento_acos2' => $acumAcostamento2,
    				'valor_final_pista' => ($acumPista * $fatorMultiCalFinal[0]['fator1']) ,
    				'valor_final_acos1' => ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_final_acos2' => ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km1' => (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km2' => (($acumPista + $acumAcostamento2) * $fatorMultiCalFinal[0]['fator1']),
    				'somatorio_3_itens' => (($acumPista * $fatorMultiCalFinal[0]['fator1']) + ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']) + ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']) )
    		);
    	}
    	
    	return $data['result'];
    }
    
    
    public function solucao_checar(){
    
    	$fatorPavimentar = $this->uri->segment(4);
    	$id = $this->uri->segment(5);
    	$id_sicro = $this->uri->segment(6);
    	
    	$solucaoData = $this->solucoesdao->get_solucao_by_id($id);
    	 
    	$this->load->model('solucao_composicaodao');
    	$composicao = new solucao_composicaodao();
    	 
    	$this->load->model('composicao_variaveisdao');
    	$composicaoVar = new composicao_variaveisdao();
    	 
    	$this->load->model('variaveisdao');
    	$variavel = new variaveisdao();
    
    	$this->load->model('sicrosdao');
    	$sicro = new sicrosdao();
    	$sicroData = $sicro->get_sicro_by_id($id_sicro); 
    	
    	$this->load->model('sicro_fator_pavimentacaodao');
    	$sicroFatorPavimentacao = new sicro_fator_pavimentacaodao();
    	
    	$fatorMultiCalFinal  = $sicroFatorPavimentacao->get_fator_by_id_sicro_id_categoria_classificacao($id_sicro, $solucaoData[0]['id_categoria'], $fatorPavimentar); 
    
    	    	
       	$listaComposicoes = $composicao->get_solucao_composicao_list_by_id_solucao($id);
    	
    	 
    	$ind = 0;
    	$acumPista = 0;
    	$acumAcostamento1 = 0;
    	$acumAcostamento2 = 0;

    	$acumResPista 	   	 = 0;
    	$acumResAcostamento1 = 0;
    	$acumARescostamento2 = 0;
    	
    	$arrayAcumulados = array();
    	 
    	 
    	foreach($listaComposicoes as $item){
    		
    		$valUnitarioResult = $this->get_valor_unitario_by_id_sicro_composicao($id_sicro, $item['id']);
    		
    		$tmpPista 		  = 0;
    		$tmpAcostamento1 = 0;
    		$tmpAcostamento2 = 0;
    		$tmpComp_pista	  = 0;
    		 
    		$tmpPistaParcial 		= 0;
    		$tmpAcostamento1Parcial = 0;
    		$tmpAcostamento2Parcial = 0;    		 
    		 
    		$tmpVolume 	  = 1;
    		$tmpFator 	  = 1;
    		 
    		if($item['pista']){
    			$listaComposicoes[$ind]['pista'] = $variavel->get_variaveis_by_id($item['pista']);
    			$tmpPista = $listaComposicoes[$ind]['pista'][0]['quantidade'];
    		}
    		if($item['acostamento1']){
    			$listaComposicoes[$ind]['acostamento1'] = $variavel->get_variaveis_by_id($item['acostamento1']);
    			$tmpAcostamento1 = $listaComposicoes[$ind]['acostamento1'][0]['quantidade'];
    		}
    		if($item['acostamento2']){
    			$listaComposicoes[$ind]['acostamento2'] = $variavel->get_variaveis_by_id($item['acostamento2']);
    			$tmpAcostamento2 = $listaComposicoes[$ind]['acostamento2'][0]['quantidade'];
    		}
    		if($item['comprimento_pista']){
    			$listaComposicoes[$ind]['comprimento_pista'] = $variavel->get_variaveis_by_id($item['comprimento_pista']);
    			$tmpComp_pista = $listaComposicoes[$ind]['comprimento_pista'][0]['quantidade'];
    		}
    		if($item['volume']){
    			$listaComposicoes[$ind]['volume'] = $variavel->get_variaveis_by_id($item['volume']);
    			$tmpVolume = $listaComposicoes[$ind]['volume'][0]['quantidade'];
    		}
    		if($item['fator']){
    			$listaComposicoes[$ind]['fator'] = $variavel->get_variaveis_by_id($item['fator']);
    			$tmpFator = $listaComposicoes[$ind]['fator'][0]['quantidade'];
    		}
    		 
    		$valUnitarioResult = round($valUnitarioResult, 2);
    		 
    		$tmpPistaParcial 		 = ($this->get_volume_total(($tmpPista), $tmpComp_pista, $tmpVolume) * $tmpFator ) * $valUnitarioResult;
    		$tmpAcostamento1Parcial = ($this->get_volume_total(($tmpAcostamento1), $tmpComp_pista, $tmpVolume) * $tmpFator ) * $valUnitarioResult;
    		$tmpAcostamento2Parcial = ($this->get_volume_total(($tmpAcostamento2), $tmpComp_pista, $tmpVolume) * $tmpFator ) * $valUnitarioResult;
    		 
    		$listaComposicoes[$ind]['solucao'] = array(
    				'tamanho_pista' => $tmpPista,
    				'tamanho_acostamento1' => $tmpAcostamento1,
    				'tamanho_acostamento2' => $tmpAcostamento2,
    				'comprimento_pista' => $tmpComp_pista,
    				'temp_volume' => $tmpVolume,
    				'valor_unitario' => $valUnitarioResult,
    				'fator'		   => $tmpFator,
    				'volume_total' => ($this->get_volume_total(($tmpPista), $tmpComp_pista, $tmpVolume)* $tmpFator ),
    				'volume_aco1' => ($this->get_volume_total(($tmpAcostamento1), $tmpComp_pista, $tmpVolume)* $tmpFator ),
    				'volume_aco2' => ($this->get_volume_total(($tmpAcostamento2), $tmpComp_pista, $tmpVolume)* $tmpFator ),
    				'pista' 	   => $tmpPistaParcial,
    				'acostamento1' => $tmpAcostamento1Parcial,
    				'acostamento2' => $tmpAcostamento2Parcial
    		);

    		    		
    		if($item['restauracao_pista_existente'] == 'SIM'){
    			$acumResPista 	   	 += $tmpPistaParcial;
    			$acumResAcostamento1 += $tmpAcostamento1Parcial;
    			$acumARescostamento2 += $tmpAcostamento2Parcial;
    		}else{
    			$acumPista 	   += $tmpPistaParcial;
    			$acumAcostamento1 += $tmpAcostamento1Parcial;
    			$acumAcostamento2 += $tmpAcostamento2Parcial;
    		}
    		 
    		 
    		 
    		$ind++;
    		 
    	}
    	
    	$data['solucao'] = $listaComposicoes;
    	
    	if( $solucaoData[0]['id_categoria'] == 2){
    		$data['result'] = array(
    				
    				'valor_total_pavimento_pista'	=> ($acumPista + $acumResPista),
    				'valor_total_pavimento_acos1' 	=> ($acumAcostamento1 + $acumResAcostamento1),
    				'Valor_potal_pavimento_acos2' 	=> ($acumAcostamento2 + $acumARescostamento2),
    				'valor_final_pista' 			=> ($acumPista * $fatorMultiCalFinal[0]['fator1'])  + ($acumResPista * $fatorMultiCalFinal[0]['fator2']),
    				'valor_final_acos1' 			=> ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']) + ($acumResAcostamento1 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_final_acos2' 			=> ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']) + ($acumARescostamento2 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km1' 				=> (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']) + (($acumResPista + $acumResAcostamento1) * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km2' 				=> (($acumPista + $acumAcostamento2) * $fatorMultiCalFinal[0]['fator1']) + (($acumResPista + $acumARescostamento2) * $fatorMultiCalFinal[0]['fator2']),

    				'valor_total_pavimento_pista_cons' => $acumPista,
    				'valor_total_pavimento_acos1_cons' => $acumAcostamento1,
    				'Valor_potal_pavimento_acos2_cons' => $acumAcostamento2,
    				'valor_final_pista_cons' 		  => ($acumPista * $fatorMultiCalFinal[0]['fator1']) ,
    				'valor_final_acos1_cons' 		  => ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_final_acos2_cons' 		  => ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km1_cons' 			  => (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km2_cons' 			  => (($acumPista + $acumAcostamento2) * $fatorMultiCalFinal[0]['fator1']),
    				
    				'valor_total_pavimento_pista_res'	=> $acumResPista,
    				'valor_total_pavimento_acos1_res' 	=> $acumResAcostamento1,
    				'Valor_potal_pavimento_acos2_res' 	=> $acumARescostamento2,
    				'valor_final_pista_res' 			=> ($acumResPista * $fatorMultiCalFinal[0]['fator2']) ,
    				'valor_final_acos1_res' 			=> ($acumResAcostamento1 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_final_acos2_res' 			=> ($acumARescostamento2 * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km1_res' 				=> (($acumResPista + $acumResAcostamento1) * $fatorMultiCalFinal[0]['fator2']),
    				'valor_total_km2_res' 				=> (($acumResPista + $acumARescostamento2) * $fatorMultiCalFinal[0]['fator2']),
    				
    				'somatorio_3_itens'					=> (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']) + (($acumResPista + $acumResAcostamento1) * $fatorMultiCalFinal[0]['fator2'])				
    				
    		);
    	}else{
    		
    		$data['result'] = array(
    				'valor_total_pavimento_pista' => $acumPista,
    				'valor_total_pavimento_acos1' => $acumAcostamento1,
    				'Valor_potal_pavimento_acos2' => $acumAcostamento2,
    				'valor_final_pista' => ($acumPista * $fatorMultiCalFinal[0]['fator1']) ,
    				'valor_final_acos1' => ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_final_acos2' => ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km1' => (($acumPista + $acumAcostamento1) * $fatorMultiCalFinal[0]['fator1']),
    				'valor_total_km2' => (($acumPista + $acumAcostamento2) * $fatorMultiCalFinal[0]['fator1']),
    				'somatorio_3_itens' => (($acumPista * $fatorMultiCalFinal[0]['fator1']) + ($acumAcostamento1 * $fatorMultiCalFinal[0]['fator1']) + ($acumAcostamento2 * $fatorMultiCalFinal[0]['fator1']) )
    		);
    	}

    	
    	$data['main_content'] = 'admin/solucoes/checar_solucao';
    	$this->load->view('includes/template', $data);
    
    }
    
    
    // TODO : TROCAR PARA VALOR GENRICO
    //função temporária para retorno de valor unitário de composição baseada no SICRO selecionado
    public function get_valor_unitario_by_id_sicro_composicao($id_sicro, $id_composicao){
    	
    	$composicao = new composicoes();
    	return $composicao->get_valor_unitario($id_sicro, $id_composicao);
    } 
    
    public function get_area_total($val1, $val2){
    	$result = $val1 * $val2;
    	return $result;
    }
    	
    public function get_volume_total($val1, $val2, $val3){
    	$result = $val1 * $val2 * $val3;
    	return $result;
    }
    
}