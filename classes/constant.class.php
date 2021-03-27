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

	public function dateFormater($date){
		return date ("d M,Y", strtotime($date));
	} 	
}