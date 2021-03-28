
    				$route['admin/transporte_composicao'] = 'transporte_composicao/index';
				$route['admin/transporte_composicao/add'] = 'transporte_composicao/add';
				$route['admin/transporte_composicao/update'] = 'transporte_composicao/update';
				$route['admin/transporte_composicao/update/(:any)'] = 'transporte_composicao/update/$1';
				$route['admin/transporte_composicao/delete/(:any)'] = 'transporte_composicao/delete/$1';
				$route['admin/transporte_composicao/(:any)'] = 'transporte_composicao/index/$1'; //$1 = page number
    			