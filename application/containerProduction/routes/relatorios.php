
    				$route['admin/relatorios'] = 'relatorios/index';
				$route['admin/relatorios/add'] = 'relatorios/add';
				$route['admin/relatorios/update'] = 'relatorios/update';
				$route['admin/relatorios/update/(:any)'] = 'relatorios/update/$1';
				$route['admin/relatorios/delete/(:any)'] = 'relatorios/delete/$1';
				$route['admin/relatorios/(:any)'] = 'relatorios/index/$1'; //$1 = page number
    			