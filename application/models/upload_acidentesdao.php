<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class upload_acidentesdao extends App_DAO {
	
	const VIEW_FOLDER = 'admin/upload_acidentes';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	/*
	 * $rowAcidente, $rowLocal, $rowCondMortos, $rowTipoVeiculo, $rowEstadoPneus, 
									$rowCategoriaCNH,  $rowEstadoEmbriagues, $rowTempoHabilitacao, 
									$rowHorasDirigindo, $rowNumeroCondutores, $rowDadosPRF, $rowDadosAdicionais
	 */
	
	public $condMortos 	= 		null;
	public $tipoVeiculos =		null;
	public $estadoPneus = 		null;
	public $tempHabilitacao = 	null;
	public $usoCintoCapacete = 	null;
	public $localAcidente = 	null;
	public $numCondutores = 	null;
	public $dadosPRF = 			null;
	public $estadoEmbriagues = 	null;
	public $tipoCarga = 		null;
	public $categoriaCNH = 		null;
	public $horasDirigindo = 	null;
	public $acidentesRela = 	null;
	public $dadosAdicionais = 	null;
	public $superficiePista = 	null;
	
	
	    public function __construct()
	    {
	        $this->load->database();
	        
	        $this->table = 'acidentes_new';
	        $this->condMortos = 	'condicao_mortos';
	        $this->tipoVeiculos = 	'tipo_veiculos';
	        $this->estadoPneus = 	'estado_pneus';
	        $this->tempHabilitacao = 'tempo_habilitacao';
	        $this->usoCintoCapacete = 'uso_cinto_capacete';
	        $this->localAcidente = 	'local_acidente';
	        $this->numCondutores = 	'numero_condutores';
	        $this->dadosPRF = 		'dados_prf';
	        $this->estadoEmbriagues = 'estado_embriagues';
	        $this->tipoCarga = 		'tipo_carga';
	        $this->categoriaCNH = 	'categoria_cnh';
	        $this->horasDirigindo = 'horas_dirigindo';
	        $this->acidentesRela = 	'acidentes_relacionamentos';
	        $this->dadosAdicionais = 'dados_adicionais';
	        $this->superficiePista = 'superficie_pista';
	        
	        
	    }
    	
    	/**
	    * Get upload_acidentes by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_upload_acidentes_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch upload_acidentes data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_upload_acidentes($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_upload_acidentes($search_string=null, $order=null)
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
	    function store_upload_acidentes($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update upload_acidentes
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_upload_acidentes($id, $data)
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
	    * Delete upload_acidentes
	    * @param int $id - upload_acidentes id
	    * @return boolean
	    */
		function delete_upload_acidentes($id){
			$this->delete_query($id); 
		}  
		
		// 12 arrays 13 tabelas
		function insert_from_file(	$rowAcidente, $rowLocal, $rowCondMortos, $rowTipoVeiculo, $rowEstadoPneus, 
									$rowCategoriaCNH,  $rowEstadoEmbriagues, $rowTempoHabilitacao, $rowHorasDirigindo, 
									$rowNumeroCondutores, $rowDadosPRF, $rowDadosAdicionais,  $rowTipoCarga, $rowUsoCintoCapacete, $rowSuperficiePista ){
			
			$this->db->trans_start();		
			// acidentes
				$this->insert_query_in($rowAcidente, $this->table);
				$acidenteID = $this->db->insert_id();
				
			// condicao_mortos
				$this->insert_query_in($rowCondMortos, $this->condMortos);
				$condMortosID = $this->db->insert_id();
				
			// tipo_veiculos
				$this->insert_query_in($rowTipoVeiculo, $this->tipoVeiculos);
				$tipoVeiculosID = $this->db->insert_id();

			// estado_pneus
				$this->insert_query_in($rowEstadoPneus, $this->estadoPneus);
				$estadoPneusID = $this->db->insert_id();

			// tempHabilitacao
				$this->insert_query_in($rowTempoHabilitacao, $this->tempHabilitacao);
				$tempHabilitacaoID = $this->db->insert_id();
								
			//usoCintoCapacete
				$this->insert_query_in($rowUsoCintoCapacete, $this->usoCintoCapacete);
				$usoCintoCapaceteID = $this->db->insert_id();

			// localAcidente
				$this->insert_query_in($rowLocal, $this->localAcidente);
				$localAcidenteID = $this->db->insert_id();
				
			// numCondutores
				$this->insert_query_in($rowNumeroCondutores, $this->numCondutores);
				$numCondutoresID = $this->db->insert_id();
				
			// dadosPRF
				$this->insert_query_in($rowDadosPRF, $this->dadosPRF);
				$dadosPRFID = $this->db->insert_id();
				
			// estadoEmbriagues
				$this->insert_query_in($rowEstadoEmbriagues, $this->estadoEmbriagues);
				$estadoEmbriaguesID = $this->db->insert_id();
				
			// tipoCarga
				$this->insert_query_in($rowTipoCarga, $this->tipoCarga);
				$tipoCargaID = $this->db->insert_id();
				
			// categoriaCNH
				$this->insert_query_in($rowCategoriaCNH, $this->categoriaCNH);
				$categoriaCNHID = $this->db->insert_id();				
				
			// horasDirigindo
				$this->insert_query_in($rowHorasDirigindo, $this->horasDirigindo);
				$horasDirigindoID = $this->db->insert_id();
				
			// dadosAdicionais
				$this->insert_query_in($rowDadosAdicionais, $this->dadosAdicionais);
				$dadosAdicionaisID = $this->db->insert_id();

			// superficiePista
				$this->insert_query_in($rowSuperficiePista, $this->superficiePista);
				$superficiePistaID = $this->db->insert_id();				
				
			// monta o array de relacionamentos
			
				$data = array( 	'id_acidentes' 			=>$acidenteID,
								'id_local_acidente' 	=>$localAcidenteID,
								'id_superficie_pista' 	=>$superficiePistaID,
								'id_condicao_mortos'  	=>$condMortosID,
								'id_tipo_veiculos'  	=>$tipoVeiculosID,
								'id_estado_pneus'  		=>$estadoPneusID,
								'id_tipo_carga'  		=>$tipoCargaID,
								'id_categoria_cnh'  	=>$categoriaCNHID,
								'id_estado_embriagues'  =>$estadoEmbriaguesID,
								'id_tempo_habilitacao' 	=>$tempHabilitacaoID,
								'id_horas_dirigindo'  	=>$horasDirigindoID,
								'id_uso_cinto_capacete' =>$usoCintoCapaceteID,
								'id_numero_condutores'  =>$numCondutoresID,
								'id_dados_prf'  		=>$dadosPRFID,
								'id_dados_adicionais' 	=>$dadosAdicionaisID
						); 
				
				$this->insert_query_in($data, $this->acidentesRela);
				
				
			$this->db->trans_complete();
			
		}
		
		
		function insert_from_file2005(	$rowAcidente, $rowLocal, $rowCondMortos, $rowTipoVeiculo, $rowEstadoPneus,
				$rowCategoriaCNH,  $rowEstadoEmbriagues, $rowTempoHabilitacao, $rowHorasDirigindo,
				$rowNumeroCondutores, $rowDadosPRF, $rowDadosAdicionais,  $rowUsoCintoCapacete, $rowSuperficiePista ){
		
			$this->db->trans_start();
			// acidentes
			$this->insert_query_in($rowAcidente, $this->table);
			$acidenteID = $this->db->insert_id();
		
			// condicao_mortos
			$this->insert_query_in($rowCondMortos, $this->condMortos);
			$condMortosID = $this->db->insert_id();
		
			// tipo_veiculos
			$this->insert_query_in($rowTipoVeiculo, $this->tipoVeiculos);
			$tipoVeiculosID = $this->db->insert_id();
		
			// estado_pneus
			$this->insert_query_in($rowEstadoPneus, $this->estadoPneus);
			$estadoPneusID = $this->db->insert_id();
		
			// tempHabilitacao
			$this->insert_query_in($rowTempoHabilitacao, $this->tempHabilitacao);
			$tempHabilitacaoID = $this->db->insert_id();
		
			//usoCintoCapacete
			$this->insert_query_in($rowUsoCintoCapacete, $this->usoCintoCapacete);
			$usoCintoCapaceteID = $this->db->insert_id();
		
			// localAcidente
			$this->insert_query_in($rowLocal, $this->localAcidente);
			$localAcidenteID = $this->db->insert_id();
		
			// numCondutores
			$this->insert_query_in($rowNumeroCondutores, $this->numCondutores);
			$numCondutoresID = $this->db->insert_id();
		
			// dadosPRF
			$this->insert_query_in($rowDadosPRF, $this->dadosPRF);
			$dadosPRFID = $this->db->insert_id();
		
			// estadoEmbriagues
			$this->insert_query_in($rowEstadoEmbriagues, $this->estadoEmbriagues);
			$estadoEmbriaguesID = $this->db->insert_id();
		
			// categoriaCNH
			$this->insert_query_in($rowCategoriaCNH, $this->categoriaCNH);
			$categoriaCNHID = $this->db->insert_id();
		
			// horasDirigindo
			$this->insert_query_in($rowHorasDirigindo, $this->horasDirigindo);
			$horasDirigindoID = $this->db->insert_id();
		
			// dadosAdicionais
			$this->insert_query_in($rowDadosAdicionais, $this->dadosAdicionais);
			$dadosAdicionaisID = $this->db->insert_id();
		
			// superficiePista
			$this->insert_query_in($rowSuperficiePista, $this->superficiePista);
			$superficiePistaID = $this->db->insert_id();
		
			// monta o array de relacionamentos
		
			$data = array( 	'id_acidentes' 			=>$acidenteID,
					'id_local_acidente' 	=>$localAcidenteID,
					'id_superficie_pista' 	=>$superficiePistaID,
					'id_condicao_mortos'  	=>$condMortosID,
					'id_tipo_veiculos'  	=>$tipoVeiculosID,
					'id_estado_pneus'  		=>$estadoPneusID,
					'id_tipo_carga'  		=>null,
					'id_categoria_cnh'  	=>$categoriaCNHID,
					'id_estado_embriagues'  =>$estadoEmbriaguesID,
					'id_tempo_habilitacao' 	=>$tempHabilitacaoID,
					'id_horas_dirigindo'  	=>$horasDirigindoID,
					'id_uso_cinto_capacete' =>$usoCintoCapaceteID,
					'id_numero_condutores'  =>$numCondutoresID,
					'id_dados_prf'  		=>$dadosPRFID,
					'id_dados_adicionais' 	=>$dadosAdicionaisID
			);
		
			$this->insert_query_in($data, $this->acidentesRela);
		
		
			$this->db->trans_complete();
		
		}
		
		
		function insert_from_file2006(	$rowAcidente, $rowLocal, $rowCondMortos, $rowTipoVeiculo, $rowEstadoPneus,
				$rowCategoriaCNH,  $rowEstadoEmbriagues, $rowTempoHabilitacao, $rowHorasDirigindo,
				$rowNumeroCondutores, $rowDadosPRF, $rowDadosAdicionais,  $rowUsoCintoCapacete, $rowSuperficiePista ){
				
			$this->db->trans_start();
			// acidentes
			$this->insert_query_in($rowAcidente, $this->table);
			$acidenteID = $this->db->insert_id();
		
			// condicao_mortos
			$this->insert_query_in($rowCondMortos, $this->condMortos);
			$condMortosID = $this->db->insert_id();
		
			// tipo_veiculos
			$this->insert_query_in($rowTipoVeiculo, $this->tipoVeiculos);
			$tipoVeiculosID = $this->db->insert_id();
		
			// estado_pneus
			$this->insert_query_in($rowEstadoPneus, $this->estadoPneus);
			$estadoPneusID = $this->db->insert_id();
		
			// tempHabilitacao
			$this->insert_query_in($rowTempoHabilitacao, $this->tempHabilitacao);
			$tempHabilitacaoID = $this->db->insert_id();
		
			//usoCintoCapacete
			$this->insert_query_in($rowUsoCintoCapacete, $this->usoCintoCapacete);
			$usoCintoCapaceteID = $this->db->insert_id();
		
			// localAcidente
			$this->insert_query_in($rowLocal, $this->localAcidente);
			$localAcidenteID = $this->db->insert_id();
		
			// numCondutores
			$this->insert_query_in($rowNumeroCondutores, $this->numCondutores);
			$numCondutoresID = $this->db->insert_id();
		
			// dadosPRF
			$this->insert_query_in($rowDadosPRF, $this->dadosPRF);
			$dadosPRFID = $this->db->insert_id();
		
			// estadoEmbriagues
			$this->insert_query_in($rowEstadoEmbriagues, $this->estadoEmbriagues);
			$estadoEmbriaguesID = $this->db->insert_id();
		
			// categoriaCNH
			$this->insert_query_in($rowCategoriaCNH, $this->categoriaCNH);
			$categoriaCNHID = $this->db->insert_id();
		
			// horasDirigindo
			$this->insert_query_in($rowHorasDirigindo, $this->horasDirigindo);
			$horasDirigindoID = $this->db->insert_id();
		
			// dadosAdicionais
			$this->insert_query_in($rowDadosAdicionais, $this->dadosAdicionais);
			$dadosAdicionaisID = $this->db->insert_id();
		
			// superficiePista
			$this->insert_query_in($rowSuperficiePista, $this->superficiePista);
			$superficiePistaID = $this->db->insert_id();
		
			// monta o array de relacionamentos
				
			$data = array( 	'id_acidentes' 			=>$acidenteID,
							'id_local_acidente' 	=>$localAcidenteID,
							'id_superficie_pista' 	=>$superficiePistaID,
							'id_condicao_mortos'  	=>$condMortosID,
							'id_tipo_veiculos'  	=>$tipoVeiculosID,
							'id_estado_pneus'  		=>$estadoPneusID,
							'id_tipo_carga'  		=>null,
							'id_categoria_cnh'  	=>$categoriaCNHID,
							'id_estado_embriagues'  =>$estadoEmbriaguesID,
							'id_tempo_habilitacao' 	=>$tempHabilitacaoID,
							'id_horas_dirigindo'  	=>$horasDirigindoID,
							'id_uso_cinto_capacete' =>$usoCintoCapaceteID,
							'id_numero_condutores'  =>$numCondutoresID,
							'id_dados_prf'  		=>$dadosPRFID,
							'id_dados_adicionais' 	=>$dadosAdicionaisID
			);
		
			$this->insert_query_in($data, $this->acidentesRela);
		
		
			$this->db->trans_complete();
				
		}
		  			
}








