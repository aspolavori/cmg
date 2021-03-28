<?php
class Mensagem extends CI_Model{

	/**
	* Classe para montagem de mensagens para o sistema.
	* Deve ser usado somente quando nao esta sendo utilizado flashdata do framework CI
	**/
	function __construct(){
		parent::__construct();
	}

	function retornaFalhaLogin(){
		return '<font color="#FF0000">Usuário ou senha inexistente.</font>';
	}

	function falhaLogin(){
		echo '<font color="#FF0000">Usuário ou senha inexistente.</font>';
	}
}
