<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "inicial";
$route['404_override'] = 'erro404';
$route['mobile'] = "mobile";
$route['movel'] = "mobile";

/*admin*/
$route['admin'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';

//PRODUTO 2

$route['admin/equipamentos'] = 'equipamentos/index';
$route['admin/equipamentos/add'] = 'equipamentos/add';
$route['admin/equipamentos/update'] = 'equipamentos/update';
$route['admin/equipamentos/update/(:any)'] = 'equipamentos/update/$1';
$route['admin/equipamentos/delete/(:any)'] = 'equipamentos/delete/$1';
$route['admin/equipamentos/(:any)'] = 'equipamentos/index/$1'; //$1 = page number

$route['admin/materiais'] = 'materiais/index';
$route['admin/materiais/add'] = 'materiais/add';
$route['admin/materiais/update'] = 'materiais/update';
$route['admin/materiais/update/(:any)'] = 'materiais/update/$1';
$route['admin/materiais/delete/(:any)'] = 'materiais/delete/$1';
$route['admin/materiais/(:any)'] = 'materiais/index/$1'; //$1 = page number

$route['admin/mao_obra'] = 'mao_obra/index';
$route['admin/mao_obra/add'] = 'mao_obra/add';
$route['admin/mao_obra/update'] = 'mao_obra/update';
$route['admin/mao_obra/update/(:any)'] = 'mao_obra/update/$1';
$route['admin/mao_obra/delete/(:any)'] = 'mao_obra/delete/$1';
$route['admin/mao_obra/(:any)'] = 'mao_obra/index/$1'; //$1 = page number

$route['admin/materiais_betuminosos'] = 'materiais_betuminosos/index';
$route['admin/materiais_betuminosos/add'] = 'materiais_betuminosos/add';
$route['admin/materiais_betuminosos/update'] = 'materiais_betuminosos/update';
$route['admin/materiais_betuminosos/update/(:any)'] = 'materiais_betuminosos/update/$1';
$route['admin/materiais_betuminosos/delete/(:any)'] = 'materiais_betuminosos/delete/$1';
$route['admin/materiais_betuminosos/(:any)'] = 'materiais_betuminosos/index/$1'; //$1 = page number

$route['admin/sicro_equipamento_custo'] = 'sicro_equipamento_custo/index';
$route['admin/sicro_equipamento_custo/add'] = 'sicro_equipamento_custo/add';
$route['admin/sicro_equipamento_custo/add/(:any)'] = 'sicro_equipamento_custo/add/$1';
$route['admin/sicro_equipamento_custo/add/(:any)/(:any)'] = 'sicro_equipamento_custo/add/$1/$2';
$route['admin/sicro_equipamento_custo/update'] = 'sicro_equipamento_custo/update';
$route['admin/sicro_equipamento_custo/update/(:any)'] = 'sicro_equipamento_custo/update/$1';
$route['admin/sicro_equipamento_custo/delete/(:any)'] = 'sicro_equipamento_custo/delete/$1';
// 
$route['admin/sicro_equipamento_custo/lista_equipamento/(:any)'] = 'sicro_equipamento_custo/lista_equipamento/$1';
$route['admin/sicro_equipamento_custo/(:any)'] = 'sicro_equipamento_custo/index/$1'; //$1 = page number

$route['admin/sicro_mao_obra_custo'] = 'sicro_mao_obra_custo/index';
$route['admin/sicro_mao_obra_custo/add'] = 'sicro_mao_obra_custo/add';
$route['admin/sicro_mao_obra_custo/add/(:any)'] = 'sicro_mao_obra_custo/add/$1';
$route['admin/sicro_mao_obra_custo/add/(:any)/(:any)'] = 'sicro_mao_obra_custo/add/$1/$2';
$route['admin/sicro_mao_obra_custo/update'] = 'sicro_mao_obra_custo/update';
$route['admin/sicro_mao_obra_custo/update/(:any)'] = 'sicro_mao_obra_custo/update/$1';
$route['admin/sicro_mao_obra_custo/delete/(:any)'] = 'sicro_mao_obra_custo/delete/$1';
//
$route['admin/sicro_mao_obra_custo/lista_mao_obra/(:any)'] = 'sicro_mao_obra_custo/lista_mao_obra/$1';
$route['admin/sicro_mao_obra_custo/(:any)'] = 'sicro_mao_obra_custo/index/$1'; //$1 = page number

$route['admin/sicro_material_custo'] = 'sicro_material_custo/index';
$route['admin/sicro_material_custo/add'] = 'sicro_material_custo/add';
$route['admin/sicro_material_custo/add/(:any)'] = 'sicro_material_custo/add/$1';
$route['admin/sicro_material_custo/add/(:any)/(:any)'] = 'sicro_material_custo/add/$1/$2';
$route['admin/sicro_material_custo/update'] = 'sicro_material_custo/update';
$route['admin/sicro_material_custo/update/(:any)'] = 'sicro_material_custo/update/$1';
$route['admin/sicro_material_custo/delete/(:any)'] = 'sicro_material_custo/delete/$1';
//
$route['admin/sicro_material_custo/lista_material/(:any)'] = 'sicro_material_custo/lista_material/$1';
$route['admin/sicro_material_custo/(:any)'] = 'sicro_material_custo/index/$1'; //$1 = page number


$route['admin/sicro_material_betuminoso_custo'] = 'sicro_material_betuminoso_custo/index';
$route['admin/sicro_material_betuminoso_custo/add'] = 'sicro_material_betuminoso_custo/add';
$route['admin/sicro_material_betuminoso_custo/add/(:any)'] = 'sicro_material_betuminoso_custo/add/$1';
$route['admin/sicro_material_betuminoso_custo/add/(:any)/(:any)'] = 'sicro_material_betuminoso_custo/add/$1/$2';
$route['admin/sicro_material_betuminoso_custo/update'] = 'sicro_material_betuminoso_custo/update';
$route['admin/sicro_material_betuminoso_custo/update/(:any)'] = 'sicro_material_betuminoso_custo/update/$1';
$route['admin/sicro_material_betuminoso_custo/delete/(:any)'] = 'sicro_material_betuminoso_custo/delete/$1';
//
$route['admin/sicro_material_betuminoso_custo/lista_material_betuminoso/(:any)'] = 'sicro_material_betuminoso_custo/lista_material_betuminoso/$1';
$route['admin/sicro_material_betuminoso_custo/(:any)'] = 'sicro_material_betuminoso_custo/index/$1'; //$1 = page number


$route['admin/composicao_material'] = 'composicao_material/index';
$route['admin/composicao_material/add'] = 'composicao_material/add';
$route['admin/composicao_material/add/(:any)'] = 'composicao_material/add/$1';
$route['admin/composicao_material/update'] = 'composicao_material/update';
$route['admin/composicao_material/update/(:any)'] = 'composicao_material/update/$1';
$route['admin/composicao_material/delete/(:any)'] = 'composicao_material/delete/$1';
//
$route['admin/composicao_material/lista_material/(:any)'] = 'composicao_material/lista_material/$1';
$route['admin/composicao_material/(:any)'] = 'composicao_material/index/$1'; //$1 = page number

$route['admin/composicao_material_betuminoso'] = 'composicao_material_betuminoso/index';
$route['admin/composicao_material_betuminoso/add'] = 'composicao_material_betuminoso/add';
$route['admin/composicao_material_betuminoso/add/(:any)'] = 'composicao_material_betuminoso/add/$1';
$route['admin/composicao_material_betuminoso/update'] = 'composicao_material_betuminoso/update';
$route['admin/composicao_material_betuminoso/update/(:any)'] = 'composicao_material_betuminoso/update/$1';
$route['admin/composicao_material_betuminoso/delete/(:any)'] = 'composicao_material_betuminoso/delete/$1';

$route['admin/composicao_material_betuminoso/lista_material_betuminoso/(:any)'] = 'composicao_material_betuminoso/lista_material_betuminoso/$1';
$route['admin/composicao_material_betuminoso/(:any)'] = 'composicao_material_betuminoso/index/$1'; //$1 = page number

$route['admin/composicao_mao_obra'] = 'composicao_mao_obra/index';
$route['admin/composicao_mao_obra/add'] = 'composicao_mao_obra/add';
$route['admin/composicao_mao_obra/add/(:any)'] = 'composicao_mao_obra/add/$1';
$route['admin/composicao_mao_obra/update'] = 'composicao_mao_obra/update';
$route['admin/composicao_mao_obra/update/(:any)'] = 'composicao_mao_obra/update/$1';
$route['admin/composicao_mao_obra/delete/(:any)'] = 'composicao_mao_obra/delete/$1';
//
$route['admin/composicao_mao_obra/lista_mao_obra/(:any)'] = 'composicao_mao_obra/lista_mao_obra/$1';
$route['admin/composicao_mao_obra/(:any)'] = 'composicao_mao_obra/index/$1'; //$1 = page number

$route['admin/composicao_equipamento'] = 'composicao_equipamento/index';
$route['admin/composicao_equipamento/add'] = 'composicao_equipamento/add';
$route['admin/composicao_equipamento/add/(:any)'] = 'composicao_equipamento/add/$1';
$route['admin/composicao_equipamento/update'] = 'composicao_equipamento/update';
$route['admin/composicao_equipamento/update/(:any)'] = 'composicao_equipamento/update/$1';
$route['admin/composicao_equipamento/delete/(:any)'] = 'composicao_equipamento/delete/$1';
//			  
$route['admin/composicao_equipamento/lista_equipamento/(:any)'] = 'composicao_equipamento/lista_equipamento/$1';
$route['admin/composicao_equipamento/(:any)'] = 'composicao_equipamento/index/$1'; //$1 = page number

$route['admin/composicao_composicao'] = 'composicao_composicao/index';
$route['admin/composicao_composicao/add'] = 'composicao_composicao/add';
$route['admin/composicao_composicao/add/(:any)'] = 'composicao_composicao/add/$1';
$route['admin/composicao_composicao/update'] = 'composicao_composicao/update';
$route['admin/composicao_composicao/update/(:any)'] = 'composicao_composicao/update/$1';
$route['admin/composicao_composicao/delete/(:any)'] = 'composicao_composicao/delete/$1';
//
$route['admin/composicao_composicao/lista_composicao/(:any)'] = 'composicao_composicao/lista_composicao/$1';
$route['admin/composicao_composicao/(:any)'] = 'composicao_composicao/index/$1'; //$1 = page number
    
$route['admin/composicao_composicao_transporte'] = 'composicao_composicao_transporte/index';
$route['admin/composicao_composicao_transporte/add'] = 'composicao_composicao_transporte/add';
$route['admin/composicao_composicao_transporte/add/(:any)'] = 'composicao_composicao_transporte/add/$1';
$route['admin/composicao_composicao_transporte/update'] = 'composicao_composicao_transporte/update';
$route['admin/composicao_composicao_transporte/update/(:any)'] = 'composicao_composicao_transporte/update/$1';
$route['admin/composicao_composicao_transporte/delete/(:any)'] = 'composicao_composicao_transporte/delete/$1';
//
$route['admin/composicao_composicao_transporte/lista_composicao_transporte/(:any)'] = 'composicao_composicao_transporte/lista_composicao_transporte/$1';
$route['admin/composicao_composicao_transporte/(:any)'] = 'composicao_composicao_transporte/index/$1'; //$1 = page number


$route['admin/sicros'] = 'sicros/index';
$route['admin/sicros/add'] = 'sicros/add';
$route['admin/sicros/update'] = 'sicros/update';
$route['admin/sicros/update/(:any)'] = 'sicros/update/$1';
$route['admin/sicros/delete/(:any)'] = 'sicros/delete/$1';
$route['admin/sicros/(:any)'] = 'sicros/index/$1'; //$1 = page number

$route['admin/composicoes'] = 'composicoes/index';
$route['admin/composicoes/add'] = 'composicoes/add';
$route['admin/composicoes/update'] = 'composicoes/update';
$route['admin/composicoes/update/(:any)'] = 'composicoes/update/$1';
$route['admin/composicoes/delete/(:any)'] = 'composicoes/delete/$1';
$route['admin/composicoes/composicao_checar/(:any)/(:any)'] = 'composicoes/composicao_checar/$1/$2';
$route['admin/composicoes/(:any)'] = 'composicoes/index/$1'; //$1 = page number

$route['admin/caracteristica_volumetrica'] = 'caracteristica_volumetrica/index';
$route['admin/caracteristica_volumetrica/add'] = 'caracteristica_volumetrica/add';
$route['admin/caracteristica_volumetrica/update'] = 'caracteristica_volumetrica/update';
$route['admin/caracteristica_volumetrica/update/(:any)'] = 'caracteristica_volumetrica/update/$1';
$route['admin/caracteristica_volumetrica/delete/(:any)'] = 'caracteristica_volumetrica/delete/$1';
$route['admin/caracteristica_volumetrica/(:any)'] = 'caracteristica_volumetrica/index/$1'; //$1 = page number
    
$route['admin/categorias'] = 'categorias/index';
$route['admin/categorias/add'] = 'categorias/add';
$route['admin/categorias/update'] = 'categorias/update';
$route['admin/categorias/update/(:any)'] = 'categorias/update/$1';
$route['admin/categorias/delete/(:any)'] = 'categorias/delete/$1';
$route['admin/categorias/(:any)'] = 'categorias/index/$1'; //$1 = page number

$route['admin/tipo_solucao'] = 'tipo_solucao/index';
$route['admin/tipo_solucao/add'] = 'tipo_solucao/add';
$route['admin/tipo_solucao/update'] = 'tipo_solucao/update';
$route['admin/tipo_solucao/update/(:any)'] = 'tipo_solucao/update/$1';
$route['admin/tipo_solucao/delete/(:any)'] = 'tipo_solucao/delete/$1';
$route['admin/tipo_solucao/(:any)'] = 'tipo_solucao/index/$1'; //$1 = page number

$route['admin/solucoes'] = 'solucoes/index';
$route['admin/solucoes/add'] = 'solucoes/add';
$route['admin/solucoes/update'] = 'solucoes/update';
$route['admin/solucoes/update/(:any)'] = 'solucoes/update/$1';
$route['admin/solucoes/delete/(:any)'] = 'solucoes/delete/$1';
$route['admin/solucoes/executa_solucao/(:any)'] = 'solucoes/executa_solucao/$1';

$route['admin/solucoes/solucao_checar/(:any)/(:any)'] = 'solucoes/solucao_checar/$1/$2';

$route['admin/solucoes/(:any)'] = 'solucoes/index/$1'; //$1 = page number

$route['admin/solucao_composicao'] = 'solucao_composicao/index';
$route['admin/solucao_composicao/add'] = 'solucao_composicao/add';
$route['admin/solucao_composicao/add/(:any)'] = 'solucao_composicao/add/$1';
$route['admin/solucao_composicao/update'] = 'solucao_composicao/update';
$route['admin/solucao_composicao/update/(:any)'] = 'solucao_composicao/update/$1';
$route['admin/solucao_composicao/delete/(:any)'] = 'solucao_composicao/delete/$1';

$route['admin/solucao_composicao/lista_composicao/(:any)'] = 'solucao_composicao/lista_composicao/$1';
$route['admin/solucao_composicao/(:any)'] = 'solucao_composicao/index/$1'; //$1 = page number

$route['admin/variaveis'] = 'variaveis/index';
$route['admin/variaveis/add'] = 'variaveis/add';
$route['admin/variaveis/update'] = 'variaveis/update';
$route['admin/variaveis/update/(:any)'] = 'variaveis/update/$1';
$route['admin/variaveis/delete/(:any)'] = 'variaveis/delete/$1';
$route['admin/variaveis/(:any)'] = 'variaveis/index/$1'; //$1 = page number

$route['admin/composicao_variaveis'] = 'composicao_variaveis/index';
$route['admin/composicao_variaveis/add'] = 'composicao_variaveis/add';
$route['admin/composicao_variaveis/update'] = 'composicao_variaveis/update';
$route['admin/composicao_variaveis/update/(:any)'] = 'composicao_variaveis/update/$1';
$route['admin/composicao_variaveis/delete/(:any)'] = 'composicao_variaveis/delete/$1';
$route['admin/composicao_variaveis/(:any)'] = 'composicao_variaveis/index/$1'; //$1 = page number


// TRANSPOSTES DESAFIO

$route['admin/sicro_transporte'] = 'sicro_transporte/index';
$route['admin/sicro_transporte/add'] = 'sicro_transporte/add';
$route['admin/sicro_transporte/update'] = 'sicro_transporte/update';
$route['admin/sicro_transporte/update/(:any)'] = 'sicro_transporte/update/$1';
$route['admin/sicro_transporte/delete/(:any)'] = 'sicro_transporte/delete/$1';
$route['admin/sicro_transporte/(:any)'] = 'sicro_transporte/index/$1'; //$1 = page number
    
$route['admin/transporte_material_classe'] = 'transporte_material_classe/index';
$route['admin/transporte_material_classe/add'] = 'transporte_material_classe/add';
$route['admin/transporte_material_classe/update'] = 'transporte_material_classe/update';
$route['admin/transporte_material_classe/update/(:any)'] = 'transporte_material_classe/update/$1';
$route['admin/transporte_material_classe/delete/(:any)'] = 'transporte_material_classe/delete/$1';

$route['admin/transporte_material_classe/lista_transporte_material_classe/(:any)'] = 'transporte_material_classe/lista_transporte_material_classe/$1';
$route['admin/transporte_material_classe/(:any)'] = 'transporte_material_classe/index/$1'; //$1 = page number

$route['admin/transportes'] = 'transportes/index';
$route['admin/transportes/add'] = 'transportes/add';
$route['admin/transportes/update'] = 'transportes/update';
$route['admin/transportes/update/(:any)'] = 'transportes/update/$1';
$route['admin/transportes/delete/(:any)'] = 'transportes/delete/$1';
$route['admin/transportes/(:any)'] = 'transportes/index/$1'; //$1 = page number
    
$route['admin/material_transporte'] = 'material_transporte/index';
$route['admin/material_transporte/add'] = 'material_transporte/add';
$route['admin/material_transporte/update'] = 'material_transporte/update';
$route['admin/material_transporte/update/(:any)'] = 'material_transporte/update/$1';
$route['admin/material_transporte/delete/(:any)'] = 'material_transporte/delete/$1';
$route['admin/material_transporte/(:any)'] = 'material_transporte/index/$1'; //$1 = page number

$route['admin/material_betuminoso_transporte'] = 'material_betuminoso_transporte/index';
$route['admin/material_betuminoso_transporte/add'] = 'material_betuminoso_transporte/add';
$route['admin/material_betuminoso_transporte/update'] = 'material_betuminoso_transporte/update';
$route['admin/material_betuminoso_transporte/update/(:any)'] = 'material_betuminoso_transporte/update/$1';
$route['admin/material_betuminoso_transporte/delete/(:any)'] = 'material_betuminoso_transporte/delete/$1';
$route['admin/material_betuminoso_transporte/(:any)'] = 'material_betuminoso_transporte/index/$1'; //$1 = page number

$route['admin/composicao_transporte_transporte'] = 'composicao_transporte_transporte/index';
$route['admin/composicao_transporte_transporte/add'] = 'composicao_transporte_transporte/add';
$route['admin/composicao_transporte_transporte/update'] = 'composicao_transporte_transporte/update';
$route['admin/composicao_transporte_transporte/update/(:any)'] = 'composicao_transporte_transporte/update/$1';
$route['admin/composicao_transporte_transporte/delete/(:any)'] = 'composicao_transporte_transporte/delete/$1';
$route['admin/composicao_transporte_transporte/(:any)'] = 'composicao_transporte_transporte/index/$1'; //$1 = page number


$route['admin/composicao_transporte'] = 'composicao_transporte/index';
$route['admin/composicao_transporte/add'] = 'composicao_transporte/add';
$route['admin/composicao_transporte/update'] = 'composicao_transporte/update';
$route['admin/composicao_transporte/update/(:any)'] = 'composicao_transporte/update/$1';
$route['admin/composicao_transporte/delete/(:any)'] = 'composicao_transporte/delete/$1';
$route['admin/composicao_transporte/(:any)'] = 'composicao_transporte/index/$1'; //$1 = page number
    
$route['admin/categoria_tipo'] = 'categoria_tipo/index';
$route['admin/categoria_tipo/add'] = 'categoria_tipo/add';
$route['admin/categoria_tipo/update'] = 'categoria_tipo/update';
$route['admin/categoria_tipo/update/(:any)'] = 'categoria_tipo/update/$1';
$route['admin/categoria_tipo/delete/(:any)'] = 'categoria_tipo/delete/$1';
$route['admin/categoria_tipo/(:any)'] = 'categoria_tipo/index/$1'; //$1 = page number
    
$route['admin/relatorios_cmg'] = 'relatorios_cmg/index';
$route['admin/relatorios_cmg/gerar_relatorio'] = 'relatorios_cmg/gerar_relatorio';
$route['admin/relatorios_cmg/gerar_relatorio/(:any)'] = 'relatorios_cmg/gerar_relatorio/$1';
$route['admin/relatorios_cmg/gerar_relatorio_categoria/(:any)/(:any)/(:any)'] = 'relatorios_cmg/gerar_relatorio_categoria/$1/$2/$3';
$route['admin/relatorios_cmg/update/(:any)'] = 'relatorios_cmg/update/$1';
$route['admin/relatorios_cmg/delete/(:any)'] = 'relatorios_cmg/delete/$1';

$route['admin/relatorios_cmg/catalogos'] = 'relatorios_cmg/catalogos';
$route['admin/relatorios_cmg/gerar_catalogo/(:any)'] = 'relatorios_cmg/gerar_catalogo/$1';
$route['admin/relatorios_cmg/get_catalogo_hdm/(:any)'] = 'relatorios_cmg/get_catalogo_hdm/$1';

$route['admin/relatorios_cmg/get_catalogo_concreto_asflatico'] = 'relatorios_cmg/get_catalogo_concreto_asflatico';
$route['admin/relatorios_cmg/get_catalogo_concreto_asflatico/(:any)'] = 'relatorios_cmg/get_catalogo_concreto_asflatico/$1';

$route['admin/relatorios_cmg/get_catalogo_tratamento_superficial'] = 'relatorios_cmg/get_catalogo_tratamento_superficial';
$route['admin/relatorios_cmg/get_catalogo_tratamento_superficial/(:any)'] = 'relatorios_cmg/get_catalogo_tratamento_superficial/$1';
$route['admin/relatorios_cmg/get_passarela'] = 'relatorios_cmg/get_passarela';
$route['admin/relatorios_cmg/(:any)'] = 'relatorios_cmg/index/$1'; //$1 = page number

$route['admin/fator_pavimentacao_padrao'] = 'fator_pavimentacao_padrao/index';
$route['admin/fator_pavimentacao_padrao/add'] = 'fator_pavimentacao_padrao/add';
$route['admin/fator_pavimentacao_padrao/update'] = 'fator_pavimentacao_padrao/update';
$route['admin/fator_pavimentacao_padrao/update/(:any)'] = 'fator_pavimentacao_padrao/update/$1';
$route['admin/fator_pavimentacao_padrao/delete/(:any)'] = 'fator_pavimentacao_padrao/delete/$1';
$route['admin/fator_pavimentacao_padrao/(:any)'] = 'fator_pavimentacao_padrao/index/$1'; //$1 = page number

$route['admin/sicro_fator_pavimentacao'] = 'sicro_fator_pavimentacao/index';
$route['admin/sicro_fator_pavimentacao/add'] = 'sicro_fator_pavimentacao/add';
$route['admin/sicro_fator_pavimentacao/add/(:any)'] = 'sicro_fator_pavimentacao/add/$1';
$route['admin/sicro_fator_pavimentacao/update'] = 'sicro_fator_pavimentacao/update';
$route['admin/sicro_fator_pavimentacao/update/(:any)'] = 'sicro_fator_pavimentacao/update/$1';
$route['admin/sicro_fator_pavimentacao/delete/(:any)'] = 'sicro_fator_pavimentacao/delete/$1';
// 
$route['admin/sicro_fator_pavimentacao/lista_fator_pavimentacao/(:any)'] = 'sicro_fator_pavimentacao/lista_fator_pavimentacao/$1';
$route['admin/sicro_fator_pavimentacao/(:any)'] = 'sicro_fator_pavimentacao/index/$1'; //$1 = page number
    
$route['admin/hdm_veiculos'] = 'hdm_veiculos/index';
$route['admin/hdm_veiculos/add'] = 'hdm_veiculos/add';
$route['admin/hdm_veiculos/update'] = 'hdm_veiculos/update';
$route['admin/hdm_veiculos/update/(:any)'] = 'hdm_veiculos/update/$1';
$route['admin/hdm_veiculos/delete/(:any)'] = 'hdm_veiculos/delete/$1';

$route['admin/hdm_veiculos/relatorios'] = 'hdm_veiculos/relatorios';
$route['admin/hdm_veiculos/relatorios/(:any)'] = 'hdm_veiculos/relatorios/$1';
$route['admin/hdm_veiculos/get_relatorio/(:any)'] = 'hdm_veiculos/get_relatorio/$1';
$route['admin/hdm_veiculos/get_relatorio/(:any)/(:any)'] = 'hdm_veiculos/get_relatorio/$1/$2';
$route['admin/hdm_veiculos/(:any)'] = 'hdm_veiculos/index/$1'; //$1 = page number
    
$route['admin/veiculos'] = 'veiculos/index';
$route['admin/veiculos/add'] = 'veiculos/add';
$route['admin/veiculos/update'] = 'veiculos/update';
$route['admin/veiculos/update/(:any)'] = 'veiculos/update/$1';
$route['admin/veiculos/delete/(:any)'] = 'veiculos/delete/$1';
$route['admin/veiculos/(:any)'] = 'veiculos/index/$1'; //$1 = page number

$route['admin/hdm_veiculos_vmo_vpol_vv'] = 'hdm_veiculos_vmo_vpol_vv/index';
$route['admin/hdm_veiculos_vmo_vpol_vv/add'] = 'hdm_veiculos_vmo_vpol_vv/add';
$route['admin/hdm_veiculos_vmo_vpol_vv/update'] = 'hdm_veiculos_vmo_vpol_vv/update';
$route['admin/hdm_veiculos_vmo_vpol_vv/update/(:any)'] = 'hdm_veiculos_vmo_vpol_vv/update/$1';
$route['admin/hdm_veiculos_vmo_vpol_vv/delete/(:any)'] = 'hdm_veiculos_vmo_vpol_vv/delete/$1';
$route['admin/hdm_veiculos_vmo_vpol_vv/(:any)'] = 'hdm_veiculos_vmo_vpol_vv/index/$1'; //$1 = page number

$route['admin/vpol'] = 'vpol/index';
$route['admin/vpol/add'] = 'vpol/add';
$route['admin/vpol/update'] = 'vpol/update';
$route['admin/vpol/update/(:any)'] = 'vpol/update/$1';
$route['admin/vpol/update/(:any)/(:any)'] = 'vpol/update/$1/$2';
$route['admin/vpol/delete/(:any)'] = 'vpol/delete/$1';

$route['admin/vpol/lista_vpol/(:any)'] = 'vpol/lista_vpol/$1';
$route['admin/vpol/(:any)'] = 'vpol/index/$1'; //$1 = page number

$route['admin/vv'] = 'vv/index';
$route['admin/vv/add'] = 'vv/add';
$route['admin/vv/update'] = 'vv/update';
$route['admin/vv/update/(:any)'] = 'vv/update/$1';
$route['admin/vv/update/(:any)/(:any)'] = 'vv/update/$1/$2';
$route['admin/vv/delete/(:any)'] = 'vv/delete/$1';

$route['admin/vv/lista_vv/(:any)'] = 'vv/lista_vv/$1';
$route['admin/vv/(:any)'] = 'vv/index/$1'; //$1 = page number

$route['admin/vmo'] = 'vmo/index';
$route['admin/vmo/add'] = 'vmo/add';
$route['admin/vmo/update'] = 'vmo/update';
$route['admin/vmo/update/(:any)'] = 'vmo/update/$1';
$route['admin/vmo/update/(:any)/(:any)'] = 'vmo/update/$1/$2';
$route['admin/vmo/delete/(:any)'] = 'vmo/delete/$1';

$route['admin/vmo/lista_vmo/(:any)'] = 'vmo/lista_vmo/$1';
$route['admin/vmo/(:any)'] = 'vmo/index/$1'; //$1 = page number
    
$route['admin/fator_conversao_padrao'] = 'fator_conversao_padrao/index';
$route['admin/fator_conversao_padrao/add'] = 'fator_conversao_padrao/add';
$route['admin/fator_conversao_padrao/update'] = 'fator_conversao_padrao/update';
$route['admin/fator_conversao_padrao/update/(:any)'] = 'fator_conversao_padrao/update/$1';
$route['admin/fator_conversao_padrao/delete/(:any)'] = 'fator_conversao_padrao/delete/$1';
$route['admin/fator_conversao_padrao/(:any)'] = 'fator_conversao_padrao/index/$1'; //$1 = page number

$route['admin/fator_conversao'] = 'fator_conversao/index';
$route['admin/fator_conversao/add'] = 'fator_conversao/add';
$route['admin/fator_conversao/update'] = 'fator_conversao/update';
$route['admin/fator_conversao/update/(:any)'] = 'fator_conversao/update/$1';
$route['admin/fator_conversao/update/(:any)/(:any)'] = 'fator_conversao/update/$1/$2';
$route['admin/fator_conversao/delete/(:any)'] = 'fator_conversao/delete/$1';

$route['admin/fator_conversao/lista_fator_conversao/(:any)'] = 'fator_conversao/lista_fator_conversao/$1';
$route['admin/fator_conversao/(:any)'] = 'fator_conversao/index/$1'; //$1 = page number
    




$route['admin/usuarios'] = 'usuarios/index';
$route['admin/usuarios/add'] = 'usuarios/add';
$route['admin/usuarios/update'] = 'usuarios/update';
$route['admin/usuarios/update/(:any)'] = 'usuarios/update/$1';
$route['admin/usuarios/delete/(:any)'] = 'usuarios/delete/$1';
$route['admin/usuarios/(:any)'] = 'usuarios/index/$1'; //$1 = page number

/*
$route['admin/veiculos'] = 'veiculos/index';
$route['admin/veiculos/add'] = 'veiculos/add';
$route['admin/veiculos/update'] = 'veiculos/update';
$route['admin/veiculos/update/(:any)'] = 'veiculos/update/$1';
$route['admin/veiculos/delete/(:any)'] = 'veiculos/delete/$1';
$route['admin/veiculos/(:any)'] = 'veiculos/index/$1'; //$1 = page number
    
$route['admin/classeveiculos'] = 'classeveiculos/index';
$route['admin/classeveiculos/add'] = 'classeveiculos/add';
$route['admin/classeveiculos/update'] = 'classeveiculos/update';
$route['admin/classeveiculos/update/(:any)'] = 'classeveiculos/update/$1';
$route['admin/classeveiculos/delete/(:any)'] = 'classeveiculos/delete/$1';
$route['admin/classeveiculos/(:any)'] = 'classeveiculos/index/$1'; //$1 = page number

$route['admin/veiculo_classeveiculo'] = 'veiculo_classeveiculo/index';
$route['admin/veiculo_classeveiculo/add'] = 'veiculo_classeveiculo/add';
$route['admin/veiculo_classeveiculo/update'] = 'veiculo_classeveiculo/update';
$route['admin/veiculo_classeveiculo/update/(:any)'] = 'veiculo_classeveiculo/update/$1';
$route['admin/veiculo_classeveiculo/delete/(:any)'] = 'veiculo_classeveiculo/delete/$1';
$route['admin/veiculo_classeveiculo/(:any)'] = 'veiculo_classeveiculo/index/$1'; //$1 = page number

$route['admin/pesquisa_trafegos'] = 'pesquisa_trafegos/index';
$route['admin/pesquisa_trafegos/add'] = 'pesquisa_trafegos/add';
$route['admin/pesquisa_trafegos/update'] = 'pesquisa_trafegos/update';
$route['admin/pesquisa_trafegos/update/(:any)'] = 'pesquisa_trafegos/update/$1';
$route['admin/pesquisa_trafegos/delete/(:any)'] = 'pesquisa_trafegos/delete/$1';
$route['admin/pesquisa_trafegos/contagens_list/(:any)'] = 'pesquisa_trafegos/contagens_list/$1';
$route['admin/pesquisa_trafegos/contagem_add/(:any)'] = 'pesquisa_trafegos/contagem_add/$1';
$route['admin/pesquisa_trafegos/contagem_update'] = 'pesquisa_trafegos/contagem_update';
$route['admin/pesquisa_trafegos/contagem_update/(:any)'] = 'pesquisa_trafegos/contagem_update/$1';
$route['admin/pesquisa_trafegos/contagem_update/(:any)/(:any)'] = 'pesquisa_trafegos/contagem_update/$1/$2';
$route['admin/pesquisa_trafegos/origens_destinos_list/(:any)'] = 'pesquisa_trafegos/origens_destinos_list/$1';
$route['admin/pesquisa_trafegos/origens_destinos_add/(:any)'] = 'pesquisa_trafegos/origens_destinos_add/$1';
$route['admin/pesquisa_trafegos/origens_destinos_update'] = 'pesquisa_trafegos/origens_destinos_update';
$route['admin/pesquisa_trafegos/origens_destinos_update/(:any)'] = 'pesquisa_trafegos/origens_destinos_update/$1';
$route['admin/pesquisa_trafegos/origens_destinos_update/(:any)/(:any)'] = 'pesquisa_trafegos/origens_destinos_update/$1/$2';
$route['admin/pesquisa_trafegos/(:any)'] = 'pesquisa_trafegos/index/$1'; //$1 = page number

$route['admin/sentidos'] = 'sentidos/index';
$route['admin/sentidos/add'] = 'sentidos/add';
$route['admin/sentidos/update'] = 'sentidos/update';
$route['admin/sentidos/update/(:any)'] = 'sentidos/update/$1';
$route['admin/sentidos/delete/(:any)'] = 'sentidos/delete/$1';
$route['admin/sentidos/pop_sentido'] = 'sentidos/pop_sentido';
$route['admin/sentidos/pop_sentido/(:any)'] = 'sentidos/pop_sentido/$1';
$route['admin/sentidos/pop_add/(:any)'] = 'sentidos/pop_add/$1';
$route['admin/sentidos/pop_update'] = 'sentidos/pop_update';
$route['admin/sentidos/pop_update/(:any)/(:any)'] = 'sentidos/pop_update/$1/$2';
$route['admin/sentidos/pop_delete/(:any)/(:any)'] = 'sentidos/pop_delete/$1/$2';
$route['admin/sentidos/(:any)'] = 'sentidos/index/$1'; //$1 = page number
    
$route['admin/contagens'] = 'contagens/index';
$route['admin/contagens/add'] = 'contagens/add';
$route['admin/contagens/update'] = 'contagens/update';
$route['admin/contagens/update/(:any)'] = 'contagens/update/$1';
$route['admin/contagens/delete/(:any)'] = 'contagens/delete/$1';
$route['admin/contagens/(:any)'] = 'contagens/index/$1'; //$1 = page number
    
$route['admin/consulta_contagens'] = 'consulta_contagens/index';
$route['admin/consulta_contagens/add'] = 'consulta_contagens/add';
$route['admin/consulta_contagens/update'] = 'consulta_contagens/update';
$route['admin/consulta_contagens/update/(:any)'] = 'consulta_contagens/update/$1';
$route['admin/consulta_contagens/delete/(:any)'] = 'consulta_contagens/delete/$1';
$route['admin/consulta_contagens/resultado/(:any)'] = 'consulta_contagens/resultado/$1';
$route['admin/consulta_contagens/resultado_od/(:any)'] = 'consulta_contagens/resultado_od/$1';
$route['admin/consulta_contagens/(:any)'] = 'consulta_contagens/index/$1'; //$1 = page number

$route['admin/origens_destinos'] = 'origens_destinos/index';
$route['admin/origens_destinos/add'] = 'origens_destinos/add';
$route['admin/origens_destinos/update'] = 'origens_destinos/update';
$route['admin/origens_destinos/update/(:any)'] = 'origens_destinos/update/$1';
$route['admin/origens_destinos/delete/(:any)'] = 'origens_destinos/delete/$1';
$route['admin/origens_destinos/(:any)'] = 'origens_destinos/index/$1'; //$1 = page number


// sondagens start
$route['admin/sondagens'] = 'sondagens/index';
$route['admin/sondagens/add'] = 'sondagens/add';
$route['admin/sondagens/update'] = 'sondagens/update';
$route['admin/sondagens/update/(:any)'] = 'sondagens/update/$1';
$route['admin/sondagens/delete/(:any)'] = 'sondagens/delete/$1';
$route['admin/sondagens/(:any)'] = 'sondagens/index/$1'; //$1 = page number

$route['admin/resumo_sondagens'] = 'resumo_sondagens/index';
$route['admin/resumo_sondagens/add'] = 'resumo_sondagens/add';
$route['admin/resumo_sondagens/add/(:any)'] = 'resumo_sondagens/add/$1';
$route['admin/resumo_sondagens/update'] = 'resumo_sondagens/update';
$route['admin/resumo_sondagens/update/(:any)'] = 'resumo_sondagens/update/$1';
$route['admin/resumo_sondagens/delete/(:any)'] = 'resumo_sondagens/delete/$1';
$route['admin/resumo_sondagens/sondagem/(:any)'] = 'resumo_sondagens/sondagem/$1';
$route['admin/resumo_sondagens/resumo/(:any)'] = 'resumo_sondagens/resumo/$1';
$route['admin/resumo_sondagens/(:any)'] = 'resumo_sondagens/index/$1'; //$1 = page number

$route['admin/tipo_sondagens'] = 'tipo_sondagens/index';
$route['admin/tipo_sondagens/add'] = 'tipo_sondagens/add';
$route['admin/tipo_sondagens/update'] = 'tipo_sondagens/update';
$route['admin/tipo_sondagens/update/(:any)'] = 'tipo_sondagens/update/$1';
$route['admin/tipo_sondagens/delete/(:any)'] = 'tipo_sondagens/delete/$1';
$route['admin/tipo_sondagens/(:any)'] = 'tipo_sondagens/index/$1'; //$1 = page number

$route['admin/consulta_sondagens'] = 'consulta_sondagens/index';
$route['admin/consulta_sondagens/add'] = 'consulta_sondagens/add';
$route['admin/consulta_sondagens/update'] = 'consulta_sondagens/update';
$route['admin/consulta_sondagens/update/(:any)'] = 'consulta_sondagens/update/$1';
$route['admin/consulta_sondagens/delete/(:any)'] = 'consulta_sondagens/delete/$1';
$route['admin/consulta_sondagens/delete/(:any)/(:any)'] = 'consulta_sondagens/delete/$1/$2';
$route['admin/consulta_sondagens/resultado/(:any)'] = 'consulta_sondagens/resultado/$1';
$route['admin/consulta_sondagens/resultado/(:any)/(:any)'] = 'consulta_sondagens/resultado/$1/$2';
$route['admin/consulta_sondagens/resultado_od/(:any)'] = 'consulta_sondagens/resultado_od/$1';
$route['admin/consulta_sondagens/(:any)'] = 'consulta_sondagens/index/$1'; //$1 = page number

$route['admin/sondagem_files'] = 'sondagem_files/index';
$route['admin/sondagem_files/add'] = 'sondagem_files/add';
$route['admin/sondagem_files/add/(:any)'] = 'sondagem_files/add/$1';
$route['admin/sondagem_files/update'] = 'sondagem_files/update';
$route['admin/sondagem_files/update/(:any)'] = 'sondagem_files/update/$1';
$route['admin/sondagem_files/delete/(:any)'] = 'sondagem_files/delete/$1';
$route['admin/sondagem_files/sondagem/(:any)'] = 'sondagem_files/sondagem/$1';
$route['admin/sondagem_files/(:any)'] = 'sondagem_files/index/$1'; //$1 = page number
    
$route['admin/tipo_ensaios'] = 'tipo_ensaios/index';
$route['admin/tipo_ensaios/add'] = 'tipo_ensaios/add';
$route['admin/tipo_ensaios/update'] = 'tipo_ensaios/update';
$route['admin/tipo_ensaios/update/(:any)'] = 'tipo_ensaios/update/$1';
$route['admin/tipo_ensaios/delete/(:any)'] = 'tipo_ensaios/delete/$1';
$route['admin/tipo_ensaios/(:any)'] = 'tipo_ensaios/index/$1'; //$1 = page number

$route['admin/resumo_sondagem_files'] = 'resumo_sondagem_files/index';
$route['admin/resumo_sondagem_files/add'] = 'resumo_sondagem_files/add';
$route['admin/resumo_sondagem_files/add/(:any)'] = 'resumo_sondagem_files/add/$1';
$route['admin/resumo_sondagem_files/update'] = 'resumo_sondagem_files/update';
$route['admin/resumo_sondagem_files/update/(:any)'] = 'resumo_sondagem_files/update/$1';
$route['admin/resumo_sondagem_files/delete/(:any)'] = 'resumo_sondagem_files/delete/$1';
$route['admin/resumo_sondagem_files/resumo/(:any)'] = 'resumo_sondagem_files/resumo/$1';
$route['admin/resumo_sondagem_files/(:any)'] = 'resumo_sondagem_files/index/$1'; //$1 = page number
    

$route['admin/perguntas'] = 'perguntas/index';
$route['admin/perguntas/add'] = 'perguntas/add';
$route['admin/perguntas/update'] = 'perguntas/update';
$route['admin/perguntas/update/(:any)'] = 'perguntas/update/$1';
$route['admin/perguntas/delete/(:any)'] = 'perguntas/delete/$1';
$route['admin/perguntas/(:any)'] = 'perguntas/index/$1'; //$1 = page number
    
$route['admin/od_perguntas'] = 'od_perguntas/index';
$route['admin/od_perguntas/add'] = 'od_perguntas/add';
$route['admin/od_perguntas/update'] = 'od_perguntas/update';
$route['admin/od_perguntas/update/(:any)'] = 'od_perguntas/update/$1';
$route['admin/od_perguntas/delete/(:any)'] = 'od_perguntas/delete/$1';
$route['admin/od_perguntas/(:any)'] = 'od_perguntas/index/$1'; //$1 = page number

$route['admin/od_entrevistas'] = 'od_entrevistas/index';
$route['admin/od_entrevistas/add'] = 'od_entrevistas/add';
$route['admin/od_entrevistas/update'] = 'od_entrevistas/update';
$route['admin/od_entrevistas/update/(:any)'] = 'od_entrevistas/update/$1';
$route['admin/od_entrevistas/delete/(:any)'] = 'od_entrevistas/delete/$1';
$route['admin/od_entrevistas/(:any)'] = 'od_entrevistas/index/$1'; //$1 = page number

$route['admin/entrevistas'] = 'entrevistas/index';
$route['admin/entrevistas/add'] = 'entrevistas/add';
$route['admin/entrevistas/update'] = 'entrevistas/update';
$route['admin/entrevistas/update/(:any)'] = 'entrevistas/update/$1';
$route['admin/entrevistas/delete/(:any)'] = 'entrevistas/delete/$1';
$route['admin/entrevistas/(:any)'] = 'entrevistas/index/$1'; //$1 = page number
    
$route['admin/entrevista_perguntas'] = 'entrevista_perguntas/index';
$route['admin/entrevista_perguntas/add'] = 'entrevista_perguntas/add';
$route['admin/entrevista_perguntas/update'] = 'entrevista_perguntas/update';
$route['admin/entrevista_perguntas/update/(:any)'] = 'entrevista_perguntas/update/$1';
$route['admin/entrevista_perguntas/delete/(:any)'] = 'entrevista_perguntas/delete/$1';
$route['admin/entrevista_perguntas/(:any)'] = 'entrevista_perguntas/index/$1'; //$1 = page number




$route['admin/acidentes'] = 'acidentes/index';
$route['admin/acidentes/add'] = 'acidentes/add';
$route['admin/acidentes/update'] = 'acidentes/update';
$route['admin/acidentes/update/(:any)'] = 'acidentes/update/$1';
$route['admin/acidentes/delete/(:any)'] = 'acidentes/delete/$1';
$route['admin/acidentes/(:any)'] = 'acidentes/index/$1'; //$1 = page number

$route['admin/classe_obras'] = 'classe_obras/index';
$route['admin/classe_obras/add'] = 'classe_obras/add';
$route['admin/classe_obras/update'] = 'classe_obras/update';
$route['admin/classe_obras/update/(:any)'] = 'classe_obras/update/$1';
$route['admin/classe_obras/delete/(:any)'] = 'classe_obras/delete/$1';
$route['admin/classe_obras/(:any)'] = 'classe_obras/index/$1'; //$1 = page number

$route['admin/tipo_obras'] = 'tipo_obras/index';
$route['admin/tipo_obras/add'] = 'tipo_obras/add';
$route['admin/tipo_obras/update'] = 'tipo_obras/update';
$route['admin/tipo_obras/update/(:any)'] = 'tipo_obras/update/$1';
$route['admin/tipo_obras/delete/(:any)'] = 'tipo_obras/delete/$1';
$route['admin/tipo_obras/(:any)'] = 'tipo_obras/index/$1'; //$1 = page number

$route['admin/obras'] = 'obras/index';
$route['admin/obras/add'] = 'obras/add';
$route['admin/obras/update'] = 'obras/update';
$route['admin/obras/update/(:any)'] = 'obras/update/$1';
$route['admin/obras/add_obra_futura'] = 'obras/add_obra_futura';
$route['admin/obras/delete/(:any)'] = 'obras/delete/$1';
$route['admin/obras/update_obra_futura'] = 'obras/update_obra_futura';
$route['admin/obras/update_obra_futura/(:any)'] = 'obras/update_obra_futura/$1';
$route['admin/obras/delete_obra_futura/(:any)'] = 'obras/delete_obra_futura/$1';
$route['admin/obras/obras_acidente'] = 'obras/obras_acidente';
$route['admin/obras/obras_tipo'] = 'obras/obras_tipo';
$route['admin/obras/obras_tipo_acidente'] = 'obras/obras_tipo_acidente';
$route['admin/obras/obras_futuras'] = 'obras/obras_futuras';
$route['admin/obras/obras_futuras/(:any)'] = 'obras/obras_futuras/$1';
$route['admin/obras/obras_futuras_analise'] = 'obras/obras_futuras_analise';
$route['admin/obras/obras_futuras_analise(:any)'] = 'obras/obras_futuras_analise/$1';
$route['admin/obras/obras_futuras_tipo_acidente'] = 'obras/obras_futuras_tipo_acidente';
$route['admin/obras/acidentes/(:any)'] = 'obras/acidentes/$1';
$route['admin/obras/(:any)'] = 'obras/index/$1'; //$1 = page number

$route['admin/upload_acidentes'] = 'upload_acidentes/index';
$route['admin/upload_acidentes/add'] = 'upload_acidentes/add';
$route['admin/upload_acidentes/update'] = 'upload_acidentes/update';
$route['admin/upload_acidentes/update/(:any)'] = 'upload_acidentes/update/$1';
$route['admin/upload_acidentes/delete/(:any)'] = 'upload_acidentes/delete/$1';
$route['admin/upload_acidentes/completo2004'] = 'upload_acidentes/completo2004';
$route['admin/upload_acidentes/completo2005'] = 'upload_acidentes/completo2005';
$route['admin/upload_acidentes/completo2006'] = 'upload_acidentes/completo2006';
$route['admin/upload_acidentes/insert_all_data'] = 'upload_acidentes/insert_all_data';
$route['admin/upload_acidentes/(:any)'] = 'upload_acidentes/index/$1'; //$1 = page number

$route['admin/upload_tipos_obras'] = 'upload_tipos_obras/index';
$route['admin/upload_tipos_obras/add'] = 'upload_tipos_obras/add';
$route['admin/upload_tipos_obras/update'] = 'upload_tipos_obras/update';
$route['admin/upload_tipos_obras/update/(:any)'] = 'upload_tipos_obras/update/$1';
$route['admin/upload_tipos_obras/delete/(:any)'] = 'upload_tipos_obras/delete/$1';
$route['admin/upload_tipos_obras/(:any)'] = 'upload_tipos_obras/index/$1'; //$1 = page number
    



$route['admin/visualizatabelas'] = 'visualizatabelas/index';
$route['admin/visualizatabelas/visualiza/(:any)/(:any)'] = 'visualizatabelas/visualiza/$1/$2';
$route['admin/visualizatabelas/(:any)'] = 'visualizatabelas/index/$1'; //$1 = page number


$route['admin/ciclos'] = 'ciclos/index';
$route['admin/ciclos/add'] = 'ciclos/add';
$route['admin/ciclos/update'] = 'ciclos/update';
$route['admin/ciclos/update/(:any)'] = 'ciclos/update/$1';
$route['admin/ciclos/delete/(:any)'] = 'ciclos/delete/$1';
$route['admin/ciclos/(:any)'] = 'ciclos/index/$1'; //$1 = page number

$route['admin/trechos'] = 'trechos/index';
$route['admin/trechos/add'] = 'trechos/add';
$route['admin/trechos/update'] = 'trechos/update';
$route['admin/trechos/update/(:any)'] = 'trechos/update/$1';
$route['admin/trechos/delete/(:any)'] = 'trechos/delete/$1';
$route['admin/trechos/(:any)'] = 'trechos/index/$1'; //$1 = page number

$route['admin/inclinacao_pista'] = 'inclinacao_pista/index';
$route['admin/inclinacao_pista/add'] = 'inclinacao_pista/add';
$route['admin/inclinacao_pista/update'] = 'inclinacao_pista/update';
$route['admin/inclinacao_pista/update/(:any)'] = 'inclinacao_pista/update/$1';
$route['admin/inclinacao_pista/delete/(:any)'] = 'inclinacao_pista/delete/$1';
$route['admin/inclinacao_pista/get_ciclo_uf/(:any)'] = 'inclinacao_pista/get_ciclo_uf/$1';
$route['admin/inclinacao_pista/(:any)'] = 'inclinacao_pista/index/$1'; //$1 = page number
    
$route['admin/logs'] = 'logs/index';
$route['admin/logs/add'] = 'logs/add';
$route['admin/logs/update'] = 'logs/update';
$route['admin/logs/update/(:any)'] = 'logs/update/$1';
$route['admin/logs/delete/(:any)'] = 'logs/delete/$1';
$route['admin/logs/(:any)'] = 'logs/index/$1'; //$1 = page number

$route['admin/inclinacao_logs'] = 'inclinacao_logs/index';
$route['admin/inclinacao_logs/add'] = 'inclinacao_logs/add';
$route['admin/inclinacao_logs/update'] = 'inclinacao_logs/update';
$route['admin/inclinacao_logs/update/(:any)'] = 'inclinacao_logs/update/$1';
$route['admin/inclinacao_logs/delete/(:any)'] = 'inclinacao_logs/delete/$1';
$route['admin/inclinacao_logs/(:any)'] = 'inclinacao_logs/index/$1'; //$1 = page number

$route['admin/gps_logs'] = 'gps_logs/index';
$route['admin/gps_logs/add'] = 'gps_logs/add';
$route['admin/gps_logs/update'] = 'gps_logs/update';
$route['admin/gps_logs/update/(:any)'] = 'gps_logs/update/$1';
$route['admin/gps_logs/delete/(:any)'] = 'gps_logs/delete/$1';
$route['admin/gps_logs/(:any)'] = 'gps_logs/index/$1'; //$1 = page number

$route['admin/detalhe_ocorrencias'] = 'detalhe_ocorrencias/index';
$route['admin/detalhe_ocorrencias/add'] = 'detalhe_ocorrencias/add';
$route['admin/detalhe_ocorrencias/update'] = 'detalhe_ocorrencias/update';
$route['admin/detalhe_ocorrencias/update/(:any)'] = 'detalhe_ocorrencias/update/$1';
$route['admin/detalhe_ocorrencias/delete/(:any)'] = 'detalhe_ocorrencias/delete/$1';
$route['admin/detalhe_ocorrencias/(:any)'] = 'detalhe_ocorrencias/index/$1'; //$1 = page number

$route['admin/grupos'] = 'grupos/index';
$route['admin/grupos/add'] = 'grupos/add';
$route['admin/grupos/update'] = 'grupos/update';
$route['admin/grupos/update/(:any)'] = 'grupos/update/$1';
$route['admin/grupos/delete/(:any)'] = 'grupos/delete/$1';
$route['admin/grupos/(:any)'] = 'grupos/index/$1'; //$1 = page number

$route['admin/ocorrencia_logs'] = 'ocorrencia_logs/index';
$route['admin/ocorrencia_logs/add'] = 'ocorrencia_logs/add';
$route['admin/ocorrencia_logs/update'] = 'ocorrencia_logs/update';
$route['admin/ocorrencia_logs/update/(:any)'] = 'ocorrencia_logs/update/$1';
$route['admin/ocorrencia_logs/delete/(:any)'] = 'ocorrencia_logs/delete/$1';
$route['admin/ocorrencia_logs/(:any)'] = 'ocorrencia_logs/index/$1'; //$1 = page number

$route['admin/tipo_ocorrencias'] = 'tipo_ocorrencias/index';
$route['admin/tipo_ocorrencias/add'] = 'tipo_ocorrencias/add';
$route['admin/tipo_ocorrencias/update'] = 'tipo_ocorrencias/update';
$route['admin/tipo_ocorrencias/update/(:any)'] = 'tipo_ocorrencias/update/$1';
$route['admin/tipo_ocorrencias/delete/(:any)'] = 'tipo_ocorrencias/delete/$1';
$route['admin/tipo_ocorrencias/(:any)'] = 'tipo_ocorrencias/index/$1'; //$1 = page number

$route['admin/consulta_trecho_acidentes'] = 'consulta_trecho_acidentes/index';
$route['admin/consulta_trecho_acidentes/add'] = 'consulta_trecho_acidentes/add';
$route['admin/consulta_trecho_acidentes/update'] = 'consulta_trecho_acidentes/update';
$route['admin/consulta_trecho_acidentes/update/(:any)'] = 'consulta_trecho_acidentes/update/$1';
$route['admin/consulta_trecho_acidentes/delete/(:any)'] = 'consulta_trecho_acidentes/delete/$1';
$route['admin/consulta_trecho_acidentes/exclusivo'] = 'consulta_trecho_acidentes/exclusivo';
$route['admin/consulta_trecho_acidentes/(:any)'] = 'consulta_trecho_acidentes/index/$1'; //$1 = page number
    
$route['admin/custos'] = 'custos/index';
$route['admin/custos/add'] = 'custos/add';
$route['admin/custos/update'] = 'custos/update';
$route['admin/custos/update/(:any)'] = 'custos/update/$1';
$route['admin/custos/delete/(:any)'] = 'custos/delete/$1';
$route['admin/custos/(:any)'] = 'custos/index/$1'; //$1 = page number
*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */
