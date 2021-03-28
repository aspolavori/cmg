
    				$route['admin/transporte_material_classe'] = 'transporte_material_classe/index';
				$route['admin/transporte_material_classe/add'] = 'transporte_material_classe/add';
				$route['admin/transporte_material_classe/update'] = 'transporte_material_classe/update';
				$route['admin/transporte_material_classe/update/(:any)'] = 'transporte_material_classe/update/$1';
				$route['admin/transporte_material_classe/delete/(:any)'] = 'transporte_material_classe/delete/$1';
				$route['admin/transporte_material_classe/(:any)'] = 'transporte_material_classe/index/$1'; //$1 = page number
    			