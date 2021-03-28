
    				$route['admin/categorias'] = 'categorias/index';
				$route['admin/categorias/add'] = 'categorias/add';
				$route['admin/categorias/update'] = 'categorias/update';
				$route['admin/categorias/update/(:any)'] = 'categorias/update/$1';
				$route['admin/categorias/delete/(:any)'] = 'categorias/delete/$1';
				$route['admin/categorias/(:any)'] = 'categorias/index/$1'; //$1 = page number
    			