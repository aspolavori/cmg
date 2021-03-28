<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class composicao_composicaodao extends App_DAO {
	const VIEW_FOLDER = 'admin/composicao_composicao';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	
		public $composicaoTable = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'composicao_composicao';
	        $this->composicaoTable = 'composicoes';
	    }
    	
    	/**
	    * Get composicao_composicao by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_composicao_composicao_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch composicao_composicao data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_composicao_composicao($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
    	
	    public function get_composicao_composicao_by_id_composicao($id)
	    {
	    	 
	    	$this->db->select($this->table.'.*, comp_filho.codigo, comp_filho.titulo ' );	    	
	    	$this->db->from($this->composicaoTable.' comp_pai ');
	    	$this->db->join($this->table, 'comp_pai.id = '.$this->table.'.id_composicao' , 'inner');
	    	$this->db->join($this->composicaoTable.' comp_filho ', 'comp_filho.id = '.$this->table.'.id_composicao2' , 'inner');
	    	$this->db->where('comp_pai.id', $id );
	    	$this->db->order_by('comp_filho.codigo' , 'ASC');
	    	
	    	/*
	    	 select composicao_composicao.* , 
				 comp_filho.titulo, 		 comp_filho.codigo 
				from composicoes comp_pai
				inner join composicao_composicao on (comp_pai.id = composicao_composicao.id_composicao)
				inner join composicoes comp_filho on (comp_filho.id = composicao_composicao.id_composicao2)
				where comp_pai.id = 
	    	 
	    	 */
	    	 
	    	$query = $this->db->get();
	    	 
	    	return $query->result_array();
	    }
	     
	    
	    /**
	    * Count the number of rows
	    * @param int $search_string
	    * @param int $order
	    * @return int
	    */
	    function count_composicao_composicao($search_string=null, $order=null)
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
	     * Fetch composicao_composicao data from the database
	     * possibility to mix search, filter and order
	     * @param string $search_string
	     * @param strong $order
	     * @param string $order_type
	     * @param int $limit_start
	     * @param int $limit_end
	     * @return array
	     */
	    public function get_composicao_by_id_composicao($id)
	    {
	    
	    	$this->db->select($this->table.'.*, '.$this->composicaoTable.'.codigo, '.$this->composicaoTable.'.titulo');
	    	$this->db->from($this->table);
	    	$this->db->join($this->composicaoTable, $this->table.'.id_composicao2 = '.$this->composicaoTable.'.id' );
	    	$this->db->where($this->table.'.id_composicao', $id );
	    	
	    	 
	    	$query = $this->db->get();
	    		
	    	return $query->result_array();
	    }
	    
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_composicao_composicao($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update composicao_composicao
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_composicao_composicao($id, $data)
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
	    * Delete composicao_composicao
	    * @param int $id - composicao_composicao id
	    * @return boolean
	    */
		function delete_composicao_composicao($id){
			$this->delete_query($id); 
		}    			
    	}