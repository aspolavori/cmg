
    				$route['admin/variaveis'] = 'variaveis/index';
				$route['admin/variaveis/add'] = 'variaveis/add';
				$route['admin/variaveis/update'] = 'variaveis/update';
				$route['admin/variaveis/update/(:any)'] = 'variaveis/update/$1';
				$route['admin/variaveis/delete/(:any)'] = 'variaveis/delete/$1';
				$route['admin/variaveis/(:any)'] = 'variaveis/index/$1'; //$1 = page number
    			