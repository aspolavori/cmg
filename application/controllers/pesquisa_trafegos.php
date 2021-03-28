<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class pesquisa_trafegos extends App_controller {
	const VIEW_FOLDER = 'admin/pesquisa_trafegos';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pesquisa_trafegosdao');

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {

        //all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 30;

        $config['base_url'] = base_url().'admin/pesquisa_trafegos';
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
            $data['count_products']= $this->pesquisa_trafegosdao->count_pesquisa_trafegos($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['pesquisa_trafegos'] = $this->pesquisa_trafegosdao->get_pesquisa_trafegos($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['pesquisa_trafegos'] = $this->pesquisa_trafegosdao->get_pesquisa_trafegos($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['pesquisa_trafegos'] = $this->pesquisa_trafegosdao->get_pesquisa_trafegos('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['pesquisa_trafegos'] = $this->pesquisa_trafegosdao->get_pesquisa_trafegos('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['pequisa_trafeco_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->pesquisa_trafegosdao->count_pesquisa_trafegos();
            $data['pesquisa_trafegos'] = $this->pesquisa_trafegosdao->get_pesquisa_trafegos('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/pesquisa_trafegos/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('id_classeveiculos', 'id_classeveiculos', 'required'); 
        	$this->form_validation->set_rules('titulo', 'titulo', 'required'); 
        	$this->form_validation->set_rules('rodovia', 'rodovia', 'required'); 
        	$this->form_validation->set_rules('uf', 'uf', 'required'); 
        	$this->form_validation->set_rules('trecho', 'trecho', 'required'); 
        	$this->form_validation->set_rules('km', 'km', 'required');
        	$this->form_validation->set_rules('id_entrevista', 'id_entrevista', '');
        	$this->form_validation->set_rules('n_posto', 'n_posto', ''); 
        	$this->form_validation->set_rules('chefe_posto', 'chefe_posto', ''); 
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required'); 
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required');
        	$this->form_validation->set_rules('lat', 'lat', '');
        	$this->form_validation->set_rules('long', 'long', '');
        	$this->form_validation->set_rules('snv', 'snv', '');
        	$this->form_validation->set_rules('ano_snv', 'ano_snv', '');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	
                $data_to_store = array(
                		'id_classeveiculos' => $this->input->post('id_classeveiculos'),
                		'titulo' => $this->input->post('titulo'),
                		'rodovia' => $this->input->post('rodovia'),
                		'uf' => $this->input->post('uf'),
                		'trecho' => $this->input->post('trecho'),
                		'km' => $this->input->post('km'),
                		'id_entrevista' => $this->input->post('id_entrevista'),
                		'n_posto' => $this->input->post('n_posto'),
                		'chefe_posto' => $this->input->post('chefe_posto'),
                		'data_ini' => $this->input->post('data_ini'),
                		'data_fim' => $this->input->post('data_fim'),
                		'lat' => $this->input->post('lat'),
                		'long' => $this->input->post('long'),
                		'snv' => $this->input->post('snv'),
                		'ano_snv' => $this->input->post('ano_snv')
                );
                //if the insert has returned true then we show the flash message
                if($this->pesquisa_trafegosdao->store_pequisa_trafeco($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        
        $this->load->model('classeveiculosdao');
        $classeveicular = new classeveiculosdao();
        $data['classeveicular'] = $classeveicular->get_classeveiculos(null, "titulo");
        
        $this->load->model('entrevistasdao');
        $entrevistasdao = new entrevistasdao();
        $data['entrevistas'] = $entrevistasdao->get_entrevistas(null, "titulo");
        
        
        //load the view
        $data['main_content'] = 'admin/pesquisa_trafegos/add';
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
        	$this->form_validation->set_rules('id_classeveiculos', 'id_classeveiculos', 'required');
        	$this->form_validation->set_rules('titulo', 'titulo', 'required');
        	$this->form_validation->set_rules('rodovia', 'rodovia', 'required');
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('trecho', 'trecho', 'required');
        	$this->form_validation->set_rules('km', 'km', 'required');
        	$this->form_validation->set_rules('id_entrevista', 'id_entrevista', '');
        	$this->form_validation->set_rules('n_posto', 'n_posto', '');
        	$this->form_validation->set_rules('chefe_posto', 'chefe_posto', '');
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required');
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required');
        	$this->form_validation->set_rules('lat', 'lat', '');
        	$this->form_validation->set_rules('long', 'long', '');
        	$this->form_validation->set_rules('snv', 'snv', '');
        	$this->form_validation->set_rules('ano_snv', 'ano_snv', '');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
				        	'id_classeveiculos' => $this->input->post('id_classeveiculos'),
				        	'titulo' => $this->input->post('titulo'),
				        	'rodovia' => $this->input->post('rodovia'),
				        	'uf' => $this->input->post('uf'),
				        	'trecho' => $this->input->post('trecho'),
				        	'km' => $this->input->post('km'),
                			'id_entrevista' => $this->input->post('id_entrevista'),
				        	'n_posto' => $this->input->post('n_posto'),
				        	'chefe_posto' => $this->input->post('chefe_posto'),
				        	'data_ini' => $this->input->post('data_ini'),
				        	'data_fim' => $this->input->post('data_fim'),
                			'lat' => $this->input->post('lat'),
                			'long' => $this->input->post('long'),
	                		'snv' => $this->input->post('snv'),
	                		'ano_snv' => $this->input->post('ano_snv')
                );
                //if the insert has returned true then we show the flash message
                if($this->pesquisa_trafegosdao->update_pequisa_trafeco($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/pesquisa_trafegos/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        $this->load->model('classeveiculosdao');
        $classeveicular = new classeveiculosdao();
        $data['classeveicular'] = $classeveicular->get_classeveiculos(null, "titulo");
        
        $this->load->model('entrevistasdao');
        $entrevistasdao = new entrevistasdao();
        $data['entrevistas'] = $entrevistasdao->get_entrevistas(null, "titulo");
        
        //product data 
        $data['pequisa_trafeco'] = $this->pesquisa_trafegosdao->get_pequisa_trafego_by_id($id);
        //load the view
        $data['main_content'] = 'admin/pesquisa_trafegos/edit';
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
        $this->pesquisa_trafegosdao->delete_pequisa_trafeco($id);
        redirect('admin/pesquisa_trafegos');
    }//edit    			
    	
	public function contagens_list(){
		//product id
		$id = $this->uri->segment(4);
		$this->load->model('contagensdao');
		
		//all the posts sent by the view
		$search_string = $this->input->post('search_string');
		$order = $this->input->post('order');
		$order_type = $this->input->post('order_type');
		
		//pagination settings
		$config['per_page'] = 300;
		
		$config['base_url'] = base_url().'admin/contagens';
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
				}else{
						$order = $this->session->userdata('order');
				}
				$data['order'] = $order;
		
				//save session data into the session
				if(isset($filter_session_data)){
					$this->session->set_userdata($filter_session_data);
				}
		
				//fetch sql data into arrays
				$data['count_products']= $this->contagensdao->count_contagens_by_pesquisa($id,$search_string, $order);
				$config['total_rows'] = $data['count_products'];
		
				//fetch sql data into arrays
				if($search_string){
					if($order){
						$data['contagens'] = $this->contagensdao->get_contagens_by_pesquisa($id, $search_string, $order, $order_type, $config['per_page'],$limit_end);
					}else{
						$data['contagens'] = $this->contagensdao->get_contagens_by_pesquisa($id, $search_string, '', $order_type, $config['per_page'],$limit_end);
					}
				}else{
					if($order){
						$data['contagens'] = $this->contagensdao->get_contagens_by_pesquisa($id, '', $order, $order_type, $config['per_page'],$limit_end);
					}else{
						$data['contagens'] = $this->contagensdao->get_contagens_by_pesquisa($id, '', '', $order_type, $config['per_page'],$limit_end);
					}
				}
		
			}else{
		
				//clean filter data inside section
				$filter_session_data['contagem_selected'] = null;
				$filter_session_data['search_string_selected'] = null;
				$filter_session_data['order'] = null;
				$filter_session_data['order_type'] = null;
				$this->session->set_userdata($filter_session_data);
		
				//pre selected options
				$data['search_string_selected'] = '';
				$data['order'] = 'id';
	
				//fetch sql data into arrays
				$data['count_products']= $this->contagensdao->count_contagens_by_pesquisa($id);
						$data['contagens'] = $this->contagensdao->get_contagens_by_pesquisa($id, '', '', $order_type, $config['per_page'],$limit_end);
				$config['total_rows'] = $data['count_products'];

			}
		
		
		$data['id_pesquisa_trafego'] = $id;
		
		
		//load the view
		$data['main_content'] = 'admin/contagens/contagens_list';
		$this->load->view('includes/template', $data);
		
	}
    
	public function contagem_add()
	{
		//product id
		$id = $this->uri->segment(4);
		
		$this->load->model('contagensdao');
		$contagem = new contagensdao();
		
		$this->load->model('sentidosdao');
		$sentido = new sentidosdao();
		// start processo de sessaao
		
		$veiculoData = array();
		
		
		// get all veiculos avaliable to count		
		$data['veiculos_list'] = $this->pesquisa_trafegosdao->get_veiculoclasse_by_pesquisa($id);
		
		//$this->PAR($data['veiculos_list'] );
	//	DIE;
		
		
		$data['id_pesquisa_trafegos'] = $id;
		
		//if save button was clicked, get the data sent via post
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{

			if($_FILES["file"]["name"]){
				 $fileName = $_FILES["file"]["name"] ;
				 
				 //form validation
				 $this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required');
				 $this->form_validation->set_rules('id_sentido', 'id_sentido', 'required');
				 
				 if ($this->form_validation->run())
				 {
				 	// start to read the file
				 	
				 	$target_file = PORTALPATH . 'assets/upload/' . basename($fileName);
				 	 
				 	$uploadOk = 1;
				 	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
				 	
				 	// Check if $uploadOk is set to 0 by an error
				 	if ($uploadOk == 0 or $fileName == '') {
				 	} else {
				 		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {				 			
				 			$inputFile = CONTAGENS_FOLDER . str_replace(' ', '_', $id.'_'.$fileName);
				 			copy ( $target_file , $inputFile );
				 			//unlink($target_file);
				 			 
				 		} else {
				 			echo "Desculpe, ouve um erro no upload do arquivo.";
				 			die;
				 		}
				 	}
				 	
				 	$separador = ";";
				 	
				 	$fp = fopen($inputFile, "r");
				 	$fileLines = array();
				 	
				 	$i = 0;
				 	while (!feof($fp)){
				 		$convert[] = fgets($fp);
				 	}
				 	
				 	$countTrue = 0;
				 	$countFalse = 0;
				 	
				 	for($i=0; $i<count($convert)-1;$i++){
				 		$temp =  explode("$separador", $convert[$i]);
				 		
				 		$date = explode("/", $temp[0]);
				 		if($i <> 0){
				 			$temp[0] = $date[2].'-'.$date[1].'-'.$date[0];
				 		}
				 		
				 		//$this->PAR($temp);
				 		//$this->PAR($data['veiculos_list']);
				 		
				 		$k = 0;
				 		foreach($temp as $dataFile){
				 			if($k > 1){
				 				if($dataFile > 0){
				 					$veiculoData[] = array('id_veiculo' => $data['veiculos_list'][$k-2]['id'],  'quantidade' => $dataFile) ;
				 				}		
				 			}
				 			$k++;
				 		}
				 		//$this->PAR($veiculoData);
				 		
				 		$data_to_store = array(
				 				'id_pesquisa_trafegos' => $this->input->post('id_pesquisa_trafegos'),
				 				'id_sentido' => $this->input->post('id_sentido'),
				 				'data' => $temp[0],
				 				'hora' => $temp[1]
				 		);
				 		
				 		
				 		$data['flash_message'] = TRUE;  
				 		//if the insert has returned true then we show the flash message
				 		if($contagem->store_contagem_pesquisa($data_to_store, $veiculoData)){
				 			$data['flash_message_file'][] = $data_to_store['data'].' '.$data_to_store['hora'] ;
				 			$countTrue++;
				 			
				 		}else{
				 			$data['flash_message'] = FALSE;
				 			$data['flash_message_file'][] = $data_to_store['data'].' '.$data_to_store['hora'] ;
				 			$countFalse++;
				 		}
				 		unset($veiculoData);
				 		$data['flash_message_count'] = array( 'inseridos' => $countTrue, 'falha' => $countFalse);
				 	}
				 }
				 
				 
				 
			}else{
				
				//form validation
				$this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required');
				$this->form_validation->set_rules('id_sentido', 'id_sentido', 'required');
				$this->form_validation->set_rules('data', 'data', 'required');
				$this->form_validation->set_rules('hora', 'hora', 'required');
					
				// validacao especial
				foreach($data['veiculos_list'] as $item){
					$this->form_validation->set_rules($item['classeVeiculo'], $item['classeVeiculo'], 'integer');
				}
				$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
				
					
				
				//if the form has passed through the validation
				if ($this->form_validation->run())
				{
					$data_to_store = array('id_pesquisa_trafegos' => $this->input->post('id_pesquisa_trafegos'),
							'id_sentido' => $this->input->post('id_sentido'),
							'data' => $this->input->post('data'),
							'hora' => $this->input->post('hora')
					);
					foreach($data['veiculos_list'] as $item){
						if($this->input->post($item['id']) > 0){
							$veiculoData[] = array('id_veiculo' => $item['id'], 'quantidade' => $this->input->post($item['id']) );
						}
							
					}
				
					//if the insert has returned true then we show the flash message
					if($contagem->store_contagem_pesquisa($data_to_store, $veiculoData)){
						$data['flash_message'] = TRUE;
					}else{
						$data['flash_message'] = FALSE;
					}
				
				}
				
			}
			
		}
		
		
		$data['sentidos'] = $sentido->get_sentido_by_pesquisa_id($id);
		$data['date'] = $this->pesquisa_trafegosdao->get_max_min_periodo_by_pesquisa_id($id);
		
		
		//$this->PAR($data['veiculos_list']);
		//DIE;		
		
		//load the view
		$data['main_content'] = 'admin/contagens/contagem_add';
		$this->load->view('includes/template', $data);
	}
	 
	public function contagem_update()
	{
		//product id
		$id = $this->uri->segment(5);
		$id_pesquisa = $this->uri->segment(4);
		
		$this->load->model('contagensdao');
		$contagem = new contagensdao();
		
		$this->load->model('sentidosdao');
		$sentido = new sentidosdao();
		// start processo de sessaao
		
		//product data
		$data['contagem'] = $contagem->get_contagem_by_id($id);
		
		// get all veiculos avaliable to count
		//$data['veiculos_list'] = $this->pesquisa_trafegosdao->get_veiculoclasse_by_pesquisa_edit($id, $data['contagem'][]);
		
		$data['veiculos_list'] = $this->pesquisa_trafegosdao->get_veiculoclasse_by_pesquisa_edit($id_pesquisa, $id);
		
		$data['id_pesquisa_trafegos'] = $id_pesquisa;
		
		$veiculoData = array();
	
		//if save button was clicked, get the data sent via post
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			//form validation
			$this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required');
			$this->form_validation->set_rules('id_sentido', 'id_sentido', 'required');
			$this->form_validation->set_rules('data', 'data', 'required');
			$this->form_validation->set_rules('hora', 'hora', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			
			// validacao especial
			foreach($data['veiculos_list'] as $item){
				$this->form_validation->set_rules($item['id'], $item['id'], 'integer');
			}
			
			//if the form has passed through the validation
			if ($this->form_validation->run())
			{
	
				$data_to_store = array(
						'id_pesquisa_trafegos' => $this->input->post('id_pesquisa_trafegos'),
						'id_sentido' => $this->input->post('id_sentido'),
						'data' => $this->input->post('data'),
						'hora' => $this->input->post('hora')
				);
				
				foreach($data['veiculos_list'] as $item){
					if($this->input->post($item['id']) > 0){
						$veiculoData[] = array('id_veiculo' => $item['id'], 'quantidade' => $this->input->post($item['id']) );
					}
						
				}
								
				//if the insert has returned true then we show the flash message
				if( $contagem->update_contagem_pesquisa($id, $data_to_store, $veiculoData) == TRUE){
					$this->session->set_flashdata('flash_message', 'updated');
				}else{
					$this->session->set_flashdata('flash_message', 'not_updated');
				}
				redirect('admin/pesquisa_trafegos/contagem_update/'.$id_pesquisa.'/'.$id);
	
			}//validation run
	
		}
	
		$data['sentidos'] = $sentido->get_sentido_by_pesquisa_id($id_pesquisa);
		
		//$this->PAR($data['veiculos_list']);
		
		
		//if we are updating, and the data did not pass trough the validation
		//the code below wel reload the current data
	
		//product data
		$data['contagem'] = $contagem->get_contagem_by_id($id);
		//load the view
		$data['main_content'] = 'admin/contagens/contagem_edit';
		$this->load->view('includes/template', $data);
	
	}//update
	
	public function origens_destinos_list(){
		//product id
		$id = $this->uri->segment(4);
		$this->load->model('origens_destinosdao');
	
		//all the posts sent by the view
		$search_string = $this->input->post('search_string');
		$order = $this->input->post('order');
		$order_type = $this->input->post('order_type');
	
		//pagination settings
		$config['per_page'] = 300;
	
		$config['base_url'] = base_url().'admin/origens_destinos';
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
			}else{
				$order = $this->session->userdata('order');
			}
			$data['order'] = $order;
	
			//save session data into the session
			if(isset($filter_session_data)){
				$this->session->set_userdata($filter_session_data);
			}
	
			//fetch sql data into arrays
			$data['count_products']= $this->origens_destinosdao->count_origens_destinos_by_pesquisa($id,$search_string, $order);
			$config['total_rows'] = $data['count_products'];
	
			//fetch sql data into arrays
			if($search_string){
				if($order){
					$data['origens_destinos'] = $this->origens_destinosdao->get_origens_destinos_by_pesquisa($id, $search_string, $order, $order_type, $config['per_page'],$limit_end);
				}else{
					$data['origens_destinos'] = $this->origens_destinosdao->get_origens_destinos_by_pesquisa($id, $search_string, '', $order_type, $config['per_page'],$limit_end);
				}
			}else{
				if($order){
					$data['origens_destinos'] = $this->origens_destinosdao->get_origens_destinos_by_pesquisa($id, '', $order, $order_type, $config['per_page'],$limit_end);
				}else{
					$data['origens_destinos'] = $this->origens_destinosdao->get_origens_destinos_by_pesquisa($id, '', '', $order_type, $config['per_page'],$limit_end);
				}
			}
	
		}else{
	
			//clean filter data inside section
			$filter_session_data['contagem_selected'] = null;
			$filter_session_data['search_string_selected'] = null;
			$filter_session_data['order'] = null;
			$filter_session_data['order_type'] = null;
			$this->session->set_userdata($filter_session_data);
	
			//pre selected options
			$data['search_string_selected'] = '';
			$data['order'] = 'id';
	
			//fetch sql data into arrays
			$data['count_products']= $this->origens_destinosdao->count_origens_destinos_by_pesquisa($id);
			$data['origens_destinos'] = $this->origens_destinosdao->get_origens_destinos_by_pesquisa($id, '', '', $order_type, $config['per_page'],$limit_end);
			$config['total_rows'] = $data['count_products'];
	
		}
	
	
		$data['id_pesquisa_trafego'] = $id;
	
	
		//load the view
		$data['main_content'] = 'admin/origens_destinos/origens_destinos_list';
		$this->load->view('includes/template', $data);
	
	}
	
	public function origens_destinos_add()
	{
		//product id
		$id = $this->uri->segment(4);
	
		$this->load->model('origens_destinosdao');
		$contagem = new origens_destinosdao();
	
		$this->load->model('sentidosdao');
		$sentido = new sentidosdao();
		
		// get all veiculos avaliable to count
		$data['veiculos_list'] = $this->pesquisa_trafegosdao->get_veiculoclasse_by_pesquisa($id);
		
		//$this->PAR($data['veiculos_list']);
		
		// start processo de sessaao
	
		$perguntasData = array();
		
		$data['perguntas_adicionais'] = $this->pesquisa_trafegosdao->get_perguntas_od_by_id_entrevista($id);
		
		//if save button was clicked, get the data sent via post
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			
			if($_FILES["file"]["name"]){
				$fileName = $_FILES["file"]["name"] ;
					
				//form validation
				$this->form_validation->set_rules('id_pesquisa', 'id_pesquisa', 'required'); 
	        	$this->form_validation->set_rules('id_sentido', 'id_sentido', 'required'); 
					
				if ($this->form_validation->run())
				{
					// start to read the file
			
					$target_file = PORTALPATH . 'assets/upload/' . basename($fileName);
						
					$uploadOk = 1;
					$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0 or $fileName == '') {
					} else {
						if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
							$inputFile = CONTAGENS_FOLDER . str_replace(' ', '_', $id.'_'.$fileName);
							copy ( $target_file , $inputFile );
							//unlink($target_file);
							 
						} else {
							echo "Desculpe, ouve um erro no upload do arquivo.";
							die;
						}
					}
			
					$separador = ";";
			
					$fp = fopen($inputFile, "r");
					$fileLines = array();
			
					$i = 0;
					while (!feof($fp)){
						$convert[] = fgets($fp);
					}
			
					$countTrue = 0;
					$countFalse = 0;
			
					for($i=0; $i<count($convert)-1;$i++){
						$temp =  explode("$separador", $convert[$i]);
							
						$date = explode("/", $temp[2]);
						if($i <> 0){
							$temp[2] = $date[2].'-'.$date[1].'-'.$date[0];
						}
							
						$temp[0] = $this->busca_id_by_classeVeiculo($temp[0], $data['veiculos_list']);
							
						$k = 0;
						foreach($temp as $dataFile){
							if($k > 17){
								if($dataFile != ''){
									$perguntasData[] = array('id_pergunta' => $data['perguntas_adicionais'][$k-18]['id'],  'resposta' => $dataFile) ;
								}
							}
							$k++;
						}
												
						$data_to_store = array(
								'id_pesquisa' => $this->input->post('id_pesquisa'),
								'id_sentido' => $this->input->post('id_sentido'),
								'id_veiculo' => 		$temp[0],
								'placa' => 				$temp[1],
								'data' => 				$temp[2],
								'hora' => 				$temp[3],
								'origem_pais' => 		$temp[4],
								'origem_uf' => 			$temp[5],
								'origem_municipio' => 	$temp[6],
								'origem_geocod' => 		$temp[7],
								'destino_pais' => 		$temp[8],
								'destino_uf' => 		$temp[9],
								'destino_municipio' => 	$temp[10],
								'destino_geocod' => 	$temp[11],
								'combustivel' => 		$temp[12],
								'categoria' => 			$temp[13],
								'num_pessoas' => 		$temp[14],
								'renda_media' => 		$temp[15],
								'motivo' => 			$temp[16],
								'frequencia' => 		$temp[17]
						);
						
							
						$data['flash_message'] = TRUE;
						//if the insert has returned true then we show the flash message
						if($contagem->store_origem_destino($data_to_store, $perguntasData)){
							$data['flash_message_file'][] = $data_to_store['data'].' '.$data_to_store['hora'] ;
							$countTrue++;
			
						}else{
							$data['flash_message'] = FALSE;
							$data['flash_message_file'][] = $data_to_store['placa'].' '.$data_to_store['data'].' '.$data_to_store['hora'] ;
							$countFalse++;
						}
						unset($perguntasData);
						$data['flash_message_count'] = array( 'inseridos' => $countTrue, 'falha' => $countFalse);
					}
				}
					
					
					
			}else{
			
				//form validation
				$this->form_validation->set_rules('id_pesquisa', 'id_pesquisa', 'required'); 
	        	$this->form_validation->set_rules('id_sentido', 'id_sentido', 'required'); 
	        	$this->form_validation->set_rules('id_veiculo', 'id_veiculo', 'required'); 
	        	$this->form_validation->set_rules('placa', 'placa', 'required'); 
	        	$this->form_validation->set_rules('data', 'data', 'required'); 
	        	$this->form_validation->set_rules('hora', 'hora', 'required'); 
	        	$this->form_validation->set_rules('origem_pais', 'origem_pais', 'required'); 
	        	$this->form_validation->set_rules('origem_uf', 'origem_uf', 'required'); 
	        	$this->form_validation->set_rules('origem_municipio', 'origem_municipio', 'required'); 
	        	$this->form_validation->set_rules('origem_geocod', 'origem_geocod', 'required'); 
	        	$this->form_validation->set_rules('destino_pais', 'destino_pais', 'required'); 
	        	$this->form_validation->set_rules('destino_uf', 'destino_uf', 'required'); 
	        	$this->form_validation->set_rules('destino_municipio', 'destino_municipio', 'required'); 
	        	$this->form_validation->set_rules('destino_geocod', 'destino_geocod', 'required'); 
	        	$this->form_validation->set_rules('combustivel', 'combustivel', 'required'); 
	        	$this->form_validation->set_rules('categoria', 'categoria', 'required'); 
	        	$this->form_validation->set_rules('num_pessoas', 'num_pessoas', 'required'); 
	        	$this->form_validation->set_rules('renda_media', 'renda_media', 'required'); 
	        	$this->form_validation->set_rules('motivo', 'motivo', 'required'); 
	        	$this->form_validation->set_rules('frequencia', 'frequencia', 'required'); 
	
	        	// validacao especial
	        	foreach($data['perguntas_adicionais'] as $item){
	        		$this->form_validation->set_rules($item['id'], $item['id'], '');
	        	}
				
				$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
				
				//if the form has passed through the validation
				if ($this->form_validation->run())
				{
					$data_to_store = array(
							'id_pesquisa' => $this->input->post('id_pesquisa'),
							'id_sentido' => $this->input->post('id_sentido'),
							'id_veiculo' => $this->input->post('id_veiculo'),
							'placa' => $this->input->post('placa'),
							'data' => $this->input->post('data'),
							'hora' => $this->input->post('hora'),
							'origem_pais' => $this->input->post('origem_pais'),
							'origem_uf' => $this->input->post('origem_uf'),
							'origem_municipio' => $this->input->post('origem_municipio'),
							'origem_geocod' => $this->input->post('origem_geocod'),
							'destino_pais' => $this->input->post('destino_pais'),
							'destino_uf' => $this->input->post('destino_uf'),
							'destino_municipio' => $this->input->post('destino_municipio'),
							'destino_geocod' => $this->input->post('destino_geocod'),
							'combustivel' => $this->input->post('combustivel'),
							'categoria' => $this->input->post('categoria'),
							'num_pessoas' => $this->input->post('num_pessoas'),
							'renda_media' => $this->input->post('renda_media'),
							'motivo' => $this->input->post('motivo'),
							'frequencia' => $this->input->post('frequencia')
	                );
					
					foreach($data['perguntas_adicionais'] as $item){
						if($this->input->post($item['id']) != ''){
							$perguntasData[] = array('id_pergunta' => $item['id'], 'resposta' => $this->input->post($item['id']) );
						}
							
					}
					
					$id = $this->input->post('id_pesquisa');
					
					//if the insert has returned true then we show the flash message
					if($contagem->store_origem_destino($data_to_store, $perguntasData)){
						$data['flash_message'] = TRUE;
					}else{
						$data['flash_message'] = FALSE;
					}
		
				}
			
			}
			
		}
		
		$data['perguntas_adicionais'] = $this->pesquisa_trafegosdao->get_perguntas_od_by_id_entrevista($id);
		
		
		$data['id_pesquisa_trafegos'] = $id;
		$data['sentidos'] = $sentido->get_sentido_by_pesquisa_id($id);
		$data['date'] = $this->pesquisa_trafegosdao->get_max_min_periodo_by_pesquisa_id($id);
		
		
	
		//$this->PAR($data['veiculos_list']);
		//DIE;
	
		//load the view
		$data['main_content'] = 'admin/origens_destinos/origens_destinos_add';
		$this->load->view('includes/template', $data);
	}
	
	public function origens_destinos_update()
	{
		//product id
		$id = $this->uri->segment(5);
		$id_pesquisa = $this->uri->segment(4);
	
		$this->load->model('origens_destinosdao');
		$contagem = new origens_destinosdao();
	
		$this->load->model('sentidosdao');
		$sentido = new sentidosdao();
		
		$this->load->model('od_perguntasdao');
		$pergunta = new od_perguntasdao();
		
		// start processo de sessaao
	
		//product data
		$data['origem_destino'] = $contagem->get_origem_destino_by_id($id);
		
		$data['perguntas_adicionais'] = $pergunta->get_perguntas_by_od_id_edit($id, $id_pesquisa);
		
		$data['id_pesquisa_trafegos'] = $id_pesquisa;
	
		$veiculoData = array();
	
		//if save button was clicked, get the data sent via post
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			//form validation
			$this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required'); 
        	$this->form_validation->set_rules('id_sentido', 'id_sentido', 'required'); 
        	$this->form_validation->set_rules('id_veiculo', 'id_veiculo', 'required'); 
        	$this->form_validation->set_rules('placa', 'placa', 'required'); 
        	$this->form_validation->set_rules('data', 'data', 'required'); 
        	$this->form_validation->set_rules('hora', 'hora', 'required'); 
        	$this->form_validation->set_rules('origem_pais', 'origem_pais', 'required'); 
        	$this->form_validation->set_rules('origem_uf', 'origem_uf', 'required'); 
        	$this->form_validation->set_rules('origem_municipio', 'origem_municipio', 'required'); 
        	$this->form_validation->set_rules('origem_geocod', 'origem_geocod', 'required'); 
        	$this->form_validation->set_rules('destino_pais', 'destino_pais', 'required'); 
        	$this->form_validation->set_rules('destino_uf', 'destino_uf', 'required'); 
        	$this->form_validation->set_rules('destino_municipio', 'destino_municipio', 'required'); 
        	$this->form_validation->set_rules('destino_geocod', 'destino_geocod', 'required'); 
        	$this->form_validation->set_rules('combustivel', 'combustivel', 'required'); 
        	$this->form_validation->set_rules('categoria', 'categoria', 'required'); 
        	$this->form_validation->set_rules('num_pessoas', 'num_pessoas', 'required'); 
        	$this->form_validation->set_rules('renda_media', 'renda_media', 'required'); 
        	$this->form_validation->set_rules('motivo', 'motivo', 'required'); 
        	$this->form_validation->set_rules('frequencia', 'frequencia', 'required'); 
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
				
							
			//if the form has passed through the validation
			if ($this->form_validation->run())
			{
	
				$data_to_store = array(
						'id_pesquisa' => $this->input->post('id_pesquisa_trafegos'),
						'id_sentido' => $this->input->post('id_sentido'),
						'id_veiculo' => $this->input->post('id_veiculo'),
						'placa' => $this->input->post('placa'),
						'data' => $this->input->post('data'),
						'hora' => $this->input->post('hora'),
						'origem_pais' => $this->input->post('origem_pais'),
						'origem_uf' => $this->input->post('origem_uf'),
						'origem_municipio' => $this->input->post('origem_municipio'),
						'origem_geocod' => $this->input->post('origem_geocod'),
						'destino_pais' => $this->input->post('destino_pais'),
						'destino_uf' => $this->input->post('destino_uf'),
						'destino_municipio' => $this->input->post('destino_municipio'),
						'destino_geocod' => $this->input->post('destino_geocod'),
						'combustivel' => $this->input->post('combustivel'),
						'categoria' => $this->input->post('categoria'),
						'num_pessoas' => $this->input->post('num_pessoas'),
						'renda_media' => $this->input->post('renda_media'),
						'motivo' => $this->input->post('motivo'),
						'frequencia' => $this->input->post('frequencia')
                );
				
				
				foreach($data['perguntas_adicionais'] as $item){
					if( $this->input->post($item['id_pergunta']) != '' ){
						$perguntasData[] = array('id_pergunta' => $item['id'], 'resposta' => $this->input->post($item['id']) );
					}
				
				}
				
				//if the insert has returned true then we show the flash message
				if( $contagem->update_origem_destino($id, $data_to_store, $perguntasData) == TRUE){
					$this->session->set_flashdata('flash_message', 'updated');
				}else{
					$this->session->set_flashdata('flash_message', 'not_updated');
				}
				redirect('admin/pesquisa_trafegos/origens_destinos_update/'.$id_pesquisa.'/'.$id);
	
			}//validation run
	
		}
	
		
		//get all veiculos avaliable to count
		// get all veiculos avaliable to count
		$data['veiculos_list'] = $this->pesquisa_trafegosdao->get_veiculoclasse_by_pesquisa($id_pesquisa);
		$data['sentidos'] = $sentido->get_sentido_by_pesquisa_id($id_pesquisa);
	
		//$this->PAR($data['veiculos_list']);
	
	
		//if we are updating, and the data did not pass trough the validation
		//the code below wel reload the current data
	
		//product data
		$data['origens_destinos'] = $contagem->get_origem_destino_by_id($id);
		//load the view
		$data['main_content'] = 'admin/origens_destinos/origens_destinos_edit';
		$this->load->view('includes/template', $data);
	
	}
	
	public function busca_id_by_classeVeiculo($needle,$haystack) {
		
		$i = 0;
		foreach($haystack as $item){
			if($item['classeVeiculo'] === $needle){
				return $item['id'];
			}
		}
	}
}