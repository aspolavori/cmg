
    				$route['admin/equipamentos'] = 'equipamentos/index';
				$route['admin/equipamentos/add'] = 'equipamentos/add';
				$route['admin/equipamentos/update'] = 'equipamentos/update';
				$route['admin/equipamentos/update/(:any)'] = 'equipamentos/update/$1';
				$route['admin/equipamentos/delete/(:any)'] = 'equipamentos/delete/$1';
				$route['admin/equipamentos/(:any)'] = 'equipamentos/index/$1'; //$1 = page number
    			