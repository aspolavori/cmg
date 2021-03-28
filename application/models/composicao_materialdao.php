<?php

require_once(APPPATH . 'models/App_DAO' . EXT);

	class composicao_materialdao extends App_DAO {
    const VIEW_FOLDER = 'admin/composicao_material';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
    
    	public $composicaoTable = null;
    	public $materialTable = null;
    
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'composicao_material';
	        $this->composicaoTable = 'composicoes';
	        $this->materialTable = 'materiais';
	    }
    	
    	/**
	    * Get composicao_material by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_composicao_material_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch composicao_material data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_composicao_material($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
    	
	    public function get_composicao_material_by_id_composicao($id)
	    {
	    	 
	    	$this->db->select($this->table.'.*, '.$this->materialTable.'.codigo, '.$this->materialTable.'.titulo, '.$this->materialTable.'.unidade ' );
	    	$this->db->from($this->composicaoTable);
	    	$this->db->join($this->table, $this->composicaoTable.'.id = '.$this->table.'.id_composicao' , 'inner');
	    	$this->db->join($this->materialTable, $this->materialTable.'.id = '.$this->table.'.id_material' , 'inner');
	    	$this->db->where($this->composicaoTable.'.id', $id );
	    	$this->db->order_by($this->materialTable.'.codigo' , 'ASC');
	    	 
	    	$query = $this->db->get();
	    	 
	    	return $query->result_array();
	    }
	    
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_composicao_material($search_string=null, $order=null)
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
	    function store_composicao_material($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update composicao_material
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_composicao_material($id, $data)
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
	    * Delete composicao_material
	    * @param int $id - composicao_material id
	    * @return boolean
	    */
		function delete_composicao_material($id){
			$this->delete_query($id); 
		}    			
    	
	}