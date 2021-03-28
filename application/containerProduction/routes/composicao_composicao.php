
    				$route['admin/composicao_composicao'] = 'composicao_composicao/index';
				$route['admin/composicao_composicao/add'] = 'composicao_composicao/add';
				$route['admin/composicao_composicao/update'] = 'composicao_composicao/update';
				$route['admin/composicao_composicao/update/(:any)'] = 'composicao_composicao/update/$1';
				$route['admin/composicao_composicao/delete/(:any)'] = 'composicao_composicao/delete/$1';
				$route['admin/composicao_composicao/(:any)'] = 'composicao_composicao/index/$1'; //$1 = page number
    			