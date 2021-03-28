
    				$route['admin/transpostes'] = 'transpostes/index';
				$route['admin/transpostes/add'] = 'transpostes/add';
				$route['admin/transpostes/update'] = 'transpostes/update';
				$route['admin/transpostes/update/(:any)'] = 'transpostes/update/$1';
				$route['admin/transpostes/delete/(:any)'] = 'transpostes/delete/$1';
				$route['admin/transpostes/(:any)'] = 'transpostes/index/$1'; //$1 = page number
    			