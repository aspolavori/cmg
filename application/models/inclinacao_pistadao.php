<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class inclinacao_pistadao extends App_DAO {
const VIEW_FOLDER = 'admin/inclinacao_pista';

		var $ciclosTable = null;
		var $logsTable = null; 
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'dbo.tb_trecho';
	        $this->ciclosTable = 'dbo.TB_CICLO';
	        $this->logsTable = 'dbo.tb_log';
	        
	        ini_set('max_execution_time', 0);
	    }
    	
    	/**
	    * Get inclinacao_pista by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_inclinacao_pista_by_id($id)
	    {
	    	$result = $this->db->get_where($this->table, array( ID_TRECHO => $id));
    		return $result->result_array();		 
	    } 
    	
	    /**
	    * Fetch inclinacao_pista data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_inclinacao_pista($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select('*');
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
				
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
			    $this->db->order_by('ID_TRECHO', $order_type);
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
	    function count_inclinacao_pista($search_string=null, $order=null)
	    {
			$this->db->select('*');
			$this->db->from($this->table);
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			if($order){
				$this->db->order_by($order, 'Asc');
			}else{
			    $this->db->order_by('ID_TRECHO', 'Asc');
			}
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_inclinacao_pista($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update inclinacao_pista
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_inclinacao_pista($id, $data)
	    {
			$this->db->where('ID_TRECHO', $id);
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
	    * Delete inclinacao_pista
	    * @param int $id - inclinacao_pista id
	    * @return boolean
	    */
		function delete_inclinacao_pista($id){
			$result = $this->db->query('DELETE FROM '.$this->table.' where ID_TRECHO = '. $id );
    		return $result;
		}

		/**
		 * Fetch inclinacao_pista data from the database
		 * possibility to mix search, filter and order
		 * @param string $search_string
		 * @param strong $order
		 * @param string $order_type
		 * @param int $limit_start
		 * @param int $limit_end
		 * @return array
		 */
		public function get_inclinacao_pista_trecho_uf_br( $search_ciclo, $nm_uf, $nm_br, $sentido, $search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
		{	
			$this->db->select($this->table.'.ID_TRECHO, '.$this->table.'.NM_TRECHO, '.$this->logsTable.'.GPS_ALTITUDE, '.$this->logsTable.'.HODOMETRO_TRECHO');
			$this->db->from($this->table);
			$this->db->join($this->logsTable, $this->logsTable.'.ID_TRECHO = '.$this->table.'.ID_TRECHO', 'inner' );
			$this->db->where(
				" ID_CICLO = ".$search_ciclo.
				" AND NM_UF = '".$nm_uf."'".
				" AND NM_BR = '".$nm_br."'".
				" AND DESC_SENTIDO = '".$sentido."'" );
			
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			/*
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
				$this->db->order_by('ID_TRECHO');
			}
			*/
			//
			
			/*
			if($sentido == 'C'){
				$this->db->order_by('KM_INICIAL', 'Asc');
			}else{
				$this->db->order_by('KM_INICIAL', 'Desc');
			}
			*/
			$this->db->order_by($this->table.'.ID_TRECHO,  HODOMETRO_TRECHO Asc');
			/*
			if($limit_start && $limit_end){
				$this->db->limit($limit_start, $limit_end);
			}
		
			if($limit_start != null){
				$this->db->limit($limit_start, $limit_end);
			}
			*/
			$query = $this->db->get();
			/*
			echo $limit_start.'<br>';
			echo $limit_end.'<br>';
			echo $this->db->last_query();
			break;
			*/
			return $query->result_array();
		}
		
		/**
		 * Count the number of rows
		 * @param int $search_string
		 * @param int $order
		 * @return int
		 */
		function count_inclinacao_pista_trecho_uf_br( $search_ciclo, $nm_uf, $nm_br, $sentido,  $search_string=null, $order=null)
		{
			$this->db->select($this->logsTable.'.ID_TRECHO');
			$this->db->from($this->table);
			$this->db->join($this->logsTable, $this->logsTable.'.ID_TRECHO = '.$this->table.'.ID_TRECHO', 'inner' );
			$this->db->where(
				" ID_CICLO = ".$search_ciclo.
				" AND NM_UF = '".$nm_uf."'".
				" AND NM_BR = '".$nm_br."'".
				" AND DESC_SENTIDO = '".$sentido."'" );
			
			$query = $this->db->get();
			return $query->num_rows();
		}
}