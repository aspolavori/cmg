<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class categoriasdao extends App_DAO {

	const VIEW_FOLDER = 'admin/categorias';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
		public $fatorPavimentacaoPadraoTable = null;
		public $sicrofatorPavimentacaoTable = null;
		
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'categorias';
	        $this->fatorPavimentacaoPadraoTable = 'fator_pavimentacao_padrao';
	        $this->sicrofatorPavimentacaoTable = 'sicro_fator_pavimentacao';
	    }
    	
    	/**
	    * Get categoria by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_categoria_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch categorias data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_categorias($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_categorias($search_string=null, $order=null)
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
	    function store_categoria($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update categoria
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_categoria($id, $data)
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
	    * Delete categoria
	    * @param int $id - categoria id
	    * @return boolean
	    */
		function delete_categoria($id){
			$this->delete_query($id); 
		}
		
		function get_categoria_not_related_fator_pavimentacao_padrao(){
			$query = 'select * 
					from '.$this->table.' 
					where 
					'.$this->table.' .id NOT IN (
						select '. $this->fatorPavimentacaoPadraoTable.'.id_categoria from '. $this->fatorPavimentacaoPadraoTable.'
					)
					order by '.$this->table.'.titulo asc';
			
			return $this->exec_query($query);								
					
		}
		 
		function get_categoria_not_related_fator_pavimentacao($id_sicro){
			$query = 'select *
					from '.$this->table.'
					where
					'.$this->table.' .id NOT IN (
						select '. $this->sicrofatorPavimentacaoTable.'.id_categoria from '. $this->sicrofatorPavimentacaoTable.'
							where id_sicro =  '.$id_sicro.'
					)
					order by '.$this->table.'.titulo asc';
				
			return $this->exec_query($query);
				
		}
		   			
}