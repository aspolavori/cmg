
    				$route['admin/tipo_solucao'] = 'tipo_solucao/index';
				$route['admin/tipo_solucao/add'] = 'tipo_solucao/add';
				$route['admin/tipo_solucao/update'] = 'tipo_solucao/update';
				$route['admin/tipo_solucao/update/(:any)'] = 'tipo_solucao/update/$1';
				$route['admin/tipo_solucao/delete/(:any)'] = 'tipo_solucao/delete/$1';
				$route['admin/tipo_solucao/(:any)'] = 'tipo_solucao/index/$1'; //$1 = page number
    			