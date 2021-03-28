
    				$route['admin/veiculos'] = 'veiculos/index';
				$route['admin/veiculos/add'] = 'veiculos/add';
				$route['admin/veiculos/update'] = 'veiculos/update';
				$route['admin/veiculos/update/(:any)'] = 'veiculos/update/$1';
				$route['admin/veiculos/delete/(:any)'] = 'veiculos/delete/$1';
				$route['admin/veiculos/(:any)'] = 'veiculos/index/$1'; //$1 = page number
    			