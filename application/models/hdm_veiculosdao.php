<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class hdm_veiculosdao extends App_DAO {

	const VIEW_FOLDER = 'admin/hdm_veiculos';
	
		public $vmoTable = null;
		public $vpolTable = null;
		public $vvTable = null;
		public $hdm_veiculos_vmo_vpol_vvTable = null;
		public $veiculosTable = null;
		public $fator_conversao_padraoTable = null;
		public $fator_conversaoTable = null;
	
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'hdm_veiculos';
	        $this->vmoTable 	= 'vmo';
	        $this->vvTable  	= 'vv';
	        $this->vpolTable 	= 'vpol';
	        $this->hdm_veiculos_vmo_vpol_vvTable = 'hdm_veiculos_vmo_vpol_vv';
	        $this->veiculosTable = 'veiculos';
	        $this->fator_conversao_padraoTable = 'fator_conversao_padrao';
	        $this->fator_conversaoTable = 'fator_conversao';
	        
	    }
    	
    	/**
	    * Get hdm_veiculos by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_hdm_veiculos_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch hdm_veiculos data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_hdm_veiculos($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_hdm_veiculos($search_string=null, $order=null)
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
	    function store_hdm_veiculos($data, $data2)
	    {
	    	
	    	$this->db->trans_start();
	    	
	    	$result =  $this->db->insert($this->table, $data);
	    	$id_hdm_veiculo = $this->db->insert_id();
	    	$this->after_create_hdm_veiculo($id_hdm_veiculo, $data, $data2);
	    	
	    	$this->db->trans_complete();
	    	
	    	return $result;
		}
    	
		/*
		 
		  	unset($data['id']);
	    	$result = $this->db->insert($this->table, $data);
	    	$id_transporte = $this->db->insert_id();
	    	$this->before_create_transporte($id_transporte, $data);
	    	return $result;
		 
		 */
		
		
    	/**
	    * Update hdm_veiculos
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_hdm_veiculos($id, $data, $data2)
	    {
	    	
	    	$this->db->trans_start();
	    	
			$this->db->where('id', $id);
			$this->db->update($this->table, $data);
			$this->after_update_hdm_veiculo($id, $data, $data2);
			
			$this->db->trans_complete();
			
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
	    * Delete hdm_veiculos
	    * @param int $id - hdm_veiculos id
	    * @return boolean
	    */
		function delete_hdm_veiculos($id){
			
			$this->db->trans_start();
			
			$this->delete_query($id); 
			
			// DELETA REGISTROS RELACIONADOS AO HDM_VEICULO
			$query = 'select * from '.$this->hdm_veiculos_vmo_vpol_vvTable.' where id_hdm_veiculos = '. $id;
			$res = $this->db->query($query);
			$arrayIDs = $res->result_array();
				
			foreach($arrayIDs as $item){
				$this->db->query('DELETE FROM '.$this->vmoTable.' where id = '. $item['id_vmo'] );
				$this->db->query('DELETE FROM '.$this->vvTable.' where id = '. $item['id_vv'] );
				$this->db->query('DELETE FROM '.$this->vpolTable.' where id = '. $item['id_vpol'] );
				$this->db->query('DELETE FROM '.$this->hdm_veiculos_vmo_vpol_vvTable.' where id = '. $item['id'] );
			}
			
			$this->db->trans_complete();
		}    	

		function after_create_hdm_veiculo($id_hdm_veiculo, $data, $data2){
			
			
			// busca os valores de VMO da data referencia
			
			$id_hdm_veiculo_ref = $data['id_hdm_veiculos'];

			$this->db->select($this->table.'.*');
			$this->db->from($this->table);
			$this->db->where($this->table.'.id = '. $id_hdm_veiculo_ref );
			$query = $this->db->get();
			
			$hdm_veiculos = $query->result_array();
			//$this->PAR($hdm_veiculos);
			
			$this->db->select($this->fator_conversao_padraoTable.'.*');
			$this->db->from($this->fator_conversao_padraoTable);
			$this->db->order_by($this->fator_conversao_padraoTable.'.id ' );
			$query = $this->db->get();
			$arrayFatoresConvesao = $query->result_array();
			
			foreach($arrayFatoresConvesao as $item){
				unset($item['id']);
				$result =  $this->db->insert($this->fator_conversaoTable, $item);
				$id_fator_conversao[$item['id_veiculo']] = $this->db->insert_id();
			}
			
			$this->db->select(	$this->vmoTable.'.*, '.
								$this->fator_conversao_padraoTable.'.FEUC_LABOUR, '.
								$this->fator_conversao_padraoTable.'.FEUC_CREW, '
			);
			$this->db->from($this->vmoTable);
			$this->db->join($this->hdm_veiculos_vmo_vpol_vvTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_vmo = '.$this->vmoTable.'.id ', 'inner');
			$this->db->join($this->veiculosTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_veiculo = '.$this->veiculosTable.'.id ', 'inner');
			$this->db->join($this->fator_conversao_padraoTable, $this->veiculosTable.'.id = '.$this->fator_conversao_padraoTable.'.id_veiculo ', 'inner');
			$this->db->where($this->hdm_veiculos_vmo_vpol_vvTable.'.id_hdm_veiculos ='. $id_hdm_veiculo_ref );
			$query = $this->db->get();
				
			$vmo = $query->result_array();
			
			$i = 0;
			$indSal = $data['reajuste_salario'] / $hdm_veiculos[0]['reajuste_salario'];
			foreach( $vmo as $item){
				unset($vmo[$i]['id']);				
				$vmo[$i]['EUC_WORK'] 	= $item['EUC_WORK'] * $indSal ;
				$vmo[$i]['EUC_NONWRK'] 	= $item['EUC_NONWRK'] * $indSal ;
				$vmo[$i]['FUC_LABOUR'] 	= $item['FUC_LABOUR'] * $indSal ;
				$vmo[$i]['FUC_CREW'] 	= $item['FUC_CREW'] * $indSal ;
				$vmo[$i]['EUC_LABOUR'] 	= $vmo[$i]['FUC_LABOUR'] * $vmo[$i]['FEUC_LABOUR'] ;				
				$vmo[$i]['EUC_CREW'] 	= $vmo[$i]['FUC_CREW'] * $vmo[$i]['FEUC_CREW']  ;
				
				unset($vmo[$i]['FEUC_LABOUR'] );
				unset($vmo[$i]['FEUC_CREW']);
				
				$result =  $this->db->insert($this->vmoTable, $vmo[$i]);
				$id_vmo[$vmo[$i]['id_veiculo']] = $this->db->insert_id();
				
				$i++;
			}			
			
			
			$vv = $data2;
			foreach( $vv as $item){
				
				$this->db->select(	$this->fator_conversao_padraoTable.'.FEUC_VEH ');
				$this->db->from($this->fator_conversao_padraoTable);
				$this->db->where($this->fator_conversao_padraoTable.'.id_veiculo ='. $item['id_veiculo'] );
				$query = $this->db->get();
				$tmpvv = $query->result_array();
				
				$vv[$i]['id_veiculo'] 	= $item['id_veiculo'] ;
				$vv[$i]['FUC_VEH'] 	= $item['FUC_VEH'] ;
				$vv[$i]['EUC_VEH']  = $item['FUC_VEH'] * $tmpvv[0]['FEUC_VEH']  ;
			
				$result =  $this->db->insert($this->vvTable, $vv[$i]);
				$id_vv[$vv[$i]['id_veiculo']] = $this->db->insert_id();
					
				$i++;
			}
			
			$this->db->select(	$this->vvTable.'.*, '.
					$this->fator_conversao_padraoTable.'.FEUC_LABOUR, '.
					$this->fator_conversao_padraoTable.'.FEUC_CREW, '
			);
			$this->db->from($this->vvTable);
			$this->db->join($this->hdm_veiculos_vmo_vpol_vvTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_vv = '.$this->vvTable.'.id ', 'inner');
			$this->db->join($this->veiculosTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_veiculo = '.$this->veiculosTable.'.id ', 'inner');
			$this->db->join($this->fator_conversao_padraoTable, $this->veiculosTable.'.id = '.$this->fator_conversao_padraoTable.'.id_veiculo ', 'inner');
			$this->db->where($this->hdm_veiculos_vmo_vpol_vvTable.'.id_hdm_veiculos ='. $id_hdm_veiculo_ref );
			$query = $this->db->get();
			
			// busca os valores de VPOL da data referencia
			
			
			$this->db->select(	$this->vpolTable.'.*, '.
					$this->fator_conversao_padraoTable.'.FEUC_TYRE, '.
					$this->fator_conversao_padraoTable.'.FEUC_OIL, '.
					$this->fator_conversao_padraoTable.'.FEUC_OHEAD '
			);
			
			$this->db->from($this->vpolTable);
			$this->db->join($this->hdm_veiculos_vmo_vpol_vvTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_vpol = '.$this->vpolTable.'.id ', 'inner');
			$this->db->join($this->veiculosTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_veiculo = '.$this->veiculosTable.'.id ', 'inner');
			$this->db->join($this->fator_conversao_padraoTable, $this->veiculosTable.'.id = '.$this->fator_conversao_padraoTable.'.id_veiculo ', 'inner');
			$this->db->where($this->hdm_veiculos_vmo_vpol_vvTable.'.id_hdm_veiculos ='. $id_hdm_veiculo_ref );
			$query = $this->db->get();
				
			$vpol = $query->result_array();
			
			$i = 0;
			$indVarIGPM = $data['ind_var_igpm'] ;
			foreach( $vpol as $item){
				
				$vpol[$i]['EUC_CARGO'] 	= $item['EUC_CARGO'] * $indVarIGPM ;								
				$vpol[$i]['FUC_TYRE'] 	= $item['FUC_TYRE'] * $indVarIGPM ;
				$vpol[$i]['FUC_OIL'] 	= $item['FUC_OIL'] * $indVarIGPM ;
				$vpol[$i]['FUC_OHEAD'] 	= $item['FUC_OHEAD'] * $indVarIGPM ;
				
				$vpol[$i]['EUC_TYRE'] 	= $item['FUC_TYRE']  * $item['FEUC_TYRE'] ;
				$vpol[$i]['EUC_OIL'] 	= $item['FUC_OIL']   * $item['FEUC_OIL'];
				$vpol[$i]['EUC_OHEAD'] 	= $item['FUC_OHEAD'] * $item['FEUC_OHEAD'] ;
					
				unset($vpol[$i]['id']);
				unset($vpol[$i]['FEUC_TYRE']);
				unset($vpol[$i]['FEUC_OIL']);
				unset($vpol[$i]['FEUC_OHEAD']);
				
				$result =  $this->db->insert($this->vpolTable, $vpol[$i]);
				$id_vpol[$vpol[$i]['id_veiculo']] = $this->db->insert_id();
					
				$i++;
			}
					
			$this->db->select($this->veiculosTable.'.id');
			$this->db->from($this->veiculosTable);
			$this->db->order_by($this->veiculosTable.'.id');
			$query = $this->db->get();
			
			$veiculos = $query->result_array();
			
			foreach($veiculos as $item){
				$relArray = array('id_hdm_veiculos' => $id_hdm_veiculo, 
						'id_veiculo' => $item['id'], 
						'id_vmo' => $id_vmo[$item['id']], 
						'id_vpol' => $id_vpol[$item['id']], 
						'id_vv' => $id_vv[$item['id']],
						'id_fator_conversao' => $id_fator_conversao[$item['id']]
				);
				
				$result =  $this->db->insert($this->hdm_veiculos_vmo_vpol_vvTable, $relArray);
			}
			
			
		}
		
		function after_update_hdm_veiculo($id_hdm_veiculo, $data, $data2){
				
			
			// DELETA REGISTROS RELACIONADOS AO HDM_VEICULO
			$query = 'select * from '.$this->hdm_veiculos_vmo_vpol_vvTable.' where id_hdm_veiculos = '. $id_hdm_veiculo;
			$res = $this->db->query($query);
			$arrayIDs = $res->result_array();
			
			foreach($arrayIDs as $item){
				$this->db->query('DELETE FROM '.$this->vmoTable.' where id = '. $item['id_vmo'] );
				$this->db->query('DELETE FROM '.$this->vvTable.' where id = '. $item['id_vv'] );
				$this->db->query('DELETE FROM '.$this->vpolTable.' where id = '. $item['id_vpol'] );
				$this->db->query('DELETE FROM '.$this->fator_conversaoTable.' where id = '. $item['id_fator_conversao'] );
				$this->db->query('DELETE FROM '.$this->hdm_veiculos_vmo_vpol_vvTable.' where id = '. $item['id'] );
			}
			
			
			$id_hdm_veiculo_ref = $data['id_hdm_veiculos'];

			$this->db->select($this->table.'.*');
			$this->db->from($this->table);
			$this->db->where($this->table.'.id = '. $id_hdm_veiculo_ref );
			$query = $this->db->get();
			
			$hdm_veiculos = $query->result_array();
			//$this->PAR($hdm_veiculos);
			
			$this->db->select($this->fator_conversao_padraoTable.'.*');
			$this->db->from($this->fator_conversao_padraoTable);
			$this->db->order_by($this->fator_conversao_padraoTable.'.id ' );
			$query = $this->db->get();
			$arrayFatoresConvesao = $query->result_array();
			
			foreach($arrayFatoresConvesao as $item){
				unset($item['id']);
				$result =  $this->db->insert($this->fator_conversaoTable, $item);
				$id_fator_conversao[$item['id_veiculo']] = $this->db->insert_id();
			}
			
			$this->db->select(	$this->vmoTable.'.*, '.
								$this->fator_conversao_padraoTable.'.FEUC_LABOUR, '.
								$this->fator_conversao_padraoTable.'.FEUC_CREW, '
			);
			$this->db->from($this->vmoTable);
			$this->db->join($this->hdm_veiculos_vmo_vpol_vvTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_vmo = '.$this->vmoTable.'.id ', 'inner');
			$this->db->join($this->veiculosTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_veiculo = '.$this->veiculosTable.'.id ', 'inner');
			$this->db->join($this->fator_conversao_padraoTable, $this->veiculosTable.'.id = '.$this->fator_conversao_padraoTable.'.id_veiculo ', 'inner');
			$this->db->where($this->hdm_veiculos_vmo_vpol_vvTable.'.id_hdm_veiculos ='. $id_hdm_veiculo_ref );
			$query = $this->db->get();
				
			$vmo = $query->result_array();
			
			$i = 0;
			$indSal = $data['reajuste_salario'] / $hdm_veiculos[0]['reajuste_salario'];
			foreach( $vmo as $item){
				unset($vmo[$i]['id']);				
				$vmo[$i]['EUC_WORK'] 	= $item['EUC_WORK'] * $indSal ;
				$vmo[$i]['EUC_NONWRK'] 	= $item['EUC_NONWRK'] * $indSal ;
				$vmo[$i]['FUC_LABOUR'] 	= $item['FUC_LABOUR'] * $indSal ;
				$vmo[$i]['FUC_CREW'] 	= $item['FUC_CREW'] * $indSal ;
				$vmo[$i]['EUC_LABOUR'] 	= $vmo[$i]['FUC_LABOUR'] * $vmo[$i]['FEUC_LABOUR'] ;				
				$vmo[$i]['EUC_CREW'] 	= $vmo[$i]['FUC_CREW'] * $vmo[$i]['FEUC_CREW']  ;
				
				unset($vmo[$i]['FEUC_LABOUR'] );
				unset($vmo[$i]['FEUC_CREW']);
				
				$result =  $this->db->insert($this->vmoTable, $vmo[$i]);
				$id_vmo[$vmo[$i]['id_veiculo']] = $this->db->insert_id();
				
				$i++;
			}			
			
			
			$vv = $data2;
			foreach( $vv as $item){
				
				$this->db->select(	$this->fator_conversao_padraoTable.'.FEUC_VEH ');
				$this->db->from($this->fator_conversao_padraoTable);
				$this->db->where($this->fator_conversao_padraoTable.'.id_veiculo ='. $item['id_veiculo'] );
				$query = $this->db->get();
				$tmpvv = $query->result_array();
				
				$vv[$i]['id_veiculo'] 	= $item['id_veiculo'] ;
				$vv[$i]['FUC_VEH'] 	= $item['FUC_VEH'] ;
				$vv[$i]['EUC_VEH']  = $item['FUC_VEH'] * $tmpvv[0]['FEUC_VEH']  ;
			
				$result =  $this->db->insert($this->vvTable, $vv[$i]);
				$id_vv[$vv[$i]['id_veiculo']] = $this->db->insert_id();
					
				$i++;
			}
			
			$this->db->select(	$this->vvTable.'.*, '.
					$this->fator_conversao_padraoTable.'.FEUC_LABOUR, '.
					$this->fator_conversao_padraoTable.'.FEUC_CREW, '
			);
			$this->db->from($this->vvTable);
			$this->db->join($this->hdm_veiculos_vmo_vpol_vvTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_vv = '.$this->vvTable.'.id ', 'inner');
			$this->db->join($this->veiculosTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_veiculo = '.$this->veiculosTable.'.id ', 'inner');
			$this->db->join($this->fator_conversao_padraoTable, $this->veiculosTable.'.id = '.$this->fator_conversao_padraoTable.'.id_veiculo ', 'inner');
			$this->db->where($this->hdm_veiculos_vmo_vpol_vvTable.'.id_hdm_veiculos ='. $id_hdm_veiculo_ref );
			$query = $this->db->get();
			
			// busca os valores de VPOL da data referencia
			
			
			$this->db->select(	$this->vpolTable.'.*, '.
					$this->fator_conversao_padraoTable.'.FEUC_TYRE, '.
					$this->fator_conversao_padraoTable.'.FEUC_OIL, '.
					$this->fator_conversao_padraoTable.'.FEUC_OHEAD '
			);
			
			$this->db->from($this->vpolTable);
			$this->db->join($this->hdm_veiculos_vmo_vpol_vvTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_vpol = '.$this->vpolTable.'.id ', 'inner');
			$this->db->join($this->veiculosTable, $this->hdm_veiculos_vmo_vpol_vvTable.'.id_veiculo = '.$this->veiculosTable.'.id ', 'inner');
			$this->db->join($this->fator_conversao_padraoTable, $this->veiculosTable.'.id = '.$this->fator_conversao_padraoTable.'.id_veiculo ', 'inner');
			$this->db->where($this->hdm_veiculos_vmo_vpol_vvTable.'.id_hdm_veiculos ='. $id_hdm_veiculo_ref );
			$query = $this->db->get();
				
			$vpol = $query->result_array();
			
			$i = 0;
			$indVarIGPM = $data['ind_var_igpm'] ;
			foreach( $vpol as $item){
				
				$vpol[$i]['EUC_CARGO'] 	= $item['EUC_CARGO'] * $indVarIGPM ;								
				$vpol[$i]['FUC_TYRE'] 	= $item['FUC_TYRE'] * $indVarIGPM ;
				$vpol[$i]['FUC_OIL'] 	= $item['FUC_OIL'] * $indVarIGPM ;
				$vpol[$i]['FUC_OHEAD'] 	= $item['FUC_OHEAD'] * $indVarIGPM ;
				
				$vpol[$i]['EUC_TYRE'] 	= $vpol[$i]['FUC_TYRE']  * $item['FEUC_TYRE'] ;
				$vpol[$i]['EUC_OIL'] 	= $vpol[$i]['FUC_OIL']   * $item['FEUC_OIL'];
				$vpol[$i]['EUC_OHEAD'] 	= $vpol[$i]['FUC_OHEAD'] * $item['FEUC_OHEAD'] ;
					
				unset($vpol[$i]['id']);
				unset($vpol[$i]['FEUC_TYRE']);
				unset($vpol[$i]['FEUC_OIL']);
				unset($vpol[$i]['FEUC_OHEAD']);
				
				$result =  $this->db->insert($this->vpolTable, $vpol[$i]);
				$id_vpol[$vpol[$i]['id_veiculo']] = $this->db->insert_id();
					
				$i++;
			}
					
			$this->db->select($this->veiculosTable.'.id');
			$this->db->from($this->veiculosTable);
			$this->db->order_by($this->veiculosTable.'.id');
			$query = $this->db->get();
			
			$veiculos = $query->result_array();
			
			foreach($veiculos as $item){
				$relArray = array('id_hdm_veiculos' => $id_hdm_veiculo, 
						'id_veiculo' => $item['id'], 
						'id_vmo' => $id_vmo[$item['id']], 
						'id_vpol' => $id_vpol[$item['id']], 
						'id_vv' => $id_vv[$item['id']],
						'id_fator_conversao' => $id_fator_conversao[$item['id']]
				);
				
				$result =  $this->db->insert($this->hdm_veiculos_vmo_vpol_vvTable, $relArray);
			}
			
				
				
		}
		
		
    	function get_veiculos_by_hdm_veiculos($id_hdm){
    		
    		$query = 'select '.$this->veiculosTable.'.id, '
    						  .$this->veiculosTable.'.VEH_NAME, '
    						  .$this->veiculosTable.'.INFO, '
    						  .$this->veiculosTable.'.FATOR_CONV_FUC_EUC as FC, '
    						  .$this->vvTable.'.FUC_VEH  
							from '.$this->hdm_veiculos_vmo_vpol_vvTable.'
							inner join '.$this->veiculosTable.'
								on ('.$this->hdm_veiculos_vmo_vpol_vvTable.'.id_veiculo = veiculos.id)
							inner join vv
								on ('.$this->hdm_veiculos_vmo_vpol_vvTable.'.id_vv = '.$this->vvTable.'.id)
							where '.$this->hdm_veiculos_vmo_vpol_vvTable.'.id_hdm_veiculos = '.$id_hdm.';';
    		
    		$result = $this->db->query($query);
    		return $result->result_array();
    		
    	} 
    	
    	function  get_hdm_veiculos_by_ano($ano = null){
    		
    		if($ano){
    			$query = "select * from ".$this->table." where data_base >= '".$ano."-01-01' and data_base <= '".$ano."-12-31' order by data_base asc;";
    		}else{
    			$query = 'select * from '.$this->table.' order by data_base asc;';
    		}
    		
    		$result = $this->db->query($query);
    		return $result->result_array();
    	}
    	
    	function get_relatorio_hdm_veiculos_by_id($id){
    		
    		$query = "select 	".$this->veiculosTable.".VEH_ID,   
								".$this->veiculosTable.".VEH_NAME, 
								".$this->veiculosTable.".FATOR_CONV_FUC_EUC,
								".$this->veiculosTable.".CATEGORY,  
								".$this->veiculosTable.".BASE_TYPE,  
								".$this->veiculosTable.".CLASS,  
								".$this->veiculosTable.".INFO, 
								".$this->veiculosTable.".LIFE_MODEL,  
								".$this->veiculosTable.".PCSE, 
								".$this->veiculosTable.".NUM_WHEELS,  
								".$this->veiculosTable.".NUM_AXLES,  
								".$this->veiculosTable.".TYRE_TYPE,  
								".$this->veiculosTable.".TYRE_NR0, 
								".$this->veiculosTable.".TYRE_RREC,  
								".$this->veiculosTable.".AKM0,  
								".$this->veiculosTable.".HRWK0,  
								".$this->veiculosTable.".LIFE0,  
								".$this->veiculosTable.".PP,  
								".$this->veiculosTable.".PAX,  
								".$this->veiculosTable.".W, 
								".$this->veiculosTable.".WEIGHT_OP, 
								".$this->veiculosTable.".WGT_UNIT,  
								".$this->veiculosTable.".ESAL,
								".$this->vvTable.".EUC_VEH,
								".$this->vpolTable.".EUC_TYRE,
								if ( ".$this->veiculosTable.".EN_FUELTYP > 0, 
										 ".$this->table.".valor_oleo_e, 
										 ".$this->table.".valor_gas_e ) as EUC_FUEL,
								".$this->vpolTable.".EUC_OIL,
								".$this->vmoTable.".EUC_LABOUR,
								".$this->vmoTable.".EUC_CREW,
								".$this->vpolTable.".EUC_OHEAD,			
								".$this->veiculosTable.".EUC_INTRST,
								".$this->vmoTable.".EUC_WORK,
								".$this->vmoTable.".EUC_NONWRK,
								".$this->vpolTable.".EUC_CARGO,
								".$this->vvTable.".FUC_VEH,
								".$this->vpolTable.".FUC_TYRE,
								if ( ".$this->veiculosTable.".EN_FUELTYP > 0, 
										 ".$this->table.".valor_oleo, 
										 ".$this->table.".valor_gasolina ) as FUC_FUEL,			
								".$this->vpolTable.".FUC_OIL,
								".$this->vmoTable.".FUC_LABOUR,
								".$this->vmoTable.".FUC_CREW,
								".$this->vpolTable.".FUC_OHEAD,
								".$this->veiculosTable.".FUC_INTRST,  
								".$this->veiculosTable.".AF, 
								".$this->veiculosTable.".CD, 
								".$this->veiculosTable.".CDMULT, 
								".$this->veiculosTable.".CR_B_A0,  
								".$this->veiculosTable.".CR_B_A1, 
								".$this->veiculosTable.".CR_B_A2, 
								".$this->veiculosTable.".PDRIVE,  
								".$this->veiculosTable.".PDRV_UNITS,  
								".$this->veiculosTable.".PBRAKE,  
								".$this->veiculosTable.".PBRK_UNITS,  
								".$this->veiculosTable.".PRAT,  
								".$this->veiculosTable.".PRAT_UNITS,  
								".$this->veiculosTable.".FPLIM,  
								".$this->veiculosTable.".B_VDES2, 
								".$this->veiculosTable.".B_VDES_A0, 
								".$this->veiculosTable.".B_VDES_A1, 
								".$this->veiculosTable.".B_VDES_A2, 
								".$this->veiculosTable.".B_VDES_CW1,  
								".$this->veiculosTable.".B_VDES_CW2, 
								".$this->veiculosTable.".C_VDES2, 
								".$this->veiculosTable.".C_VDES_A0, 
								".$this->veiculosTable.".C_VDES_A1, 
								".$this->veiculosTable.".C_VDES_A2, 
								".$this->veiculosTable.".C_VDES_CW1,  
								".$this->veiculosTable.".C_VDES_CW2, 
								".$this->veiculosTable.".U_VDES2, 
								".$this->veiculosTable.".U_VDES_A0, 
								".$this->veiculosTable.".U_VDES_A1, 
								".$this->veiculosTable.".U_VDES_A2, 
								".$this->veiculosTable.".U_VDES_CW1,  
								".$this->veiculosTable.".U_VDES_CW2, 
								".$this->veiculosTable.".VCURVE_A0, 
								".$this->veiculosTable.".VCURVE_A1, 
								".$this->veiculosTable.".VROUGH_A0, 
								".$this->veiculosTable.".ARVMAX,  
								".$this->veiculosTable.".SPEED_SIG,  
								".$this->veiculosTable.".SPEED_BETA, 
								".$this->veiculosTable.".COV, 
								".$this->veiculosTable.".CGR_A0, 
								".$this->veiculosTable.".CGR_A1, 
								".$this->veiculosTable.".CGR_A2, 
								".$this->veiculosTable.".RPM_A0,  
								".$this->veiculosTable.".RPM_A1, 
								".$this->veiculosTable.".RPM_A2, 
								".$this->veiculosTable.".RPM_A3, 
								".$this->veiculosTable.".RPM_IDLE,  
								".$this->veiculosTable.".IDLE_FUEL, 
								".$this->veiculosTable.".ZETAB, 
								".$this->veiculosTable.".EHP, 
								".$this->veiculosTable.".EDT, 
								".$this->veiculosTable.".PACCS_A0, 
								".$this->veiculosTable.".PCTPENG,  
								".$this->veiculosTable.".OILCONT, 
								".$this->veiculosTable.".OILOPER, 
								".$this->veiculosTable.".AMAXV, 
								".$this->veiculosTable.".FRIAMAX, 
								".$this->veiculosTable.".NMTAMAX, 
								".$this->veiculosTable.".RIAMAX, 
								".$this->veiculosTable.".AMAXRI,  
								".$this->veiculosTable.".WHEEL_DIAM, 
								".$this->veiculosTable.".TYRE_C0TC, 
								".$this->veiculosTable.".TYRE_CTCTE, 
								".$this->veiculosTable.".TYRE_CTCON, 
								".$this->veiculosTable.".TYRE_VOL, 
								".$this->veiculosTable.".PARTS_A0, 
								".$this->veiculosTable.".PARTS_A1, 
								".$this->veiculosTable.".PARTS_KP, 
								".$this->veiculosTable.".RI_SHAPE, 
								".$this->veiculosTable.".RIMIN,  
								".$this->veiculosTable.".CPCON, 
								".$this->veiculosTable.".PARTS_K0PC,  
								".$this->veiculosTable.".PARTS_K1PC,  
								".$this->veiculosTable.".LAB_A0, 
								".$this->veiculosTable.".LAB_A1, 
								".$this->veiculosTable.".LAB_K0LH,  
								".$this->veiculosTable.".LAB_K1LH,  
								".$this->veiculosTable.".OPTLIFE_A0, 
								".$this->veiculosTable.".OPTLIFE_A1, 
								".$this->veiculosTable.".OPTLIFE_A2,  
								".$this->veiculosTable.".OPTLIFE_A3,  
								".$this->veiculosTable.".OPTLIFE_A4,  
								".$this->veiculosTable.".EM_CATCONVTR,  
								".$this->veiculosTable.".EN_FUELTYP,  
								".$this->veiculosTable.".EN_PRODVEH,  
								".$this->veiculosTable.".EN_PCTPART,  
								".$this->veiculosTable.".EN_PCTVEH,  
								".$this->veiculosTable.".EN_TYREWGT, 
								".$this->veiculosTable.".EN_TAREWGT, 
								".$this->veiculosTable.".EN_TAREUNT,  
								".$this->veiculosTable.".NM_WHEEL,  
								".$this->veiculosTable.".NM_PAYLOAD,  
								".$this->veiculosTable.".NM_VDESP,  
								".$this->veiculosTable.".NM_VDESU,  
								".$this->veiculosTable.".NM_A_RGH,  
								".$this->veiculosTable.".NM_CRGR,  
								".$this->veiculosTable.".NM_A_GRD,  
								".$this->veiculosTable.".NM_A_RMC,  
								".$this->veiculosTable.".NM_B_RMC,  
								".$this->veiculosTable.".NM_KEF,  
								".$this->veiculosTable.".EUC_PSGR,  
								".$this->veiculosTable.".EUC_ENERGY,  
								".$this->veiculosTable.".FUC_PSGR,  
								".$this->veiculosTable.".FUC_CARGO,  
								".$this->veiculosTable.".FUC_ENERGY,  
								".$this->veiculosTable.".EMRAT_A0, 
								".$this->veiculosTable.".EMRAT_A1, 
								".$this->veiculosTable.".EMRAT_A2, 
								".$this->veiculosTable.".KPFAC,  
								".$this->veiculosTable.".KPEA,
								".$this->table.".data_base 		
						from ".$this->table."
						inner join ".$this->hdm_veiculos_vmo_vpol_vvTable."
							on (".$this->hdm_veiculos_vmo_vpol_vvTable.".id_hdm_veiculos = ".$this->table.".id)
						inner join ".$this->veiculosTable."
							on (".$this->hdm_veiculos_vmo_vpol_vvTable.".id_veiculo = ".$this->veiculosTable.".id)	
						inner join ".$this->vvTable."
							on (".$this->hdm_veiculos_vmo_vpol_vvTable.".id_vv = ".$this->vvTable.".id)	
						inner join ".$this->vpolTable."
							on (".$this->hdm_veiculos_vmo_vpol_vvTable.".id_vpol = ".$this->vpolTable.".id)
						inner join ".$this->vmoTable."
							on (".$this->hdm_veiculos_vmo_vpol_vvTable.".id_vmo = ".$this->vmoTable.".id)
						where hdm_veiculos.id = ".$id ;
    	
    		$result = $this->db->query($query);
    		return $result->result_array();
    		
    		
    	}
}