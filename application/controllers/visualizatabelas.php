<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class visualizatabelas extends App_controller {
	
   	const VIEW_FOLDER = 'admin/visualizatabelas';
   	
    public function __construct()
	{
	    parent::__construct();
	    $this->load->model('visualizatabelasdao');
	    if(!$this->session->userdata('logged_in')){
	          redirect('admin/login');
	    }
	}
    	
    public function index()
    {

        //all the posts sent by the view
        //$table = $this->input->post('table');
        //$idBoia = $this->input->post('idBoia');
        
    	$table = $this->session->userdata('table'); 
    	$idRegiao = $this->session->userdata('idRegiao');
    	
    	$onsubmit		= $this->input->post('onsubmit');
    	
    	//if($onsubmit){
    		$colunaSearch 	= $this->input->post('colunaSearch');
    		$search_string 	= $this->input->post('search_string');
    		$order 			= $this->input->post('order');
    		$order_type 	= $this->input->post('order_type');
    		$coluna 		= $this->input->post('coluna');
    		$startRange 	= $this->input->post('startRange');
    		$endRange 		= $this->input->post('endRange');
    		$limit_page 	= $this->input->post('limit_page');
    		
    	//}else{
    		/*
    		$colunaSearch 	= '';
    		$search_string 	= '';
    		$order 			= '';
    		$order_type 	= '';
    		$coluna 		= '';
    		$startRange 	= '';
    		$endRange 		= '';
    		$limit_page 	= $this->input->post('limit_page');
    		
    	}
    	*/    	
        if(!$limit_page ){
        		if($this->session->userdata('limit_page')){
        			$config['per_page'] = $this->session->userdata('limit_page');
        		}else{
        			$config['per_page'] = 30;
        		}
        	$data['per_page_selected'] = $config['per_page'];
        }else{
        	$filter_session_data['limit_page'] = $limit_page; 
        	$config['per_page'] = $limit_page;
        	$data['per_page_selected'] = $config['per_page'];
        }

        //pagination settings

        $config['base_url'] = base_url().'admin/visualizatabelas';
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
        //if start range was changed
        if($coluna){
        	$filter_session_data['coluna'] = $coluna;
        }
                
        //if start range was changed
        if($startRange){
        	$filter_session_data['startRange'] = $startRange;
        }
                
        //if start range was changed
        if($endRange){
        	$filter_session_data['endRange'] = $endRange;
        }
        
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if( $search_string !== false && 
        	$order !== false 		 &&
        	$coluna !== false		 &&
        	$startRange !== false	 &&
        	$endRange !== false		 || 
        	$this->uri->segment(3) == true ){ 
            
        	if($colunaSearch){
        		$filter_session_data['colunaSearch'] = $colunaSearch;
        	}else{
        		$colunaSearch = $this->session->userdata('colunaSearch');
        	}
        	$data['colunaSearch'] = $colunaSearch;
        	
            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else if ($search_string === ''){
            	$filter_session_data['search_string_selected'] = null;
            } else{
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
            
            if($coluna){
            	$filter_session_data['coluna'] = $coluna;
            }
            else{
            	$coluna = $this->session->userdata('coluna');
            }
            $data['coluna'] = $coluna;
            
            if($startRange){
            	$filter_session_data['startRange'] = $startRange;
            }else if ($startRange === ''){
            	$filter_session_data['startRange'] = null;
            }else{
            	$startRange = $this->session->userdata('startRange');
            }
            $data['startRange'] = $startRange;
            
            if($endRange){
            	$filter_session_data['endRange'] = $endRange;
            }else if ($endRange === ''){
            	$filter_session_data['endRange'] = null;
            }else{
            	$endRange = $this->session->userdata('endRange');
            }
            $data['endRange'] = $endRange;

            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            
            //fetch sql data into arrays
            $data['count_products']= $this->visualizatabelasdao->count_visualizatabelas($table, $idRegiao, $colunaSearch, $search_string, $order, $coluna, $startRange, $endRange);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['visualizatabelas'] = $this->visualizatabelasdao->get_visualizatabelas($table, $idRegiao, $colunaSearch, $search_string, $order, $order_type, $config['per_page'],$limit_end, $coluna, $startRange, $endRange);        
                }else{
                    $data['visualizatabelas'] = $this->visualizatabelasdao->get_visualizatabelas($table, $idRegiao, $colunaSearch, $search_string, '', $order_type, $config['per_page'],$limit_end, $coluna, $startRange, $endRange);           
                }
            }else{
                if($order){
                    $data['visualizatabelas'] = $this->visualizatabelasdao->get_visualizatabelas($table, $idRegiao,'' ,'', $order, $order_type, $config['per_page'],$limit_end, $coluna, $startRange, $endRange);        
                }else{
                    $data['visualizatabelas'] = $this->visualizatabelasdao->get_visualizatabelas($table, $idRegiao,'' ,'', '', $order_type, $config['per_page'],$limit_end, $coluna, $startRange, $endRange);        
                }
            }

        }else{
			
            //clean filter data inside section
            $filter_session_data['visualizatabela_selected'] = null;
            $filter_session_data['colunaSearch'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $filter_session_data['coluna'] = null;
            $filter_session_data['startRange'] = null;
            $filter_session_data['endRange'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['colunaSearch'] = '';
            $data['search_string_selected'] = '';
            // TODO : verificar essa logica
            $data['coluna'] = '';
            $data['startRange'] = '';
            $data['endRange'] = '';
            // TODO testar isso
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->visualizatabelasdao->count_visualizatabelas($table, $idRegiao, null, null, null, $coluna, $startRange, $endRange);
            $data['visualizatabelas'] = $this->visualizatabelasdao->get_visualizatabelas($table, $idRegiao, '', '', '', $order_type, $config['per_page'],$limit_end, $coluna, $startRange, $endRange);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/visualizatabelas/list';
        $this->load->view('includes/template', $data);  

    }//index    

    /*
     * TODO : comment
     * 
     * @param string $table
     * @param int 	$idBoia
    */
	public function visualiza($table, $idRegiao){
		
		//all the posts sent by the view
		//$table = $this->input->post('table');
		//$idBoia = $this->input->post('idBoia');
		
		$visualizaSess = array('table' => $table, 'idRegiao' => $idRegiao);
		$this->session->set_userdata($visualizaSess);
		
		$colunaSearch 	= $this->input->post('colunaSearch');
		$search_string 	= $this->input->post('search_string');
		$order 			= $this->input->post('order');
		$order_type 	= $this->input->post('order_type');
		$coluna 		= $this->input->post('coluna');
		$startRange 	= $this->input->post('startRange');
		$endRange 		= $this->input->post('endRange');
		$limit_page 	= $this->input->post('limit_page');
		
		
		//pagination settings
		
		$config['per_page'] = 30;
		$config['base_url'] = base_url().'admin/visualizatabelas';
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = 20;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$data['per_page_selected'] = $config['per_page'];
		
		//limit end
		$page = $this->uri->segment(3);
		
		//math to get the initial record to be select in the database
		$limit_end = ($page * $config['per_page']) - $config['per_page'];
		if ($limit_end < 0){
			$limit_end = 0;
		}
		
		$order_type = 'Asc';
		
		//make the data type var avaible to our view
		$data['order_type_selected'] = $order_type;
		
		
		
		//clean filter data inside section
		$filter_session_data['visualizatabela_selected']= null;
		$filter_session_data['colunaSearch']			= null;
		$filter_session_data['search_string_selected'] 	= null;
		$filter_session_data['order'] 					= null;
		$filter_session_data['order_type'] 				= null;
		$filter_session_data['coluna'] 					= null;
		$filter_session_data['startRange'] 				= null;
		$filter_session_data['endRange']				= null;
		$filter_session_data['limit_page']				= null;
		$this->session->set_userdata($filter_session_data);

		//pre selected options
		$data['colunaSearch'] = '';
		$data['search_string_selected'] = '';
		$data['coluna'] = '';
		$data['startRange'] = '';
		$data['endRange'] = '';
		$data['order'] = 'id';

		//fetch sql data into arrays
		$data['count_products']= $this->visualizatabelasdao->count_visualizatabelas($table, $idRegiao);
		$data['visualizatabelas'] = $this->visualizatabelasdao->get_visualizatabelas($table, $idRegiao, '', '', '', $order_type, $config['per_page'],$limit_end);
		$config['total_rows'] = $data['count_products'];
		
					 
		//initializate the panination helper
		$this->pagination->initialize($config);
	
		//load the view
		$data['main_content'] = 'admin/visualizatabelas/list';
		$this->load->view('includes/template', $data);
		
	}    
}