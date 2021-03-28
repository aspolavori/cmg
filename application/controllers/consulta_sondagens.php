<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class consulta_sondagens extends App_controller {

	const VIEW_FOLDER = 'admin/consulta_sondagens';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('consulta_sondagensdao');
        $sondagens = new consulta_sondagensdao();

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {
    	
        if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		$this->load->model('sondagensdao');
    		$pesquisa = new sondagensdao();
    		//form validation
    		$this->form_validation->set_rules('uf', 'uf', 'required');
    		$this->form_validation->set_rules('br', 'br', 'required', 'numeric');
    		$this->form_validation->set_rules('km_ini', 'km inicial', 'trim|required|numeric');
    		$this->form_validation->set_rules('km_fim', 'km final', 'trim|required|numeric');
    		$this->form_validation->set_rules('data_ini', 'data inicial', 'trim|numeric');
    		$this->form_validation->set_rules('data_fim', 'data final', 'trim|numeric');
    		
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    	
    		if($this->input->post('data_ini')){
    			$anoIni = $this->input->post('data_ini').'-12-31'; 
    		}else{
    			$anoIni = '1900-01-01'; 
    		}

    		if($this->input->post('data_fim')){
    			$anoFim = $this->input->post('data_fim').'-12-31';
    		}else{
    			$anoFim = '3000-01-01';
    		}
    		
    		
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    			
    			$data_to_store = array(	'uf' 		=> $this->input->post('uf'),
				    					'br'		=> $this->input->post('br'),
				    					'km_ini'	=> $this->input->post('km_ini'),
				    					'km_fim' 	=> $this->input->post('km_fim'),
				    					'data_ini' 	=> $anoIni,
				    					'data_fim' 	=> $anoFim
    			);
    			
    			$data['pesquisas']	= $this->consulta_sondagensdao->get_consulta_sondagens($data_to_store);
    			
    		}
    		
    		
    	}else{
    		$data['pesquisas'] = array();
    	}
    	
    	if(isset($data['pesquisas'])){
	    	$i = 0;
	    	foreach($data['pesquisas'] as $item){
	    		
	    		if($this->consulta_sondagensdao->exist_sondagem($item['id'])){
	    			$data['pesquisas'][$i]['sondagem'] = true;
	    		}
	    		$i++;
	    		
	    		//$this->consulta_sondagensdao->exist_somdagem();
	    	}
    	}
    	//$this->PAR($data['pesquisas']);
    	//die;
    	
    	
    	// ufs data
    	$data['ufs'] = $this->get_ufs();
    	  	
        //load the view
    	$data['main_content'] = 'admin/consulta_sondagens/list';
        $this->load->view('includes/template', $data); 

    }//index    
    	
	
    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->consulta_sondagensdao->delete_consulta_sondagem($id);
        redirect('admin/consulta_sondagens');
    }//edit

    
    public function resultado(){
    	
    	//product id
    	$id = $this->uri->segment(4);
    	
    	$this->load->model('sondagensdao');
    	$pesquisa = new sondagensdao();
    	
    	$this->load->model('sentidosdao');
    	$sentido = new sentidosdao();

    	$this->load->model('sondagensdao');
    	$sondagem = new sondagensdao();
    	
    	$data['sondagem'] = $pesquisa->get_sondagem_completa($id);
    	// repensar isso
    	$data['pesquisa_trafego'] = $data['sondagem'][0];
    	
    	$arraySentidos = $sentido->get_sentido_by_pesquisa_id($id);
    	$nSentidos = count($arraySentidos);
    	
    	$i = 0;
    	foreach($arraySentidos as $item1){    		
    		$temp[0] = $id; 
    		$temp[1] = $item1['id'];
    		$arraySentidos[$i]['data'] = $sondagem->get_sondagens_data_by_pesquisa_sentido($temp); 
    		$j = 0;
    		foreach($arraySentidos[$i]['data'] as $item2){
    			$temp[2] = $item2['data'];
    			$arraySentidos[$i]['data'][$j]['sondagem'] = $sondagem->get_sondagens_data_by_pesquisa_sentido_data($temp);
    			$k = 0;
    			foreach($arraySentidos[$i]['data'][$j]['sondagem'] as $item3){
    				array_push($arraySentidos[$i]['data'][$j]['sondagem'][$k], $pesquisa->get_veiculoclasse_by_pesquisa_edit($id, $item3['id']));
    				$k++;
    			}
    			$j++;
    		}
    		$i++; 
    		
    	}
    	
    	//$pesquisa->get_veiculoclasse_by_pesquisa_edit($id, $pesquisa['id']);
    	
    	//$this->par($arrayDatas);
    	//$this->par($arraySentidos);
		//die;
    	//$this->PAR($data['sondagem']);
    	//die;
    	
    	$data['sondagem2'] = $arraySentidos;
    	
    	$data['main_content'] = 'admin/consulta_sondagens/resultado';
    	$this->load->view('includes/template', $data);
    }
    
    
    // gel all ufs disponiveis
    public function get_ufs(){
    	 
    	$this->load->model('sondagensdao');
    	$ufs = new sondagensdao();
    	return  $ufs->get_ufs_disponiveis();
    	 
    }
    
    public function get_brs_by_uf($uf){
    	 
    	$this->load->model('sondagensdao');
    	$brs = new sondagensdao();
    	 
    	$myJSON = json_encode($brs->get_brs_by_uf($uf));
    	echo($myJSON);
    	 
    	 
    }
    
    public function get_kms_by_uf_br($uf, $br){
    
    	$this->load->model('sondagensdao');
    	$km = new sondagensdao();
    
    	$myJSON = json_encode($km->get_km_by_uf_br($uf, $br));
    	echo($myJSON);
    
    }
    
    
}