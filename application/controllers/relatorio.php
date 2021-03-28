<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class resumo_sondagens extends App_controller {
	const VIEW_FOLDER = 'admin/relatorio';
    public function __construct()
    {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {

    }//index    

	public function solucoes()
    {
    
    
	                				
	    $data['main_content'] = 'admin/resumo_sondagens/resumo_list';
	    $this->load->view('includes/template', $data);
    
	}//index

	public function resumo()
	{
	
		$id = $this->uri->segment(4);
		
		$this->load->model('sondagem_filesdao');
		$files = new sondagem_filesdao(); 
		 
		$data['resumo_sondagens'] = $this->resumo_sondagensdao->get_resumo_sondagens_by_id_sondagem($id);
		$data['id_sondagem'] = $id;
		$data['files']	= $files->get_sondagem_files_by_id_sondagem($id); 
		 
		$data['main_content'] = 'admin/resumo_sondagens/resumo_out';
		$this->load->view('includes/template', $data);
	
	}//index
	
    
public function add()
    {
    	$id = $this->uri->segment(4);
    	
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('id_sondagem', 'id_sondagem', 'required'); 
        	$this->form_validation->set_rules('titulo', 'titulo', ''); 
        	$this->form_validation->set_rules('uf', 'uf', 'required'); 
        	$this->form_validation->set_rules('rodovia', 'rodovia', 'required'); 
        	$this->form_validation->set_rules('furo', 'furo', ''); 
        	$this->form_validation->set_rules('lado', 'lado', ''); 
        	$this->form_validation->set_rules('lat', 'lat', ''); 
        	$this->form_validation->set_rules('long', 'long', ''); 
        	$this->form_validation->set_rules('mm', 'mm', ''); 
        	$this->form_validation->set_rules('50_8', '50_8', ''); 
        	$this->form_validation->set_rules('38_1', '38_1', ''); 
        	$this->form_validation->set_rules('25_4', '25_4', ''); 
        	$this->form_validation->set_rules('19_1', '19_1', ''); 
        	$this->form_validation->set_rules('9_5', '9_5', ''); 
        	$this->form_validation->set_rules('4_8', '4_8', ''); 
        	$this->form_validation->set_rules('2', '2', ''); 
        	$this->form_validation->set_rules('1_2', '1_2', ''); 
        	$this->form_validation->set_rules('0_59', '0_59', ''); 
        	$this->form_validation->set_rules('0_42', '0_42', ''); 
        	$this->form_validation->set_rules('0_30', '0_30', ''); 
        	$this->form_validation->set_rules('0_15', '0_15', ''); 
        	$this->form_validation->set_rules('0_074', '0_074', ''); 
        	$this->form_validation->set_rules('silte', 'silte', ''); 
        	$this->form_validation->set_rules('argila', 'argila', ''); 
        	$this->form_validation->set_rules('solo', 'solo', ''); 
        	$this->form_validation->set_rules('ll', 'll', ''); 
        	$this->form_validation->set_rules('lp', 'lp', ''); 
        	$this->form_validation->set_rules('ip', 'ip', ''); 
        	$this->form_validation->set_rules('ig', 'ig', ''); 
        	$this->form_validation->set_rules('hrb', 'hrb', ''); 
        	$this->form_validation->set_rules('dmax', 'dmax', ''); 
        	$this->form_validation->set_rules('wot', 'wot', ''); 
        	$this->form_validation->set_rules('exp', 'exp', ''); 
        	$this->form_validation->set_rules('eng', 'eng', ''); 
        	$this->form_validation->set_rules('isc', 'isc', ''); 
        	$this->form_validation->set_rules('densidade_natural', 'densidade_natural', ''); 
        	$this->form_validation->set_rules('wcampo', 'wcampo', ''); 
        	$this->form_validation->set_rules('areia', 'areia', ''); 
        	$this->form_validation->set_rules('nivel_agua', 'nivel_agua', ''); 
        	$this->form_validation->set_rules('ensaio_triaxial', 'ensaio_triaxial', ''); 
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array('id_sondagem' => $this->input->post('id_sondagem'),'titulo' => $this->input->post('titulo'),'uf' => $this->input->post('uf'),'rodovia' => $this->input->post('rodovia'),'furo' => $this->input->post('furo'),'lado' => $this->input->post('lado'),'lat' => $this->input->post('lat'),'long' => $this->input->post('long'),'mm' => $this->input->post('mm'),'50_8' => $this->input->post('50_8'),'38_1' => $this->input->post('38_1'),'25_4' => $this->input->post('25_4'),'19_1' => $this->input->post('19_1'),'9_5' => $this->input->post('9_5'),'4_8' => $this->input->post('4_8'),'2' => $this->input->post('2'),'1_2' => $this->input->post('1_2'),'0_59' => $this->input->post('0_59'),'0_42' => $this->input->post('0_42'),'0_30' => $this->input->post('0_30'),'0_15' => $this->input->post('0_15'),'0_074' => $this->input->post('0_074'),'silte' => $this->input->post('silte'),'argila' => $this->input->post('argila'),'solo' => $this->input->post('solo'),'ll' => $this->input->post('ll'),'lp' => $this->input->post('lp'),'ip' => $this->input->post('ip'),'ig' => $this->input->post('ig'),'hrb' => $this->input->post('hrb'),'dmax' => $this->input->post('dmax'),'wot' => $this->input->post('wot'),'exp' => $this->input->post('exp'),'eng' => $this->input->post('eng'),'isc' => $this->input->post('isc'),'densidade_natural' => $this->input->post('densidade_natural'),'wcampo' => $this->input->post('wcampo'),'areia' => $this->input->post('areia'),'nivel_agua' => $this->input->post('nivel_agua'),'ensaio_triaxial' => $this->input->post('ensaio_triaxial'),
                );
                //if the insert has returned true then we show the flash message
                if($this->resumo_sondagensdao->store_resumo_sondagem($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        $data['id_sondagem'] = $id;
        //load the view
        $data['main_content'] = 'admin/resumo_sondagens/add';
        $this->load->view('includes/template', $data);  
    }       
    			
    	
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
        $id_sondagem = $this->uri->segment(5);
        
        $data['id_sondagem'] = $id_sondagem;
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
        	$this->form_validation->set_rules('id_sondagem', 'id_sondagem', 'required');
        	$this->form_validation->set_rules('titulo', 'titulo', '');
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('rodovia', 'rodovia', 'required');
        	$this->form_validation->set_rules('furo', 'furo', '');
        	$this->form_validation->set_rules('lado', 'lado', '');
        	$this->form_validation->set_rules('lat', 'lat', '');
        	$this->form_validation->set_rules('long', 'long', '');
        	$this->form_validation->set_rules('mm', 'mm', '');
        	$this->form_validation->set_rules('50_8', '50_8', '');
        	$this->form_validation->set_rules('38_1', '38_1', '');
        	$this->form_validation->set_rules('25_4', '25_4', '');
        	$this->form_validation->set_rules('19_1', '19_1', '');
        	$this->form_validation->set_rules('9_5', '9_5', '');
        	$this->form_validation->set_rules('4_8', '4_8', '');
        	$this->form_validation->set_rules('2', '2', '');
        	$this->form_validation->set_rules('1_2', '1_2', '');
        	$this->form_validation->set_rules('0_59', '0_59', '');
        	$this->form_validation->set_rules('0_42', '0_42', '');
        	$this->form_validation->set_rules('0_30', '0_30', '');
        	$this->form_validation->set_rules('0_15', '0_15', '');
        	$this->form_validation->set_rules('0_074', '0_074', '');
        	$this->form_validation->set_rules('silte', 'silte', '');
        	$this->form_validation->set_rules('argila', 'argila', '');
        	$this->form_validation->set_rules('solo', 'solo', '');
        	$this->form_validation->set_rules('ll', 'll', '');
        	$this->form_validation->set_rules('lp', 'lp', '');
        	$this->form_validation->set_rules('ip', 'ip', '');
        	$this->form_validation->set_rules('ig', 'ig', '');
        	$this->form_validation->set_rules('hrb', 'hrb', '');
        	$this->form_validation->set_rules('dmax', 'dmax', '');
        	$this->form_validation->set_rules('wot', 'wot', '');
        	$this->form_validation->set_rules('exp', 'exp', '');
        	$this->form_validation->set_rules('eng', 'eng', '');
        	$this->form_validation->set_rules('isc', 'isc', '');
        	$this->form_validation->set_rules('densidade_natural', 'densidade_natural', '');
        	$this->form_validation->set_rules('wcampo', 'wcampo', '');
        	$this->form_validation->set_rules('areia', 'areia', '');
        	$this->form_validation->set_rules('nivel_agua', 'nivel_agua', '');
        	$this->form_validation->set_rules('ensaio_triaxial', 'ensaio_triaxial', '');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
			        	'id_sondagem' => $this->input->post('id_sondagem'),
			        	'titulo' => $this->input->post('titulo'),
			        	'uf' => $this->input->post('uf'),
			        	'rodovia' => $this->input->post('rodovia'),
			        	'furo' => $this->input->post('furo'),
			        	'lado' => $this->input->post('lado'),
			        	'lat' => $this->input->post('lat'),
			        	'long' => $this->input->post('long'),
			        	'mm' => $this->input->post('mm'),
			        	'50_8' => $this->input->post('50_8'),
			        	'38_1' => $this->input->post('38_1'),
			        	'25_4' => $this->input->post('25_4'),
			        	'19_1' => $this->input->post('19_1'),
			        	'9_5' => $this->input->post('9_5'),
			        	'4_8' => $this->input->post('4_8'),
			        	'2' => $this->input->post('2'),
			        	'1_2' => $this->input->post('1_2'),
			        	'0_59' => $this->input->post('0_59'),
			        	'0_42' => $this->input->post('0_42'),
			        	'0_30' => $this->input->post('0_30'),
			        	'0_15' => $this->input->post('0_15'),
			        	'0_074' => $this->input->post('0_074'),
			        	'silte' => $this->input->post('silte'),
			        	'argila' => $this->input->post('argila'),
			        	'solo' => $this->input->post('solo'),
			        	'll' => $this->input->post('ll'),
			        	'lp' => $this->input->post('lp'),
			        	'ip' => $this->input->post('ip'),
			        	'ig' => $this->input->post('ig'),
			        	'hrb' => $this->input->post('hrb'),
			        	'dmax' => $this->input->post('dmax'),
			        	'wot' => $this->input->post('wot'),
			        	'exp' => $this->input->post('exp'),
			        	'eng' => $this->input->post('eng'),
			        	'isc' => $this->input->post('isc'),
			        	'densidade_natural' => $this->input->post('densidade_natural'),
			        	'wcampo' => $this->input->post('wcampo'),
			        	'areia' => $this->input->post('areia'),
			        	'nivel_agua' => $this->input->post('nivel_agua'),
			        	'ensaio_triaxial' => $this->input->post('ensaio_triaxial'),                    
                );
                //if the insert has returned true then we show the flash message
                if($this->resumo_sondagensdao->update_resumo_sondagem($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/resumo_sondagens/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['resumo_sondagem'] = $this->resumo_sondagensdao->get_resumo_sondagem_by_id($id);
        //load the view
        $data['main_content'] = 'admin/resumo_sondagens/edit';
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
        $this->resumo_sondagensdao->delete_resumo_sondagem($id);
        redirect('admin/resumo_sondagens');
    }//edit    			
    	}