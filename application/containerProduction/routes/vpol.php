
    				$route['admin/vpol'] = 'vpol/index';
				$route['admin/vpol/add'] = 'vpol/add';
				$route['admin/vpol/update'] = 'vpol/update';
				$route['admin/vpol/update/(:any)'] = 'vpol/update/$1';
				$route['admin/vpol/delete/(:any)'] = 'vpol/delete/$1';
				$route['admin/vpol/(:any)'] = 'vpol/index/$1'; //$1 = page number
    			