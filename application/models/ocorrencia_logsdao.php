<?php
				require_once(APPPATH . 'models/App_DAO' . EXT);
    			class ocorrencia_logsdao extends App_DAO {
    			const VIEW_FOLDER = 'admin/ocorrencia_logs';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'dbo.tb_ocorrencia_log';
	    }
    	
    	/**
	    * Get ocorrencia_log by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_ocorrencia_log_by_id($id)
	    {
	    	$result = $this->db->get_where($this->table, array( ID_OCORRENCIA_LOG => $id));
    		return $result->result_array();		 
	    } 
    	
	    /**
	    * Fetch ocorrencia_logs data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_ocorrencia_logs($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select('*');
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
				
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
			    $this->db->order_by('ID_OCORRENCIA_LOG', $order_type);
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
	    function count_ocorrencia_logs($search_string=null, $order=null)
	    {
			$this->db->select('*');
			$this->db->from($this->table);
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			if($order){
				$this->db->order_by($order, 'Asc');
			}else{
			    $this->db->order_by('ID_OCORRENCIA_LOG', 'Asc');
			}
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_ocorrencia_log($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update ocorrencia_log
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_ocorrencia_log($id, $data)
	    {
			$this->db->where('ID_OCORRENCIA_LOG', $id);
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
	    * Delete ocorrencia_log
	    * @param int $id - ocorrencia_log id
	    * @return boolean
	    */
		function delete_ocorrencia_log($id){
			$result = $this->db->query('DELETE FROM '.$this->table.' where ID_OCORRENCIA_LOG = '. $id );
    		return $result;
		}    			
    	}