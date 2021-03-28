<?php
    			require_once(APPPATH . 'controllers/App_controller' . EXT);
    			class inclinacao_logs extends App_controller {
    			const VIEW_FOLDER = 'admin/inclinacao_logs';
    		public function __construct()
		    {
		        parent::__construct();
		        $this->load->model('inclinacao_logsdao');
		
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

        $config['base_url'] = base_url().'admin/inclinacao_logs';
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
           // $data['count_products']= $this->inclinacao_logsdao->count_inclinacao_logs($search_string, $order);
           // $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['inclinacao_logs'] = $this->inclinacao_logsdao->get_inclinacao_logs($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['inclinacao_logs'] = $this->inclinacao_logsdao->get_inclinacao_logs($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['inclinacao_logs'] = $this->inclinacao_logsdao->get_inclinacao_logs('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['inclinacao_logs'] = $this->inclinacao_logsdao->get_inclinacao_logs('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['inclinacao_log_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'ID_LOG';

            //fetch sql data into arrays
            $data['count_products']= $this->inclinacao_logsdao->count_inclinacao_logs();
            $data['inclinacao_logs'] = $this->inclinacao_logsdao->get_inclinacao_logs('', '', $order_type, $config['per_page'],$limit_end);        
           // $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/inclinacao_logs/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('ID_TRECHO', 'ID_TRECHO', 'required'); 
        	$this->form_validation->set_rules('HODOMETRO_TRECHO', 'HODOMETRO_TRECHO', 'required'); 
        	$this->form_validation->set_rules('GPS_VELOCIDADE', 'GPS_VELOCIDADE', 'required'); 
        	$this->form_validation->set_rules('GPS_HODOMETRO', 'GPS_HODOMETRO', 'required'); 
        	$this->form_validation->set_rules('GPS_LATITUDE', 'GPS_LATITUDE', 'required'); 
        	$this->form_validation->set_rules('GPS_LONGITUDE', 'GPS_LONGITUDE', 'required'); 
        	$this->form_validation->set_rules('GPS_ALTITUDE', 'GPS_ALTITUDE', 'required'); 
        	$this->form_validation->set_rules('GPS_ERRO', 'GPS_ERRO', 'required'); 
        	$this->form_validation->set_rules('GPS_QTDE_SATELITES', 'GPS_QTDE_SATELITES', 'required'); 
        	$this->form_validation->set_rules('GPS_X', 'GPS_X', 'required'); 
        	$this->form_validation->set_rules('GPS_Y', 'GPS_Y', 'required'); 
        	$this->form_validation->set_rules('GPS_AZIMUTE', 'GPS_AZIMUTE', 'required'); 
        	$this->form_validation->set_rules('GPS_NMEA_GPRMC', 'GPS_NMEA_GPRMC', 'required'); 
        	$this->form_validation->set_rules('GPS_NMEA_GPGGA', 'GPS_NMEA_GPGGA', 'required'); 
        	$this->form_validation->set_rules('DATA_HORA', 'DATA_HORA', 'required'); 
        	$this->form_validation->set_rules('BAROMETRO_PRESSAO', 'BAROMETRO_PRESSAO', 'required'); 
        	$this->form_validation->set_rules('BAROMETRO_TEMPERATURA', 'BAROMETRO_TEMPERATURA', 'required'); 
        	$this->form_validation->set_rules('BAROMETRO_ALTITUDE', 'BAROMETRO_ALTITUDE', 'required'); 
        	$this->form_validation->set_rules('IRI_INTERNO', 'IRI_INTERNO', 'required'); 
        	$this->form_validation->set_rules('IRI_EXTERNO', 'IRI_EXTERNO', 'required'); 
        	$this->form_validation->set_rules('odometro', 'odometro', 'required'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('ID_TRECHO' => $this->input->post('ID_TRECHO'),'HODOMETRO_TRECHO' => $this->input->post('HODOMETRO_TRECHO'),'GPS_VELOCIDADE' => $this->input->post('GPS_VELOCIDADE'),'GPS_HODOMETRO' => $this->input->post('GPS_HODOMETRO'),'GPS_LATITUDE' => $this->input->post('GPS_LATITUDE'),'GPS_LONGITUDE' => $this->input->post('GPS_LONGITUDE'),'GPS_ALTITUDE' => $this->input->post('GPS_ALTITUDE'),'GPS_ERRO' => $this->input->post('GPS_ERRO'),'GPS_QTDE_SATELITES' => $this->input->post('GPS_QTDE_SATELITES'),'GPS_X' => $this->input->post('GPS_X'),'GPS_Y' => $this->input->post('GPS_Y'),'GPS_AZIMUTE' => $this->input->post('GPS_AZIMUTE'),'GPS_NMEA_GPRMC' => $this->input->post('GPS_NMEA_GPRMC'),'GPS_NMEA_GPGGA' => $this->input->post('GPS_NMEA_GPGGA'),'DATA_HORA' => $this->input->post('DATA_HORA'),'BAROMETRO_PRESSAO' => $this->input->post('BAROMETRO_PRESSAO'),'BAROMETRO_TEMPERATURA' => $this->input->post('BAROMETRO_TEMPERATURA'),'BAROMETRO_ALTITUDE' => $this->input->post('BAROMETRO_ALTITUDE'),'IRI_INTERNO' => $this->input->post('IRI_INTERNO'),'IRI_EXTERNO' => $this->input->post('IRI_EXTERNO'),'odometro' => $this->input->post('odometro'),
                );
                //if the insert has returned true then we show the flash message
                if($this->inclinacao_logsdao->store_inclinacao_log($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/inclinacao_logs/add';
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
        	$this->form_validation->set_rules('ID_TRECHO', 'ID_TRECHO', 'required');
        	$this->form_validation->set_rules('HODOMETRO_TRECHO', 'HODOMETRO_TRECHO', 'required');
        	$this->form_validation->set_rules('GPS_VELOCIDADE', 'GPS_VELOCIDADE', 'required');
        	$this->form_validation->set_rules('GPS_HODOMETRO', 'GPS_HODOMETRO', 'required');
        	$this->form_validation->set_rules('GPS_LATITUDE', 'GPS_LATITUDE', 'required');
        	$this->form_validation->set_rules('GPS_LONGITUDE', 'GPS_LONGITUDE', 'required');
        	$this->form_validation->set_rules('GPS_ALTITUDE', 'GPS_ALTITUDE', 'required');
        	$this->form_validation->set_rules('GPS_ERRO', 'GPS_ERRO', 'required');
        	$this->form_validation->set_rules('GPS_QTDE_SATELITES', 'GPS_QTDE_SATELITES', 'required');
        	$this->form_validation->set_rules('GPS_X', 'GPS_X', 'required');
        	$this->form_validation->set_rules('GPS_Y', 'GPS_Y', 'required');
        	$this->form_validation->set_rules('GPS_AZIMUTE', 'GPS_AZIMUTE', 'required');
        	$this->form_validation->set_rules('GPS_NMEA_GPRMC', 'GPS_NMEA_GPRMC', 'required');
        	$this->form_validation->set_rules('GPS_NMEA_GPGGA', 'GPS_NMEA_GPGGA', 'required');
        	$this->form_validation->set_rules('DATA_HORA', 'DATA_HORA', 'required');
        	$this->form_validation->set_rules('BAROMETRO_PRESSAO', 'BAROMETRO_PRESSAO', 'required');
        	$this->form_validation->set_rules('BAROMETRO_TEMPERATURA', 'BAROMETRO_TEMPERATURA', 'required');
        	$this->form_validation->set_rules('BAROMETRO_ALTITUDE', 'BAROMETRO_ALTITUDE', 'required');
        	$this->form_validation->set_rules('IRI_INTERNO', 'IRI_INTERNO', 'required');
        	$this->form_validation->set_rules('IRI_EXTERNO', 'IRI_EXTERNO', 'required');
        	$this->form_validation->set_rules('odometro', 'odometro', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
        	'ID_TRECHO' => $this->input->post('ID_TRECHO'),
        	'HODOMETRO_TRECHO' => $this->input->post('HODOMETRO_TRECHO'),
        	'GPS_VELOCIDADE' => $this->input->post('GPS_VELOCIDADE'),
        	'GPS_HODOMETRO' => $this->input->post('GPS_HODOMETRO'),
        	'GPS_LATITUDE' => $this->input->post('GPS_LATITUDE'),
        	'GPS_LONGITUDE' => $this->input->post('GPS_LONGITUDE'),
        	'GPS_ALTITUDE' => $this->input->post('GPS_ALTITUDE'),
        	'GPS_ERRO' => $this->input->post('GPS_ERRO'),
        	'GPS_QTDE_SATELITES' => $this->input->post('GPS_QTDE_SATELITES'),
        	'GPS_X' => $this->input->post('GPS_X'),
        	'GPS_Y' => $this->input->post('GPS_Y'),
        	'GPS_AZIMUTE' => $this->input->post('GPS_AZIMUTE'),
        	'GPS_NMEA_GPRMC' => $this->input->post('GPS_NMEA_GPRMC'),
        	'GPS_NMEA_GPGGA' => $this->input->post('GPS_NMEA_GPGGA'),
        	'DATA_HORA' => $this->input->post('DATA_HORA'),
        	'BAROMETRO_PRESSAO' => $this->input->post('BAROMETRO_PRESSAO'),
        	'BAROMETRO_TEMPERATURA' => $this->input->post('BAROMETRO_TEMPERATURA'),
        	'BAROMETRO_ALTITUDE' => $this->input->post('BAROMETRO_ALTITUDE'),
        	'IRI_INTERNO' => $this->input->post('IRI_INTERNO'),
        	'IRI_EXTERNO' => $this->input->post('IRI_EXTERNO'),
        	'odometro' => $this->input->post('odometro'),                    
                );
                //if the insert has returned true then we show the flash message
                if($this->inclinacao_logsdao->update_inclinacao_log($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/inclinacao_logs/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['inclinacao_log'] = $this->inclinacao_logsdao->get_inclinacao_log_by_id($id);
        //load the view
        $data['main_content'] = 'admin/inclinacao_logs/edit';
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
        $this->inclinacao_logsdao->delete_inclinacao_log($id);
        redirect('admin/inclinacao_logs');
    }//edit    			
    	}