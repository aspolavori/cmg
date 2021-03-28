<?php
				require_once(APPPATH . 'models/App_DAO' . EXT);
    			class od_perguntasdao extends App_DAO {
    			const VIEW_FOLDER = 'admin/od_perguntas';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'od_perguntas';
	    }
    	
    	/**
	    * Get od_pergunta by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_od_pergunta_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch od_perguntas data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_od_perguntas($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_od_perguntas($search_string=null, $order=null)
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
	    function store_od_pergunta($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update od_pergunta
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_od_pergunta($id, $data)
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
	    * Delete od_pergunta
	    * @param int $id - od_pergunta id
	    * @return boolean
	    */
		function delete_od_pergunta($id){
			$this->delete_query($id); 
		}

		function get_perguntas_by_od_id_edit($id, $id_pesquisa){
			$query = 'select select_1.*, select_2.* from (

						select perguntas.* from od_entrevistas 
							inner join entrevista_perguntas on (entrevista_perguntas.id_entrevista = od_entrevistas.id_entrevista )
							inner join perguntas on (perguntas.id = entrevista_perguntas.id_pergunta)
							where od_entrevistas.id_origem_destino = '.$id_pesquisa.'
						) as select_1
						left join (
							select od_perguntas.id as id_od_perguntas, od_perguntas.id_pergunta,  od_perguntas.resposta, 
									 perguntas.titulo as pergunta from perguntas 
							inner join od_perguntas on (od_perguntas.id_pergunta = perguntas.id) 
							inner join origens_destinos on ( origens_destinos.id = od_perguntas.id_origem_destino) 
							where origens_destinos.id = '.$id.'
						) as select_2 on ( select_1.id = select_2.id_pergunta )
						order by select_1.id ';
			
			return $this->exec_query($query);
		}
		
		
}