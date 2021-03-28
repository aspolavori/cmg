
    				$route['admin/caracteristica_volumetrica'] = 'caracteristica_volumetrica/index';
				$route['admin/caracteristica_volumetrica/add'] = 'caracteristica_volumetrica/add';
				$route['admin/caracteristica_volumetrica/update'] = 'caracteristica_volumetrica/update';
				$route['admin/caracteristica_volumetrica/update/(:any)'] = 'caracteristica_volumetrica/update/$1';
				$route['admin/caracteristica_volumetrica/delete/(:any)'] = 'caracteristica_volumetrica/delete/$1';
				$route['admin/caracteristica_volumetrica/(:any)'] = 'caracteristica_volumetrica/index/$1'; //$1 = page number
    			