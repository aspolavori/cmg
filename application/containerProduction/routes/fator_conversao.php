
    				$route['admin/fator_conversao'] = 'fator_conversao/index';
				$route['admin/fator_conversao/add'] = 'fator_conversao/add';
				$route['admin/fator_conversao/update'] = 'fator_conversao/update';
				$route['admin/fator_conversao/update/(:any)'] = 'fator_conversao/update/$1';
				$route['admin/fator_conversao/delete/(:any)'] = 'fator_conversao/delete/$1';
				$route['admin/fator_conversao/(:any)'] = 'fator_conversao/index/$1'; //$1 = page number
    			