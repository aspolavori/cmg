<?php

require_once(APPPATH . 'models/App_DAO' . EXT);

class vpoldao extends App_DAO {

	const VIEW_FOLDER = 'admin/vpol';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
    			
		public $hdmRelTable = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'vpol';
	        $this->hdmRelTable = 'hdm_veiculos_vmo_vpol_vv';
	    }
    	
    	/**
	    * Get vpol by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_vpol_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch vpol data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_vpol($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select('*');
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			$this->db->group_by('id');
	
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
			    $this->db->order_by('id', $order_type);
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
    	
	    function get_vpol_custo_by_id_hdm_veiculo($id){
	    
	    	$query = 'select * from '.$this->table.
	    	' inner join '.$this->hdmRelTable.
	    	' on ( '.$this->hdmRelTable.'.id_vpol = '.$this->table.'.id )'.
	    	' where '.$this->hdmRelTable.'.id_hdm_veiculos = '.$id.' order by '.$this->table.'.id ;' ;
	    
	    	$result = $this->db->query($query);
	    	 
	    	return $result->result_array();
	    }
	    
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_vpol($search_string=null, $order=null)
	    {
			$this->db->select('*');
			$this->db->from($this->table);
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			if($order){
				$this->db->order_by($order, 'Asc');
			}else{
			    $this->db->order_by('id', 'Asc');
			}
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_vpol($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update vpol
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_vpol($id, $data)
	    {
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
			$report = array();
			$report['error'] = $this->db->_error_number();
			$report['message'] = $this->db->_error_message();
			if($report !== 0){
				return true;
			}else{
				return false;
			}
		}
    	
	    /**
	    * Delete vpol
	    * @param int $id - vpol id
	    * @return boolean
	    */
		function delete_vpol($id){
			$this->delete_query($id); 
		}    			
    	}