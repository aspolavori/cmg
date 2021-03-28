<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class transportesdao extends App_DAO {

	const VIEW_FOLDER = 'admin/transportes';
	
		public $transporteMaterialClasseTable = null;
		public $sicroTransporteTable = null;
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'transportes';
	        $this->transporteMaterialClasseTable = 'transporte_material_classe';
	        $this->sicroTransporteTable = 'sicro_transporte';
	    }
    	
    	/**
	    * Get transporte by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_transporte_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch transportes data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_transportes($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_transportes($search_string=null, $order=null)
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
	    function store_transporte($data)
	    {
	    	unset($data['id']);
	    	
	    	$this->db->trans_start();
	    	
	    	$result = $this->db->insert($this->table, $data);
	    	$id_transporte = $this->db->insert_id();
	    	$this->before_create_transporte($id_transporte, $data);
	    	
	    	$this->db->trans_complete();
	    	return $result;
		}
    	
    	/**
	    * Update transporte
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_transporte($id, $data)
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
	    * Delete transporte
	    * @param int $id - transporte id
	    * @return boolean
	    */
		function delete_transporte($id){
			$this->delete_query($id); 
			$this->db->query('DELETE FROM '.$this->transporteMaterialClasseTable.' where id_transporte = '. $id );
			
		} 

		/*
		 *  Function right before create a transport record
		 */
		function before_create_transporte($id_transporte, $data){
			
			$query = "select ".$this->transporteMaterialClasseTable.".* 
					  from ".$this->transporteMaterialClasseTable."
					  where ".$this->transporteMaterialClasseTable.".id_transporte = ".$data['modelo']."
					  order by id_secundario asc" ;
			
			$result = $this->db->query($query)->result_array();
			
			foreach($result as $item){
				unset($item['id']);
				$item['id_transporte'] = $id_transporte;
				$this->insert_query_in($item, $this->transporteMaterialClasseTable);
			}
			/*
			$query = "
			INSERT INTO ".$this->transporteMaterialClasseTable." 
				(`id_transporte`, `id_secundario`, `id_composicao`, `titulo`, `origem`, `destino`, `formula`, `trans_veic_caminho`, `observacao`) 
			VALUES
				(".$id_transporte.", 1, 0, 'CAPs (quente)', 'Refinaria', 'Usina/Depósito', 'T = ( CTC1+CTC2*D) * Fator de Correção', 'Transporte comercial de material betuminoso (refinaria)', 'Observacao 01'),
				(".$id_transporte.", 2,0, 'EMULSÕES (frio)', 'Distribuidor (Capital)', 'Usina/Depósito', 'T = ( CTF1+CTF2*D) * Fator de Correção', 'Transporte comercial de material betuminoso (distribuidora - Capital)', 'Observacao 01'),
				(".$id_transporte.", 3,5, 'Areia ou seixo', 'Areal', 'Pista', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 4,5, 'Areia ou seixo', 'Areal', 'Usina/Depósito', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 5,5, 'Pedra ou brita', 'Pedreira', 'Pista', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 6,5, 'Pedra ou brita', 'Pedreira', 'Usina/Depósito', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 7,5, 'Material de Jazida', 'Jazida', 'Pista', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 8,5, 'Material de Jazida', 'Jazida', 'Usina/Depósito', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 9,5, 'Material Usinado, Massas (diversos)', 'Usina/Depósito', 'Pista', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 10,19, 'Cimento, madeira e aço', 'Fábr. Cimento', 'Usina/Depósito', 'T = D * Custo(R$/tkm)', 'Transp. Comercial Carroc. pav.', 'Observacao 01'),
				(".$id_transporte.", 11,19, 'Cimento,madeira,aço,pre-moldados', 'Usina/Depósito', 'Pista', 'T = D * Custo(R$/tkm)', 'Transp. Local Carroc.15t pav.', 'Observacao 01'),
				(".$id_transporte.", 12,47, 'EMULSÕES (frio)', 'Usina/Depósito', 'Pista', 'T = D * Custo(R$/tkm)', 'Transp. Local de Material Betum.', 'Observacao 01'),
				(".$id_transporte.", 13,32, 'Material Retirado da Pista', 'Pista', 'Bota Fora', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 não pav.', 'Observacao 01'),
				(".$id_transporte.", 14,5, 'Filer', 'Fornecedor', 'Usina/Depósito', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 15,5, 'Material Fresado', 'Pista', 'Local de Conveniência', 'T = D * Custo(R$/tkm)', 'Transp. Local Basc.10m3 pav.', 'Observacao 01'),
				(".$id_transporte.", 16,61, 'Concreto Usinado', 'Usina/Depósito', 'Pista', 'T = D * Custo(R$/tkm)', 'Transp. Local c/ Betoneira pav.', 'Observacao 01');
			";
			*/
			return $this->db->query($query);
			
		}
		
		/**
		 * Get transporte by his is region (titulo)
		 * @param int $id
		 * @return array
		 */
		public function get_transporte_by_regiao($regiao, $uf = null)
		{
			// TODO :  VERIFICAR ESSA REGRA
			if($uf){
				$query = "select * from ".$this->table." where regiao = '".$regiao."' and uf = '".$uf."' limit 1;";
			}else{
				$query = "select * from ".$this->table." where regiao = '".$regiao."' limit 1;";
			}
			
			$result = $this->db->query($query);
    		return $result->result_array();
		}
		
		/**
		 * Get transporte by id sicro (titulo)
		 * @param int $id
		 * @return array
		 
		public function get_transporte_by_regiao($id_sicro)
		{
			// TODO :  VERIFICAR ESSA REGRA
			$query = "select * from ".$this->table."
				inner join ".$this->transporteMaterialClasseTable." 
					on (".$this->table.".id = ".$this->transporteMaterialClasseTable.".id_transporte )
				inner join ".$this->sicroTransporteTable ." 
					on  (".$this->table.".id = ".$this->sicroTransporteTable .".id_transporte )
				where id_sicro = ".$id_sicro.";";
			
			$result = $this->db->query($query);
			return $result->result_array();
		}
		*/
}