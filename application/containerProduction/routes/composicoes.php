
    				$route['admin/composicoes'] = 'composicoes/index';
				$route['admin/composicoes/add'] = 'composicoes/add';
				$route['admin/composicoes/update'] = 'composicoes/update';
				$route['admin/composicoes/update/(:any)'] = 'composicoes/update/$1';
				$route['admin/composicoes/delete/(:any)'] = 'composicoes/delete/$1';
				$route['admin/composicoes/(:any)'] = 'composicoes/index/$1'; //$1 = page number
    			