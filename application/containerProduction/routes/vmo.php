
    				$route['admin/vmo'] = 'vmo/index';
				$route['admin/vmo/add'] = 'vmo/add';
				$route['admin/vmo/update'] = 'vmo/update';
				$route['admin/vmo/update/(:any)'] = 'vmo/update/$1';
				$route['admin/vmo/delete/(:any)'] = 'vmo/delete/$1';
				$route['admin/vmo/(:any)'] = 'vmo/index/$1'; //$1 = page number
    			