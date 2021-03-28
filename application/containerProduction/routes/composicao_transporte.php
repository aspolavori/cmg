
    				$route['admin/composicao_transporte'] = 'composicao_transporte/index';
				$route['admin/composicao_transporte/add'] = 'composicao_transporte/add';
				$route['admin/composicao_transporte/update'] = 'composicao_transporte/update';
				$route['admin/composicao_transporte/update/(:any)'] = 'composicao_transporte/update/$1';
				$route['admin/composicao_transporte/delete/(:any)'] = 'composicao_transporte/delete/$1';
				$route['admin/composicao_transporte/(:any)'] = 'composicao_transporte/index/$1'; //$1 = page number
    			