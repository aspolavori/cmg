
    				$route['admin/categoria_tipo'] = 'categoria_tipo/index';
				$route['admin/categoria_tipo/add'] = 'categoria_tipo/add';
				$route['admin/categoria_tipo/update'] = 'categoria_tipo/update';
				$route['admin/categoria_tipo/update/(:any)'] = 'categoria_tipo/update/$1';
				$route['admin/categoria_tipo/delete/(:any)'] = 'categoria_tipo/delete/$1';
				$route['admin/categoria_tipo/(:any)'] = 'categoria_tipo/index/$1'; //$1 = page number
    			