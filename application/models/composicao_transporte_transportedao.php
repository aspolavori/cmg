<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class composicao_transporte_transportedao extends App_DAO {

	const VIEW_FOLDER = 'admin/composicao_transporte_transporte';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	
		public $composicaoTable = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'composicao_transporte_transporte';
	        $this->composicaoTable = 'composicao_transporte';
	    }
    	
    	/**
	    * Get composicao_transporte_transporte by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_composicao_transporte_transporte_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch composicao_transporte_transporte data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_composicao_transporte_transporte($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select($this->table.'.* , '.$this->composicaoTable.'.titulo ' );
			$this->db->from($this->table);
			$this->db->join($this->composicaoTable, $this->table.'.id_composicao_transporte = '.$this->composicaoTable.'.id ', 'inner'  );
	
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
	    function count_composicao_transporte_transporte($search_string=null, $order=null)
	    {
			$this->db->select($this->table.'.* , '.$this->composicaoTable.'.titulo ' );
			
			$this->db->from($this->table);
			$this->db->join($this->composicaoTable, $this->table.'.id_composicao_transporte = '.$this->composicaoTable.'.id ', 'inner'  );
			
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
	    function store_composicao_transporte_transporte($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update composicao_transporte_transporte
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_composicao_transporte_transporte($id, $data)
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
	    * Delete composicao_transporte_transporte
	    * @param int $id - composicao_transporte_transporte id
	    * @return boolean
	    */
		function delete_composicao_transporte_transporte($id){
			$this->delete_query($id); 
		}

		function get_id_material_class_material_by_id_composicao_transporte($id_composicao_transporte){
				
			$query="select ".$this->table.".id_transporte_material_classe1,
					       ".$this->table.".id_transporte_material_classe2
				 from ".$this->table."
				where
					".$this->table.".id_composicao_transporte = ".$id_composicao_transporte.";";
				
			$result = $this->db->query($query);
			return $result->result_array();
		}
		
}