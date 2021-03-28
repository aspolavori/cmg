<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class Production extends App_controller {
   
	var $newControllerName = null;
	var $newControllerNamePlural = null;
	var $atributos = null;
	
	var $container = null;
	var $containerView = null;
	var $containerController = null;
	var $containerModel = null;
	var $containerRoutes = null;
		
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
        // config set
        $this->newControllerName = 	'fator_conversao_padrao';
        // bdName, Namedao, controllerName
        $this->newControllerNamePlural = 'fator_conversao_padrao';
        
        // container set
        $this->container 			=  APPPATH . 'containerProduction/';
        $this->containerView 		=  $this->container . 'view/' . $this->newControllerNamePlural.'/';
        $this->containerController	=  $this->container . 'controller/';
        $this->containerModel		=  $this->container . 'model/';
        $this->containerRoutes		=  $this->container . 'routes/';
        
        
        // TODO
        // adicionar servico para criação de bd com multi arrays para atribulos
        $this->atributos = array(	
        							'Veículo' => 	'id_veiculo',
							        'EUC_LABOUR' => 'FEUC_LABOUR',
									'EUC_CREW' => 'FEUC_CREW',
					        		'EUC_TYRE' => 'FEUC_TYRE',
					        		'EUC_OIL' => 'FEUC_OIL',
					        		'EUC_OHEAD' => 'FEUC_OHEAD',
					        		'EUC_VEH' => 'FEUC_VEH',
					        		'EUC_GAS' => 'FEUC_GAS',
					        		'EUC_OLEO' => 'FEUC_OLEO'
        		
        						);
		
        
        
        
        
    }
    
    public function index()
    {
    }
    
    public function createAllTemplate($nameTemplate = null, $nameTemplatePlural = null){
    	if(!file_exists($this->container)){
    		mkdir($this->container, 777);
    	}
    	$this->addTemplate();
    	$this->listTemplate();
    	$this->editTemplate();
    	$this->controllerTemplate();
    	$this->modelTemplate();
    	$this->routesTemplate();
    	
    }
    
    public function addTemplate(){
    	
    	$addPage = '    <div class="container top">';
    	$addPage = $addPage.$this->breadcrumbAdd();
    	$addPage = $addPage.$this->pageHeaderAdd();
    	$addPage = $addPage.$this->flashMenssageAdd();
    	$addPage = $addPage.$this->pageFormAdd();
    	$addPage = $addPage.'        </div>';
    	if(!file_exists($this->containerView)){
    		mkdir($this->containerView, 777, TRUE );
    	}
    	file_put_contents($this->containerView.'add.php', $addPage);
    	//echo $addPage; 
    	
    }
    
    public function listTemplate(){
    	$addPage = '    <div class="container top">';
    	$addPage = $addPage.$this->breadcrumbList();
    	$addPage = $addPage.$this->pageHeaderList();
    	$addPage = $addPage.$this->pageFormList();
    	$addPage = $addPage.'        </div>';
    	file_put_contents($this->containerView.'list.php', $addPage);
    	//echo $addPage;
    }
    
    public function editTemplate(){
    	$addPage = '    <div class="container top">';
    	$addPage = $addPage.$this->breadcrumbEdit();
    	$addPage = $addPage.$this->pageHeaderEdit();
    	$addPage = $addPage.$this->flashMenssageEdit();
    	$addPage = $addPage.$this->pageFormEdit();
    	$addPage = $addPage.'        </div>';
    	file_put_contents($this->containerView.'edit.php', $addPage);
    	//echo $addPage;
    }
    
    public function controllerTemplate(){
    	
    	$addPage = '<?php';
    	$addPage = $addPage.'
    			require_once(APPPATH . \'controllers/App_controller\' . EXT);';    	
    	$addPage = $addPage.'
    			class '.$this->newControllerNamePlural.' extends App_controller {';    	
    	$addPage = $addPage.'
    			const VIEW_FOLDER = \'admin/'.$this->newControllerNamePlural.'\';';
    	$addPage = $addPage.$this->controllerConstruct();
    	$addPage = $addPage.$this->controllerIndex();
    	$addPage = $addPage.$this->controllerAdd();
    	$addPage = $addPage.$this->controllerUpdate();
    	$addPage = $addPage.$this->controllerDelete();
    	$addPage = $addPage.'';
    	$addPage = $addPage.'}';
    	if(!file_exists($this->containerController)){
    		mkdir($this->containerController, 777);
    	}
    	file_put_contents($this->containerController.$this->newControllerNamePlural.'.php', $addPage);
    	//echo $addPage; 
    	
    }
	public function modelTemplate(){
		
		$addPage = '<?php';
		$addPage = $addPage.'
				require_once(APPPATH . \'models/App_DAO\' . EXT);';
		$addPage = $addPage.'
    			class '.$this->newControllerNamePlural.'dao extends App_DAO {';
		$addPage = $addPage.'
    			const VIEW_FOLDER = \'admin/'.$this->newControllerNamePlural.'\';';
		$addPage = $addPage.$this->modelConstruct();
		$addPage = $addPage.$this->modelGetById();
		$addPage = $addPage.$this->modelGet();
		$addPage = $addPage.$this->modelCount();
		$addPage = $addPage.$this->modelAdd();
		$addPage = $addPage.$this->modelUpdate();
		$addPage = $addPage.$this->modelDelete();
		$addPage = $addPage.'}';
		if(!file_exists($this->containerModel)){
			mkdir($this->containerModel, 777);
		}
		file_put_contents($this->containerModel.$this->newControllerNamePlural.'dao.php', $addPage);
		//echo $addPage/
    }

    public function modelConstruct(){
    	$tag = '
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = \''.$this->newControllerNamePlural.'\';
	    }
    	';
    	return $tag;
    }
    
    public function modelGetById(){
    	$tag = '
    	/**
	    * Get '.$this->newControllerName.' by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_'.$this->newControllerName.'_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	';
    	return $tag;
    }
    
    public function modelGet(){
    	$tag = '
	    /**
	    * Fetch '.$this->newControllerNamePlural.' data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_'.$this->newControllerNamePlural.'($search_string=null, $order=null, $order_type=\'Asc\', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select(\'*\');
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like(\'titulo\', $search_string);
			}
			$this->db->group_by(\'id\');
	
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
			    $this->db->order_by(\'id\', $order_type);
			}
	
	        if($limit_start && $limit_end){
	          $this->db->limit($limit_start, $limit_end);	
	        }
	
	        if($limit_start != null){
	          $this->db->limit($limit_start, $limit_end);    
	        }
	        
			$query = $this->db->get();
			
			return $query->result_array(); 	
	    }    			
    	';
    	return $tag;
    }
    
    public function modelCount(){
    	$tag = '
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_'.$this->newControllerNamePlural.'($search_string=null, $order=null)
	    {
			$this->db->select(\'*\');
			$this->db->from($this->table);
			if($search_string){
				$this->db->like(\'titulo\', $search_string);
			}
			if($order){
				$this->db->order_by($order, \'Asc\');
			}else{
			    $this->db->order_by(\'id\', \'Asc\');
			}
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	';
    	return $tag;
    }
    
    public function modelAdd(){
    	$tag = '
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_'.$this->newControllerName.'($data)
	    {
	    	return $this->insert_query($data);
		}
    	';
    	return $tag;
    }
    
    public function modelUpdate(){
    	$tag = '
    	/**
	    * Update '.$this->newControllerName.'
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_'.$this->newControllerName.'($id, $data)
	    {
			$this->db->where(\'id\', $id);
			$this->db->update($this->table, $data);
			$report = array();
			$report[\'error\'] = $this->db->_error_number();
			$report[\'message\'] = $this->db->_error_message();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}
    	';
    	return $tag;
    }

    public function modelDelete(){
    	$tag = '
	    /**
	    * Delete '.$this->newControllerName.'
	    * @param int $id - '.$this->newControllerName.' id
	    * @return boolean
	    */
		function delete_'.$this->newControllerName.'($id){
			$this->delete_query($id); 
		}    			
    	';
    	return $tag;
    }
    
    public function controllerConstruct(){
    	$tag = '
    		public function __construct()
		    {
		        parent::__construct();
		        $this->load->model(\''.$this->newControllerNamePlural.'dao\');
		
		        if(!$this->session->userdata(\'logged_in\')){
		            redirect(\'admin/login\');
		        }
		    }
    	';
    	return $tag;
    }

    public function controllerIndex(){
    	$tag = '
    public function index()
    {

        //all the posts sent by the view
        $search_string = $this->input->post(\'search_string\');        
        $order = $this->input->post(\'order\'); 
        $order_type = $this->input->post(\'order_type\'); 

        //pagination settings
        $config[\'per_page\'] = 30;

        $config[\'base_url\'] = base_url().\'admin/'.$this->newControllerNamePlural.'\';
        $config[\'use_page_numbers\'] = TRUE;
        $config[\'num_links\'] = 20;
        $config[\'full_tag_open\'] = \'<ul>\';
        $config[\'full_tag_close\'] = \'</ul>\';
        $config[\'num_tag_open\'] = \'<li>\';
        $config[\'num_tag_close\'] = \'</li>\';
        $config[\'cur_tag_open\'] = \'<li class="active"><a>\';
        $config[\'cur_tag_close\'] = \'</a></li>\';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config[\'per_page\']) - $config[\'per_page\'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //if order type was changed
        if($order_type){
            $filter_session_data[\'order_type\'] = $order_type;
        }
        else{
            //we have something stored in the session? 
            if($this->session->userdata(\'order_type\')){
                $order_type = $this->session->userdata(\'order_type\');    
            }else{
                //if we have nothing inside session, so it\'s the default "Asc"
                $order_type = \'Asc\';    
            }
        }
        //make the data type var avaible to our view
        $data[\'order_type_selected\'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it\'s the first time we load the content
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
                $filter_session_data[\'search_string_selected\'] = $search_string;
            }else{
                $search_string = $this->session->userdata(\'search_string_selected\');
            }
            $data[\'search_string_selected\'] = $search_string;

            if($order){
                $filter_session_data[\'order\'] = $order;
            }
            else{
                $order = $this->session->userdata(\'order\');
            }
            $data[\'order\'] = $order;

            //save session data into the session
            if(isset($filter_session_data)){
              $this->session->set_userdata($filter_session_data);    
            }
            
            //fetch sql data into arrays
            $data[\'count_products\']= $this->'.$this->newControllerNamePlural.'dao->count_'.$this->newControllerNamePlural.'($search_string, $order);
            $config[\'total_rows\'] = $data[\'count_products\'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data[\''.$this->newControllerNamePlural.'\'] = $this->'.$this->newControllerNamePlural.'dao->get_'.$this->newControllerNamePlural.'($search_string, $order, $order_type, $config[\'per_page\'],$limit_end);        
                }else{
                    $data[\''.$this->newControllerNamePlural.'\'] = $this->'.$this->newControllerNamePlural.'dao->get_'.$this->newControllerNamePlural.'($search_string, \'\', $order_type, $config[\'per_page\'],$limit_end);           
                }
            }else{
                if($order){
                    $data[\''.$this->newControllerNamePlural.'\'] = $this->'.$this->newControllerNamePlural.'dao->get_'.$this->newControllerNamePlural.'(\'\', $order, $order_type, $config[\'per_page\'],$limit_end);        
                }else{
                    $data[\''.$this->newControllerNamePlural.'\'] = $this->'.$this->newControllerNamePlural.'dao->get_'.$this->newControllerNamePlural.'(\'\', \'\', $order_type, $config[\'per_page\'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data[\''.$this->newControllerName.'_selected\'] = null;
            $filter_session_data[\'search_string_selected\'] = null;
            $filter_session_data[\'order\'] = null;
            $filter_session_data[\'order_type\'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data[\'search_string_selected\'] = \'\';
            $data[\'order\'] = \'id\';

            //fetch sql data into arrays
            $data[\'count_products\']= $this->'.$this->newControllerNamePlural.'dao->count_'.$this->newControllerNamePlural.'();
            $data[\''.$this->newControllerNamePlural.'\'] = $this->'.$this->newControllerNamePlural.'dao->get_'.$this->newControllerNamePlural.'(\'\', \'\', $order_type, $config[\'per_page\'],$limit_end);        
            $config[\'total_rows\'] = $data[\'count_products\'];

        }//!isset($search_string) && !isset($order)
         
        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data[\'main_content\'] = \'admin/'.$this->newControllerNamePlural.'/list\';
        $this->load->view(\'includes/template\', $data);  

    }//index    
    	';
    	return $tag;
    }
    
    public function controllerAdd(){
    	$tag = '
public function add()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server(\'REQUEST_METHOD\') === \'POST\')
        {

            //form validation';
        foreach($this->atributos as $key => $atributo) : 
        	$tag = $tag . '
        	$this->form_validation->set_rules(\''.$atributo.'\', \''.$atributo.'\', \'required\'); ';
        endforeach;
        $tag = $tag .'
            $this->form_validation->set_error_delimiters(\'<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>\', \'</strong></div>\');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(';
        foreach($this->atributos as $key => $atributo) :
        	$tag = $tag . '\''.$atributo.'\' => $this->input->post(\''.$atributo.'\'),';
        endforeach;
        $tag = $tag . '
                );
                //if the insert has returned true then we show the flash message
                if($this->'.$this->newControllerNamePlural.'dao->store_'.$this->newControllerName.'($data_to_store)){
                    $data[\'flash_message\'] = TRUE; 
                }else{
                    $data[\'flash_message\'] = FALSE; 
                }

            }

        }
        //load the view
        $data[\'main_content\'] = \'admin/'.$this->newControllerNamePlural.'/add\';
        $this->load->view(\'includes/template\', $data);  
    }       
    			
    	';
    	return $tag;
    }
    
    public function controllerUpdate(){
    	$tag = '
    public function update()
    {
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server(\'REQUEST_METHOD\') === \'POST\')
        {
            //form validation';
        foreach($this->atributos as $key => $atributo) : 
        	$tag = $tag . '
        	$this->form_validation->set_rules(\''.$atributo.'\', \''.$atributo.'\', \'required\');';
        endforeach;
        $tag = $tag .'
            $this->form_validation->set_error_delimiters(\'<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>\', \'</strong></div>\');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(';
        foreach($this->atributos as $key => $atributo) : 
        	$tag = $tag . '
        	\''.$atributo.'\' => $this->input->post(\''.$atributo.'\'),';
        endforeach;
        $tag = $tag .'                    
                );
                //if the insert has returned true then we show the flash message
                if($this->'.$this->newControllerNamePlural.'dao->update_'.$this->newControllerName.'($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata(\'flash_message\', \'updated\');
                }else{
                    $this->session->set_flashdata(\'flash_message\', \'not_updated\');
                }
                redirect(\'admin/'.$this->newControllerNamePlural.'/update/\'.$id.\'\');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data[\''.$this->newControllerName.'\'] = $this->'.$this->newControllerNamePlural.'dao->get_'.$this->newControllerName.'_by_id($id);
        //load the view
        $data[\'main_content\'] = \'admin/'.$this->newControllerNamePlural.'/edit\';
        $this->load->view(\'includes/template\', $data);            

    }//update    			
    	';
    	return $tag;
    }
    
    public function controllerDelete(){
    	$tag = '
    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //product id 
        $id = $this->uri->segment(4);
        $this->'.$this->newControllerNamePlural.'dao->delete_'.$this->newControllerName.'($id);
        redirect(\'admin/'.$this->newControllerNamePlural.'\');
    }//edit    			
    	';
    	return $tag;
    }
    
    public function routesTemplate(){
    	$addPage='
    				$route[\'admin/'.$this->newControllerNamePlural.'\'] = \''.$this->newControllerNamePlural.'/index\';
				$route[\'admin/'.$this->newControllerNamePlural.'/add\'] = \''.$this->newControllerNamePlural.'/add\';
				$route[\'admin/'.$this->newControllerNamePlural.'/update\'] = \''.$this->newControllerNamePlural.'/update\';
				$route[\'admin/'.$this->newControllerNamePlural.'/update/(:any)\'] = \''.$this->newControllerNamePlural.'/update/$1\';
				$route[\'admin/'.$this->newControllerNamePlural.'/delete/(:any)\'] = \''.$this->newControllerNamePlural.'/delete/$1\';
				$route[\'admin/'.$this->newControllerNamePlural.'/(:any)\'] = \''.$this->newControllerNamePlural.'/index/$1\'; //$1 = page number
    			';
    	// echo $addPage; 
    	if(!file_exists($this->containerRoutes)){
    		mkdir($this->containerRoutes, 777);
    	}
    	file_put_contents($this->containerRoutes.$this->newControllerNamePlural.'.php', $addPage);
    	
    } 
    
    public function breadcrumbAdd(){
    	$tag  = '
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").\'/\'.$this->uri->segment(2); ?>">
	            <?php echo ucfirst($this->uri->segment(2));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Novo</a>
	        </li>
	      </ul>';
    	return  $tag;
    }
    
	public function breadcrumbEdit(){
    	$tag  = '
	      <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li>
	          <a href="<?php echo site_url("admin").\'/\'.$this->uri->segment(2); ?>">
	            <?php echo ucfirst($this->uri->segment(2));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <a href="#">Update</a>
	        </li>
	      </ul>';
    	return  $tag;
    }
    
    public function breadcrumbList(){
    	$tag  = '
		  <ul class="breadcrumb">
	        <li>
	          <a href="<?php echo site_url("admin"); ?>">
	            <?php echo ucfirst($this->uri->segment(1));?>
	          </a> 
	          <span class="divider">/</span>
	        </li>
	        <li class="active">
	          <?php echo ucfirst($this->uri->segment(2));?>
	        </li>
	      </ul>';
    	return  $tag;
    }    
    
    public function pageHeaderAdd(){
		$tag = '      
	      <div class="page-header">
	        <h2>
	          Adicionar <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div>';
      	return $tag;    
    }
    
    public function pageHeaderEdit(){
    	$tag = '
	      <div class="page-header">
	        <h2>
	          Atualizar <?php echo ucfirst($this->uri->segment(2));?>
	        </h2>
	      </div>';
    	return $tag;
    }
    
    public function pageHeaderList(){
    	$tag = '
	      <div class="page-header users-header">
    		<h2>
              <?php echo ucfirst($this->uri->segment(2));?>
              <a  href="<?php echo site_url("admin").\'/\'.$this->uri->segment(2); ?>/add" class="btn btn-success">Adicionar Novo</a>
            </h2>
          </div>';
    	return $tag;
    }
    
    public function flashMenssageAdd(){
    	$tag = ' 
	      <?php
	      //flash messages
	      if(isset($flash_message)){
	        if($flash_message == TRUE)
	        {
	          echo \'<div class="alert alert-success">\';
	            echo \'<a class="close" data-dismiss="alert">×</a>\';
	            echo \'<strong>Well done!</strong> new '.$this->newControllerName.' created with success.\';
	          echo \'</div>\';       
	        }else{
	          echo \'<div class="alert alert-error">\';
	            echo \'<a class="close" data-dismiss="alert">×</a>\';
	            echo \'<strong>Oh snap!</strong> change a few things up and try submitting again.\';
	          echo \'</div>\';          
	        }
	      }
	      ?>'; 
	     return $tag;     
    }
    
    public function flashMenssageEdit(){
    	$tag = '
	     <?php
	      //flash messages
	      if($this->session->flashdata(\'flash_message\')){
	        if($this->session->flashdata(\'flash_message\') == \'updated\')
	        {
	          echo \'<div class="alert alert-success">\';
	            echo \'<a class="close" data-dismiss="alert">×</a>\';
	            echo \'<strong>Well done!</strong> '.$this->newControllerName.' updated with success.\';
	          echo \'</div>\';       
	        }else{
	          echo \'<div class="alert alert-error">\';
	            echo \'<a class="close" data-dismiss="alert">×</a>\';
	            echo \'<strong>Oh snap!</strong> change a few things up and try submitting again.\';
	          echo \'</div>\';          
	        }
	      }
	      ?>';
    	return $tag;
    }
    
    public function pageFormAdd(){
		$tag = ' 
		    <?php
		      //form data
		      $attributes = array("class" => "form-horizontal", "id" => "");
			  /*
			  $options_ = array();
		      foreach ($VARIAVELFROMCONTROLLER as $row)
		      {
		      	$options_[$row["id"]] = $row["titulo"];
		      }
			  
			  echo \'<div class="control-group">\';
		          echo \'<label for="inputError" class="control-label">Camada</label>\';
		          echo \'<div class="controls">\';			          
		          	echo form_dropdown(\'id_\', $options_, set_value(\'id_\'), \'class="span2"\');			          
		          echo \'</div>\';
	          echo \'</div>\';	
				
			  */
				
		      //form validation
		      echo validation_errors();
		      
		      echo form_open("admin/'.$this->newControllerNamePlural.'/add", $attributes);
		     ?>
		     <fieldset>';
    	if(empty($this->atributos)){
			$tag = $tag . '	  
			  <div class="control-group">
	            <label for="inputError" class="control-label">Titulo</label>
	            <div class="controls">
	              <input type="text" id="" name="titulo" value="<?php echo set_value(\'titulo\'); ?>" >
	              <!--<span class="help-inline">Woohoo!</span>-->
	            </div>
	          </div>';	    		
    	}else{    		
			foreach($this->atributos as $key => $atributo)	:
				$tag = $tag.
				  '<div class="control-group">
		            <label for="inputError" class="control-label">'.$key.'</label>
		            <div class="controls">
		              <input type="text" id="" name="'.$atributo.'" value="<?php echo set_value(\''.$atributo.'\'); ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>';
			endforeach;    	
    	
    	}	
    	$tag = $tag.'
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
	
	      <?php echo form_close(); ?>';
    	return $tag;
    }

    public function pageFormEdit(){
    	$tag = '
		    <?php
		      //form data
		      $attributes = array("class" => "form-horizontal", "id" => "");
    		  /*
    		  $options_ = array();
		      foreach ($VARIAVELFROMCONTROLLER as $row)
		      {
		      	$options_[$row["id"]] = $row["titulo"];
		      }	
    		  <?php 
				     echo 
				     	  \'<div class="control-group">
				            <label for="inputError" class="control-label">Classe </label>
				            <div class="controls">\';
				              
		    		 echo form_dropdown(\'id_\', $options_, '.$this->newControllerNamePlural.'[0][\'id_\'] );	
				     echo          
				            \'</div>
				          </div>\';	
			  ?>
    		  */
		      //form validation
		      echo validation_errors();
    
		      echo form_open("admin/'.$this->newControllerNamePlural.'/update/".$this->uri->segment(4), $attributes);
		     ?>
		     <fieldset>';
    	if(empty($this->atributos)){
    		$tag = $tag . '
			  <div class="control-group">
	            <label for="inputError" class="control-label">Titulo</label>
	            <div class="controls">
	              <input type="text" id="" name="titulo" value="<?php echo $'.$this->newControllerName.'[0][\'titulo\']; ?>" >
	              <!--<span class="help-inline">Woohoo!</span>-->
	            </div>
	          </div>';
    	}else{
    		foreach($this->atributos as $key => $atributo)	:
    		$tag = $tag.
    		'<div class="control-group">
		            <label for="inputError" class="control-label">'.$key.'</label>
		            <div class="controls">
		              <input type="text" id="" name="'.$atributo.'" value="<?php echo $'.$this->newControllerName.'[0][\''.$atributo.'\']; ?>" >
		              <!--<span class="help-inline">Woohoo!</span>-->
		            </div>
		          </div>';
    		endforeach;
    		 
    	}
    	$tag = $tag.'
	          <div class="form-actions">
	            <button class="btn btn-primary" type="submit">Salvar Modificações</button>
	            <button class="btn" type="reset">Cancelar</button>
	          </div>
	        </fieldset>
    
	      <?php echo form_close(); ?>';
    	return $tag;
    }
        
    public function pageFormList(){    	
    	
    	$i = 0;   
    	$tag = '
	  <div class="row">
        <div class="span12 columns">
          <div class="well">
           
            <?php
           
            $attributes = array("class" => "form-inline reset-margin", "id" => "myform");
           
            //save the columns names in a array that we will use as filter         
            $options_'.$this->newControllerNamePlural.' = array();    
            foreach ($'.$this->newControllerNamePlural.' as $array) {
              foreach ($array as $key => $value) {
                $options_'.$this->newControllerNamePlural.'[$key] = $key;
              }
              break;
            }

            echo form_open("admin/'.$this->newControllerNamePlural.'", $attributes);
     
              echo form_label("Search:", "search_string");
              echo form_input("search_string", $search_string_selected);

              echo form_label("Order by:", "order");
              echo form_dropdown("order", $options_'.$this->newControllerNamePlural.', $order, \'class="span2"\');

              $data_submit = array("name" => "mysubmit", "class" => "btn btn-primary", "value" => "Ir");

              $options_order_type = array("Asc" => "Asc", "Desc" => "Desc");
              echo form_dropdown("order_type", $options_order_type, $order_type_selected, \'class="span1"\');

              echo form_submit($data_submit);

            echo form_close();
            ?>

          </div>
          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
            	<th class="header">#</th>'."\r\n"."\t"."\t"."\t"."\t";
    	
		if(empty($this->atributos)){
          	$tag = $tag . '                
    			<th class="yellow header headerSortDown">Título</th>    	
    		  </tr>
	        </thead>
	        <tbody>
              <?php
              foreach('.$this->newControllerNamePlural.' as $row)
              {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
    			echo "<td>".$row["titulo"]."</td>;';
    		
    	}else{
    		foreach($this->atributos as $key => $atributo)	:
	    		if($i == 0){
	    			$tag = $tag.'<th class="yellow header headerSortDown">'.$key.'</th>'."\r\n"."\t"."\t"."\t"."\t";
	    		}else if($i == 1){
	    			$tag = $tag.'<th class="green header">'.$key.'</th>'."\r\n"."\t"."\t"."\t"."\t";
	    		}else{
	    			$tag = $tag.'<th class="red header">'.$key.'</th>'."\r\n"."\t"."\t"."\t"."\t";
	    		};
    		endforeach;
    		$tag = $tag . '
	    				</tr>
	            </thead>
	            <tbody>
	              <?php
	              foreach($'.$this->newControllerNamePlural.' as $row)
	              {
	                echo \'<tr>\';
	                echo \'<td>\'.$row[\'id\'].\'</td>\';'."\r\n"."\t"."\t"."\t"."\t"."\t";
    		
    		foreach($this->atributos as $key => $atributo)	:
    			$tag = $tag . 'echo \'<td>\'.$row[\''.$atributo.'\'].\'</td>\';'."\r\n"."\t"."\t"."\t"."\t"."\t";
    		endforeach;
    		
    	}
    
    	$tag = $tag.'
	          echo \'<td class="crud-actions">
                  <a href="\'.site_url("admin").\'/'.$this->newControllerNamePlural.'/update/\'.$row[\'id\'].\'" class="btn btn-info">Ver & editar</a>  
                  <a href="\'.site_url("admin").\'/'.$this->newControllerNamePlural.'/delete/\'.$row[\'id\'].\'" class="btn btn-danger">deletar</a>
                </td>\';
                echo "</tr>";
              }
              ?>      
            </tbody>
          </table>

          <?php echo \'<div class="pagination">\'.$this->pagination->create_links().\'</div>\'; ?>

      </div>';
	      
    	return $tag;
    }

}

