
    				$route['admin/composicao_material'] = 'composicao_material/index';
				$route['admin/composicao_material/add'] = 'composicao_material/add';
				$route['admin/composicao_material/update'] = 'composicao_material/update';
				$route['admin/composicao_material/update/(:any)'] = 'composicao_material/update/$1';
				$route['admin/composicao_material/delete/(:any)'] = 'composicao_material/delete/$1';
				$route['admin/composicao_material/(:any)'] = 'composicao_material/index/$1'; //$1 = page number
    			