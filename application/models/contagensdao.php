<?php
require_once(APPPATH . 'models/App_DAO' . EXT);
	class contagensdao extends App_DAO {
    const VIEW_FOLDER = 'admin/contagens';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
    	
    	public $sentidoTable = null;
    	public $contagemVeiculos = null;
    	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'contagens';
	        $this->sentidoTable = 'sentidos';
	        $this->contagemVeiculos = 'contagem_veiculos';
	    }
    	
    	/**
	    * Get contagem by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_contagem_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch contagens data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_contagens($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_contagens($search_string=null, $order=null)
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
    	
	    public function get_contagens_by_pesquisa($id_pesquisa, $search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
	    
	    	$this->db->select(	$this->table.'.* , '.
	    						$this->sentidoTable.'.origem, '.
	    						$this->sentidoTable.'.label_origem, '.
	    						$this->sentidoTable.'.destino, '.
	    						$this->sentidoTable.'.label_destino ');
	    	$this->db->from($this->table);
	    	$this->db->join($this->sentidoTable, $this->sentidoTable.'.id = '.$this->table.'.id_sentido', 'inner'  );
	    	$this->db->where($this->table.'.id_pesquisa_trafegos', $id_pesquisa);
	    
	    	if($search_string){
	    		$this->db->like('titulo', $search_string);
	    	}
	    	$this->db->group_by($this->table.'.id');
	    
	    	if($order){
	    		$this->db->order_by($order, $order_type);
	    	}else{
	    		$this->db->order_by($this->table.'.id', $order_type);
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
	     
	    function count_contagens_by_pesquisa($id_pesquisa, $search_string=null, $order=null)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->table);
	    	$this->db->join($this->sentidoTable, $this->sentidoTable.'.id = '.$this->table.'.id_sentido', 'inner'  );
	    	$this->db->where($this->table.'.id_pesquisa_trafegos', $id_pesquisa);
	    	
	    	if($search_string){
	    		$this->db->like('titulo', $search_string);
	    	}
	    	if($order){
	    		$this->db->order_by($order, 'Asc');
	    	}else{
	    		$this->db->order_by($this->table.'.id', 'Asc');
	    	}
	    	$query = $this->db->get();
	    	return $query->num_rows();
	    }
	    
	    
	    /**
	    * Store the new item into the database
	    * @param array $data - associative array with data to store
	    * @return boolean 
	    */
	    function store_contagem($data)
	    {
	    	return $this->insert_query($data);
		}
    	
		function store_contagem_pesquisa($data, $veiculos)
		{
			
			$this->db->trans_start();
				$insert = $this->db->insert($this->table, $data);
				$contagemInsert_id = $this->db->insert_id();
				
				foreach($veiculos as $item)	:
				if($item){
					$temp = array('id_contagem' => $contagemInsert_id, 'id_veiculo' => $item['id_veiculo'], 'quantidade' => $item['quantidade']  );
					$insert2 = $this->db->insert($this->contagemVeiculos , $temp);
				}
				endforeach;
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}else{
				return TRUE;
			};
			
			
			// start transaction 
			
			
		}
		
    	/**
	    * Update contagem
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_contagem($id, $data)
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
		
		function update_contagem_pesquisa($id, $data, $veiculos)
		{
			$return = false;
			//ECHO $id;
			//$this->PAR($data);
			//$this->PAR($veiculos);
			//die;
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
			
				$delQuery = 'delete from '.$this->contagemVeiculos.' where id_contagem = '.$id.' ;';				
				$this->exec_delete_query($delQuery);
				
						
			foreach($veiculos as $item)	:
				if($item){
					$temp = array('id_contagem' => $id, 'id_veiculo' => $item['id_veiculo'], 'quantidade' => $item['quantidade']  );
					$insert2 = $this->db->insert($this->contagemVeiculos , $temp);
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
	    * Delete contagem
	    * @param int $id - contagem id
	    * @return boolean
	    */
		function delete_contagem($id){
			$this->delete_query($id); 
		}  

		function get_contagens_data_by_pesquisa_sentido($data){
			$query = 'select data from	contagens
						inner join sentidos on (sentidos.id = contagens.id_sentido)
						where contagens.id_pesquisa_trafegos = '.$data[0].' and sentidos.id = '.$data[1].' 
						group by data
						order by data ';
			return $this->exec_query($query);
			
		}
		
		function get_contagens_data_by_pesquisa_sentido_data($data){
			 $query = 'select contagens.id, contagens.hora from	contagens
						inner join sentidos on (sentidos.id = contagens.id_sentido)
						where contagens.id_pesquisa_trafegos = '.$data[0].' and 
							  sentidos.id = '.$data[1].' and 
							  contagens.data = "'.$data[2].'"
						order by hora ';
			
			return $this->exec_query($query);
				
		}
		
		
 }