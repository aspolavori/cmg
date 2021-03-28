<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
require_once(APPPATH . 'controllers/solucoes' . EXT);

class relatorios_cmg extends App_controller {
	
	const VIEW_FOLDER = 'admin/relatorios_cmg';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('relatorios_cmgdao');

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {
    	
    	$this->load->model('sicrosdao');
    	$sicro = new sicrosdao();
    	$data['regioes'] = $sicro->get_regiao_sicro();
    	 
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		//form validation
    		$this->form_validation->set_rules('regiao', 'regiao', 'required');
    		$this->form_validation->set_rules('uf', 'uf', '');
    		$this->form_validation->set_rules('data_ini', 'data_ini', '');
    		$this->form_validation->set_rules('data_fim', 'data_fim', '');
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    	
    			$data_to_consult = array(
    					'regiao' => $this->input->post('regiao'),
    					'uf' => $this->input->post('uf'),
    					'data_ini' => $this->input->post('data_ini'),
    					'data_fim' => $this->input->post('data_fim'),
    			);
    			 
    			$data['sicros'] = $sicro->get_sicro_list_to_relatorio($data_to_consult);
    	
    		}//validation run
    	
    	}
    	 
    	 
    	//load the view
    	$data['main_content'] = 'admin/relatorios_cmg/get_relatorio';
    	$this->load->view('includes/template', $data);
    	
        

    }//index    

    public function catalogos(){
    	
    	$this->load->model('sicrosdao');
    	$sicro = new sicrosdao();
    	$data['regioes'] = $sicro->get_regiao_sicro();
    	
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		//form validation
    		$this->form_validation->set_rules('regiao', 'regiao', 'required');
    		$this->form_validation->set_rules('uf', 'uf', '');
    		$this->form_validation->set_rules('data_ini', 'data_ini', '');
    		$this->form_validation->set_rules('data_fim', 'data_fim', '');
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    			 
    			$data_to_consult = array(
    					'regiao' => $this->input->post('regiao'),
    					'uf' => $this->input->post('uf'),
    					'data_ini' => $this->input->post('data_ini'),
    					'data_fim' => $this->input->post('data_fim'),
    			);
    	
    			$data['sicros'] = $sicro->get_sicro_list_to_relatorio($data_to_consult);
    			 
    		}//validation run
    	   
    	}
    	
    	//load the view
    	$data['main_content'] = 'admin/relatorios_cmg/get_catalogos';
    	$this->load->view('includes/template', $data);
    }
    
    public function hdm_veiculos(){
    	
    	$this->load->model('hdm_veiculosdao');
    	$hdm_veiculo = new hdm_veiculosdao();
    	//$data['regioes'] = $sicro->get_regiao_sicro();
    	 
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		//form validation
    		$this->form_validation->set_rules('ano', 'ano', '');
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    	
    			$data_to_consult = array(
    					'ano' => $this->input->post('ano'),
    			);
    			 
    			$data['hdm_veiculos'] = $hdm_veiculo->get_hdm_veiculos();
    	
    		}//validation run
    	
    	}else{
    		$data['hdm_veiculos'] = $hdm_veiculo->get_hdm_veiculos();
    	}
    	 
    	//load the view
    	$data['main_content'] = 'admin/relatorios_cmg/get_catalogos';
    	$this->load->view('includes/template', $data);
    }
    

    public function gerar_catalogo()
    {
    	//product id
    	$id_sicro = $this->uri->segment(4);
    	$data['id_sicro'] = $id_sicro;
    	 
    	$this->load->model('categoriasdao');
    	$categoria = new categoriasdao();
    	$data['categorias'] = $categoria->get_categorias();
    	 
    	//$this->PAR($data['categorias']);
    
    	$data['main_content'] = 'admin/relatorios_cmg/list_especial';
    	$this->load->view('includes/template', $data);
    }
    
	public function gerar_relatorio()
    {
    	//product id
    	$id_sicro = $this->uri->segment(4);
    	$data['id_sicro'] = $id_sicro; 
    	
    	$this->load->model('categoriasdao');
    	$categoria = new categoriasdao();
    	$data['categorias'] = $categoria->get_categorias();
    	
    	//$this->PAR($data['categorias']);
    	 
    	$data['main_content'] = 'admin/relatorios_cmg/list';
    	$this->load->view('includes/template', $data);
    }       
    			

    public function gerar_relatorio_categoria()
    {
    	$fatorPavimentar = $this->uri->segment(4); 
		
    	$id_sicro = $this->uri->segment(5);
    	$data['id_sicro'] = $id_sicro;
    	
    	$id_categoria = $this->uri->segment(6);
    	$data['id_categoria'] = $id_categoria;
    	 
    	$this->load->model('categoriasdao');
    	$categoria = new categoriasdao();
    	$data['categorias'] = $categoria->get_categorias();
    	
    	$this->load->model('solucoesdao');
    	$solucao = new solucoesdao();
    	$listaSolucoes = $solucao->get_solucoes_by_id_categoria($id_categoria);
    	
    	$solucaoControll = new solucoes();
    	
    	$k = 0;
    	foreach($listaSolucoes as $item){
    		
    		$listaSolucoes[$k]['result'] = $solucaoControll->executa_solucao($item['id'], $id_sicro, $fatorPavimentar);
    		$k++;
    	}
    	
    	$data['solucoes'] = $listaSolucoes ;
    
    	// ECHO $id_categoria;
    	//die;

    	switch ($id_categoria) {
    		case 1 :
    			// relatorio para pista simples
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria1';
    			break;
			
    		case 2 :
    			// relatorio para terceira faixa
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria2';
    			break;
    			
    		case 3 :
    			//relatorio para pista dupla
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria3';
    			break;
    			
    		case 4 :
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria4';
    			break;
    			
    		case 5 :
    			// relatorio para selagem
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria5';
    			break;
    			
    		case 6 :
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria6';
    			break;
    			
    		case 7 :
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria7';
    			break;
    			
    		default : 
    			// relatorio default
    			$data['main_content'] = 'admin/relatorios_cmg/relatorio_categoria5';
    			break;
    	}
    	
    	
    	$this->load->view('includes/template', $data);
    }
    
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(                    
                );
                //if the insert has returned true then we show the flash message
                if($this->relatorios_cmgdao->update_relatorios_cmg($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/relatorios_cmg/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['relatorios_cmg'] = $this->relatorios_cmgdao->get_relatorios_cmg_by_id($id);
        //load the view
        $data['main_content'] = 'admin/relatorios_cmg/edit';
        $this->load->view('includes/template', $data);            

    }//update    			
    	
    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->relatorios_cmgdao->delete_relatorios_cmg($id);
        redirect('admin/relatorios_cmg');
    }//edit

    
    public function get_ufs_by_regiao($regiao){
    
    	
    	$regiao = str_replace("_", " ", $regiao);
    	$this->load->model('sicrosdao');
    	$ufs = new sicrosdao();
    
    	$myJSON = json_encode($ufs->get_uf_sicro_by_regiao($regiao));
    	echo($myJSON);
    
    
    }

    // funcao para relatorio diferenciado hdm
    function get_catalogo_hdm(){
    	
    	$id_sicro = $this->uri->segment(4);
    	
    	$fatorCorrFinanceiroEconomico = 0.7;
    	
    	$arrayRodPav['drenagem'] = array(14, 15, 16);
    	$arrayRodPav['diversos'] = array(17, 18, 19);
    	$arrayRodPav['reparos']  = array(20, 21, 22);
    	$arrayRodPav['servicos'] = array(23, 24, 25);
    	
    	$arrayRodNPav['descontinua'] 	= array(26,27);
    	$arrayRodNPav['regularizacao'] 	= array(28,29);
    	$arrayRodNPav['continua'] 		= array(30,31);
    	$arrayRodNPav['mice'] 		= array(32,33);
    	
    	$solucaoControll = new solucoes();
    	
    	for($k=0; $k<3;$k++){	// fator pavimentar do hdm4
    		$listaSolucoes['drenagem'][$k] = $solucaoControll->executa_solucao($arrayRodPav['drenagem'][$k], $id_sicro, 'padrao');
    		$listaSolucoes['diversos'][$k] = $solucaoControll->executa_solucao($arrayRodPav['diversos'][$k], $id_sicro, 'padrao');
    		$listaSolucoes['reparos'][$k]  = $solucaoControll->executa_solucao($arrayRodPav['reparos'][$k], $id_sicro, 'padrao');
    		$listaSolucoes['servicos'][$k] = $solucaoControll->executa_solucao($arrayRodPav['servicos'][$k], $id_sicro, 'padrao');
    		
    		$listaSolucoes['drenagem'][$k] = $listaSolucoes['drenagem'][$k]['valor_total_km1'];
    		$listaSolucoes['diversos'][$k] = $listaSolucoes['diversos'][$k]['valor_total_km1'];
    		$listaSolucoes['reparos'][$k]  = $listaSolucoes['reparos'][$k]['valor_total_km1'];
    		$listaSolucoes['servicos'][$k] = $listaSolucoes['servicos'][$k]['valor_total_km1'];
    		
    		
    		$listaSolucoes['drenagemE'][$k] = $listaSolucoes['drenagem'][$k] * $fatorCorrFinanceiroEconomico;
    		$listaSolucoes['diversosE'][$k] = $listaSolucoes['diversos'][$k] * $fatorCorrFinanceiroEconomico ;
    		$listaSolucoes['reparosE'][$k] 	= $listaSolucoes['reparos'][$k] * $fatorCorrFinanceiroEconomico;
    		$listaSolucoes['servicosE'][$k] = $listaSolucoes['servicos'][$k] * $fatorCorrFinanceiroEconomico;
    		
    		$listaSolucoes['totalPavF'][$k] = $listaSolucoes['drenagem'][$k] + $listaSolucoes['diversos'][$k] + $listaSolucoes['reparos'][$k] + $listaSolucoes['servicos'][$k];
    		$listaSolucoes['totalPavE'][$k] = $listaSolucoes['totalPavF'][$k] * $fatorCorrFinanceiroEconomico;
    	}
    	
    	for($k=0; $k<2;$k++){	// fator pavimentar do hdm'padrao'
    		$listaSolucoes['descontinua'][$k] = $solucaoControll->executa_solucao($arrayRodNPav['descontinua'][$k], $id_sicro, 'padrao');
    		$listaSolucoes['regularizacao'][$k] = $solucaoControll->executa_solucao($arrayRodNPav['regularizacao'][$k], $id_sicro, 'padrao');
    		$listaSolucoes['continua'][$k] = $solucaoControll->executa_solucao($arrayRodNPav['continua'][$k], $id_sicro, 'padrao');
    		$listaSolucoes['mice'][$k] = $solucaoControll->executa_solucao($arrayRodNPav['mice'][$k], $id_sicro, 'padrao');
    		
    		$listaSolucoes['descontinua'][$k] = $listaSolucoes['descontinua'][$k]['valor_total_km1'];
    		$listaSolucoes['regularizacao'][$k] = $listaSolucoes['regularizacao'][$k]['valor_total_km1'];
    		$listaSolucoes['continua'][$k] = $listaSolucoes['continua'][$k]['valor_total_km1'];
    		$listaSolucoes['mice'][$k] = $listaSolucoes['mice'][$k]['valor_total_km1'];
    		
    		$listaSolucoes['descontinuaE'][$k] 	 = $listaSolucoes['descontinua'][$k] * $fatorCorrFinanceiroEconomico;
    		$listaSolucoes['regularizacaoE'][$k] = $listaSolucoes['regularizacao'][$k] * $fatorCorrFinanceiroEconomico ;
    		$listaSolucoes['continuaE'][$k]    	 = $listaSolucoes['continua'][$k] * $fatorCorrFinanceiroEconomico;
    		$listaSolucoes['miceE'][$k]    	 = $listaSolucoes['mice'][$k] * $fatorCorrFinanceiroEconomico;
    		
    		$listaSolucoes['totalNPavF'][$k] = $listaSolucoes['descontinua'][$k] + $listaSolucoes['regularizacao'][$k] + $listaSolucoes['continua'][$k]  + $listaSolucoes['mice'][$k] ;
    		$listaSolucoes['totalNPavE'][$k] = $listaSolucoes['totalNPavF'][$k] * $fatorCorrFinanceiroEconomico;
    	}
    	
    	$data['result'] = $listaSolucoes;
    	
    	
    	$data['main_content'] = 'admin/relatorios_cmg/relatorio_hdm';
    	$this->load->view('includes/template', $data);
    	
    }
    
    function get_catalogo_concreto_asflatico(){
    	
    	$id_sicro = $this->uri->segment(4);
    	$data['id_sicro'] = $id_sicro;
    	 
    	$this->load->model('solucoesdao');
    	$solucao = new solucoesdao();
    	
    	$ids_solucao = array(35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 56, 57 );
    	
    	$listaSolucoes = array();
    	foreach($ids_solucao as $item){
    		$t = $solucao->get_solucao_by_id($item);
    		array_push($listaSolucoes, $t[0]) ;
    	}
    	
    	$solucaoControll = new solucoes();
    	 
    	$k = 0;
    	foreach($listaSolucoes as $item){
    		 
    		$listaSolucoes[$k]['result'] = $solucaoControll->executa_solucao($item['id'], $id_sicro );
    		$k++;
    	}
    	 
    	$data['solucoes'] = $listaSolucoes ;
    	
    	$data['main_content'] = 'admin/relatorios_cmg/relatorio_concreto_asfaltico';
    	$this->load->view('includes/template', $data);
    }
    
    function get_catalogo_tratamento_superficial(){
    	    	
    	$id_sicro = $this->uri->segment(4);
    	$data['id_sicro'] = $id_sicro;
    	   	 
    	$this->load->model('solucoesdao');
    	$solucao = new solucoesdao();
    	
    	$ids_solucao = array(35, 54, 38, 39, 40, 41, 42, 43, 44, 45, 47, 48, 49, 50, 51, 52, 56, 57, 58, 55 );
    	$listaSolucoes = array();
    	foreach($ids_solucao as $item){
    		$t = $solucao->get_solucao_by_id($item);
    		array_push($listaSolucoes, $t[0]) ;
    	}
    	
    	$solucaoControll = new solucoes();
    	 
    	$k = 0;
    	foreach($listaSolucoes as $item){
    	
    		$listaSolucoes[$k]['result'] = $solucaoControll->executa_solucao($item['id'], $id_sicro );
    		$k++;
    	}
    	 
    	$data['solucoes'] = $listaSolucoes ;
    	
    	$data['main_content'] = 'admin/relatorios_cmg/relatorio_tratamento_superficial';
    	$this->load->view('includes/template', $data);
    }
    
    function get_passarela(){
    	$data['main_content'] = 'admin/relatorios_cmg/relatorio_passarela';
    	$this->load->view('includes/template', $data);
    }
    
    
}