
    				$route['admin/materiais_betuminosos'] = 'materiais_betuminosos/index';
				$route['admin/materiais_betuminosos/add'] = 'materiais_betuminosos/add';
				$route['admin/materiais_betuminosos/update'] = 'materiais_betuminosos/update';
				$route['admin/materiais_betuminosos/update/(:any)'] = 'materiais_betuminosos/update/$1';
				$route['admin/materiais_betuminosos/delete/(:any)'] = 'materiais_betuminosos/delete/$1';
				$route['admin/materiais_betuminosos/(:any)'] = 'materiais_betuminosos/index/$1'; //$1 = page number
    			