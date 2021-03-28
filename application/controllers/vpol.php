<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class vpol extends App_controller {

	const VIEW_FOLDER = 'admin/vpol';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('vpoldao');

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

        $config['base_url'] = base_url().'admin/vpol';
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
            $data['count_products']= $this->vpoldao->count_vpol($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['vpol'] = $this->vpoldao->get_vpol($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['vpol'] = $this->vpoldao->get_vpol($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['vpol'] = $this->vpoldao->get_vpol('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['vpol'] = $this->vpoldao->get_vpol('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['vpol_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->vpoldao->count_vpol();
            $data['vpol'] = $this->vpoldao->get_vpol('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/vpol/list';
        $this->load->view('includes/template', $data);  

    }//index    

    public function lista_vpol()
    {
    
    	//product id
    	$id_hdm_veiculo = $this->uri->segment(4);
    	$data['id_hdm_veiculo'] = $id_hdm_veiculo;
    	
    	$this->load->model('hdm_veiculosdao');
    	$hdm_veiculos = new hdm_veiculosdao();
    	$data['hdm_veiculos'] = $hdm_veiculos->get_hdm_veiculos_by_id($id_hdm_veiculo) ;
    
    	$this->load->model('veiculosdao');
    	$veiculos = new veiculosdao();
    	$data['veiculos'] = $veiculos->get_veiculos();
    	 
    	$data['vpol'] = $this->vpoldao->get_vpol_custo_by_id_hdm_veiculo($id_hdm_veiculo);
    	//load the view
    	$data['main_content'] = 'admin/vpol/list_vpol';
    	$this->load->view('includes/template', $data);
    }     			   			
    
public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('EUC_TYRE', 'EUC_TYRE', 'required'); 
        	$this->form_validation->set_rules('EUC_OIL', 'EUC_OIL', 'required'); 
        	$this->form_validation->set_rules('EUC_CARGO', 'EUC_CARGO', 'required');
        	$this->form_validation->set_rules('EUC_OHEAD', 'EUC_OHEAD', 'required');
        	$this->form_validation->set_rules('FUC_TYRE', 'FUC_TYRE', 'required'); 
        	$this->form_validation->set_rules('FUC_OIL', 'FUC_OIL', 'required'); 
        	$this->form_validation->set_rules('FUC_OHEAD', 'FUC_OHEAD', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('EUC_TYRE' => $this->input->post('EUC_TYRE'),
				                		'EUC_OIL' => $this->input->post('EUC_OIL'),
				                		'EUC_CARGO' => $this->input->post('EUC_CARGO'),
                						'EUC_OHEAD' => $this->input->post('EUC_OHEAD'),                		
				                		'FUC_TYRE' => $this->input->post('FUC_TYRE'),
				                		'FUC_OIL' => $this->input->post('FUC_OIL'),
                						'FUC_OHEAD' => $this->input->post('FUC_OHEAD')
                );
                //if the insert has returned true then we show the flash message
                if($this->vpoldao->store_vpol($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/vpol/add';
        $this->load->view('includes/template', $data);  
    }       
    			
    	
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
        
        $id_hdm_veiculo = $this->uri->segment(5);
        $data['id_hdm_veiculo'] = $id_hdm_veiculo;
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
        	$this->form_validation->set_rules('EUC_TYRE', 'EUC_TYRE', 'required'); 
        	$this->form_validation->set_rules('EUC_OIL', 'EUC_OIL', 'required'); 
        	$this->form_validation->set_rules('EUC_CARGO', 'EUC_CARGO', 'required');
        	$this->form_validation->set_rules('EUC_OHEAD', 'EUC_OHEAD', 'required');
        	$this->form_validation->set_rules('FUC_TYRE', 'FUC_TYRE', 'required'); 
        	$this->form_validation->set_rules('FUC_OIL', 'FUC_OIL', 'required'); 
        	$this->form_validation->set_rules('FUC_OHEAD', 'FUC_OHEAD', 'required');
        	
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array('EUC_TYRE' => $this->input->post('EUC_TYRE'),
				                		'EUC_OIL' => $this->input->post('EUC_OIL'),
				                		'EUC_CARGO' => $this->input->post('EUC_CARGO'),
                						'EUC_OHEAD' => $this->input->post('EUC_OHEAD'),                		
				                		'FUC_TYRE' => $this->input->post('FUC_TYRE'),
				                		'FUC_OIL' => $this->input->post('FUC_OIL'),
                						'FUC_OHEAD' => $this->input->post('FUC_OHEAD')                   
                );
                //if the insert has returned true then we show the flash message
                if($this->vpoldao->update_vpol($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/vpol/update/'.$id.'/'.$id_hdm_veiculo.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['vpol'] = $this->vpoldao->get_vpol_by_id($id);
        //load the view
        $data['main_content'] = 'admin/vpol/edit';
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
        $this->vpoldao->delete_vpol($id);
        redirect('admin/vpol');
    }//edit    			
    	}