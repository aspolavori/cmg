<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class consulta_contagensdao extends App_DAO {
	const VIEW_FOLDER = 'admin/consulta_contagens';
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
		public $classeveiculosTable = null;
		public $contagensTable = null;
		public $odTable = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'pesquisa_trafegos';
	        $this->classeveiculosTable 			= 'classeveiculos';
	        $this->contagensTable = 'contagens';
	        $this->odTable = 'origens_destinos';
	    }
    	
    	/**
	    * Get consulta_contagem by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_consulta_contagem_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch consulta_contagens data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_consulta_contagens($searchParameter, $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select($this->table.'.* , '.$this->classeveiculosTable.'.titulo as classeveiculo ');
			$this->db->from($this->table);
			$this->db->join($this->classeveiculosTable, $this->classeveiculosTable.'.id = '.$this->table.'.id_classeveiculos', 'inner');
					
			$this->db->where('uf', $searchParameter['uf']);
			$this->db->where('rodovia', $searchParameter['br']);
			$this->db->where('km >= ', $searchParameter['km_ini']);
			$this->db->where('km <= ', $searchParameter['km_fim']);
			$this->db->where('data_ini >=', $searchParameter['data_ini']);
			$this->db->where('data_fim <=', $searchParameter['data_fim']);
			
			$this->db->order_by('data_ini', 'asc');
			
	
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
	    function count_consulta_contagens($searchParameter)
	    {
			$this->db->select($this->table.'.* , '.$this->classeveiculosTable.'.titulo as classeveiculo ');
			$this->db->from($this->table);
			$this->db->join($this->classeveiculosTable, $this->classeveiculosTable.'.id = '.$this->table.'.id_classeveiculos', 'inner');
			
			$this->where('uf', $searchParameter['uf']);
			$this->where('rodovia', $searchParameter['br']);
			$this->where('km >= ', $searchParameter['km_ini']);
			$this->where('km <= ', $searchParameter['km_fim']);
			$this->where('data_ini >=', $searchParameter['data_ini']);
			$this->where('data_fim <=', $searchParameter['data_fim']);
			
			$this->db->order_by('data_ini', 'asc'); 
			
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_consulta_contagem($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update consulta_contagem
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_consulta_contagem($id, $data)
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
	    * Delete consulta_contagem
	    * @param int $id - consulta_contagem id
	    * @return boolean
	    */
		function delete_consulta_contagem($id){
			$this->delete_query($id); 
		}
		
		function exist_contagem($id){
			
			$this->db->select($this->table.'.id ');
			$this->db->from($this->table);
			$this->db->join($this->contagensTable, $this->contagensTable.'.id_pesquisa_trafegos = '.$this->table.'.id', 'inner');
			
			$this->db->where($this->table.'.id', $id);
				
			$query = $this->db->get();
			if($query->num_rows()){
				return true;
			}else{
				return false;
			}
		}

		function exist_od($id){
				
			$this->db->select($this->table.'.id ');
			$this->db->from($this->table);
			$this->db->join($this->odTable, $this->odTable.'.id_pesquisa = '.$this->table.'.id', 'inner');
				
			$this->db->where($this->table.'.id', $id);
		
			$query = $this->db->get();
			if($query->num_rows()){
				return true;
			}else{
				return false;
			}
		}
}