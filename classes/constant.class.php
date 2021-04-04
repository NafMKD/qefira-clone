<?php

/**
 * Constant Converter for database and user Interface
 */
class constant extends db
{

	/**
	* 
	* @param $ad_item_id = advertisment id
	* @return equivalent advertisment name for inserted $ad_item_id
	*/
	public function adTypeConverter($ad_item_id){
		if($ad_item_id==0){
			return "Free Ads";
		}elseif($ad_item_id==1){
			return "Premium Ads";
		}
	}

	/**
	* 
	* @param $negtype = negotiation id
	* @return equivalent negotiation name for inserted $negtype
	*/
	public function negTypeConverter($negtype){
		if($negtype==0){
			return "Negotiable";
		}elseif($negtype==1){
			return "Not Negotiable";
		}
	}

	/**
	* 
	* @param $reg_id = code for region
	* @return equivalent region name for inserted $reg_id
	*/
	public function regionConverter($reg_id){
		if($reg_id==0){
			return "Addis Ababa";
		}elseif($reg_id==1){
			return "Afar";
		}elseif($reg_id==2){
			return "Amhara";
		}elseif($reg_id==3){
			return "Benishangul";
		}elseif($reg_id==4){
			return "Dire Dawa";
		}elseif($reg_id==5){
			return "Gambela";
		}elseif($reg_id==6){
			return "Harari";
		}elseif($reg_id==7){
			return "Oromia";
		}elseif($reg_id==8){
			return "SNNP";
		}elseif($reg_id==9){
			return "Somali";
		}elseif($reg_id==10){
			return "Tigray";
		}
	}

	/**
	* 
	* @param $date = date string
	* @return return date in format of "20 Mar, 2021"
	*/
	public function dateFormater($date){
		return date ("d M, Y", strtotime($date));
	} 

	/**
	* 
	* @param $date = date string
	* @return return date in format of "Fri Mar 20, 2021"
	*/
	public function dateFormaterDetail($date){
		return date ("D M d, Y", strtotime($date));
	} 	

	/**
	* 
	* @param $date = date string
	* @return return date in format of "20 days ago"
	*/
	public function timeElapsedString($datetime) {
		date_default_timezone_set("Africa/Addis_Ababa");
	    $now = new DateTime(date("m/d/Y H:i:s"));
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if(isset($string['y'])){
	    	$outProp = $string['y'];
	    }elseif(isset($string['m'])){
	    	$outProp = $string['m'];
	    }elseif(isset($string['w'])){
	    	$outProp = $string['w'];
	    }elseif(isset($string['d'])){
	    	$outProp = $string['d'];
	    }elseif(isset($string['h'])){
	    	$outProp = $string['h'];
	    }elseif(isset($string['i'])){
	    	$outProp = $string['i'];
	    }elseif(isset($string['s'])){
	    	$outProp = $string['s'];
	    }

	    return $outProp ;
	}


	/**
	* 
	* @param $id = filter id
	* @return return array of available fetch queries
	*/
	public function filterId($id){
		if($id == 0){
			return array("BYDATEFILTER","DESC");
		}elseif($id == 1){
			return array("BYDATEFILTER","ASC");
		}elseif($id == 2){
			return array("PRICEFILTER","ASC");
		}elseif($id == 3){
			return array("PRICEFILTER","DESC");
		}
	}

	/**
	* 
	* @param $id = filter id
	* @return return name of filter
	*/
	public function filterIdName($id){
		if($id == 0){
			return "Newest";
		}elseif($id == 1){
			return "Oldest";
		}elseif($id == 2){
			return "Price (Low-High)";
		}elseif($id == 3){
			return "Price (High-Low)";
		}
	}
}