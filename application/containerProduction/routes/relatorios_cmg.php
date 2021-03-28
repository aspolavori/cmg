
    				$route['admin/relatorios_cmg'] = 'relatorios_cmg/index';
				$route['admin/relatorios_cmg/add'] = 'relatorios_cmg/add';
				$route['admin/relatorios_cmg/update'] = 'relatorios_cmg/update';
				$route['admin/relatorios_cmg/update/(:any)'] = 'relatorios_cmg/update/$1';
				$route['admin/relatorios_cmg/delete/(:any)'] = 'relatorios_cmg/delete/$1';
				$route['admin/relatorios_cmg/(:any)'] = 'relatorios_cmg/index/$1'; //$1 = page number
    			