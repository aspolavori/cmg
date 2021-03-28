<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class visualizatabelasdao extends App_DAO {
	
    	const VIEW_FOLDER = 'admin/visualizatabelas';
    	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'listamedicoes';
	    }
    	
	    /**
	    * Fetch visualizatabelas data from the database
	    * possibility to mix search, filter and order
	    * @param string $table
	    * @param int 	$idRegiao
	    * @param string $search_string 
	    * @param string $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_visualizatabelas($table, $idRegiao, $colunaSearch=null, $search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null, $coluna=null, $startRange=null, $endRange=null)
	    {
			    $database = $this->get_db_origem($table);
			   
    			if(!$database){
    				return false;
    			}
    			if($database == 'simcosta'){
    				$database = 'default';
    			}
	    		$db = $this->load->database($database, TRUE);
	    		$db->select('*');
	    		$db->from($table);
	    		$db->where('id_fundeio = '.$idRegiao);
	    		
	    		if($coluna !=  null){
	    		
	    			if($startRange != null){
	    				$db->where($coluna.' >=', $startRange);
	    			}
	    			if($endRange != null){
	    				$db->where($coluna.' <=', $endRange);
	    			}
	    		}
	    		 
	    		if($search_string){
	    			$db->like($colunaSearch, $search_string);
	    		}
	    		 
	    		if($order){
	    			$db->order_by($order, $order_type);
	    		}
	    		 
	    		if($limit_start && $limit_end){
	    			$db->limit($limit_start, $limit_end);
	    		}
	    		 
	    		if($limit_start != null){
	    			$db->limit($limit_start, $limit_end);
	    		}
	    		
	    		$query = $db->get();
	    		$db->close();
	    		return $query->result_array();
	    	 	
	    }    			
    	
	    /**
	    * Count the number of rows
	    * @param char $search_string
	    * @param char $order
	    * @return int
	    */
	    function count_visualizatabelas($table, $idRegiao, $colunaSearch=null, $search_string=null, $order=null, $coluna=null, $startRange=null, $endRange=null)
	    {
	    	$database = $this->get_db_origem($table);
	    	if(!$database){
	    		return false;
	    	}
	    	if($database == 'simcosta'){
	    		$database = 'default';
	    	}
	    	$db = $this->load->database($database, TRUE);
			$db->select('*');
			$db->from($table);
			$db->where('id_fundeio = '.$idRegiao);
			
			if($coluna !=  null){
					
				if($startRange != null){
					$db->where($coluna.' >=', $startRange);
				}
				if($endRange != null){
					$db->where($coluna.' <=', $endRange);
				}
			}
						
			if($search_string){
				$db->like($colunaSearch, $search_string);
			}
			if($order){
				$db->order_by($order, 'Asc');
			}
			
			$query = $db->get();
			$db->close();
			return $query->num_rows();        
	    }

	    function get_db_origem($table){
	    	$this->db->select('origembd');
	    	$this->db->from($this->table);
	    	$this->db->where('titulodb = "'.$table.'"');
	    	$this->db->limit(1);
	    	$result = $this->db->get();
	    	$database = $result->result_array();
	    	if($database){
	    		return $database[0]['origembd'];
    		}else{
    			return false;
    		}
	    }
    	
    	
    	   			
}