<?php
require_once(APPPATH . 'models/App_DAO' . EXT);

class acidentesdao extends App_DAO {

	const VIEW_FOLDER = 'admin/acidentes';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
	public $descAcidentes = null;
	
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'acidentes_new';
	        $this->descAcidentes = 'descricao_acidentes'; 
	    }
    	
    	/**
	    * Get acidente by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_acidente_by_id($id)
	    {
	    	return $this->select_by_id($id);		 
	    } 
    	
	    /**
	    * Fetch acidentes data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_acidentes($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
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
	    function count_acidentes($search_string=null, $order=null)
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
	    function store_acidente($data)
	    {
	    	return $this->insert_query($data);
		}
    	
    	/**
	    * Update acidente
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_acidente($id, $data)
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
	    * Delete acidente
	    * @param int $id - acidente id
	    * @return boolean
	    */
		function delete_acidente($id){
			$this->delete_query($id); 
		}

		function get_acidentes_by_trecho($arrayInfoTrecho){
			
			 $query = 'select * from '.$this->table
					.' where uf="'.$arrayInfoTrecho['uf'].'"'
					.' and rodovia="'.$arrayInfoTrecho['br'].'"'
					.' and km >= '.$arrayInfoTrecho['km_ini']
					.' and km <= '.$arrayInfoTrecho['km_fim']
					.' and ano >= '.$arrayInfoTrecho['data_ini']
					.' and ano <= '.$arrayInfoTrecho['data_fim']
					.' order by ano asc;'
			;		
			
			return $this->exec_query($query);
			
		}
		
		function get_acidentes_by_trecho_exclusivo($arrayInfoTrecho){
				
			$query = 'select * from '.$this->table
			.' where uf="'.$arrayInfoTrecho['uf'].'"'
			.' and rodovia="'.$arrayInfoTrecho['br'].'"'
			.' and km >= '.$arrayInfoTrecho['km_ini']
			.' and km <= '.$arrayInfoTrecho['km_fim']
			.' and ( ano < "'.$arrayInfoTrecho['data_ini'].'" or ano > "'.$arrayInfoTrecho['data_fim'].'" )'
			.' order by ano asc;'
			;
				
			return $this->exec_query($query);
				
		}
		
		
		function get_acidentes_by_obra($id, $arrayObra){
			
			
		 	$query = 'select * from '.$this->table
				.' where uf="'.$arrayObra[0]['uf'].'"'
				.' and rodovia="'.$arrayObra[0]['br'].'"'
				.' and km >= '.$arrayObra[0]['km_ini']
				.' and km <= '.$arrayObra[0]['km_fim']
				.' and ( data < "'.$arrayObra[0]['data_ini'].'" or data > "'.$arrayObra[0]['data_fim'].'" )'
				.' order by data asc;'
				;
			return $this->exec_query($query);
			
		}

		function get_acidentes_by_obra_tipo($id, $arrayObra){
				
				
			$query = 'select * from '.$this->table
			.' where uf="'.$arrayObra['uf'].'"'
					.' and rodovia="'.$arrayObra['br'].'"'
							.' and km >= '.$arrayObra['km_ini']
							.' and km <= '.$arrayObra['km_fim']
							.' and ( data < "'.$arrayObra['data_ini'].'" or data > "'.$arrayObra['data_fim'].'" )'
									.' order by data asc;'
											;
											return $this->exec_query($query);
												
		}
		
		
		function get_acidentes_descricao_by_obra($id, $arrayObra){
			/*
			 * select ano, descricao, classificacao, count(classificacao) as qnt_class  from acidentes_new where uf="SC" and rodovia="101" and km >= 201 and km <= 203 and ( data < "2007-06-01" or data > "2008-10-31" )
			 * group by ano, descricao, classificacao order by ano, descricao, classificacao asc 
			 */
			$query = 'select ano, descricao, classificacao, count(classificacao) as qnt_class from '.$this->table
				.' where uf="'.$arrayObra[0]['uf'].'"'
				.' and rodovia="'.$arrayObra[0]['br'].'"'
				.' and km >= '.$arrayObra[0]['km_ini']
				.' and km <= '.$arrayObra[0]['km_fim']
				.' and ( data < "'.$arrayObra[0]['data_ini'].'" or data > "'.$arrayObra[0]['data_fim'].'" )'
				.' group by ano, descricao, classificacao '
				.' order by data asc;'
				;
			return $this->exec_query($query);
			
		}

		function get_acidentes_descricao_by_obra_tipo($id, $arrayObra){
			/*
			 * select ano, descricao, classificacao, count(classificacao) as qnt_class  from acidentes_new where uf="SC" and rodovia="101" and km >= 201 and km <= 203 and ( data < "2007-06-01" or data > "2008-10-31" )
			* group by ano, descricao, classificacao order by ano, descricao, classificacao asc
			*/
			$query = 'select ano, descricao, classificacao, count(classificacao) as qnt_class from '.$this->table
			.' where uf="'.$arrayObra['uf'].'"'
					.' and rodovia="'.$arrayObra['br'].'"'
							.' and km >= '.$arrayObra['km_ini']
							.' and km <= '.$arrayObra['km_fim']
							.' and ( data < "'.$arrayObra['data_ini'].'" or data > "'.$arrayObra['data_fim'].'" )'
									.' group by ano, descricao, classificacao '
											.' order by data asc;'
													;
													return $this->exec_query($query);
														
		}
		
		function get_acidentes_descricao_by_trecho($arrayObra){
			/*
			 * select ano, descricao, classificacao, count(classificacao) as qnt_class  from acidentes_new where uf="SC" and rodovia="101" and km >= 201 and km <= 203 and ( data < "2007-06-01" or data > "2008-10-31" )
			* group by ano, descricao, classificacao order by ano, descricao, classificacao asc
			*/
			$query = 'select ano, descricao, classificacao, count(classificacao) as qnt_class from '.$this->table
			.' where uf="'.$arrayObra['uf'].'"'
					.' and rodovia="'.$arrayObra['br'].'"'
							.' and km >= '.$arrayObra['km_ini']
							.' and km <= '.$arrayObra['km_fim']
							.' and ( data >= "'.$arrayObra['data_ini'].'" or data <= "'.$arrayObra['data_fim'].'" )'
									.' group by ano, descricao, classificacao '
											.' order by data asc;'
													;
													return $this->exec_query($query);
														
		}
		
		function get_acidentes_descricao_by_trecho_exclusivo($arrayObra){
			/*
			 * select ano, descricao, classificacao, count(classificacao) as qnt_class  from acidentes_new where uf="SC" and rodovia="101" and km >= 201 and km <= 203 and ( data < "2007-06-01" or data > "2008-10-31" )
			* group by ano, descricao, classificacao order by ano, descricao, classificacao asc
			*/
			$query = 'select ano, descricao, classificacao, count(classificacao) as qnt_class from '.$this->table
			.' where uf="'.$arrayObra['uf'].'"'
					.' and rodovia="'.$arrayObra['br'].'"'
							.' and km >= '.$arrayObra['km_ini']
							.' and km <= '.$arrayObra['km_fim']
							.' and ( data < "'.$arrayObra['data_ini'].'" or data > "'.$arrayObra['data_fim'].'" )'
									.' group by ano, descricao, classificacao '
											.' order by data asc;'
													;
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
		
		// um select distinct em uma tabela de muitos registros é algo dispendioso, criar uma tabela auxiliar que preenche os dados via trigger seria uma boa solução
		function get_descricao_acidentes(){
			$query = 'SELECT distinct(descricao)  FROM '.$this->descAcidentes.' order by descricao asc ;' ;
			return $this->exec_query($query);
		}
		
		
}