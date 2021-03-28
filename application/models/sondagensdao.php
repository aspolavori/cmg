<?php
require_once(APPPATH . 'models/App_DAO' . EXT);
	class sondagensdao extends App_DAO {
    const VIEW_FOLDER = 'admin/sondagens';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
    	public $tipoSondagemTable = null;
    	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'sondagens';
	        $this->tipoSondagemTable = 'tipo_sondagens';
	    }
    	
    	/**
	    * Get sondagem by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_sondagem_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch sondagens data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_sondagens($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select($this->table.'.*, '.$this->tipoSondagemTable.'.titulo as tipo_sondagem' );
			$this->db->from($this->table);
			$this->db->join($this->tipoSondagemTable, $this->tipoSondagemTable.'.id = '.$this->table.'.id_tipo_sondagem', 'inner' );
			
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
	    function count_sondagens($search_string=null, $order=null)
	    {
			$this->db->select($this->table.'.*,  '.$this->tipoSondagemTable.'.titulo as tipo_sondagem' );
			$this->db->from($this->table);
			$this->db->join($this->tipoSondagemTable, $this->tipoSondagemTable.'.id = '.$this->table.'.id_tipo_sondagem', 'inner' );
			
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
	    function store_sondagem($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update sondagem
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_sondagem($id, $data)
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
	    * Delete sondagem
	    * @param int $id - sondagem id
	    * @return boolean
	    */
		function delete_sondagem($id){
			$this->delete_query($id); 
		}

		
		function get_ufs_disponiveis(){
			$query = 'SELECT uf FROM '.$this->table.' group by uf order by uf asc;';
			return $this->exec_query($query);
		
		}
		
		
		function get_brs_by_uf($uf){
			$query = 'SELECT rodovia FROM '.$this->table.' where uf = "'.$uf.'" group by rodovia order by rodovia asc';
			return $this->exec_query($query);
		
		}
		
		function get_km_by_uf_br($uf, $br){
			$query = 'SELECT MIN(km_inicial) as kmIni, MAX(km_final) as kmFim FROM '.$this->table.' WHERE uf ="'.$uf.'" and rodovia = '.$br.' ';
			return $this->exec_query($query);
		}
		
		
    	
}