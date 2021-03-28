<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);
require_once(APPPATH . 'controllers/composicoes' . EXT);


class transportes extends App_controller {

	const VIEW_FOLDER = 'admin/transportes';
	
	public $indiceBase = null;
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('transportesdao');

        $this->indiceBase = 224.886;
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
        $config['per_page'] = 30;

        $config['base_url'] = base_url().'admin/transportes';
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
                $order_type = 'DESC';    
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
            $data['count_products']= $this->transportesdao->count_transportes($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['transportes'] = $this->transportesdao->get_transportes($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['transportes'] = $this->transportesdao->get_transportes($search_string, 'data_base', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['transportes'] = $this->transportesdao->get_transportes('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['transportes'] = $this->transportesdao->get_transportes('', 'data_base', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['transporte_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->transportesdao->count_transportes();
            $data['transportes'] = $this->transportesdao->get_transportes('', 'data_base', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/transportes/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
public function add()
    {
    	if(!$this->session->userdata('logged_in')){
    		redirect('admin/login');
    	}
    	$data['transportes_modelos'] = $this->transportesdao->get_transportes();
    	
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('titulo', 'titulo', 'required'); 
        	$this->form_validation->set_rules('codigo', 'codigo', 'required');
        	$this->form_validation->set_rules('modelo', 'modelo', 'required');
        	$this->form_validation->set_rules('regiao', 'regiao', 'required'); 
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('ctc1', 'ctc1', 'required');
        	$this->form_validation->set_rules('ctc2', 'ctc2', 'required');
        	$this->form_validation->set_rules('ctf1', 'ctf1', 'required');
        	$this->form_validation->set_rules('ctf2', 'ctf2', 'required');
        	$this->form_validation->set_rules('data_base', 'data_base', 'required'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array( 'titulo' => $this->input->post('titulo'),
				                		'codigo' => $this->input->post('codigo'),
                						'modelo' => $this->input->post('modelo'),
				                		'regiao' => $this->input->post('regiao'),
				                		'uf' => $this->input->post('uf'),
				                		'ctc1' => $this->input->post('ctc1'),
				                		'ctc2' => $this->input->post('ctc2'),
				                		'ctf1' => $this->input->post('ctf1'),
				                		'ctf2' => $this->input->post('ctf2'),
				                		'data_base' => $this->input->post('data_base'),
				                		'observacao' => $this->input->post('observacao')
                );
                //if the insert has returned true then we show the flash message
                if($this->transportesdao->store_transporte($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/transportes/add';
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
        	$this->form_validation->set_rules('titulo', 'titulo', 'required');
        	$this->form_validation->set_rules('codigo', 'codigo', 'required');
        	$this->form_validation->set_rules('regiao', 'regiao', 'required');
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('ctc1', 'ctc1', 'required');
        	$this->form_validation->set_rules('ctc2', 'ctc2', 'required');
        	$this->form_validation->set_rules('ctf1', 'ctf1', 'required');
        	$this->form_validation->set_rules('ctf2', 'ctf2', 'required');
        	$this->form_validation->set_rules('data_base', 'data_base', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
						        	'titulo' => $this->input->post('titulo'),
						        	'codigo' => $this->input->post('codigo'),
						        	'regiao' => $this->input->post('regiao'),
						        	'uf' => $this->input->post('uf'),
			                		'ctc1' => $this->input->post('ctc1'),
			                		'ctc2' => $this->input->post('ctc2'),
			                		'ctf1' => $this->input->post('ctf1'),
			                		'ctf2' => $this->input->post('ctf2'),
						        	'data_base' => $this->input->post('data_base'),
						        	'observacao' => $this->input->post('observacao')                    
                );
                //if the insert has returned true then we show the flash message
                if($this->transportesdao->update_transporte($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/transportes/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['transporte'] = $this->transportesdao->get_transporte_by_id($id);
        //load the view
        $data['main_content'] = 'admin/transportes/edit';
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
        $this->transportesdao->delete_transporte($id);
        redirect('admin/transportes');
    }//edit    			
    	
    public function get_valor_unitario_material($id_sicro, $id_material){

    	ECHO "<BR>";
    	ECHO "<BR>";
    	ECHO "AREA DE TRANSPORTES";
    	ECHO "<BR>";
    	ECHO "<BR>";
    	
    	
    	$composicao = new composicoes();
    	
    	$this->load->model('sicrosdao');
		$sicro = new sicrosdao();
		$classeArray = $sicro->get_id_material_class_material_by_id_sicro_material($id_sicro, $id_material); 
		$sicroArray  = $sicro->get_sicro_by_id($id_sicro);

		if(!empty($classeArray)){
		
				ECHO "ARRAY DE CLASSES POR ID SICRO E MATERIAL";
				$this->PAR($classeArray);
				ECHO "DADOS DE SICRO DENTRO DE TRANSPORTES";
				$this->PAR($sicroArray);
				
				$this->load->model('sicro_transportedao');
				$sicroTransporte = new sicro_transportedao();		
				$transporteArray = $sicroTransporte->get_id_transporte_by_sicro($id_sicro);
				 
				//$this->PAR($transporteArray);
				//DIE;
				
				$id_transporte = $transporteArray[0]['id_transporte'];
				
				$this->load->model('transporte_material_classedao');
				$transporteMaterialClasse = new transporte_material_classedao();
				
				if(isset($classeArray[0]['id_transporte_material_classe2'])){
					$transporteClasseArray = $transporteMaterialClasse->get_transporte_by_id_transporte_id_secundario(
															$id_transporte, 
															$classeArray[0]['id_transporte_material_classe1'], 
															$classeArray[0]['id_transporte_material_classe2'] 
		                					 );
				}else{
					$transporteClasseArray = $transporteMaterialClasse->get_transporte_by_id_transporte_id_secundario(
															$id_transporte, 
															$classeArray[0]['id_transporte_material_classe1']
		                					 );
				}
				   		 
				$this->PAR($transporteClasseArray);
				//die;
				//$fatorCorrecao = $sicroArray[0]['indice_pavimentacao']/$this->indiceBase;
				$fatorCorrecao = $sicroArray[0]['indice_pavimentacao']/$sicroArray[0]['indice_pavimentacao_base'];
				// TODO : descobrir o porque disso
				$fatorCorrecao = $fatorCorrecao/1000;
				
				$valorUnitario = 0;
				foreach($transporteClasseArray as $item){
					if($item['id_secundario'] == 1){
						$val1 = 24.715;
						$val2 = 0.247;
						$valorUnitario += ($val1+$val2*$item['distancia'])*$fatorCorrecao;
						/*
						 echo "valor01: ".$valorUnitario;
						echo "<br>";
						*/				
					}else if($item['id_secundario'] == 2){
						$val1 = 22.244;
						$val2 = 0.223;
						$valorUnitario += ($val1+$val2*$item['distancia'])*$fatorCorrecao;
						/*
						echo "valor01: ".$valorUnitario;
						echo "<br>";
						*/
					}else{
						$comp = $composicao->get_valor_unitario($id_sicro, $item['id_composicao']);
						$valorUnitario += $item['distancia']*$comp;
						
							ECHO " DISTANCIAA ".$comp;
						
						/*
						echo "valor02: ".$valorUnitario;
						echo "<br>";
						*/
					}
				}
				/*
				echo round($valorUnitario,2);
				die;
				*/
		}else{
			$valorUnitario = 0;
		}
		return $valorUnitario;
    }
    
	public function get_valor_unitario_betuminoso($id_sicro, $id_betuminoso){
		
		$composicao = new composicoes();
		 
		$this->load->model('sicrosdao');
		$sicro = new sicrosdao();
		$classeArray = $sicro->get_id_material_class_material_betuminoso_by_id_sicro_betuminoso($id_sicro, $id_betuminoso);
		$sicroArray  = $sicro->get_sicro_by_id($id_sicro);
		ECHO "CLASSE ARRAY BETUMINOSO";
		$this->PAR($classeArray);
		ECHO "SICRO ARRAY BETUMINOSO";
		$this->PAR($sicroArray);
		//DIE;
		
		$this->load->model('sicro_transportedao');
		$sicroTransporte = new sicro_transportedao();
		$transporteArray = $sicroTransporte->get_id_transporte_by_sicro($id_sicro);
		ECHO "ID DE TRANSPORTE";	
		$this->PAR($transporteArray);
		//DIE;
		
		$id_transporte = $transporteArray[0]['id_transporte'];
		
		$this->load->model('transporte_material_classedao');
		$transporteMaterialClasse = new transporte_material_classedao();
		
		if(isset($classeArray[0]['id_transporte_material_classe2'])){
			$transporteClasseArray = $transporteMaterialClasse->get_transporte_by_id_transporte_id_secundario(
					$id_transporte,
					$classeArray[0]['id_transporte_material_classe1'],
					$classeArray[0]['id_transporte_material_classe2']
			);
		}else{
			$transporteClasseArray = $transporteMaterialClasse->get_transporte_by_id_transporte_id_secundario(
					$id_transporte,
					$classeArray[0]['id_transporte_material_classe1']
			);
		}
		ECHO "ARRAY DE CLASSE DE TRANSPORTE BETUMINOSO";
		$this->PAR($transporteClasseArray);
		//die;
		//$fatorCorrecao = $sicroArray[0]['indice_pavimentacao']/$this->indiceBase;
		$fatorCorrecao = $sicroArray[0]['indice_pavimentacao']/$sicroArray[0]['indice_pavimentacao_base'];
		
		// TODO : descobrir o porque disso
		$fatorCorrecao = $fatorCorrecao/1000;
		
		$valorUnitario = 0;
		foreach($transporteClasseArray as $item){
			if($item['id_secundario'] == 1){
				$val1 = 24.715;
				$val2 = 0.247;
				$valorUnitario += ($val1+$val2*$item['distancia'])*$fatorCorrecao;
				/*
				 echo "valor01: ".$valorUnitario;
				echo "<br>";
				*/
			}else if($item['id_secundario'] == 2){
				$val1 = 22.244;
				$val2 = 0.223;
				$valorUnitario += ($val1+$val2*$item['distancia'])*$fatorCorrecao;
				/*
				 echo "valor01: ".$valorUnitario;
				echo "<br>";
				*/
			}else{
				ECHO "<BR>";
				ECHO " BUSCA DE VALOR UNITARIO MATERIAIS BETUMINOSOS";
				ECHO "<BR>";
				echo $comp = $composicao->get_valor_unitario($id_sicro, $item['id_composicao']);
				ECHO "<BR>";
				ECHO " TERMINO DA BUSCA DE VALOR UNITARIO MATERIAIS BETUMINOSOS";
				ECHO "<BR>";
				$valorUnitario += $item['distancia']*$comp;
				/*
				 echo "valor02: ".$valorUnitario;
				echo "<br>";
				*/
			}
		}
		ECHO "VALOR UNITARIO DE TRANSPORTE<BR>"; 
		ECHO  round($valorUnitario,2);
		ECHO "<BR><BR>";
		
		return $valorUnitario;
	}
	
	public function get_valor_unitario($id_sicro, $id_composicao_transporte){
		
		$composicao = new composicoes();
		 
		$this->load->model('sicrosdao');
		$sicro = new sicrosdao();
		
		$this->load->model('composicao_transporte_transportedao');
		$compTransporteTransporte = new composicao_transporte_transportedao();
		
		$classeArray = $compTransporteTransporte->get_id_material_class_material_by_id_composicao_transporte($id_composicao_transporte);
		$sicroArray  = $sicro->get_sicro_by_id($id_sicro);
		
		$this->load->model('sicro_transportedao');
		$sicroTransporte = new sicro_transportedao();
		$transporteArray = $sicroTransporte->get_id_transporte_by_sicro($id_sicro);
		
		$id_transporte = $transporteArray[0]['id_transporte'];
		
		$this->load->model('transportesdao');
		$transposte = new transportesdao();
		$cts = $transposte->get_transporte_by_id($id_transporte);
		
		$this->load->model('transporte_material_classedao');
		$transporteMaterialClasse = new transporte_material_classedao();
		
		
		
		
		
		if(isset($classeArray[0]['id_transporte_material_classe2'])){
			$transporteClasseArray = $transporteMaterialClasse->get_transporte_by_id_transporte_id_secundario(
					$id_transporte,
					$classeArray[0]['id_transporte_material_classe1'],
					$classeArray[0]['id_transporte_material_classe2']
			);
		}else{
			$transporteClasseArray = $transporteMaterialClasse->get_transporte_by_id_transporte_id_secundario(
					$id_transporte,
					$classeArray[0]['id_transporte_material_classe1']
			);
		}
		
		//$fatorCorrecao = $sicroArray[0]['indice_pavimentacao']/$this->indiceBase;
		$fatorCorrecao = $sicroArray[0]['indice_pavimentacao']/$sicroArray[0]['indice_pavimentacao_base'];
		
		// TODO : descobrir o porque disso
		//$fatorCorrecao = $fatorCorrecao/1000;
		
		$valorUnitario = 0;
		foreach($transporteClasseArray as $item){
			if($item['id_secundario'] == 1){
				$val1 = $cts[0]['ctc1'];
				$val2 = $cts[0]['ctc2'];
				$valorUnitario += ($val1+$val2*$item['distancia'])*$fatorCorrecao;
			
			}else if($item['id_secundario'] == 2){
				$val1 = $cts[0]['ctf1'];
				$val2 = $cts[0]['ctf2'];
				$valorUnitario += ($val1+$val2*$item['distancia'])*$fatorCorrecao;
				
			}else{				
				$comp = $composicao->get_valor_unitario($id_sicro, $item['id_composicao']);
				$valorUnitario += $item['distancia']*$comp;
			}
		}
		
		return round($valorUnitario,2) ;
	}
	
	
}











