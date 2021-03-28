
    				$route['admin/sicro'] = 'sicro/index';
				$route['admin/sicro/add'] = 'sicro/add';
				$route['admin/sicro/update'] = 'sicro/update';
				$route['admin/sicro/update/(:any)'] = 'sicro/update/$1';
				$route['admin/sicro/delete/(:any)'] = 'sicro/delete/$1';
				$route['admin/sicro/(:any)'] = 'sicro/index/$1'; //$1 = page number
    			