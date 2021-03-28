<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

    class origens_destinosdao extends App_DAO {
    const VIEW_FOLDER = 'admin/origens_destinos';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
    
        public $sentidoTable = null;
        public $veiculo_classeveiculoTable = null;
        public $veiculosTable = null;
        public $pesquisa_trafegosTable = null;
        
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'origens_destinos';
	        $this->sentidoTable = 'sentidos';
	        $this->veiculo_classeveiculoTable = 'veiculo_classeveiculo';
	        $this->veiculoTable = 'veiculos';
	        $this->pesquisa_trafegosTable = 'pesquisa_trafegos'; 
	    }
    	
    	/**
	    * Get origem_destino by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_origem_destino_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch origens_destinos data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_origens_destinos($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_origens_destinos($search_string=null, $order=null)
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
	     * Fetch origens_destinos data from the database
	     * possibility to mix search, filter and order
	     * @param string $search_string
	     * @param strong $order
	     * @param string $order_type
	     * @param int $limit_start
	     * @param int $limit_end
	     * @return array
	     */
	    public function get_origens_destinos_by_pesquisa($id_pesquisa, $search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null, $classVeiculo = null)
	    {
	    
	    	$this->db->select(	$this->table.'.* , '.
	    						$this->sentidoTable.'.origem, '.
	    						$this->sentidoTable.'.label_origem, '.
	    						$this->sentidoTable.'.destino, '.
	    						$this->sentidoTable.'.label_destino, '.
	    						$this->veiculo_classeveiculoTable.'.titulo as classeVeiculo'
			);
	    	$this->db->from($this->table);
	    	$this->db->join($this->pesquisa_trafegosTable, $this->pesquisa_trafegosTable.'.id = '.$this->table.'.id_pesquisa', 'inner'  );
	    	$this->db->join($this->sentidoTable, $this->sentidoTable.'.id = '.$this->table.'.id_sentido', 'inner'  );
	    	$this->db->join($this->veiculo_classeveiculoTable, $this->veiculo_classeveiculoTable.'.id_veiculo = '.$this->table.'.id_veiculo', 'inner'  );
	    	
	    	/*
	    	$this->db->join('od_entrevistas'		,$this->pesquisa_trafegosTable.'.id = od_entrevistas.id_origem_destino' , 'inner'  );
	    	$this->db->join('entrevistas'			, 'entrevistas.id = od_entrevistas.id_entrevista' , 'inner'  );
	    	$this->db->join('entrevista_perguntas'	, 'entrevista_perguntas.id_entrevista = entrevistas.id' , 'inner'  );
	    	$this->db->join('perguntas'				, 'perguntas.id = entrevista_perguntas.id_pergunta', 'inner'  );
	    	*/
	    	
	    	$this->db->where($this->table.'.id_pesquisa', $id_pesquisa);
	    	if($classVeiculo){
	    		$this->db->where($this->veiculo_classeveiculoTable.'.id_classeveiculo = '.$classVeiculo);
	    	}else{
	    		$this->db->where($this->veiculo_classeveiculoTable.'.id_classeveiculo = '.$this->pesquisa_trafegosTable.'.id_classeveiculos');
	    	}
	    
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
	    function count_origens_destinos_by_pesquisa($id_pesquisa, $search_string=null, $order=null, $classVeiculo = null)
	    {
	    $this->db->select(	$this->table.'.* , '.
	    						$this->sentidoTable.'.origem, '.
	    						$this->sentidoTable.'.label_origem, '.
	    						$this->sentidoTable.'.destino, '.
	    						$this->sentidoTable.'.label_destino, '.
	    						$this->veiculo_classeveiculoTable.'.titulo as classeVeiculo'
			);
	    	$this->db->from($this->table);
	    	$this->db->join($this->pesquisa_trafegosTable, $this->pesquisa_trafegosTable.'.id = '.$this->table.'.id_pesquisa', 'inner'  );
	    	$this->db->join($this->sentidoTable, $this->sentidoTable.'.id = '.$this->table.'.id_sentido', 'inner'  );
	    	$this->db->join($this->veiculo_classeveiculoTable, $this->veiculo_classeveiculoTable.'.id_veiculo = '.$this->table.'.id_veiculo', 'inner'  );
	    	
	    	
	    	/*
	    	$this->db->join('od_entrevistas'		,$this->pesquisa_trafegosTable.'.id = od_entrevistas.id_origem_destino' , 'inner'  );
	    	$this->db->join('entrevistas'			, 'entrevistas.id = od_entrevistas.id_entrevista' , 'inner'  );
	    	$this->db->join('entrevista_perguntas'	, 'entrevista_perguntas.id_entrevista = entrevistas.id' , 'inner'  );
	    	$this->db->join('perguntas'				, 'perguntas.id = entrevista_perguntas.id_pergunta', 'inner'  );
	    	*/
	    	
	    	
	    	$this->db->where($this->table.'.id_pesquisa', $id_pesquisa);
	    	if($classVeiculo){
	    		$this->db->where($this->veiculo_classeveiculoTable.'.id_classeveiculo = '.$classVeiculo);
	    	}else{
	    		$this->db->where($this->veiculo_classeveiculoTable.'.id_classeveiculo = '.$this->pesquisa_trafegosTable.'.id_classeveiculos');
	    	}
	    	
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
	    function store_origem_destino($data, $perguntas)
	    {
	    	
	    	$this->db->trans_start();
	    	$insert = $this->db->insert($this->table, $data);
	    	$contagemInsert_id = $this->db->insert_id();
	    	foreach($perguntas as $item)	:
	    	if($item){
	    		$temp = array('id_origem_destino' => $contagemInsert_id, 'id_pergunta' => $item['id_pergunta'], 'resposta' => $item['resposta']  );
	    		$insert2 = $this->db->insert('od_perguntas' , $temp);
	    	}
	    	endforeach;
	    	$this->db->trans_complete();
	    	if ($this->db->trans_status() === FALSE)
	    	{
	    		return FALSE;
	    	}else{
	    		return TRUE;
	    	};
	    		
		}
    	
    	/**
	    * Update origem_destino
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_origem_destino($id, $data, $perguntasData)
	    {
	    	
	    	$return = false;
			$this->db->trans_start();
			// update data from contagem
				$this->db->where('id', $id);
				$this->db->update($this->table, $data);
				
				$report = array();
				
				$report['error'] = $this->db->_error_number();
				$report['message'] = $this->db->_error_message();
				
				if($report !== 0){
					$return = true;
				}else{
					$return =  false;
				}
			
				$delQuery = 'delete from od_perguntas where id_origem_destino = '.$id.' ;';				
				$this->exec_delete_query($delQuery);
				
		
			foreach($perguntasData as $item)	:
				if($item){
				echo $item;
					$temp = array('id_origem_destino' => $id, 'id_pergunta' => $item['id_pergunta'], 'resposta' => $item['resposta']  );
					$insert2 = $this->db->insert('od_perguntas' , $temp);
				}
			endforeach;
			
			$this->db->trans_complete();
			
			if ($this->db->trans_status() === FALSE)
			{
				$return =  FALSE;
			}else{
				$return = TRUE;
			};
			
			return $return;
			
		}
    	
	    /**
	    * Delete origem_destino
	    * @param int $id - origem_destino id
	    * @return boolean
	    */
		function delete_origem_destino($id){
			$this->delete_query($id); 
		}    			
    	}