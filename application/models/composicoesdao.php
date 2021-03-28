<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class composicoesdao extends App_DAO {

	const VIEW_FOLDER = 'admin/composicoes';
	
		public $compEquipTable 	= null;
		public $equipTable 		= null;
		public $sicroEquipTable = null;
		
		public $compMatTable 	= null;
		public $matTable 		= null;
		public $sicroMatTable 	= null;
		
		public $compMatBetTable 	= null;
		public $matBetTable 		= null;
		public $sicroMatBetTable 	= null;
		
		public $compMaoTable 	= null;
		public $maoTable 		= null;
		public $sicromaoTable 	= null;
		

		public $compCompTransporteTable 	= null;
		public $composicaoTransporteTable 	= null;
		
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table 			= 'composicoes';
	        
	        $this->compEquipTable 	= 'composicao_equipamento';
	        $this->equipTable 		= 'equipamentos';
	        $this->sicroEquipTable 	= 'sicro_equipamento_custo';		
	        
	        $this->compMatTable 	= 'composicao_material';
	        $this->matTable			= 'materiais';
	        $this->sicroMatTable	= 'sicro_material_custo';
	        
	        $this->compMatBetTable 	= 'composicao_material_betuminoso';
	        $this->matBetTable		= 'materiais_betuminosos';
	        $this->sicroMatBetTable	= 'sicro_material_betuminoso_custo';
	        
	        $this->compMaoTable 	= 'composicao_mao_obra';
	        $this->maoTable		= 'mao_obra';
	        $this->sicromaoTable	= 'sicro_mao_obra_custo';
	        
	        $this->compCompTransporteTable 		= 'composicao_composicao_transporte';
	        $this->composicaoTransporteTable	= 'composicao_transporte';
	       
	    }
    	
    	/**
	    * Get composicao by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_composicao_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch composicoes data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_composicoes($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_composicoes($search_string=null, $order=null)
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
	    function store_composicao($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update composicao
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_composicao($id, $data)
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
	    * Delete composicao
	    * @param int $id - composicao id
	    * @return boolean
	    */
		function delete_composicao($id){
			$this->delete_query($id); 
		} 
			
		
		function get_unitario_equipamento_by_id_composicao_sicro($id_sicro, $id_composicao){
			
			/*
			 // Esse select retorna o valor unitario baseado no sicro e composicao, o select mais interno retorna a tabela com valoes previamente calculados
			 // contudo, para que o metodo fique contido no controle, o calculo não será realizado durante a consulta.
			 select sum(custo_unitario) from 
				(
				select 
					 composicao_equipamento.id_equipamento,
					 equipamentos.codigo, 
					 equipamentos.titulo,
					 composicao_equipamento.quantidade as quantidade,
					 composicao_equipamento.utilizacao_improdutivo as utilizacao_improdutivo,
					 composicao_equipamento.utilizacao_operativo as utilizacao_operativo,
					 sicro_equipamento_custo.improdutivo as improdutivo,
					 sicro_equipamento_custo.operativo as operativo, 
					 quantidade * ((utilizacao_improdutivo * improdutivo) + (utilizacao_operativo * operativo)) as custo_unitario 
					from	composicao_equipamento 
					inner join sicro_equipamento_custo 
						on(composicao_equipamento.id_equipamento = sicro_equipamento_custo.id_equipamento)
					inner join equipamentos 
						on (equipamentos.id = composicao_equipamento.id_equipamento)
					where 
						composicao_equipamento.id_composicao = 1 and
						sicro_equipamento_custo.id_sicro = 1
				) as consulta
			 
			 */
			
			$query = 'select 
						 '.$this->compEquipTable.'.id_equipamento,
						 '.$this->equipTable.'.codigo, 
						 '.$this->equipTable.'.titulo,
						 '.$this->compEquipTable.'.quantidade as quantidade,
						 '.$this->compEquipTable.'.utilizacao_improdutivo as utilizacao_improdutivo,
						 '.$this->compEquipTable.'.utilizacao_operativo as utilizacao_operativo,
						 '.$this->sicroEquipTable.'.improdutivo as improdutivo,
						 '.$this->sicroEquipTable.'.operativo as operativo
					
						from	'.$this->compEquipTable.' 
						inner join '.$this->sicroEquipTable.' 
							on('.$this->compEquipTable.'.id_equipamento = '.$this->sicroEquipTable.'.id_equipamento)
						inner join '.$this->equipTable.' 
							on ('.$this->equipTable.'.id = '.$this->compEquipTable.'.id_equipamento)
						where 
							'.$this->compEquipTable.'.id_composicao = '.$id_composicao.' and
							'.$this->sicroEquipTable.'.id_sicro = '.$id_sicro.';';
			
			return $this->exec_query($query);
			
		}

		function get_unitario_material_by_id_composicao_sicro( $id_sicro, $id_composicao){
				
			/*
			 select
				composicao_material.id_material,
				materiais.codigo,
				materiais.titulo,
				composicao_material.quantidade as quantidade,
				sicro_material_custo.custo_unitario as custo_unitario		
			from	composicao_material
				inner join sicro_material_custo
					on(composicao_material.id_material = sicro_material_custo.id_material)
				inner join materiais
					on (materiais.id = composicao_material.id_material)
				where
					composicao_material.id_composicao = 1 and
					sicro_material_custo.id_sicro = 1;
		
			*/
			
			$query = ' select
							'.$this->compMatTable.'.id_material,
							'.$this->matTable.'.codigo,
							'.$this->matTable.'.titulo,
							'.$this->compMatTable.'.quantidade as quantidade,
							'.$this->sicroMatTable.'.custo_unitario as preco_unitario		
						from	'.$this->compMatTable.'
							inner join '.$this->sicroMatTable.'
								on('.$this->compMatTable.'.id_material = '.$this->sicroMatTable.'.id_material)
							inner join '.$this->matTable.'
								on ('.$this->matTable.'.id = '.$this->compMatTable.'.id_material)
							where
								'.$this->compMatTable.'.id_composicao = '.$id_composicao.' and
								'.$this->sicroMatTable.'.id_sicro = '.$id_sicro.';';
				
			return $this->exec_query($query);
				
		}

		
		function get_unitario_material_betuminiso_by_id_composicao_sicro($id_sicro, $id_composicao){
		
			/*
			 select
			composicao_material.id_material,
			materiais.codigo,
			materiais.titulo,
			composicao_material.quantidade as quantidade,
			sicro_material_custo.custo_unitario as custo_unitario
			from	composicao_material
			inner join sicro_material_custo
			on(composicao_material.id_material = sicro_material_custo.id_material)
			inner join materiais
			on (materiais.id = composicao_material.id_material)
			where
			composicao_material.id_composicao = 1 and
			sicro_material_custo.id_sicro = 1;
		
			*/
				
			$query = ' select
							'.$this->compMatBetTable.'.id_material_betuminoso,
							'.$this->matBetTable.'.codigo,
							'.$this->matBetTable.'.titulo,
							'.$this->compMatBetTable.'.quantidade as quantidade,
							'.$this->sicroMatBetTable.'.custo_unitario as preco_unitario
						from	'.$this->compMatBetTable.'
							inner join '.$this->sicroMatBetTable.'
								on('.$this->compMatBetTable.'.id_material_betuminoso = '.$this->sicroMatBetTable.'.id_material_betuminoso)
							inner join '.$this->matBetTable.'
								on ('.$this->matBetTable.'.id = '.$this->compMatBetTable.'.id_material_betuminoso)
							where
								'.$this->compMatBetTable.'.id_composicao = '.$id_composicao.' and
								'.$this->sicroMatBetTable.'.id_sicro = '.$id_sicro.';';
		
			return $this->exec_query($query);
		
					
		}
		
		function get_unitario_mao_obra_by_id_composicao_sicro($id_sicro, $id_composicao){
		
			/*
			 select
				composicao_mao_obra.id_mao_obra,
				mao_obra.codigo,
				mao_obra.titulo,
				composicao_mao_obra.quantidade as quantidade,
				sicro_mao_obra_custo.custo_horario as custo_horario		
			from	composicao_mao_obra
				inner join sicro_mao_obra_custo
					on(composicao_mao_obra.id_mao_obra = sicro_mao_obra_custo.id_mao_obra)
				inner join mao_obra
					on (mao_obra.id = composicao_mao_obra.id_mao_obra)
				where
					composicao_mao_obra.id_composicao = 1 and
					sicro_mao_obra_custo.id_sicro = 1;
		
			*/
			
			$query = ' select
						'.$this->compMaoTable.'.id_mao_obra,
						'.$this->maoTable.'.codigo,
						'.$this->maoTable.'.titulo,
						'.$this->compMaoTable.'.quantidade as quantidade,
						'.$this->sicromaoTable.'.custo_horario as custo_horario		
					from	'.$this->compMaoTable.'
						inner join '.$this->sicromaoTable.'
							on('.$this->compMaoTable.'.id_mao_obra = '.$this->sicromaoTable.'.id_mao_obra)
						inner join '.$this->maoTable.'
							on('.$this->maoTable.'.id = '.$this->compMaoTable.'.id_mao_obra)
						where
							'.$this->compMaoTable.'.id_composicao = '.$id_composicao.' and
								'.$this->sicromaoTable.'.id_sicro = '.$id_sicro.';';
		
			return $this->exec_query($query);
		
		}
		
		
		function get_unitario_composicao_transporte_by_id_composicao( $id_composicao){
				
			$query = ' select
							'.$this->compCompTransporteTable.'.id_composicao_transporte,
							'.$this->composicaoTransporteTable.'.codigo,
							'.$this->composicaoTransporteTable.'.titulo,
							'.$this->compCompTransporteTable.'.quantidade as quantidade
						from	'.$this->compCompTransporteTable.'
							inner join '.$this->composicaoTransporteTable.'
								on ('.$this->composicaoTransporteTable.'.id = '.$this->compCompTransporteTable.'.id_composicao_transporte)
							where
								'.$this->compCompTransporteTable.'.id_composicao = '.$id_composicao.';';
		
			
			return $this->exec_query($query);
		
		}
		
		
		/**
		 * Fetch composicoes data from the database
		 * possibility to mix search, filter and order
		 * @param string $search_string
		 * @param strong $order
		 * @param string $order_type
		 * @param int $limit_start
		 * @param int $limit_end
		 * @return array
		 */
		public function get_composicoes_auxiliares()
		{
		
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where($this->table.'.categoria', 'Auxiliar');
			$this->db->order_by('codigo');
				
			$query = $this->db->get();
				
			return $query->result_array();
		}
		
		
}