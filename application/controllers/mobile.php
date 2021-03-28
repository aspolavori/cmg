<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller {

	function __constructor(){

		parent::Controller();
		
	}

	public function index()
	{
	
		switch($this->input->get_post('opcao')){

			default:
					$this->load->view('/mobile/v_principal');
					break;
		
		}
	}

	/**
	* Carrega informacoes de uma boia em especifico (tabela com os parametros)
	*/
	public function boias($boia)
	{
		$dadosPagina['boia'] = strtoupper($boia);		
		
		$this->load->model('fundeio');
		$boiaInfo = new Fundeio();
		$boiaId = $boiaInfo->getBoiaByTitulo(strtoupper($boia));
		if($boiaId == false) $boiaId = 0;
		
		$this->load->model('medicao');
		$medicao = new Medicao();
		$dataUltimaColeta = $medicao->getUltimaColeta($boiaId);
		$dadosPagina['datas'] = $dataUltimaColeta;
		
		$this->load->model('parametros');
		$parametros = new Parametros();
		$dadosPagina['dadosParametros'] = $parametros->getMedicaoGeralParametroBoia($dataUltimaColeta,'boia'.$boia);

		$this->load->view('/mobile/v_checkBoias',$dadosPagina);
	}
	
	
	/**
	 * Na versao atual somente autoriza administradores a acessarem o painel administrativo
	 */
	public function login()
	{	    	    
	    $login = $this->input->post('login');
	    $senha = $this->input->post('pass');
	    $this->load->model('usuario');
	    $usuario = new Usuario();
	    $validaAcesso = $usuario->confirmarCredenciais($login,$senha);
	    $dadosPagina = array();
	    
	    if($validaAcesso){
	        $nivel = 999;
	        if($nivel < 999) $this->load->view('/mobile/usuario/v_erroAcesso');
	        if($nivel >= 999){
	            $dados = $usuario->criarSessao($login);
	            $this->session->set_userdata($usuario->criarSessao($login));
	            $this->load->view('/mobile/usuario/v_menuAcesso');
	        }
	    }
	    
	    if(!$validaAcesso) $this->load->view('/mobile/usuario/v_erroAcesso');	        
	    
	}
	
	
	public function logout()
	{
	    $this->session->sess_destroy();
	    $this->load->view('/mobile/v_principal');
	    
	}
	
	
	/**
	 * Menu raiz de opcoes para os administradores
	 * @param string $menu
	 */
	public function opcoesAdmin($menu)
	{	    
	    if($menu == 'menuInicial') $this->load->view('/mobile/usuario/v_menuAcesso');	    
	    if($menu == 'boias') $this->load->view('/mobile/menus/v_boias');
	    if($menu == 'sensores') $this->load->view('/mobile/menus/v_sensores');
	    
	}
	
	
	public function configurandoBoia()
	{
	    if(!$this->session->userdata('logged_in')) $this->load->view('/mobile/v_principal');	        	    
	     
	    if($this->session->userdata('logged_in')){
	         
	        $this->load->model('fundeio');
	        $fundeio = new Fundeio();
	        $dadosPagina['boias'] = $fundeio->getAllBoias();
	        $this->load->view('mobile/administracao/equipamento/v_config-fundeio',$dadosPagina);
	    }
	    
	}
	
	
	public function formConfigurarBoia()
	{
	    if(!$this->session->userdata('logged_in')) $this->load->view('/mobile/v_principal');
	    
	    if($this->session->userdata('logged_in')){
	        	        
	        $this->load->model('fundeio');
	        $fundeio = new Fundeio();
	        $dadosPagina['boia'] = $fundeio->getBoiaById($this->input->post('boia'));
	        $dadosPagina['configuracao'] = $fundeio->getConfiguracaoBoia($this->input->post('boia'));
	        $dadosPagina['status'] = $fundeio->getStatusBoia();
	        $this->load->view('mobile/administracao/equipamento/v_editConfigBoia',$dadosPagina);
	    }
	    
	}
	
	
	public function configurarBoia()
	{
	    if(!$this->session->userdata('logged_in')) $this->load->view('/mobile/v_principal');
	     
	    if($this->session->userdata('logged_in')){
	        
	        $boiaId = $this->input->post('boiaId');
	        $dados = array(
	            "download"     => $this->input->post('download'),
	            "processar"    => $this->input->post('processar'),
	            "id_status"    => $this->input->post('status')
	        );
	        $this->load->model('fundeio');
	        $fundeio = new Fundeio();
	        $atualizado = $fundeio->atualizarDados($boiaId, $dados, 'id_fundeio', 'configuracao_fundeio');
	        $dadosPagina = array();
	        if($atualizado) $dadosPagina['mensagem'] = '<h3 style="color: darkgreen;">Configurações gravadas com sucesso</h3>';
	        if(!$atualizado) $dadosPagina['mensagem'] = '<h3 style="color: red;">Problemas na conexão, tente mais tarde ou contate o administrador do banco de dados</h3>';	        
	        //$this->salvarLog('configurou boia '.$boiaId,'configuracao_fundeio'); //deixando sem log para acelerar resposta a dispositivos moveis no 3G
	        $this->load->view('mobile/administracao/v_formResultado',$dadosPagina);
	    }
	    
	}
	
	public function desativandoSensores()
	{
	    if(!$this->session->userdata('logged_in')) $this->load->view('/mobile/v_principal');
	    
	    if($this->session->userdata('logged_in')){
	        
	        $this->load->model('fundeio');
	        $fundeio = new Fundeio();
	        $dadosPagina['boias'] = $fundeio->getAllBoias();
	        $this->load->view('mobile/administracao/equipamento/parametros/v_config-fundeio-sensor',$dadosPagina);
	    }
	}
	
	public function formDesativarSensor()
	{
	    if(!$this->session->userdata('logged_in')) $this->load->view('/mobile/v_principal');
	     
	    if($this->session->userdata('logged_in')){
	        
	        $boia = $this->input->post('boia');
	        $this->load->model('parametros');
	        $parametro = new Parametros();
	        $dadosPagina = array();
	        $dadosPagina['meteorologicos'] = $parametro->getIdParametros(2);
	        $dadosPagina['oceanograficos'] = $parametro->getIdParametros(1);
	        $dadosPagina['desativados'] = $parametro->getParametrosDesativadosBoia($boia);
	        $dadosPagina['boia'] = $boia;
	        $this->load->view('mobile/administracao/equipamento/parametros/v_parametrosDesativar',$dadosPagina);
	    }
	    
	}
	
	public function desativarParametros()
	{
	    if(!$this->session->userdata('logged_in')) $this->load->view('/mobile/v_principal');
	    
	    if($this->session->userdata('logged_in')){
	        
	        $boia = $this->input->post('id_boia');
	        $parametros = array();
	        if($this->input->post('parametros') != null) $parametros = $this->input->post('parametros');
	        $this->load->model('parametros');
	        $sensores = new Parametros();
	        $retorno = $sensores->desativarParametrosBoia($boia, $parametros);
	        $dadosPagina = array();	         	        	         
	        if($retorno) $dadosPagina['mensagem'] = '<h3 style="color: darkgreen;">Definições atualizadas</h3>';
	        if(!$retorno) $dadosPagina['mensagem'] = '<h3 style="color: red;">Ocorreu um problema na alteração, entre em contato imediatamente com o desenvolvedor</h3>';
	        $this->load->view('mobile/administracao/v_formResultado',$dadosPagina);
	    }
	    
	}
}