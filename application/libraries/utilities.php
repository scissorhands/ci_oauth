<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Utilities {

    public function get_formatted_dates($start,$end){
    	$dates = $this->get_dates_between($start, $end);
		$fdates=array();
		foreach ($dates as $date) {
			$fdates[]=date('M-d', strtotime($date));
		}
	    return $fdates;
    }
    
    public function get_dates_between($start,$end){
		$dates = array($start);
	    while(end($dates) < $end){
	        $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
	    }
	    return $dates;
	}

	public function get_timestamp_between($start,$end){
    	$dates = $this->get_dates_between($start, $end);
		$fdates=array();
		foreach ($dates as $date) {
			$fdates[]= strtotime($date);
		}
	    return $dates;
    }

}