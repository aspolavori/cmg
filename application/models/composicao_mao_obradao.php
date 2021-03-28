<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class composicao_mao_obradao extends App_DAO {

	const VIEW_FOLDER = 'admin/composicao_mao_obra';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	
		public $composicaoTable = null;
		public $mao_obraTable = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'composicao_mao_obra';
	        $this->composicaoTable = 'composicoes';
	        $this->mao_obraTable = 'mao_obra';
	    }
    	
    	/**
	    * Get composicao_mao_obra by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_composicao_mao_obra_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch composicao_mao_obra data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_composicao_mao_obra($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
    	
	    public function get_composicao_mao_obra_by_id_composicao($id)
	    {
	    	 
	    	$this->db->select($this->table.'.*, '.$this->mao_obraTable.'.codigo, '.$this->mao_obraTable.'.titulo ' );
	    	$this->db->from($this->composicaoTable);
	    	$this->db->join($this->table, $this->composicaoTable.'.id = '.$this->table.'.id_composicao' , 'inner');
	    	$this->db->join($this->mao_obraTable, $this->mao_obraTable.'.id = '.$this->table.'.id_mao_obra' , 'inner');
	    	$this->db->where($this->composicaoTable.'.id', $id );
	    	$this->db->order_by($this->mao_obraTable.'.codigo' , 'ASC');
	    	 
	    	$query = $this->db->get();
	    	 
	    	return $query->result_array();
	    }
	    
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_composicao_mao_obra($search_string=null, $order=null)
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
	    function store_composicao_mao_obra($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update composicao_mao_obra
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_composicao_mao_obra($id, $data)
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
	    * Delete composicao_mao_obra
	    * @param int $id - composicao_mao_obra id
	    * @return boolean
	    */
		function delete_composicao_mao_obra($id){
			$this->delete_query($id); 
		}    			
    	}