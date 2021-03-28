<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class hdm_veiculos extends App_controller {

	const VIEW_FOLDER = 'admin/hdm_veiculos';
 	public function __construct()
    {
        parent::__construct();
        $this->load->model('hdm_veiculosdao');

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

        $config['base_url'] = base_url().'admin/hdm_veiculos';
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
            $data['count_products']= $this->hdm_veiculosdao->count_hdm_veiculos($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['hdm_veiculos_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->hdm_veiculosdao->count_hdm_veiculos();
            $data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/hdm_veiculos/list';
        $this->load->view('includes/template', $data);  

    }//index    

    public function relatorios(){
    	
    	$ano  = $this->uri->segment(4);
    	
    	$data['hdm_veiculos_ref'] = $this->hdm_veiculosdao->get_hdm_veiculos();
    	//if save button was clicked, get the data sent via post
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    	
    		//form validation
    		$this->form_validation->set_rules('ano', 'Ano', 'numeric');
    	
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    	
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    			
    			$ano =  $this->input->post('ano');
    			$data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos_by_ano($ano);
    			$data['ano'] = $ano;
    			
    		}
    	}else{
    		if($ano){
    			$data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos_by_ano($ano);
    			$data['ano'] = $ano;
    		}else{
    			$data['hdm_veiculos'] = array();
    		}
    		
    	}
    	
    	$data['main_content'] = 'admin/hdm_veiculos/list_relatorio';
		$this->load->view('includes/template', $data);					
    }
    
    public function get_relatorio(){
    	 

    	$id = $this->uri->segment(4);
    	$ano = $this->uri->segment(5);
    	$data['ano'] = $ano;
    	
    	$data['hdm_relatorio'] = $this->hdm_veiculosdao->get_relatorio_hdm_veiculos_by_id($id);
    	
    	//$this->PAR($data['hdm_relatorio']);
    	 
    	$data['main_content'] = 'admin/hdm_veiculos/get_relatorio';
    	$this->load->view('includes/template', $data);
    }
    
    
public function add()
    {
    	
    	$data['hdm_veiculos_options'] = $this->hdm_veiculosdao->get_hdm_veiculos('', 'data_base', 'Desc');
    	//$this->PAR($data['hdm_veiculos_options']);
    	
    	$data['veiculos'] = $this->get_veiculos_by_hd_data_base($data['hdm_veiculos_options'][0]['id']) ;
    	
    	$this->load->model('fator_conversao_padraodao');
    	$fator_conversao = new fator_conversao_padraodao();
    	$data['fatoresConversao'] = $fator_conversao->get_fator_conversao_padrao_by_id(1);
    	
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('reajuste_salario', 'reajuste_salario', 'required'); 
        	$this->form_validation->set_rules('id_hdm_veiculos', 'id_hdm_veiculos', 'required');
        	$this->form_validation->set_rules('ind_reajuste', 'ind_reajuste', 'required'); 
        	$this->form_validation->set_rules('ind_var_igpm', 'ind_var_igpm', 'required'); 
        	$this->form_validation->set_rules('valor_gasolina', 'valor_gasolina', 'required'); 
        	$this->form_validation->set_rules('valor_oleo', 'valor_oleo', 'required'); 
        	$this->form_validation->set_rules('valor_gas_e', 'valor_gas_e', 'required'); 
        	$this->form_validation->set_rules('valor_oleo_e', 'valor_oleo_e', 'required'); 
        	$this->form_validation->set_rules('data_base', 'data_base', 'required'); 
        	$this->form_validation->set_rules('observacao', 'observacao', ''); 
            
            foreach($data['veiculos']  as $item){
            	
            	$this->form_validation->set_rules($item['id'], $item['VEH_NAME'], 'required');
            }
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('reajuste_salario' => $this->input->post('reajuste_salario'),
                		'id_hdm_veiculos' => $this->input->post('id_hdm_veiculos'),
                		'ind_reajuste' => $this->input->post('ind_reajuste'),                		
                		'ind_var_igpm' => $this->input->post('ind_var_igpm'),
                		'valor_gasolina' => $this->input->post('valor_gasolina'),
                		'valor_oleo' => $this->input->post('valor_oleo'),
                		'valor_gas_e' => $this->input->post('valor_gas_e'),
                		'valor_oleo_e' => $this->input->post('valor_oleo_e'),
                		'data_base' => $this->input->post('data_base'),
                		'observacao' => $this->input->post('observacao')
                );
                
                $veiculo_to_store = array();
                foreach($data['veiculos'] as $item){
                	$veiculo_to_store[] = array('id_veiculo' => $item['id'], 
                								'FUC_VEH' => $this->input->post($item['id']),
                								'FC' => $item['FC'] ); 
                }
                
                //if the insert has returned true then we show the flash message
                if($this->hdm_veiculosdao->store_hdm_veiculos($data_to_store, $veiculo_to_store )){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/hdm_veiculos/add';
        $this->load->view('includes/template', $data);  
    }       
    			
    	
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
  
        $data['hdm_veiculos_options'] = $this->hdm_veiculosdao->get_hdm_veiculos('', 'data_base', 'Desc');
        
        $data['veiculos'] = $this->get_veiculos_by_hd_data_base($data['hdm_veiculos_options'][0]['id']) ;
        
        $this->load->model('fator_conversaodao');
        $fator_conversao = new fator_conversaodao();
        $data['fatoresConversao'] = $fator_conversao->get_fator_conversao_custo_by_id_hdm_veiculo(1);
        
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
        	$this->form_validation->set_rules('reajuste_salario', 'reajuste_salario', 'required');
        	$this->form_validation->set_rules('id_hdm_veiculos', 'id_hdm_veiculos', 'required');
        	$this->form_validation->set_rules('ind_reajuste', 'ind_reajuste', 'required');
        	$this->form_validation->set_rules('ind_var_igpm', 'ind_var_igpm', 'required');
        	$this->form_validation->set_rules('valor_gasolina', 'valor_gasolina', 'required');
        	$this->form_validation->set_rules('valor_oleo', 'valor_oleo', 'required');
        	$this->form_validation->set_rules('valor_gas_e', 'valor_gas_e', 'required');
        	$this->form_validation->set_rules('valor_oleo_e', 'valor_oleo_e', 'required');
        	$this->form_validation->set_rules('data_base', 'data_base', 'required');
        	$this->form_validation->set_rules('observacao', 'observacao', '');
        	
        	foreach($data['veiculos']  as $item){
        		 
        		$this->form_validation->set_rules($item['id'], $item['VEH_NAME'], 'required');
        	}
        	
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
		        	'reajuste_salario' => $this->input->post('reajuste_salario'),
                	'id_hdm_veiculos' => $this->input->post('id_hdm_veiculos'),
		        	'ind_reajuste' => $this->input->post('ind_reajuste'),
		        	'ind_var_igpm' => $this->input->post('ind_var_igpm'),
		        	'valor_gasolina' => $this->input->post('valor_gasolina'),
		        	'valor_oleo' => $this->input->post('valor_oleo'),
		        	'valor_gas_e' => $this->input->post('valor_gas_e'),
		        	'valor_oleo_e' => $this->input->post('valor_oleo_e'),
		        	'data_base' => $this->input->post('data_base'),
		        	'observacao' => $this->input->post('observacao')                    
                );
                
                $veiculo_to_store = array();
                foreach($data['veiculos'] as $item){
                	$veiculo_to_store[] = array('id_veiculo' => $item['id'],
                			'FUC_VEH' => $this->input->post($item['id']),
                			'FC' => $item['FC'] );
                }
                
                //if the insert has returned true then we show the flash message
                if($this->hdm_veiculosdao->update_hdm_veiculos($id, $data_to_store, $veiculo_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/hdm_veiculos/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['hdm_veiculos'] = $this->hdm_veiculosdao->get_hdm_veiculos_by_id($id);
        //load the view
        $data['main_content'] = 'admin/hdm_veiculos/edit';
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
        $this->hdm_veiculosdao->delete_hdm_veiculos($id);
        redirect('admin/hdm_veiculos');
    }//edit    			
    	
    public function get_veiculos_by_hd_data_base($id_hdm_veiculos){
    	
    	return $this->hdm_veiculosdao->get_veiculos_by_hdm_veiculos($id_hdm_veiculos);
    	
    }
    
    public function get_veiculos_by_hd_data_base_json($id_hdm_veiculos){
    	
    	$myJSON = json_encode($this->hdm_veiculosdao->get_veiculos_by_hdm_veiculos($id_hdm_veiculos));
    	echo($myJSON);
    }
    
}