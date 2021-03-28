<?php
require_once(APPPATH . 'models/App_DAO' . EXT);
class obrasdao extends App_DAO {
	
	const VIEW_FOLDER = 'admin/obras';
    	/**
	    * Responsable for auto load the database and the tables
	    * @return void
	    */
		
		public $tipo = null;
		public $classe = null;
		public $acidentes = null;
		public $obra_tipo = null;
		
	    public function __construct()
	    {
	        $this->load->database();
	        $this->table = 'obras';
	        $this->acidentes = 'acidentes';
	        $this->tipo = 'tipo_obras';
	        $this->classe = 'classe_obras';
	        $this->obra_tipo = 'obra_tipo';
	    }
    	
    	/**
	    * Get obra by his is
	    * @param int $id 
	    * @return array
	    */
	    public function get_obra_by_id($id)
	    {
	    	$this->db->select($this->table.'.* ,  '.$this->classe.'.descricao as classe ' );
	    	$this->db->from($this->table);
	    	$this->db->join($this->classe, $this->table.'.id_classe_obras = '. $this->classe.'.id ' );
	    	//$this->db->join($this->tipo, $this->table.'.id_tipo_obras = '. $this->tipo.'.id ' );
	    	$this->db->where( $this->table.'.id = '.$id );
	    	$query = $this->db->get();
	    		
	    	return $query->result_array();	    			 
	    } 
    	
	    /**
	     * Get obra by his is
	     * @param int $id
	     * @return array
	     */
	    public function get_obras_by_ids($idList)
	    {
	    	
	    	$this->db->select($this->table.'.*, '.$this->classe.'.descricao as classe ' );
	    	$this->db->from($this->table);
	    	$this->db->join($this->classe, $this->table.'.id_classe_obras = '. $this->classe.'.id ' );
	    	//$this->db->join($this->tipo, $this->table.'.id_tipo_obras = '. $this->tipo.'.id ' );
	    	$first = true;
	    	foreach($idList as $id ){
	    		$this->db->or_where($this->table.'.id = '.$id);
	    	}
	    	$query = $this->db->get();
	    	 
	    	return $query->result_array();
	    }
	    
	    
	    public function get_tipos_by_obra_id($id)
	    {
	    	 
	    	$tipos = $this->exec_query('
	    		select '.$this->tipo.'.id as id, '.$this->tipo.'.descricao as descricao from '.$this->table.'
	    			inner join '.$this->obra_tipo.' on ('.$this->table.'.id = '.$this->obra_tipo.'.id_obra)
	    			inner join '.$this->tipo.' 	 on ('.$this->obra_tipo.'.id_tipo = '.$this->tipo.'.id)
	    		where '.$this->table.'.id = '.$id.' ;'
	    	);
	    	 
	    	return $tipos;
	    }
	    	    
	    public function get_obras_by_tipo($tiposList)
	    {
	    	$qntElem = count($tiposList) - 1;
	    	$sel = 'select  t1.* , count(*) as qnt_registros, '.$this->classe .'.descricao as classe   from ( 
						select '.$this->table.'.* , count(*) as qnt from '.$this->table.' 
							inner join '.$this->obra_tipo.' on ( '.$this->table.'.id = '.$this->obra_tipo.'.id_obra )
							inner join '.$this->tipo.'  on ( '.$this->tipo.'.id = '.$this->obra_tipo.'.id_tipo ) ';
	    	$first = true;
	    	foreach($tiposList as $item){
	    		if($first){
	    			$first = false;
	    			$where = ' where '.$this->obra_tipo.'.id_tipo = '.$item;
	    		}else{
	    			$where .= ' or obra_tipo.id_tipo = '.$item;
	    		}
	    	}
			$group = '	group by obras.id
						)	as t1 
						inner join '.$this->classe .' on  ('.$this->classe .'.id = t1.id_classe_obras )
						where qnt > '.$qntElem.' and status = "existente"
						group by t1.id';
			
			$query = $sel.$where.$group;
			
			
			return $this->exec_query($query);
	    	
	    }
	    
	    public function get_obras_by_tipo_vmd($tiposList, $vmd1 = null, $vmd2 = null)
	    {
	    	$qntElem = count($tiposList) - 1;
	    	$sel = 'select  t1.* , count(*) as qnt_registros, '.$this->classe .'.descricao as classe   from (
						select '.$this->table.'.* , count(*) as qnt from '.$this->table.'
							inner join '.$this->obra_tipo.' on ( '.$this->table.'.id = '.$this->obra_tipo.'.id_obra )
							inner join '.$this->tipo.'  on ( '.$this->tipo.'.id = '.$this->obra_tipo.'.id_tipo ) ';
	    	$first = true;
	    	foreach($tiposList as $item){
	    		if($first){
	    			$first = false;
	    			$where = ' where '.$this->obra_tipo.'.id_tipo = '.$item;
	    		}else{
	    			$where .= ' or obra_tipo.id_tipo = '.$item;
	    		}
	    	}
	    	if($vmd1){
	    		$conVmd1 = ' and vdm_s >= '.$vmd1.' ';
	    	}else{
	    		$conVmd1 = ' ';
	    	}
	    	if($vmd2){
	    		$conVmd2 = ' and vdm_s <= '.$vmd2.' ';
	    	}else{
	    		$conVmd2 = ' ';
	    	}
	    	$group = '	group by obras.id
						)	as t1
						inner join '.$this->classe .' on  ('.$this->classe .'.id = t1.id_classe_obras )
						where qnt > '.$qntElem.' and status = "existente" '.$conVmd1.$conVmd2.'
						group by t1.id';
	    		
	    	$query = $sel.$where.$group;
	    		
	    		
	    	return $this->exec_query($query);
	    
	    }
	    
	    
	    /**
	    * Fetch obras data from the database
	    * possibility to mix search, filter and order
	    * @param string $search_string 
	    * @param strong $order
	    * @param string $order_type 
	    * @param int $limit_start
	    * @param int $limit_end
	    * @return array
	    */
	    public function get_obras($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
		    
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('status',  'existente');
	
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
    	
	    public function get_obras_futuras($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
	    {
	    
	    	$this->db->select('*');
	    	$this->db->from($this->table);
	    	$this->db->where('status',  'futura');
	    
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
	    function count_obras($search_string=null, $order=null)
	    {
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('status',  'existente');
			
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
    	
	    function count_obras_futuras($search_string=null, $order=null)
	    {
	    	$this->db->select('*');
	    	$this->db->from($this->table);
	    	$this->db->where('status',  'futura');
	    		
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
	    function store_obra($data)
	    {
	    	$tipoList = $data['tipos'];
	    	unset($data['tipos']);
	    	$this->db->trans_start();
	    		$insert = $this->db->insert($this->table, $data);
	    		$obraInsert_id = $this->db->insert_id();
	    		foreach($tipoList as $tipoId)	:
	    			if($tipoId){
		    			$temp = array('id_obra' => $obraInsert_id, 'id_tipo' => $tipoId );
		    			$insert2 = $this->db->insert($this->obra_tipo, $temp);
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
	    * Update obra
	    * @param array $data - associative array with data to store
	    * @return boolean
	    */
	    function update_obra($id, $data)
	    {
			
	    	$tipos = $data['tipos'];
	    	unset($data['tipos']);
	    	$this->db->trans_start();
		    	$this->update_query($id, $data);		    	
		    	$delete = $this->exec_delete_query('delete from '.$this->obra_tipo.' where id_obra = '.$id.' ;');
		    	foreach ($tipos as $tipo)	:
		    		$obra_tipo = array('id_obra' => $id, 'id_tipo' => $tipo );
		    		$insert = $this->db->insert($this->obra_tipo , $obra_tipo);
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
	    * Delete obra
	    * @param int $id - obra id
	    * @return boolean
	    */
		function delete_obra($id){
			$this->delete_query($id); 
		}

		
		
		
}















