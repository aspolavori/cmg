
    				$route['admin/sicros'] = 'sicros/index';
				$route['admin/sicros/add'] = 'sicros/add';
				$route['admin/sicros/update'] = 'sicros/update';
				$route['admin/sicros/update/(:any)'] = 'sicros/update/$1';
				$route['admin/sicros/delete/(:any)'] = 'sicros/delete/$1';
				$route['admin/sicros/(:any)'] = 'sicros/index/$1'; //$1 = page number
    			