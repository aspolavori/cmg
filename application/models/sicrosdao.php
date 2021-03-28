<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class sicrosdao extends App_DAO {

	const VIEW_FOLDER = 'admin/sicros';
	
		public $sicroTransporteTable = null;
		
		// materiais
		public $sicroMaterialTable = null;
		public $materialTransporteTable = null;
		public $materialTable = null;
		
		//betuminosos
		public $sicroMaterialBetuminosoTable = null;
		public $materialBetuminosoTransporteTable = null;
		public $materialBetuminosoTable = null;
		
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'sicros';
	        $this->sicroTransporteTable = 'sicro_transporte';
	        
	        //materiais
	        // TODO: VERIFICAR
	        $this->sicroMaterialTable		 = 'sicro_material_custo';
	        $this->materialTransporteTable   = 'material_transporte';
	        $this->materialTable 			 = 'materiais';
	        
	        
	        // betuminosos
	        $this->sicroMaterialBetuminosoTable		 = 'sicro_material_betuminoso_custo';
	        $this->materialBetuminosoTransporteTable = 'material_betuminoso_transporte';	         
	        $this->materialBetuminosoTable 			 = 'materiais_betuminosos';
	        
	        // composicao_transporte
	        //$this->sicroMaterialBetuminosoTable		 = 'sicro_material_betuminoso_custo';
	        //$this->materialBetuminosoTransporteTable = 'material_betuminoso_transporte';
	        //$this->materialBetuminosoTable 			 = 'materiais_betuminosos';
	        
	    }
    	
    	/**
	    * Get sicro by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_sicro_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch sicros data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_sicros($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_sicros($search_string=null, $order=null)
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
	    function store_sicro($data)
	    {
	    	unset($data['id']);
    		$result = $this->db->insert($this->table, $data);
    		$id_sicro = $this->db->insert_id();
	    	$this->before_create_sicro($id_sicro, $data['regiao'], $data['br']);
	    	return $result;
		}
    	
    	/**
	    * Update sicro
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_sicro($id, $data)
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
	    * Delete sicro
	    * @param int $id - sicro id
	    * @return boolean
	    */
		function delete_sicro($id){
			$this->delete_query($id); 
		}

		function before_create_sicro($id, $regiao, $uf = null){
			
			$this->load->model('transportesdao');
			$transporte = new transportesdao();
			
			$this->load->model('sicro_transportedao');
			$sicroTransporte = new sicro_transportedao();
			
			$this->load->model('sicro_fator_pavimentacaodao');
			$sicroFatorPavimentacao = new sicro_fator_pavimentacaodao();
			$sicroFatorPavimentacao->store_padrao_data($id);
			
			if($uf){
				$arrayTransporte = $transporte->get_transporte_by_regiao($regiao, $uf);
			}else{
				$arrayTransporte = $transporte->get_transporte_by_regiao($regiao);
			}
			
			
			$data = array('id_sicro' => $id, 'id_transporte' => $arrayTransporte[0]['id']);
			return $sicroTransporte->store_sicro_transporte($data);
		}
		
		
		// TODO: TESTAR
		function get_id_material_class_material_by_id_sicro_material($id_sicro, $id_material){
				
			$query="select ".$this->materialTransporteTable.".id_transporte_material_classe1,
					       ".$this->materialTransporteTable.".id_transporte_material_classe2
				 from ".$this->table."
				inner join ".$this->sicroMaterialTable."
					on (sicros.id = ".$this->sicroMaterialTable.".id_sicro)
				inner join ".$this->materialTable."
					on (".$this->sicroMaterialTable.".id_material = ".$this->materialTable.".id)
				inner join ".$this->materialTransporteTable."
					on (".$this->materialTable.".id = ".$this->materialTransporteTable.".id_material)
				where
					".$this->table.".id = ".$id_sicro."	AND
					".$this->materialTable.".id = ".$id_material.";";
				
			$result = $this->db->query($query);
			return $result->result_array();
		}
		
		function get_id_material_class_material_betuminoso_by_id_sicro_betuminoso($id_sicro, $id_betuminoso){
			
			$query="select ".$this->materialBetuminosoTransporteTable.".id_transporte_material_classe1, 
					       ".$this->materialBetuminosoTransporteTable.".id_transporte_material_classe2 
				 from ".$this->table."
				inner join ".$this->sicroMaterialBetuminosoTable."
					on (sicros.id = ".$this->sicroMaterialBetuminosoTable.".id_sicro)
				inner join ".$this->materialBetuminosoTable."
					on (".$this->sicroMaterialBetuminosoTable.".id_material_betuminoso = ".$this->materialBetuminosoTable.".id)
				inner join ".$this->materialBetuminosoTransporteTable."
					on (".$this->materialBetuminosoTable.".id = ".$this->materialBetuminosoTransporteTable.".id_material_betuminoso)		
				where 
					".$this->table.".id = ".$id_sicro."	AND
					".$this->materialBetuminosoTable.".id = ".$id_betuminoso.";";
			
			$result = $this->db->query($query);
			return $result->result_array();
		}

		function get_regiao_sicro(){
			
			$this->db->select($this->table.'.regiao');
			$this->db->from($this->table);
			$this->db->group_by($this->table.'.regiao');
			$this->db->order_by($this->table.'.regiao' , 'Asc');
			$query = $this->db->get();
				
			return $query->result_array();
		}
		
		function get_uf_sicro_by_regiao($regiao){
				
			$this->db->select($this->table.'.br');
			$this->db->from($this->table);
			$this->db->where($this->table.'.regiao' , $regiao);
			$this->db->group_by($this->table.'.br');
			$this->db->order_by($this->table.'.br' , 'Asc');
			$query = $this->db->get();
		
			return $query->result_array();
		}
	
		function get_sicro_list_to_relatorio($arrayData){
			
			$and = '';
			
			if($arrayData['uf']){
				$and .= ' AND br = "'.$arrayData['uf'].'"';
			}
			if($arrayData['data_ini']){
				$and .= ' AND data_base >= '.$arrayData['data_ini'].'-01-01';
			}
			if($arrayData['data_ini']){
				$and .= ' AND data_base <= '.$arrayData['data_fim'].'-12-31';
			}
			$query="select * from ".$this->table." 
					where regiao = '".$arrayData['regiao']."'".$and." order by data_base Desc ;";
			
			
				
			$result = $this->db->query($query);
			return $result->result_array();
		}
		
}