<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class sicro_material_custodao extends App_DAO {
	const VIEW_FOLDER = 'admin/sicro_material_custo';
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	
		public $sicroTable = null;
		public $materialTable = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'sicro_material_custo';
	        $this->sicroTable = 'sicros';
	        $this->materialTable = 'materiais';
	    }
    	
    	/**
	    * Get sicro_material_custo by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_sicro_material_custo_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch sicro_material_custo data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_sicro_material_custo($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
    	
	    
	    public function get_sicro_material_custo_by_id_sicro($id)
	    {
	    	 
	    	$this->db->select($this->table.'.*, '
	    					 .$this->materialTable.'.codigo, '
	    					 .$this->materialTable.'.titulo, '
	    					 .$this->materialTable.'.unidade '  );
	    	$this->db->from($this->sicroTable);
	    	$this->db->join($this->table, $this->sicroTable.'.id = '.$this->table.'.id_sicro' , 'inner');
	    	$this->db->join($this->materialTable, $this->materialTable.'.id = '.$this->table.'.id_material' , 'inner');
	    	$this->db->where($this->sicroTable.'.id', $id );
	    	$this->db->order_by($this->materialTable.'.codigo' , 'ASC');
	    	 
	    	$query = $this->db->get();
	    	 
	    	return $query->result_array();
	    }
	    
	    public function get_sicro_material_custo_not_defined_by_id_sicro($id)
	    {
	    	 
	    	$query = 'select '.$this->materialTable.'.* from '.$this->materialTable.' where '.$this->materialTable.'.id NOT IN ('
	    			.'select '.$this->materialTable.'.id from '.$this->sicroTable.'
							inner join '.$this->table.' on ('.$this->sicroTable.'.id = '.$this->table.'.id_sicro)
							inner join '.$this->materialTable.' on ('.$this->table.'.id_material = '.$this->materialTable.'.id )
							where '.$this->sicroTable.'.id = '.$id.' ) ';
	    
	    	 
	    
	    	return $this->exec_query($query);	;
	    }
	    
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_sicro_material_custo($search_string=null, $order=null)
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
	    function store_sicro_material_custo($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update sicro_material_custo
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_sicro_material_custo($id, $data)
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
	    * Delete sicro_material_custo
	    * @param int $id - sicro_material_custo id
	    * @return boolean
	    */
		function delete_sicro_material_custo($id){
			$this->delete_query($id); 
		}    			
    	}