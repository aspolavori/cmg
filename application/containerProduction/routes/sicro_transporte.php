
    				$route['admin/sicro_transporte'] = 'sicro_transporte/index';
				$route['admin/sicro_transporte/add'] = 'sicro_transporte/add';
				$route['admin/sicro_transporte/update'] = 'sicro_transporte/update';
				$route['admin/sicro_transporte/update/(:any)'] = 'sicro_transporte/update/$1';
				$route['admin/sicro_transporte/delete/(:any)'] = 'sicro_transporte/delete/$1';
				$route['admin/sicro_transporte/(:any)'] = 'sicro_transporte/index/$1'; //$1 = page number
    			