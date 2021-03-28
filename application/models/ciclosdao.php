<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class ciclosdao extends App_DAO {

	const VIEW_FOLDER = 'admin/ciclos';
	
	var $trechosTable = null;
	
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'dbo.TB_CICLO';
	        $this->trechosTable = 'dbo.tb_trecho';
	    }
    	
    	/**
	    * Get ciclo by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_ciclo_by_id($id)
	    {
    		$result = $this->db->get_where($this->table, array( 'ID_CICLO' => $id));
    		return $result->result_array();		 
	    } 
    	
	    /**
	    * Fetch ciclos data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_ciclos($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select('*');
			$this->db->from($this->table);
	
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			
			if($order){
				$this->db->order_by($order, $order_type);
			}else{
			    $this->db->order_by('ID_CICLO', $order_type);
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
	    function count_ciclos($search_string=null, $order=null)
	    {
			$this->db->select('*');
			$this->db->from($this->table);
			if($search_string){
				$this->db->like('titulo', $search_string);
			}
			if($order){
				$this->db->order_by($order, 'Asc');
			}else{
			    $this->db->order_by('ID_CICLO', 'Asc');
			}
			$query = $this->db->get();
			return $query->num_rows();        
	    }    			
    	
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_ciclo($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update ciclo
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_ciclo($id, $data)
	    {
			$this->db->where('ID_CICLO', $id);
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
	    * Delete ciclo
	    * @param int $id - ciclo id
	    * @return boolean
	    */
		function delete_ciclo($id){
			$result = $this->db->query('DELETE FROM '.$this->table.' where ID_CICLO = '. $id );
    		return $result;
		}

		/**
		 * Retorna UFs disponíveis para ciclo
		 * @param int $id - ciclo id
		 * @return list
		 */
		function get_ciclo_ufs($id){
			
			$this->db->select($this->trechosTable.'.NM_UF');
			$this->db->from($this->table);
			$this->db->join($this->trechosTable, $this->trechosTable.'.ID_CICLO = '.$this->table.'.ID_CICLO', 'inner' );
			$this->db->where($this->table.'.ID_CICLO = '.$id);
			$this->db->group_by('NM_UF');
			$this->db->order_by('NM_UF', 'ASC');
			$query = $this->db->get();

//			echo $this->db->last_query();
	
			
			return $query->result_array();
			
		}
		
		/**
		 * Retorna BRs disponíveis para ciclo e uf
		 * @param int $id - ciclo id
		 * @param int $nm_uf - UF name
		 * @return list
		 */
		function get_ciclo_uf_brs($id, $nm_uf){
				
			$this->db->select($this->trechosTable.'.NM_BR');
			$this->db->from($this->table);
			$this->db->join($this->trechosTable, $this->trechosTable.'.ID_CICLO = '.$this->table.'.ID_CICLO', 'inner' );
			$this->db->where($this->table.".ID_CICLO = ".$id." AND NM_UF = '".$nm_uf."' " );
			$this->db->group_by('NM_BR');
			$this->db->order_by('NM_BR', 'ASC');
			$query = $this->db->get();
		
			echo $this->db->last_query();
			break;
			
			return $query->result_array();
				
		}
		
}