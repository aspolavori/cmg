
    				$route['admin/mao_obra'] = 'mao_obra/index';
				$route['admin/mao_obra/add'] = 'mao_obra/add';
				$route['admin/mao_obra/update'] = 'mao_obra/update';
				$route['admin/mao_obra/update/(:any)'] = 'mao_obra/update/$1';
				$route['admin/mao_obra/delete/(:any)'] = 'mao_obra/delete/$1';
				$route['admin/mao_obra/(:any)'] = 'mao_obra/index/$1'; //$1 = page number
    			