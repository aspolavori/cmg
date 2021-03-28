
    				$route['admin/composicao_equipamento'] = 'composicao_equipamento/index';
				$route['admin/composicao_equipamento/add'] = 'composicao_equipamento/add';
				$route['admin/composicao_equipamento/update'] = 'composicao_equipamento/update';
				$route['admin/composicao_equipamento/update/(:any)'] = 'composicao_equipamento/update/$1';
				$route['admin/composicao_equipamento/delete/(:any)'] = 'composicao_equipamento/delete/$1';
				$route['admin/composicao_equipamento/(:any)'] = 'composicao_equipamento/index/$1'; //$1 = page number
    			