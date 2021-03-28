<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class obras extends App_controller {

	const VIEW_FOLDER = 'admin/obras';
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('obrasdao');
        $this->load->library('gcharts');

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

        $config['base_url'] = base_url().'admin/obras';
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
            $data['count_products']= $this->obrasdao->count_obras($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['obras'] = $this->obrasdao->get_obras($search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['obras'] = $this->obrasdao->get_obras($search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['obras'] = $this->obrasdao->get_obras('', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['obras'] = $this->obrasdao->get_obras('', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['obra_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products']= $this->obrasdao->count_obras();
            $data['obras'] = $this->obrasdao->get_obras('', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/obras/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	
	public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('id_classe_obras', 'id_classe_obras', 'required');
        	//$this->form_validation->set_rules('id_tipo_obras', 'id_tipo_obras', 'required');
        	$this->form_validation->set_rules('tipos', 'tipos', 'required');
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('br', 'br', 'required');
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required');
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required');
        	$this->form_validation->set_rules('km_ini', 'km_ini', 'required');
        	$this->form_validation->set_rules('km_fim', 'km_fim', 'required');
        	$this->form_validation->set_rules('vdm_s', 'vdm_s', 'required');
        	$this->form_validation->set_rules('vdm_c', 'vdm_c', 'required');
        	$this->form_validation->set_rules('ano_ref_vdm', 'ano_ref_vdm', 'required');
        	$this->form_validation->set_rules('taxa_crescimento', 'taxa_crescimento', 'required');
        	$this->form_validation->set_rules('custo', 'custo');
        	$this->form_validation->set_rules('lat_long_ini', 'lat_long_ini');
        	$this->form_validation->set_rules('lat_long_fim', 'lat_long_fim');
        	$this->form_validation->set_rules('descricao', 'descricao');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	$tipoList['tipos'] = $this->input->post('tipos');
            	
                $data_to_store = array(
                		'id_classe_obras' => $this->input->post('id_classe_obras'),
                		'id_tipo_obras' => $this->input->post('id_tipo_obras'),
                		'uf' => $this->input->post('uf'),
                		'br' => $this->input->post('br'),
                		'data_ini' => $this->input->post('data_ini'),
                		'data_fim' => $this->input->post('data_fim'),
                		'km_ini' => $this->input->post('km_ini'),
                		'km_fim' => $this->input->post('km_fim'),
                		'vdm_s' => $this->input->post('vdm_s'),
                		'vdm_c' => $this->input->post('vdm_c'),
                		'ano_ref_vdm' => $this->input->post('ano_ref_vdm'),
                		'taxa_crescimento' => $this->input->post('taxa_crescimento'),
                		'custo' => $this->input->post('custo'),
                		'lat_long_ini' => $this->input->post('lat_long_ini'),
                		'lat_long_fim' => $this->input->post('lat_long_fim'),
                		'descricao' => $this->input->post('descricao'),
                		'projeto' => $this->input->post('projeto'),
                		'tipos' => $tipoList['tipos']
                );
                //if the insert has returned true then we show the flash message
                if($this->obrasdao->store_obra($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        
        $this->load->model('classe_obrasdao');
        $classeObras = new classe_obrasdao();        
        $data['id_classe_obras'] = $classeObras->get_classe_obras();
        
        $this->load->model('tipo_obrasdao');
        $tipoObras = new tipo_obrasdao();
        $data['tipos'] = $tipoObras->get_tipo_obras(null, 'unidade, descricao');
        
        //load the view
        $data['main_content'] = 'admin/obras/add';
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
        	$this->form_validation->set_rules('id_classe_obras', 'id_classe_obras', 'required');
        	//$this->form_validation->set_rules('id_tipo_obras', 'id_tipo_obras', 'required');
        	$this->form_validation->set_rules('tipos', 'tipos', 'required');
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('br', 'br', 'required');
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required');
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required');
        	$this->form_validation->set_rules('km_ini', 'km_ini', 'required');
        	$this->form_validation->set_rules('km_fim', 'km_fim', 'required');
        	$this->form_validation->set_rules('vdm_s', 'vdm_s', 'required');
        	$this->form_validation->set_rules('vdm_c', 'vdm_c', 'required');
        	$this->form_validation->set_rules('ano_ref_vdm', 'ano_ref_vdm', 'required');
        	$this->form_validation->set_rules('taxa_crescimento', 'taxa_crescimento', 'required');
        	$this->form_validation->set_rules('custo', 'custo' );
        	$this->form_validation->set_rules('lat_long_ini', 'lat_long_ini');
        	$this->form_validation->set_rules('lat_long_fim', 'lat_long_fim');
        	$this->form_validation->set_rules('descricao', 'descricao');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	$tipoList['tipos'] = $this->input->post('tipos');
            	
                 $data_to_store = array(
		        	'id_classe_obras' => $this->input->post('id_classe_obras'),
		        	'id_tipo_obras' => $this->input->post('id_tipo_obras'),
		        	'uf' => $this->input->post('uf'),
		        	'br' => $this->input->post('br'),
		        	'data_ini' => $this->input->post('data_ini'),
		        	'data_fim' => $this->input->post('data_fim'),
		        	'km_ini' => $this->input->post('km_ini'),
		        	'km_fim' => $this->input->post('km_fim'),
		            'vdm_s' => $this->input->post('vdm_s'),
		            'vdm_c' => $this->input->post('vdm_c'),
		            'ano_ref_vdm' => $this->input->post('ano_ref_vdm'),
		            'taxa_crescimento' => $this->input->post('taxa_crescimento'),
		            'custo' => $this->input->post('custo'),                 		
		        	'lat_long_ini' => $this->input->post('lat_long_ini'),
		        	'lat_long_fim' => $this->input->post('lat_long_fim'),
                 	'descricao' => $this->input->post('descricao'),
                 	'projeto' => $this->input->post('projeto'),
                 	'tipos' =>	$tipoList['tipos']
                );
                //if the insert has returned true then we show the flash message
                if($this->obrasdao->update_obra($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/obras/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        $this->load->model('classe_obrasdao');
        $classeObras = new classe_obrasdao();
        $data['id_classe_obras'] = $classeObras->get_classe_obras();
        
        $this->load->model('tipo_obrasdao');
        $tipoObras = new tipo_obrasdao();
        $data['id_tipo_obras'] = $tipoObras->get_tipo_obras();
        $data['tipos'] = $this->obrasdao->get_tipos_by_obra_id($id);
        
        
        //product data 
        $data['obra'] = $this->obrasdao->get_obra_by_id($id);
        //load the view
        $data['main_content'] = 'admin/obras/edit';
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
        $this->obrasdao->delete_obra($id);
        redirect('admin/obras');
    }//edit    			

    public function obras_acidente()
    {
    
    	//all the posts sent by the view
    	$search_string = $this->input->post('search_string');
    	$order = $this->input->post('order');
    	$order_type = $this->input->post('order_type');
    
    	//pagination settings
    	$config['per_page'] = 30;
    
    	$config['base_url'] = base_url().'admin/obras';
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
    		$data['count_products']= $this->obrasdao->count_obras($search_string, $order);
    		$config['total_rows'] = $data['count_products'];
    
    		//fetch sql data into arrays
    		if($search_string){
    			if($order){
    				$data['obras'] = $this->obrasdao->get_obras($search_string, $order, $order_type, $config['per_page'],$limit_end);
    			}else{
    				$data['obras'] = $this->obrasdao->get_obras($search_string, '', $order_type, $config['per_page'],$limit_end);
    			}
    		}else{
    			if($order){
    				$data['obras'] = $this->obrasdao->get_obras('', $order, $order_type, $config['per_page'],$limit_end);
    			}else{
    				$data['obras'] = $this->obrasdao->get_obras('', '', $order_type, $config['per_page'],$limit_end);
    			}
    		}
    
    	}else{
    
    		//clean filter data inside section
    		$filter_session_data['obra_selected'] = null;
    		$filter_session_data['search_string_selected'] = null;
    		$filter_session_data['order'] = null;
    		$filter_session_data['order_type'] = null;
    		$this->session->set_userdata($filter_session_data);
    
    		//pre selected options
    		$data['search_string_selected'] = '';
    		$data['order'] = 'id';
    
    		//fetch sql data into arrays
    		$data['count_products']= $this->obrasdao->count_obras();
    		$data['obras'] = $this->obrasdao->get_obras('', '', $order_type, $config['per_page'],$limit_end);
    		$config['total_rows'] = $data['count_products'];
    
    	}//!isset($search_string) && !isset($order)
    	 
    	//initializate the panination helper
    	$this->pagination->initialize($config);
    
    	//load the view
    	$data['main_content'] = 'admin/obras/list_obras_acidente';
    	$this->load->view('includes/template', $data);
    
    }//index
     
    public function acidentes(){
    	
    	$id = $this->uri->segment(4);
    	
    	$data['obra'] = $this->obrasdao->get_obra_by_id($id);
    	
    	$this->load->model('tipo_obrasdao');
    	$tipoObras = new tipo_obrasdao();
    	$data['listTiposObra'] = $tipoObras->get_tipos_by_obra_id($id);
    	
    	$this->load->model('acidentesdao');
    	$acidentes = new acidentesdao();    	
    	$lista_acidentes = $acidentes->get_acidentes_by_obra($id, $data['obra'] );
    	
    	$anoIniObra = substr( $data['obra'][0]['data_ini'], 0, 4);
    	$anoFimObra =  substr( $data['obra'][0]['data_fim'], 0, 4);
    	
    	$relatorio_acidentes = $this->relatorio_acidentes($anoIniObra, $anoFimObra, $lista_acidentes );    	
    	$data['relatorio1'] = $this->relatorio_acidentes_format($relatorio_acidentes);
    	
    	// charts call
    	$this->column_chart($relatorio_acidentes, 'Relatório de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
    	
    	$indice_acidentes = $this->indice_acidentes($data['obra'][0], $relatorio_acidentes );
    	$data['relatorio2'] = $this->indice_acidentes_format($indice_acidentes);
    	
    	// charts call
    	$this->column_chart($indice_acidentes, 'Relatório de indide de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
    	
    	$data['relatorio3'] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes );
    	
    	$lista_descricao = $acidentes->get_descricao_acidentes();
    	
    	$lista_acidentes_descricao = $acidentes->get_acidentes_descricao_by_obra($id, $data['obra']);
    	
    	$data['relatorio4'] = $this->relatorio_acidentes_descricao($anoIniObra, $anoFimObra,$lista_descricao, $lista_acidentes_descricao ); 
    	
    	foreach($data['relatorio4'] as $key => $rel){
					
					$descr_acidente = str_replace(' ', '_', $key.'_rel4_obra');	
					$lista_acidentes_descricao_obra[] = $descr_acidente; 
					
					$descr_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_indice_acidente');
					$lista_indice_acidentes_descricao_obra[] = $descr_indice_acidente;
					
					$descr_media_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_media_indice_acidente');
					$lista_media_indice_acidentes_descricao_obra[] = $descr_media_indice_acidente;
					
					$temp = array();
	       			foreach($rel as $key2 => $rel2){
	       				$temp[] = array('ano' =>  $key2, 'mortos' => $rel2['mortos'], 'feridos' => $rel2['feridos'], 'ilesos' => $rel2['ilesos'] );
							
	       			}
	       			$data[$descr_acidente]		  = $this->relatorio_acidentes_format($temp);	       			
	       			$indice_acidentes = $this->indice_acidentes($data['obra'][0], $temp );	       			
	       			$data[$descr_indice_acidente] = $this->indice_acidentes_format($indice_acidentes);	       			
	       			$data[$descr_media_indice_acidente] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes );
	       			
	       		} 
	       		$data['list_acidente_relatorio_desc_obra'] = $lista_acidentes_descricao_obra;
	       		$data['list_indice_acidente_relatorio_desc_obra'] = $lista_indice_acidentes_descricao_obra;
	       		$data['lista_media_indice_acidentes_descricao_obra'] = $lista_media_indice_acidentes_descricao_obra;
    	
    	$data['main_content'] = 'admin/relatorios/obras';
    	$this->load->view('includes/template', $data);
    }
    
    public function obras_tipo(){
    	
    	$this->load->model('tipo_obrasdao');
    	$tipoObras = new tipo_obrasdao();
    	//$data['tipos'] = $tipoObras->get_tipo_obras();
    	
    	$data['caracteristica_selected'] = 0;
    	$data['tipo_selected'] = 0;
    	$data['localidade_selected'] = 0;
    	$data['vmd1'] = 0;
    	$data['vmd2'] = 0;
    	$data['obras'] = array();
    	
    	if ($this->input->server('REQUEST_METHOD') === 'POST')
    	{
    		$this->form_validation->set_rules('caracteristica', 'caracteristica', '');
    		$this->form_validation->set_rules('tipo', 'tipo', '');
    		$this->form_validation->set_rules('localidade', 'localidade', '');
    		$this->form_validation->set_rules('vmd1', 'vmd1', '');
    		$this->form_validation->set_rules('vmd2', 'vmd2', '');
    		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
    		 
    		if ($this->form_validation->run())
    		{
    			$someData = false;
    			if($this->input->post('caracteristica')){
    				foreach($this->input->post('caracteristica') as $item){
    					$tipoList[] = $item;
    				}
    				$someData = true;
    				$data['caracteristica_selected'] = $this->input->post('caracteristica');
    			}
    			if($this->input->post('tipo')){
    				foreach($this->input->post('tipo') as $item){
    					$tipoList[] = $item;
    				}
    				$someData = true;
    				$data['tipo_selected'] = $this->input->post('tipo');
    			}
    			if($this->input->post('localidade')){
    				foreach($this->input->post('localidade') as $item){
    					$tipoList[] = $item;
    				}
    				$someData = true;
    				$data['localidade_selected'] = $this->input->post('localidade');
    			}
    			if($this->input->post('vmd1')){
    				$vmd1 =  $this->input->post('vmd1');
    				$data['vmd1'] = $vmd1;
    			}else{
    				$vmd1 = null;
    			}
    			
    			if($this->input->post('vmd2')){
    				$vmd2 =  $this->input->post('vmd2');
    				$data['vmd2'] = $vmd2;
    			}else{
    				$vmd2 = null;
    			}

    			if($someData){
    				if( $vmd1 or $vmd2 ){
    					$data['obras'] =  $this->obrasdao->get_obras_by_tipo_vmd($tipoList, $vmd1, $vmd2);
    				}else{
    					$data['obras'] =  $this->obrasdao->get_obras_by_tipo($tipoList);
    				}
    				
    				$this->session->set_userdata('tipoList',$tipoList );
    			}else{
    				$data['flash_message'] = FALSE;
    				$tipoList = null;
    				$this->session->set_userdata('tipoList', $tipoList );
    			}
    			
    		}
    		$indObra = 0;
    		foreach($data['obras'] as $obraFoco){
    			$data['obras'][$indObra]['id_tipo_obras'] = $tipoObras->get_tipos_by_obra_id($obraFoco['id']);
    			$indObra++;
    			
    		}
    	}else{
    		
    	}
    	
    	$data['caracteristica'] = $tipoObras->get_tipo_obras_by_unidade(1);
    	$data['tipo'] = $tipoObras->get_tipo_obras_by_unidade(2);
    	$data['localidade'] = $tipoObras->get_tipo_obras_by_unidade(3);
    	
    	$data['main_content'] = 'admin/obras/busca_obras_tipo_acidente';
    	$this->load->view('includes/template', $data);
    }
    
    public function obras_tipo_acidente(){

    	
			$idList = $this->input->post('idObras');
			$obrasList = $this->obrasdao->get_obras_by_ids($idList); 
			$tipoList = $this->session->userdata('tipoList');
			
			$completo = $this->input->post('completo');
			
			$this->load->model('tipo_obrasdao');
			$tipoObras = new tipo_obrasdao();
			
			$this->load->model('acidentesdao');
			$acidentes = new acidentesdao();
			
			$ind = 0;
			$reducaoIlesos = 0;
			$reducaoFeridos = 0;
			$reducaoMortos = 0;
			$first = true;
			
			// fazendo a divisao pela quantidade de obras encontradas
			$div = sizeof($obrasList);
			
			foreach($obrasList as $obra){
				
				$lista_acidentes = $acidentes->get_acidentes_by_obra_tipo($obra['id'], $obra );
				 
				$anoIniObra = substr( $obra['data_ini'], 0, 4);
				$anoFimObra =  substr( $obra['data_fim'], 0, 4);
				
				//$anoIniObra = 2007;
				//$anoFimObra =  2008;

				$data['obra'.$ind] = $obra;
				
				$data['listTiposObra'.$ind] = $tipoObras->get_tipos_by_obra_id($obra['id']);
				
				$relatorio_acidentes = $this->relatorio_acidentes($anoIniObra, $anoFimObra, $lista_acidentes );				
				$data['obra'.$ind.'_rel1'] =  $this->relatorio_acidentes_format($relatorio_acidentes);
				
				$indice_acidentes1 = $this->indice_acidentes($obra, $relatorio_acidentes );
				$data['obra'.$ind.'_rel2'] = $this->indice_acidentes_format($indice_acidentes1);
				
				$data['obra'.$ind.'_rel3'] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes1 );
				
				$lista_descricao = $acidentes->get_descricao_acidentes();
				 
				$lista_acidentes_descricao = $acidentes->get_acidentes_descricao_by_obra_tipo($obra['id'], $obra);
				 
				$data['obra'.$ind.'_rel4'] = $this->relatorio_acidentes_descricao($anoIniObra, $anoFimObra,$lista_descricao, $lista_acidentes_descricao );
				
				
				$viewDataRelatorios[] = array(	'obra' => 'obra'.$ind,  
												'rel1' => 'obra'.$ind.'_rel1', 
												'rel2' => 'obra'.$ind.'_rel2', 
												'rel3' => 'obra'.$ind.'_rel3',
												'rel4' => 'obra'.$ind.'_rel4', 
												'listTipo'  => 'listTiposObra'.$ind
										);
				
				// formatando a saida para multiplas descricoes de acidentes
				$lista_acidentes_descricao_obra = array();
				$lista_indice_acidentes_descricao_obra = array();
				$lista_media_indice_acidentes_descricao_obra = array();
				
				foreach($data['obra'.$ind.'_rel4'] as $key => $rel){
					
					$descr_acidente = str_replace(' ', '_', $key.'_rel4_obra_'.$ind);	
					$lista_acidentes_descricao_obra[] = $descr_acidente; 
					
					$descr_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_indice_acidente'.$ind);
					$lista_indice_acidentes_descricao_obra[] = $descr_indice_acidente;
					
					$descr_media_indice_acidente = str_replace(' ', '_', $key.'_rel4_obra_media_indice_acidente'.$ind);
					$lista_media_indice_acidentes_descricao_obra[] = $descr_media_indice_acidente;
					
					// nome da classificacao do acidente
					$reducaoTipoAcidente = str_replace(' ', '_', $key.'_rel4_reducao');
					//pra compor a lista de variaveis de reducao, verifica-se a primeira ocorrencia, evitando duplicidades ja que essa variavel n utiliza o ind
					if($first){
						$listaReducaoTipoAcidente[] = $reducaoTipoAcidente;
					}
														
					$temp = array();
	       			foreach($rel as $key2 => $rel2){
	       				$temp[] = array('ano' =>  $key2, 'mortos' => $rel2['mortos'], 'feridos' => $rel2['feridos'], 'ilesos' => $rel2['ilesos'] );
							
	       			}
	       			$data[$descr_acidente]		  = $this->relatorio_acidentes_format($temp);	       			
	       			$indice_acidentes = $this->indice_acidentes($obra, $temp );	       			
	       			$data[$descr_indice_acidente] = $this->indice_acidentes_format($indice_acidentes);	       			
	       			$data[$descr_media_indice_acidente] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes );
	       			
	       			// salvando o calculo da reducao para cada classificacao
	       			if( !isset($data[$reducaoTipoAcidente])){
	       				$data[$reducaoTipoAcidente]['feridos']  = $data[$descr_media_indice_acidente][0]['reducao']/$div;
	       				$data[$reducaoTipoAcidente]['ilesos']  = $data[$descr_media_indice_acidente][1]['reducao']/$div;
	       				//echo '<br>'.$reducaoTipoAcidente.'<br>';
	       				$data[$reducaoTipoAcidente]['mortos']  = $data[$descr_media_indice_acidente][2]['reducao']/$div;
	       				//echo '<br>';
	       			}else{
	       				//echo '<br>'.$reducaoTipoAcidente.'<br>';
	       				$data[$reducaoTipoAcidente]['feridos']  += ($data[$descr_media_indice_acidente][0]['reducao']/$div);
	       				$data[$reducaoTipoAcidente]['ilesos']  += ($data[$descr_media_indice_acidente][1]['reducao']/$div);
	       				$data[$reducaoTipoAcidente]['mortos']  += ($data[$descr_media_indice_acidente][2]['reducao']/$div);
	       				//echo '<br>';
	       			}
	       			
	       			
	       			
	       		} 
	       		
	       		$first = false;
	       		
	       		$data['list_acidente_relatorio_desc_obra_'.$ind] = $lista_acidentes_descricao_obra;
	       		$data['list_indice_acidente_relatorio_desc_obra_'.$ind] = $lista_indice_acidentes_descricao_obra;
	       		$data['lista_media_indice_acidentes_descricao_obra_'.$ind] = $lista_media_indice_acidentes_descricao_obra;
	       		
	       		//$data['reducao_tipo_acidente'] = $listaReducaoTipoAcidente;
	       		
				$reducaoFeridos += $data['obra'.$ind.'_rel3'][0]['reducao'];
				$reducaoIlesos  += $data['obra'.$ind.'_rel3'][1]['reducao'];
				$reducaoMortos  += $data['obra'.$ind.'_rel3'][2]['reducao'];
				$ind++;
				
				// charts call
				$this->column_chart($relatorio_acidentes, 'Relatório de Acidentes Obra '.$ind , 'Mortos', 'Feridos', 'Ilesos', 'Total' );				 
				$this->column_chart($indice_acidentes1, 'Relatório de indide de Acidentes Obra '.$ind , 'Mortos', 'Feridos', 'Ilesos', 'Total' );
				
				
				
			}
			$data['lista_reducao_classe_acidente'] = $listaReducaoTipoAcidente;
			
			$data['variacao_total'] = array( 'ilesos'  => ($reducaoIlesos/$div), 
											 'feridos' => ($reducaoFeridos/$div), 
											 'mortos'  => ($reducaoMortos/$div), 
											 'quantidade' => $div 
									 );
			
			//$this->PAR($data['lista_reducao_classe_acidente']);
			
			$data['viewDataRelatorio'] = $viewDataRelatorios;
			//$this->PAR($data['variacao_total']);
			
					
    	
    	$data['tipos_selecionados'] = $tipoObras->get_tipos_list_by_ids($tipoList);
    	$data['tipos'] = $tipoObras->get_tipo_obras();
    	//$data['id_tipo_obras'] = $tipoObras->get_tipo_obras();
    	//$data['tipos'] = $this->obrasdao->get_tipos_by_obra_id($id);

    	if($completo == 'completo'){
    		$data['main_content'] = 'admin/relatorios/obras_tipo';
    	}else{
    		$data['main_content'] = 'admin/relatorios/obras_tipo_sintetico';
    	}
    	
    	$this->load->view('includes/template', $data);
    }
    
    private function relatorio_acidentes($dataIniObra, $dataFimObra, $lista_acidentes, $notExclusive = null ){
    	
    	$anoFlag   = true;
    	$anoAtual  = 0;
    	$acMortos  = 0;
    	$acFeridos = 0;
    	$acIlesos  = 0;
    	$acTotal   = 0;
    	$date = 0;
    	
    	foreach($lista_acidentes as $item){
    		if($anoFlag == true){
    			if($item['classificacao'] == "com mortos"){
    				$acMortos++;
    			}else if($item['classificacao'] == "com feridos"){
    				$acFeridos++;
    			}else{
    				$acIlesos++;
    			}
    			$anoAtual = $item['ano'];
    			$anoFlag = false;
    		}else{
    			if($anoAtual != $item['ano']){
    				// ESSA REGRA EXCLUI OS ANOS DE INICIO, FIM E PERIODO DE OBRA
    				if(is_null($notExclusive)){
    					if(!($anoAtual >= $dataIniObra and $anoAtual <= $dataFimObra)){
    						$cadastro1[] = array('ano' => $anoAtual, 'mortos' => $acMortos, 'feridos' => $acFeridos, 'ilesos' => $acIlesos);
    					}
    				}else{
    					$cadastro1[] = array('ano' => $anoAtual, 'mortos' => $acMortos, 'feridos' => $acFeridos, 'ilesos' => $acIlesos);
    				}
    				
    				$anoAtual = $item['ano'];
    				$acMortos = 0;
    				$acFeridos = 0;
    				$acIlesos = 0;
    				if($item['classificacao'] == "com mortos"){
    					$acMortos++;
    				}else if($item['classificacao'] == "com feridos"){
    					$acFeridos++;
    				}else{
    					$acIlesos++;
    				}
    			}else{
    				if($item['classificacao'] == "com mortos"){
    					$acMortos++;
    				}else if($item['classificacao'] == "com feridos"){
    					$acFeridos++;
    				}else{
    					$acIlesos++;
    				}
    			}
    		}
    	}
    	// ESSA REGRA EXCLUI OS ANOS DE INICIO, FIM E PERIODO DE OBRA
    	// E ADICIONA OS DADOS DO ÚLTIMO ANO
    	if(is_null($notExclusive)){
    		if(!($anoAtual >= $dataIniObra and $anoAtual <= $dataFimObra)){
    			$cadastro1[] = array('ano' => $anoAtual, 'mortos' => $acMortos, 'feridos' => $acFeridos, 'ilesos' => $acIlesos);
    		}
    	}else{
    		$cadastro1[] = array('ano' => $anoAtual, 'mortos' => $acMortos, 'feridos' => $acFeridos, 'ilesos' => $acIlesos);
    	}
    	return $cadastro1; 
    }
    // $data['obra'][0]
    private function relatorio_acidentes_format($relatorio_acidentes){
    	
    	foreach($relatorio_acidentes as $item){
    		$ano[] 		= $item['ano'];
    		$mortos[] 	= $item['mortos'];
    		$feridos[]	= $item['feridos'];
    		$ilesos[] 	= $item['ilesos'];
    		$total[]	= $item['mortos'] + $item['feridos'] + $item['ilesos'];
    	}
    	$result['ano'] 		= $ano;
    	$result['ilesos'] 	= $ilesos;
    	$result['feridos'] 	= $feridos;
    	$result['mortos'] 	= $mortos;
    	$result['total'] 	= $total;
    	
    	return $result;
    }

    private function indice_acidentes_format($indice_acidentes){
    	
    	foreach($indice_acidentes as $item){
    		$anoInd[] 		= $item['ano'];
    		$mortosInd[] 	= $item['mortos'];
    		$feridosInd[]	= $item['feridos'];
    		$ilesosInd[] 	= $item['ilesos'];
    		$totalInd[]		= $item['total'];
    	}
    	$result['ano'] 		= $anoInd;
    	$result['ilesos'] 	= $ilesosInd;
    	$result['feridos'] 	= $feridosInd;
    	$result['mortos'] 	= $mortosInd;
    	$result['total'] 	= $totalInd;
    	
    	return $result;
    }
    
    private function indice_acidentes($arrayObra, $relatorio_acidentes ){
    	
    	$extTotal = $arrayObra['km_fim'] - $arrayObra['km_ini'];
    	if($extTotal == 0){
    		$extTotal = 1;
    	}
    	//$extTotal = 20;
    	$vdm_s	=	$arrayObra['vdm_s'];
    	$vdm_c	=	$arrayObra['vdm_c'];;
    	$anoRef =   $arrayObra['ano_ref_vdm'];
    	//$anoRef =   2010;
    	$taxa	=	$arrayObra['taxa_crescimento'];
    	$anoIniObra = substr( $arrayObra['data_ini'], 0, 4);
    	$anoFimObra = substr( $arrayObra['data_fim'], 0, 4);
    	
    	
    	foreach($relatorio_acidentes as $item){
    		if($item['ano'] <  $anoIniObra){
    			$vdm = $vdm_s;
    		}else{
    			$vdm = $vdm_c;
    		}
    		$anoAtual = $item['ano'];
    		
    		// 10^6
    		// 10^8 
    		
    		//calculo da taxa testado e aprovado conforme a tabela do guilherme
    		$calcIlesos  = ($item['ilesos']*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    		$calcFeridos = ($item['feridos']*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    		$calcMortos  = ($item['mortos']*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    		$calcTotal 	 = (($item['mortos']+$item['feridos']+$item['ilesos'])*100000000)/($extTotal*($vdm*(pow((1+$taxa),($anoAtual-$anoRef)))*365));
    		
    		$cadastro2[] = array('ano' => $anoAtual, 'ilesos' => $calcIlesos, 'feridos' => $calcFeridos, 'mortos' => $calcMortos, 'total' => $calcTotal);
    		
    	}
    	
    	return $cadastro2;
    	
    }

	private function media_idice_acidentes($anoIniObra, $arrayIndAcidentes){
		
		$mAntIlesos  = 0;
		$mAntFeridos = 0;
		$mAntMortos  = 0;
		$qntAntes = 0;
		$mPosIlesos  = 0;
		$mPosFeridos = 0;
		$mPosMortos  = 0;
		$qntPos = 0;
		
		foreach($arrayIndAcidentes as $item){

			if($item['ano'] <  $anoIniObra){
				$mAntIlesos  += $item['ilesos'];
				$mAntFeridos += $item['feridos'];
				$mAntMortos  += $item['mortos'];
				$qntAntes++;
			}
			else if($item['ano'] >  $anoIniObra)
			{
				$mPosIlesos  +=	$item['ilesos'];
				$mPosFeridos += $item['feridos'];
				$mPosMortos  +=	$item['mortos'];
				$qntPos++;
			}
				
		}
		
		if( $qntAntes == 0){
			$mAntIlesos  = 0;
			$mAntFeridos = 0;
			$mAntMortos  = 0;
		}else{
			$mAntIlesos  = $mAntIlesos/$qntAntes;
			$mAntFeridos = $mAntFeridos/$qntAntes;
			$mAntMortos  = $mAntMortos/$qntAntes;
		}
		
		if($qntPos == 0){
			$mPosIlesos  = 0;
			$mPosFeridos = 0;
			$mPosMortos  = 0;
		}else{
			$mPosIlesos  = $mPosIlesos/$qntPos;
			$mPosFeridos = $mPosFeridos/$qntPos;
			$mPosMortos  = $mPosMortos/$qntPos;
		}
		

		if($mAntIlesos == 0){
			$mRedIlesos  = $mPosIlesos * 100;
		}else{
			$mRedIlesos  = (($mPosIlesos  - $mAntIlesos  )/$mAntIlesos ) * 100;
		}
		
		if($mAntFeridos == 0){
			$mRedFeridos  = $mPosFeridos * 100;
		}else{
			$mRedFeridos = (($mPosFeridos - $mAntFeridos )/$mAntFeridos) * 100;
		}
		
		if($mAntMortos == 0){
			$mRedMortos  = $mPosMortos * 100;
		}else{
			$mRedMortos  = (($mPosMortos  - $mAntMortos  )/$mAntMortos ) * 100;
		}
		
		
		
		// se 2 coluna maior que primeira, invert sinal
		
		$cadastro3[]  = array('antes' => $mAntIlesos,  'depois' => $mPosIlesos,  'reducao' => $mRedIlesos  );
		$cadastro3[]  = array('antes' => $mAntFeridos, 'depois' => $mPosFeridos, 'reducao' => $mRedFeridos  );
		$cadastro3[]  = array('antes' => $mAntMortos,  'depois' => $mPosMortos,  'reducao' => $mRedMortos  );
		
		return $cadastro3;
	}

	private function media_idice_acidentes_futura($arrayIndAcidentes){
	
		$mAntIlesos  = 0;
		$mAntFeridos = 0;
		$mAntMortos  = 0;
		$qntAntes = 0;
	
		foreach($arrayIndAcidentes as $item){
			
				$mAntIlesos  += $item['ilesos'];
				$mAntFeridos += $item['feridos'];
				$mAntMortos  += $item['mortos'];
				$qntAntes++;
	
		}
	
		if( $qntAntes == 0){
			$mAntIlesos  = 0;
			$mAntFeridos = 0;
			$mAntMortos  = 0;
		}else{
			$mAntIlesos  = $mAntIlesos/$qntAntes;
			$mAntFeridos = $mAntFeridos/$qntAntes;
			$mAntMortos  = $mAntMortos/$qntAntes;
		}
	
		
	
	
		// se 2 coluna maior que primeira, invert sinal
	
		$cadastro3  = array('ilesos' => $mAntIlesos,  'feridos' => $mAntFeridos,  'mortos' => $mAntMortos  );
	
		return $cadastro3;
	}
	
	private function relatorio_acidentes_descricao($anoIniObra, $anoFimObra, $lista_descricao, $lista_acidentes_descricao ){
		
		$anoIni = 0;
		$inicio = true;
		foreach($lista_acidentes_descricao as $ano ){
			if($inicio){
				$anoIni = $ano['ano'];
				$listaAno[] = $anoIni;
				$inicio = false;
			}
			if($anoIni != $ano['ano']){
				$anoIni = $ano['ano'];
				$listaAno[] = $anoIni;
			}
		}
		
		foreach($lista_descricao as $desc){
			
			foreach($listaAno as $ano){	
				$ilesos = 0;
				$feridos = 0;
				$mortos = 0;			
				foreach($lista_acidentes_descricao as $item){
					
					if($item['descricao'] == $desc['descricao']){
						if($item['ano'] == $ano){
							if($item['classificacao'] == 'ilesos'){
								$ilesos = $item['qnt_class'];
							}
							if($item['classificacao'] == 'com feridos'){
								
								$feridos = $item['qnt_class'];
							}
							if($item['classificacao'] == 'com mortos'){
								$mortos  = $item['qnt_class'];
							}
						}	
					}
				}
				// ESSA REGRA EXCLUI OS ANOS DE INICIO, FIM E PERIODO DE OBRA
				if(!($ano >= $anoIniObra and $ano <= $anoFimObra)){
					$result[$ano] = array('mortos' => $mortos, 'feridos' => $feridos, 'ilesos' => $ilesos);				
					$result2[$desc['descricao']][$ano] = $result[$ano];
				}
			}
		}
		
		
		
		//$resultFinal['cabecalho'] = $cabecalho;
		//$resultFinal['anos'] = $listAnoTotal;
		//echo '<br>';
		//echo '<br>';
		//echo '<br>';
		//echo '<br>';
		
		
		//echo '<pre>';
		 //print_r($listaAno);
		 //print_r($lista_descricao);
		 //print_r($lista_acidentes_descricao);
		 //print_r($resultFinal);
		 //print_r($result2);
		//echo '</pre>';
		
		return $result2;
		//die;
		
	}

	public function column_chart($dataToPrint, $divName, $col1, $col2, $col3, $col4){
		
	 $this->gcharts->load('ColumnChart');

        $this->gcharts->DataTable($divName)
                      ->addColumn('string', 'Classroom', 'class')
                      ->addColumn('number', ucfirst($col1), $col1)
                      ->addColumn('number', ucfirst($col2), $col2)
                      ->addColumn('number', ucfirst($col3), $col3)
                      ->addColumn('number', ucfirst($col4), $col4);
                      
                      
		foreach($dataToPrint as $item){
			
			$data = array(
					$item['ano'], 		
					$item[strtolower($col1)] ,   
					$item[strtolower($col2)],   
					$item[strtolower($col3)],
					($item[strtolower($col1)] + $item[strtolower($col2)] + $item[strtolower($col3)])
			);
			
			$this->gcharts->DataTable($divName)->addRow($data);
		}          
                      
        $config = array(
            'title' => $divName
        );

        $this->gcharts->ColumnChart($divName)->setConfig($config);
	}
	
	public function obras_futuras($analise = null){
		
	
		//all the posts sent by the view
		$search_string = $this->input->post('search_string');
		$order = $this->input->post('order');
		$order_type = $this->input->post('order_type');
		
		//pagination settings
		$config['per_page'] = 30;
		
		$config['base_url'] = base_url().'admin/obras';
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
			$data['count_products']= $this->obrasdao->count_obras_futuras($search_string, $order);
				$config['total_rows'] = $data['count_products'];
		
				//fetch sql data into arrays
						if($search_string){
				if($order){
					$data['obras'] = $this->obrasdao->get_obras_futuras($search_string, $order, $order_type, $config['per_page'],$limit_end);
				}else{
					$data['obras'] = $this->obrasdao->get_obras_futuras($search_string, '', $order_type, $config['per_page'],$limit_end);
			}
			}else{
				if($order){
					$data['obras'] = $this->obrasdao->get_obras_futuras('', $order, $order_type, $config['per_page'],$limit_end);
				}else{
					$data['obras'] = $this->obrasdao->get_obras_futuras('', '', $order_type, $config['per_page'],$limit_end);
				}
			}
		
			}else{
		
			//clean filter data inside section
			$filter_session_data['obra_selected'] = null;
					$filter_session_data['search_string_selected'] = null;
					$filter_session_data['order'] = null;
					$filter_session_data['order_type'] = null;
					$this->session->set_userdata($filter_session_data);
		
					//pre selected options
					$data['search_string_selected'] = '';
						$data['order'] = 'id';
		
						//fetch sql data into arrays
						$data['count_products']= $this->obrasdao->count_obras_futuras();
						$data['obras'] = $this->obrasdao->get_obras_futuras('', '', $order_type, $config['per_page'],$limit_end);
						$config['total_rows'] = $data['count_products'];
		
				}//!isset($search_string) && !isset($order)
					 
					//initializate the panination helper
				$this->pagination->initialize($config);
				if(is_null($analise)){
					//load the view
					$data['main_content'] = 'admin/obras/list_obra_futura';
				}else{
					$data['main_content'] = 'admin/obras/list_obra_futura_analise';
				}
					
				$this->load->view('includes/template', $data);
	}

	public function obras_futuras_analise(){
		 
		$id = $this->uri->segment(4);
		if($id){
			$this->session->set_userdata('obra_futura',  $id);
		}else{
			$id = $this->session->userdata('obra_futura');	
		}
		$this->load->model('tipo_obrasdao');
		$tipoObras = new tipo_obrasdao();
		//$data['tipos'] = $tipoObras->get_tipo_obras();
		 
		$data['obra'] = $this->obrasdao->get_obra_by_id($id);	
		$data['obra'][0]['id_tipo_obras'] = $tipoObras->get_tipos_by_obra_id($id);
		
		$data['caracteristica_selected'] = 0;
		$data['tipo_selected'] = 0;
		$data['localidade_selected'] = 0;
		$data['vmd1'] = 0;
		$data['vmd2'] = 0;
		$data['taxa_desconto'] = 0.12;
		$data['anos'] = 20;
		$data['obras'] = array();
		 
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->form_validation->set_rules('caracteristica', 'caracteristica', '');
			$this->form_validation->set_rules('tipo', 'tipo', '');
			$this->form_validation->set_rules('localidade', 'localidade', '');
			$this->form_validation->set_rules('vmd1', 'vmd1', '');
			$this->form_validation->set_rules('vmd2', 'vmd2', '');
			$this->form_validation->set_rules('taxa_desconto', 'taxa_desconto', '');
			$this->form_validation->set_rules('anos', 'anos', '');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			 
			if ($this->form_validation->run())
			{
				$someData = false;
				if($this->input->post('caracteristica')){
					foreach($this->input->post('caracteristica') as $item){
						$tipoList[] = $item;
					}
					$someData = true;
					$data['caracteristica_selected'] = $this->input->post('caracteristica');
				}
				if($this->input->post('tipo')){
					foreach($this->input->post('tipo') as $item){
						$tipoList[] = $item;
					}
					$someData = true;
					$data['tipo_selected'] = $this->input->post('tipo');
				}
				if($this->input->post('localidade')){
					foreach($this->input->post('localidade') as $item){
						$tipoList[] = $item;
					}
					$someData = true;
					$data['localidade_selected'] = $this->input->post('localidade');
				}
				if($this->input->post('vmd1')){
					$vmd1 =  $this->input->post('vmd1');
					$data['vmd1'] = $vmd1;
				}else{
					$vmd1 = null;
				}
				 
				if($this->input->post('vmd2')){
					$vmd2 =  $this->input->post('vmd2');
					$data['vmd2'] = $vmd2;
				}else{
					$vmd2 = null;
				}
	
				if($this->input->post('taxa_desconto')){
					$taxa_desconto =  $this->input->post('taxa_desconto');
					$data['taxa_desconto'] = $taxa_desconto;
				}else{
					$taxa_desconto = 0.12;
				}
				
				if($this->input->post('anos')){
					$anos =  $this->input->post('anos');
					$data['anos'] = $anos;
				}else{
					$anos = 20;
				}
				
				if($someData){
					if( $vmd1 or $vmd2 ){
						$data['obras'] =  $this->obrasdao->get_obras_by_tipo_vmd($tipoList, $vmd1, $vmd2);
					}else{
						$data['obras'] =  $this->obrasdao->get_obras_by_tipo($tipoList);
					}
	
					$this->session->set_userdata('tipoList',$tipoList );
				}else{
					$data['flash_message'] = FALSE;
					$tipoList = null;
					$this->session->set_userdata('tipoList', $tipoList );
				}
				 
			}
			$indObra = 0;
			foreach($data['obras'] as $obraFoco){
				$data['obras'][$indObra]['id_tipo_obras'] = $tipoObras->get_tipos_by_obra_id($obraFoco['id']);
				$indObra++;
				 
			}
		}else{
	
		}
		 
		$data['caracteristica'] = $tipoObras->get_tipo_obras_by_unidade(1);
		$data['tipo'] = $tipoObras->get_tipo_obras_by_unidade(2);
		$data['localidade'] = $tipoObras->get_tipo_obras_by_unidade(3);
		 
		$data['main_content'] = 'admin/obras/busca_obras_tipo_acidente_futura';
		$this->load->view('includes/template', $data);
	}
	
	//obras_tipo_acidente
	public function obras_futuras_tipo_acidente(){
	
		 
		$idList = $this->input->post('idObras');
		$taxa_desconto = $this->input->post('taxa_desconto');
		$anosAnalise   = $this->input->post('anos');
		$dadosAnaliseEcon = array('qntAnos' => $anosAnalise, 'taxa_desconto' => $taxa_desconto);
		
		$obrasList = $this->obrasdao->get_obras_by_ids($idList);
		$tipoList = $this->session->userdata('tipoList');
			
		$completo = $this->input->post('completo');
			
		$this->load->model('tipo_obrasdao');
		$tipoObras = new tipo_obrasdao();
			
		$this->load->model('acidentesdao');
		$acidentes = new acidentesdao();
			
		$this->load->model('custosdao');
		$custos_acidentes = new custosdao();
		
		$ind = 0;
		$reducaoIlesos = 0;
		$reducaoFeridos = 0;
		$reducaoMortos = 0;
		$first = true;
			
		// carregando a obra futura
		$id = $this->session->userdata('obra_futura');
		$data['obra'] = $this->obrasdao->get_obra_by_id($id);		 
		$data['listTiposObraFutura'] = $tipoObras->get_tipos_by_obra_id($id);		 
		$lista_acidentes = $acidentes->get_acidentes_by_obra($id, $data['obra'] );
		 
		$anoIniObra = 2005;
		$anoFimObra =  2005;
		
		$relatorio_acidentes = $this->relatorio_acidentes($anoIniObra, $anoFimObra, $lista_acidentes, true );
		$data['relatorio1'] = $this->relatorio_acidentes_format($relatorio_acidentes);
		 
		// charts call
		$this->column_chart($relatorio_acidentes, 'Relatório de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
		 
		$indice_acidentes = $this->indice_acidentes($data['obra'][0], $relatorio_acidentes );
		$data['relatorio2'] = $this->indice_acidentes_format($indice_acidentes);
		
		// charts call
		$this->column_chart($indice_acidentes, 'Relatório de indide de Acidentes', 'Mortos', 'Feridos', 'Ilesos', 'Total' );
		
		// fazendo a divisao pela quantidade de obras encontradas
		$div = sizeof($obrasList);
			
		foreach($obrasList as $obra){
	
			$lista_acidentes = $acidentes->get_acidentes_by_obra_tipo($obra['id'], $obra );
				
			$anoIniObra = substr( $obra['data_ini'], 0, 4);
			$anoFimObra =  substr( $obra['data_fim'], 0, 4);
	
	
			$data['obra'.$ind] = $obra;
	
			$data['listTiposObra'.$ind] = $tipoObras->get_tipos_by_obra_id($obra['id']);
	
			$relatorio_acidentes = $this->relatorio_acidentes($anoIniObra, $anoFimObra, $lista_acidentes );
	
			$indice_acidentes1 = $this->indice_acidentes($obra, $relatorio_acidentes );
	
			$data['obra'.$ind.'_rel3'] = $this->media_idice_acidentes($anoIniObra,$indice_acidentes1 );
	
			$viewDataRelatorios[] = array(	'obra' => 'obra'.$ind,
					'rel1' => 'obra'.$ind.'_rel1',
					'rel2' => 'obra'.$ind.'_rel2',
					'rel3' => 'obra'.$ind.'_rel3',
					'rel4' => 'obra'.$ind.'_rel4',
					'listTipo'  => 'listTiposObra'.$ind
			);
			
	
			$reducaoFeridos += $data['obra'.$ind.'_rel3'][0]['reducao'];
			$reducaoIlesos  += $data['obra'.$ind.'_rel3'][1]['reducao'];
			$reducaoMortos  += $data['obra'.$ind.'_rel3'][2]['reducao'];
			$ind++;
	
		}
		//$data['lista_reducao_classe_acidente'] = $listaReducaoTipoAcidente;
			
		$data['variacao_total'] = array( 'ilesos'  => ($reducaoIlesos/$div),
				'feridos' => ($reducaoFeridos/$div),
				'mortos'  => ($reducaoMortos/$div),
				'quantidade' => $div
		);

		$data['custo_acidente'] = $custos_acidentes->get_custo_by_ano_referencia( $data['obra'][0]['data_ini']);
		
		// avaliacao
		
		$tmpArr = $this->obra_futura_avaliacao_economica($data['obra'][0], $indice_acidentes, 
				$data['variacao_total'], $data['custo_acidente'],
				$dadosAnaliseEcon
		 );
		$data['relatorio3'] = $tmpArr['avaliacao_economica'];
		$data['vpl'] = $tmpArr['vpl'];
		//$this->PAR($data['lista_reducao_classe_acidente']);
			
		$data['viewDataRelatorio'] = $viewDataRelatorios;
		//$this->PAR($data['variacao_total']);
			
			
		 
		$data['tipos_selecionados'] = $tipoObras->get_tipos_list_by_ids($tipoList);
		$data['tipos'] = $tipoObras->get_tipo_obras();
	
		
		$data['main_content'] = 'admin/relatorios/avaliacao_economica';
		
		 
		$this->load->view('includes/template', $data);
	}
	
	public function obra_futura_avaliacao_economica($obra, $indice_acidentes, $variacao, $custo_medio, $dadosEntrada ){
		
		$media = $this->media_idice_acidentes_futura($indice_acidentes);
		
		/*
		$this->PAR($obra);
		echo 'indice';
		$this->PAR($indice_acidentes);
		echo 'variacao por tipo';
		$this->PAR($variacao);
		echo 'custo';
		$this->PAR($custo_medio);
		echo 'media de acidentes da obra futura';
		$this->PAR($media);
		*/
				
		$ext = $obra['km_ini'] - $obra['km_fim'];
		if( $ext == 0){
			$ext = 1;
		}else if( $ext < 0){
			$ext = $ext * (-1);
		} 
		
		$anoBase = substr( $obra['data_fim'], 0, 4);
		$anoCalc = $anoBase;
		$vmd_s = $obra['vdm_s'];
		$vmd_c = $obra['vdm_c'];
		$anoRef = $obra['ano_ref_vdm'];
		$taxa = $obra['taxa_crescimento'];
		$custo = $obra['custo'];
		$antAnos = $dadosEntrada['qntAnos'];
		$taxaDesc = $dadosEntrada['taxa_desconto'];
		$vpl = 0;
		$sumVpl = 0;
		// 10^8
		$fator10_8 = 100000000;
		$fator10_6 = 1000000;
		
		$first = true;
		for($i=0; $i < $antAnos; $i++){
			
			if($first){
				$first = false;
				$acIlesos 	= ($media['ilesos']*$ext*($vmd_s*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['ilesos']/$fator10_6 ;
				$acFeridos 	= ($media['feridos']*$ext*($vmd_s*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['feridos']/$fator10_6;
				$acMortos 	= ($media['mortos']*$ext*($vmd_s*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['mortos']/$fator10_6; 
				$benLiqu    = (-$custo/$fator10_6);
				$vpl = $benLiqu * pow((1-$taxaDesc),($anoBase - $anoCalc));
				$sumVpl = $sumVpl + $vpl;
				//echo 'vpl inst. '.$vpl.' beneficio liquido '.$benLiqu.' 1 - '.$taxaDesc.' ano do calculo '.$anoCalc.' ano base '.$anoBase.'<br>';
				//echo $vpl.'    '.$sumVpl.'<br>';
				$avaliacao_economica[] = array(
						'ano'			=> $anoCalc,		
						'obra' 			=> 0,
						'ac_ilecos' 	=> $acIlesos,
						'ac_feridos' 	=> $acFeridos,
						'ac_mortos' 	=> $acMortos,
						'obra_futura' 	=> ($custo/$fator10_6),
						'ac_ilecos_f' 	=> $acIlesos,
						'ac_feridos_f' 	=> $acFeridos,
						'ac_mortos_f' 	=> $acMortos,
						'benef_liqui'   => $benLiqu,
						
				);
				
			}else{
				
				$acIlesos 	= ($media['ilesos']*$ext*($vmd_s*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['ilesos']/$fator10_6 ;
				$acFeridos 	= ($media['feridos']*$ext*($vmd_s*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['feridos']/$fator10_6;
				$acMortos 	= ($media['mortos']*$ext*($vmd_s*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['mortos']/$fator10_6;
				
				$acIlesosf 	= (($media['ilesos']*(1-$variacao['ilesos']))*$ext*($vmd_c*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['ilesos']/$fator10_6;
				$acFeridosf = (($media['feridos']*(1-$variacao['feridos']))*$ext*($vmd_c*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['feridos']/$fator10_6;
				$acMortosf 	= (($media['mortos']*(1-$variacao['mortos']))*$ext*($vmd_c*(pow((1+$taxa),($anoCalc-$anoRef))))*365/$fator10_8)*$custo_medio[0]['mortos']/$fator10_6;
				
				$benLiqu	= ($acIlesos - $acIlesosf) + ($acFeridos - $acFeridosf) + ($acMortos - $acMortosf);
				$vpl = $benLiqu * pow((1+$taxaDesc),($anoBase - $anoCalc));
				$sumVpl = $sumVpl + $vpl;
				//echo 'vpl inst. '.$vpl.' beneficio liquido '.$benLiqu.' 1 - '.$taxaDesc.' ano do calculo '.$anoCalc.' ano base '.$anoBase.'<br>';
				//echo $vpl.'    '.$sumVpl.'<br>';
				$avaliacao_economica[] = array(
						'ano'			=> $anoCalc,
						'obra' 			=> 0,
						'ac_ilecos' 	=> $acIlesos,
						'ac_feridos' 	=> $acFeridos,
						'ac_mortos' 	=> $acMortos,
						'obra_futura' 	=> 0,
						'ac_ilecos_f' 	=> $acIlesosf,
						'ac_feridos_f' 	=> $acFeridosf,
						'ac_mortos_f' 	=> $acMortosf,
						'benef_liqui'   => $benLiqu,
				);
			}
			
			$anoCalc++;
		}
		//die;
		/*
		echo 'Variação economica';
		$this->PAR($avaliacao_economica);
		echo 'VPL = ';
		echo $sumVpl;
		*/
		
		return array( 'avaliacao_economica' => $avaliacao_economica, 'vpl' => $sumVpl);
	}
	
	public function add_obra_futura(){
		 //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
        	$this->form_validation->set_rules('id_classe_obras', 'id_classe_obras', 'required');
        	//$this->form_validation->set_rules('id_tipo_obras', 'id_tipo_obras', 'required');
        	$this->form_validation->set_rules('tipos', 'tipos', 'required');
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('br', 'br', 'required');
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required');
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required');
        	$this->form_validation->set_rules('km_ini', 'km_ini', 'required');
        	$this->form_validation->set_rules('km_fim', 'km_fim', 'required');
        	$this->form_validation->set_rules('vdm_s', 'vdm_s', 'required');
        	$this->form_validation->set_rules('vdm_c', 'vdm_c', 'required');
        	$this->form_validation->set_rules('ano_ref_vdm', 'ano_ref_vdm', 'required');
        	$this->form_validation->set_rules('taxa_crescimento', 'taxa_crescimento', 'required');
        	$this->form_validation->set_rules('custo', 'custo');
        	$this->form_validation->set_rules('lat_long_ini', 'lat_long_ini');
        	$this->form_validation->set_rules('lat_long_fim', 'lat_long_fim');
        	$this->form_validation->set_rules('descricao', 'descricao');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	$tipoList['tipos'] = $this->input->post('tipos');
            	
                $data_to_store = array(
                		'id_classe_obras' => $this->input->post('id_classe_obras'),
                		'id_tipo_obras' => $this->input->post('id_tipo_obras'),
                		'uf' => $this->input->post('uf'),
                		'br' => $this->input->post('br'),
                		'data_ini' => $this->input->post('data_ini'),
                		'data_fim' => $this->input->post('data_fim'),
                		'km_ini' => $this->input->post('km_ini'),
                		'km_fim' => $this->input->post('km_fim'),
                		'vdm_s' => $this->input->post('vdm_s'),
                		'vdm_c' => $this->input->post('vdm_c'),
                		'ano_ref_vdm' => $this->input->post('ano_ref_vdm'),
                		'taxa_crescimento' => $this->input->post('taxa_crescimento'),
                		'custo' => $this->input->post('custo'),
                		'lat_long_ini' => $this->input->post('lat_long_ini'),
                		'lat_long_fim' => $this->input->post('lat_long_fim'),
                		'descricao' => $this->input->post('descricao'),
                		'status' => 'futura',
                		'tipos' => $tipoList['tipos']
                );
                //if the insert has returned true then we show the flash message
                if($this->obrasdao->store_obra($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        
        $this->load->model('classe_obrasdao');
        $classeObras = new classe_obrasdao();        
        $data['id_classe_obras'] = $classeObras->get_classe_obras();
        
        $this->load->model('tipo_obrasdao');
        $tipoObras = new tipo_obrasdao();
        $data['tipos'] = $tipoObras->get_tipo_obras(null, 'unidade');
        
        //load the view
        $data['main_content'] = 'admin/obras/add_obra_futura';
        $this->load->view('includes/template', $data); 
	}
	
	public function update_obra_futura(){
		//product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
        	$this->form_validation->set_rules('id_classe_obras', 'id_classe_obras', 'required');
        	//$this->form_validation->set_rules('id_tipo_obras', 'id_tipo_obras', 'required');
        	$this->form_validation->set_rules('tipos', 'tipos', 'required');
        	$this->form_validation->set_rules('uf', 'uf', 'required');
        	$this->form_validation->set_rules('br', 'br', 'required');
        	$this->form_validation->set_rules('data_ini', 'data_ini', 'required');
        	$this->form_validation->set_rules('data_fim', 'data_fim', 'required');
        	$this->form_validation->set_rules('km_ini', 'km_ini', 'required');
        	$this->form_validation->set_rules('km_fim', 'km_fim', 'required');
        	$this->form_validation->set_rules('vdm_s', 'vdm_s', 'required');
        	$this->form_validation->set_rules('vdm_c', 'vdm_c', 'required');
        	$this->form_validation->set_rules('ano_ref_vdm', 'ano_ref_vdm', 'required');
        	$this->form_validation->set_rules('taxa_crescimento', 'taxa_crescimento', 'required');
        	$this->form_validation->set_rules('custo', 'custo' );
        	$this->form_validation->set_rules('lat_long_ini', 'lat_long_ini');
        	$this->form_validation->set_rules('lat_long_fim', 'lat_long_fim');
        	$this->form_validation->set_rules('descricao', 'descricao');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
            	$tipoList['tipos'] = $this->input->post('tipos');
            	
                 $data_to_store = array(
		        	'id_classe_obras' => $this->input->post('id_classe_obras'),
		        	'id_tipo_obras' => $this->input->post('id_tipo_obras'),
		        	'uf' => $this->input->post('uf'),
		        	'br' => $this->input->post('br'),
		        	'data_ini' => $this->input->post('data_ini'),
		        	'data_fim' => $this->input->post('data_fim'),
		        	'km_ini' => $this->input->post('km_ini'),
		        	'km_fim' => $this->input->post('km_fim'),
		            'vdm_s' => $this->input->post('vdm_s'),
		            'vdm_c' => $this->input->post('vdm_c'),
		            'ano_ref_vdm' => $this->input->post('ano_ref_vdm'),
		            'taxa_crescimento' => $this->input->post('taxa_crescimento'),
		            'custo' => $this->input->post('custo'),                 		
		        	'lat_long_ini' => $this->input->post('lat_long_ini'),
		        	'lat_long_fim' => $this->input->post('lat_long_fim'),
                 	'descricao' => $this->input->post('descricao'),
                 	'tipos' =>	$tipoList['tipos']
                );
                //if the insert has returned true then we show the flash message
                if($this->obrasdao->update_obra($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/obras/update_obra_futura/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        $this->load->model('classe_obrasdao');
        $classeObras = new classe_obrasdao();
        $data['id_classe_obras'] = $classeObras->get_classe_obras();
        
        $this->load->model('tipo_obrasdao');
        $tipoObras = new tipo_obrasdao();
        $data['id_tipo_obras'] = $tipoObras->get_tipo_obras();
        $data['tipos'] = $this->obrasdao->get_tipos_by_obra_id($id);
        
        
        //product data 
        $data['obra'] = $this->obrasdao->get_obra_by_id($id);
        //load the view
        $data['main_content'] = 'admin/obras/edit_obra_futura';
        $this->load->view('includes/template', $data);
	}
	
	/**
	 * Delete product by his id
	 * @return void
	 */
	public function delete_obra_futura()
	{
		//product id
		$id = $this->uri->segment(4);
		$this->obrasdao->delete_obra($id);
		redirect('admin/obras/obras_futuras');
	}//edit
	
}






























