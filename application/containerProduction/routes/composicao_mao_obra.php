
    				$route['admin/composicao_mao_obra'] = 'composicao_mao_obra/index';
				$route['admin/composicao_mao_obra/add'] = 'composicao_mao_obra/add';
				$route['admin/composicao_mao_obra/update'] = 'composicao_mao_obra/update';
				$route['admin/composicao_mao_obra/update/(:any)'] = 'composicao_mao_obra/update/$1';
				$route['admin/composicao_mao_obra/delete/(:any)'] = 'composicao_mao_obra/delete/$1';
				$route['admin/composicao_mao_obra/(:any)'] = 'composicao_mao_obra/index/$1'; //$1 = page number
    			