
    				$route['admin/material_transporte'] = 'material_transporte/index';
				$route['admin/material_transporte/add'] = 'material_transporte/add';
				$route['admin/material_transporte/update'] = 'material_transporte/update';
				$route['admin/material_transporte/update/(:any)'] = 'material_transporte/update/$1';
				$route['admin/material_transporte/delete/(:any)'] = 'material_transporte/delete/$1';
				$route['admin/material_transporte/(:any)'] = 'material_transporte/index/$1'; //$1 = page number
    			