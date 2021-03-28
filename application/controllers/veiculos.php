<?php
    			require_once(APPPATH . 'controllers/App_controller' . EXT);
    			class veiculos extends App_controller {
    			const VIEW_FOLDER = 'admin/veiculos';
    		public function __construct()
		    {
		        parent::__construct();
		        $this->load->model('veiculosdao');
		
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

        $config['base_url'] = base_url().'admin/veiculos';
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
            $data['count_products']= $this->veiculosdao->count_veiculos($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['veiculos'] = $this->veiculosdao->get_veiculos($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['veiculos'] = $this->veiculosdao->get_veiculos($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['veiculos'] = $this->veiculosdao->get_veiculos('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['veiculos'] = $this->veiculosdao->get_veiculos('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['veiculos_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->veiculosdao->count_veiculos();
            $data['veiculos'] = $this->veiculosdao->get_veiculos('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/veiculos/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('VEH_NAME', 'VEH_NAME', 'required'); 
        	$this->form_validation->set_rules('CATEGORY', 'CATEGORY', 'required'); 
        	$this->form_validation->set_rules('BASE_TYPE', 'BASE_TYPE', 'required'); 
        	$this->form_validation->set_rules('CLASS', 'CLASS', 'required'); 
        	$this->form_validation->set_rules('LIFE_MODEL', 'LIFE_MODEL', 'required'); 
        	$this->form_validation->set_rules('PCSE', 'PCSE', 'required'); 
        	$this->form_validation->set_rules('NUM_WHEELS', 'NUM_WHEELS', 'required'); 
        	$this->form_validation->set_rules('NUM_AXLES', 'NUM_AXLES', 'required'); 
        	$this->form_validation->set_rules('TYRE_TYPE', 'TYRE_TYPE', 'required'); 
        	$this->form_validation->set_rules('TYRE_NR0', 'TYRE_NR0', 'required'); 
        	$this->form_validation->set_rules('TYRE_RREC', 'TYRE_RREC', 'required'); 
        	$this->form_validation->set_rules('AKM0', 'AKM0', 'required'); 
        	$this->form_validation->set_rules('HRWK0', 'HRWK0', 'required'); 
        	$this->form_validation->set_rules('LIFE0', 'LIFE0', 'required'); 
        	$this->form_validation->set_rules('PP', 'PP', 'required'); 
        	$this->form_validation->set_rules('PAX', 'PAX', 'required'); 
        	$this->form_validation->set_rules('W', 'W', 'required'); 
        	$this->form_validation->set_rules('WEIGHT_OP', 'WEIGHT_OP', 'required'); 
        	$this->form_validation->set_rules('WGT_UNIT', 'WGT_UNIT', 'required'); 
        	$this->form_validation->set_rules('ESAL', 'ESAL', 'required');  
        	$this->form_validation->set_rules('EUC_INTRST', 'EUC_INTRST', 'required');
        	$this->form_validation->set_rules('FUC_INTRST', 'FUC_INTRST', 'required'); 
        	$this->form_validation->set_rules('AF', 'AF', 'required'); 
        	$this->form_validation->set_rules('CD', 'CD', 'required'); 
        	$this->form_validation->set_rules('CDMULT', 'CDMULT', 'required'); 
        	$this->form_validation->set_rules('CR_B_A0', 'CR_B_A0', 'required'); 
        	$this->form_validation->set_rules('CR_B_A1', 'CR_B_A1', 'required'); 
        	$this->form_validation->set_rules('CR_B_A2', 'CR_B_A2', 'required'); 
        	$this->form_validation->set_rules('PDRIVE', 'PDRIVE', 'required'); 
        	$this->form_validation->set_rules('PDRV_UNITS', 'PDRV_UNITS', 'required'); 
        	$this->form_validation->set_rules('PBRAKE', 'PBRAKE', 'required'); 
        	$this->form_validation->set_rules('PBRK_UNITS', 'PBRK_UNITS', 'required'); 
        	$this->form_validation->set_rules('PRAT', 'PRAT', 'required'); 
        	$this->form_validation->set_rules('PRAT_UNITS', 'PRAT_UNITS', 'required'); 
        	$this->form_validation->set_rules('FPLIM', 'FPLIM', 'required'); 
        	$this->form_validation->set_rules('B_VDES2', 'B_VDES2', 'required'); 
        	$this->form_validation->set_rules('B_VDES_A0', 'B_VDES_A0', 'required'); 
        	$this->form_validation->set_rules('B_VDES_A1', 'B_VDES_A1', 'required'); 
        	$this->form_validation->set_rules('B_VDES_A2', 'B_VDES_A2', 'required'); 
        	$this->form_validation->set_rules('B_VDES_CW1', 'B_VDES_CW1', 'required'); 
        	$this->form_validation->set_rules('B_VDES_CW2', 'B_VDES_CW2', 'required'); 
        	$this->form_validation->set_rules('C_VDES2', 'C_VDES2', 'required'); 
        	$this->form_validation->set_rules('C_VDES_A0', 'C_VDES_A0', 'required'); 
        	$this->form_validation->set_rules('C_VDES_A1', 'C_VDES_A1', 'required'); 
        	$this->form_validation->set_rules('C_VDES_A2', 'C_VDES_A2', 'required'); 
        	$this->form_validation->set_rules('C_VDES_CW1', 'C_VDES_CW1', 'required'); 
        	$this->form_validation->set_rules('C_VDES_CW2', 'C_VDES_CW2', 'required'); 
        	$this->form_validation->set_rules('U_VDES2', 'U_VDES2', 'required'); 
        	$this->form_validation->set_rules('U_VDES_A0', 'U_VDES_A0', 'required'); 
        	$this->form_validation->set_rules('U_VDES_A1', 'U_VDES_A1', 'required'); 
        	$this->form_validation->set_rules('U_VDES_A2', 'U_VDES_A2', 'required'); 
        	$this->form_validation->set_rules('U_VDES_CW1', 'U_VDES_CW1', 'required'); 
        	$this->form_validation->set_rules('U_VDES_CW2', 'U_VDES_CW2', 'required'); 
        	$this->form_validation->set_rules('VCURVE_A0', 'VCURVE_A0', 'required'); 
        	$this->form_validation->set_rules('VCURVE_A1', 'VCURVE_A1', 'required'); 
        	$this->form_validation->set_rules('VROUGH_A0', 'VROUGH_A0', 'required'); 
        	$this->form_validation->set_rules('ARVMAX', 'ARVMAX', 'required'); 
        	$this->form_validation->set_rules('SPEED_SIG', 'SPEED_SIG', 'required'); 
        	$this->form_validation->set_rules('SPEED_BETA', 'SPEED_BETA', 'required'); 
        	$this->form_validation->set_rules('COV', 'COV', 'required'); 
        	$this->form_validation->set_rules('CGR_A0', 'CGR_A0', 'required'); 
        	$this->form_validation->set_rules('CGR_A1', 'CGR_A1', 'required'); 
        	$this->form_validation->set_rules('CGR_A2', 'CGR_A2', 'required'); 
        	$this->form_validation->set_rules('RPM_A0', 'RPM_A0', 'required'); 
        	$this->form_validation->set_rules('RPM_A1', 'RPM_A1', 'required'); 
        	$this->form_validation->set_rules('RPM_A2', 'RPM_A2', 'required'); 
        	$this->form_validation->set_rules('RPM_A3', 'RPM_A3', 'required'); 
        	$this->form_validation->set_rules('RPM_IDLE', 'RPM_IDLE', 'required'); 
        	$this->form_validation->set_rules('IDLE_FUEL', 'IDLE_FUEL', 'required'); 
        	$this->form_validation->set_rules('ZETAB', 'ZETAB', 'required'); 
        	$this->form_validation->set_rules('EHP', 'EHP', 'required'); 
        	$this->form_validation->set_rules('EDT', 'EDT', 'required'); 
        	$this->form_validation->set_rules('PACCS_A0', 'PACCS_A0', 'required'); 
        	$this->form_validation->set_rules('PCTPENG', 'PCTPENG', 'required'); 
        	$this->form_validation->set_rules('OILCONT', 'OILCONT', 'required'); 
        	$this->form_validation->set_rules('OILOPER', 'OILOPER', 'required'); 
        	$this->form_validation->set_rules('AMAXV', 'AMAXV', 'required'); 
        	$this->form_validation->set_rules('FRIAMAX', 'FRIAMAX', 'required'); 
        	$this->form_validation->set_rules('NMTAMAX', 'NMTAMAX', 'required'); 
        	$this->form_validation->set_rules('RIAMAX', 'RIAMAX', 'required'); 
        	$this->form_validation->set_rules('AMAXRI', 'AMAXRI', 'required'); 
        	$this->form_validation->set_rules('WHEEL_DIAM', 'WHEEL_DIAM', 'required'); 
        	$this->form_validation->set_rules('TYRE_C0TC', 'TYRE_C0TC', 'required'); 
        	$this->form_validation->set_rules('TYRE_CTCTE', 'TYRE_CTCTE', 'required'); 
        	$this->form_validation->set_rules('TYRE_CTCON', 'TYRE_CTCON', 'required'); 
        	$this->form_validation->set_rules('TYRE_VOL', 'TYRE_VOL', 'required'); 
        	$this->form_validation->set_rules('PARTS_A0', 'PARTS_A0', 'required'); 
        	$this->form_validation->set_rules('PARTS_A1', 'PARTS_A1', 'required'); 
        	$this->form_validation->set_rules('PARTS_KP', 'PARTS_KP', 'required'); 
        	$this->form_validation->set_rules('RI_SHAPE', 'RI_SHAPE', 'required'); 
        	$this->form_validation->set_rules('RIMIN', 'RIMIN', 'required'); 
        	$this->form_validation->set_rules('CPCON', 'CPCON', 'required'); 
        	$this->form_validation->set_rules('PARTS_K0PC', 'PARTS_K0PC', 'required'); 
        	$this->form_validation->set_rules('PARTS_K1PC', 'PARTS_K1PC', 'required'); 
        	$this->form_validation->set_rules('LAB_A0', 'LAB_A0', 'required'); 
        	$this->form_validation->set_rules('LAB_A1', 'LAB_A1', 'required'); 
        	$this->form_validation->set_rules('LAB_K0LH', 'LAB_K0LH', 'required'); 
        	$this->form_validation->set_rules('LAB_K1LH', 'LAB_K1LH', 'required'); 
        	$this->form_validation->set_rules('OPTLIFE_A0', 'OPTLIFE_A0', 'required'); 
        	$this->form_validation->set_rules('OPTLIFE_A1', 'OPTLIFE_A1', 'required'); 
        	$this->form_validation->set_rules('OPTLIFE_A2', 'OPTLIFE_A2', 'required'); 
        	$this->form_validation->set_rules('OPTLIFE_A3', 'OPTLIFE_A3', 'required'); 
        	$this->form_validation->set_rules('OPTLIFE_A4', 'OPTLIFE_A4', 'required'); 
        	$this->form_validation->set_rules('EM_CATCONVTR', 'EM_CATCONVTR', 'required'); 
        	$this->form_validation->set_rules('EN_FUELTYP', 'EN_FUELTYP', 'required'); 
        	$this->form_validation->set_rules('EN_PRODVEH', 'EN_PRODVEH', 'required'); 
        	$this->form_validation->set_rules('EN_PCTPART', 'EN_PCTPART', 'required'); 
        	$this->form_validation->set_rules('EN_PCTVEH', 'EN_PCTVEH', 'required'); 
        	$this->form_validation->set_rules('EN_TYREWGT', 'EN_TYREWGT', 'required'); 
        	$this->form_validation->set_rules('EN_TAREWGT', 'EN_TAREWGT', 'required'); 
        	$this->form_validation->set_rules('EN_TAREUNT', 'EN_TAREUNT', 'required'); 
        	$this->form_validation->set_rules('NM_WHEEL', 'NM_WHEEL', 'required'); 
        	$this->form_validation->set_rules('NM_PAYLOAD', 'NM_PAYLOAD', 'required'); 
        	$this->form_validation->set_rules('NM_VDESP', 'NM_VDESP', 'required'); 
        	$this->form_validation->set_rules('NM_VDESU', 'NM_VDESU', 'required'); 
        	$this->form_validation->set_rules('NM_A_RGH', 'NM_A_RGH', 'required'); 
        	$this->form_validation->set_rules('NM_CRGR', 'NM_CRGR', 'required'); 
        	$this->form_validation->set_rules('NM_A_GRD', 'NM_A_GRD', 'required'); 
        	$this->form_validation->set_rules('NM_A_RMC', 'NM_A_RMC', 'required'); 
        	$this->form_validation->set_rules('NM_B_RMC', 'NM_B_RMC', 'required'); 
        	$this->form_validation->set_rules('NM_KEF', 'NM_KEF', 'required'); 
        	$this->form_validation->set_rules('EUC_PSGR', 'EUC_PSGR', 'required'); 
        	$this->form_validation->set_rules('EUC_ENERGY', 'EUC_ENERGY', 'required'); 
        	$this->form_validation->set_rules('FUC_PSGR', 'FUC_PSGR', 'required'); 
        	$this->form_validation->set_rules('FUC_CARGO', 'FUC_CARGO', 'required'); 
        	$this->form_validation->set_rules('FUC_ENERGY', 'FUC_ENERGY', 'required'); 
        	$this->form_validation->set_rules('EMRAT_A0', 'EMRAT_A0', 'required'); 
        	$this->form_validation->set_rules('EMRAT_A1', 'EMRAT_A1', 'required'); 
        	$this->form_validation->set_rules('EMRAT_A2', 'EMRAT_A2', 'required'); 
        	$this->form_validation->set_rules('KPFAC', 'KPFAC', 'required'); 
        	$this->form_validation->set_rules('KPEA', 'KPEA', 'required'); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('VEH_NAME' => $this->input->post('VEH_NAME'),'CATEGORY' => $this->input->post('CATEGORY'),'BASE_TYPE' => $this->input->post('BASE_TYPE'),'CLASS' => $this->input->post('CLASS'),'LIFE_MODEL' => $this->input->post('LIFE_MODEL'),'PCSE' => $this->input->post('PCSE'),'NUM_WHEELS' => $this->input->post('NUM_WHEELS'),'NUM_AXLES' => $this->input->post('NUM_AXLES'),'TYRE_TYPE' => $this->input->post('TYRE_TYPE'),'TYRE_NR0' => $this->input->post('TYRE_NR0'),'TYRE_RREC' => $this->input->post('TYRE_RREC'),'AKM0' => $this->input->post('AKM0'),'HRWK0' => $this->input->post('HRWK0'),'LIFE0' => $this->input->post('LIFE0'),'PP' => $this->input->post('PP'),'PAX' => $this->input->post('PAX'),'W' => $this->input->post('W'),'WEIGHT_OP' => $this->input->post('WEIGHT_OP'),'WGT_UNIT' => $this->input->post('WGT_UNIT'),'ESAL' => $this->input->post('ESAL'),'EUC_INTRST' => $this->input->post('EUC_INTRST'),'FUC_INTRST' => $this->input->post('FUC_INTRST'),'AF' => $this->input->post('AF'),'CD' => $this->input->post('CD'),'CDMULT' => $this->input->post('CDMULT'),'CR_B_A0' => $this->input->post('CR_B_A0'),'CR_B_A1' => $this->input->post('CR_B_A1'),'CR_B_A2' => $this->input->post('CR_B_A2'),'PDRIVE' => $this->input->post('PDRIVE'),'PDRV_UNITS' => $this->input->post('PDRV_UNITS'),'PBRAKE' => $this->input->post('PBRAKE'),'PBRK_UNITS' => $this->input->post('PBRK_UNITS'),'PRAT' => $this->input->post('PRAT'),'PRAT_UNITS' => $this->input->post('PRAT_UNITS'),'FPLIM' => $this->input->post('FPLIM'),'B_VDES2' => $this->input->post('B_VDES2'),'B_VDES_A0' => $this->input->post('B_VDES_A0'),'B_VDES_A1' => $this->input->post('B_VDES_A1'),'B_VDES_A2' => $this->input->post('B_VDES_A2'),'B_VDES_CW1' => $this->input->post('B_VDES_CW1'),'B_VDES_CW2' => $this->input->post('B_VDES_CW2'),'C_VDES2' => $this->input->post('C_VDES2'),'C_VDES_A0' => $this->input->post('C_VDES_A0'),'C_VDES_A1' => $this->input->post('C_VDES_A1'),'C_VDES_A2' => $this->input->post('C_VDES_A2'),'C_VDES_CW1' => $this->input->post('C_VDES_CW1'),'C_VDES_CW2' => $this->input->post('C_VDES_CW2'),'U_VDES2' => $this->input->post('U_VDES2'),'U_VDES_A0' => $this->input->post('U_VDES_A0'),'U_VDES_A1' => $this->input->post('U_VDES_A1'),'U_VDES_A2' => $this->input->post('U_VDES_A2'),'U_VDES_CW1' => $this->input->post('U_VDES_CW1'),'U_VDES_CW2' => $this->input->post('U_VDES_CW2'),'VCURVE_A0' => $this->input->post('VCURVE_A0'),'VCURVE_A1' => $this->input->post('VCURVE_A1'),'VROUGH_A0' => $this->input->post('VROUGH_A0'),'ARVMAX' => $this->input->post('ARVMAX'),'SPEED_SIG' => $this->input->post('SPEED_SIG'),'SPEED_BETA' => $this->input->post('SPEED_BETA'),'COV' => $this->input->post('COV'),'CGR_A0' => $this->input->post('CGR_A0'),'CGR_A1' => $this->input->post('CGR_A1'),'CGR_A2' => $this->input->post('CGR_A2'),'RPM_A0' => $this->input->post('RPM_A0'),'RPM_A1' => $this->input->post('RPM_A1'),'RPM_A2' => $this->input->post('RPM_A2'),'RPM_A3' => $this->input->post('RPM_A3'),'RPM_IDLE' => $this->input->post('RPM_IDLE'),'IDLE_FUEL' => $this->input->post('IDLE_FUEL'),'ZETAB' => $this->input->post('ZETAB'),'EHP' => $this->input->post('EHP'),'EDT' => $this->input->post('EDT'),'PACCS_A0' => $this->input->post('PACCS_A0'),'PCTPENG' => $this->input->post('PCTPENG'),'OILCONT' => $this->input->post('OILCONT'),'OILOPER' => $this->input->post('OILOPER'),'AMAXV' => $this->input->post('AMAXV'),'FRIAMAX' => $this->input->post('FRIAMAX'),'NMTAMAX' => $this->input->post('NMTAMAX'),'RIAMAX' => $this->input->post('RIAMAX'),'AMAXRI' => $this->input->post('AMAXRI'),'WHEEL_DIAM' => $this->input->post('WHEEL_DIAM'),'TYRE_C0TC' => $this->input->post('TYRE_C0TC'),'TYRE_CTCTE' => $this->input->post('TYRE_CTCTE'),'TYRE_CTCON' => $this->input->post('TYRE_CTCON'),'TYRE_VOL' => $this->input->post('TYRE_VOL'),'PARTS_A0' => $this->input->post('PARTS_A0'),'PARTS_A1' => $this->input->post('PARTS_A1'),'PARTS_KP' => $this->input->post('PARTS_KP'),'RI_SHAPE' => $this->input->post('RI_SHAPE'),'RIMIN' => $this->input->post('RIMIN'),'CPCON' => $this->input->post('CPCON'),'PARTS_K0PC' => $this->input->post('PARTS_K0PC'),'PARTS_K1PC' => $this->input->post('PARTS_K1PC'),'LAB_A0' => $this->input->post('LAB_A0'),'LAB_A1' => $this->input->post('LAB_A1'),'LAB_K0LH' => $this->input->post('LAB_K0LH'),'LAB_K1LH' => $this->input->post('LAB_K1LH'),'OPTLIFE_A0' => $this->input->post('OPTLIFE_A0'),'OPTLIFE_A1' => $this->input->post('OPTLIFE_A1'),'OPTLIFE_A2' => $this->input->post('OPTLIFE_A2'),'OPTLIFE_A3' => $this->input->post('OPTLIFE_A3'),'OPTLIFE_A4' => $this->input->post('OPTLIFE_A4'),'EM_CATCONVTR' => $this->input->post('EM_CATCONVTR'),'EN_FUELTYP' => $this->input->post('EN_FUELTYP'),'EN_PRODVEH' => $this->input->post('EN_PRODVEH'),'EN_PCTPART' => $this->input->post('EN_PCTPART'),'EN_PCTVEH' => $this->input->post('EN_PCTVEH'),'EN_TYREWGT' => $this->input->post('EN_TYREWGT'),'EN_TAREWGT' => $this->input->post('EN_TAREWGT'),'EN_TAREUNT' => $this->input->post('EN_TAREUNT'),'NM_WHEEL' => $this->input->post('NM_WHEEL'),'NM_PAYLOAD' => $this->input->post('NM_PAYLOAD'),'NM_VDESP' => $this->input->post('NM_VDESP'),'NM_VDESU' => $this->input->post('NM_VDESU'),'NM_A_RGH' => $this->input->post('NM_A_RGH'),'NM_CRGR' => $this->input->post('NM_CRGR'),'NM_A_GRD' => $this->input->post('NM_A_GRD'),'NM_A_RMC' => $this->input->post('NM_A_RMC'),'NM_B_RMC' => $this->input->post('NM_B_RMC'),'NM_KEF' => $this->input->post('NM_KEF'),'EUC_PSGR' => $this->input->post('EUC_PSGR'),'EUC_ENERGY' => $this->input->post('EUC_ENERGY'),'FUC_PSGR' => $this->input->post('FUC_PSGR'),'FUC_CARGO' => $this->input->post('FUC_CARGO'),'FUC_ENERGY' => $this->input->post('FUC_ENERGY'),'EMRAT_A0' => $this->input->post('EMRAT_A0'),'EMRAT_A1' => $this->input->post('EMRAT_A1'),'EMRAT_A2' => $this->input->post('EMRAT_A2'),'KPFAC' => $this->input->post('KPFAC'),'KPEA' => $this->input->post('KPEA'),
                );
                //if the insert has returned true then we show the flash message
                if($this->veiculosdao->store_veiculos($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/veiculos/add';
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
        	$this->form_validation->set_rules('VEH_NAME', 'VEH_NAME', 'required');
        	$this->form_validation->set_rules('CATEGORY', 'CATEGORY', 'required');
        	$this->form_validation->set_rules('BASE_TYPE', 'BASE_TYPE', 'required');
        	$this->form_validation->set_rules('CLASS', 'CLASS', 'required');
        	$this->form_validation->set_rules('LIFE_MODEL', 'LIFE_MODEL', 'required');
        	$this->form_validation->set_rules('PCSE', 'PCSE', 'required');
        	$this->form_validation->set_rules('NUM_WHEELS', 'NUM_WHEELS', 'required');
        	$this->form_validation->set_rules('NUM_AXLES', 'NUM_AXLES', 'required');
        	$this->form_validation->set_rules('TYRE_TYPE', 'TYRE_TYPE', 'required');
        	$this->form_validation->set_rules('TYRE_NR0', 'TYRE_NR0', 'required');
        	$this->form_validation->set_rules('TYRE_RREC', 'TYRE_RREC', 'required');
        	$this->form_validation->set_rules('AKM0', 'AKM0', 'required');
        	$this->form_validation->set_rules('HRWK0', 'HRWK0', 'required');
        	$this->form_validation->set_rules('LIFE0', 'LIFE0', 'required');
        	$this->form_validation->set_rules('PP', 'PP', 'required');
        	$this->form_validation->set_rules('PAX', 'PAX', 'required');
        	$this->form_validation->set_rules('W', 'W', 'required');
        	$this->form_validation->set_rules('WEIGHT_OP', 'WEIGHT_OP', 'required');
        	$this->form_validation->set_rules('WGT_UNIT', 'WGT_UNIT', 'required');
        	$this->form_validation->set_rules('ESAL', 'ESAL', 'required');
        	$this->form_validation->set_rules('EUC_INTRST', 'EUC_INTRST', 'required');
        	$this->form_validation->set_rules('FUC_INTRST', 'FUC_INTRST', 'required');
        	$this->form_validation->set_rules('AF', 'AF', 'required');
        	$this->form_validation->set_rules('CD', 'CD', 'required');
        	$this->form_validation->set_rules('CDMULT', 'CDMULT', 'required');
        	$this->form_validation->set_rules('CR_B_A0', 'CR_B_A0', 'required');
        	$this->form_validation->set_rules('CR_B_A1', 'CR_B_A1', 'required');
        	$this->form_validation->set_rules('CR_B_A2', 'CR_B_A2', 'required');
        	$this->form_validation->set_rules('PDRIVE', 'PDRIVE', 'required');
        	$this->form_validation->set_rules('PDRV_UNITS', 'PDRV_UNITS', 'required');
        	$this->form_validation->set_rules('PBRAKE', 'PBRAKE', 'required');
        	$this->form_validation->set_rules('PBRK_UNITS', 'PBRK_UNITS', 'required');
        	$this->form_validation->set_rules('PRAT', 'PRAT', 'required');
        	$this->form_validation->set_rules('PRAT_UNITS', 'PRAT_UNITS', 'required');
        	$this->form_validation->set_rules('FPLIM', 'FPLIM', 'required');
        	$this->form_validation->set_rules('B_VDES2', 'B_VDES2', 'required');
        	$this->form_validation->set_rules('B_VDES_A0', 'B_VDES_A0', 'required');
        	$this->form_validation->set_rules('B_VDES_A1', 'B_VDES_A1', 'required');
        	$this->form_validation->set_rules('B_VDES_A2', 'B_VDES_A2', 'required');
        	$this->form_validation->set_rules('B_VDES_CW1', 'B_VDES_CW1', 'required');
        	$this->form_validation->set_rules('B_VDES_CW2', 'B_VDES_CW2', 'required');
        	$this->form_validation->set_rules('C_VDES2', 'C_VDES2', 'required');
        	$this->form_validation->set_rules('C_VDES_A0', 'C_VDES_A0', 'required');
        	$this->form_validation->set_rules('C_VDES_A1', 'C_VDES_A1', 'required');
        	$this->form_validation->set_rules('C_VDES_A2', 'C_VDES_A2', 'required');
        	$this->form_validation->set_rules('C_VDES_CW1', 'C_VDES_CW1', 'required');
        	$this->form_validation->set_rules('C_VDES_CW2', 'C_VDES_CW2', 'required');
        	$this->form_validation->set_rules('U_VDES2', 'U_VDES2', 'required');
        	$this->form_validation->set_rules('U_VDES_A0', 'U_VDES_A0', 'required');
        	$this->form_validation->set_rules('U_VDES_A1', 'U_VDES_A1', 'required');
        	$this->form_validation->set_rules('U_VDES_A2', 'U_VDES_A2', 'required');
        	$this->form_validation->set_rules('U_VDES_CW1', 'U_VDES_CW1', 'required');
        	$this->form_validation->set_rules('U_VDES_CW2', 'U_VDES_CW2', 'required');
        	$this->form_validation->set_rules('VCURVE_A0', 'VCURVE_A0', 'required');
        	$this->form_validation->set_rules('VCURVE_A1', 'VCURVE_A1', 'required');
        	$this->form_validation->set_rules('VROUGH_A0', 'VROUGH_A0', 'required');
        	$this->form_validation->set_rules('ARVMAX', 'ARVMAX', 'required');
        	$this->form_validation->set_rules('SPEED_SIG', 'SPEED_SIG', 'required');
        	$this->form_validation->set_rules('SPEED_BETA', 'SPEED_BETA', 'required');
        	$this->form_validation->set_rules('COV', 'COV', 'required');
        	$this->form_validation->set_rules('CGR_A0', 'CGR_A0', 'required');
        	$this->form_validation->set_rules('CGR_A1', 'CGR_A1', 'required');
        	$this->form_validation->set_rules('CGR_A2', 'CGR_A2', 'required');
        	$this->form_validation->set_rules('RPM_A0', 'RPM_A0', 'required');
        	$this->form_validation->set_rules('RPM_A1', 'RPM_A1', 'required');
        	$this->form_validation->set_rules('RPM_A2', 'RPM_A2', 'required');
        	$this->form_validation->set_rules('RPM_A3', 'RPM_A3', 'required');
        	$this->form_validation->set_rules('RPM_IDLE', 'RPM_IDLE', 'required');
        	$this->form_validation->set_rules('IDLE_FUEL', 'IDLE_FUEL', 'required');
        	$this->form_validation->set_rules('ZETAB', 'ZETAB', 'required');
        	$this->form_validation->set_rules('EHP', 'EHP', 'required');
        	$this->form_validation->set_rules('EDT', 'EDT', 'required');
        	$this->form_validation->set_rules('PACCS_A0', 'PACCS_A0', 'required');
        	$this->form_validation->set_rules('PCTPENG', 'PCTPENG', 'required');
        	$this->form_validation->set_rules('OILCONT', 'OILCONT', 'required');
        	$this->form_validation->set_rules('OILOPER', 'OILOPER', 'required');
        	$this->form_validation->set_rules('AMAXV', 'AMAXV', 'required');
        	$this->form_validation->set_rules('FRIAMAX', 'FRIAMAX', 'required');
        	$this->form_validation->set_rules('NMTAMAX', 'NMTAMAX', 'required');
        	$this->form_validation->set_rules('RIAMAX', 'RIAMAX', 'required');
        	$this->form_validation->set_rules('AMAXRI', 'AMAXRI', 'required');
        	$this->form_validation->set_rules('WHEEL_DIAM', 'WHEEL_DIAM', 'required');
        	$this->form_validation->set_rules('TYRE_C0TC', 'TYRE_C0TC', 'required');
        	$this->form_validation->set_rules('TYRE_CTCTE', 'TYRE_CTCTE', 'required');
        	$this->form_validation->set_rules('TYRE_CTCON', 'TYRE_CTCON', 'required');
        	$this->form_validation->set_rules('TYRE_VOL', 'TYRE_VOL', 'required');
        	$this->form_validation->set_rules('PARTS_A0', 'PARTS_A0', 'required');
        	$this->form_validation->set_rules('PARTS_A1', 'PARTS_A1', 'required');
        	$this->form_validation->set_rules('PARTS_KP', 'PARTS_KP', 'required');
        	$this->form_validation->set_rules('RI_SHAPE', 'RI_SHAPE', 'required');
        	$this->form_validation->set_rules('RIMIN', 'RIMIN', 'required');
        	$this->form_validation->set_rules('CPCON', 'CPCON', 'required');
        	$this->form_validation->set_rules('PARTS_K0PC', 'PARTS_K0PC', 'required');
        	$this->form_validation->set_rules('PARTS_K1PC', 'PARTS_K1PC', 'required');
        	$this->form_validation->set_rules('LAB_A0', 'LAB_A0', 'required');
        	$this->form_validation->set_rules('LAB_A1', 'LAB_A1', 'required');
        	$this->form_validation->set_rules('LAB_K0LH', 'LAB_K0LH', 'required');
        	$this->form_validation->set_rules('LAB_K1LH', 'LAB_K1LH', 'required');
        	$this->form_validation->set_rules('OPTLIFE_A0', 'OPTLIFE_A0', 'required');
        	$this->form_validation->set_rules('OPTLIFE_A1', 'OPTLIFE_A1', 'required');
        	$this->form_validation->set_rules('OPTLIFE_A2', 'OPTLIFE_A2', 'required');
        	$this->form_validation->set_rules('OPTLIFE_A3', 'OPTLIFE_A3', 'required');
        	$this->form_validation->set_rules('OPTLIFE_A4', 'OPTLIFE_A4', 'required');
        	$this->form_validation->set_rules('EM_CATCONVTR', 'EM_CATCONVTR', 'required');
        	$this->form_validation->set_rules('EN_FUELTYP', 'EN_FUELTYP', 'required');
        	$this->form_validation->set_rules('EN_PRODVEH', 'EN_PRODVEH', 'required');
        	$this->form_validation->set_rules('EN_PCTPART', 'EN_PCTPART', 'required');
        	$this->form_validation->set_rules('EN_PCTVEH', 'EN_PCTVEH', 'required');
        	$this->form_validation->set_rules('EN_TYREWGT', 'EN_TYREWGT', 'required');
        	$this->form_validation->set_rules('EN_TAREWGT', 'EN_TAREWGT', 'required');
        	$this->form_validation->set_rules('EN_TAREUNT', 'EN_TAREUNT', 'required');
        	$this->form_validation->set_rules('NM_WHEEL', 'NM_WHEEL', 'required');
        	$this->form_validation->set_rules('NM_PAYLOAD', 'NM_PAYLOAD', 'required');
        	$this->form_validation->set_rules('NM_VDESP', 'NM_VDESP', 'required');
        	$this->form_validation->set_rules('NM_VDESU', 'NM_VDESU', 'required');
        	$this->form_validation->set_rules('NM_A_RGH', 'NM_A_RGH', 'required');
        	$this->form_validation->set_rules('NM_CRGR', 'NM_CRGR', 'required');
        	$this->form_validation->set_rules('NM_A_GRD', 'NM_A_GRD', 'required');
        	$this->form_validation->set_rules('NM_A_RMC', 'NM_A_RMC', 'required');
        	$this->form_validation->set_rules('NM_B_RMC', 'NM_B_RMC', 'required');
        	$this->form_validation->set_rules('NM_KEF', 'NM_KEF', 'required');
        	$this->form_validation->set_rules('EUC_PSGR', 'EUC_PSGR', 'required');
        	$this->form_validation->set_rules('EUC_ENERGY', 'EUC_ENERGY', 'required');
        	$this->form_validation->set_rules('FUC_PSGR', 'FUC_PSGR', 'required');
        	$this->form_validation->set_rules('FUC_CARGO', 'FUC_CARGO', 'required');
        	$this->form_validation->set_rules('FUC_ENERGY', 'FUC_ENERGY', 'required');
        	$this->form_validation->set_rules('EMRAT_A0', 'EMRAT_A0', 'required');
        	$this->form_validation->set_rules('EMRAT_A1', 'EMRAT_A1', 'required');
        	$this->form_validation->set_rules('EMRAT_A2', 'EMRAT_A2', 'required');
        	$this->form_validation->set_rules('KPFAC', 'KPFAC', 'required');
        	$this->form_validation->set_rules('KPEA', 'KPEA', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
        	'VEH_NAME' => $this->input->post('VEH_NAME'),
        	'CATEGORY' => $this->input->post('CATEGORY'),
        	'BASE_TYPE' => $this->input->post('BASE_TYPE'),
        	'CLASS' => $this->input->post('CLASS'),
        	'LIFE_MODEL' => $this->input->post('LIFE_MODEL'),
        	'PCSE' => $this->input->post('PCSE'),
        	'NUM_WHEELS' => $this->input->post('NUM_WHEELS'),
        	'NUM_AXLES' => $this->input->post('NUM_AXLES'),
        	'TYRE_TYPE' => $this->input->post('TYRE_TYPE'),
        	'TYRE_NR0' => $this->input->post('TYRE_NR0'),
        	'TYRE_RREC' => $this->input->post('TYRE_RREC'),
        	'AKM0' => $this->input->post('AKM0'),
        	'HRWK0' => $this->input->post('HRWK0'),
        	'LIFE0' => $this->input->post('LIFE0'),
        	'PP' => $this->input->post('PP'),
        	'PAX' => $this->input->post('PAX'),
        	'W' => $this->input->post('W'),
        	'WEIGHT_OP' => $this->input->post('WEIGHT_OP'),
        	'WGT_UNIT' => $this->input->post('WGT_UNIT'),
        	'ESAL' => $this->input->post('ESAL'),
        	'EUC_INTRST' => $this->input->post('EUC_INTRST'),
        	'FUC_INTRST' => $this->input->post('FUC_INTRST'),
        	'AF' => $this->input->post('AF'),
        	'CD' => $this->input->post('CD'),
        	'CDMULT' => $this->input->post('CDMULT'),
        	'CR_B_A0' => $this->input->post('CR_B_A0'),
        	'CR_B_A1' => $this->input->post('CR_B_A1'),
        	'CR_B_A2' => $this->input->post('CR_B_A2'),
        	'PDRIVE' => $this->input->post('PDRIVE'),
        	'PDRV_UNITS' => $this->input->post('PDRV_UNITS'),
        	'PBRAKE' => $this->input->post('PBRAKE'),
        	'PBRK_UNITS' => $this->input->post('PBRK_UNITS'),
        	'PRAT' => $this->input->post('PRAT'),
        	'PRAT_UNITS' => $this->input->post('PRAT_UNITS'),
        	'FPLIM' => $this->input->post('FPLIM'),
        	'B_VDES2' => $this->input->post('B_VDES2'),
        	'B_VDES_A0' => $this->input->post('B_VDES_A0'),
        	'B_VDES_A1' => $this->input->post('B_VDES_A1'),
        	'B_VDES_A2' => $this->input->post('B_VDES_A2'),
        	'B_VDES_CW1' => $this->input->post('B_VDES_CW1'),
        	'B_VDES_CW2' => $this->input->post('B_VDES_CW2'),
        	'C_VDES2' => $this->input->post('C_VDES2'),
        	'C_VDES_A0' => $this->input->post('C_VDES_A0'),
        	'C_VDES_A1' => $this->input->post('C_VDES_A1'),
        	'C_VDES_A2' => $this->input->post('C_VDES_A2'),
        	'C_VDES_CW1' => $this->input->post('C_VDES_CW1'),
        	'C_VDES_CW2' => $this->input->post('C_VDES_CW2'),
        	'U_VDES2' => $this->input->post('U_VDES2'),
        	'U_VDES_A0' => $this->input->post('U_VDES_A0'),
        	'U_VDES_A1' => $this->input->post('U_VDES_A1'),
        	'U_VDES_A2' => $this->input->post('U_VDES_A2'),
        	'U_VDES_CW1' => $this->input->post('U_VDES_CW1'),
        	'U_VDES_CW2' => $this->input->post('U_VDES_CW2'),
        	'VCURVE_A0' => $this->input->post('VCURVE_A0'),
        	'VCURVE_A1' => $this->input->post('VCURVE_A1'),
        	'VROUGH_A0' => $this->input->post('VROUGH_A0'),
        	'ARVMAX' => $this->input->post('ARVMAX'),
        	'SPEED_SIG' => $this->input->post('SPEED_SIG'),
        	'SPEED_BETA' => $this->input->post('SPEED_BETA'),
        	'COV' => $this->input->post('COV'),
        	'CGR_A0' => $this->input->post('CGR_A0'),
        	'CGR_A1' => $this->input->post('CGR_A1'),
        	'CGR_A2' => $this->input->post('CGR_A2'),
        	'RPM_A0' => $this->input->post('RPM_A0'),
        	'RPM_A1' => $this->input->post('RPM_A1'),
        	'RPM_A2' => $this->input->post('RPM_A2'),
        	'RPM_A3' => $this->input->post('RPM_A3'),
        	'RPM_IDLE' => $this->input->post('RPM_IDLE'),
        	'IDLE_FUEL' => $this->input->post('IDLE_FUEL'),
        	'ZETAB' => $this->input->post('ZETAB'),
        	'EHP' => $this->input->post('EHP'),
        	'EDT' => $this->input->post('EDT'),
        	'PACCS_A0' => $this->input->post('PACCS_A0'),
        	'PCTPENG' => $this->input->post('PCTPENG'),
        	'OILCONT' => $this->input->post('OILCONT'),
        	'OILOPER' => $this->input->post('OILOPER'),
        	'AMAXV' => $this->input->post('AMAXV'),
        	'FRIAMAX' => $this->input->post('FRIAMAX'),
        	'NMTAMAX' => $this->input->post('NMTAMAX'),
        	'RIAMAX' => $this->input->post('RIAMAX'),
        	'AMAXRI' => $this->input->post('AMAXRI'),
        	'WHEEL_DIAM' => $this->input->post('WHEEL_DIAM'),
        	'TYRE_C0TC' => $this->input->post('TYRE_C0TC'),
        	'TYRE_CTCTE' => $this->input->post('TYRE_CTCTE'),
        	'TYRE_CTCON' => $this->input->post('TYRE_CTCON'),
        	'TYRE_VOL' => $this->input->post('TYRE_VOL'),
        	'PARTS_A0' => $this->input->post('PARTS_A0'),
        	'PARTS_A1' => $this->input->post('PARTS_A1'),
        	'PARTS_KP' => $this->input->post('PARTS_KP'),
        	'RI_SHAPE' => $this->input->post('RI_SHAPE'),
        	'RIMIN' => $this->input->post('RIMIN'),
        	'CPCON' => $this->input->post('CPCON'),
        	'PARTS_K0PC' => $this->input->post('PARTS_K0PC'),
        	'PARTS_K1PC' => $this->input->post('PARTS_K1PC'),
        	'LAB_A0' => $this->input->post('LAB_A0'),
        	'LAB_A1' => $this->input->post('LAB_A1'),
        	'LAB_K0LH' => $this->input->post('LAB_K0LH'),
        	'LAB_K1LH' => $this->input->post('LAB_K1LH'),
        	'OPTLIFE_A0' => $this->input->post('OPTLIFE_A0'),
        	'OPTLIFE_A1' => $this->input->post('OPTLIFE_A1'),
        	'OPTLIFE_A2' => $this->input->post('OPTLIFE_A2'),
        	'OPTLIFE_A3' => $this->input->post('OPTLIFE_A3'),
        	'OPTLIFE_A4' => $this->input->post('OPTLIFE_A4'),
        	'EM_CATCONVTR' => $this->input->post('EM_CATCONVTR'),
        	'EN_FUELTYP' => $this->input->post('EN_FUELTYP'),
        	'EN_PRODVEH' => $this->input->post('EN_PRODVEH'),
        	'EN_PCTPART' => $this->input->post('EN_PCTPART'),
        	'EN_PCTVEH' => $this->input->post('EN_PCTVEH'),
        	'EN_TYREWGT' => $this->input->post('EN_TYREWGT'),
        	'EN_TAREWGT' => $this->input->post('EN_TAREWGT'),
        	'EN_TAREUNT' => $this->input->post('EN_TAREUNT'),
        	'NM_WHEEL' => $this->input->post('NM_WHEEL'),
        	'NM_PAYLOAD' => $this->input->post('NM_PAYLOAD'),
        	'NM_VDESP' => $this->input->post('NM_VDESP'),
        	'NM_VDESU' => $this->input->post('NM_VDESU'),
        	'NM_A_RGH' => $this->input->post('NM_A_RGH'),
        	'NM_CRGR' => $this->input->post('NM_CRGR'),
        	'NM_A_GRD' => $this->input->post('NM_A_GRD'),
        	'NM_A_RMC' => $this->input->post('NM_A_RMC'),
        	'NM_B_RMC' => $this->input->post('NM_B_RMC'),
        	'NM_KEF' => $this->input->post('NM_KEF'),
        	'EUC_PSGR' => $this->input->post('EUC_PSGR'),
        	'EUC_ENERGY' => $this->input->post('EUC_ENERGY'),
        	'FUC_PSGR' => $this->input->post('FUC_PSGR'),
        	'FUC_CARGO' => $this->input->post('FUC_CARGO'),
        	'FUC_ENERGY' => $this->input->post('FUC_ENERGY'),
        	'EMRAT_A0' => $this->input->post('EMRAT_A0'),
        	'EMRAT_A1' => $this->input->post('EMRAT_A1'),
        	'EMRAT_A2' => $this->input->post('EMRAT_A2'),
        	'KPFAC' => $this->input->post('KPFAC'),
        	'KPEA' => $this->input->post('KPEA'),                    
                );
                //if the insert has returned true then we show the flash message
                if($this->veiculosdao->update_veiculos($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/veiculos/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['veiculos'] = $this->veiculosdao->get_veiculos_by_id($id);
        //load the view
        $data['main_content'] = 'admin/veiculos/edit';
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
        $this->veiculosdao->delete_veiculos($id);
        redirect('admin/veiculos');
    }//edit    			
    	}