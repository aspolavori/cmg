
    				$route['admin/hdm_veiculos'] = 'hdm_veiculos/index';
				$route['admin/hdm_veiculos/add'] = 'hdm_veiculos/add';
				$route['admin/hdm_veiculos/update'] = 'hdm_veiculos/update';
				$route['admin/hdm_veiculos/update/(:any)'] = 'hdm_veiculos/update/$1';
				$route['admin/hdm_veiculos/delete/(:any)'] = 'hdm_veiculos/delete/$1';
				$route['admin/hdm_veiculos/(:any)'] = 'hdm_veiculos/index/$1'; //$1 = page number
    			