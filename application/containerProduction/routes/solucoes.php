
    				$route['admin/solucoes'] = 'solucoes/index';
				$route['admin/solucoes/add'] = 'solucoes/add';
				$route['admin/solucoes/update'] = 'solucoes/update';
				$route['admin/solucoes/update/(:any)'] = 'solucoes/update/$1';
				$route['admin/solucoes/delete/(:any)'] = 'solucoes/delete/$1';
				$route['admin/solucoes/(:any)'] = 'solucoes/index/$1'; //$1 = page number
    			