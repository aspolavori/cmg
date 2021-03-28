<?php
				require_once(APPPATH . 'models/App_DAO' . EXT);
    			class tipo_ocorrenciasdao extends App_DAO {
    			const VIEW_FOLDER = 'admin/tipo_ocorrencias';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'dbo.TB_TIPO_OCORRENCIA';
	    }
    	
    	/**
	    * Get tipo_ocorrencia by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_tipo_ocorrencia_by_id($id)
	    {
	    	$result = $this->db->get_where($this->table, array( ID_TIPO_OCORRENCIA => $id));
    		return $result->result_array();		 
	    } 
    	
	    /**
	    * Fetch tipo_ocorrencias data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_tipo_ocorrencias($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select('*');
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
				
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
			    $this->db->order_by('ID_TIPO_OCORRENCIA', $order_type);
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
	    function count_tipo_ocorrencias($search_string=null, $order=null)
	    {
			$this->db->select('*');
			$this->db->from($this->table);
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			if($order){
				$this->db->order_by($order, 'Asc');
			}else{
			    $this->db->order_by('ID_TIPO_OCORRENCIA', 'Asc');
			}
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_tipo_ocorrencia($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update tipo_ocorrencia
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_tipo_ocorrencia($id, $data)
	    {
			$this->db->where('ID_TIPO_OCORRENCIA', $id);
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
	    * Delete tipo_ocorrencia
	    * @param int $id - tipo_ocorrencia id
	    * @return boolean
	    */
		function delete_tipo_ocorrencia($id){
			$result = $this->db->query('DELETE FROM '.$this->table.' where ID_TIPO_OCORRENCIA = '. $id );
    		return $result;
		}    			
    	}