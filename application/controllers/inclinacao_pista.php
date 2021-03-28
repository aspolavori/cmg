<?php
   
require_once(APPPATH . 'controllers/App_controller' . EXT);
class inclinacao_pista extends App_controller {

	const VIEW_FOLDER = 'admin/inclinacao_pista';
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inclinacao_pistadao');
        ini_set('max_execution_time', 0);
		/*
        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
        */
    }
    	
    public function index()
    {

    	//$this->form_validation->set_rules('ciclo', 'ciclo', 'required');
    	//$this->form_validation->set_rules('NM_UF', 'NM_UF', 'required');
    	//$this->form_validation->set_rules('NM_BR', 'NM_BR', 'required');
    	//$this->form_validation->set_rules('DESC_SENTIDO', 'DESC_SENTIDO', 'required');
    	
        //all the posts sent by the view
        $search_ciclo = $this->input->post('ciclo');        
        $nm_uf = $this->input->post('NM_UF');
        $nm_br = $this->input->post('NM_BR');
        $sentido = $this->input->post('DESC_SENTIDO');
        //$order_type = $this->input->post('order_type'); 
        $order_type = '';
        
        //pagination settings
        $config['per_page'] = 10000;

        $config['base_url'] = base_url().'admin/inclinacao_pista';
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
		
        // load objct ciclo
        $this->load->model('ciclosdao');
        $ciclos = new ciclosdao();
        

        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($search_ciclo !== false && $nm_uf !== false && $nm_br !== false && $sentido !== false || $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */
            if($search_ciclo){
                $filter_session_data['search_ciclo_selected'] = $search_ciclo;
            }else{
                $search_ciclo = $this->session->userdata('search_ciclo_selected');
            }
            $data['search_ciclo_selected'] = $search_ciclo;

            if($nm_uf){
                $filter_session_data['nm_uf_selected'] = $nm_uf;
            }
            else{
                $nm_uf = $this->session->userdata('nm_uf_selected');
            }
            $data['nm_uf_selected'] = $nm_uf;

            if($nm_br){
            	$filter_session_data['nm_br_selected'] = $nm_br;
            }
            else{
            	$nm_br = $this->session->userdata('nm_br_selected');
            }
            $data['nm_br_selected'] = $nm_br;

            if($sentido){
            	$filter_session_data['sentido_selected'] = $sentido;
            }
            else{
            	$sentido = $this->session->userdata('sentido_selected');
            }
            $data['sentido_selected'] = $sentido;
            
            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            
            //fetch sql data into arrays
            $data['count_products']= $this->inclinacao_pistadao->count_inclinacao_pista_trecho_uf_br($search_ciclo, $nm_uf, $nm_br, $sentido );
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            $data['inclinacao_pista'] = $this->inclinacao_pistadao->get_inclinacao_pista_trecho_uf_br($search_ciclo, $nm_uf, $nm_br, $sentido,  '', '', $order_type, $config['per_page'],$limit_end);
            //$tmp = $this->inclinacao_pistadao->get_inclinacao_pista_trecho_uf_br($search_ciclo, $nm_uf, $nm_br, $sentido,  '', '', $order_type, $config['per_page'],$limit_end);
            
            //print_r($tmp);
            /*
            $contador_hodo = 0;
            $first_line = true;
            $data['inclinacao_pista'] = array();
            
            foreach($tmp as $item) :
            	
            	if((($item['HODOMETRO_TRECHO'] - $contador_hodo) >= 100) || ($first_line == true)){  
            		$data['inclinacao_pista'][] = $item;
            	}
            	
            	$first_line = false;
            	$contador_hodo = $item['HODOMETRO_TRECHO'];
            	
            endforeach;
            */
            //$data['inclinacao_pista'] =
            
            // get ciclo ufs
            $data['nm_ufs'] = $ciclos->get_ciclo_ufs($search_ciclo);
            $data['nm_brs'] = $ciclos->get_ciclo_uf_brs($search_ciclo, $nm_uf);
            
            /*
            if($search_ciclo){
                if($nm_uf){
                    $data['inclinacao_pista'] = $this->inclinacao_pistadao->get_inclinacao_pista($search_ciclo, $nm_uf, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['inclinacao_pista'] = $this->inclinacao_pistadao->get_inclinacao_pista($search_ciclo, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($nm_uf){
                    $data['inclinacao_pista'] = $this->inclinacao_pistadao->get_inclinacao_pista('', $nm_uf, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['inclinacao_pista'] = $this->inclinacao_pistadao->get_inclinacao_pista('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }
            */

        }else{

            //clean filter data inside section
            $filter_session_data['inclinacao_pista_selected'] = null;
            $filter_session_data['search_ciclo_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['nm_uf_selected'] = null;
            $filter_session_data['nm_uf'] = null;
            $filter_session_data['sentido_selected'] = null;
            $filter_session_data['sentido'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_ciclo_selected'] = '';
            $data['search_string_selected'] = '';
            $data['order'] = 'ID_TRECHO';
            $data['nm_ufs'] = '';
            $data['nm_uf_selected'] = '';
            $data['nm_brs'] = '';
            $data['nm_br_selected'] = '';
            

            //fetch sql data into arrays
            //$data['count_products']= $this->inclinacao_pistadao->count_inclinacao_pista();
            //$data['inclinacao_pista'] = $this->inclinacao_pistadao->get_inclinacao_pista('', '', $order_type, $config['per_page'],$limit_end);
            $data['count_products']= 0;
            $data['inclinacao_pista'] = '';
           // $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
        
        $data['ciclos'] = $ciclos->get_ciclos('', 'NM_CICLO');
        $data['ciclo'] = '';
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/inclinacao_pista/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
	public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('ID_CICLO', 'ID_CICLO', 'required'); 
        	$this->form_validation->set_rules('ID_LOTE', 'ID_LOTE', 'required'); 
        	$this->form_validation->set_rules('NM_TRECHO', 'NM_TRECHO', 'required'); 
        	$this->form_validation->set_rules('DT_LEVANTAMENTO', 'DT_LEVANTAMENTO', 'required'); 
        	$this->form_validation->set_rules('NM_UF', 'NM_UF', 'required'); 
        	$this->form_validation->set_rules('NM_BR', 'NM_BR', 'required'); 
        	$this->form_validation->set_rules('DESC_PISTA', 'DESC_PISTA', 'required'); 
        	$this->form_validation->set_rules('DESC_SENTIDO', 'DESC_SENTIDO', 'required'); 
        	$this->form_validation->set_rules('DESC_FAIXA', 'DESC_FAIXA', 'required'); 
        	$this->form_validation->set_rules('KM_INICIAL', 'KM_INICIAL', 'required'); 
        	$this->form_validation->set_rules('KM_FINAL', 'KM_FINAL', 'required'); 
        	$this->form_validation->set_rules('DT_UPLOAD', 'DT_UPLOAD', 'required'); 
        	$this->form_validation->set_rules('DESC_CAMINHO', 'DESC_CAMINHO', 'required'); 
        	$this->form_validation->set_rules('ID_TP_TRECHO', 'ID_TP_TRECHO', 'required'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('ID_CICLO' => $this->input->post('ID_CICLO'),'ID_LOTE' => $this->input->post('ID_LOTE'),'NM_TRECHO' => $this->input->post('NM_TRECHO'),'DT_LEVANTAMENTO' => $this->input->post('DT_LEVANTAMENTO'),'NM_UF' => $this->input->post('NM_UF'),'NM_BR' => $this->input->post('NM_BR'),'DESC_PISTA' => $this->input->post('DESC_PISTA'),'DESC_SENTIDO' => $this->input->post('DESC_SENTIDO'),'DESC_FAIXA' => $this->input->post('DESC_FAIXA'),'KM_INICIAL' => $this->input->post('KM_INICIAL'),'KM_FINAL' => $this->input->post('KM_FINAL'),'DT_UPLOAD' => $this->input->post('DT_UPLOAD'),'DESC_CAMINHO' => $this->input->post('DESC_CAMINHO'),'ID_TP_TRECHO' => $this->input->post('ID_TP_TRECHO'),
                );
                //if the insert has returned true then we show the flash message
                if($this->inclinacao_pistadao->store_inclinacao_pista($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/inclinacao_pista/add';
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
        	$this->form_validation->set_rules('ID_CICLO', 'ID_CICLO', 'required');
        	$this->form_validation->set_rules('ID_LOTE', 'ID_LOTE', 'required');
        	$this->form_validation->set_rules('NM_TRECHO', 'NM_TRECHO', 'required');
        	$this->form_validation->set_rules('DT_LEVANTAMENTO', 'DT_LEVANTAMENTO', 'required');
        	$this->form_validation->set_rules('NM_UF', 'NM_UF', 'required');
        	$this->form_validation->set_rules('NM_BR', 'NM_BR', 'required');
        	$this->form_validation->set_rules('DESC_PISTA', 'DESC_PISTA', 'required');
        	$this->form_validation->set_rules('DESC_SENTIDO', 'DESC_SENTIDO', 'required');
        	$this->form_validation->set_rules('DESC_FAIXA', 'DESC_FAIXA', 'required');
        	$this->form_validation->set_rules('KM_INICIAL', 'KM_INICIAL', 'required');
        	$this->form_validation->set_rules('KM_FINAL', 'KM_FINAL', 'required');
        	$this->form_validation->set_rules('DT_UPLOAD', 'DT_UPLOAD', 'required');
        	$this->form_validation->set_rules('DESC_CAMINHO', 'DESC_CAMINHO', 'required');
        	$this->form_validation->set_rules('ID_TP_TRECHO', 'ID_TP_TRECHO', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
        	'ID_CICLO' => $this->input->post('ID_CICLO'),
        	'ID_LOTE' => $this->input->post('ID_LOTE'),
        	'NM_TRECHO' => $this->input->post('NM_TRECHO'),
        	'DT_LEVANTAMENTO' => $this->input->post('DT_LEVANTAMENTO'),
        	'NM_UF' => $this->input->post('NM_UF'),
        	'NM_BR' => $this->input->post('NM_BR'),
        	'DESC_PISTA' => $this->input->post('DESC_PISTA'),
        	'DESC_SENTIDO' => $this->input->post('DESC_SENTIDO'),
        	'DESC_FAIXA' => $this->input->post('DESC_FAIXA'),
        	'KM_INICIAL' => $this->input->post('KM_INICIAL'),
        	'KM_FINAL' => $this->input->post('KM_FINAL'),
        	'DT_UPLOAD' => $this->input->post('DT_UPLOAD'),
        	'DESC_CAMINHO' => $this->input->post('DESC_CAMINHO'),
        	'ID_TP_TRECHO' => $this->input->post('ID_TP_TRECHO'),                    
                );
                //if the insert has returned true then we show the flash message
                if($this->inclinacao_pistadao->update_inclinacao_pista($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/inclinacao_pista/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['inclinacao_pista'] = $this->inclinacao_pistadao->get_inclinacao_pista_by_id($id);
        //load the view
        $data['main_content'] = 'admin/inclinacao_pista/edit';
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
        $this->inclinacao_pistadao->delete_inclinacao_pista($id);
        redirect('admin/inclinacao_pista');
    }//edit    			
    	

    public function get_ciclo_uf($id){
    	
    	$this->load->model('ciclosdao');
    	$ciclos = new ciclosdao();
    	$uf = $ciclos->get_ciclo_ufs($id);
    	$myJSON = json_encode($uf);
    	echo($myJSON);
    	
    }
    
    public function get_ciclo_uf_br($id, $nm_uf){
    	 
    	$this->load->model('ciclosdao');
    	$ciclos = new ciclosdao();
    	$br = $ciclos->get_ciclo_uf_brs($id, $nm_uf);
    	$myJSON = json_encode($br);
    	echo($myJSON);
    	 
    }
    
}