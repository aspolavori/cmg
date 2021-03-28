<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class tipo_obrasdao extends App_DAO {
		const VIEW_FOLDER = 'admin/tipo_obras';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
		
		public $obrasTable = null;
		public $obrasTipoTable = null;
		
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'tipo_obras';
	        $this->obrasTable = 'obras';
	        $this->obrasTipoTable = 'obra_tipo';
	    }
    	
    	/**
	    * Get tipo_obra by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_tipo_obra_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch tipo_obras data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_tipo_obras($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_tipo_obras($search_string=null, $order=null)
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
    	
	    function get_tipo_obras_by_unidade($unidade){
	    	$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('unidade', $unidade);
			$this->db->order_by('descricao', 'Asc');
			$query = $this->db->get();
			return $query->result_array(); 	
	    }
	    
	    function get_tipos_list_by_ids($listTipos){
	    	$this->db->select('*');
	    	$this->db->from($this->table);
	    	foreach($listTipos as $tipo ){
	    		$this->db->or_where('id', $tipo );
	    	}
	    	$query = $this->db->get();
	    	return $query->result_array();
	    }

	    function get_tipos_by_obra_id($idObra){
	    	
	    	$this->db->select($this->table.'.descricao');
	    	$this->db->from($this->table);
	    	$this->db->join($this->obrasTipoTable , $this->table.'.id = '.$this->obrasTipoTable.'.id_tipo ', 'inner' );
	    	$this->db->where($this->obrasTipoTable.'.id_obra', $idObra);
	    	$this->db->order_by('descricao');
	    	$query = $this->db->get();
	    	return $query->result_array();
	    	
	    }
	    
	    
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_tipo_obra($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update tipo_obra
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_tipo_obra($id, $data)
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
	    * Delete tipo_obra
	    * @param int $id - tipo_obra id
	    * @return boolean
	    */
		function delete_tipo_obra($id){
			$this->delete_query($id); 
		}    			
    	}