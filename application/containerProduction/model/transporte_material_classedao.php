<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class transporte_material_classedao extends App_DAO {

	const VIEW_FOLDER = 'admin/transporte_material_classe';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'transporte_material_classe';
	    }
    	
    	/**
	    * Get transporte_material_classe by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_transporte_material_classe_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch transporte_material_classe data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_transporte_material_classe($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_transporte_material_classe($search_string=null, $order=null)
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
	    function store_transporte_material_classe($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update transporte_material_classe
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_transporte_material_classe($id, $data)
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
	    * Delete transporte_material_classe
	    * @param int $id - transporte_material_classe id
	    * @return boolean
	    */
		function delete_transporte_material_classe($id){
			$this->delete_query($id); 
		}    			
    	
		/**
		 * Fetch transporte_material_classe data from the database
		 * possibility to mix search, filter and order
		 * @param string $search_string
		 * @param strong $order
		 * @param string $order_type
		 * @param int $limit_start
		 * @param int $limit_end
		 * @return array
		 */
		public function get_transporte_material_classe_id_secundario()
		{
		
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->group_by('titulo');
			$this->db->order_by('id');
			
			 
			$query = $this->db->get();
				
			return $query->result_array();
		}
		
		
}