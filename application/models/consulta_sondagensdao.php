<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class consulta_sondagensdao extends App_DAO {
	const VIEW_FOLDER = 'admin/consulta_sondagens';
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
		public $tipoSondagemTable = null;
		public $resumoTable = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'sondagens';
	        $this->resumoTable = 'resumo_sondagens';
	        $this->tipoSondagemTable = 'tipo_sondagens';
	    }
    	
    	/**
	    * Get consulta_sondagem by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_consulta_sondagem_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch consulta_sondagens data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_consulta_sondagens($searchParameter, $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select($this->table.'.* , '.$this->tipoSondagemTable.'.titulo as tipoSondagem ');
			$this->db->from($this->table);
			$this->db->join($this->tipoSondagemTable, $this->tipoSondagemTable.'.id = '.$this->table.'.id_tipo_sondagem', 'inner');
					
			$this->db->where('uf', $searchParameter['uf']);
			$this->db->where('rodovia', $searchParameter['br']);
			$this->db->where('km_inicial >= ', $searchParameter['km_ini']);
			$this->db->where('km_final <= ', $searchParameter['km_fim']);
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
	    function count_consulta_sondagens($searchParameter)
	    {
			$this->db->select($this->table.'.* , '.$this->tipoSondagemTable.'.titulo as tipoSondagem ');
			$this->db->from($this->table);
			$this->db->join($this->tipoSondagemTable, $this->tipoSondagemTable.'.id = '.$this->table.'.id_tipo_sondagem', 'inner');
					
			$this->db->where('uf', $searchParameter['uf']);
			$this->db->where('rodovia', $searchParameter['br']);
			$this->db->where('km_inicial >= ', $searchParameter['km_ini']);
			$this->db->where('km_final <= ', $searchParameter['km_fim']);
			$this->db->where('data_ini >=', $searchParameter['data_ini']);
			$this->db->where('data_fim <=', $searchParameter['data_fim']);
			
			$this->db->order_by('data_ini', 'asc'); 
			
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_consulta_sondagem($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update consulta_sondagem
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_consulta_sondagem($id, $data)
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
	    * Delete consulta_sondagem
	    * @param int $id - consulta_sondagem id
	    * @return boolean
	    */
		function delete_consulta_sondagem($id){
			$this->delete_query($id); 
		}
		
		function exist_sondagem($id){
			
			$this->db->select($this->table.'.id ');
			$this->db->from($this->table);
			$this->db->join($this->resumoTable, $this->resumoTable.'.id_sondagem = '.$this->table.'.id', 'inner');
			
			$this->db->where($this->table.'.id', $id);
				
			$query = $this->db->get();
			if($query->num_rows()){
				return true;
			}else{
				return false;
			}
		}		
}