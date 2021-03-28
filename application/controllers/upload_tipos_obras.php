<?php
require_once(APPPATH . 'controllers/App_controller' . EXT);

class upload_tipos_obras extends App_controller {

	const VIEW_FOLDER = 'admin/upload_tipos_obras';
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_tipos_obrasdao');

        if(!$this->session->userdata('logged_in')){
            redirect('admin/login');
        }
    }
    	
    public function index()
    {

        
    	// talvez n dê andamento a essa funcao
    	$fileName = 'teste.txt';
    	$inputFile = UPLOAD . $fileName;
    	$separador = " ";
    	$arrayUnidades = array('TKM','M','M2','M3','UN','UND','T','KG','VB','MES','R$'); 
    	
    	
    	$fp = fopen($inputFile, "r");
    	$fileLines = array();
    	
    	$i = 0;
    	while (!feof($fp)){
    		//$test = fgets($fp) . "<br>";
    		$convert[] = fgets($fp);
    		//$rows[] = $convert;
    	}
    	
    	$k = 0;
    	for($i=0; $i<count($convert);$i++){
    		
    		$temp	=  explode("$separador", $convert[$i]);
    		$cod = $temp[0];
    		$desc = '';
    		$unidade ='';
    		$first = true;
    		$sub = false;
    		foreach($temp as $item){
    			if($item == 'SUBTOTAL'){
    				$i++;
    				$sub = true;
    				break 1;	
    			}else{
    				if(in_array($item, $arrayUnidades)){
    					$unidade = $item;
    					break 1;
    				}else{
    					if(!$first){
    						$desc .= ' '.$item;
    					}else{
    						$first = false;
    					}
    						
    				}
    			}
    		}
    		if(!$sub){
    			$rows =  array( 'codigo'   => $cod,
    					'descricao'=> substr($desc, 1),
    					'unidade'  => $unidade
    			);
    			$this->upload_tipos_obrasdao->store_upload_tipo_obra_ignore($rows); 
    			echo $cod.';'.substr($desc, 1).';'.$unidade."\n".'<br>';
    		}
    		
    		//para inserir no DB
    		//$this->upload_tipos_obrasdao->store_upload_tipo_obra($rows);
    		 
    	}
    	 echo '<pre>';
    		 //print_r($rows);
    	 echo '</pre>';
    	 die;
    	echo $i;
    	unset($rows);
    	
    	fclose($fp);
    	die;
    	
        //load the view
        $data['main_content'] = 'admin/upload_tipos_obras/list';
        $this->load->view('includes/template', $data);  

    }//index    
    	

}