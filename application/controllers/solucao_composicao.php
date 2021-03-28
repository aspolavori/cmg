<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class solucao_composicao extends App_controller {

	const VIEW_FOLDER = 'admin/solucao_composicao';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('solucao_composicaodao');

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {

    	$this->load->model('solucoesdao');
    	$solucao = new solucoesdao();
    	 
    	$data['solucoes'] = $solucao->get_solucoes('','titulo');
    	 
    	 
    	$this->load->model('composicoesdao');
    	$composicao = new composicoesdao();
    	
    	$data['composicoes'] = $composicao->get_composicoes('','titulo');
    	
    	
        //all the posts sent by the view
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 30;

        $config['base_url'] = base_url().'admin/solucao_composicao';
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
            $data['count_products']= $this->solucao_composicaodao->count_solucao_composicao($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['solucao_composicao'] = $this->solucao_composicaodao->get_solucao_composicao($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['solucao_composicao'] = $this->solucao_composicaodao->get_solucao_composicao($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['solucao_composicao'] = $this->solucao_composicaodao->get_solucao_composicao('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['solucao_composicao'] = $this->solucao_composicaodao->get_solucao_composicao('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['solucao_composicao_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->solucao_composicaodao->count_solucao_composicao();
            $data['solucao_composicao'] = $this->solucao_composicaodao->get_solucao_composicao('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/solucao_composicao/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
	public function lista_composicao()
    {
    	//product id
    	$id_solucao = $this->uri->segment(4);
    	$data['id_solucao'] = $id_solucao;
    	 
    	$data['solucao_composicao'] = $this->solucao_composicaodao->get_solucao_composicao_list_by_id_solucao($id_solucao);
    	 
    	//load the view
    	$data['main_content'] = 'admin/solucao_composicao/list_solucao_composicao';
    	$this->load->view('includes/template', $data);
    
    }
    
	public function add()
    {
    	
    	//product id
    	$id_solucao = $this->uri->segment(4);
    	$data['id_solucao'] = $id_solucao;
    	
    	$this->load->model('variaveisdao');
    	$variaveis = new variaveisdao();    	
    	$data['variaveis'] = $variaveis->get_variaveis('','titulo');
    	
    	$this->load->model('composicoesdao');
    	$composicoes = new composicoesdao();
    	$data['composicoes'] = $composicoes->get_composicoes('','titulo');
    	
    	$this->load->model('solucoesdao');
    	$solucoes = new solucoesdao();
    	$data['solucoes'] = $solucoes->get_solucoes('','titulo');
    	
    	
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('id_solucao', 'id_solucao', 'required');
        	$this->form_validation->set_rules('id_composicao', 'id_composicao', 'required');
        	$this->form_validation->set_rules('pista', 'pista', 'required');
        	$this->form_validation->set_rules('acostamento1', 'acostamento1', 'required');
        	$this->form_validation->set_rules('acostamento2', 'acostamento2', 'required');
        	$this->form_validation->set_rules('comprimento_pista', 'comprimento_pista', 'required');
        	$this->form_validation->set_rules('volume', 'volume', 'required');
        	$this->form_validation->set_rules('fator', 'fator', 'required');
        	$this->form_validation->set_rules('restauracao_pista_existente', 'restauracao_pista_existente', 'required');
        	$this->form_validation->set_rules('observacao', 'observacao', '');
        	 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
			        	'id_solucao' 		=> $this->input->post('id_solucao'),
			        	'id_composicao' 	=> $this->input->post('id_composicao'),
                		'pista' 			=> $this->input->post('pista'),
                		'acostamento1' 		=> $this->input->post('acostamento1'),
                		'acostamento2'		=> $this->input->post('acostamento2'),
                		'comprimento_pista' => $this->input->post('comprimento_pista'),
                		'volume' 			=> $this->input->post('volume'),
                		'fator'	 			=> $this->input->post('fator'),                		
                		'id_composicao' 	=> $this->input->post('id_composicao'),
                		'observacao' 		=> $this->input->post('observacao'),
                		'id_composicao' 	=> $this->input->post('id_composicao'),
                		'restauracao_pista_existente' 	=> $this->input->post('restauracao_pista_existente'),
                		'observacao' 		=> $this->input->post('observacao')               
                );
                //if the insert has returned true then we show the flash message
                if($this->solucao_composicaodao->store_solucao_composicao($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/solucao_composicao/add';
        $this->load->view('includes/template', $data);  
    }       
    			
    	
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
        
        $this->load->model('variaveisdao');
        $variaveis = new variaveisdao();         
        $data['variaveis'] = $variaveis->get_variaveis('','titulo');
        
        $this->load->model('composicoesdao');
        $composicoes = new composicoesdao();        
        $data['composicoes'] = $composicoes->get_composicoes('','titulo');
        
        $this->load->model('solucoesdao');
        $solucoes = new solucoesdao();
        $data['solucoes'] = $solucoes->get_solucoes('','titulo');
        
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
        	$this->form_validation->set_rules('id_solucao', 'id_solucao', 'required');
        	$this->form_validation->set_rules('id_composicao', 'id_composicao', 'required');
        	$this->form_validation->set_rules('pista', 'pista', 'required');
        	$this->form_validation->set_rules('acostamento1', 'acostamento1', 'required');
        	$this->form_validation->set_rules('acostamento2', 'acostamento2', 'required');
        	$this->form_validation->set_rules('comprimento_pista', 'comprimento_pista', 'required');
        	$this->form_validation->set_rules('volume', 'volume', 'required');
        	$this->form_validation->set_rules('fator', 'fator', 'required');
        	$this->form_validation->set_rules('restauracao_pista_existente', 'restauracao_pista_existente', 'required');
        	$this->form_validation->set_rules('observacao', 'observacao', '');
        	
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
			        	'id_solucao' 		=> $this->input->post('id_solucao'),
			        	'id_composicao' 	=> $this->input->post('id_composicao'),
                		'pista' 			=> $this->input->post('pista'),
                		'acostamento1' 		=> $this->input->post('acostamento1'),
                		'acostamento2'		=> $this->input->post('acostamento2'),
                		'comprimento_pista' => $this->input->post('comprimento_pista'),
                		'volume' 			=> $this->input->post('volume'),
                		'fator'	 			=> $this->input->post('fator'),                		
                		'id_composicao' 	=> $this->input->post('id_composicao'),
                		'observacao' 		=> $this->input->post('observacao'),
                		'id_composicao' 	=> $this->input->post('id_composicao'),
                		'restauracao_pista_existente' 	=> $this->input->post('restauracao_pista_existente'),
                		'observacao' 		=> $this->input->post('observacao')               
                );
                //if the insert has returned true then we show the flash message
                if($this->solucao_composicaodao->update_solucao_composicao($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/solucao_composicao/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['solucao_composicao'] = $this->solucao_composicaodao->get_solucao_composicao_by_id($id);
        //load the view
        $data['main_content'] = 'admin/solucao_composicao/edit';
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
        $id_solucao = $this->uri->segment(5);
        $this->solucao_composicaodao->delete_solucao_composicao($id);
        redirect('admin/solucao_composicao/lista_composicao/'.$id_solucao);
    }//edit    			
    	
}