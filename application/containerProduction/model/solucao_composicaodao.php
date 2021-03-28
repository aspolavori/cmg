<?php
				require_once(APPPATH . 'models/App_DAO' . EXT);
    			class solucao_composicaodao extends App_DAO {
    			const VIEW_FOLDER = 'admin/solucao_composicao';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'solucao_composicao';
	    }
    	
    	/**
	    * Get solucao_composicao by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_solucao_composicao_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch solucao_composicao data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_solucao_composicao($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
    	
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_solucao_composicao($search_string=null, $order=null)
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
	    function store_solucao_composicao($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update solucao_composicao
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_solucao_composicao($id, $data)
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
	    * Delete solucao_composicao
	    * @param int $id - solucao_composicao id
	    * @return boolean
	    */
		function delete_solucao_composicao($id){
			$this->delete_query($id); 
		}    			
    	}