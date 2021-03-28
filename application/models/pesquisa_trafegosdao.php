<?php
require_once(APPPATH . 'models/App_DAO' . EXT);
class pesquisa_trafegosdao extends App_DAO {

	const VIEW_FOLDER = 'admin/pesquisa_trafegos';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	
		public $classeveiculosTable = null;
		public $veiculosTable = null;
		public $veiculo_classeveiculoTable = null;
		public $contagem_veiculosTable = null;
		public $od_entrevistasTable = null;
		
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table 						= 'pesquisa_trafegos';
	        $this->classeveiculosTable 			= 'classeveiculos';
	        $this->veiculosTable 				= 'veiculos';
	        $this->veiculo_classeveiculoTable	= 'veiculo_classeveiculo';
	        $this->contagem_veiculosTable		= 'contagem_veiculos';
	        $this->od_entrevistasTable			= 'od_entrevistas';
	    }
    	
    	/**
	    * Get pequisa_trafeco by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_pequisa_trafego_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch pesquisa_trafegos data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_pesquisa_trafegos($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select($this->table.'.* , '.$this->classeveiculosTable.'.titulo as classeveiculo ');
			$this->db->from($this->table);
			$this->db->join($this->classeveiculosTable, $this->classeveiculosTable.'.id = '.$this->table.'.id_classeveiculos', 'inner');
	
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
	    function count_pesquisa_trafegos($search_string=null, $order=null)
	    {
			$this->db->select($this->table.'.* , '.$this->classeveiculosTable.'.titulo as classeveiculo ');
			$this->db->from($this->table);
			$this->db->join($this->classeveiculosTable, $this->classeveiculosTable.'.id = '.$this->table.'.id_classeveiculos', 'inner');
			
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
	    function store_pequisa_trafeco($data)
	    {
	    	unset($data['id']);
	    	$id_entrevista = $data['id_entrevista'];
	    	
	    	$this->db->trans_start();
	    	
	    	$result = $this->db->insert($this->table, $data);
	    	$insert_id = $this->db->insert_id();
	    	
	    	if($id_entrevista > 0){
	    		$store = array('id_origem_destino' => $insert_id, 'id_entrevista' => $id_entrevista );
	    		$this->db->insert($this->od_entrevistasTable, $store);
	    	}
	    	
	    	$this->db->trans_complete();
	    	if ($this->db->trans_status() === FALSE)
	    	{
	    		return FALSE;
	    	}else{
	    		return TRUE;
	    	};
	    	
	    	return $result;
		}
    	
    	/**
	    * Update pequisa_trafeco
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_pequisa_trafeco($id, $data)
	    {
			
			
			$id_entrevista = $data['id_entrevista'];
						
			$this->db->trans_start();
			
				$this->db->where('id', $id);
				$this->db->update($this->table, $data);
				
				$this->db->select('*');
				$this->db->from($this->od_entrevistasTable);
				$this->db->where('id_origem_destino', $id);
				$query = $this->db->get();
				$res =  $query->num_rows();
				
				if($res == 0 ){
					
					$store = array('id_origem_destino' => $id, 'id_entrevista' => $id_entrevista );
	    			$this->db->insert($this->od_entrevistasTable, $store);
					
				}else{
					$this->db->query('UPDATE '.$this->od_entrevistasTable.
							' SET id_origem_destino = '. $id. ', id_entrevista = '.$id_entrevista.
							' where id_origem_destino = '. $id
					);
				}
			
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE)
			{
				return FALSE;
			}else{
				return TRUE;
			};
			
		}
    	
	    /**
	    * Delete pequisa_trafeco
	    * @param int $id - pequisa_trafeco id
	    * @return boolean
	    */
		function delete_pequisa_trafeco($id){
			$this->delete_query($id); 
		}

		function get_veiculoclasse_by_pesquisa($id){
			
			$this->db->select($this->veiculosTable.'.id , '.$this->veiculo_classeveiculoTable.'.titulo classeVeiculo');
			$this->db->from($this->veiculosTable);
			$this->db->join($this->veiculo_classeveiculoTable, $this->veiculo_classeveiculoTable.'.id_veiculo = '.$this->veiculosTable.'.id ', 'inner');
			$this->db->join($this->classeveiculosTable, $this->classeveiculosTable.'.id = '.$this->veiculo_classeveiculoTable.'.id_classeveiculo', 'inner');
			$this->db->join($this->table, $this->table.'.id_classeveiculos = '.$this->classeveiculosTable.'.id', 'inner');
			$this->db->where($this->table.'.id', $id);
			$this->db->group_by($this->veiculo_classeveiculoTable.'.titulo');
			$query = $this->db->get();
				
			return $query->result_array();
			
		}
		
		function get_veiculoclasse_by_pesquisa_edit($id, $id_contagem, $id_classeVeicular = null){
			
			
			
			if($id_classeVeicular){
				$query = 'select select_1.*, sum(select_2.quantidade) as quantidade from (
							select '.$this->veiculosTable.'.id, '.$this->veiculo_classeveiculoTable.'.titulo as classeVeiculo from '.$this->veiculosTable.'
							inner join '.$this->veiculo_classeveiculoTable.' on ('.$this->veiculo_classeveiculoTable.'.id_veiculo = '.$this->veiculosTable.'.id)
							inner join '.$this->classeveiculosTable.' on ('.$this->classeveiculosTable.'.id = '.$this->veiculo_classeveiculoTable.'.id_classeveiculo )
							inner join '.$this->table.'  on ('.$this->classeveiculosTable.'.id = '.$id_classeVeicular. ')
							where '.$this->table.'.id = '.$id.'
							
					) as select_1
					left join (
							select * from '.$this->contagem_veiculosTable.'
							where '.$this->contagem_veiculosTable.'.id_contagem = '.$id_contagem.'
					)  as select_2	 on ( select_1.id = select_2.id_veiculo )
					group by select_1.classeVeiculo ;';
			
				//	die;
			
			}else{
			
				$query = 'select select_1.*, sum(select_2.quantidade) as quantidade from (
							select '.$this->veiculosTable.'.id, '.$this->veiculo_classeveiculoTable.'.titulo as classeVeiculo from '.$this->veiculosTable.'
							inner join '.$this->veiculo_classeveiculoTable.' on ('.$this->veiculo_classeveiculoTable.'.id_veiculo = '.$this->veiculosTable.'.id)
							inner join '.$this->classeveiculosTable.' on ('.$this->classeveiculosTable.'.id = '.$this->veiculo_classeveiculoTable.'.id_classeveiculo )
							inner join '.$this->table.'  on ('.$this->table.'.id_classeveiculos = '.$this->classeveiculosTable.'.id)
							where '.$this->table.'.id = '.$id.'
							
					) as select_1
					left join (
							select * from '.$this->contagem_veiculosTable.'
							where '.$this->contagem_veiculosTable.'.id_contagem = '.$id_contagem.'
					)  as select_2	 on ( select_1.id = select_2.id_veiculo )
					group by select_1.classeVeiculo ;';
			}
			
			// OLD
			/*
			if($id_classeVeicular){
				 $query = 'select select_1.*, sum(select_2.quantidade) as quantidade from (
							select '.$this->veiculosTable.'.id, '.$this->veiculo_classeveiculoTable.'.titulo as classeVeiculo from '.$this->veiculosTable.'
							inner join '.$this->veiculo_classeveiculoTable.' on ('.$this->veiculo_classeveiculoTable.'.id_veiculo = '.$this->veiculosTable.'.id)
							inner join '.$this->classeveiculosTable.' on ('.$this->classeveiculosTable.'.id = '.$this->veiculo_classeveiculoTable.'.id_classeveiculo )
							inner join '.$this->table.'  on ('.$this->classeveiculosTable.'.id = '.$id_classeVeicular. ')
							where '.$this->table.'.id = '.$id.'
							group by '.$this->veiculo_classeveiculoTable.'.titulo
					) as select_1
					left join (
							select * from '.$this->contagem_veiculosTable.'
							where '.$this->contagem_veiculosTable.'.id_contagem = '.$id_contagem.'
					)  as select_2	 on ( select_1.id = select_2.id_veiculo ) 
					group by select_1.classeVeiculo ;';
				
			//	die;
				
			}else{
				
				 $query = 'select select_1.*, sum(select_2.quantidade) as quantidade from (
							select '.$this->veiculosTable.'.id, '.$this->veiculo_classeveiculoTable.'.titulo as classeVeiculo from '.$this->veiculosTable.'
							inner join '.$this->veiculo_classeveiculoTable.' on ('.$this->veiculo_classeveiculoTable.'.id_veiculo = '.$this->veiculosTable.'.id)
							inner join '.$this->classeveiculosTable.' on ('.$this->classeveiculosTable.'.id = '.$this->veiculo_classeveiculoTable.'.id_classeveiculo )
							inner join '.$this->table.'  on ('.$this->table.'.id_classeveiculos = '.$this->classeveiculosTable.'.id)
							where '.$this->table.'.id = '.$id.'
							group by '.$this->veiculo_classeveiculoTable.'.titulo
					) as select_1
					left join (
							select * from '.$this->contagem_veiculosTable.'
							where '.$this->contagem_veiculosTable.'.id_contagem = '.$id_contagem.'
					)  as select_2	 on ( select_1.id = select_2.id_veiculo )
					group by select_1.classeVeiculo ;';
			}
			*/
		
			return $this->exec_query($query);
		}
		
		public function get_pesquisa_trafegos_select($dataSearch)
		{
		
			$this->db->select($this->table.'.* ');
			$this->db->from($this->table);
			$this->db->where( 'uf = '.$dataSearch['uf'].
							  ' and rodobia = '.$dataSearch['br'].
							  ' and km > '.$dataSearch['km_ini'].
							  ' and km < '.$dataSearch['km_fim'].' '
			   );
			$this->db->order_by('data_ini');
			
			$query = $this->db->get();
				
			return $query->result_array();
		}
		 
		/**
		 * Count the number of rows
		 * @param int $search_string
		 * @param int $order
		 * @return int
		 */
		function count_pesquisa_trafegos_select($dataSearch)
		{
			$this->db->select($this->table.'.* ');
			$this->db->from($this->table);
			$this->db->where('id > 0 ');			
			$this->db->order_by('data_ini');
			
			$query = $this->db->get();
			
			return $query->num_rows();
		}
    	
		function get_contagem_completa($id){
				
			$query = 'select pesquisa_trafegos.*, 
							 classeveiculos.titulo as classeVeiculo,
					 		 sentidos.origem as origem, sentidos.destino as destino,
							 contagens.`data`, contagens.hora,
							 veiculo_classeveiculo.titulo as veiculo_classe, 
							 contagem_veiculos.quantidade as quantidade
					  from pesquisa_trafegos 
					    inner join classeveiculos on (pesquisa_trafegos.id_classeveiculos = classeveiculos.id)
						inner join contagens on (pesquisa_trafegos.id = contagens.id_pesquisa_trafegos)
						inner join contagem_veiculos on (contagens.id = contagem_veiculos.id_contagem)
						inner join sentidos on (contagens.id_sentido = sentidos.id)
						inner join veiculo_classeveiculo 
							on ( 
								veiculo_classeveiculo.id_classeveiculo = pesquisa_trafegos.id_classeveiculos  and
								veiculo_classeveiculo.id_veiculo = contagem_veiculos.id_veiculo		
							)
						where pesquisa_trafegos.id = '.$id.' 
						order by data_ini , hora , origem';
		
			return $this->exec_query($query);
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
			$query = 'SELECT MIN(km) as kmIni, MAX(km) as kmFim FROM '.$this->table.' WHERE uf ="'.$uf.'" and rodovia = '.$br.' ';
			return $this->exec_query($query);
		}
		
		function get_max_min_periodo_by_pesquisa_id($id){
			
			$this->db->select($this->table.'.data_ini as min, '.$this->table.'.data_fim as max');
			$this->db->from($this->table);
			$this->db->where('id', $id );
			
			$query = $this->db->get();
				
			return $query->result_array();
		}
		
		// passar esse controle pra perguntas
		
		function get_perguntas_od_by_id_entrevista($id){
			
			$query = 'select perguntas.* from od_entrevistas 
				inner join entrevista_perguntas on  (entrevista_perguntas.id_entrevista = od_entrevistas.id_entrevista)
				inner join perguntas on ( entrevista_perguntas.id_pergunta = perguntas.id)
				where od_entrevistas.id_origem_destino = '.$id.' 
				order by id';
				
				return $this->exec_query($query);
			
		}
		
}