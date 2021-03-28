
    				$route['admin/materiais'] = 'materiais/index';
				$route['admin/materiais/add'] = 'materiais/add';
				$route['admin/materiais/update'] = 'materiais/update';
				$route['admin/materiais/update/(:any)'] = 'materiais/update/$1';
				$route['admin/materiais/delete/(:any)'] = 'materiais/delete/$1';
				$route['admin/materiais/(:any)'] = 'materiais/index/$1'; //$1 = page number
    			