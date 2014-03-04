<?php 

	function get_top_states($obj) {
		$results = $obj->model_analytics->get_data_by_user(array('visits','visitors','avgTimeOnSite'), '', 'array', array('region'), array("-visits") );
		$states = array();
		$cont=0;
		for ($i=0; $i < count($results); $i++) {
			if(translateStates($results[$i]->getRegion()) != '(not set)'){
				$states[$i]['state'] = translateStates($results[$i]->getRegion());	
				$states[$i]['blank'] = '';	
				$states[$i]['visitors'] = $results[$i]->getVisitors();
				$cont++;
				if ($cont == 5)
					break;	
			} 
		}
		return $states;
	}

	function translateStates( $estado ){
		switch ($estado) {
			case 'Federal District':
				return "Distrito Federal";
			case 'Nuevo Leon':
				return "Nuevo León";
			case 'Michoacan':
				return "Michoacán";
			case 'Yucatan':
				return "Yucatán";
			case 'San Luis Potosi':
				return "San Luis Potosí";
			case 'Queretaro':
				return "Querétaro";
			case 'State of Mexico':
				return "México";
			default:
				return $estado;
		}
	}