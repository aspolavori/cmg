<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class consulta_contagens extends App_controller {

	const VIEW_FOLDER = 'admin/consulta_contagens';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('consulta_contagensdao');
        $contagens = new consulta_contagensdao();

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {
    	
        if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		$this->load->model('pesquisa_trafegosdao');
    		$pesquisa = new pesquisa_trafegosdao();
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
				    					'km_ini' 	=> $this->input->post('km_ini'),
				    					'km_fim' 	=> $this->input->post('km_fim'),
				    					'data_ini' 	=> $anoIni,
				    					'data_fim' 	=> $anoFim
    			);
    			
    			$data['pesquisas']	= $this->consulta_contagensdao->get_consulta_contagens($data_to_store);
    			
    		}
    		
    		
    	}else{
    		$data['pesquisas'] = array();
    	}
    	
    	$i = 0;
    	if(isset($data['pesquisas'])){
	    	foreach($data['pesquisas'] as $item){
	    		
	    		if($this->consulta_contagensdao->exist_contagem($item['id'])){
	    			$data['pesquisas'][$i]['contagem'] = true;
	    		}
	    		if($this->consulta_contagensdao->exist_od($item['id'])){
	    			$data['pesquisas'][$i]['od'] = true;
	    		}
	    		$i++;
	    		
	    		//$this->consulta_contagensdao->exist_somdagem();
	    	}
    	}
    	
    	//$this->PAR($data['pesquisas']);
    	//die;
    	
    	
    	// ufs data
    	$data['ufs'] = $this->get_ufs();
    	  	
        //load the view
    	$data['main_content'] = 'admin/consulta_contagens/list';
        $this->load->view('includes/template', $data); 

    }//index    
    	
public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('uf', 'uf', 'required'); 
        	$this->form_validation->set_rules('br', 'br', 'required'); 
        	$this->form_validation->set_rules('km_ini', 'km_ini', 'required'); 
        	$this->form_validation->set_rules('km_fim', 'km_fim', 'required'); 
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required'); 
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('uf' => $this->input->post('uf'),'br' => $this->input->post('br'),'km_ini' => $this->input->post('km_ini'),'km_fim' => $this->input->post('km_fim'),'data_ini' => $this->input->post('data_ini'),'data_fim' => $this->input->post('data_fim'),
                );
                //if the insert has returned true then we show the flash message
                if($this->consulta_contagensdao->store_consulta_contagem($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/consulta_contagens/add';
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
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('br', 'br', 'required');
        	$this->form_validation->set_rules('km_ini', 'km_ini', 'required');
        	$this->form_validation->set_rules('km_fim', 'km_fim', 'required');
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required');
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
		        	'uf' => $this->input->post('uf'),
		        	'br' => $this->input->post('br'),
		        	'km_ini' => $this->input->post('km_ini'),
		        	'km_fim' => $this->input->post('km_fim'),
		        	'data_ini' => $this->input->post('data_ini'),
		        	'data_fim' => $this->input->post('data_fim'),                    
		        );
                //if the insert has returned true then we show the flash message
                if($this->consulta_contagensdao->update_consulta_contagem($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/consulta_contagens/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['consulta_contagem'] = $this->consulta_contagensdao->get_consulta_contagem_by_id($id);
        //load the view
        $data['main_content'] = 'admin/consulta_contagens/edit';
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
        $this->consulta_contagensdao->delete_consulta_contagem($id);
        redirect('admin/consulta_contagens');
    }//edit

    
    public function resultado(){
    	
    	//product id
    	$id = $this->uri->segment(4);
    	$id_classVeicular = $this->uri->segment(5);
    	
    	$this->load->model('pesquisa_trafegosdao');
    	$pesquisa = new pesquisa_trafegosdao();
    	
    	$this->load->model('sentidosdao');
    	$sentido = new sentidosdao();

    	$this->load->model('contagensdao');
    	$contagem = new contagensdao();
    	
    	$this->load->model('classeveiculosdao');
    	$classVeiculo = new classeveiculosdao();
    	
    	$data['contagem'] = $pesquisa->get_contagem_completa($id);
    	// repensar isso
    	$data['pesquisa_trafego'] = $data['contagem'][0];
    	
    	$arraySentidos = $sentido->get_sentido_by_pesquisa_id($id);
    	$nSentidos = count($arraySentidos);
    	
    	$i = 0;
    	foreach($arraySentidos as $item1){    		
    		$temp[0] = $id; 
    		$temp[1] = $item1['id'];
    		$arraySentidos[$i]['data'] = $contagem->get_contagens_data_by_pesquisa_sentido($temp); 
    		$j = 0;
    		foreach($arraySentidos[$i]['data'] as $item2){
    			$temp[2] = $item2['data'];
    			$arraySentidos[$i]['data'][$j]['contagem'] = $contagem->get_contagens_data_by_pesquisa_sentido_data($temp);
    			$k = 0;
    			foreach($arraySentidos[$i]['data'][$j]['contagem'] as $item3){
    				array_push($arraySentidos[$i]['data'][$j]['contagem'][$k], $pesquisa->get_veiculoclasse_by_pesquisa_edit($id, $item3['id'], $id_classVeicular ));
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
    	//$this->PAR($data['contagem']);
    	//die;
    	
    	$data['contagem2'] = $arraySentidos;
    	$data['classeVeiculos'] = $classVeiculo->get_classeveiculos('', 'titulo');
    	
    	$data['main_content'] = 'admin/consulta_contagens/resultado';
    	$this->load->view('includes/template', $data);
    }
    
    
    public function resultado_od(){
    	 
    	//product id
    	$id = $this->uri->segment(4);
    	$idClasseVeiculo = $this->uri->segment(5);
    	 
    	$this->load->model('pesquisa_trafegosdao');
    	$pesquisa = new pesquisa_trafegosdao();
    	 
    	$this->load->model('sentidosdao');
    	$sentido = new sentidosdao();
    
    	$this->load->model('contagensdao');
    	$contagem = new contagensdao();
    	 
    	$this->load->model('origens_destinosdao');
    	$od = new origens_destinosdao();
    	
    	$this->load->model('classeveiculosdao');
    	$classVeiculo = new classeveiculosdao();
    	
    	$this->load->model('od_perguntasdao');
    	$pergunta = new od_perguntasdao();
    	
    	$data['contagem'] = $pesquisa->get_contagem_completa($id);
    	
    	$data['perguntas_adicionais'] = $pesquisa->get_perguntas_od_by_id_entrevista($id);
    	
    	// repensar isso
    	$data['pesquisa_trafego'] = $data['contagem'][0];
    	

    	$data['origens_destinos'] = $od->get_origens_destinos_by_pesquisa($id, '', '', '', '','', $idClasseVeiculo);
    	
    	
    	//$this->PAR($data['origens_destinos']);
    	
    	$i = 0;
    	foreach($data['origens_destinos'] as $item){
    		$data['origens_destinos'][$i]['perguntas'] =    $pergunta->get_perguntas_by_od_id_edit($item['id'], $item['id_pesquisa']);
    		$i++;
    	}
    	
    	//$this->PAR($data['origens_destinos']);
    	
    	//$this->PAR($data['perguntas_adicionais']);
    	//die;
    	

    	//$this->PAR($data['origens_destinos']);
    	//DIE;
    	
    	$data['classeVeiculos'] = $classVeiculo->get_classeveiculos('', 'titulo');
    	
    	$data['main_content'] = 'admin/consulta_contagens/resultado_od';
    	$this->load->view('includes/template', $data);
    }
    
    
    
    // gel all ufs disponiveis
    public function get_ufs(){
    	 
    	$this->load->model('pesquisa_trafegosdao');
    	$ufs = new pesquisa_trafegosdao();
    	return  $ufs->get_ufs_disponiveis();
    	 
    }
    
    public function get_brs_by_uf($uf){
    	 
    	$this->load->model('pesquisa_trafegosdao');
    	$brs = new pesquisa_trafegosdao();
    	 
    	$myJSON = json_encode($brs->get_brs_by_uf($uf));
    	echo($myJSON);
    	 
    	 
    }
    
    public function get_kms_by_uf_br($uf, $br){
    
    	$this->load->model('pesquisa_trafegosdao');
    	$km = new pesquisa_trafegosdao();
    
    	$myJSON = json_encode($km->get_km_by_uf_br($uf, $br));
    	echo($myJSON);
    
    }
    
    
}