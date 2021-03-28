
    				$route['admin/solucao_composicao'] = 'solucao_composicao/index';
				$route['admin/solucao_composicao/add'] = 'solucao_composicao/add';
				$route['admin/solucao_composicao/update'] = 'solucao_composicao/update';
				$route['admin/solucao_composicao/update/(:any)'] = 'solucao_composicao/update/$1';
				$route['admin/solucao_composicao/delete/(:any)'] = 'solucao_composicao/delete/$1';
				$route['admin/solucao_composicao/(:any)'] = 'solucao_composicao/index/$1'; //$1 = page number
    			