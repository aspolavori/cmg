<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Sistema de Consultas DNIT</title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/admin/global.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/css/admin/relatorio.css" rel="stylesheet" type="text/css">
  	<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/admin.min.js"></script>
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <!--  <a class="brand">Sistema de Consultas DNIT</a>  -->
	      <ul class="nav">
	      <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/relatorios_cmg">Relatórios Principais</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/relatorios_cmg/catalogos">Catálogos/Soluções Téc.</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/hdm_veiculos/relatorios/">Relatório HDM Veículos</a>
	            </li>
	          </ul>
	        </li>
	       <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Células<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/sicros">Lista de Células</a>
	            </li>
	            <?php 
	            /*
	            <li>
	              <a href="<?php echo base_url(); ?>admin/sicro_equipamento_custo">Sicro Equipamentos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/sicro_material_custo">Sicro Maretiais</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/sicro_material_betuminoso_custo">Sicro Betuminosos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/sicro_mao_obra_custo">Sicro Mão de Obra</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/sicro_transporte">Sicro Transporte</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/sicro_fator_pavimentacao">Sicro Fator Pavimentação</a>
	            </li>
	            */
	            ?>
	            
	          </ul>
	        </li>
	       <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soluções<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/solucoes">Soluções</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/categorias">Modalidades de Intervenção</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/tipo_solucao">Tipos de Soluções</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/categoria_tipo">Relação Mod. Inter. Tipos</a>
	            </li>
	            <?php
	            /* 
	            <li>
	              <a href="<?php echo base_url(); ?>admin/solucao_composicao">Soluções Composições</a>
	            </li>
	            */
	            ?>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Composições<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/composicoes">Lista Composições</a>
	            </li>
	            <!-- 
	            <li>
	              <a>*****</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_equipamento">Composição Equipamentos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_material">Composição Maretiais</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_material_betuminoso">Composição Betuminosos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_mao_obra">Composição Mão de Obra</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_transporte">Composição Transportes</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_variaveis">Composição Variáveis</a>
	            </li>
	            --!>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">DMTs<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/transportes">Lista de DMTs</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_transporte_transporte">Relação Transporte DMT</a>
	            </li>
	            <!-- 
	             <li>
	              <a href="<?php echo base_url(); ?>admin/material_transporte">Relação Material Transporte</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/material_betuminoso_transporte">Relação Betuminoso Transporte</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/transporte_material_classe">Transporte Material Classe</a>
	            </li>
	            -->	            
	          </ul>
	        </li>
	         <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">HDM Veículos<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/hdm_veiculos">Dados de Entrada</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/veiculos">Veículos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/fator_conversao_padrao">Fator de Conversão Econ. Padrão</a>
	            </li>
	            <?php 
	            /*
	             <li>
	              <a href="<?php echo base_url(); ?>admin/hdm_veiculos_vmo_vpol_vv">Relação Veículos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/vmo">VMO</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/vpol">VPOL</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/vv">VV</a>
	            </li>
	            */ 
	            ?>
	          </ul>
	        </li>
	      	<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configurações Gerais e de Entrada<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/equipamentos">Lista de Equipamentos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/mao_obra">Lista Mão de Obra</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/materiais">Lista Materiais</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/materiais_betuminosos">Lista Materiais Betuminosos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/composicao_transporte">Lista de Transportes</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/fator_pavimentacao_padrao">Entr. Padrão Categoria/Fator-Pav.</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/variaveis">Lista de Variáveis</a>
	            </li>
	          </ul>
	        </li>
	        <?php
	        /* 
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configurações de Gerais<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/caracteristica_volumetrica">Características Volumétricas</a>
	            </li>	            
	          </ul>
	        </li>
	        */
	        ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System <b class="caret"></b></a>
	          <ul class="dropdown-menu">
	           <li>
	              <a href="<?php echo base_url(); ?>admin/usuarios">Usuários</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logout">Logout</a>
	            </li>
	          </ul>
	        </li>
	        <!-- 
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mapear<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	          	<li>
	              <a href="<?php echo base_url(); ?>admin/inclinacao_pista">Inclinação de Pista</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listagens<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/ciclos">Ciclos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/trechos">Trechos</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/grupos">Grupos</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logs<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/logs">Full Log</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/inclinacao_logs">Inclinação Log</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/gps_logs">GPS Log</a>
	            </li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ocorrencias<b class="caret"></b></a>
	          <ul class="dropdown-menu">
	            <li>
	              <a href="<?php echo base_url(); ?>admin/detalhe_ocorrencias">Detalhes Ocorrencias</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/ocorrencia_logs">Ocorrencias Log</a>
	            </li>
	            <li>
	              <a href="<?php echo base_url(); ?>admin/tipo_ocorrencias">Tipo Ocorrencia</a>
	            </li>
	          </ul>
	        </li>
	         -->	         
	      </ul>
	    </div>
	  </div>
	</div>	
