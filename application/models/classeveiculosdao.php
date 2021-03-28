<?php
require_once(APPPATH . 'models/App_DAO' . EXT);
class classeveiculosdao extends App_DAO {
	const VIEW_FOLDER = 'admin/classeveiculos';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	
    	public $veiculosTable = null;
    	public $classe_veiculosTable = null;
    			
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'classeveiculos';
	        $this->veiculosTable = 'veiculos';
	        $this->classe_veiculosTable = 'veiculo_classeveiculo';
	    }
    	
    	/**
	    * Get classeveiculo by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_classeveiculo_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch classeveiculos data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_classeveiculos($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select($this->table.'.*, count('.$this->veiculosTable.'.id) as totalVeiculosRelacionados' );
			$this->db->from($this->table);
			
			$this->db->join($this->classe_veiculosTable , $this->classe_veiculosTable.'.id_classeveiculo = '.$this->table.'.id' ,'left');
			$this->db->join($this->veiculosTable , $this->classe_veiculosTable.'.id_veiculo = '.$this->veiculosTable.'.id' ,'left');
	
			if($search_string){
				$this->db->like($this->table.'.titulo', $search_string);
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
	    function count_classeveiculos($search_string=null, $order=null)
	    {
			$this->db->select($this->table.'.*, count('.$this->veiculosTable.'.id)' );
			$this->db->from($this->table);
			
			$this->db->join($this->classe_veiculosTable , $this->classe_veiculosTable.'.id_classeveiculo = '.$this->table.'.id', 'left');
			$this->db->join($this->veiculosTable , $this->classe_veiculosTable.'.id_veiculo = '.$this->veiculosTable.'.id', 'left');
			
			if($search_string){
				$this->db->like($this->table.'.titulo', $search_string);
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
	    function store_classeveiculo($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update classeveiculo
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_classeveiculo($id, $data)
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
	    * Delete classeveiculo
	    * @param int $id - classeveiculo id
	    * @return boolean
	    */
		function delete_classeveiculo($id){
			$this->delete_query($id); 
		}    			
    	}