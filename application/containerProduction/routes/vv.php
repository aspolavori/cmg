
    				$route['admin/vv'] = 'vv/index';
				$route['admin/vv/add'] = 'vv/add';
				$route['admin/vv/update'] = 'vv/update';
				$route['admin/vv/update/(:any)'] = 'vv/update/$1';
				$route['admin/vv/delete/(:any)'] = 'vv/delete/$1';
				$route['admin/vv/(:any)'] = 'vv/index/$1'; //$1 = page number
    			