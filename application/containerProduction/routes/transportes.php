
    				$route['admin/transportes'] = 'transportes/index';
				$route['admin/transportes/add'] = 'transportes/add';
				$route['admin/transportes/update'] = 'transportes/update';
				$route['admin/transportes/update/(:any)'] = 'transportes/update/$1';
				$route['admin/transportes/delete/(:any)'] = 'transportes/delete/$1';
				$route['admin/transportes/(:any)'] = 'transportes/index/$1'; //$1 = page number
    			