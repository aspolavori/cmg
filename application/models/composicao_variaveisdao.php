<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class composicao_variaveisdao extends App_DAO {

	const VIEW_FOLDER = 'admin/composicao_variaveis';
	
	
		public $composicoesTable = null;
		public $variaveisTable = null;
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'composicao_variaveis';
	        $this->composicoesTable = 'composicoes';
	        $this->variaveisTable = 'variaveis';
	    }
    	
    	/**
	    * Get composicao_variaveis by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_composicao_variaveis_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch composicao_variaveis data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_composicao_variaveis($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_composicao_variaveis($search_string=null, $order=null)
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
	     * Get composicao_variaveis by his is
	     * @param int $id
	     * @return array
	     */
	    public function get_composicao_variaveis_by_id_composicao($id)
	    {
	    	$this->db->select('*');
			$this->db->from($this->table);
			$this->db->join($this->variaveisTable,$this->table.'.id_variaveis = '.$this->variaveisTable.'.id' , 'inner');
			
			$this->db->where($this->table.'.id_composicao', $id );
			
			$query = $this->db->get();
			return $query->result_array(); 	
	    }
	    
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_composicao_variaveis($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update composicao_variaveis
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_composicao_variaveis($id, $data)
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
	    * Delete composicao_variaveis
	    * @param int $id - composicao_variaveis id
	    * @return boolean
	    */
		function delete_composicao_variaveis($id){
			$this->delete_query($id); 
		}
		    			
}