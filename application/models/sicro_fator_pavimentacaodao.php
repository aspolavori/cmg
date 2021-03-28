<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class sicro_fator_pavimentacaodao extends App_DAO {

	const VIEW_FOLDER = 'admin/sicro_fator_pavimentacao';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'sicro_fator_pavimentacao';
	    }
    	
    	/**
	    * Get sicro_fator_pavimentacao by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_sicro_fator_pavimentacao_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch sicro_fator_pavimentacao data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_sicro_fator_pavimentacao($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_sicro_fator_pavimentacao($search_string=null, $order=null)
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
    	
	    public function get_sicro_fator_pavimentacao_by_id_sicro($id)
	    {
	    	 
	    	$this->db->select($this->table.'.* ');
	    	$this->db->from($this->table);
	    	$this->db->where($this->table.'.id_sicro', $id );
	    	$this->db->order_by($this->table.'.id_categoria' , 'ASC');
	    	 
	    	$query = $this->db->get();
	    	 
	    	return $query->result_array();
	    }
	    
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_sicro_fator_pavimentacao($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update sicro_fator_pavimentacao
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_sicro_fator_pavimentacao($id, $data)
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
	    * Delete sicro_fator_pavimentacao
	    * @param int $id - sicro_fator_pavimentacao id
	    * @return boolean
	    */
		function delete_sicro_fator_pavimentacao($id){
			$this->delete_query($id); 
		}

		function store_padrao_data($id){
			
			$this->load->model('fator_pavimentacao_padraodao');
			$fatorPadrao = new fator_pavimentacao_padraodao();
			$padrao = $fatorPadrao->get_fator_pavimentacao_padrao_sicro('', 'id_categoria', 'asc');
			
			//$this->PAR($padrao);
			//die;
			foreach($padrao as $item){
				unset($item['id']);
				$item['id_sicro'] = $id;
				$this->store_sicro_fator_pavimentacao($item);
			}
			
		}
		
		function get_fator_by_id_sicro_id_categoria_classificacao($id_sicro, $id_categoria, $class = null){
			if($class == null){
				$class = 'padrao';
			}
			
			if($class == 'padrao'){
				$busca = $this->table.'.padrao as fator1, '.$this->table.'.restauracao_pista_existente as fator2';
			}else{
				$busca = $this->table.'.'.$class.' as fator1';
			}
			
			$query = 'select '.$busca.' from '.$this->table.' where '.$this->table.'.id_sicro = '.$id_sicro.' and '.$this->table.'.id_categoria  = '.$id_categoria ;
			
			return $this->exec_query($query);
			
		}
		
}
























