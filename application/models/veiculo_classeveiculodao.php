<?php
require_once(APPPATH . 'models/App_DAO' . EXT);
	class veiculo_classeveiculodao extends App_DAO {
    	const VIEW_FOLDER = 'admin/veiculo_classeveiculo';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
    	
    	public $classeveiculo = null;
    	public $veiculos = null;
    	
    	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'veiculo_classeveiculo';
	        $this->classeveiculo = 'classeveiculos';
	    }
    	
    	/**
	    * Get veiculo_classeveiculo by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_veiculo_classeveiculo_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch veiculo_classeveiculo data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_veiculo_classeveiculo($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select($this->table.'.*, '.$this->classeveiculo.'.titulo as classeveiculo ');
			$this->db->from($this->table);
			$this->db->join($this->classeveiculo, $this->classeveiculo.'.id = '.$this->table.'.id_classeveiculo ', 'inner');
	
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
	    function count_veiculo_classeveiculo($search_string=null, $order=null)
	    {
			$this->db->select($this->table.'.*, '.$this->classeveiculo.'.titulo as classeveiculo ');
			$this->db->from($this->table);
			$this->db->join($this->classeveiculo, $this->classeveiculo.'.id = '.$this->table.'.id_classeveiculo ', 'inner');
			
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
	    function store_veiculo_classeveiculo($data)
	    {
	    	$veiculosList = $data['idVeiculo'];
			foreach($veiculosList as $item)	:
				$temp = array(	'id_classeveiculo' => $data['id_classeveiculo'], 
								'id_veiculo' => $item,
								'titulo' => $data['titulo'],
				 );
				$insert2 = $this->db->insert($this->table, $temp);
			endforeach;
			return $insert2;
		}
    	
    	/**
	    * Update veiculo_classeveiculo
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_veiculo_classeveiculo($id, $data)
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
	    * Delete veiculo_classeveiculo
	    * @param int $id - veiculo_classeveiculo id
	    * @return boolean
	    */
		function delete_veiculo_classeveiculo($id){
			$this->delete_query($id); 
		}    			
    	}