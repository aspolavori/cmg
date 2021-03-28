<?php
    			require_once(APPPATH . 'controllers/App_controller' . EXT);
    			class sentidos extends App_controller {
    			const VIEW_FOLDER = 'admin/sentidos';
    		public function __construct()
		    {
		        parent::__construct();
		        $this->load->model('sentidosdao');
		
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

        $config['base_url'] = base_url().'admin/sentidos';
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
            $data['count_products']= $this->sentidosdao->count_sentidos($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['sentidos'] = $this->sentidosdao->get_sentidos($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['sentidos'] = $this->sentidosdao->get_sentidos($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['sentidos'] = $this->sentidosdao->get_sentidos('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['sentidos'] = $this->sentidosdao->get_sentidos('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['sentido_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->sentidosdao->count_sentidos();
            $data['sentidos'] = $this->sentidosdao->get_sentidos('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/sentidos/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required'); 
        	$this->form_validation->set_rules('origem', 'origem', 'required'); 
        	$this->form_validation->set_rules('label_origem', 'label_origem', 'required'); 
        	$this->form_validation->set_rules('destino', 'destino', 'required'); 
        	$this->form_validation->set_rules('label_destino', 'label_destino', 'required'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('id_pesquisa_trafegos' => $this->input->post('id_pesquisa_trafegos'),'origem' => $this->input->post('origem'),'label_origem' => $this->input->post('label_origem'),'destino' => $this->input->post('destino'),'label_destino' => $this->input->post('label_destino'),
                );
                //if the insert has returned true then we show the flash message
                if($this->sentidosdao->store_sentido($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/sentidos/add';
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
        	$this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required');
        	$this->form_validation->set_rules('origem', 'origem', 'required');
        	$this->form_validation->set_rules('label_origem', 'label_origem', 'required');
        	$this->form_validation->set_rules('destino', 'destino', 'required');
        	$this->form_validation->set_rules('label_destino', 'label_destino', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
        	'id_pesquisa_trafegos' => $this->input->post('id_pesquisa_trafegos'),
        	'origem' => $this->input->post('origem'),
        	'label_origem' => $this->input->post('label_origem'),
        	'destino' => $this->input->post('destino'),
        	'label_destino' => $this->input->post('label_destino'),                    
                );
                //if the insert has returned true then we show the flash message
                if($this->sentidosdao->update_sentido($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/sentidos/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['sentido'] = $this->sentidosdao->get_sentido_by_id($id);
        //load the view
        $data['main_content'] = 'admin/sentidos/edit';
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
        $this->sentidosdao->delete_sentido($id);
        redirect('admin/sentidos');
    }//edit    			
    	
    public function pop_sentido()
    {
    	$id = $this->uri->segment(4);
    	
    	//all the posts sent by the view
    	$search_string = $this->input->post('search_string');
    	$order = $this->input->post('order');
    	$order_type = $this->input->post('order_type');
    
    	//pagination settings
    	$config['per_page'] = 30;
    
    	$config['base_url'] = base_url().'admin/sentidos';
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
    								$data['count_products']= $this->sentidosdao->count_sentidos_by_pesquisa($id);
    								$config['total_rows'] = $data['count_products'];
    
    								//fetch sql data into arrays
    								if($search_string){
    								if($order){
    								$data['sentidos'] = $this->sentidosdao->get_sentido_by_pesquisa_id($id);
    				}else{
    				$data['sentidos'] = $this->sentidosdao->get_sentido_by_pesquisa_id($id);
    				}
    				}else{
    				if($order){
    				$data['sentidos'] = $this->sentidosdao->get_sentido_by_pesquisa_id($id);
    				}else{
    						$data['sentidos'] = $this->sentidosdao->get_sentido_by_pesquisa_id($id);
    				}
    				}
    
    				}else{
    
    				//clean filter data inside section
    				$filter_session_data['sentido_selected'] = null;
    				$filter_session_data['search_string_selected'] = null;
    					$filter_session_data['order'] = null;
    					$filter_session_data['order_type'] = null;
    							$this->session->set_userdata($filter_session_data);
    
    					//pre selected options
    					$data['search_string_selected'] = '';
    					$data['order'] = 'id';
    
    					//fetch sql data into arrays
    					$data['count_products']= $this->sentidosdao->count_sentidos_by_pesquisa($id);
    						$data['sentidos'] = $this->sentidosdao->get_sentido_by_pesquisa_id($id);
            $config['total_rows'] = $data['count_products'];
    
    					}//!isset($search_string) && !isset($order)
    						 
    						//initializate the panination helper
    						$this->pagination->initialize($config);
							$data['id_pesquisa_trafegos']   = $id;  
    						//load the view
    						$data['main_content'] = 'admin/sentidos/pop_list';
    						$this->load->view('includes/pop_template', $data);
    
    }//index

    public function pop_update()
    {
    	//product id
    	$id = $this->uri->segment(4);
    	$id_pesquisa = $this->uri->segment(5);
    
    	//if save button was clicked, get the data sent via post
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		//form validation
    		$this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required');
    		$this->form_validation->set_rules('origem', 'origem', 'required');
    		$this->form_validation->set_rules('label_origem', 'label_origem', 'required');
    		$this->form_validation->set_rules('destino', 'destino', 'required');
    		$this->form_validation->set_rules('label_destino', 'label_destino', 'required');
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    
    			$data_to_store = array(
    					'id_pesquisa_trafegos' => $this->input->post('id_pesquisa_trafegos'),
    					'origem' => $this->input->post('origem'),
    					'label_origem' => $this->input->post('label_origem'),
    					'destino' => $this->input->post('destino'),
    					'label_destino' => $this->input->post('label_destino'),
    			);
    			//if the insert has returned true then we show the flash message
    			if($this->sentidosdao->update_sentido($id, $data_to_store) == TRUE){
    				$this->session->set_flashdata('flash_message', 'updated');
    			}else{
    				$this->session->set_flashdata('flash_message', 'not_updated');
    			}
    			redirect('admin/sentidos/pop_update/'.$id.'/'.$id_pesquisa);
    
    		}//validation run
    
    	}
    
    	$data['id_pesquisa_trafegos'] = $id_pesquisa;
    	
    	//if we are updating, and the data did not pass trough the validation
    	//the code below wel reload the current data
    
    	//product data
    	$data['sentido'] = $this->sentidosdao->get_sentido_by_id($id);
    	//load the view
    	$data['main_content'] = 'admin/sentidos/pop_edit';
    	$this->load->view('includes/pop_template', $data);
    
    }//update
       
    public function pop_add()
    {
    	$id_pesquisa = $this->uri->segment(4);
    	
    	//if save button was clicked, get the data sent via post
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    
    		//form validation
    		$this->form_validation->set_rules('id_pesquisa_trafegos', 'id_pesquisa_trafegos', 'required');
    		$this->form_validation->set_rules('origem', 'origem', 'required');
    		$this->form_validation->set_rules('label_origem', 'label_origem', 'required');
    		$this->form_validation->set_rules('destino', 'destino', 'required');
    		$this->form_validation->set_rules('label_destino', 'label_destino', 'required');
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    
    
    		//if the form has passed through the validation
    		if ($this->form_validation->run())
    		{
    			$data_to_store = array('id_pesquisa_trafegos' => $this->input->post('id_pesquisa_trafegos'),'origem' => $this->input->post('origem'),'label_origem' => $this->input->post('label_origem'),'destino' => $this->input->post('destino'),'label_destino' => $this->input->post('label_destino'),
    			);
    			//if the insert has returned true then we show the flash message
    			if($this->sentidosdao->store_sentido($data_to_store)){
    				$data['flash_message'] = TRUE;
    			}else{
    				$data['flash_message'] = FALSE;
    			}
    
    		}
    
    	}
    	
    	$data['id_pesquisa_trafegos'] = $id_pesquisa;
    	//load the view
    	$data['main_content'] = 'admin/sentidos/pop_add';
    	$this->load->view('includes/pop_template', $data);
    }
     
    
    public function pop_delete()
    {
    	//product id
    	$id = $this->uri->segment(4);
    	$id_pesquisa = $this->uri->segment(5);
    	$this->sentidosdao->delete_sentido($id);
    	redirect('admin/sentidos/pop_sentido/'.$id_pesquisa);
    }//edit
}