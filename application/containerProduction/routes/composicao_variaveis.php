
    				$route['admin/composicao_variaveis'] = 'composicao_variaveis/index';
				$route['admin/composicao_variaveis/add'] = 'composicao_variaveis/add';
				$route['admin/composicao_variaveis/update'] = 'composicao_variaveis/update';
				$route['admin/composicao_variaveis/update/(:any)'] = 'composicao_variaveis/update/$1';
				$route['admin/composicao_variaveis/delete/(:any)'] = 'composicao_variaveis/delete/$1';
				$route['admin/composicao_variaveis/(:any)'] = 'composicao_variaveis/index/$1'; //$1 = page number
    			